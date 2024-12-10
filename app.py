from flask import Flask, render_template, jsonify, Response
from flask_cors import CORS
import mysql.connector
from mysql.connector import Error
from deepface import DeepFace
import cv2
import pandas as pd
import numpy as np
import time
from threading import Thread, Lock
from queue import Queue
from collections import deque
from datetime import datetime
from concurrent.futures import ThreadPoolExecutor
import atexit

# Database configuration
db_config = {
    'host': 'localhost',
    'user': 'root',
    'password': '',
    'database': 'moodzics'
}

# Database connection function
def get_db_connection():
    try:
        connection = mysql.connector.connect(**db_config)
        return connection
    except Error as e:
        print(f"Error connecting to MySQL database: {e}")
        return None

# Remove or comment out CSV loading code
# try:
#     df = pd.read_csv('Datasets/kaggleMusicMoodFinal.csv', on_bad_lines='skip')
# except Exception as e:
#     print(f"Error reading CSV file: {e}")
#     exit()

# Verify the dataset
# print("Dataset Preview:")
# print(df.head())
# print("Dataset Columns:")
# print(df.columns)

# Map emotions to moods
emotion_to_mood = {
    'happy': 'Happy',
    'sad': 'Sad',
    'angry': 'Energetic',
    'neutral': 'Calm'
}

# Modify the recommend_songs function to use database
def recommend_songs(mood):
    """
    Recommend songs based on the detected mood from database.
    """
    try:
        connection = get_db_connection()
        if connection is None:
            return []

        cursor = connection.cursor(dictionary=True)
        # Map mood to category (1: Happy, 2: Sad, 3: Calm, 4: Energetic)
        mood_to_category = {
            'Sad': 1,
            'Happy': 2,
            'Calm': 3,
            'Energetic': 4
        }

        category = mood_to_category.get(mood, 1)  # Default to Happy if mood not found

        query = """
            SELECT name, singer as artists,
                   CONCAT('http://localhost/moodzic/uploads/musics/', filename) as file_url,
                   category,
                   filename,
                   original_filename,
                   duration,
                   original_filename as original_filename
            FROM musics
            WHERE category = %s
            ORDER BY RAND()
        """
        cursor.execute(query, (category,))
        songs = cursor.fetchall()

        cursor.close()
        connection.close()

        if not songs:
            return [{'name': 'No songs available', 'artists': ''}]

        # Print the whole data
        print(songs)
        return songs

    except Error as e:
        print(f"Error querying database: {e}")
        return [{'name': 'Error fetching songs', 'artists': ''}]

# Function to detect emotion from a single frame
def detect_emotion(frame):
    """
    Detect dominant emotion from the given frame using DeepFace.
    """
    try:
        # Analyze emotions in the frame with the specified backend
        result = DeepFace.analyze(
            frame,
            actions=['emotion'],          # Focus only on emotion detection
            enforce_detection=False,      # Avoid errors if no face is detected
            detector_backend='retinaface' # Lightweight and accurate backend
        )

        # Handle cases where the result is a list (e.g., multiple faces detected)
        if isinstance(result, list):
            result = result[0]

        # Extract emotion scores and find the dominant emotion
        emotion_scores = result['emotion']
        dominant_emotion = max(emotion_scores, key=emotion_scores.get)

        # Override 'neutral' with 'happy' for smiles with a high 'happy' score
        if dominant_emotion == 'neutral' and emotion_scores['happy'] > 0.5:
            dominant_emotion = 'happy'

        # Map the detected emotion to a mood
        mood = emotion_to_mood.get(dominant_emotion, 'Calm')
        return mood  # Return the mapped mood
    except Exception as e:
        print(f"Error detecting emotion: {e}")
        return "Calm"  # Return default mood if detection fails

app = Flask(__name__)
CORS(app)  # Enable CORS for all routes

current_mood = "Detecting..."  # Add this at the top of the file with other globals
video_capture = None  # Global variable to store video capture object

frame_lock = Lock()
current_frame = None
processing_frame = None
is_detecting = False
frame_queue = Queue(maxsize=2)  # Reduced queue size for lower latency
last_processed_time = time.time()
mood_buffer = deque(maxlen=3)  # Smaller buffer for faster updates
executor = ThreadPoolExecutor(max_workers=2)  # Parallel processing

@app.route('/')
def index():
    return render_template('index.html')

@app.route('/detect')
def detect():
    global current_mood  # Add this at the top of the file with other globals
    current_mood = "Detecting..."  # Reset mood for new detection
    return Response(generate_frames(), mimetype='multipart/x-mixed-replace; boundary=frame')

@app.route('/stop_detection')
def stop_detection():
    global video_capture, current_mood, is_detecting, frame_queue
    is_detecting = False
    
    # Clear the frame queue
    while not frame_queue.empty():
        try:
            frame_queue.get_nowait()
        except:
            pass
            
    if video_capture:
        video_capture.release()
        video_capture = None
        
    # Reset mood and cleanup resources
    current_mood = "Detecting..."
    cv2.destroyAllWindows()
    return jsonify({"status": "stopped"})

@app.route('/iframe')
def iframe_view():
    return render_template('iframe.html')

def process_frames():
    global current_mood, is_detecting, last_processed_time
    
    while is_detecting:
        try:
            if frame_queue.empty():
                time.sleep(0.016)  # Small sleep to prevent CPU spinning
                continue
                
            frame = frame_queue.get(timeout=0.016)
            current_time = time.time()
            
            # Process frame if enough time has passed
            if current_time - last_processed_time >= 0.016:
                try:
                    detected_mood = detect_emotion(frame)
                    
                    if detected_mood:
                        mood_buffer.append(detected_mood)
                        # Use lock when updating shared resource
                        with frame_lock:
                            current_mood = max(set(mood_buffer), key=mood_buffer.count)
                            print(f"Current mood updated to: {current_mood}")  # Debug print
                    
                    last_processed_time = current_time
                except Exception as e:
                    print(f"Error processing frame: {e}")
                    
        except Exception as e:
            if is_detecting:  # Only print if we're still supposed to be running
                print(f"Frame processing error: {e}")
            continue

def generate_frames():
    global video_capture, is_detecting, frame_queue
    
    if video_capture:
        video_capture.release()
    
    video_capture = cv2.VideoCapture(0)
    # Optimize camera settings for 60fps
    video_capture.set(cv2.CAP_PROP_FRAME_WIDTH, 640)
    video_capture.set(cv2.CAP_PROP_FRAME_HEIGHT, 480)
    video_capture.set(cv2.CAP_PROP_FPS, 60)
    video_capture.set(cv2.CAP_PROP_BUFFERSIZE, 1)
    video_capture.set(cv2.CAP_PROP_FOURCC, cv2.VideoWriter_fourcc(*'MJPG'))
    
    is_detecting = True
    process_thread = Thread(target=process_frames, daemon=True)
    process_thread.start()
    
    frame_time = 1/60.0  # Target frame time for 60fps
    last_frame_time = time.time()
    
    try:
        while is_detecting:  # Changed condition to check is_detecting
            if video_capture is None:
                break
            
            # Maintain consistent 60fps timing
            current_time = time.time()
            if current_time - last_frame_time < frame_time:
                continue
            
            ret, frame = video_capture.read()
            if not ret:
                break
            
            try:
                small_frame = cv2.resize(frame, (320, 240))
                if not frame_queue.full():
                    frame_queue.put_nowait(small_frame)
            except:
                pass
            
            with frame_lock:
                fps = 1.0 / (time.time() - last_frame_time)
                mood_text = f"Mood: {current_mood} (FPS: {int(fps)})"
            
            cv2.putText(frame, mood_text, (20, 50),
                       cv2.FONT_HERSHEY_SIMPLEX, 0.8, (0, 255, 0), 2)
            
            ret, buffer = cv2.imencode('.jpg', frame, 
                                     [cv2.IMWRITE_JPEG_QUALITY, 70])  # Reduced quality for speed
            frame_bytes = buffer.tobytes()
            
            yield (b'--frame\r\n'
                   b'Content-Type: image/jpeg\r\n\r\n' + frame_bytes + b'\r\n')
            
            last_frame_time = current_time
            
    finally:
        is_detecting = False
        if video_capture:
            video_capture.release()
            video_capture = None
        # Clear frame queue
        while not frame_queue.empty():
            try:
                frame_queue.get_nowait()
            except:
                pass
        cv2.destroyAllWindows()

@app.route('/get_recommendations')
def get_recommendations():
    global current_mood
    recommendations = recommend_songs(current_mood)
    return jsonify({
        'mood': current_mood,
        'recommendations': recommendations
    })

@app.teardown_appcontext
def cleanup(exception=None):
    global video_capture
    if video_capture:
        video_capture.release()
        video_capture = None

@atexit.register
def cleanup_resources():
    global video_capture, is_detecting, frame_queue
    is_detecting = False
    if video_capture:
        video_capture.release()
    cv2.destroyAllWindows()
    # Clear frame queue
    while not frame_queue.empty():
        try:
            frame_queue.get_nowait()
        except:
            pass

if __name__ == '__main__':
    app.run(debug=True, host='127.0.0.1', port=5000)

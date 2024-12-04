<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="slider_cheading">
                    <h4 class="cheading_title">Moods in, Music out! &nbsp;</h4>
                </div>
            </div>
            <style>
                * {
                    margin: 0;
                    padding: 0;
                    box-sizing: border-box;
                    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                }

                body {
                    background: rgb(12, 27, 44);
                }

                .container {
                    display: flex;
                    min-height: 80vh;
                    padding: 20px;
                    gap: 20px;
                }

                .video-section {
                    flex: 1;
                    background: white;
                    padding: 20px;
                    border-radius: 15px;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                }

                .recommendations-section {
                    width: 400px;
                    background: white;
                    padding: 20px;
                    border-radius: 15px;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                    --bg-color: #212121;
                    background-color: var(--bg-color);
                    padding: 1rem 2rem;
                    border-radius: 1.25rem;
                }

                h1 {
                    color: #333;
                    margin-bottom: 20px;
                    font-size: 24px;
                }

                .mood-display {
                    background-color: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(5px);
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 20px;
                    color: white;
                    font-size: 18px;
                }

                .song-item {
                    background-color: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(5px);
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 10px;
                    color: white;
                    transition: all 0.3s ease;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    cursor: pointer;
                }

                .song-item:hover {
                    background-color: #fb324f;
                    transform: translateX(5px);
                }

                .song-item:hover .play-btn {
                    background-color: rgba(255, 255, 255, 0.2);
                }

                .song-info {
                    flex: 1;
                }

                .song-name {
                    font-size: 16px;
                    margin-bottom: 5px;
                }

                .song-artist {
                    font-size: 14px;
                    opacity: 0.8;
                }

                .play-btn {
                    background: none;
                    border: none;
                    color: white;
                    cursor: pointer;
                    padding: 10px;
                    border-radius: 50%;
                    width: 40px;
                    height: 40px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    transition: all 0.3s ease;
                    background-color: rgba(255, 255, 255, 0.1);
                    z-index: 1;
                }

                .play-btn:hover {
                    background-color: rgba(255, 255, 255, 0.3);
                    transform: scale(1.1);
                }

                .audio-controls {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }

                .song-progress {
                    width: 100px;
                    height: 4px;
                    background: #ddd;
                    border-radius: 2px;
                    cursor: pointer;
                }

                .song-progress-fill {
                    height: 100%;
                    background: #4CAF50;
                    border-radius: 2px;
                    width: 0%;
                }

                .loading {
                    text-align: center;
                    padding: 40px 20px;
                    color: #666;
                    background: #f8f9fa;
                    border-radius: 8px;
                    animation: pulse 1.5s infinite;
                }

                @keyframes pulse {
                    0% { opacity: 1; }
                    50% { opacity: 0.5; }
                    100% { opacity: 1; }
                }

                .initial-message {
                    text-align: center;
                    padding: 40px 20px;
                    color: #666;
                    background: #f8f9fa;
                    border-radius: 8px;
                }

                .initial-message i {
                    display: block;
                    font-size: 48px;
                    margin-bottom: 15px;
                    color: #4CAF50;
                }

                .detection-progress {
                    background: #e3f2fd;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 20px;
                    text-align: center;
                }

                .progress-bar {
                    width: 100%;
                    height: 4px;
                    background: #ddd;
                    border-radius: 2px;
                    margin-top: 10px;
                }

                .progress-bar-fill {
                    height: 100%;
                    background: #4CAF50;
                    border-radius: 2px;
                    width: 0%;
                    transition: width 0.3s;
                }

                .controls {
                    margin: 20px 0;
                }

                .button.button1 {
                    background-color: #555555;
                    transition: all 0.3s ease;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 10px;
                    cursor: pointer;
                    font-size: 16px;
                    color: white;
                }

                .button.button1:hover {
                    background-color: #fb324f !important;
                }

                .button.button1:disabled {
                    background-color: #888888 !important;
                    cursor: not-allowed;
                    opacity: 0.7;
                }

                .start-btn {
                    background: #4CAF50;
                    color: white;
                    border: none;
                    padding: 12px 24px;
                    border-radius: 8px;
                    font-size: 16px;
                    cursor: pointer;
                    transition: background 0.3s;
                }

                .start-btn:hover {
                    background: #45a049;
                }

                .start-btn:disabled {
                    background: #cccccc;
                    cursor: not-allowed;
                }

                #video-iframe {
                    width: 100%;
                    height: 400px;
                    margin: 20px 0;
                    border-radius: 10px;
                    overflow: hidden;
                }

                #detection-iframe {
                    width: 100%;
                    height: 100%;
                    border-radius: 10px;
                    background: rgba(255, 255, 255, 0.1);
                    backdrop-filter: blur(5px);
                }

                /* Background image */
                .bg-container {
                  position: fixed;
                  top: 0;
                  left: 0;
                  width: 100%;
                  height: 100%;
                  z-index: -1;
                  background-image: url('<?php echo base_url(); ?>/assets/media/auth/purple.jpeg');
                  background-size: cover;
                  background-position: center;
                  background-repeat: no-repeat;
                }

                .video-section {
                    flex: 1;
                    padding: 20px;
                    border-radius: 10px;
                    background-color: rgba(0, 0, 0, 0.5);
                    backdrop-filter: blur(10px);
                    color: white;
                }

                .recommendations-section {
                    width: 400px;
                    padding: 20px;
                    border-radius: 10px;
                    background-color: rgba(0, 0, 0, 0.5);
                    backdrop-filter: blur(10px);
                    color: white;
                }

                /* Spinner Animation */
                .spinner {
                    width: 80px;
                    height: 80px;
                    --clr: #fb324f;
                    --clr-alpha: rgba(251, 50, 79, 0.1);
                    animation: spinner 2s infinite linear;
                    transform-style: preserve-3d;
                    margin: 50px auto;
                }

                .spinner > div {
                    background-color: var(--clr-alpha);
                    height: 100%;
                    position: absolute;
                    width: 100%;
                    border: 5px solid var(--clr);
                }

                .spinner div:nth-of-type(1) {
                    transform: translateZ(-40px) rotateY(180deg);
                }

                .spinner div:nth-of-type(2) {
                    transform: rotateY(-270deg) translateX(50%);
                    transform-origin: top right;
                }

                .spinner div:nth-of-type(3) {
                    transform: rotateY(270deg) translateX(-50%);
                    transform-origin: center left;
                }

                .spinner div:nth-of-type(4) {
                    transform: rotateX(90deg) translateY(-50%);
                    transform-origin: top center;
                }

                .spinner div:nth-of-type(5) {
                    transform: rotateX(-90deg) translateY(50%);
                    transform-origin: bottom center;
                }

                .spinner div:nth-of-type(6) {
                    transform: translateZ(40px);
                }

                @keyframes spinner {
                    0% {
                        transform: rotate(0deg) rotateX(0deg) rotateY(0deg);
                    }
                    50% {
                        transform: rotate(180deg) rotateX(180deg) rotateY(180deg);
                    }
                    100% {
                        transform: rotate(360deg) rotateX(360deg) rotateY(360deg);
                    }
                }

                .loading-message {
                    text-align: center;
                    color: white;
                    margin-top: 20px;
                    font-size: 18px;
                }

                .loader {
                    color: white;
                    font-family: "Poppins", sans-serif;
                    font-weight: 300;
                    font-size: 25px;
                    -webkit-box-sizing: content-box;
                    box-sizing: content-box;
                    height: 40px;
                    padding: 10px 10px;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    border-radius: 8px;
                }

                .words {
                    overflow: hidden;
                    position: relative;
                }
                /* .words::after {
                    content: "";
                    position: absolute;
                    inset: 0;
                    background: linear-gradient(
                        var(--bg-color) 10%,
                        transparent 30%,
                        transparent 70%,
                        var(--bg-color) 90%
                    );
                    z-index: 20;
                } */

                .word {
                    display: block;
                    height: 100%;
                    padding-left: 6px;
                    color: #fb324f;
                    animation: spin_4991 4s infinite;
                }

                @keyframes spin_4991 {
                    10% {
                        -webkit-transform: translateY(-102%);
                        transform: translateY(-102%);
                    }

                    25% {
                        -webkit-transform: translateY(-100%);
                        transform: translateY(-100%);
                    }

                    35% {
                        -webkit-transform: translateY(-202%);
                        transform: translateY(-202%);
                    }

                    50% {
                        -webkit-transform: translateY(-200%);
                        transform: translateY(-200%);
                    }

                    60% {
                        -webkit-transform: translateY(-302%);
                        transform: translateY(-302%);
                    }

                    75% {
                        -webkit-transform: translateY(-300%);
                        transform: translateY(-300%);
                    }

                    85% {
                        -webkit-transform: translateY(-402%);
                        transform: translateY(-402%);
                    }

                    100% {
                        -webkit-transform: translateY(-400%);
                        transform: translateY(-400%);
                    }
                }
            </style>
            <div class="bg-container"></div>
            <div class="album_list_wrapper">
                <div class="container">
                    <div class="video-section">
                        <!-- <h4 style="color: #8097b1; font-size: 18px; margin-bottom: 15px;">&nbsp;</h4> -->
                        <div class="controls">
                            <button id="startBtn" class="button button1">Start Analyze</button>
                        </div>
                        <div id="video-iframe">
                            <iframe id="detection-iframe" src="" frameborder="0"></iframe>
                        </div>
                    </div>

                    <div class="recommendations-section">
                        <!-- <h4 style="color: #8097b1; font-size: 18px; margin-bottom: 15px;">&nbsp;</h4> -->
                        <div id="songs-list">
                            <div class="loading-container" style="display: none;">
                                <div class="spinner">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div class="loading-message">Analyzing your mood...</div>
                            </div>
                            <div class="loader">
                                Analyzing
                                <div class="words">
                                    <span class="word">mood</span>
                                    <span class="word">emotions</span>
                                    <span class="word">feelings</span>
                                    <span class="word">vibes</span>
                                    <span class="word">mood</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Script -->
                <script>
                    const flaskUrl = '<?php echo $flask_url; ?>';
                    const startBtn = document.getElementById('startBtn');
                    const videoIframe = document.getElementById('video-iframe');
                    const detectionIframe = document.getElementById('detection-iframe');
                    let detectionActive = false;
                    let currentAudio = null;
                    let currentButton = null;

                    function resetVideoFeed() {
                        videoIframe.classList.remove('active');
                        detectionIframe.src = '';
                        detectionActive = false;
                        startBtn.disabled = false;
                        startBtn.textContent = 'Start Detection';
                    }

                    function togglePlay(button, url) {
                        if (currentAudio && currentAudio.src === url) {
                            if (currentAudio.paused) {
                                currentAudio.play();
                                button.innerHTML = '<i class="fa fa-pause"></i>';
                            } else {
                                currentAudio.pause();
                                button.innerHTML = '<i class="fa fa-play"></i>';
                            }
                        } else {
                            if (currentAudio) {
                                currentAudio.pause();
                                currentButton.innerHTML = '<i class="fa fa-play"></i>';
                            }
                            currentAudio = new Audio(url);
                            currentButton = button;

                            currentAudio.onerror = () => {
                                console.error('Error loading audio file:', url);
                                button.innerHTML = '<i class="fa fa-exclamation-triangle"></i>';
                                button.style.background = '#dc3545';
                            };

                            currentAudio.play().catch(error => {
                                console.error('Error playing audio:', error);
                                button.innerHTML = '<i class="fa fa-exclamation-triangle"></i>';
                                button.style.background = '#dc3545';
                            });

                            button.innerHTML = '<i class="fa fa-pause"></i>';

                            currentAudio.addEventListener('ended', () => {
                                button.innerHTML = '<i class="fa fa-play"></i>';
                            });

                            currentAudio.addEventListener('timeupdate', () => {
                                const progress = button.parentElement.querySelector('.song-progress-fill');
                                const percent = (currentAudio.currentTime / currentAudio.duration) * 100;
                                progress.style.width = percent + '%';
                            });
                        }
                    }

                    document.getElementById('startBtn').addEventListener('click', async function() {
                        if (!detectionActive) {
                            const detectionIframe = document.getElementById('detection-iframe');
                            const startBtn = document.getElementById('startBtn');
                            const videoIframe = document.getElementById('video-iframe');

                            // Disable button and change text
                            startBtn.disabled = true;
                            startBtn.textContent = 'Analyzing...';

                            videoIframe.style.display = 'block';
                            detectionIframe.style.height = '480px';

                            const songsList = document.getElementById('songs-list');
                            const loadingContainer = songsList.querySelector('.loading-container');
                            loadingContainer.style.display = 'block';
                            songsList.querySelector('.loader').style.display = 'none';

                            try {
                                await fetch(`${flaskUrl}/stop_detection`);
                                detectionIframe.src = `${flaskUrl}/detect`;
                                detectionActive = true;

                                setTimeout(async () => {
                                    try {
                                        const response = await fetch(`${flaskUrl}/get_recommendations`);
                                        const data = await response.json();
                                        songsList.innerHTML = `
                                            <div class="mood-display">
                                                Current Mood: ${data.mood}
                                            </div>
                                        `;
                                        data.recommendations.forEach(song => {
                                            songsList.innerHTML += `
                                                <div class="song-item">
                                                    <div class="song-info">
                                                        <div class="song-name">${song.name}</div>
                                                        <div class="song-artist">${song.artists}</div>
                                                    </div>
                                                    <button class="play-btn" onclick="togglePlay(this, '${song.file_url}')">
                                                        <i class="fa fa-play"></i>
                                                    </button>
                                                </div>
                                            `;
                                        });
                                    } catch (error) {
                                        console.error('Error getting recommendations:', error);
                                    } finally {
                                        await fetch(`${flaskUrl}/stop_detection`);
                                        resetVideoFeed();
                                        // Re-enable button and restore text
                                        startBtn.disabled = false;
                                        startBtn.textContent = 'Start Analyze';
                                        detectionActive = false;
                                    }
                                }, 15000);
                            } catch (error) {
                                console.error('Error during detection:', error);
                                resetVideoFeed();
                                songsList.innerHTML = `
                                    <div class="initial-message">
                                        <i class="fa fa-exclamation-circle"></i>
                                        <p>Oops! Something went wrong. Please try again.</p>
                                    </div>
                                `;
                                // Re-enable button and restore text on error
                                startBtn.disabled = false;
                                startBtn.textContent = 'Start Analyze';
                                detectionActive = false;
                            }
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</div>
</body>
</html>

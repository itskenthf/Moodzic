<div class="ms_download_wrapper common_pages_space">
    <div class="ms_download_inner">
        <div class="album_inner_list">
            <div class="slider_heading_wrap marger_bottom30">
                <div class="main-headline">
                    <h1>Music Is The Shorthand</h1>
                    <p class="subtext">Of Emotion</p>
                </div>
            </div>
            <div class="album_list_wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="cards-container">
                            <div class="col-lg-3">
                                <div class="e-card facial-card">
                                    <img src="<?= base_url('assets/media/music-wall/future3.jpeg'); ?>" alt="Facial Recognition" class="facial-image">
                                    <div class="wave"></div>
                                    <div class="wave"></div>
                                    <div class="wave"></div>
                                    <div class="new-feature-badge">
                                        <span class="pulse"></span>
                                        <span class="badge-text">NEW!</span>
                                    </div>
                                    <div class="card-headline">
                                        <h2>Facial Recognition</h2>
                                        <p>Listening to music that matches your mood.</p>
                                    </div>
                                    <div class="card-button">
                                        <a href="<?= base_url('aimusic'); ?>">
                                            <button class="button type1">
                                                <span class="btn-txt">ANALYZE MOOD</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="e-card music-card">
                                    <img src="<?= base_url('assets/media/music-wall/man.jpeg'); ?>" alt="Music" class="music-image">
                                    <div class="wave"></div>
                                    <div class="wave"></div>
                                    <div class="wave"></div>
                                    <div class="card-headline">
                                        <h2>Music Library</h2>
                                        <p>Explore your music collection.</p>
                                    </div>
                                    <div class="card-button">
                                        <a href="<?= base_url('allmusic'); ?>">
                                            <button class="button type1">
                                                <span class="btn-txt">BROWSE</span>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="e-card vinyl-card">
                                    <div class="vinyl-hint">Click to play</div>
                                    <div class="vinyl-disc">
                                        <div class="vinyl-label">
                                            <i class="fa-solid fa-play play-btn"></i>
                                        </div>
                                        <audio id="audio-player" style="display: none;"></audio>
                                    </div>
                                    <div class="vinyl-controls">
                                        <button class="control-btn prev-btn">
                                            <i class="fa-solid fa-backward"></i>
                                        </button>
                                        <button class="control-btn next-btn">
                                            <i class="fa-solid fa-forward"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="stats-container">
                                    <div class="stat-card">
                                        <div class="stat-count"><?= $users_count ?></div>
                                        <div class="stat-label">Total Users</div>
                                    </div>
                                    <div class="stat-card">
                                        <div class="stat-count"><?= $songs_count ?></div>
                                        <div class="stat-label">Total Songs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ms_download_wrapper {
    width: 100%;
    height: 100vh;
    position: relative;
    background-image: url('<?php echo base_url(); ?>/assets/media/auth/purple.jpeg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.ms_download_wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    z-index: 1;
}

.ms_download_inner {
    position: relative;
    z-index: 2;
}

.e-card {
    margin: 0;
    background: transparent;
    box-shadow: 0px 8px 28px -9px rgba(0,0,0,0.45);
    position: relative;
    width: 240px;
    height: 330px;
    border-radius: 30px;
    overflow: hidden;
}

.e-card .wave {
    position: absolute;
    width: 540px;
    height: 700px;
    opacity: 0.6;
    left: 0;
    top: 0;
    margin-left: -50%;
    margin-top: -70%;
    background: linear-gradient(744deg,#af40ff,#5b42f3 60%,#00ddeb);
}

.e-card .wave:nth-child(2),
.e-card .wave:nth-child(3) {
    top: 210px;
}

.e-card.playing .wave {
    border-radius: 40%;
    animation: wave 3000ms infinite linear;
}

.e-card .wave {
    border-radius: 40%;
    animation: wave 55s infinite linear;
}

.e-card.playing .wave:nth-child(2) {
    animation-duration: 4000ms;
}

.e-card .wave:nth-child(2) {
    animation-duration: 50s;
}

.e-card.playing .wave:nth-child(3) {
    animation-duration: 5000ms;
}

.e-card .wave:nth-child(3) {
    animation-duration: 45s;
}

.main-headline {
    text-align: left;
    padding-left: 30px;
    font-family: 'Poppins', sans-serif;
}

.main-headline h1 {
    font-size: 70px;
    font-weight: 500;
    margin-bottom: 1rem;
    color: #F2F9FF;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    font-family: 'Poppins', sans-serif;
}

.main-headline .subtext {
    font-size: 30px;
    color: #F2F9FF;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    font-family: 'Poppins', sans-serif;
}

.card-headline {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: left;
    z-index: 1;
    width: 80%;
    color: #ffffff;
    font-family: 'Lato', sans-serif;
}

.card-headline h2 {
    font-size: 28px;
    font-weight: 600;
    margin-bottom: 5px;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
    color: #ffffff;
}

.card-headline p {
    font-size: 18px;
    font-weight: 400;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
    color: #ffffff;
    line-height: 1.4;
}

.card-button {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1;
}

.button {
    height: 40px;
    width: 200px;
    position: relative;
    background-color: transparent;
    cursor: pointer;
    border: 2px solid #ffffff;
    overflow: hidden;
    border-radius: 30px;
    color: #ffffff;
    transition: all 0.5s ease-in-out;
}

.btn-txt {
    z-index: 1;
    font-weight: 400;
    letter-spacing: 4px;
}

.type1::after {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    transition: all 0.5s ease-in-out;
    background-color: #ffffff;
    border-radius: 30px;
    visibility: hidden;
    height: 10px;
    width: 10px;
    z-index: -1;
}

.button:hover {
    box-shadow: 1px 1px 200px #ffffff;
    color: #333;
    border: none;
}

.type1:hover::after {
    visibility: visible;
    transform: scale(100) translateX(2px);
}

@keyframes wave {
    0% {
        transform: rotate(0deg);
    }

    100% {
        transform: rotate(360deg);
    }
}

.container {
    position: relative;
    display: flex;
    justify-content: flex-start;
    align-items: flex-start;
    margin-top: 30px;
    padding-left: 15px;
}

.cards {
    display: flex;
    flex-direction: row;
    gap: 15px;
}

.cards .red,
.cards .blue,
.cards .green {
    background: linear-gradient(744deg,#af40ff,#5b42f3 60%,#00ddeb);
    box-shadow: 0px 8px 28px -9px rgba(0,0,0,0.45);
}

.cards .card {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
    height: 120px;
    width: 120px;
    border-radius: 16px;
    color: white;
    cursor: pointer;
    transition: 400ms;
    position: relative;
    overflow: hidden;
}

.cards .card p.tip {
    font-size: 1.2em;
    font-weight: 700;
    margin-bottom: 5px;
}

.cards .card p.second-text {
    font-size: 0.8em;
    opacity: 0.9;
}

.card-icon {
    width: 24px;
    height: 24px;
    margin-top: 8px;
    opacity: 0.9;
}

.cards .card:hover {
    transform: scale(1.2, 1.2);
}

.cards:hover > .card:not(:hover) {
    filter: blur(10px);
    transform: scale(0.9, 0.9);
}

.music-card {
    background: transparent;
    position: relative;
}

.music-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 30px;
    opacity: 0.85;
}

.music-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom,
        rgba(0,0,0,0.2),
        rgba(0,0,0,0.6)
    );
    border-radius: 30px;
    z-index: 1;
}

.music-card .card-headline,
.music-card .card-button {
    z-index: 2;
}

.vinyl-card {
    width: 300px;  /* Match music library card width */
    height: 400px;  /* Match music library card height */
    background: linear-gradient(744deg,#af40ff,#5b42f3 60%,#00ddeb);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: transform 0.3s ease;
    margin-top: 0;  /* Remove negative margin since cards are same height now */
    padding-top: 40px;  /* Adjust padding for better spacing */
}

.vinyl-disc {
    width: 250px;  /* Slightly larger disc for taller card */
    height: 250px;
    background: #000;
    border-radius: 50%;
    position: relative;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 0 20px rgba(0,0,0,0.4);
}

.vinyl-disc::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: repeating-radial-gradient(
        circle at center,
        transparent 0,
        transparent 5px,
        rgba(255, 255, 255, 0.1) 5px,
        rgba(255, 255, 255, 0.1) 10px
    );
    border-radius: 50%;
}

.vinyl-label {
    position: absolute;
    width: 90px;  /* Adjusted for larger disc */
    height: 90px;
    background: #fff;
    border-radius: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 2;
}

.play-btn {
    font-size: 28px;
    color: #5b42f3;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
}

.vinyl-disc.playing {
    animation: rotate 5s linear infinite;
}

.vinyl-disc.playing .play-btn {
    transform: rotate(-360deg);
}

@keyframes rotate {
    from {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(360deg);
    }
}

.vinyl-disc.paused {
    animation-play-state: paused;
}

.vinyl-card:hover {
    transform: scale(1.05);
}

.vinyl-card:hover .vinyl-disc {
    box-shadow: 0 0 30px rgba(91, 66, 243, 0.6);
}

.vinyl-disc::after {
    content: '';
    position: absolute;
    top: -5px;
    left: -5px;
    right: -5px;
    bottom: -5px;
    border-radius: 50%;
    background: linear-gradient(45deg, #af40ff, #5b42f3, #00ddeb);
    opacity: 0;
    transition: opacity 0.3s ease;
    z-index: -1;
}

.vinyl-card:hover .vinyl-disc::after {
    opacity: 1;
}

.vinyl-controls {
    position: absolute;
    bottom: 20px;  /* Adjusted for taller card */
    left: 0;
    right: 0;
    padding: 0 25px;
    display: flex;
    justify-content: space-between;
    z-index: 3;
}

.control-btn {
    background: transparent;
    border: 2px solid #fff;
    color: #fff;
    width: 45px;
    height: 45px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
    backdrop-filter: blur(5px);
    background: rgba(255, 255, 255, 0.1);
}

.control-btn:hover {
    background: #fff;
    color: #5b42f3;
    box-shadow: 0 0 15px rgba(255, 255, 255, 0.5);
    transform: scale(1.1);
}

.control-btn i {
    font-size: 15px;
}

.cards-container {
    display: flex;
    gap: 30px;
    padding-left: 15px;
    margin-top: 30px;
}

.facial-card {
    background: transparent;
    position: relative;
}

.facial-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 30px;
    opacity: 0.85;
}

.facial-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom,
        rgba(0,0,0,0.2),
        rgba(0,0,0,0.6)
    );
    border-radius: 30px;
    z-index: 1;
}

.facial-card .wave {
    z-index: 0;
    opacity: 0.25;
}

.facial-card .card-headline,
.facial-card .card-button {
    z-index: 2;
}

.music-card .wave {
    z-index: 0;
    opacity: 0.25;
}

.music-card .card-headline,
.music-card .card-button {
    z-index: 2;
}

.music-card::before {
    z-index: 1;
}

.music-image {
    z-index: 0;
}

/* Larger Card Styles */
.facial-card,
.music-card {
    width: 300px;  /* Increased width */
    height: 400px;  /* Increased height */
}

/* Update card container */
.cards-container {
    display: flex;
    gap: 30px;
    padding-left: 15px;
    margin-top: 30px;
    align-items: center;  /* Center cards vertically */
}

/* Update column sizes */
.cards-container .col-lg-3 {
    flex: 0 0 auto;  /* Allow natural sizing */
    width: auto;  /* Remove fixed width */
}

/* Adjust wave sizes for larger cards */
.facial-card .wave,
.music-card .wave {
    width: 600px;  /* Increased wave width */
    height: 800px;  /* Increased wave height */
}

/* Adjust headline sizes for larger cards */
.facial-card .card-headline h2,
.music-card .card-headline h2 {
    font-size: 32px;  /* Larger headline */
}

.facial-card .card-headline p,
.music-card .card-headline p {
    font-size: 20px;  /* Larger paragraph */
}

/* Adjust button position for larger cards */
.facial-card .card-button,
.music-card .card-button {
    bottom: 20px;  /* Move button up slightly */
}

.facial-card .button,
.music-card .button {
    width: 260px;
    height: 45px;
    font-size: 16px;
}

/* Adjust button container for larger cards */
.facial-card .card-button,
.music-card .card-button {
    bottom: 15px;
    width: 100%;
    padding: 0 20px;
}

/* Update button text for larger cards */
.facial-card .btn-txt,
.music-card .btn-txt {
    font-size: 15px;
    letter-spacing: 5px;
}

.facial-card .card-headline,
.music-card .card-headline {
    position: absolute;
    top: 65%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: left;
    z-index: 2;
    width: 80%;
}

.facial-card .card-headline h2,
.music-card .card-headline h2 {
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 10px;
    text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
}

.facial-card .card-headline p,
.music-card .card-headline p {
    font-size: 15px;
    line-height: 1.4;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    opacity: 0.9;
}

.facial-card::before,
.music-card::before {
    background: linear-gradient(
        to bottom,
        rgba(0,0,0,0.4) 0%,
        rgba(0,0,0,0.2) 40%,
        rgba(0,0,0,0.4) 70%,
        rgba(0,0,0,0.7) 100%
    );
}

.new-feature-badge {
    position: absolute;
    top: 20px;
    left: 20px;
    z-index: 3;
    display: flex;
    align-items: center;
    gap: 8px;
}

.badge-text {
    background: linear-gradient(45deg, #FF3366, #FF6B6B);
    color: white;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: 1px;
    box-shadow: 0 2px 10px rgba(255, 51, 102, 0.3);
    animation: float 3s ease-in-out infinite;
}

.pulse {
    width: 8px;
    height: 8px;
    background-color: #F4F6FF;
    border-radius: 50%;
    position: relative;
    animation: pulse 2s infinite;
}

@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(255, 51, 102, 0.7);
    }
    70% {
        box-shadow: 0 0 0 10px rgba(255, 51, 102, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(255, 51, 102, 0);
    }
}

@keyframes float {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-5px);
    }
}

.vinyl-hint {
    position: absolute;
    top: 40px;  /* Adjusted for taller card */
    left: 50%;
    transform: translateX(-50%);
    color: rgba(255, 255, 255, 0.8);
    font-size: 19px;
    font-weight: 500;
    letter-spacing: 1px;
    text-transform: uppercase;
    animation: fadeInOut 2s infinite;
}

@keyframes fadeInOut {
    0%, 100% { opacity: 0.5; }
    50% { opacity: 1; }
}

.stats-container {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top: -50px;  /* Match vinyl card margin */
}

.stat-card {
    width: 130px;
    height: 130px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding: 20px;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.stat-card:hover {
    transform: scale(1.05);
    background: rgba(255, 255, 255, 0.15);
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
}

.stat-icon {
    color: #fff;
    font-size: 24px;
    margin-bottom: 5px;
}

.stat-count {
    color: #fff;
    font-size: 32px;  /* Increased from 24px */
    font-weight: 600;
    margin-bottom: 8px;  /* Added margin */
}

.stat-label {
    color: rgba(255, 255, 255, 0.8);
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 1px;
    text-align: center;
}

</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const vinylDisc = document.querySelector('.vinyl-disc');
    const playBtn = document.querySelector('.play-btn');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    const audioPlayer = document.querySelector('#audio-player');
    let isPlaying = false;
    let currentIndex = 0;

    const musicFiles = <?php
        $dir = 'uploads/musics/';
        $files = glob($dir . '*.mp3');
        echo json_encode(array_map(function($file) {
            return str_replace('\\', '/', $file);
        }, $files));
    ?>;

    function getRandomSong() {
        currentIndex = Math.floor(Math.random() * musicFiles.length);
        return musicFiles[currentIndex];
    }

    function playSong(songPath) {
        audioPlayer.src = '<?= base_url() ?>' + songPath;
        audioPlayer.play().catch(error => {
            console.error('Error playing song:', error);
        });
    }

    function playNext() {
        currentIndex = (currentIndex + 1) % musicFiles.length;
        playSong(musicFiles[currentIndex]);
    }

    function playPrevious() {
        currentIndex = (currentIndex - 1 + musicFiles.length) % musicFiles.length;
        playSong(musicFiles[currentIndex]);
    }

    vinylDisc.addEventListener('click', function() {
        if (!isPlaying) {
            const songPath = getRandomSong();
            playSong(songPath);
            vinylDisc.classList.add('playing');
            playBtn.classList.remove('fa-play');
            playBtn.classList.add('fa-pause');
            isPlaying = true;
        } else {
            audioPlayer.pause();
            vinylDisc.classList.remove('playing');
            playBtn.classList.remove('fa-pause');
            playBtn.classList.add('fa-play');
            isPlaying = false;
        }
    });

    nextBtn.addEventListener('click', function() {
        if (isPlaying) {
            playNext();
        }
    });

    prevBtn.addEventListener('click', function() {
        if (isPlaying) {
            playPrevious();
        }
    });

    audioPlayer.addEventListener('ended', function() {
        playNext();
    });

    audioPlayer.addEventListener('error', function(e) {
        console.error('Audio error:', e);
        playNext();
    });
});
</script>

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
                    <div class="col-lg-6">
                        <div class="container">
                            <div class="cards">
                                <div class="card blue">
                                    <p class="tip"><?= $users_count ?></p>
                                    <p class="second-text">Total Users</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="card-icon">
                                        <path fill="#ffffff" d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                                    </svg>
                                </div>
                                <div class="card red">
                                    <p class="tip"><?= $songs_count ?></p>
                                    <p class="second-text">Total Songs</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="card-icon">
                                        <path fill="#ffffff" d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/>
                                    </svg>
                                </div>
                                <div class="card green">
                                    <p class="tip"><?= $favorites_count ?></p>
                                    <p class="second-text">Favorites</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="card-icon">
                                        <path fill="#ffffff" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 offset-lg-2">
                        <div class="e-card playing">
                            <div class="wave"></div>
                            <div class="wave"></div>
                            <div class="wave"></div>
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
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.ms_download_wrapper {
    width: 100%;
    height: 100vh;
    background-image: url('<?= base_url("assets/media/music-wall/music13.jpg") ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.e-card {
    margin: 20px auto;
    background: transparent;
    box-shadow: 0px 8px 28px -9px rgba(0,0,0,0.45);
    position: relative;
    width: 240px;
    height: 330px;
    border-radius: 16px;
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
    /* padding: 10px 10px; */
}

.main-headline h1 {
    font-size: 45px;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #7c8ea5;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
}

.main-headline .subtext {
    font-size: 25px;
    color: #7c8ea5;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
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
</style>

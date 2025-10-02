<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Audio - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'audio'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>
                <section class="audio-page" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('assets/img/home/pattern/banner-3.png');background-size: contain;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="audio-page__header">
                                    <h2 class="audio-page__title">Thaalam Audio Library</h2>
                                    <p class="audio-page__subtitle">Live Streaming & Audio Collection</p>

                                    <div class="audio-page__filter">
                                        <div class="audio-page__search">
                                            <input type="text" placeholder="Search audio tracks...">
                                            <button class="audio-page__search-btn">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                        <div class="audio-page__categories">
                                            <ul class="list-unstyled">
                                                <li class="active"><a href="#">Live Stream</a></li>
                                                <li><a href="#">Music</a></li>
                                                <li><a href="#">Interviews</a></li>
                                                <li><a href="#">Podcasts</a></li>
                                                <li><a href="#">Archives</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Audio Player -->
                                <div class="audio-page__player">
                                    <div class="audio-page__player-cover">
                                        <img src="assets/img/common/audio/music-poster.jpg" alt="Thaalam Live">
                                        <div class="audio-page__player-overlay">
                                            <button class="audio-page__play-btn" id="mainPlayBtn">
                                                <i class="fas fa-play" id="mainPlayIcon"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="audio-page__player-info">
                                        <h3 class="audio-page__player-title">Thaalam Live Stream</h3>
                                        <p class="audio-page__player-artist">24/7 Broadcasting</p>
                                        <div class="audio-page__player-controls">
                                            <button class="audio-page__player-btn" id="volumeBtn">
                                                <i class="fas fa-volume-up" id="volumeIcon"></i>
                                            </button>
                                            <input type="range" id="volumeSlider" min="0" max="1" step="0.1"
                                                value="0.7">
                                            <button class="audio-page__player-btn" id="shareBtn">
                                                <i class="fas fa-share-alt"></i>
                                            </button>
                                            <button class="audio-page__player-btn" id="likeBtn">
                                                <i class="far fa-heart"></i>
                                            </button>
                                        </div>
                                        <audio id="audioPlayer" src="https://thaalam.out.airtime.pro/thaalam_b"></audio>
                                    </div>
                                </div>

                                <!-- Audio List Section -->
                                <div class="audio-page__list">
                                    <h3 class="audio-page__list-title">Recent Broadcasts</h3>

                                    <!-- Audio Track 1 -->
                                    <div class="audio-page__track">
                                        <div class="audio-page__track-number">01</div>
                                        <div class="audio-page__track-cover">
                                            <img src="assets/img/common/audio/poster1.jpg" alt="Morning Show">
                                        </div>
                                        <div class="audio-page__track-info">
                                            <h4 class="audio-page__track-title">Morning Show Highlights</h4>
                                            <p class="audio-page__track-artist">RJ Nisha | June 15, 2025</p>
                                        </div>
                                        <div class="audio-page__track-duration">3:42</div>
                                        <div class="audio-page__track-actions">
                                            <button class="audio-page__track-btn play-track"
                                                data-src="assets/audio/morning-show.mp3">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="audio-page__track-btn">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Audio Track 2 -->
                                    <div class="audio-page__track">
                                        <div class="audio-page__track-number">02</div>
                                        <div class="audio-page__track-cover">
                                            <img src="assets/img/common/audio/poster2.jpg" alt="Evening Drive">
                                        </div>
                                        <div class="audio-page__track-info">
                                            <h4 class="audio-page__track-title">Evening Drive Time</h4>
                                            <p class="audio-page__track-artist">RJ Arjun | June 14, 2025</p>
                                        </div>
                                        <div class="audio-page__track-duration">4:15</div>
                                        <div class="audio-page__track-actions">
                                            <button class="audio-page__track-btn play-track"
                                                data-src="assets/audio/evening-drive.mp3">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="audio-page__track-btn">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Audio Track 3 -->
                                    <div class="audio-page__track">
                                        <div class="audio-page__track-number">03</div>
                                        <div class="audio-page__track-cover">
                                            <img src="assets/img/common/audio/poster3.jpg" alt="Bollywood Special">
                                        </div>
                                        <div class="audio-page__track-info">
                                            <h4 class="audio-page__track-title">Bollywood Connection</h4>
                                            <p class="audio-page__track-artist">RJ Meera | June 13, 2025</p>
                                        </div>
                                        <div class="audio-page__track-duration">5:28</div>
                                        <div class="audio-page__track-actions">
                                            <button class="audio-page__track-btn play-track"
                                                data-src="assets/audio/bollywood.mp3">
                                                <i class="fas fa-play"></i>
                                            </button>
                                            <button class="audio-page__track-btn">
                                                <i class="fas fa-download"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pagination -->
                                <div class="audio-page__pagination">
                                    <ul class="pg-pagination list-unstyled">
                                        <li class="prev">
                                            <a href="#" aria-label="prev"><i class="fas fa-arrow-left"></i></a>
                                        </li>
                                        <li class="count active"><a href="#">01</a></li>
                                        <li class="count"><a href="#">02</a></li>
                                        <li class="count"><a href="#">03</a></li>
                                        <li class="next">
                                            <a href="#" aria-label="Next"><i class="fas fa-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <style>
                    /* Audio Page Styles */
                    :root {
                        --thm-color: #F00000;
                        --thm-color-dark: #C00000;
                        --thm-text: #333;
                        --thm-text-light: #777;
                        --thm-bg: #f9f9f9;
                        --thm-border: #e5e5e5;
                    }

                    .audio-page {
                        padding: 80px 0;
                        background-color: var(--thm-bg);
                    }

                    .audio-page__header {
                        margin-bottom: 40px;
                        text-align: center;
                    }

                    .audio-page__title {
                        font-size: 36px;
                        color: var(--thm-color);
                        margin-bottom: 10px;
                    }

                    .audio-page__subtitle {
                        font-size: 18px;
                        color: var(--thm-text-light);
                        margin-bottom: 30px;
                    }

                    .audio-page__filter {
                        max-width: 800px;
                        margin: 0 auto;
                    }

                    .audio-page__search {
                        position: relative;
                        margin-bottom: 20px;
                    }

                    .audio-page__search input {
                        width: 100%;
                        padding: 15px 20px;
                        border: 2px solid var(--thm-border);
                        border-radius: 50px;
                        font-size: 16px;
                        transition: all 0.3s ease;
                    }

                    .audio-page__search input:focus {
                        border-color: var(--thm-color);
                        outline: none;
                    }

                    .audio-page__search-btn {
                        position: absolute;
                        right: 15px;
                        top: 50%;
                        transform: translateY(-50%);
                        background: none;
                        border: none;
                        color: var(--thm-color);
                        font-size: 18px;
                        cursor: pointer;
                    }

                    .audio-page__categories ul {
                        display: flex;
                        justify-content: center;
                        flex-wrap: wrap;
                        gap: 10px;
                    }

                    .audio-page__categories li {
                        margin: 0;
                    }

                    .audio-page__categories li a {
                        display: block;
                        padding: 8px 20px;
                        background-color: #fff;
                        color: var(--thm-text);
                        border-radius: 50px;
                        font-size: 14px;
                        transition: all 0.3s ease;
                        border: 1px solid var(--thm-border);
                    }

                    .audio-page__categories li.active a,
                    .audio-page__categories li a:hover {
                        background-color: var(--thm-color);
                        color: #fff;
                        border-color: var(--thm-color);
                    }

                    /* Audio Player Styles */
                    .audio-page__player {
                        display: flex;
                        background-color: #fff;
                        border-radius: 15px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                        overflow: hidden;
                        margin-bottom: 40px;
                    }

                    .audio-page__player-cover {
                        width: 250px;
                        position: relative;
                        flex-shrink: 0;
                    }

                    .audio-page__player-cover img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    .audio-page__player-overlay {
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 100%;
                        background-color: rgba(0, 0, 0, 0.3);
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }

                    .audio-page__play-btn {
                        width: 60px;
                        height: 60px;
                        background-color: rgba(255, 255, 255, 0.9);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--thm-color);
                        font-size: 20px;
                        border: none;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .audio-page__play-btn:hover {
                        background-color: var(--thm-color);
                        color: #fff;
                    }

                    .audio-page__player-info {
                        flex-grow: 1;
                        padding: 30px;
                        display: flex;
                        flex-direction: column;
                        justify-content: center;
                    }

                    .audio-page__player-title {
                        font-size: 24px;
                        color: var(--thm-text);
                        margin-bottom: 5px;
                    }

                    .audio-page__player-artist {
                        font-size: 16px;
                        color: var(--thm-color);
                        margin-bottom: 25px;
                    }

                    .audio-page__player-controls {
                        display: flex;
                        align-items: center;
                        gap: 15px;
                    }

                    .audio-page__player-btn {
                        width: 40px;
                        height: 40px;
                        border-radius: 50%;
                        background-color: #f5f5f5;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--thm-text);
                        border: none;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .audio-page__player-btn:hover {
                        background-color: var(--thm-color);
                        color: #fff;
                    }

                    #volumeSlider {
                        width: 100px;
                        height: 6px;
                        -webkit-appearance: none;
                        background: #ddd;
                        border-radius: 3px;
                        outline: none;
                    }

                    #volumeSlider::-webkit-slider-thumb {
                        -webkit-appearance: none;
                        width: 15px;
                        height: 15px;
                        background: var(--thm-color);
                        border-radius: 50%;
                        cursor: pointer;
                    }

                    /* Audio List Styles */
                    .audio-page__list {
                        background-color: #fff;
                        border-radius: 15px;
                        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
                        overflow: hidden;
                        margin-bottom: 30px;
                    }

                    .audio-page__list-title {
                        padding: 20px;
                        margin: 0;
                        font-size: 20px;
                        color: var(--thm-text);
                        border-bottom: 1px solid var(--thm-border);
                    }

                    .audio-page__track {
                        display: flex;
                        align-items: center;
                        padding: 15px 20px;
                        border-bottom: 1px solid var(--thm-border);
                        transition: all 0.3s ease;
                    }

                    .audio-page__track:hover {
                        background-color: rgba(240, 0, 0, 0.05);
                    }

                    .audio-page__track-number {
                        width: 30px;
                        font-size: 16px;
                        color: var(--thm-text-light);
                        text-align: center;
                    }

                    .audio-page__track-cover {
                        width: 50px;
                        height: 50px;
                        border-radius: 8px;
                        overflow: hidden;
                        margin: 0 20px;
                    }

                    .audio-page__track-cover img {
                        width: 100%;
                        height: 100%;
                        object-fit: cover;
                    }

                    .audio-page__track-info {
                        flex-grow: 1;
                    }

                    .audio-page__track-title {
                        font-size: 16px;
                        color: var(--thm-text);
                        margin-bottom: 5px;
                    }

                    .audio-page__track-artist {
                        font-size: 14px;
                        color: var(--thm-text-light);
                        margin: 0;
                    }

                    .audio-page__track-duration {
                        width: 60px;
                        text-align: center;
                        font-size: 14px;
                        color: var(--thm-text-light);
                    }

                    .audio-page__track-actions {
                        display: flex;
                        gap: 10px;
                        margin-left: 20px;
                    }

                    .audio-page__track-btn {
                        width: 35px;
                        height: 35px;
                        border-radius: 50%;
                        background-color: #f5f5f5;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: var(--thm-text);
                        border: none;
                        cursor: pointer;
                        transition: all 0.3s ease;
                    }

                    .audio-page__track-btn:hover {
                        background-color: var(--thm-color);
                        color: #fff;
                    }

                    /* Pagination Styles */
                    .audio-page__pagination {
                        margin-top: 40px;
                        text-align: center;
                    }

                    .pg-pagination {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 10px;
                    }

                    .pg-pagination li a {
                        width: 40px;
                        height: 40px;
                        display: inline-flex;
                        align-items: center;
                        justify-content: center;
                        background-color: #f5f5f5;
                        color: var(--thm-text);
                        border-radius: 50%;
                        transition: all 0.3s ease;
                    }

                    .pg-pagination li a:hover,
                    .pg-pagination li.active a {
                        background-color: var(--thm-color);
                        color: #fff;
                    }

                    /* Responsive Styles */
                    @media (max-width: 991px) {
                        .audio-page__player {
                            flex-direction: column;
                        }

                        .audio-page__player-cover {
                            width: 100%;
                            height: 250px;
                        }

                        .audio-page__player-info {
                            padding: 20px;
                        }
                    }

                    @media (max-width: 767px) {
                        .audio-page__track {
                            flex-wrap: wrap;
                            padding: 15px;
                        }

                        .audio-page__track-number {
                            order: 1;
                        }

                        .audio-page__track-cover {
                            order: 2;
                            margin: 0 10px 0 0;
                        }

                        .audio-page__track-info {
                            order: 3;
                            width: calc(100% - 100px);
                            margin-top: 10px;
                        }

                        .audio-page__track-duration {
                            order: 4;
                            text-align: right;
                            margin-left: auto;
                        }

                        .audio-page__track-actions {
                            order: 5;
                            width: 100%;
                            justify-content: flex-end;
                            margin: 10px 0 0 0;
                        }
                    }

                    @media (max-width: 575px) {
                        .audio-page__title {
                            font-size: 28px;
                        }

                        .audio-page__subtitle {
                            font-size: 16px;
                        }

                        .audio-page__categories ul {
                            justify-content: flex-start;
                        }
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Audio player functionality
                        const audioPlayer = document.getElementById('audioPlayer');
                        const mainPlayBtn = document.getElementById('mainPlayBtn');
                        const mainPlayIcon = document.getElementById('mainPlayIcon');
                        const volumeBtn = document.getElementById('volumeBtn');
                        const volumeIcon = document.getElementById('volumeIcon');
                        const volumeSlider = document.getElementById('volumeSlider');
                        const likeBtn = document.getElementById('likeBtn');
                        const trackButtons = document.querySelectorAll('.play-track');

                        // Main play button functionality
                        mainPlayBtn.addEventListener('click', function() {
                            if (audioPlayer.paused) {
                                audioPlayer.play();
                                mainPlayIcon.classList.remove('fa-play');
                                mainPlayIcon.classList.add('fa-pause');
                            } else {
                                audioPlayer.pause();
                                mainPlayIcon.classList.remove('fa-pause');
                                mainPlayIcon.classList.add('fa-play');
                            }
                        });

                        // Volume control
                        volumeSlider.addEventListener('input', function() {
                            audioPlayer.volume = this.value;
                            if (this.value == 0) {
                                volumeIcon.classList.remove('fa-volume-up');
                                volumeIcon.classList.remove('fa-volume-down');
                                volumeIcon.classList.add('fa-volume-mute');
                            } else if (this.value < 0.5) {
                                volumeIcon.classList.remove('fa-volume-up');
                                volumeIcon.classList.remove('fa-volume-mute');
                                volumeIcon.classList.add('fa-volume-down');
                            } else {
                                volumeIcon.classList.remove('fa-volume-down');
                                volumeIcon.classList.remove('fa-volume-mute');
                                volumeIcon.classList.add('fa-volume-up');
                            }
                        });

                        // Mute button
                        volumeBtn.addEventListener('click', function() {
                            if (audioPlayer.volume > 0) {
                                audioPlayer.volume = 0;
                                volumeSlider.value = 0;
                                volumeIcon.classList.remove('fa-volume-up');
                                volumeIcon.classList.remove('fa-volume-down');
                                volumeIcon.classList.add('fa-volume-mute');
                            } else {
                                audioPlayer.volume = 0.7;
                                volumeSlider.value = 0.7;
                                volumeIcon.classList.remove('fa-volume-mute');
                                volumeIcon.classList.add('fa-volume-up');
                            }
                        });

                        // Like button
                        likeBtn.addEventListener('click', function() {
                            this.classList.toggle('liked');
                            if (this.classList.contains('liked')) {
                                this.innerHTML = '<i class="fas fa-heart"></i>';
                            } else {
                                this.innerHTML = '<i class="far fa-heart"></i>';
                            }
                        });

                        // Track play buttons
                        trackButtons.forEach(button => {
                            button.addEventListener('click', function() {
                                const trackSrc = this.getAttribute('data-src');
                                const trackTitle = this.closest('.audio-page__track').querySelector('.audio-page__track-title').textContent;
                                const trackArtist = this.closest('.audio-page__track').querySelector('.audio-page__track-artist').textContent;

                            });
                        });

                        // Set initial volume
                        audioPlayer.volume = 0.7;
                        volumeSlider.value = 0.7;
                    });
                </script>
                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>



</body>

</html>
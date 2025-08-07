<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Podcast Details - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div>

            <div class="col-lg-80">
                <?php include 'php/header.php'; ?>
                <!--Blog Details Start-->
                <section class="blog-details" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                                <div class="blog-details__left">
                                    <div class="blog-details__img-box">
                                        <div class="blog-details__img">
                                            <img src="assets/img/common/podcast-details/podcast-banner.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="blog-details__content">
                                        <h3 class="blog-details__title-1">Behind the Scenes: Sri Lanka's Music Industry
                                            Secrets</h3>
                                        <div class="blog-details__client-and-meta">
                                            <div class="blog-details__client-box">
                                                <div class="blog-details__client-img">
                                                    <img src="assets/images/blog/blog-details-client-img-1.jpg" alt="">
                                                </div>
                                                <div class="blog-details__client-content">
                                                    <p>Hosted By</p>
                                                    <h4>RJ Arun</h4>
                                                </div>
                                            </div>
                                            <ul class="blog-details__client-meta list-unstyled">
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-calendar"></span>
                                                    </div>
                                                    <p>July 02, 2025</p>
                                                </li>

                                            </ul>
                                        </div>

                                        <div id="thaalam-audio-player">
                                            <audio id="thaalam-player" controls>
                                                <source src="https://thaalam.out.airtime.pro/thaalam_b"
                                                    type="audio/mp3">
                                                Your browser does not support the audio element.
                                            </audio>
                                            <div id="thaalam-custom-controls">
                                                <button id="thaalam-play-pause-btn">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                                <div id="thaalam-progress-container">
                                                    <div id="thaalam-progress-bar"></div>
                                                    <input type="range" id="thaalam-progress-slider" min="0" max="100"
                                                        value="0">
                                                </div>
                                                <div id="thaalam-time-display">
                                                    <span id="thaalam-current-time">00:00</span> /
                                                    <span id="thaalam-duration">00:00</span>
                                                </div>
                                                <div id="thaalam-volume-control">
                                                    <button id="thaalam-volume-btn">
                                                        <i class="fas fa-volume-up"></i>
                                                    </button>
                                                    <input type="range" id="thaalam-volume-slider" min="0" max="1"
                                                        step="0.01" value="1">
                                                </div>
                                                <button id="thaalam-fullscreen-btn">
                                                    <i class="fas fa-expand"></i>
                                                </button>
                                            </div>
                                        </div>

                                        <style>
                                            /* Base Styles */
                                            :root {
                                                --primary-color: #D50000;
                                                --secondary-color: #222;
                                                --highlight-color: #ff5252;
                                                --text-color: #333;
                                                --bg-color: #f5f5f5;
                                                --control-bg: #fff;
                                                --slider-bg: #e0e0e0;
                                            }

                                            /* Custom Audio Player Styles using ID selector */
                                            #thaalam-audio-player {
                                                width: 100%;
                                                max-width: 800px;
                                                margin: 20px auto;
                                                padding: 15px;
                                                background: #fff;
                                                border-radius: 12px;
                                                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
                                                border-left: 4px solid #dc0000;
                                            }

                                            #thaalam-audio-player audio {
                                                display: none;
                                                /* Hide default player */
                                            }

                                            #thaalam-custom-controls {
                                                display: flex;
                                                align-items: center;
                                                gap: 15px;
                                                padding: 10px 15px;
                                            }

                                            /* Play/Pause Button */
                                            #thaalam-play-pause-btn {
                                                background: #D50000;
                                                color: white;
                                                border: none;
                                                width: 40px;
                                                height: 40px;
                                                border-radius: 50%;
                                                cursor: pointer;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                transition: all 0.3s ease;
                                            }

                                            #thaalam-play-pause-btn:hover {
                                                background: #ff5252;
                                                transform: scale(1.05);
                                            }

                                            #thaalam-play-pause-btn i {
                                                font-size: 16px;
                                            }

                                            /* Progress Bar */
                                            #thaalam-progress-container {
                                                flex-grow: 1;
                                                position: relative;
                                                height: 6px;
                                                background: #e0e0e0;
                                                border-radius: 3px;
                                                cursor: pointer;
                                            }

                                            #thaalam-progress-bar {
                                                position: absolute;
                                                left: 0;
                                                top: 0;
                                                height: 100%;
                                                width: 0%;
                                                background: #D50000;
                                                border-radius: 3px;
                                                transition: width 0.1s linear;
                                            }

                                            #thaalam-progress-slider {
                                                position: absolute;
                                                width: 100%;
                                                height: 100%;
                                                opacity: 0;
                                                cursor: pointer;
                                                z-index: 2;
                                            }

                                            /* Time Display */
                                            #thaalam-time-display {
                                                font-size: 14px;
                                                color: #333;
                                                min-width: 90px;
                                                text-align: center;
                                            }

                                            /* Volume Controls */
                                            #thaalam-volume-control {
                                                display: flex;
                                                align-items: center;
                                                gap: 8px;
                                            }

                                            #thaalam-volume-btn {
                                                background: transparent;
                                                border: none;
                                                color: #333;
                                                cursor: pointer;
                                                font-size: 16px;
                                                transition: color 0.2s;
                                            }

                                            #thaalam-volume-btn:hover {
                                                color: #D50000;
                                            }

                                            #thaalam-volume-slider {
                                                width: 80px;
                                                height: 4px;
                                                -webkit-appearance: none;
                                                background: #e0e0e0;
                                                border-radius: 2px;
                                                outline: none;
                                            }

                                            #thaalam-volume-slider::-webkit-slider-thumb {
                                                -webkit-appearance: none;
                                                width: 14px;
                                                height: 14px;
                                                background: #D50000;
                                                border-radius: 50%;
                                                cursor: pointer;
                                                transition: all 0.2s;
                                            }

                                            #thaalam-volume-slider::-webkit-slider-thumb:hover {
                                                background: #ff5252;
                                                transform: scale(1.1);
                                            }

                                            /* Fullscreen Button */
                                            #thaalam-fullscreen-btn {
                                                background: transparent;
                                                border: none;
                                                color: #333;
                                                cursor: pointer;
                                                font-size: 16px;
                                                transition: color 0.2s;
                                            }

                                            #thaalam-fullscreen-btn:hover {
                                                color: #D50000;
                                            }

                                            /* Responsive Design */
                                            @media (max-width: 600px) {
                                                #thaalam-custom-controls {
                                                    flex-wrap: wrap;
                                                    gap: 10px;
                                                }

                                                #thaalam-progress-container {
                                                    order: 1;
                                                    width: 100%;
                                                    margin-top: 10px;
                                                }

                                                #thaalam-time-display {
                                                    order: 2;
                                                    margin-left: auto;
                                                }
                                            }
                                        </style>



                                        <div class="blog-details__tag-and-share">
                                            <div class="blog-details__tag">
                                                <span>Tags:</span>
                                                <a href="#">Music</a>
                                                <a href="#">Concerts</a>
                                                <a href="#">Entertainment</a>
                                            </div>
                                            <div class="blog-details__share">
                                                <span>Share</span>
                                                <a href="#"><i class="fab fa-pinterest-p"></i></a>
                                                <a href="#"><i class="fab fa-instagram"></i></a>
                                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="sidebar">
                                    <div class="sidebar__single sidebar__post">
                                        <div class="sidebar__title-box">
                                            <div class="sidebar__title-icon">
                                                <img src="assets/img/home/rock.png" alt="">
                                            </div>
                                            <h3 class="sidebar__title">More By RJ Aun </h3>
                                        </div>
                                        <ul class="sidebar__post-list list-unstyled">
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="assets/img/common/blog-details/img-4.jpg" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <ul class="sidebar__post-meta list-unstyled">
                                                        <li>
                                                            <p><span class="icon-tags"></span>Music</p>
                                                        </li>
                                                        <li>
                                                            <p><span class="icon-calendar"></span>10 July 2025</p>
                                                        </li>
                                                    </ul>
                                                    <h3 class="sidebar__post-title"><a
                                                            href="podcast-details.php">Creating
                                                            the Ultimate Festival Survival Guide</a></h3>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="assets/img/common/blog-details/img-5.jpg" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <ul class="sidebar__post-meta list-unstyled">
                                                        <li>
                                                            <p><span class="icon-tags"></span>Technology</p>
                                                        </li>
                                                        <li>
                                                            <p><span class="icon-calendar"></span>15 June 2025</p>
                                                        </li>
                                                    </ul>
                                                    <h3 class="sidebar__post-title"><a href="podcast-details.php">How AR
                                                            is Transforming Live Performances</a></h3>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="assets/img/common/blog-details/img-6.jpg" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <ul class="sidebar__post-meta list-unstyled">
                                                        <li>
                                                            <p><span class="icon-tags"></span>Events</p>
                                                        </li>
                                                        <li>
                                                            <p><span class="icon-calendar"></span>12 June 2025</p>
                                                        </li>
                                                    </ul>
                                                    <h3 class="sidebar__post-title"><a href="podcast-details.php">The
                                                            Best
                                                            Summer Music Festivals of 2025</a></h3>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="assets/img/common/blog-details/img-5.jpg" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <ul class="sidebar__post-meta list-unstyled">
                                                        <li>
                                                            <p><span class="icon-tags"></span>Technology</p>
                                                        </li>
                                                        <li>
                                                            <p><span class="icon-calendar"></span>08 May 2025</p>
                                                        </li>
                                                    </ul>
                                                    <h3 class="sidebar__post-title"><a href="podcast-details.php">How AR
                                                            is Transforming Live Performances</a></h3>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="sidebar__post-image">
                                                    <img src="assets/img/common/blog-details/img-4.jpg" alt="">
                                                </div>
                                                <div class="sidebar__post-content">
                                                    <ul class="sidebar__post-meta list-unstyled">
                                                        <li>
                                                            <p><span class="icon-tags"></span>Music</p>
                                                        </li>
                                                        <li>
                                                            <p><span class="icon-calendar"></span>06 May 2025</p>
                                                        </li>
                                                    </ul>
                                                    <h3 class="sidebar__post-title"><a
                                                            href="podcast-details.php">Creating
                                                            the Ultimate Festival Survival Guide</a></h3>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Blog Details End-->
                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const player = document.getElementById('thaalam-player');
            const playPauseBtn = document.querySelector('.play-pause-btn');
            const progressBar = document.querySelector('.progress-bar');
            const progressSlider = document.querySelector('.progress-slider');
            const currentTimeDisplay = document.querySelector('.current-time');
            const durationDisplay = document.querySelector('.duration');
            const volumeBtn = document.querySelector('.volume-btn');
            const volumeSlider = document.querySelector('.volume-slider');
            const fullscreenBtn = document.querySelector('.fullscreen-btn');

            // Play/Pause functionality
            playPauseBtn.addEventListener('click', function () {
                if (player.paused) {
                    player.play();
                    playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
                } else {
                    player.pause();
                    playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
                }
            });

            // Update progress bar
            player.addEventListener('timeupdate', function () {
                const percent = (player.currentTime / player.duration) * 100;
                progressBar.style.width = percent + '%';
                progressSlider.value = percent;

                // Update time display
                currentTimeDisplay.textContent = formatTime(player.currentTime);
                if (player.duration) {
                    durationDisplay.textContent = formatTime(player.duration);
                }
            });

            // Seek functionality
            progressSlider.addEventListener('input', function () {
                const seekTime = (progressSlider.value / 100) * player.duration;
                player.currentTime = seekTime;
            });

            // Volume control
            volumeSlider.addEventListener('input', function () {
                player.volume = volumeSlider.value;
                updateVolumeIcon();
            });

            volumeBtn.addEventListener('click', function () {
                if (player.volume > 0) {
                    player.volume = 0;
                    volumeSlider.value = 0;
                } else {
                    player.volume = 1;
                    volumeSlider.value = 1;
                }
                updateVolumeIcon();
            });

            function updateVolumeIcon() {
                if (player.volume === 0) {
                    volumeBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
                } else if (player.volume < 0.5) {
                    volumeBtn.innerHTML = '<i class="fas fa-volume-down"></i>';
                } else {
                    volumeBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
                }
            }

            // Format time (seconds to MM:SS)
            function formatTime(seconds) {
                const minutes = Math.floor(seconds / 60);
                const secs = Math.floor(seconds % 60);
                return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
            }

            // Fullscreen button (for future implementation)
            fullscreenBtn.addEventListener('click', function () {
                // Implement fullscreen functionality if needed
                console.log('Fullscreen functionality would go here');
            });

            // Initialize
            updateVolumeIcon();
        });
    </script>



</body>

</html>
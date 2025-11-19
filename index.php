<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Thaalam Radio | Online Tamil Radio, Podcasts & Live Streaming from Switzerland</title>
    <meta name="title" content="Thaalam Radio | Online Tamil Radio, Podcasts & Live Streaming from Switzerland">
    <meta name="description" content="Listen to Thaalam Radio – Switzerland’s favorite online Tamil radio station. Stream live music, RJ shows, podcasts, and stay updated on star-studded events. Join the Thaalam community today!">
    <meta name="keywords" content="Thaalam Radio, Online Radio Switzerland, Tamil Radio Zurich, RJ Shows, Indian Podcasts, Live Music Streaming, Thaalam Broadcasting, Events, Tamil Songs">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://thaalam.ch/">
    <meta property="og:title" content="Thaalam Radio | Online Tamil Radio, Podcasts & Live Streaming">
    <meta property="og:description" content="Stream 24/7 music, live radio shows, and podcasts from Thaalam Radio – Switzerland’s trusted Tamil radio platform.">
    <meta property="og:image" content="https://thaalam.ch/assets/img/logo/thalam-logo.png">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://thaalam.ch/">
    <meta name="twitter:title" content="Thaalam Radio | Online Tamil Radio, Podcasts & Live Streaming">
    <meta name="twitter:description" content="Listen live to Thaalam Radio, enjoy RJ shows, podcasts, and more.">
    <meta name="twitter:image" content="https://thaalam.ch/assets/img/logo/thalam-logo.png">

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = 'home'; ?>

    <?php include 'php/analyticsBody.php'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <!-- <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div> -->

            <div>
                <?php include 'php/header.php'; ?>

                <!-- Main Slider Start -->
                <section class="main-slider">
                    <div class="main-slider__carousel owl-carousel owl-theme">

                    </div>
                </section>
                <!--Main Slider Start -->

                <!-- Podcast Show Section -->
                <div class="festival-wrapper">
                    <img id="festivalLeft" alt="Festival Left" class="festival-side left">
                    <img id="festivalRight" alt="Festival Right" class="festival-side right">

                    <div class="playlist-container position-relative" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">

                        <div class="col-xl-12">
                            <div class="home-page__header">
                                <h1 class="home-page__title">Thaalam <span style="color:#000">BroadCasting</span></h1>
                                <p class="home-page__subtitle">Streaming & Audio</p>
                            </div>

                            <div class="home-page__filter">
                                <!-- <div class="home-page__search">
                                <input type="text" placeholder="Search what you want...">
                                <button class="home-page__search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div> -->

                                <div class="home-page__categories">
                                    <ul class="list-unstyled nav" role="tablist">
                                        <li class="active nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#liveStream" role="tab">Radio</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#podcasts" role="tab">Podcasts</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/events-list" target="_blank" rel="noopener">
                                                Event
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="tab-content" style="margin-bottom: 50px;">
                        <div class="tab-pane fade show active" id="liveStream" role="tabpanel">
                            <section style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                                <div class="container">
                                    <div class="row">
                                        <div class="audio-page__player">
                                            <div class="audio-page__player-cover">
                                                <img id="programImage" alt="Thaalam Live">
                                                <div class="audio-page__player-overlay">
                                                </div>
                                            </div>
                                            <div class="audio-page__player-info">
                                                <h3 id="programTitle" class="audio-page__player-title">Thaalam Live Stream</h3>
                                                <div class="audio-page__player-artist">
                                                    <p>Rj Name: <span id="programArtist"></span></p>
                                                    <p id="showTime">Show Time: </p>
                                                </div>
                                                <div class="audio-page__player-controls">
                                                    <button class="audio-page__play-btn" id="mainPlayBtn">
                                                        <i class="fas fa-play" id="mainPlayIcon"></i>
                                                    </button>
                                                    <button class="audio-page__player-btn" id="volumeBtn">
                                                        <i class="fas fa-volume-up" id="volumeIcon"></i>
                                                    </button>
                                                    <input type="range" id="volumeSlider" min="0" max="1" step="0.1" value="0.7">
                                                    <button class="audio-page__player-btn" id="shareBtn">
                                                        <i class="fas fa-share-alt"></i>
                                                    </button>

                                                </div>
                                                <div id="nextProgramNotice" class="blinking"></div>
                                                <audio id="audioPlayer" src="https://thaalam.out.airtime.pro/thaalam_b" autoplay></audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                        <div class="tab-pane fade" id="podcasts" role="tabpanel">
                            <section class="live-class-two" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6">
                                            <div class="live-class-two__left">
                                                <div class="section-title-two text-left sec-title-animation animation-style2">
                                                    <div class="section-title-two__tagline-box">
                                                        <div class="section-title-two__tagline-shape">
                                                            <img src="assets/img/home/rock.png" alt="">
                                                        </div>
                                                        <span class="section-title-two__tagline">Podcasts</span>
                                                    </div>
                                                    <h2 class="section-title-two__title title-animation">Discover Our Latest <br>
                                                        <span>Podcasts</span>
                                                    </h2>
                                                </div>
                                                <ul class="live-class-two__list list-unstyled">
                                                </ul>
                                                <div class="listen-more">
                                                    <a href="podcasts-list">Listen More</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6" style="display: flex; align-items: center; justify-content: center;">
                                            <div class="live-class-two__right">
                                                <div class="live-class-two__img-box mob-top3">
                                                    <iframe
                                                        loading="lazy"
                                                        width="100%"
                                                        height="315"
                                                        src="https://www.youtube.com/embed/D7EIkNH8NeU"
                                                        title="Dunkin' Crowns Gavin Casalegno King Of Summer"
                                                        frameborder="0"
                                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                        allowfullscreen>
                                                    </iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>

                <div id="popupBanner">
                    <div class="popupBanner-container">
                        <img src="" alt="popup banner image" id="popupBanner-image">
                        <p id="close-popupBanner">X</p>
                    </div>
                </div>

                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <script src="assets/js/module/index.js" defer></script>
    <script>
        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(e) {
                document.querySelectorAll('.home-page__categories .nav-item').forEach(li => li.classList.remove('active'));
                e.target.closest('.nav-item').classList.add('active');
            });
        });
    </script>


</body>

</html>
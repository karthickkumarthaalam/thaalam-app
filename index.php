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
                                        <a class="nav-link" href="#" target="_blank" rel="noopener">
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
                                            <img id="programImage" src="assets/img/common/audio/music-poster.jpg" alt="Thaalam Live">
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
                                                <a href="podcasts">Listen More</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6" style="display: flex; align-items: center; justify-content: center;">
                                        <div class="live-class-two__right">
                                            <div class="live-class-two__img-box mob-top3">
                                                <iframe
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


                    <div class="tab-pane fade" id="blogs" role="tabpanel">
                        <section class="blog-one" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-3.png');background-size: contain;">
                            <div class="container">
                                <div class="section-title text-center sec-title-animation animation-style1">
                                    <div class="section-title__tagline-box">
                                        <div class="section-title__tagline-shape"></div>
                                        <span class="section-title__tagline">Our Blogs</span>
                                    </div>
                                    <h2 class="section-title__title title-animation">Event Highlights & Stories<br>
                                        <span>Latest from Thaalam <img src="assets/images/shapes/section-title-shape-1.png"
                                                alt=""></span>
                                    </h2>
                                </div>
                                <div class="blog-one__carousel owl-theme owl-carousel">
                                    <!-- Blog One Single Start -->
                                    <div class="item">
                                        <div class="blog-one__single">
                                            <div class="blog-one__img">
                                                <img src="assets/img/home/events/Image1.jpg" alt="">
                                            </div>
                                            <div class="blog-one__content">
                                                <ul class="blog-one__meta list-unstyled">
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-calendar"></span>June 10,
                                                            2025</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-comment"></span>120
                                                            Comments</a>
                                                    </li>
                                                </ul>
                                                <h3 class="blog-one__title"><a href="javascript:;">Anirudh Live in Concert: A
                                                        Night
                                                        to Remember</a></h3>
                                                <p class="blog-one__text">Relive the electrifying moments from Anirudh’s
                                                    Rockstar
                                                    Night,
                                                    where fans were treated to a spectacular musical journey and unforgettable
                                                    performances.</p>
                                                <div class="blog-one__btn-and-user-box">
                                                    <div class="blog-one__btn-box">
                                                        <a href="javascript:;" class="thm-btn"><span
                                                                class="icon-angles-right"></span>Read
                                                            More</a>
                                                    </div>
                                                    <div class="blog-one__user-box">
                                                        <div class="blog-one__user-img">
                                                            <img src="assets/images/blog/blog-one-user-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="blog-one__user-content">
                                                            <h5 class="blog-one__user-name">Priya</h5>
                                                            <p class="blog-one__user-sub-title">Blogger</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Blog One Single End -->
                                    <!-- Blog One Single Start -->
                                    <div class="item">
                                        <div class="blog-one__single">
                                            <div class="blog-one__img">
                                                <img src="assets/img/home/events/Image2.jpg" alt="">
                                            </div>
                                            <div class="blog-one__content">
                                                <ul class="blog-one__meta list-unstyled">
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-calendar"></span>May 22,
                                                            2025</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-comment"></span>98 Comments</a>
                                                    </li>
                                                </ul>
                                                <h3 class="blog-one__title"><a href="javascript:;">Behind the Scenes: Kollywood
                                                        Star
                                                        Awards</a></h3>
                                                <p class="blog-one__text">Go backstage with us at the Kollywood Star Awards 2025
                                                    and
                                                    discover what it takes to organize a star-studded entertainment event in
                                                    Chennai.
                                                </p>
                                                <div class="blog-one__btn-and-user-box">
                                                    <div class="blog-one__btn-box">
                                                        <a href="javascript:;" class="thm-btn"><span
                                                                class="icon-angles-right"></span>Read
                                                            More</a>
                                                    </div>
                                                    <div class="blog-one__user-box">
                                                        <div class="blog-one__user-img">
                                                            <img src="assets/images/blog/blog-one-user-img-2.jpg" alt="">
                                                        </div>
                                                        <div class="blog-one__user-content">
                                                            <h5 class="blog-one__user-name">Arun</h5>
                                                            <p class="blog-one__user-sub-title">Reporter</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Blog One Single End -->
                                    <!-- Blog One Single Start -->
                                    <div class="item">
                                        <div class="blog-one__single">
                                            <div class="blog-one__img">
                                                <img src="assets/img/home/events/Image3.jpg" alt="">
                                            </div>
                                            <div class="blog-one__content">
                                                <ul class="blog-one__meta list-unstyled">
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-calendar"></span>April 15,
                                                            2025</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-comment"></span>75 Comments</a>
                                                    </li>
                                                </ul>
                                                <h3 class="blog-one__title"><a href="javascript:;">A.R. Rahman: The Maestro Live
                                                    </a></h3>
                                                <p class="blog-one__text">Experience the magic of A.R. Rahman’s live show,
                                                    featuring
                                                    mesmerizing music, dazzling lights, and a crowd of passionate fans.</p>
                                                <div class="blog-one__btn-and-user-box">
                                                    <div class="blog-one__btn-box">
                                                        <a href="javascript:;" class="thm-btn"><span
                                                                class="icon-angles-right"></span>Read
                                                            More</a>
                                                    </div>
                                                    <div class="blog-one__user-box">
                                                        <div class="blog-one__user-img">
                                                            <img src="assets/images/blog/blog-one-user-img-3.jpg" alt="">
                                                        </div>
                                                        <div class="blog-one__user-content">
                                                            <h5 class="blog-one__user-name">Meera</h5>
                                                            <p class="blog-one__user-sub-title">Writer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Blog One Single End -->
                                    <!-- Blog One Single Start -->
                                    <div class="item">
                                        <div class="blog-one__single">
                                            <div class="blog-one__img">
                                                <img src="assets/img/home/events/Image4.jpg" alt="">
                                            </div>
                                            <div class="blog-one__content">
                                                <ul class="blog-one__meta list-unstyled">
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-calendar"></span>March 30,
                                                            2025</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-comment"></span>60 Comments</a>
                                                    </li>
                                                </ul>
                                                <h3 class="blog-one__title"><a href="javascript:;">South Vibe: Urban Tamil Moves
                                                        Recap</a></h3>
                                                <p class="blog-one__text">Catch the highlights from South Vibe, where dance and
                                                    music
                                                    blended for an energetic celebration of Tamil culture and urban artistry.
                                                </p>
                                                <div class="blog-one__btn-and-user-box">
                                                    <div class="blog-one__btn-box">
                                                        <a href="javascript:;" class="thm-btn"><span
                                                                class="icon-angles-right"></span>Read
                                                            More</a>
                                                    </div>
                                                    <div class="blog-one__user-box">
                                                        <div class="blog-one__user-img">
                                                            <img src="assets/images/blog/blog-one-user-img-1.jpg" alt="">
                                                        </div>
                                                        <div class="blog-one__user-content">
                                                            <h5 class="blog-one__user-name">Nisha Dev</h5>
                                                            <p class="blog-one__user-sub-title">Blogger</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Blog One Single End -->
                                    <!-- Blog One Single Start -->
                                    <div class="item">
                                        <div class="blog-one__single">
                                            <div class="blog-one__img">
                                                <img src="assets/img/home/events/Image5.jpg" alt="">
                                            </div>
                                            <div class="blog-one__content">
                                                <ul class="blog-one__meta list-unstyled">
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-calendar"></span>February 12,
                                                            2025</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-comment"></span>45 Comments</a>
                                                    </li>
                                                </ul>
                                                <h3 class="blog-one__title"><a href="javascript:;">Yuvan Reloaded: Night Vibes
                                                        in
                                                        Kandy</a></h3>
                                                <p class="blog-one__text">A look back at Yuvan’s energetic performance in Kandy,
                                                    where
                                                    fans
                                                    danced the night away to his greatest hits and new tracks.</p>
                                                <div class="blog-one__btn-and-user-box">
                                                    <div class="blog-one__btn-box">
                                                        <a href="javascript:;" class="thm-btn"><span
                                                                class="icon-angles-right"></span>Read
                                                            More</a>
                                                    </div>
                                                    <div class="blog-one__user-box">
                                                        <div class="blog-one__user-img">
                                                            <img src="assets/images/blog/blog-one-user-img-2.jpg" alt="">
                                                        </div>
                                                        <div class="blog-one__user-content">
                                                            <h5 class="blog-one__user-name">Rahul</h5>
                                                            <p class="blog-one__user-sub-title">Explorer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Blog One Single End -->
                                    <!-- Blog One Single Start -->
                                    <div class="item">
                                        <div class="blog-one__single">
                                            <div class="blog-one__img">
                                                <img src="assets/img/home/events/Image6.jpg" alt="">
                                            </div>
                                            <div class="blog-one__content">
                                                <ul class="blog-one__meta list-unstyled">
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-calendar"></span>January 28,
                                                            2025</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;"><span class="icon-comment"></span>38 Comments</a>
                                                    </li>
                                                </ul>
                                                <h3 class="blog-one__title"><a href="javascript:;">GV Prakash: Musical Madness
                                                        in
                                                        Trichy</a></h3>
                                                <p class="blog-one__text">Read about the high-energy night with GV Prakash,
                                                    where
                                                    Trichy’s
                                                    audience was swept away by his dynamic stage presence and hit songs.</p>
                                                <div class="blog-one__btn-and-user-box">
                                                    <div class="blog-one__btn-box">
                                                        <a href="javascript:;" class="thm-btn"><span
                                                                class="icon-angles-right"></span>Read
                                                            More</a>
                                                    </div>
                                                    <div class="blog-one__user-box">
                                                        <div class="blog-one__user-img">
                                                            <img src="assets/images/blog/blog-one-user-img-3.jpg" alt="">
                                                        </div>
                                                        <div class="blog-one__user-content">
                                                            <h5 class="blog-one__user-name">Lakshmi</h5>
                                                            <p class="blog-one__user-sub-title">Reviewer</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </section>
                    </div>
                </div>

                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <script src="assets/js/module/index.js"></script>

    <script>
        // News Flash
        const newsList = [
            "Anirudh Live Concert Announced for July 2025",
            "Kollywood Star Awards 2025: Nominees Revealed",
            "A.R. Rahman Announces European Tour Dates",
            "South Vibe Festival Returns to Zurich This August"
        ];
        let newsIdx = 0;
        const newsFlashText = document.getElementById('newsFlashText');

        function showNews() {
            newsFlashText.style.opacity = 0;
            setTimeout(() => {
                newsFlashText.textContent = newsList[newsIdx];
                newsFlashText.style.opacity = 1;
                newsIdx = (newsIdx + 1) % newsList.length;
            }, 400);
        }
        newsFlashText.textContent = newsList[0];
        setInterval(showNews, 3500);
    </script>
    <script>
        // Ads randomizer for 3 slots
        const adsArr = [{
                img: "assets/img/home/sponsor/Image-12.png",
                link: "#"
            },
            {
                img: "assets/img/home/sponsor/Image-11.png",
                link: "#"
            },
            {
                img: "assets/img/home/sponsor/Image-13.png",
                link: "#"
            },
            {
                img: "assets/img/home/sponsor/Image-14.png",
                link: "#"
            },
            {
                img: "assets/img/home/sponsor/Image15.png",
                link: "#"
            }
        ];

        function getRandomAds(arr, count) {
            const shuffled = arr.slice().sort(() => 0.5 - Math.random());
            return shuffled.slice(0, count);
        }
        const adsImgEls = [
            document.getElementById('adsImg'),
            document.getElementById('adsImg2'),
            document.getElementById('adsImg3')
        ];
        const adsLinkEls = [
            document.getElementById('adsLink'),
            document.getElementById('adsLink2'),
            document.getElementById('adsLink3')
        ];

        function showRandomAds() {
            const selected = getRandomAds(adsArr, 3);
            for (let i = 0; i < 3; i++) {
                adsImgEls[i].src = selected[i].img;
                adsLinkEls[i].href = selected[i].link;
            }
        }
        showRandomAds();
        setInterval(showRandomAds, 3000);
    </script>
    <script>
        // Visualizer bar creation

        document.querySelectorAll('[data-bs-toggle="tab"]').forEach(tab => {
            tab.addEventListener('shown.bs.tab', function(e) {
                document.querySelectorAll('.home-page__categories .nav-item').forEach(li => li.classList.remove('active'));
                e.target.closest('.nav-item').classList.add('active');
            });
        });

        function createVisualizerBars(container) {
            container.innerHTML = '';
            for (let i = 0; i < 7; i++) {
                const bar = document.createElement('div');
                bar.className = 'bar';
                bar.style.height = (8 + Math.random() * 32) + 'px';
                container.appendChild(bar);
            }
        }
        document.querySelectorAll('.audio-visualizer').forEach(createVisualizerBars);

        // Audio icon click logic
        document.querySelectorAll('.audio-card').forEach(card => {
            const iconBtn = card.querySelector('.audio-icon-btn');
            const audio = card.querySelector('.audio-player');
            const visualizer = card.querySelector('.audio-visualizer');
            let animId;

            function animateBars() {
                const bars = visualizer.querySelectorAll('.bar');
                bars.forEach((bar, i) => {
                    bar.style.height = (12 + Math.random() * 36) + 'px';
                    bar.style.background = `linear-gradient(180deg, #000 0%, #D50000 100%)`;
                    bar.style.boxShadow = `0 0 12px #D50000${Math.floor(80 + Math.random() * 100).toString(16)}`;
                });
                animId = requestAnimationFrame(animateBars);
            }

            iconBtn.addEventListener('click', () => {
                // Pause all others
                document.querySelectorAll('.audio-player').forEach(p => {
                    if (p !== audio) {
                        p.pause();
                        p.currentTime = 0;
                        p.parentElement.querySelector('.audio-visualizer').style.opacity = 0;
                        cancelAnimationFrame(p._animId);
                    }
                });
                // Play/pause this
                if (audio.paused) {
                    audio.play();
                    visualizer.style.opacity = 1;
                    animateBars();
                    audio._animId = animId;
                } else {
                    audio.pause();
                    visualizer.style.opacity = 0;
                    cancelAnimationFrame(animId);
                }
            });

            audio.addEventListener('play', () => {
                visualizer.style.opacity = 1;
                animateBars();
                audio._animId = animId;
            });
            audio.addEventListener('pause', () => {
                visualizer.style.opacity = 0;
                cancelAnimationFrame(animId);
            });
            audio.addEventListener('ended', () => {
                visualizer.style.opacity = 0;
                cancelAnimationFrame(animId);
            });
        });
    </script>


</body>

</html>
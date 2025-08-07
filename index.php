<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
<?php $pagename = 'home'; ?>

    <?php include 'php/preloader.php'; ?>
    

    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div>

            <div class="col-lg-80">
                <?php include 'php/header.php'; ?>

                <!-- Main Slider Start -->
                <section class="main-slider">
                    <div class="main-slider__carousel owl-carousel owl-theme">
                        <div class="item">
                            <div class="main-slider__bg"
                                style="background-image: url(assets/img/home/banner/banner-2.jpg);">
                            </div>
                        </div>

                        <div class="item">
                            <div class="main-slider__bg"
                                style="background-image: url(assets/img/home/banner/banner-3.jpg);">
                            </div>
                        </div>

                        <div class="item">
                            <div class="main-slider__bg"
                                style="background-image: url(assets/img/home/banner/banner-1.jpg);">
                            </div>
                        </div>

                    </div>
                </section>
                <!--Main Slider Start -->

                <!-- Podcast Show Section -->
                <div class="playlist-container position-relative" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">

                    <div class="section-title-two text-center sec-title-animation animation-style2">
                        <div class="section-title-two__tagline-box">
                            <span class="section-title-two__tagline">🎶 Listen Live</span>
                        </div>
                        <h2 class="section-title-two__title title-animation"> Thaalam <span>Switzerland</span>
                        </h2>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="live-main-box d-flex flex-wrap align-items-center p-4"
                                style="background: #fff; border-radius: 18px; box-shadow: 0 0px 10px 0 rgba(2, 2, 2, 0.3);">

                                <!-- Left: RJ Image -->
                                <div class="col-lg-4 col-md-4 text-center mb-3 mb-lg-0">
                                    <img src="assets/img/home/rj/RJ-5.jpg" id="rjHostImg" alt="Host"
                                        class="img-fluid shadow">
                                </div>
                                <!-- Right: Details -->
                                <div class="col-lg-8 col-md-8 ps-4">
                                    <div class="d-flex align-items-center mb-2">
                                        <audio controls style="width:100%;">
                                            <source src="https://thaalam.out.airtime.pro/thaalam_b" type="audio/mp3" />
                                            Your browser does not support the audio element.
                                        </audio>
                                    </div>

                                    <div class="mb-2">
                                        <span><strong>Show Name:</strong> <span class="text-muted">வணக்கம் Schweiz,
                                                Suisse,
                                                Svizzera</span></span>
                                    </div>
                                    <div class="mb-2">
                                        <span><strong>RJ Name:</strong> <span class="text-muted">RJ Shree</span></span>
                                    </div>
                                    <div class="mb-2">
                                        <span><strong>Time:</strong> <span class="text-muted">07:00 -
                                                10:00</span></span>
                                    </div>
                                    <!-- News Flash -->
                                    <div class="news-flash mb-3 p-3 d-flex align-items-center"
                                        style="background: linear-gradient(90deg, #e9e9e9 60%, #d9d9d9 100%); border-left: 3px solid #D50000; box-shadow: 0 2px 12px 0 rgba(213,0,0,0.08);">
                                        <span class="badge bg-danger me-3" style="font-size:1rem;">FLASH</span>
                                        <div class="news-flash-text" id="newsFlashText"
                                            style="font-weight:600; font-size:1.08rem; color:#272727;">
                                            <!-- News will appear here -->
                                        </div>
                                    </div>
                                    <!-- Ads -->
                                    <h5 class="text-muted">Sponserd By</h5>
                                    <div class="spons-box mt-2">
                                        <a href="#" target="_blank" id="adsLink">
                                            <img src="assets/img/home/sponsor/Image-11.png" id="adsImg" alt="Ad"
                                                class="img-fluid rounded shadow-sm">
                                        </a>
                                        <a href="#" target="_blank" id="adsLink2">
                                            <img src="assets/img/home/sponsor/Image-12.png" id="adsImg2" alt="Ad"
                                                class="img-fluid rounded shadow-sm">
                                        </a>
                                        <a href="#" target="_blank" id="adsLink3">
                                            <img src="assets/img/home/sponsor/Image-13.png" id="adsImg3" alt="Ad"
                                                class="img-fluid rounded shadow-sm">
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <!-- Podcast Show Section End -->

                <!-- Team One Start -->
                <section class="team-one" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-3.png');background-size: contain;">
                    <div class="team-one__shape-1 shapemover">
                        <img src="assets/images/shapes/team-one-shape-1.png" alt="">
                    </div>
                    <div class="team-one__shape-2 float-bob-y">
                        <img src="assets/images/shapes/team-one-shape-2.png" alt="">
                    </div>
                    <div class="team-one__shape-3">
                        <img src="assets/images/shapes/team-one-shape-3.png" alt="">
                    </div>
                    <div class="team-one__shape-4 float-bob-x">
                        <img src="assets/images/shapes/team-one-shape-4.png" alt="">
                    </div>
                    <div class="container">
                        <div class="section-title text-left sec-title-animation animation-style2">
                            <div class="section-title__tagline-box">
                                <div class="section-title__tagline-shape"></div>
                                <span class="section-title__tagline">RJ Portfolio</span>
                            </div>
                            <h2 class="section-title__title title-animation">Meet the Team Passionate <br>People,
                                Exceptional
                                <span>Talents <img src="assets/images/shapes/section-title-shape-1.png" alt=""></span>
                            </h2>
                        </div>
                        <div class="team-one__carousel owl-theme owl-carousel">
                            <!--Team One Single Start-->
                            <div class="item">
                                <div class="team-one__single">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="assets/img/home/rj/RJ-5.jpg" alt="">
                                        </div>
                                        <div class="team-one__content">
                                            <div class="team-one__single-bg-shape"
                                                style="background-image: url(assets/images/shapes/team-one-single-bg-shape.png);">
                                            </div>
                                            <div class="team-one__content-shape-1">
                                                <img src="assets/images/shapes/team-one-content-shape-1.png" alt="">
                                            </div>
                                            <div class="team-one__content-shape-2">
                                                <img src="assets/images/shapes/team-one-content-shape-2.png" alt="">
                                            </div>
                                            <div class="team-one__plus-and-social">
                                                <div class="team-one__plus">
                                                    <span class="icon-plus"></span>
                                                </div>
                                                <div class="team-one__social">
                                                    <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                                    <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="team-one__title"><a href="instructor-details.html">இரா. தர்சன்
                                                </a>
                                            </h3>
                                            <p class="team-one__sub-title">Suisse, Svizzera</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Team One Single End-->
                            <!--Team One Single Start-->
                            <div class="item">
                                <div class="team-one__single">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="assets/img/home/rj/RJ-4.jpg" alt="">
                                        </div>
                                        <div class="team-one__content">
                                            <div class="team-one__single-bg-shape"
                                                style="background-image: url(assets/images/shapes/team-one-single-bg-shape.png);">
                                            </div>
                                            <div class="team-one__content-shape-1">
                                                <img src="assets/images/shapes/team-one-content-shape-1.png" alt="">
                                            </div>
                                            <div class="team-one__content-shape-2">
                                                <img src="assets/images/shapes/team-one-content-shape-2.png" alt="">
                                            </div>
                                            <div class="team-one__plus-and-social">
                                                <div class="team-one__plus">
                                                    <span class="icon-plus"></span>
                                                </div>
                                                <div class="team-one__social">
                                                    <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                                    <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="team-one__title"><a href="instructor-details.html">செல்வா </a>
                                            </h3>
                                            <p class="team-one__sub-title">கேட்டாலே பரவசம்</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Team One Single End-->
                            <!--Team One Single Start-->
                            <div class="item">
                                <div class="team-one__single">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="assets/img/home/rj/RJ-3.jpg" alt="">
                                        </div>
                                        <div class="team-one__content">
                                            <div class="team-one__single-bg-shape"
                                                style="background-image: url(assets/images/shapes/team-one-single-bg-shape.png);">
                                            </div>
                                            <div class="team-one__content-shape-1">
                                                <img src="assets/images/shapes/team-one-content-shape-1.png" alt="">
                                            </div>
                                            <div class="team-one__content-shape-2">
                                                <img src="assets/images/shapes/team-one-content-shape-2.png" alt="">
                                            </div>
                                            <div class="team-one__plus-and-social">
                                                <div class="team-one__plus">
                                                    <span class="icon-plus"></span>
                                                </div>
                                                <div class="team-one__social">
                                                    <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                                    <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="team-one__title"><a href="instructor-details.html">துஷிகா </a>
                                            </h3>
                                            <p class="team-one__sub-title">நிலவு தூங்கும் நேரம்</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Team One Single End-->
                            <!--Team One Single Start-->
                            <div class="item">
                                <div class="team-one__single">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="assets/img/home/rj/RJ-2.jpg" alt="">
                                        </div>
                                        <div class="team-one__content">
                                            <div class="team-one__single-bg-shape"
                                                style="background-image: url(assets/images/shapes/team-one-single-bg-shape.png);">
                                            </div>
                                            <div class="team-one__content-shape-1">
                                                <img src="assets/images/shapes/team-one-content-shape-1.png" alt="">
                                            </div>
                                            <div class="team-one__content-shape-2">
                                                <img src="assets/images/shapes/team-one-content-shape-2.png" alt="">
                                            </div>
                                            <div class="team-one__plus-and-social">
                                                <div class="team-one__plus">
                                                    <span class="icon-plus"></span>
                                                </div>
                                                <div class="team-one__social">
                                                    <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                                    <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="team-one__title"><a href="instructor-details.html">சுமி கிருஷ்ணா
                                                </a>
                                            </h3>
                                            <p class="team-one__sub-title">காற்றுக்கென்ன வேலி</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Team One Single End-->
                            <!--Team One Single Start-->
                            <div class="item">
                                <div class="team-one__single">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="assets/img/home/rj/RJ-1.jpg" alt="">
                                        </div>
                                        <div class="team-one__content">
                                            <div class="team-one__single-bg-shape"
                                                style="background-image: url(assets/images/shapes/team-one-single-bg-shape.png);">
                                            </div>
                                            <div class="team-one__content-shape-1">
                                                <img src="assets/images/shapes/team-one-content-shape-1.png" alt="">
                                            </div>
                                            <div class="team-one__content-shape-2">
                                                <img src="assets/images/shapes/team-one-content-shape-2.png" alt="">
                                            </div>
                                            <div class="team-one__plus-and-social">
                                                <div class="team-one__plus">
                                                    <span class="icon-plus"></span>
                                                </div>
                                                <div class="team-one__social">
                                                    <a href="#"><span class="fab fa-linkedin-in"></span></a>
                                                    <a href="#"><span class="fab fa-pinterest-p"></span></a>
                                                    <a href="#"><span class="fab fa-facebook-f"></span></a>
                                                    <a href="#"><span class="fab fa-instagram"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="team-one__title"><a href="instructor-details.html">மிது தில்லை
                                                </a>
                                            </h3>
                                            <p class="team-one__sub-title">போடு தாளம் போடு</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Team One Single End-->

                        </div>
                    </div>
                </section>
                <!-- Team One End -->

                <!--live class Two Start -->
                <section class="live-class-two" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
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
                                        <h2 class="section-title-two__title title-animation">Discover Our Latest<br>
                                            <span>Podcasts</span>
                                        </h2>
                                    </div>
                                    <ul class="live-class-two__list list-unstyled">
                                        <li>
                                            <a href="https://thaalam.out.airtime.pro/thaalam_b" type="audio/mp3"
                                                class="video-popup">
                                                <div class="live-class-two__icon"></div>
                                            </a>
                                            <div class="live-class-two__content">
                                                <ul class="live-class-two__content-meta-list list-unstyled">
                                                    <li>
                                                        <div class="icon">
                                                            <span class="icon-microphone"></span>
                                                        </div>
                                                        <p>Music & Culture</p>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <span class="icon-clock"></span>
                                                        </div>
                                                        <p>Every Monday</p>
                                                    </li>
                                                </ul>
                                                <h3 class="live-class-two__content-title"><a href="#">Thaalam FM: Weekly
                                                        Music Show</a></h3>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="https://thaalam.out.airtime.pro/thaalam_b" type="audio/mp3"
                                                class="video-popup">
                                                <div class="live-class-two__icon"></div>
                                            </a>
                                            <div class="live-class-two__content">
                                                <ul class="live-class-two__content-meta-list list-unstyled">
                                                    <li>
                                                        <div class="icon">
                                                            <span class="icon-microphone"></span>
                                                        </div>
                                                        <p>Interviews</p>
                                                    </li>
                                                    <li>
                                                        <div class="icon">
                                                            <span class="icon-clock"></span>
                                                        </div>
                                                        <p>Every Wednesday</p>
                                                    </li>
                                                </ul>
                                                <h3 class="live-class-two__content-title"><a href="#">RJ Talks:
                                                        Inspiring Stories</a></h3>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="live-class-two__right">

                                    <div class="live-class-two__img-box mob-top3">

                                        <img src="assets/img/home/podcast-img.jpg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--live class Two End -->

                <!-- Blog One Start -->
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
                            <!-- Blog One Single End -->
                        </div>
                    </div>
                </section>
                <!-- Blog One End -->


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>


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
        const adsArr = [
            { img: "assets/img/home/sponsor/Image-12.png", link: "#" },
            { img: "assets/img/home/sponsor/Image-11.png", link: "#" },
            { img: "assets/img/home/sponsor/Image-13.png", link: "#" },
            { img: "assets/img/home/sponsor/Image-14.png", link: "#" },
            { img: "assets/img/home/sponsor/Image15.png", link: "#" }
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
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
    <link rel="canonical" href="https://thaalam.ch/">
    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>

    <script src="https://cdn.tailwindcss.com"></script>
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "WebSite",
            "name": "Thaalam Radio",
            "url": "https://thaalam.ch",
            "description": "24/7 Tamil radio station with podcasts, RJ shows, and live streaming from Switzerland",
            "publisher": {
                "@type": "Organization",
                "name": "Thaalam Radio"
            },
            "potentialAction": {
                "@type": "ListenAction",
                "target": "https://thaalam.ch/"
            }
        }
    </script>
    <style>
        /* ================= Pure Banner Loader ================= */

        .banner-loader {
            position: absolute;
            inset: 0;
            z-index: 20;
            background: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        /* Main loader ring */
        .signal-loader {
            width: clamp(64px, 2vw, 120px);
            height: clamp(64px, 2vw, 120px);
            border-radius: 50%;
            border: 4px solid rgba(0, 0, 0, 0.08);
            border-top-color: #ff0000;
            animation: spin 1.2s linear infinite;
            position: relative;
        }



        /* Animations */
        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }


        /* Ensure slider area height */
        .main-slider {
            position: relative;
            min-height: 260px;
        }

        @media (min-width: 576px) {
            .main-slider {
                min-height: 360px;
            }
        }

        @media (min-width: 768px) {
            .main-slider {
                min-height: 460px;
            }
        }

        @media (min-width: 992px) {
            .main-slider {
                min-height: 560px;
            }
        }

        @media (min-width: 1200px) {
            .main-slider {
                min-height: 700px;
            }
        }

        .festival-side {
            display: none;
        }

        .festival-side[src] {
            display: block;
        }

        .rewind-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        @keyframes rewindSvg {
            0% {
                transform: translateX(0);
                opacity: 0.6;
            }

            50% {
                transform: translateX(-3px);
                opacity: 1;
            }

            100% {
                transform: translateX(0);
                opacity: 0.6;
            }
        }

        .rewind-svg {
            animation: rewindSvg 1.6s ease-in-out infinite;
            color: #ef4444;
            /* Christmas / Rewind red */
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease-out both;
        }

        @keyframes spinSlow {
            to {
                transform: rotate(360deg);
            }
        }

        .animate-spin-slow {
            animation: spinSlow 8s linear infinite;
        }

        .skeleton {
            background: linear-gradient(90deg,
                    #f1f1f1 25%,
                    #e5e5e5 37%,
                    #f1f1f1 63%);
            background-size: 400% 100%;
            animation: skeleton-loading 1.4s ease infinite;
            border-radius: 8px;
        }

        @keyframes skeleton-loading {
            0% {
                background-position: 100% 0;
            }

            100% {
                background-position: 0 0;
            }
        }
    </style>

</head>

<body class="custom-cursor">
    <?php $pagename = 'home'; ?>

    <?php include 'php/analyticsBody.php'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <!-- <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div> -->

            <div>
                <?php include 'php/header.php'; ?>

                <!-- Main Slider Start -->
                <section class="main-slider">
                    <h2 class="visually-hidden">24/7 Live Tamil radio streaming and shows from Switzerland</h2>
                    <div id="bannerLoader" class="banner-loader">
                        <div class="signal-loader"></div>
                    </div>
                    <div class="main-slider__carousel owl-carousel owl-theme">

                    </div>
                </section>
                <!--Main Slider Start -->

                <!-- Podcast Show Section -->
                <div class="festival-wrapper">
                    <img id="festivalLeft" alt="Festival Left" class="festival-side left">
                    <img id="festivalRight" alt="Festival Right" class="festival-side right">


                    <div class="" style="
                              background-image: url('assets/images/backgrounds/background_image.jpg');
                              background-size: cover;
                              background-position: center;
                              background-repeat: no-repeat;
                            ">
                        <div class="home-page__header animate-fade-up mt-2">
                            <h1 class="home-page__title">Thaalam <span style="color:#000">BroadCasting</span></h1>
                            <p class="home-page__subtitle">Streaming & Audio</p>
                        </div>

                        <section class="md:pb-10 border-b  border-gray-300">

                            <div class="container mx-auto p-0 px-3">
                                <div class="flex justify-center items-center">
                                    <div class="w-full relative
                                                     bg-white/25
                                                     backdrop-blur-xl
                                                     shadow-[0_25px_60px_rgba(0,0,0,0.1)]
                                                     rounded-2xl
                                                     border border-white/30
                                                     overflow-hidden
                                                     transition-all duration-300
                                                     hover:-translate-y-1
                                                     hover:shadow-[0_35px_80px_rgba(0,0,0,0.15)]">

                                        <div class="absolute top-0 left-0 h-[2px] w-full overflow-hidden bg-gradient-to-r from-transparent via-red-500 to-transparent"></div>

                                        <div class="absolute bottom-0 left-0 h-[2px] w-full overflow-hidden bg-gradient-to-r from-transparent via-red-500 to-transparent"></div>

                                        <div class="overflow-hidden rounded-2xl">
                                            <div class="gap-6 px-4 pt-0 pb-4 md:p-6">
                                                <div class="flex-1 w-full space-y-3">
                                                    <div class="flex flex-col  items-center justify-center  gap-3 sm:gap-4
                                                            pl-3 sm:pl-4 py-3  border-b border-dashed border-gray-500">

                                                        <img
                                                            id="programImage"
                                                            src="assets/img/logo/thalam-logo.png"
                                                            alt="Thaalam Live"
                                                            class="w-32 h-32 
                                                               rounded-xl object-contain" />

                                                        <div class="flex flex-col  leading-tight">

                                                            <h3
                                                                id="programTitle"
                                                                class="text-base text-center
                                                                 sm:text-lg md:text-xl font-semibold text-gray-900
                                                                 truncate max-w-[220px] sm:max-w-full
                                                                 mx-auto md:ml-auto mb-2">
                                                                Thaalam Live Stream
                                                            </h3>


                                                            <p class="text-sm text-gray-700 font-semibold flex items-center justify-center  gap-2  ">
                                                                <span id="programArtist">Live RJ</span>
                                                                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse "></span>
                                                            </p>

                                                            <p
                                                                id="showTime"
                                                                class="text-xs text-gray-500 flex items-center justify-center  gap-1 ">
                                                                <span>Now Streaming</span>
                                                            </p>
                                                        </div>
                                                    </div>




                                                    <div class="flex flex-wrap items-center justify-center   gap-4 mt-4 pl-6 ">


                                                        <button
                                                            id="volumeBtn"
                                                            class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 transition">
                                                            <i class="fas fa-volume-up" id="volumeIcon"></i>
                                                        </button>

                                                        <button
                                                            id="mainPlayBtn"
                                                            class="w-14 h-14 flex items-center justify-center rounded-full bg-gradient-to-br from-red-500 to-red-600  text-white shadow-md transition hover:scale-105">
                                                            <i class="fas fa-play" id="mainPlayIcon"></i>
                                                        </button>

                                                        <button
                                                            id="shareBtn"
                                                            class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-200 hover:bg-gray-300 text-gray-700 transition">
                                                            <i class="fas fa-share-alt"></i>
                                                        </button>
                                                    </div>

                                                    <div
                                                        id="nextProgramNotice"
                                                        class="text-sm text-red-500 text-center font-semibold animate-pulse mt-4"></div>

                                                    <audio
                                                        id="audioPlayer"
                                                        src="https://thaalam.out.airtime.pro/thaalam_b"
                                                        autoplay></audio>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php include 'php/quiz.php'; ?>
                            </div>
                        </section>

                        <section class="py-8  bg-gradient-to-r from-slate-50 via-white  to-slate-50">
                            <div class="max-w-7xl mx-auto px-4">

                                <div>
                                    <div class="mb-8 animate-fade-up">

                                        <h2 class="text-xl md:text-2xl text-center font-medium text-gray-900 ">
                                            Discover Our Latest <br>
                                            <span class="text-[#f90000]">Podcasts</span>
                                        </h2>
                                    </div>


                                    <div id="new-podcasts">
                                    </div>

                                    <div class="mt-6 flex justify-end">
                                        <a
                                            href="podcasts-list"
                                            class="inline-flex items-center gap-1 text-sm font-semibold text-gray-800 hover:text-gray-900 transition">
                                            Listen More Podcasts
                                            <span aria-hidden="true">→</span>
                                        </a>
                                    </div>


                                </div>
                            </div>
                        </section>


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


    <script src="assets/js/module/index.js" defer></script>
</body>

</html>
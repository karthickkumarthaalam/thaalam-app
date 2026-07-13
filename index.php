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
                max-height: 80vh;
            }
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

        .home-hero {
            background: radial-gradient(circle at 16% 20%, rgba(239, 68, 68, .18), transparent 31%), radial-gradient(circle at 83% 75%, rgba(248, 113, 113, .2), transparent 26%), #fff;
        }

        .home-grid {
            background-image: linear-gradient(rgba(248, 113, 113, .07) 1px, transparent 1px), linear-gradient(90deg, rgba(248, 113, 113, .07) 1px, transparent 1px);
            background-size: 32px 32px;
        }


        @keyframes skeleton-loading {
            0% {
                background-position: 100% 0;
            }

            100% {
                background-position: 0 0;
            }
        }

        @keyframes tickerScroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-100%);
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
        <div>
            <?php include 'php/header2.php'; ?>

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

            <section class="home-hero home-grid">
                <div class="mx-auto my-4 max-w-3xl px-4 sm:px-6">
                    <div class="text-center mb-6">
                        <p class="text-sm font-semibold uppercase tracking-[.35em] text-red-600">Live On Air</p>
                        <h2 class="mt-3 text-3xl sm:text-4xl font-bold text-slate-900"><span class="text-red-600">Thaalam</span> Broadcasting</h2>
                        <p class="mt-4 max-w-4xl mx-auto text-sm sm:text-base text-slate-600">Listen live to Switzerland’s Tamil radio station for nonstop music, exclusive live shows, and the latest local culture updates.</p>
                    </div>
                </div>
                <div class="mx-auto my-4">
                    <div class="w-full max-w-xl mx-auto rounded-[2rem] border border-white/80 bg-white/10 p-6 shadow-[0_24px_70px_rgba(15,23,42,.12)] backdrop-blur-sm">
                        <div class="flex flex-col items-center justify-center gap-3 sm:gap-4 pl-3 sm:pl-4 py-3  border-b border-dashed border-gray-500">
                            <img
                                id="programImage"
                                src="assets/img/logo/thalam-logo.png"
                                alt="Thaalam Live"
                                class="w-32 h-32 rounded-xl object-contain border border-gray-900" />

                            <div class="mt-5 text-center">
                                <p class="text-xs font-bold uppercase tracking-[.22em] text-slate-400">Now streaming</p>
                                <h2 id="programTitle" class="mt-2 text-xl md:text-2xl font-bold text-slate-800">Thaalam Live</h2>
                                <p id="showTime" class="mt-1 text-sm text-slate-500">Current show: Feel the rhythm with your favourite Tamil melodies.</p>
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
                            class="text-sm text-red-500 text-center font-semibold animate-pulse mt-4">
                        </div>

                        <audio
                            id="audioPlayer"
                            src="https://thaalam.out.airtime.pro/thaalam_b"
                            autoplay></audio>

                    </div>
                </div>
                <div id="flash-news-bar" class="my-4">
                </div>
            </section>


            <?php include 'php/quiz.php'; ?>

            <?php include 'php/footer.php'; ?>

        </div>

        <?php include 'php/mob-nav.php'; ?>

        <?php include 'php/scripts.php'; ?>


        <script src="assets/js/module/index.js" defer></script>
</body>

</html>
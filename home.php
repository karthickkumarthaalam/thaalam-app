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
        .home-hero {
            background: radial-gradient(circle at 16% 20%, rgba(239, 68, 68, .18), transparent 31%), radial-gradient(circle at 83% 75%, rgba(248, 113, 113, .2), transparent 26%), #fff;
        }

        .home-grid {
            background-image: linear-gradient(rgba(248, 113, 113, .07) 1px, transparent 1px), linear-gradient(90deg, rgba(248, 113, 113, .07) 1px, transparent 1px);
            background-size: 32px 32px;
        }

        .home-reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .home-reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        .rj-marquee {
            overflow: hidden;
            mask-image: linear-gradient(90deg, transparent, #000 7%, #000 93%, transparent);
        }

        .rj-track {
            display: flex;
            width: max-content;
            gap: 1.25rem;
            animation: rjScroll 38s linear infinite;
            padding: .5rem 0 1.5rem;
        }

        .rj-card {
            width: min(290px, 78vw);
        }

        .podcast-track {
            display: flex;
            width: max-content;
            gap: 1.25rem;
            padding: .5rem 0 1.5rem;
            animation: podcastScroll 40s linear infinite;
        }

        .podcast-card {
            width: min(320px, 82vw);
        }

        @keyframes rjScroll {
            to {
                transform: translateX(-50%);
            }
        }

        @keyframes podcastScroll {
            from {
                transform: translateX(-50%);
            }

            to {
                transform: translateX(0);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .home-reveal {
                opacity: 1;
                transform: none;
            }

            .rj-track,
            .podcast-track {
                animation: none;
                overflow-x: auto;
                width: auto;
            }
        }

        .signal {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            border: 2px solid transparent;
            border-top-color: rgba(239, 68, 68, .35);
            border-left-color: rgba(239, 68, 68, .35);
        }

        .signal1 {
            width: 340px;
            height: 340px;
            animation: rotateSignal 10s linear infinite;
        }

        .signal2 {
            width: 470px;
            height: 470px;
            animation: rotateSignal 15s linear infinite reverse;
        }

        .signal3 {
            width: 600px;
            height: 600px;
            animation: rotateSignal 20s linear infinite;
        }

        @keyframes rotateSignal {

            from {
                transform: translate(-50%, -50%) rotate(0);
            }

            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }

        }

        /* ===================== */
        /* Floating Icons */
        /* ===================== */

        .floating-icon {
            position: absolute;
            width: 54px;
            height: 54px;
            border-radius: 18px;
            background: rgba(255, 255, 255, .92);
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 0 15px 35px rgba(0, 0, 0, .08);
            color: #ef4444;
            z-index: 30;
        }

        .icon1 {
            left: 10%;
            top: 18%;
            animation: float1 5s ease-in-out infinite;
        }

        .icon2 {
            right: 8%;
            top: 22%;
            animation: float2 6s ease-in-out infinite;
        }

        .icon3 {
            left: 12%;
            bottom: 18%;
            animation: float3 7s ease-in-out infinite;
        }

        .icon4 {
            right: 12%;
            bottom: 15%;
            animation: float4 6s ease-in-out infinite;
        }

        /* Floating */

        @keyframes float1 {
            50% {
                transform: translateY(-14px) rotate(-6deg);
            }
        }

        @keyframes float2 {
            50% {
                transform: translateY(-18px) rotate(6deg);
            }
        }

        @keyframes float3 {
            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes float4 {
            50% {
                transform: translateY(-15px) rotate(-4deg);
            }
        }

        @media (max-width: 768px) {
            .signal {
                display: none
            }
        }
    </style>
</head>

<body class="custom-cursor bg-white text-slate-900">
    <?php $pagename = 'main'; ?>
    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>
    <?php include 'php/config-js.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header2.php'; ?>

        <main>
            <section class="home-hero home-grid relative isolate overflow-hidden px-4 py-12">
                <div class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1fr_1fr]">
                    <div class="home-reveal">
                        <p class="mb-4 text-xs font-black uppercase tracking-[.32em] text-red-500">Switzerland's official Tamil Radio</p>
                        <h1 class="max-w-xl text-3xl md:text-5xl font-bold leading-[1.05] text-slate-950">
                            Experience <br /> <span class="text-red-600">Thaalam Broadcast <br /></span> Live Across Switzerland

                        </h1>
                        <p class="mt-6 max-w-xl text-base leading-6 text-slate-600 sm:text-lg">
                            Stream live Tamil radio, timeless music, exclusive podcasts, and community programs—all from Switzerland's trusted Tamil broadcasting platform.
                        </p>
                        <div class="mt-8 grid max-w-sm grid-cols-2 gap-3">
                            <!-- Live -->
                            <a href="#listen-live"
                                class="group relative overflow-hidden rounded-2xl border border-red-100 bg-gradient-to-br from-blue-600 to-purple-500 p-4 text-white transition-all duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-purple-200">

                                <div class="absolute right-0 top-0 h-16 w-16 rounded-full bg-white/10 blur-xl"></div>

                                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 backdrop-blur-sm">
                                    <i class="fas fa-headphones text-base"></i>
                                </div>

                                <h3 class="text-base text-white font-semibold">
                                    Listen Live
                                </h3>

                                <p class="mt-1 text-xs text-purple-100">
                                    Streaming 24/7
                                </p>

                            </a>

                            <!-- Classic -->
                            <a href="#classic-radio"
                                class="group relative overflow-hidden rounded-2xl border border-white/50  bg-white/10 backdrop-blur-md p-4 transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

                                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-500 transition group-hover:bg-red-100">
                                    <i class="fas fa-wave-square"></i>
                                </div>

                                <h3 class="text-base font-semibold text-slate-900 transition group-hover:text-red-600">
                                    Classic Radio
                                </h3>

                                <p class="mt-1 text-xs text-slate-500">
                                    Tamil Classics
                                </p>

                            </a>

                            <!-- Podcasts -->
                            <a href="#podcasts"
                                class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

                                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-500 transition group-hover:bg-red-100 ">
                                    <i class="fas fa-microphone-alt text-base"></i>
                                </div>

                                <h3 class="text-base font-semibold text-slate-900 transition group-hover:text-red-600">
                                    Podcasts
                                </h3>

                                <p class="mt-1 text-xs text-slate-500">
                                    Shows & Stories
                                </p>

                            </a>

                            <!-- News -->
                            <a href="#news"
                                class="group relative overflow-hidden rounded-2xl border border-slate-200 bg-white p-4 transition-all duration-300 hover:-translate-y-1 hover:border-red-200 hover:shadow-lg">

                                <div class="mb-3 flex h-11 w-11 items-center justify-center rounded-xl bg-red-50 text-red-500 transition group-hover:bg-red-100">
                                    <i class="fas fa-newspaper text-base"></i>
                                </div>

                                <h3 class="text-base font-semibold text-slate-900 transition group-hover:text-red-600">
                                    News
                                </h3>

                                <p class="mt-1 text-xs text-slate-500">
                                    Switzerland & Tamil
                                </p>

                            </a>

                        </div>
                    </div>
                    <div class="home-reveal hero-radio relative hidden lg:flex items-center justify-center" style="transition-delay: .12s">

                        <!-- Signal Rings -->
                        <span class="signal signal1"></span>
                        <span class="signal signal2"></span>
                        <span class="signal signal3"></span>

                        <!-- Floating Icons -->
                        <div class="floating-icon icon1">
                            <i class="fas fa-music"></i>
                        </div>

                        <div class="floating-icon icon2">
                            <i class="fas fa-headphones"></i>
                        </div>

                        <div class="floating-icon icon3">
                            <i class="fas fa-microphone-alt"></i>
                        </div>

                        <div class="floating-icon icon4">
                            <i class="fas fa-wave-square"></i>
                        </div>

                        <!-- Radio -->
                        <img
                            src="assets/images/site-images/home.png"
                            alt="Thaalam Broadcast"
                            class="relative z-20 w-[620px] lg:w-[720px] object-contain drop-shadow-[0_40px_70px_rgba(0,0,0,.18)]">

                    </div>
                    <div class="lg:hidden home-reveal">

                        <div class="mt-10">

                            <p class="mb-4 text-xs font-black uppercase tracking-[.32em] text-red-500">
                                Get the App
                            </p>

                            <h2 class="mt-3 text-2xl font-bold text-slate-900">
                                Download Thaalam
                            </h2>

                            <p class="mt-2 text-sm leading-6 text-slate-500">
                                Experience live Tamil radio, podcasts and exclusive content from anywhere.
                            </p>

                            <div class="flex flex-col sm:flex-row gap-4 mt-6">
                                <!-- Google Play -->
                                <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-lg">

                                    <div class="flex items-center justify-between">

                                        <div class="flex items-center gap-4">

                                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-green-50">
                                                <i class="fab fa-google-play text-2xl text-green-600"></i>
                                            </div>

                                            <div>

                                                <span class="inline-flex rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-green-700">
                                                    Launching Soon
                                                </span>

                                                <h3 class="mt-2 text-lg font-bold text-slate-900">
                                                    Google Play
                                                </h3>

                                            </div>

                                        </div>

                                        <i class="fas fa-arrow-right text-slate-300"></i>

                                    </div>

                                </div>

                                <!-- App Store -->
                                <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-sm transition hover:shadow-lg">

                                    <div class="flex items-center justify-between">

                                        <div class="flex items-center gap-4">

                                            <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-slate-100">
                                                <i class="fab fa-apple text-3xl text-slate-900"></i>
                                            </div>

                                            <div>

                                                <span class="inline-flex rounded-full bg-slate-100 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-slate-700">
                                                    Launching Soon
                                                </span>

                                                <h3 class="mt-2 text-lg font-bold text-slate-900">
                                                    App Store
                                                </h3>

                                            </div>

                                        </div>

                                        <i class="fas fa-arrow-right text-slate-300"></i>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

            <section class="bg-slate-950 px-4 py-16 text-white sm:py-24">
                <div class="mx-auto grid max-w-7xl items-center gap-10 lg:grid-cols-2">
                    <div class="home-reveal relative">
                        <div class="absolute -inset-3 rounded-[2rem] border border-red-400/30"></div>
                        <img src="assets/images/site-images/side-view-young-man-recording-podcast.jpg" alt="A creator recording a podcast" class="relative aspect-[4/3] w-full rounded-[1.6rem] object-cover">
                    </div>
                    <div class="home-reveal" style="transition-delay:.12s">
                        <p class="text-xs font-black uppercase tracking-[.32em] text-red-400">About Thaalam Media</p>
                        <h2 class="mt-4 text-3xl font-bold leading-tight sm:text-4xl text-slate-200">A Tamil voice with a <span class="text-red-600">20-year legacy.</span></h2>
                        <p class="mt-5 leading-8 text-slate-300">Since 2002, Thaalam Media has grown from a trailblazing media organisation into a home for music, culture and unforgettable live experiences.</p>
                        <p class="mt-4 leading-8 text-slate-300">Thaalam FM is Switzerland's first and only Tamil radio station, broadcasting across all 26 cantons through DAB technology and bringing the Tamil diaspora closer through every song and story.</p><a href="about-us" class="mt-7 inline-flex items-center gap-2 text-sm font-bold text-white transition hover:text-red-300">Discover our story <i class="fas fa-arrow-right text-xs"></i></a>
                    </div>
                </div>
            </section>
            <section class="bg-slate-50 py-16 sm:py-24">
                <div class="mx-auto max-w-7xl px-4">
                    <div class="home-reveal mb-9 flex flex-wrap items-end justify-between gap-4">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[.32em] text-red-500">The voices behind the mic</p>
                            <h2 class="mt-3 text-3xl font-bold text-slate-950 ">Meet our RJs</h2>
                        </div><a href="rj-portfolio" class="text-sm font-bold text-slate-700 transition hover:text-red-500">View all RJs <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
                    </div>
                </div>
                <div id="home-rj-list" class="rj-marquee home-reveal px-4" aria-live="polite">
                    <div class="flex justify-center py-12 text-sm text-slate-400"><i class="fas fa-circle-notch mr-2 animate-spin"></i> Loading our RJs...</div>
                </div>
            </section>

            <section id="podcasts" class="px-4 py-16 sm:py-24">
                <div class="mx-auto max-w-7xl">
                    <div class="home-reveal mb-9 flex flex-wrap items-end justify-between gap-4">
                        <div>
                            <p class="text-xs font-black uppercase tracking-[.32em] text-red-500">Fresh stories, any time</p>
                            <h2 class="mt-3 text-3xl font-bold text-slate-950 ">Latest podcasts</h2>
                        </div><a href="podcasts-list" class="text-sm font-bold text-slate-700 transition hover:text-red-500">All podcasts <i class="fas fa-arrow-right ml-1 text-xs"></i></a>
                    </div>
                </div>
                <div id="new-podcasts" class="rj-marquee home-reveal px-2" aria-live="polite">
                </div>
            </section>

            <section id="coverage" class="relative overflow-hidden bg-white px-4 py-16 sm:py-24">
                <div class="pointer-events-none absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-red-200 to-transparent"></div>
                <div class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1.08fr_.92fr]">
                    <div class="home-reveal order-1 lg:order-2">
                        <p class="text-xs font-black uppercase tracking-[.32em] text-red-500">Across Switzerland</p>
                        <h2 class="mt-4 text-3xl font-bold leading-tight text-slate-950 sm:text-4xl">Thaalam is on air in <span class="text-red-600">every canton.</span></h2>
                        <p class="mt-5 max-w-2xl leading-8 text-slate-600">From Geneva to Graubünden, Thaalam FM brings Tamil music, voices and culture closer to home. Tune in wherever life takes you in Switzerland.</p>
                        <div class="mt-8 grid grid-cols-2 gap-x-5 gap-y-2 text-sm text-slate-700 sm:grid-cols-3">
                            <?php
                            $cantons = [
                                'Aargau',
                                'Appenzell Ausserrhoden',
                                'Appenzell Innerrhoden',
                                'Basel-Landschaft',
                                'Basel-Stadt',
                                'Bern',
                                'Fribourg',
                                'Geneva',
                                'Glarus',
                                'Graubünden',
                                'Jura',
                                'Lucerne',
                                'Neuchâtel',
                                'Nidwalden',
                                'Obwalden',
                                'Schaffhausen',
                                'Schwyz',
                                'Solothurn',
                                'St. Gallen',
                                'Thurgau',
                                'Ticino',
                                'Uri',
                                'Valais',
                                'Vaud',
                                'Zug',
                                'Zürich'
                            ];
                            foreach ($cantons as $canton): ?>
                                <span class="flex items-center gap-2"><i class="fas fa-broadcast-tower text-xs text-red-500"></i><?= htmlspecialchars($canton, ENT_QUOTES, 'UTF-8') ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="home-reveal order-2 lg:order-1" style="transition-delay:.12s">
                        <div class="rounded-[2rem] border border-slate-200 bg-slate-50 p-3 shadow-xl shadow-slate-200/60 sm:p-5">
                            <img src="assets/images/site-images/swiss%20map.png" alt="Swiss map showing Thaalam FM coverage across all 26 cantons" class="h-auto w-full rounded-[1.2rem]" loading="lazy">
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <div id="popupBanner" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/40 backdrop-blur-sm p-4" aria-modal="true" role="dialog">
            <div class="popupBanner-container relative w-full max-w-[32rem] sm:max-w-[36rem] md:max-w-[40rem] lg:max-w-[44rem] overflow-hidden rounded-[28px] bg-white shadow-2xl ring-1 ring-black/10">
                <button id="close-popupBanner" type="button" class="absolute right-4 top-4 z-10 inline-flex h-10 w-10 items-center justify-center rounded-full bg-black/60 text-white transition hover:bg-black/80 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-black/50" aria-label="Close popup banner">
                    <span class="text-lg leading-none">×</span>
                </button>
                <div class="relative mx-auto h-[60vh] md:h-[80vh] w-auto max-w-full min-w-[22rem] overflow-hidden rounded-[28px] aspect-[1066/1600]">
                    <img src="" alt="popup banner image" id="popupBanner-image" class="absolute inset-0 h-full w-full object-cover" />
                </div>
            </div>
        </div>

        <?php include 'php/footer.php'; ?>
    </div>
    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/scripts.php'; ?>
    <script src="assets/js/module/home.js" defer></script>
</body>

</html>
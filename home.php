<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Listen live to Thaalam Radio, meet our RJs, and discover Tamil podcasts from Switzerland.">
    <title>Thaalam Radio | Live Tamil Radio, RJs & Podcasts</title>
    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
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

        @keyframes rjScroll {
            to {
                transform: translateX(-50%);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            .home-reveal {
                opacity: 1;
                transform: none;
            }

            .rj-track {
                animation: none;
                overflow-x: auto;
                width: auto;
            }
        }
    </style>
</head>

<body class="custom-cursor bg-white text-slate-900">
    <?php $pagename = 'home'; ?>
    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>
    <?php include 'php/config-js.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header2.php'; ?>

        <main>
            <section class="home-hero home-grid relative isolate overflow-hidden px-4 py-16 sm:py-24">
                <div class="mx-auto grid max-w-7xl items-center gap-12 lg:grid-cols-[1fr_1fr]">
                    <div class="home-reveal">
                        <p class="mb-4 text-xs font-black uppercase tracking-[.32em] text-red-500">Switzerland's Tamil sound</p>
                        <h1 class="max-w-3xl text-4xl md:text-5xl font-bold leading-[1.05] text-slate-950 ">Your rhythm. <span class="text-red-600">Your radio.</span></h1>
                        <p class="mt-6 max-w-xl text-base leading-8 text-slate-600 sm:text-lg">Tune in to live Tamil music, conversations and stories that keep our community connected — wherever you are.</p>
                        <div class="mt-8 flex flex-wrap gap-3">
                            <a href="#listen-live" class="inline-flex items-center gap-2 rounded-full bg-red-500 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-red-200 transition hover:-translate-y-1 hover:bg-red-600"><i class="fas fa-play text-xs"></i> Listen live</a>
                            <a href="#podcasts" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-3 text-sm font-bold text-slate-800 transition hover:border-red-200 hover:text-red-500">Explore podcasts <i class="fas fa-arrow-right text-xs"></i></a>
                        </div>
                    </div>
                    <div class="home-reveal" style="transition-delay:.12s">


                    </div>
                </div>
            </section>

            <section class="bg-slate-950 px-4 py-16 text-white sm:py-24">
                <div class="mx-auto grid max-w-7xl items-center gap-10 lg:grid-cols-2">
                    <div class="home-reveal relative">
                        <div class="absolute -inset-3 rounded-[2rem] border border-red-400/30"></div><img src="assets/images/site-images/side-view-young-man-recording-podcast.jpg" alt="A creator recording a podcast" class="relative aspect-[4/3] w-full rounded-[1.6rem] object-cover">
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
                    <div id="new-podcasts" class="home-reveal grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4"></div>
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
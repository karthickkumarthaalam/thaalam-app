<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "RJ Portfolio - Thaalam Radio Station";
    $page_description = "Meet the talented radio jockeys of Thaalam Radio Station. Explore their profiles, shows, and connect with your favorite RJ.";
    $page_url = "https://thaalam.ch/rj-portfolio";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>
    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* ── Scroll-in animations ── */
        .rj-fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .rj-slide-l {
            opacity: 0;
            transform: translateX(-60px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .rj-slide-r {
            opacity: 0;
            transform: translateX(60px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .rj-fade-up.visible,
        .rj-slide-l.visible,
        .rj-slide-r.visible {
            opacity: 1;
            transform: translate(0);
        }

        /* staggered children */
        .rj-tag {
            opacity: 0;
            transform: translateY(8px);
            transition: opacity .4s ease .4s, transform .4s ease .4s;
        }

        .rj-name {
            opacity: 0;
            transform: translateY(10px);
            transition: opacity .4s ease .5s, transform .4s ease .5s;
        }

        .rj-desc {
            opacity: 0;
            transition: opacity .4s ease .6s;
        }

        .rj-chips {
            opacity: 0;
            transform: translateY(8px);
            transition: opacity .4s ease .7s, transform .4s ease .7s;
        }

        .rj-stars {
            opacity: 0;
            transition: opacity .4s ease .8s;
        }

        .rj-card.visible .rj-tag,
        .rj-card.visible .rj-name,
        .rj-card.visible .rj-desc,
        .rj-card.visible .rj-chips,
        .rj-card.visible .rj-stars {
            opacity: 1;
            transform: translateY(0);
        }

        /* animated underline */
        .rj-line {
            width: 0;
            height: 3px;
            background: #f00000;
            border-radius: 9999px;
            transition: width .6s ease .3s;
        }

        .rj-card.visible .rj-line {
            width: 3rem;
        }

        /* image zoom */
        .rj-img-wrap img {
            transition: transform .6s cubic-bezier(.25, .46, .45, .94);
        }

        .rj-card:hover .rj-img-wrap img {
            transform: scale(1.06);
        }

        /* button shimmer */
        .rj-btn {
            position: relative;
            overflow: hidden;
        }

        .rj-btn::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, .15);
            transform: translateX(-100%);
            transition: transform .4s ease;
        }

        .rj-btn:hover::after {
            transform: translateX(0);
        }

        /* mobile */
        @media(max-width:1023px) {
            .rj-offset {
                display: none;
            }
        }

        @media(max-width:639px) {

            .rj-slide-l,
            .rj-slide-r {
                transform: translateY(40px);
            }

            .rj-slide-l.visible,
            .rj-slide-r.visible {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-portfolio'; ?>
    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <!-- ── Page Hero ── -->
                <div class="rj-fade-up text-center py-16 px-4"
                    style="background:linear-gradient(rgba(255,255,255,.15),rgba(255,255,255,.15)),url('./assets/images/backgrounds/background_image.jpg') center/cover">
                    <span class="inline-block text-[11px] font-black uppercase tracking-[.3em] text-red-500 mb-3">Meet The Team</span>
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                        Our <span class=" text-red-500">Radio Jockeys</span>
                    </h1>
                    <p class="mt-4 text-gray-500 text-sm max-w-xl mx-auto leading-relaxed">
                        The voices behind Thaalam Radio — passionate, energetic, and always live. Each RJ brings a unique flavour to the airwaves.
                    </p>
                </div>

                <!-- ── RJ Cards ── -->
                <section class="py-8">
                    <div class="mx-auto max-w-5xl px-6 space-y-28" id="rj-list">

                        <!-- skeleton placeholders -->
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="animate-pulse flex flex-col lg:flex-row gap-12 items-center">
                                <div class="w-full lg:w-2/5 h-[380px] bg-gray-100 rounded-3xl shrink-0"></div>
                                <div class="flex-1 space-y-4 w-full">
                                    <div class="h-3 bg-gray-100 rounded w-1/4"></div>
                                    <div class="h-8 bg-gray-200 rounded w-2/3"></div>
                                    <div class="h-3 bg-gray-100 rounded w-full"></div>
                                    <div class="h-3 bg-gray-100 rounded w-5/6"></div>
                                    <div class="flex gap-3 mt-4">
                                        <div class="h-14 w-36 bg-gray-100 rounded-xl"></div>
                                        <div class="h-14 w-36 bg-gray-100 rounded-xl"></div>
                                    </div>
                                </div>
                            </div>
                        <?php endfor; ?>

                    </div>
                </section>

                <?php include 'php/footer.php'; ?>
            </div>
        </div>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>
    <script src="assets/js/module/rj-portfolio.js" defer></script>
</body>

</html>
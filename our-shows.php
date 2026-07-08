<!DOCTYPE html>
<html>

<head>
    <?php
    $page_title = "Our Shows - Thaalam Radio Station";
    $page_description = "Explore our diverse range of shows, from music to talk shows, all tailored to your interests.";
    $page_url = "https://thaalam.ch/our-shows";
    $page_logo = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>
    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        .show-fade-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity .7s ease, transform .7s ease;
        }

        .show-card {
            opacity: 0;
            transition: opacity .7s ease, transform .7s ease;
        }

        .show-card-left {
            transform: translateX(-70px);
        }

        .show-card-right {
            transform: translateX(70px);
        }

        .show-card.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .show-line {
            width: 0;
            height: 3px;
            background: #f00000;
            border-radius: 9999px;
            transition: width .6s ease .25s;
        }

        .show-fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .show-card.visible .show-line {
            width: 3rem;
        }

        .show-card:hover .show-card-image {
            transform: scale(1.06);
        }

        @media (max-width: 1023px) {

            .show-card-left,
            .show-card-right {
                transform: translateY(40px);
            }

            .show-card.visible {
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="custom-cursor">
    <?php $pagename = 'our-shows'; ?>
    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <div class="page-warpper">
        <div>
            <?php include 'php/header2.php'; ?>

            <div class="show-fade-up text-center py-8 lg:py-16 px-4"
                style="background:linear-gradient(rgba(255,255,255,.15),rgba(255,255,255,.15)),url('./assets/images/backgrounds/background_image.jpg') center/cover">
                <span class="inline-block text-[11px] font-black uppercase tracking-[.3em] text-red-500 mb-3">Our Lineup</span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                    Featured <span class="text-red-500">Radio Shows</span>
                </h1>
                <p class="mt-4 text-gray-500 text-sm max-w-5xl mx-auto leading-relaxed">
                    The heartbeat of Thaalam Radio — a dynamic schedule of original programs designed to inform, entertain, and connect. From morning motivation to late-night grooves, there's always a show for every mood.
                </p>
            </div>
            <section
                style="background:linear-gradient(rgba(255,255,255,.15),rgba(255,255,255,.15)),url('./assets/images/backgrounds/background_image.jpg') center/cover">

                <div class="mx-auto max-w-7xl px-4 sm:px-6">
                    <div id="show-list"></div>
                </div>
            </section>

            <?php include 'php/footer.php'; ?>
        </div>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>
    <script src="assets/js/module/our-shows.js" defer></script>
</body>

</html>
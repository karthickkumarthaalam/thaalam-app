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
        .show-card {
            opacity: 0;
            transform: translateY(40px);
            transition: all .7s ease;
        }

        .show-card.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .show-line {
            width: 0;
            height: 2px;
            background: #ef4444;
            border-radius: 9999px;
            transition: width .6s ease;
        }

        .show-card.visible .show-line {
            width: 70px;
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

            <div class="show-fade-up home-hero home-grid text-center py-8 lg:py-16 px-4">
                <span class="inline-block text-[11px] font-black uppercase tracking-[.3em] text-red-500 mb-3">Our Lineup</span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 leading-tight">
                    Featured <span class="text-red-600">Radio Shows</span>
                </h1>
                <p class="mt-4 text-gray-500 text-sm max-w-5xl mx-auto leading-relaxed">
                    The heartbeat of Thaalam Radio — a dynamic schedule of original programs designed to inform, entertain, and connect. From morning motivation to late-night grooves, there's always a show for every mood.
                </p>
            </div>
            <section class="relative overflow-hidden py-12" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">
                <div class="relative mx-auto max-w-6xl px-6">
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
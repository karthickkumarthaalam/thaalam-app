<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php

    $rjSlug = $_GET['slug'] ?? null;

    $baseUrl = "http://localhost:5000/api";
    $metaUrl = "$baseUrl/rj-details/meta-tag/$rjSlug";

    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    $rjDetails = $meta['data'] ?? [];

    $title = !empty($rjDetails['name'])
        ? $rjDetails['name'] . " - Thaalam Radio Station"
        : "RJ Profile - Thaalam Radio";

    $description = !empty($rjDetails['description'])
        ? $rjDetails['description']
        : "Get to know details about our Rj's and their related news, podcasts and blogs";

    $image = !empty($rjDetails['image_url'])
        ? $rjDetails['image_url']
        : "https://thaalam.ch/assets/img/logo/thalam-logo.png";

    $url = "https://thaalam.ch/rj-details?slug={$rjSlug}";

    $keywordsArray = [
        $rjDetails['name'] ?? '',
        "Thaalam News",
        "Thaalam Radio News",
        "Thaalam FM Updates",
        "Tamil News",
        "Swiss Tamil News",
        "Radio News Stories",
        "Community News",
        "Cultural Updates",
        "Breaking News Tamil",
        "Latest Updates Tamil",
        "Tamil Media News",
        "Local News Switzerland",
        "Tamil Events Switzerland",
    ];

    $keywords = implode(", ", array_filter($keywordsArray))

    ?>


    <title><?php echo htmlspecialchars($title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">

    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($image); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($url); ?>">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($image); ?>">

    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/rj-details.css" />
    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-details'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <section id="rj-details" class="rj-details-section" style="background: 
            linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
            url('./assets/images/backgrounds/background_image.jpg'); 
            background-repeat: repeat; 
            background-size: auto; 
            background-position: top left; 
            min-height: 200px;">

            <div class="container">

                <!-- MAIN CONTENT -->
                <div id="rj-content" class="hidden">

                    <!-- ✅ HERO -->
                    <div class="rj-hero">

                        <div class="rj-avatar-container">
                            <img id="rj-image" class="rj-avatar" alt="RJ Profile" />
                        </div>

                        <div class="rj-info">
                            <h1 id="rj-name" class="rj-name"></h1>
                            <p id="rj-description" class="rj-bio"></p>
                        </div>
                    </div>

                    <!-- ✅ 2-COLUMN LAYOUT -->
                    <div class="rj-layout">

                        <!-- LEFT — Sidebar Navigation -->
                        <aside class="rj-sidebar">
                            <button class="nav-item active" data-target="shows-section">Radio Shows</button>
                            <button class="nav-item" data-target="podcast-section">Podcasts</button>
                            <button class="nav-item" data-target="news-section">News</button>
                            <button class="nav-item" data-target="blogs-post">Blogs</button>
                        </aside>

                        <!-- RIGHT — Dynamic Page Content -->
                        <div class="rj-body">

                            <!-- ✅ SHOWS -->
                            <section id="shows-section" class="rj-block active">
                                <h2 class="block-title"><span>Radio </span>Shows</h2>
                                <div id="rj-programs" class="list-section"></div>
                            </section>

                            <!-- ✅ PODCASTS -->
                            <section id="podcast-section" class="rj-block">
                                <h2 class="block-title"><span>Listen</span> Podcasts</h2>
                                <div id="rj-podcasts" class="list-section"></div>
                            </section>

                            <!-- ✅ NEWS -->
                            <section id="news-section" class="rj-block">
                                <h2 class="block-title"><span>News </span>Articles</h2>
                                <div id="rj-news" class="list-section"></div>
                            </section>

                            <section id="blogs-post" class="rj-block">
                                <h2 class="block-title"><span>Blogs </span>Post</h2>
                                <div id="rj-blogs" class="list-section"></div>
                            </section>

                        </div>

                    </div>

                </div>

            </div>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/rj-details.js" defer></script>
</body>

</html>
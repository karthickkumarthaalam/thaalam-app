<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    $eventSlug = $_GET['slug'] ?? null;

    $baseUrl = "http://localhost:5000/api";
    $metaUrl = "$baseUrl/event/details/$eventSlug";

    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    $event = $meta['data'] ?? [];

    $title = !empty($event['title'])
        ? $event['title'] . " - Thaalam Radio Station"
        : "Thaalam Events";

    $raw = strip_tags($event['description'] ?? '');
    $name = $event['title'] ?? "This event";

    if (!empty($raw)) {
        $clean = preg_replace('/\s+/', ' ', trim($raw));
        $description = mb_substr($clean, 0, 160) . (mb_strlen($clean) > 160 ? "..." : "");
    } else {
        $description = "$name is packed with exciting moments. Explore details and join us!";
    }
    $image = !empty($event['logo_image'])
        ? $event['logo_image']
        : "https://thaalam.ch/assets/img/logo/thalam-logo.png";

    $url = "https://thaalam.ch/event-details?slug={$eventSlug}";

    $keywords = implode(", ", [
        $event['title'] ?? "",
        $event['country'] ?? "Swiss",
        $event['venue'] ?? "",
        "Thaalam Event",
        "Thaalam Shows",
        "Tamil Events",
        "Live Shows",
        "Cultural Events",
        "Music Concerts",
        "Festival Events",
        "Community Programs",
        "Event Tickets",
        "Local Tamil Events",
        "Entertainment News",
    ]);


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
    <link rel="stylesheet" href="assets/css/module-css/event-details.css" />
</head>

<body>

    <?php $pagename = 'events-details'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/eventHeader.php'; ?>
        <div class="event-page-bg">

            <div class="bg-particles"></div>

            <div id="event-details-container">
                <!-- HERO -->
                <section id="event-header-section"></section>


                <section id="event-banner-section">

                    <div class="banner-heading">
                        <h5 class="banner-title">Moments From the Event</h5>
                        <p class="banner-subtitle">Experience the festival’s atmosphere through its most memorable moments.</p>
                    </div>

                    <div class="loop-carousel">
                        <div class="loop-track" id="loopTrack"></div>

                        <div class="carousel-controls">
                            <button class="carousel-btn" id="prevBtn">❮</button>
                            <button class="carousel-btn" id="nextBtn">❯</button>
                        </div>
                    </div>

                </section>


                <!-- DESCRIPTION -->
                <section id="event-description-section"></section>


                <section id="event-crew-section">
                    <h5>Explore Artist</h5>
                    <p>Discover the stars lighting up our stage</p>
                    <div class="crew-decorations">
                        <img src="assets/images/shapes/team-two-shape-1.png" alt="sparkling images" class="decor-1">
                        <img src="assets/images/shapes/team-two-shape-2.png" alt="sparkling images" class="decor-2">
                    </div>
                    <div class="crew-carousel">
                        <div class="crew-track" id="crewTrack"></div>
                    </div>
                </section>


                <!-- AMENITIES -->
                <section id="event-amenities-section"></section>


            </div>

            <div id="crewModal" class="crew-modal">
                <div class="crew-modal-box">
                    <span id="crewModalClose" class="crew-close">&times;</span>

                    <div class="crew-modal-layout">

                        <!-- LEFT IMAGE -->
                        <div class="crew-modal-left">
                            <img id="crewModalImg" class="crew-left-img" />
                        </div>

                        <!-- RIGHT DETAILS -->
                        <div class="crew-modal-right">
                            <h2 id="crewModalName" class="crew-name"></h2>
                            <p id="crewModalRole" class="crew-role"></p>
                            <p id="crewModalBio" class="crew-bio"></p>

                            <div id="crewModalLinks" class="crew-social-links"></div>
                        </div>

                    </div>
                </div>
            </div>
            <?php include 'php/footer.php'; ?>

        </div>

    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/event-details.js" defer></script>

</body>

</html>
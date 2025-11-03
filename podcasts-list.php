<!DOCTYPE html>
<html>

<head>
    <?php
    $page_title = "Podcasts - Thaalam Radio Station";
    $page_description = "Explore Thaalam Radio Station podcasts. Listen to stories, music, and shows that connect you with our vibrant community.";
    $page_url = "https://thaalam.ch/podcasts";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php' ?>

    <link rel="stylesheet" href="assets/css/module-css/podcast2.css">
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <div class="home-page__header podcast-header">
            <h2 class=" home-page__title">Thaalam <span style="color: #000">Podcasts</span></h2>
            <p class="home-page__subtitle">Where Every Beat Tells a Story</p>
        </div>
        <div class="row" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">
            <section class="container details-right">

                <div class="search-bar">
                    <div class="home-page__search podcast-search">
                        <input type="text" placeholder="Search stories, topics, voices..." />
                        <button class="home-page__search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                <div class="podcast-listing">
                    <div id="podcast-list">
                    </div>
                </div>

                <div id="pagination" class="blog-list__pagination"></div>
            </section>
        </div>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php' ?>

    <?php include 'php/config-js.php' ?>

    <?php include 'php/scripts.php' ?>

    <script src="assets/js/module/podcast.js" defer></script>
</body>

</html>
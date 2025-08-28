<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcats - Thaalam Radio Station</title>

    <?php include 'php/css.php' ?>

    <link rel="stylesheet" href="assets/css/module-css/podcast2.css">
</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts'; ?>

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
                        url('./assets/images/backgrounds/background_image.jpg'); ">>
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

    <script src="assets/js/module/podcast.js"></script>
</body>

</html>
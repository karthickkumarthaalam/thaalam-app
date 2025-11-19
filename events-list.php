<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Events - Thaalam Radio Station";
    $page_description = "Discover the latest events, concerts, and cultural celebrations brought to you by Thaalam. Stay updated on Tamil music festivals, live shows, community gatherings, and exclusive radio events happening across Switzerland and around the world. Join the rhythm of Thaalam and be part of every moment that connects hearts through music and culture.";
    $page_url = "https://thaalam.ch/events-list";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/events-list.css">
    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = 'events'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>
        <div style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">

            <div class="home-page__header events-page__header">
                <h2 class="home-page__title">Thaalam <span style="color: #000;">Events</span></h2>
                <p class="home-page__subtitle">Bringing People Together Through Music, Culture, and Celebration.</p>
            </div>

            <div class="row">
                <section class="container">

                    <div class="search-bar">
                        <div class="home-page__search events-search">
                            <input type="text" class="events-search__input" placeholder="Search events, music concerts, festivals...">
                            <button class="home-page__search-btn events-searchbar__btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>


                    <div class="events-listing no-results">
                        <div id="events-list">

                        </div>
                    </div>

                </section>
            </div>

        </div>

        <div id="pagination" class="blog-list__pagination"></div>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/events.js" defer></script>
</body>

</html>
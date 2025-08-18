<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Podcasts - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/podcast.css">

</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <!-- <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div> -->

            <div>
                <?php include 'php/header.php'; ?>
                <section class="podcast-list">
                    <div class="container">
                        <div class="home-page__header podcast-header">
                            <h2 class="home-page__title">Thaalam Podcasts</h2>
                            <p class="home-page__subtitle">Where Every Beat Tells a Story</p>
                        </div>
                        <div class="home-page__search">
                            <input type="text" placeholder="Search what you want...">
                            <button class="home-page__search-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">


                                    <!-- Podcast Single Start -->
                                    <div id="podcast-list"></div>

                                    <!-- Podcast Single End -->


                                    <div id="pagination" class="blog-list__pagination"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/podcast.js"></script>

</body>

</html>
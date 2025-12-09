<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "News - Thaalam Radio Station";
    $page_description = "Stay updated with the latest news, events, and stories from Thaalam Radio Station. Discover community highlights, cultural updates, and inspiring voices that shape our world.";
    $page_url = "https://thaalam.ch/news-list";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>

    <link rel="stylesheet" href="assets/css/module-css/news-page.css">
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'news'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">

        <?php include 'php/header.php'; ?>

        <div style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">

            <div class="row">
                <section class="container">
                    <div class="search-bar">
                        <div class="category-filter-container">
                            <button class="scroll-btn left" id="scrollLeft">
                                <i class="fas fa-chevron-left"></i>
                            </button>

                            <div class="category-filters" id="category-filters">
                            </div>

                            <button class="scroll-btn right" id="scrollRight">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>

                        <!-- <div class="news-searchbar">
                            <input
                                type="text"
                                class="news-searchbar__input "
                                placeholder="Discover stories that matter…" />
                            <button class="news-searchbar__btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div> -->

                    </div>



                    <div class="news-listing no-results">
                        <div id="news-list">

                        </div>
                    </div>

                </section>

            </div>
        </div>

        <div id="pagination" class="blog-list__pagination"></div>

        <?php include 'php/footer.php'; ?>
    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/news.js" defer></script>


</body>

</html>
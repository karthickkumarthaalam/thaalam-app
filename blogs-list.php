<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blogs - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'blogs'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>
                <!--Blog Page Start-->
                <section class="blog-page" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="container">
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
                        </div>
                        <div class="row" id="blogs-list"></div>

                        <div class="row">
                            <div class="col-xl-12" id="pagination"></div>
                        </div>
                    </div>

                </section>
                <!--Blog Page End-->



                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/blogs.js" defer></script>

</body>

</html>
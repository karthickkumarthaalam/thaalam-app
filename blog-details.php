<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Blogs - Thaalam Radio Station</title>

    <meta name="title" content="Thaalam Radio Blogs">
    <meta name="description" content="Latest Tamil entertainment, music, and tech blogs from Thaalam Radio">
    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">

    <?php $pagename = 'blogs'; ?>
    <?php include 'php/toast.php'; ?>
    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>


    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <section class="blog-details" style="background-image:
      linear-gradient(rgba(255,255,255,0.65), rgba(255,255,255,0.65)),
      url('assets/img/home/pattern/banner-4.png'); background-size:contain;">

            <div class="container">
                <div class="row">

                    <!-- Breadcrumb -->
                    <div class="breadcrumb" role="navigation" aria-label="Breadcrumb">
                        <a href="index">Home</a>
                        <a href="blogs-list">Blogs</a>
                        <span id="breadcrumb-title">Blog Details</span>
                    </div>


                    <!-- -------------- MAIN BLOG CONTENT -------------- -->
                    <div class="col-xl-8 ">
                        <div class="blog-details__left">

                            <div class="blog-details__img-box">
                                <div class="blog-details__img">
                                    <img id="blogCoverImage" src="assets/img/common/blog-details/img-1.jpg" alt="Blog cover">
                                </div>
                            </div>

                            <div class="blog-details__content">
                                <h3 id="blogTitle" class="blog-details__title-1">Loading...</h3>
                                <h4 id="blogSubtitle" class="blog-details__subtitle"></h4>

                                <div class="blog-details__client-and-meta">
                                    <div class="blog-details__client-box">
                                        <div class="blog-details__client-content">
                                            <p>Published By</p>
                                            <h4 id="blogAuthorName"></h4>
                                        </div>
                                    </div>

                                    <ul class="blog-details__client-meta list-unstyled">
                                        <li>
                                            <div class="icon"><span class="icon-calendar"></span></div>
                                            <p id="blogPublishedDate"></p>
                                        </li>
                                        <li>
                                            <div class="icon"><span class="icon-tags"></span></div>
                                            <p id="blogCategory"></p>
                                        </li>
                                        <li>
                                            <div class="icon"><span class="icon-folder"></span></div>
                                            <p id="blogSubCategory"></p>
                                        </li>
                                    </ul>

                                </div>

                                <p id="blogContent" class="blog-details__text-1"></p>
                            </div>

                        </div>
                    </div>

                    <!-- -------------- SIDEBAR LATEST POSTS -------------- -->
                    <div class="col-xl-4">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__post">
                                <div class="sidebar__title-box">
                                    <div class="sidebar__title-icon">
                                        <img src="assets/img/home/rock.png" alt="">
                                    </div>
                                    <h3 class="sidebar__title">Latest Posts</h3>
                                </div>

                                <ul id="latestPostsList" class="sidebar__post-list list-unstyled">
                                    <!-- JS will inject latest posts here -->
                                </ul>

                            </div>
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

    <script>
        // ========= EMERGENCY loader removal to avoid stuck screen =========
        function forceHideLoader() {
            document.getElementById("globalLoader")?.remove();
            document.body.style.overflow = "";
        }
        window.addEventListener("load", () => setTimeout(forceHideLoader, 500));
    </script>

    <!-- Your main blog logic -->
    <script src="assets/js/module/blog-details.js" defer></script>

</body>

</html>
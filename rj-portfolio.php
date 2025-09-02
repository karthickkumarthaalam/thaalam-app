<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "RJ Portfolio - Thaalam Radio Station";
    $page_description = "Meet the talented radio jockeys of Thaalam Radio Station. Explore their profiles, shows, and connect with your favorite RJ.";
    $page_url = "https://demoview.ch/summerfest/thaalam-main/rj-portfolio";
    $page_image = "https://demoview.ch/summerfest/thaalam-main/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-portfolio'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="team-page" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">
                    <div class="container">
                        <div class="rj-header">
                            <h2><span style="color:#f90000;">Our RJ </span>Profiles</h2>
                            <p>Meet our talented radio jockeys and explore their shows below.</p>
                        </div>
                        <div class="row" id="rj-list">
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

    <script src="assets/js/module/rj-portfolio.js"></script>

</body>

</html>
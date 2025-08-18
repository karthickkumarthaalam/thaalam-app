<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RJ Portfolio - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-portfolio'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="team-page" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.35)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="container">
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
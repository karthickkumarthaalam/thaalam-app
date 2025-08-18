<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RJ Details - Thaalam Radio Station</title>
    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/rj-details.css">
</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-details'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="rj-details-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="container">
                        <div id="rj-details">

                        </div>

                        <!-- Other RJs Section -->
                        <div class="other-rjs-section">
                            <h2 style="margin-bottom: 20px;">Meet Other RJs</h2>
                            <div class="row" id="rj-list">

                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <?php include 'php/footer.php'; ?>
        </div>

        <?php include 'php/mob-nav.php'; ?>

        <?php include 'php/config-js.php'; ?>

        <?php include 'php/scripts.php'; ?>

        <script src="assets/js/module/rj-details.js"></script>
    </div>
</body>

</html>
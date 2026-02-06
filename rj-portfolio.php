<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "RJ Portfolio - Thaalam Radio Station";
    $page_description = "Meet the talented radio jockeys of Thaalam Radio Station. Explore their profiles, shows, and connect with your favorite RJ.";
    $page_url = "https://thaalam.ch/rj-portfolio";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-portfolio'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="py-10 " style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">
                    <div class="max-w-7xl mx-auto px-4">

                        <!-- Header -->
                        <div class="max-w-3xl mx-auto text-center mb-8">
                            <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 tracking-tight">
                                <span class="text-red-500">Our RJ</span> Profiles
                            </h2>
                            <p class="mt-2 text-gray-600">
                                Meet our talented radio jockeys and explore their shows.
                            </p>
                        </div>

                        <div
                            id="rj-list"
                            class="space-y-8 w-full max-w-xl mx-auto">
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

    <script src="assets/js/module/rj-portfolio.js" defer></script>

</body>

</html>
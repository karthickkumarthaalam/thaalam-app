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
                    <div class="max-w-5xl mx-auto px-4">

                        <!-- Header -->
                        <div class="text-center mb-14 rj-fade-up">
                            <span class="inline-block text-xs font-bold text-red-500 uppercase tracking-[0.2em] mb-3">Meet The Team</span>
                            <h2 class="text-2xl md:text-3xl font-semibold text-gray-900 leading-tight">
                                Our <span class="text-red-500">RJ</span> Profiles
                            </h2>
                            <div class="mt-4 mx-auto w-12 h-1 bg-red-500 rounded-full"></div>
                            <p class="mt-4 text-gray-400 text-sm">Meet our talented radio jockeys and explore their shows.</p>
                        </div>

                        <div id="rj-list" class="flex flex-col gap-10"></div>

                    </div>
                </section>

                <style>
                    .rj-fade-up {
                        opacity: 0;
                        transform: translateY(40px);
                        transition: opacity 0.7s ease, transform 0.7s ease;
                    }

                    .rj-fade-up.visible {
                        opacity: 1;
                        transform: translateY(0);
                    }

                    .rj-slide-left {
                        opacity: 0;
                        transform: translateX(-60px);
                        transition: opacity 0.7s ease, transform 0.7s ease;
                    }

                    .rj-slide-left.visible {
                        opacity: 1;
                        transform: translateX(0);
                    }

                    .rj-slide-right {
                        opacity: 0;
                        transform: translateX(60px);
                        transition: opacity 0.7s ease, transform 0.7s ease;
                    }

                    .rj-slide-right.visible {
                        opacity: 1;
                        transform: translateX(0);
                    }

                    .rj-img-wrap {
                        overflow: hidden;
                    }

                    .rj-img-wrap img {
                        transition: transform 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
                    }

                    .rj-card:hover .rj-img-wrap img {
                        transform: scale(1.08);
                    }

                    .rj-line {
                        width: 0;
                        height: 3px;
                        background: #ef4444;
                        border-radius: 9999px;
                        transition: width 0.6s ease 0.3s;
                    }

                    .rj-card.visible .rj-line {
                        width: 3rem;
                    }

                    .rj-social a {
                        transition: transform 0.2s ease, background 0.2s ease, color 0.2s ease;
                    }

                    .rj-social a:hover {
                        transform: translateY(-3px);
                    }

                    .rj-btn {
                        position: relative;
                        overflow: hidden;
                    }

                    .rj-btn::after {
                        content: '';
                        position: absolute;
                        inset: 0;
                        background: rgba(255, 255, 255, 0.15);
                        transform: translateX(-100%);
                        transition: transform 0.4s ease;
                    }

                    .rj-btn:hover::after {
                        transform: translateX(0);
                    }

                    .rj-tag {
                        opacity: 0;
                        transform: translateY(8px);
                        transition: opacity 0.4s ease 0.5s, transform 0.4s ease 0.5s;
                    }

                    .rj-card.visible .rj-tag {
                        opacity: 1;
                        transform: translateY(0);
                    }

                    .rj-name {
                        opacity: 0;
                        transform: translateY(10px);
                        transition: opacity 0.4s ease 0.6s, transform 0.4s ease 0.6s;
                    }

                    .rj-card.visible .rj-name {
                        opacity: 1;
                        transform: translateY(0);
                    }

                    .rj-shows {
                        opacity: 0;
                        transition: opacity 0.4s ease 0.7s;
                    }

                    .rj-card.visible .rj-shows {
                        opacity: 1;
                    }

                    .rj-actions {
                        opacity: 0;
                        transform: translateY(10px);
                        transition: opacity 0.4s ease 0.8s, transform 0.4s ease 0.8s;
                    }

                    .rj-card.visible .rj-actions {
                        opacity: 1;
                        transform: translateY(0);
                    }

                    @media (max-width: 639px) {
                        .rj-card article {
                            flex-direction: column !important;
                            height: auto !important;
                        }
                        .rj-img-wrap {
                            width: 100% !important;
                            height: 280px !important;
                        }
                        .rj-content {
                            padding: 1.5rem !important;
                            align-items: center !important;
                        }
                        .rj-line {
                            margin-left: auto;
                            margin-right: auto;
                        }
                        .rj-tag {
                            text-align: center;
                        }
                        .rj-name {
                            font-size: 1.4rem !important;
                            text-align: center;
                        }
                        .rj-shows {
                            width: 100%;
                            text-align: center;
                        }
                        .rj-shows .flex {
                            justify-content: center;
                        }
                        .rj-shows span.ml-auto {
                            margin-left: 0.5rem !important;
                        }
                        .rj-actions {
                            flex-wrap: wrap;
                            justify-content: center;
                            gap: 0.5rem;
                        }
                        .rj-btn {
                            width: 100%;
                            justify-content: center;
                            margin-left: 0 !important;
                        }
                        .rj-slide-left,
                        .rj-slide-right {
                            transform: translateY(40px);
                        }
                        .rj-slide-left.visible,
                        .rj-slide-right.visible {
                            transform: translateY(0);
                        }
                    }
                </style>

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
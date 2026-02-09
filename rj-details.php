<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php

    $rjSlug = $_GET['slug'] ?? null;

    $baseUrl = "https://api.demoview.ch/api";
    $metaUrl = "$baseUrl/rj-details/meta-tag/$rjSlug";

    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    $rjDetails = $meta['data'] ?? [];

    $title = !empty($rjDetails['name'])
        ? $rjDetails['name'] . " - Thaalam Radio Station"
        : "RJ Profile - Thaalam Radio";

    $description = !empty($rjDetails['description'])
        ? $rjDetails['description']
        : "Get to know details about our Rj's and their related news, podcasts and blogs";

    $image = !empty($rjDetails['image_url'])
        ? $rjDetails['image_url']
        : "https://thaalam.ch/assets/img/logo/thalam-logo.png";

    $url = "https://thaalam.ch/rj-details?slug={$rjSlug}";

    $keywordsArray = [
        $rjDetails['name'] ?? '',
        "Thaalam News",
        "Thaalam Radio News",
        "Thaalam FM Updates",
        "Tamil News",
        "Swiss Tamil News",
        "Radio News Stories",
        "Community News",
        "Cultural Updates",
        "Breaking News Tamil",
        "Latest Updates Tamil",
        "Tamil Media News",
        "Local News Switzerland",
        "Tamil Events Switzerland",
    ];

    $keywords = implode(", ", array_filter($keywordsArray))

    ?>


    <title><?php echo htmlspecialchars($title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">

    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($image); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($url); ?>">
    <meta property="og:type" content="article">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($image); ?>">

    <meta name="keywords" content="<?php echo htmlspecialchars($keywords); ?>">

    <?php include 'php/css.php'; ?>
    <!-- <link rel="stylesheet" href="assets/css/module-css/rj-details.css" /> -->
    <script src="https://cdn.tailwindcss.com"></script>
    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = 'rj-details'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>
        <section>

            <div id="rj-content" class="hidden ">

                <div
                    class="bg-gradient-to-br from-slate-900 via-slate-800 to-indigo-900 backdrop-blur-xl">
                    <div class="w-full max-w-5xl mx-auto">
                        <div class="relative overflow-hidden flex flex-col md:flex-row items-center gap-8  p-10">
                            <div
                                class="relative w-44 h-44 shrink-0 rounded-md overflow-hidden  shadow-lg">
                                <img
                                    id="rj-image"
                                    class="w-full h-full object-contain"
                                    alt="RJ Profile" />
                            </div>

                            <div class="relative flex flex-col items-center justify-center md:items-start space-y-3">
                                <h1
                                    id="rj-name"
                                    class="text-xl md:text-2xl text-gray-200 font-bold  tracking-tight"></h1>

                                <p
                                    id="rj-description"
                                    class=" max-w-3xl text-gray-400 leading-relaxed"></p>

                                <div class="mt-3 flex items-center gap-4">

                                    <a href="#" aria-label="whatsapp"
                                        class="text-green-600 hover:scale-110 transition">
                                        <i class="fab fa-whatsapp text-lg"></i>
                                    </a>

                                    <a href="#" aria-label="Instagram"
                                        class="text-pink-600 hover:scale-110 transition">
                                        <i class="fab fa-instagram text-lg"></i>
                                    </a>

                                    <a href="#" aria-label="Facebook"
                                        class="text-blue-600 hover:scale-110 transition">
                                        <i class="fab fa-facebook-f text-lg"></i>
                                    </a>

                                    <a href="#"
                                        aria-label="X (Twitter)"
                                        class="inline-flex items-center hover:scale-110 transition">

                                        <svg
                                            viewBox="0 0 24 24"
                                            class="w-5 h-5 fill-black"
                                            xmlns="http://www.w3.org/2000/svg">

                                            <path d="M18.244 2H21.552L14.078 10.524L22.888 22H16.032L10.654 15.107L4.621 22H1.311L9.308 12.862L0.888 2H7.916L12.772 8.278L18.244 2ZM17.081 20.07H18.915L6.92 3.828H4.954L17.081 20.07Z" />
                                        </svg>

                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section
            id="rj-details"
            class="min-h-screen bg-[url('./assets/images/backgrounds/background_image.jpg')] bg-repeat">
            <div class="max-w-5xl mx-auto px-4 py-10">
                <div class="space-y-8">

                    <!-- TABS -->
                    <div class="relative">

                        <!-- TAB BAR -->
                        <div class="relative">

                            <!-- TAB BAR -->
                            <div class="flex justify-center gap-8">

                                <button
                                    class="tab-btn active relative pb-3
             text-base font-semibold text-red-600 "
                                    data-target="shows-section">
                                    Shows
                                </button>

                                <button
                                    class="tab-btn relative pb-3
             text-base font-medium text-gray-500
             hover:text-gray-900 transition "
                                    data-target="podcast-section">
                                    Podcasts
                                </button>

                                <button
                                    class="tab-btn relative pb-3
             text-base font-medium text-gray-500
             hover:text-gray-900 transition "
                                    data-target="news-section">
                                    News
                                </button>

                                <button
                                    class="tab-btn relative pb-3
             text-base font-medium text-gray-500
             hover:text-gray-900 transition "
                                    data-target="blogs-post">
                                    Blogs
                                </button>
                            </div>

                            <!-- ACTIVE INDICATOR -->
                            <span
                                id="tab-indicator"
                                class="absolute bottom-0 left-0 h-[3px]
                               bg-gray-900
                               transition-all duration-300 ease-out">
                            </span>

                        </div>
                        <span
                            id="tab-indicator"
                            class="absolute bottom-0 left-0 h-[2px]
                               bg-indigo-400
                               transition-all duration-300 ease-out">
                        </span>
                    </div>

                    <section id="shows-section" class="tab-content space-y-6">
                        <header class="flex items-center gap-6 py-2">
                            <span class="flex-1 h-[2px] bg-gradient-to-r from-transparent to-red-600"></span>

                            <h2 class="text-base font-medium text-gray-900  tracking-wide">
                                Radio Shows
                            </h2>

                            <span class="flex-1 h-[2px] bg-gradient-to-l from-transparent to-red-600 "></span>
                        </header>


                        <div id="rj-programs" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center"></div>
                        <div id="rj-programs-empty"></div>

                    </section>


                    <section id="podcast-section" class="tab-content hidden space-y-6">
                        <header class="flex items-center gap-6 py-2">
                            <span class="flex-1 h-[2px] bg-gradient-to-r from-transparent to-red-600"></span>

                            <h2 class="text-base font-medium text-gray-900  tracking-wide">
                                Podcasts
                            </h2>
                            <span class="flex-1 h-[2px] bg-gradient-to-l from-transparent to-red-600 "></span>
                        </header>

                        <div id="rj-podcasts" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center"></div>
                        <div id="rj-podcasts-empty"></div>
                    </section>


                    <section id="news-section" class="tab-content hidden space-y-6">
                        <header class="flex items-center gap-6 py-2">
                            <span class="flex-1 h-[2px] bg-gradient-to-r from-transparent to-red-600"></span>

                            <h2 class="text-base font-medium text-gray-900  tracking-wide">
                                News
                            </h2>
                            <span class="flex-1 h-[2px] bg-gradient-to-l from-transparent to-red-600 "></span>
                        </header>

                        <div id="rj-news" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center"></div>
                        <div id="rj-news-empty"></div>
                    </section>


                    <section id="blogs-post" class="tab-content hidden space-y-6">
                        <header class="flex items-center gap-6 py-2">
                            <span class="flex-1 h-[2px] bg-gradient-to-r from-transparent to-red-600"></span>

                            <h2 class="text-base font-medium text-gray-900  tracking-wide">
                                Blogs
                            </h2>
                            <span class="flex-1 h-[2px] bg-gradient-to-l from-transparent to-red-600 "></span>
                        </header>

                        <div id="rj-blogs" class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 place-items-center"></div>
                        <div id="rj-blogs-empty"></div>

                    </section>


                </div>

            </div>
        </section>


        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/rj-details.js" defer></script>
</body>

</html>
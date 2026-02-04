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
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="custom-cursor">
    <?php $pagename = 'news'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">

        <?php include 'php/newsHeader.php'; ?>

        <section class="bg-gray-200 border-b sticky top-[72px] z-40">
            <div class="max-w-7xl mx-auto px-4 py-1">

                <div class="relative flex items-center">

                    <!-- LEFT ARROW -->
                    <button
                        id="cat-scroll-left"
                        class="hidden absolute left-0 z-10 h-full px-2
           bg-gradient-to-r from-gray-50 to-transparent
           text-gray-600 hover:text-gray-900 transition"
                        aria-label="Scroll left">
                        ‹
                    </button>

                    <!-- CATEGORY LIST -->
                    <div
                        id="category-filters"
                        class="flex gap-6 items-center whitespace-nowrap
           overflow-x-auto scroll-smooth px-6">
                        <!-- JS injects categories -->
                    </div>

                    <!-- RIGHT ARROW -->
                    <button
                        id="cat-scroll-right"
                        class="hidden absolute right-0 z-10 h-full px-2
           bg-gradient-to-l from-gray-50 to-transparent
           text-gray-600 hover:text-gray-900 transition"
                        aria-label="Scroll right">
                        ›
                    </button>

                </div>

            </div>
        </section>

        <section class="bg-[#f8f9fb]">
            <div class="max-w-7xl mx-auto px-4 py-10">
                <div id="news-grid">

                </div>
                <!-- READ MORE -->
                <div class="flex justify-center mt-14">
                    <button
                        id="read-more-btn"
                        class="group hidden inline-flex items-center gap-3
           px-8 py-3
           text-sm font-semibold tracking-wide
           text-gray-900
           border border-gray-300
           bg-white
           hover:border-red-600 hover:text-red-600
           transition-all duration-300">
                        <span>Read more</span>

                        <!-- Arrow -->
                        <span
                            class="inline-flex items-center justify-center
             w-7 h-7
             border border-gray-300
             rounded-full
             group-hover:border-red-600
             transition">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-3 h-3"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 12H5m7 7l7-7-7-7" />
                            </svg>
                        </span>
                    </button>
                </div>


            </div>
        </section>

        <?php include 'php/footer.php'; ?>
    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/news.js" defer></script>


</body>

</html>
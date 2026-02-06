<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    // Get slug from query string
    $newsSlug = $_GET['slug'] ?? null;

    // API base URL
    $baseUrl = "https://api.demoview.ch/api";
    $metaUrl = "$baseUrl/news/per-slug/$newsSlug";

    // Fetch API response
    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    // News data is likely under $meta['data']
    $news = $meta['data'] ?? [];

    // Title fallback
    $title = !empty($news['title'])
        ? $news['title'] . " - Thaalam Radio Station"
        : "Thaalam Radio Station News";

    // Description fallback
    $description = !empty($news['subtitle'])
        ? $news['subtitle']
        : (!empty($news['content'])
            ? mb_substr(strip_tags($news['content']), 0, 160) . "..."
            : "Stay updated with the latest news, stories, and events from Thaalam Radio Station.");

    // Image fallback (cover or default banner)
    $image = !empty($news['cover_image'])
        ? $news['cover_image']
        : "https://thaalam.ch/assets/img/logo/thalam-logo.png";

    // Current page URL
    $url = "https://thaalam.ch/news-details?slug={$newsSlug}";

    $keywordsArray = [
        $news['title'] ?? '',
        $news['category'] ?? 'News',
        $news['subtitle'] ?? '',
        $news['tags'] ?? '',
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

    $keywords = implode(", ", array_filter($keywordsArray));

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

    <meta name="author" content="<?php echo htmlspecialchars($news['published_by'] ?? 'Thaalam Radio Station'); ?>">

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes slide-in {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }

        .animate-slide-in {
            animation: slide-in 0.3s ease-out;
        }
    </style>

</head>


<body class="custom-cursor">
    <?php $pagename = 'news'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/toast.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <section class="bg-gray-50">
            <?php include 'php/newsHeader.php'; ?>

            <div class="news-details-wrapper">

                <nav
                    class="border-b bg-[#fafafa]"
                    role="navigation"
                    aria-label="Breadcrumb">
                    <div class="max-w-5xl mx-auto px-4 py-3">
                        <ol class="flex items-center gap-2 text-sm text-gray-500">

                            <li>
                                <a href="index" class="hover:underline">
                                    Home
                                </a>
                            </li>

                            <li class="text-gray-400">/</li>

                            <li>
                                <a href="news-list" class="hover:underline">
                                    News
                                </a>
                            </li>

                            <li class="text-gray-400">/</li>

                            <li
                                id="breadcrumb-title"
                                class="text-gray-900 font-medium truncate max-w-xs md:max-w-md"
                                aria-current="page">
                                News Details
                            </li>

                        </ol>
                    </div>
                </nav>


                <div class="max-w-5xl mx-auto px-4 py-10">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">

                        <article class="lg:col-span-8 bg-white  shadow-sm p-6 md:p-10">
                            <div id="news-details"></div>
                        </article>

                        <aside class="lg:col-span-4 space-y-6 sticky top-24 self-start">

                            <h2 class="text-sm uppercase tracking-widest font-semibold mb-4 text-gray-900">
                                Related News
                            </h2>

                            <div id="related-news" class="space-y-4"></div>

                        </aside>


                    </div>
                </div>
            </div>
        </section>


        <div
            id="comment-modal"
            class="fixed inset-0 z-50 hidden bg-black/40"
            role="dialog"
            aria-modal="true">
            <div class="absolute inset-0 close-comment-modal"></div>

            <div
                class="absolute right-0 top-0 h-full w-full max-w-md
           bg-white shadow-2xl
           flex flex-col animate-slide-in">

                <div class="px-6 py-4 border-b flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">
                            Comments
                        </h3>
                        <p class="text-xs text-gray-500">
                            Join the discussion
                        </p>
                    </div>

                    <button
                        class="close-comment-modal text-gray-400 hover:text-gray-700"
                        aria-label="Close comments">
                        ✕
                    </button>
                </div>

                <div
                    id="comment-list"
                    class="flex-1 overflow-y-auto px-6 py-4 space-y-5">
                    <p class="text-sm text-gray-500">
                        No comments yet. Be the first to comment!
                    </p>
                </div>

                <!-- Comment Form -->
                <div class="border-t bg-gray-50 px-6 py-4">
                    <form id="add-comment-form" class="space-y-3">

                        <input type="hidden" id="news_id" />

                        <!-- Guest / Member Fields -->
                        <div id="member-fields" class="space-y-2"></div>

                        <textarea
                            id="comment-text"
                            rows="3"
                            placeholder="Write your comment…"
                            required
                            class="w-full resize-none rounded-lg border border-gray-300
                 px-3 py-2 text-sm
                 focus:outline-none focus:ring-2 focus:ring-red-500"></textarea>

                        <div class="flex justify-end">
                            <button
                                type="submit"
                                class="px-4 py-2 rounded-lg bg-red-600
                   text-white text-sm font-medium
                   hover:bg-red-700 transition">
                                Post Comment
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>



        <?php include 'php/footer.php'; ?>
    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/news-details.js"></script>

</body>

</html>
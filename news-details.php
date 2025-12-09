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
    <link rel="stylesheet" href="assets/css/module-css/news-details.css">
    <?php include 'php/analyticsHeader.php'; ?>

</head>


<body class="custom-cursor">
    <?php $pagename = 'news'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/toast.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <section class="news-details-page" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">
            <?php include 'php/header.php'; ?>

            <div class="news-details-wrapper">

                <!-- Breadcrumb -->
                <div class="breadcrumb" role="navigation" aria-label="Breadcrumb">
                    <a href="index">Home</a>
                    <a href="news-list">News</a>
                    <span id="breadcrumb-title">News Details</span>
                </div>


                <!-- News Container -->
                <div class="news-container">
                    <div id="news-details"></div>
                </div>

                <div class="related-news-section">
                    <h2 class="related-title">Related News</h2>
                    <div class="related-news-grid" id="related-news"></div>
                </div>
            </div>
        </section>

        <!-- 🗨️ Comment Modal -->
        <div id="comment-modal" class="comment-modal" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">
            <div class="comment-modal-content">
                <div class="comment-header">
                    <button class="close-comment-modal"><i class="fas fa-times"></i></button>
                    <h3 class="comments-title">Comments</h3>
                </div>
                <div id="comment-list" class="comment-list">
                    <p class="no-comments">No comments yet. Be the first to comment!</p>
                </div>

                <div class="comment-form">
                    <form id="add-comment-form">
                        <input type="hidden" name="news_id" id="news_id">
                        <div id="member-fields"></div>
                        <textarea id="comment-text" placeholder="Write your comment..." required></textarea>
                        <button type="submit" class="submit-comment-btn">Post Comment</button>
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
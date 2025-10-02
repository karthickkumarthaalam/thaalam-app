<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
    $podcastId = $_GET['id'] ?? null;

    // API base URL
    $baseUrl = "https://api.demoview.ch/api";
    $metaUrl = "$baseUrl/podcasts/$podcastId/meta-data";

    // Fetch API response
    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    // Title fallback
    $title = !empty($meta['title']) ? $meta['title'] : "Thaalam Radio Station Podcast";

    // Description fallback
    $description = !empty($meta['description']) ? $meta['description'] : "Listen to Thaalam podcasts online";

    // Image fallback
    $image = !empty($meta['image'])
        ? $baseUrl . '/' . str_replace("\\", "/", ltrim($meta['image'], '/'))
        : "https://thaalam.ch/assets/img/common/podcast-details/podcast-banner.jpg";

    // Current page URL
    $url = "https://demoview.ch/summerfest/podcast-details?id={$podcastId}";
    ?>

    <title><?php echo htmlspecialchars($title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>">

    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($image); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($url); ?>">
    <meta property="og:type" content="website">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($image); ?>">

    <!-- Debugging (remove in production) -->
    <!-- DEBUG: Title=<?php echo $title; ?> | Image=<?php echo $image; ?> -->


    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/podcast-details2.css">

    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts details'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <section class="podcast-details-page" style="background: 
            linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
            url('./assets/images/backgrounds/background_image.jpg'); 
            background-repeat: repeat; 
            background-size: auto; 
            background-position: top left; 
            min-height: 200px;">
            <div class="container">
                <div class="podcast-details">
                    <div class="podcast-header">
                        <div class="podcast-image">
                            <img src="assets/img/common/podcast-details/podcast-banner.jpg" alt="podcast-title" id="podcastImage">
                        </div>
                        <div class="podcast-header-details">
                            <div class="podcast-timings">
                                <p id="publishedDate"> </p>
                                <div class="podcast-features">
                                    <button id="like-btn" class="feature-btn">
                                        <i class="fas fa-heart"></i> <span id="like-count"></span>
                                    </button>
                                    <button id="share-btn" class="feature-btn">
                                        <i class="fas fa-share-alt"></i>
                                    </button>

                                    <div id="share-modal" class="share-modal">
                                        <div class="share-content">
                                            <span id="close-share" class="close-btn">&times;</span>
                                            <h3>🔗 Share this Podcast</h3>

                                            <div class="share-features">
                                                <div class="share-link-box">
                                                    <input type="text" id="podcast-link" readonly />
                                                    <button id="copy-link" class="copy-btn">
                                                        <i class="fas fa-copy"></i>
                                                    </button>
                                                </div>

                                                <div class="share-options">
                                                    <a id="share-whatsapp" target="_blank" title="WhatsApp">
                                                        <i class="fab fa-whatsapp"></i>
                                                    </a>
                                                    <a id="share-facebook" target="_blank" title="Facebook">
                                                        <i class="fab fa-facebook"></i>
                                                    </a>
                                                    <a id="share-twitter" target="_blank" class="twitter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path d="M18.244 2.25h3.308l-7.227 8.26 
                                                                   8.502 11.24H16.17l-5.086-6.64-5.82 6.64H1.5l7.73-8.82L1.076 2.25H8.08
                                                                   l4.556 6.06 5.608-6.06z" />
                                                        </svg>
                                                    </a>
                                                    <a id="share-instagram" target="_blank" title="Instagram">
                                                        <i class="fab fa-instagram"></i>
                                                    </a>
                                                    <a id="share-tiktok" target="_blank" title="TikTok" class="tiktok">
                                                        <!-- TikTok SVG Icon -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 24 24">
                                                            <path d="M12.001 2.002c1.104 0 2 .896 2 2v10.086c0 2.012-1.637 3.65-3.65 3.65s-3.65-1.638-3.65-3.65c0-2.012 1.638-3.65 3.65-3.65.182 0 .357.016.528.047v2.35c-.17-.043-.348-.066-.528-.066a1.3 1.3 0 100 2.6 1.3 1.3 0 001.3-1.3V2.002h2z" />
                                                            <path d="M16.998 6.002a4.001 4.001 0 004 4v2a6.003 6.003 0 01-6-6h2z" />
                                                        </svg>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <h4 id="podcastTitle"></h4>

                            <div id="thaalam-audio-player">
                                <!-- Play/Pause -->
                                <audio id="thaalam-player" controls>
                                    <source src="" id="audioSource" type=" audio/mp3">
                                    Your browser does not support the audio element.
                                </audio>
                                <button id="thaalam-play-pause-btn">
                                    <i class="fas fa-play"></i>
                                </button>

                                <!-- Progress -->
                                <div class="thaalam-prograss-controller">
                                    <div id="thaalam-progress-wrapper">
                                        <span id="thaalam-current-time">00:00</span>
                                        <div id="thaalam-progress-bar">
                                            <div id="thaalam-progress-fill"></div>
                                        </div>
                                        <span id="thaalam-duration">30:00</span>
                                    </div>

                                    <!-- Volume -->
                                    <div id="thaalam-volume-control">
                                        <button id="thaalam-volume-btn">
                                            <i class="fas fa-volume-up"></i>
                                        </button>
                                        <input type="range" id="thaalam-volume-slider" min="0" max="1" step="0.01" value="1">
                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>

                    <div class="podcast-description">
                        <p id="podcastDescription">
                        </p>
                    </div>

                    <div class="podcast-informations">
                        <h5 class="info-title">Podcast <span style="color:#000;">Information</span></span></h5>
                        <div class="information">
                            <i class="fas fa-user"></i>
                            <div class="info-text">
                                <p class="info-label">Published By</p>
                                <p class="info-value" id="published-name">Dharshan</p>
                            </div>
                        </div>
                        <div class="information">
                            <i class="fas fa-pen-nib"></i>
                            <div class="info-text">
                                <p class="info-label">Content Creator</p>
                                <p class="info-value" id="content-creator">Dharshan</p>
                            </div>
                        </div>
                        <div class="information">
                            <i class="fas fa-calendar-alt"></i>
                            <div class="info-text">
                                <p class="info-label">Published</p>
                                <p class="info-value" id="published-date">JUNE 7, 2025</p>
                            </div>
                        </div>
                        <div class="information">
                            <i class="fas fa-clock"></i>
                            <div class="info-text">
                                <p class="info-label">Duration</p>
                                <p class="info-value" id="duration">29 MIN</p>
                            </div>
                        </div>
                    </div>

                    <div class="podcast-comments">
                        <h5 class="comment-title">Comment <span style="color:#000;">Section</span> </h5>
                        <div class="add-comment">
                            <textarea id="commentInput" placeholder="Write a comment..."></textarea>
                            <button class="submit-comment" onclick="submitComment(event)"><i class="fas fa-paper-plane"></i></button>
                        </div>

                        <button class="accordion-toggle">
                            <i class="fas fa-comments"></i> View Comments <span id="commentCount"></span>
                        </button>
                        <div class="accordion-content">
                            <div class="comments-list" id="commentsList">
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="related-podcasts container">
                <h5 class="related-title" id="related-title">Related <span style="color:#000;">podcasts</span></h5>
                <div class="podcast-list">
                </div>
            </div>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/podcast-details.js"></script>

</body>

</html>
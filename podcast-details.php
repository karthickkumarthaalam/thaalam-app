<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <?php
    $slug = $_GET['slug'] ?? null;
    $podcastId = $_GET['id'] ?? null;

    $baseUrl = "https://api.demoview.ch/api";
    $metaUrl = "$baseUrl/podcasts/$slug/meta-data";

    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    $podcastId = $meta['id'] ?? $podcastId;

    $title = !empty($meta['title']) ? $meta['title'] : "Thaalam Radio Station Podcast";
    $description = !empty($meta['description']) ? $meta['description'] : "Listen to Thaalam podcasts online";

    $image = !empty($meta['image'])
        ? $baseUrl . '/' . str_replace("\\", "/", ltrim($meta['image'], '/'))
        : "https://thaalam.ch/assets/img/common/podcast-details/podcast-banner.jpg";

    $url = "https://thaalam.ch/podcast-details?slug={$slug}&id={$podcastId}";
    ?>

    <title><?php echo htmlspecialchars($title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description); ?>" />

    <meta property="og:title" content="<?php echo htmlspecialchars($title); ?>" />
    <meta property="og:description" content="<?php echo htmlspecialchars($description); ?>" />
    <meta property="og:image" content="<?php echo htmlspecialchars($image); ?>" />
    <meta property="og:url" content="<?php echo htmlspecialchars($url); ?>" />
    <meta property="og:type" content="website" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="<?php echo htmlspecialchars($title); ?>" />
    <meta name="twitter:description" content="<?php echo htmlspecialchars($description); ?>" />
    <meta name="twitter:image" content="<?php echo htmlspecialchars($image); ?>" />

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        thaalam: "#e60000",
                        dark: "#111111"
                    }
                }
            }
        };
    </script>

    <style>
        /* --------------------------------------------- */
        /* PREMIUM SOFT-GLASS THEME (APPLE-LIKE)         */
        /* --------------------------------------------- */

        .podcast-header-gradient {
            transition: background 0.8s ease;
            filter: brightness(1.08) saturate(1.05);
        }

        * {
            transition: all 0.22s ease;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.62);
            backdrop-filter: blur(16px) saturate(150%);
            -webkit-backdrop-filter: blur(16px) saturate(150%);
            border: 1px solid rgba(255, 255, 255, 0.45);
            border-radius: 18px;
            box-shadow:
                0 8px 30px rgba(16, 24, 40, 0.06);
        }

        .hover-card:hover {
            transform: translateY(-6px);
            box-shadow:
                0 20px 50px rgba(16, 24, 40, 0.08);
        }

        .play-button-circle {
            width: 58px;
            height: 58px;
            background: rgba(0, 0, 0, 0.85);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            border: 1px solid rgba(255, 255, 255, 0.12);
            box-shadow:
                0 8px 30px rgba(0, 0, 0, 0.35);
        }

        .play-button-circle:hover {
            transform: scale(1.08);
            box-shadow:
                0 14px 38px rgba(0, 0, 0, 0.38);
        }

        .video-container {
            aspect-ratio: 16/9;
            border-radius: 14px;
            overflow: hidden;
            background: #000;
            position: relative;
            box-shadow: 0 10px 30px rgba(2, 6, 23, 0.06);
        }

        .progress-bar {
            height: 7px;
            background: rgba(0, 0, 0, 0.06);
            border-radius: 6px;
            overflow: hidden;
            cursor: pointer;
        }

        .progress-fill {
            height: 100%;
            width: 0%;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            transition: width .12s linear;
        }


        /* modal base (we also use tailwind classes) */
        .modal-content {
            will-change: transform, opacity;
        }

        /* small UI niceties */
        .comment {
            background: #fff;
            border-radius: 12px;
            padding: 12px;
            box-shadow: 0 6px 18px rgba(2, 6, 23, 0.04);
        }

        .comment-author {
            font-weight: 600;
            color: #111827;
            font-size: .95rem;
        }

        .comment-text {
            color: #374151;
            margin-top: 6px;
        }

        /* tiny custom scroll */
        .custom-scroll::-webkit-scrollbar {
            width: 8px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: rgba(17, 24, 39, 0.12);
            border-radius: 999px;
        }

        @keyframes modalIn {
            from {
                transform: translateY(8px) scale(.98);
                opacity: 0;
            }

            to {
                transform: translateY(0) scale(1);
                opacity: 1;
            }
        }
    </style>
</head>

<body class="custom-cursor">

    <?php $pagename = "podcast-details"; ?>
    <?php include 'php/toast.php'; ?>
    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <!-- AUDIO ELEMENT -->
    <audio id="thaalam-player" style="display:none;">
        <source id="audioSource" src="" type="audio/mp3" />
    </audio>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <div class=" min-h-screen">

            <!-- HEADER -->
            <div class="podcast-header-gradient h-auto md:h-92 w-full relative flex items-end">
                <div class="absolute inset-0 bg-gradient-to-t from-white to-transparent"></div>

                <div class="container mx-auto my-5 px-4 z-10 py-6 pb-10 flex flex-col md:flex-row items-start md:items-center gap-6">
                    <div class="flex flex-col-reverse md:flex-row gap-6 flex-1 md:items-center">
                        <div class="w-full h-48 md:w-60 md:h-60 rounded-xl overflow-hidden shadow-2xl bg-white">
                            <img id="podcastImage" src="assets/img/common/blog-details/img-3.jpg" class="w-full h-full object-cover" />
                        </div>

                        <div class="flex-1">
                            <h4 id="podcastTitle" class="text-2xl lg:text-4xl font-semibold mb-3 text-white drop-shadow-xl">Loading...</h4>
                            <h2 id="podcastCategoryName" class="text-xl lg:text-2xl text-white drop-shadow">Loading...</h2>

                            <div class="flex flex-wrap items-center gap-3 text-white mt-4">
                                <span class="flex items-center gap-1"><i class="fas fa-calendar text-sm"></i><span id="publishedDate" class="text-sm">Loading...</span></span>
                                <span class="w-1 h-1 bg-white/40 rounded-full"></span>
                                <span class="flex items-center gap-1"><i class="fas fa-clock text-sm"></i><span id="mainDuration" class="text-sm">0 min</span></span>
                                <span class="w-1 h-1 bg-white/40 rounded-full"></span>
                                <span class="flex items-center gap-1"><i class="fas fa-heart text-sm"></i><span><span id="like-count">0</span> likes</span></span>
                            </div>
                        </div>
                    </div>

                    <!-- ACTIONS: LIKE / SHARE / COMMENT -->
                    <div class="flex items-center gap-4">
                        <button id="like-btn" aria-label="Like" class="w-10 h-10 rounded-full border border-white/40 flex items-center justify-center hover:bg-white/10">
                            <i class="far fa-heart text-gray-800 md:text-white"></i>
                        </button>

                        <button id="share-btn" aria-label="Share" class="w-10 h-10 rounded-full border border-white/40 flex items-center justify-center hover:bg-white/10">
                            <i class="fas fa-share-alt text-gray-800 md:text-white"></i>
                        </button>

                        <!-- NEW comment trigger (Option A) -->
                        <button id="comment-btn" aria-label="Comments" class="w-10 h-10 rounded-full border border-white/40 flex items-center justify-center hover:bg-white/10">
                            <i class="far fa-comment-dots text-gray-800 md:text-white"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- PAGE BODY -->
            <div class="container mx-auto px-2 py-4 md:px-4 md:py-8">
                <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
                    <!-- LEFT MAIN -->
                    <div class="lg:col-span-2">
                        <div class="glass-effect rounded-2xl p-3 md:p-6 mb-4 md:mb-8 hover-card">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-headphones text-blue-600"></i>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Audio</h2>
                            </div>

                            <div class="flex justify-between text-sm text-gray-600 mb-2">
                                <span id="thaalam-current-time">0:00</span>
                                <span id="thaalam-duration">0:00</span>
                            </div>

                            <div id="thaalam-progress-bar" class="progress-bar mb-6">
                                <div id="thaalam-progress-fill" class="progress-fill"></div>
                            </div>

                            <div class="flex items-center justify-center gap-8">
                                <button id="shuffle-btn" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-50 hover:text-red-600">
                                    <i class="fas fa-random text-lg"></i>
                                </button>

                                <button id="prev-btn" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-50 hover:text-red-600">
                                    <i class="fas fa-step-backward text-xl"></i>
                                </button>

                                <button id="thaalam-play-pause-btn" class="play-button-circle" aria-label="Play / Pause">
                                    <i class="fas fa-play text-white text-xl"></i>
                                </button>

                                <button id="next-btn" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-50 hover:text-red-600">
                                    <i class="fas fa-step-forward text-xl"></i>
                                </button>

                                <button id="repeat-btn" class="w-10 h-10 rounded-full flex items-center justify-center hover:bg-red-50 hover:text-red-600">
                                    <i class="fas fa-redo text-lg"></i>
                                </button>
                            </div>
                        </div>

                        <!-- video + description (unchanged) -->
                        <div id="videoSection" class="glass-effect rounded-2xl p-3 md:p-6 mb-4 md:mb-8 hover-card">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center">
                                    <i class="fas fa-video text-red-600"></i>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Watch Video</h2>
                            </div>

                            <div id="videoContainer" class="video-container mb-6">
                                <div class="flex items-center justify-center h-full">
                                    <div class="text-center">
                                        <i class="fas fa-video-slash text-gray-400 text-4xl mb-3"></i>
                                        <p class="text-gray-500">No video available</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="glass-effect rounded-2xl p-3 md:p-6 mb-4 md:mb-8 hover-card">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-full bg-red-50 flex items-center justify-center">
                                    <i class="fas fa-file-alt text-red-600"></i>
                                </div>
                                <h2 class="text-xl font-semibold text-gray-800">Description</h2>
                            </div>

                            <div id="podcastDescription" class="text-gray-700 leading-relaxed">
                                <p class="text-gray-500 italic">Loading description...</p>
                            </div>
                        </div>

                        <div id="relatedBottomContainer" class="glass-effect rounded-2xl p-3 md:p-6 hover-card">
                            <div class="flex items-center gap-3 mb-3 md:mb-6">
                                <div class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-stream text-orange-600"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800">Related Podcasts</h3>
                            </div>

                            <div id="relatedPodcastsBottom" class=" space-y-3 md:space-y-4">
                                <div class="skeleton h-20 rounded-lg"></div>
                                <div class="skeleton h-20 rounded-lg"></div>
                                <div class="skeleton h-20 rounded-lg"></div>
                            </div>
                        </div>
                    </div>

                    <!-- SIDEBAR -->
                    <div class="space-y-8">
                        <div class="glass-effect rounded-2xl p-3 md:p-6 hover-card">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-10 h-10 rounded-full bg-purple-50 flex items-center justify-center">
                                    <i class="fas fa-info-circle text-purple-600"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800">Podcast Information</h3>
                            </div>

                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-green-50 flex items-center justify-center">
                                        <i class="fas fa-user text-green-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Published By</p>
                                        <p id="published-name" class="font-semibold text-gray-800">Loading...</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-blue-50 flex items-center justify-center">
                                        <i class="fas fa-pen-nib text-blue-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Content Creator</p>
                                        <p id="content-creator" class="font-semibold text-gray-800">Loading...</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-purple-50 flex items-center justify-center">
                                        <i class="fas fa-calendar-alt text-purple-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Published</p>
                                        <p id="published-date" class="font-semibold text-gray-800">Loading...</p>
                                    </div>
                                </div>

                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 rounded-xl bg-yellow-50 flex items-center justify-center">
                                        <i class="fas fa-clock text-yellow-600"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-500">Duration</p>
                                        <p id="sidebar-duration" class="font-semibold text-gray-800">Loading...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="relatedSidebarContainer" class="glass-effect rounded-2xl p-3 md:p-6 hover-card">
                            <div class="flex items-center gap-3 mb-3 md:mb-6">
                                <div class="w-10 h-10 rounded-full bg-orange-50 flex items-center justify-center">
                                    <i class="fas fa-stream text-orange-600"></i>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800">Related Podcasts</h3>
                            </div>

                            <div id="relatedPodcastsSidebar" class=" space-y-3 md:space-y-4">
                                <div class="skeleton h-20 rounded-lg"></div>
                                <div class="skeleton h-20 rounded-lg"></div>
                                <div class="skeleton h-20 rounded-lg"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include 'php/footer.php'; ?>
    </div>

    <!-- SHARE MODAL -->
    <div id="share-modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[9999] hidden">
        <div class="flex items-center justify-center min-h-screen p-4">
            <div id="share-modal-box" class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 modal-content animate-in"
                style="animation: modalIn .25s ease both;">
                <button id="close-share" class="absolute top-6 right-6 w-10 h-10 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-times text-gray-600"></i>
                </button>

                <h3 class="text-xl font-bold mb-4 text-gray-900">Share Podcast</h3>

                <div class="grid grid-cols-5 gap-4 mb-6">
                    <a id="share-whatsapp" target="_blank" class="flex flex-col items-center gap-1 p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition">
                        <i class="fab fa-whatsapp text-green-600 text-xl"></i>
                        <span class="text-xs">WhatsApp</span>
                    </a>

                    <a id="share-facebook" target="_blank" class="flex flex-col items-center gap-1 p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition">
                        <i class="fab fa-facebook text-blue-600 text-xl"></i>
                        <span class="text-xs">Facebook</span>
                    </a>

                    <a id="share-twitter" target="_blank" class="flex flex-col items-center gap-1 p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path d="M18.244 2.25h3.308l-7.227 8.26 
                                                                   8.502 11.24H16.17l-5.086-6.64-5.82 6.64H1.5l7.73-8.82L1.076 2.25H8.08
                                                                   l4.556 6.06 5.608-6.06z" />
                        </svg> <span class="text-xs">Twitter</span>
                    </a>

                    <a id="share-instagram" target="_blank" class="flex flex-col items-center gap-1 p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition">
                        <i class="fab fa-instagram text-pink-600 text-xl"></i>
                        <span class="text-xs">Instagram</span>
                    </a>

                    <a id="share-tiktok" target="_blank" class="flex flex-col items-center gap-1 p-3 bg-gray-50 hover:bg-gray-100 rounded-xl transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12.001 2.002c1.104 0 2 .896 2 2v10.086c0 2.012-1.637 3.65-3.65 3.65s-3.65-1.638-3.65-3.65c0-2.012 1.638-3.65 3.65-3.65.182 0 .357.016.528.047v2.35c-.17-.043-.348-.066-.528-.066a1.3 1.3 0 100 2.6 1.3 1.3 0 001.3-1.3V2.002h2z" />
                            <path d="M16.998 6.002a4.001 4.001 0 004 4v2a6.003 6.003 0 01-6-6h2z" />
                        </svg>
                        <span class="text-xs">TikTok</span>
                    </a>
                </div>

                <label class="text-sm text-gray-600 mb-2 block">Share Link</label>
                <div class="flex gap-2">
                    <input id="podcast-link" readonly class="flex-1 px-3 py-2 border rounded-lg bg-gray-100 text-gray-700" />
                    <button id="copy-link" class="px-4 py-2 bg-black text-white rounded-lg hover:bg-black/80">Copy</button>
                </div>
            </div>
        </div>
    </div>

    <!-- COMMENT MODAL -->
    <div id="comments-modal" class="fixed inset-0 bg-black/40 backdrop-blur-sm z-[9999] hidden">
        <div class="flex items-center justify-center min-h-screen p-4 overflow-y-auto">

            <div id="comments-modal-box"
                class="relative bg-white w-full max-w-2xl rounded-2xl shadow-xl p-6"
                style="animation: modalIn .25s ease both;">

                <!-- Close Button -->
                <button id="close-comments"
                    class="absolute top-5 right-5 w-9 h-9 bg-gray-100 hover:bg-gray-200 rounded-full flex items-center justify-center">
                    <i class="fas fa-times text-gray-600 text-sm"></i>
                </button>

                <!-- Header -->
                <h3 class="text-2xl font-bold text-gray-900 mb-3">
                    Comments <span id="commentCount" class="text-sm text-gray-500"></span>
                </h3>

                <!-- Comments List -->
                <div id="comments-list" class="space-y-4 max-h-80 overflow-y-auto pr-2 custom-scroll">
                    <p class="text-gray-500">Loading...</p>
                </div>

                <div class="border-t my-4"></div>

                <!-- Small Text Trigger -->
                <p id="toggle-comment-box"
                    class="text-sm font-medium text-blue-600 cursor-pointer hover:underline mb-3">
                    ✏️ Write a comment
                </p>

                <!-- Accordion Section -->
                <div id="comment-input-section" class="hidden">

                    <div id="guest-fields" class="flex flex-col md:flex-row gap-2 mb-3 w-full">
                        <input id="guest-name"
                            type="text"
                            placeholder="Your name"
                            class="flex-1 px-3 py-2 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none" />

                        <input id="guest-email"
                            type="email"
                            placeholder="Your email"
                            class="flex-1 px-3 py-2 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-500 outline-none" />
                    </div>

                    <textarea id="comment-message"
                        placeholder="Write your comment..."
                        class="w-full px-4 py-3 border rounded-lg bg-gray-50 focus:ring-2 focus:ring-blue-600 outline-none"
                        rows="3"></textarea>

                    <button id="submit-comment"
                        class="w-full mt-4 py-2.5 rounded-lg bg-blue-600 text-white font-semibold hover:bg-blue-700 transition">
                        Post Comment
                    </button>
                </div>
            </div>
        </div>
    </div>


    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <!-- Use our updated JS file -->
    <script src="assets/js/module/podcast-details.js" defer></script>
</body>

</html>
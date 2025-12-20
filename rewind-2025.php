<!DOCTYPE html>
<html>

<head>
    <?php
    $page_title = "Rewind - 2025 - Thaalam Radio Station";
    $page_description = "Explore Thaalam Radio Station podcasts. Listen to stories, music, and shows that connect you with our vibrant community.";
    $page_url = "https://thaalam.ch/rewind-2025";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php' ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Soft pulse for play button */
        @keyframes pulseSoft {
            0% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0.4);
            }

            70% {
                box-shadow: 0 0 0 8px rgba(239, 68, 68, 0);
            }

            100% {
                box-shadow: 0 0 0 0 rgba(239, 68, 68, 0);
            }
        }

        .animate-pulse {
            animation: pulseSoft 2s infinite;
        }

        /* Smooth dock slide */
        #player-dock {
            transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1);
        }
    </style>



</head>

<body class="bg-white custom-cursor page-podcast-list">
    <?php $pagename = "rewind-2025"; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <div style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); ">

            <section class="max-w-6xl mx-auto px-4 py-4 relative overflow-hidden min-h-screen ">


                <div class="bg-transparent">
                    <div class="relative z-10 text-center">
                        <h1 class="text-2xl md:text-3xl font-semibold text-dark tracking-tight animate-sideFadeLeft">
                            Thaalam <span class="text-red-500">Rewind 2025</span>
                        </h1>
                        </h1>
                        <p class="text-[14px] sm:text-sm text-gray-500 mt-1 animate-cardReveal">
                            Recap of important incidents happend in 2025
                        </p>
                    </div>

                    <div id="podcast-list" class="min-h-screen">
                    </div>

                    <div id="pagination" class="flex justify-center my-6">
                    </div>
                </div>

                <div id="player-dock" class="fixed bottom-6 left-1/2 -translate-x-1/2 w-[92%] max-w-4xl bg-white/90 backdrop-blur-xl border border-white/20 shadow-[0_20px_50px_rgba(0,0,0,0.15)] rounded-3xl p-4 translate-y-[150%] transition-all duration-700 z-[100]">
                    <div class="flex items-center gap-4">
                        <div class="hidden sm:flex w-14 h-14 bg-gradient-to-br from-red-500 to-pink-600 rounded-2xl items-center justify-center text-white shadow-lg shadow-red-200">
                            <svg class="w-6 h-6 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                            </svg>
                        </div>

                        <div class="flex-1 min-w-0">
                            <h4 id="dock-title" class="text-base font-bold text-gray-900 truncate tracking-tight">Not Playing</h4>
                            <p id="dock-rj" class="text-sm text-red-500 font-medium truncate">Select a track</p>

                            <div class="mt-2 flex items-center gap-3">
                                <span id="dock-cur" class="text-[10px] font-mono text-gray-400 w-8">0:00</span>
                                <div class="flex-1 h-1.5 bg-gray-100 rounded-full overflow-hidden cursor-pointer relative group" id="progress-container">
                                    <div id="dock-progress" class="h-full bg-red-500 w-0 transition-all duration-100 relative">
                                        <div class="absolute right-0 top-1/2 -translate-y-1/2 w-3 h-3 bg-red-600 rounded-full opacity-0 group-hover:opacity-100 shadow-md"></div>
                                    </div>
                                </div>
                                <span id="dock-dur" class="text-[10px] font-mono text-gray-400 w-8">0:00</span>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <button id="dock-play-pause" class="w-12 h-12 bg-gray-900 text-white rounded-2xl flex items-center justify-center hover:bg-red-500 transition-all shadow-lg active:scale-90">
                                <span class="text-lg">▶</span>
                            </button>
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
    <script src="assets/js/module/rewind.js" defer></script>
</body>

</html>
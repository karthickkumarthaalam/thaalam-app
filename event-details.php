<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <?php
    $eventSlug = $_GET['slug'] ?? null;

    $baseUrl = "https://api.demoview.ch/api";
    $metaUrl = "$baseUrl/event/details/$eventSlug";

    $response = @file_get_contents($metaUrl);
    $meta = $response ? json_decode($response, true) : [];

    $event = $meta['data'] ?? [];

    $title = !empty($event['title'])
        ? $event['title'] . " - Thaalam Radio Station"
        : "Thaalam Events";

    $raw = strip_tags($event['description'] ?? '');
    $name = $event['title'] ?? "This event";

    if (!empty($raw)) {
        $clean = preg_replace('/\s+/', ' ', trim($raw));
        $description = mb_substr($clean, 0, 160) . (mb_strlen($clean) > 160 ? "..." : "");
    } else {
        $description = "$name is packed with exciting moments. Explore details and join us!";
    }
    $image = !empty($event['logo_image'])
        ? $event['logo_image']
        : "https://thaalam.ch/assets/img/logo/thalam-logo.png";

    $url = "https://thaalam.ch/event-details?slug={$eventSlug}";

    $keywords = implode(", ", [
        $event['title'] ?? "",
        $event['country'] ?? "Swiss",
        $event['venue'] ?? "",
        "Thaalam Event",
        "Thaalam Shows",
        "Tamil Events",
        "Live Shows",
        "Cultural Events",
        "Music Concerts",
        "Festival Events",
        "Community Programs",
        "Event Tickets",
        "Local Tamil Events",
        "Entertainment News",
    ]);


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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Dark Scrollbar */
        #crewModalBox ::-webkit-scrollbar {
            width: 6px;
        }

        #crewModalBox ::-webkit-scrollbar-track {
            background: transparent;
        }

        #crewModalBox ::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.15);
            border-radius: 10px;
        }

        #crewModalBox ::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }
    </style>

</head>

<body class="bg-white">

    <?php $pagename = 'events-details'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="relative">
        <?php include 'php/eventHeader.php'; ?>
        <div id="event-details-container">

            <section id="event-banner-section" class="relative overflow-hidden ">
                <div class="relative w-full  h-[220px] sm:h-[290px] md:h-[370px] lg:h-[520px] xl:h-[620px] bg-black ">
                    <!-- Track Container with overflow hidden -->
                    <div class="w-full h-full overflow-hidden rounded-b-2xl">
                        <!-- Track -->
                        <div id="loopTrack" class="flex h-full will-change-transform transition-transform duration-700 ease-in-out"></div>
                    </div>

                    <!-- Controls -->
                    <button id="prevBtn" class="absolute left-6 top-1/2 -translate-y-1/2 z-20 bg-black/50 hover:bg-black/80 text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition-all duration-300 shadow-lg hover:scale-105 active:scale-95">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>
                    <button id="nextBtn" class="absolute right-6 top-1/2 -translate-y-1/2 z-20 bg-black/50 hover:bg-black/80 text-white w-10 h-10 md:w-12 md:h-12 rounded-full flex items-center justify-center backdrop-blur-sm transition-all duration-300 shadow-lg hover:scale-105 active:scale-95">
                        <svg class="w-5 h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <!-- Dots Indicator -->
                    <div id="bannerDots" class="absolute bottom-4 left-1/2 -translate-x-1/2 z-20 flex gap-2"></div>
                </div>
            </section>

            <section id="event-header-section"></section>

            <!-- DESCRIPTION -->
            <section id="event-description-section" class="bg-black"></section>


            <section id="event-crew-section"
                class="relative py-20 bg-gradient-to-b from-black to-gray-900 text-white overflow-hidden">

                <!-- ambient glow -->
                <div class="absolute inset-0 pointer-events-none">
                    <div class="absolute top-20 left-20 w-72 h-72 bg-blue-500/5 rounded-full blur-3xl"></div>
                    <div class="absolute bottom-20 right-20 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
                </div>

                <!-- crew decorations -->
                <div class="crew-decorations absolute inset-0 pointer-events-none z-0">
                    <img
                        src="assets/images/shapes/team-two-shape-1.png"
                        alt=""
                        class="decor-1 absolute top-10 left-0 w-24 md:w-32 animate-bounce" />
                    <img
                        src="assets/images/shapes/team-two-shape-2.png"
                        alt=""
                        class="decor-2 absolute bottom-0 right-0 w-32 md:w-44 animate-bounce" />
                </div>

                <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <!-- Header -->
                    <div class="text-center mb-14">
                        <h5 class="text-2xl md:text-3xl font-semibold text-slate-100 mb-3">
                            Explore Artists
                        </h5>
                        <p class="text-gray-400 max-w-xl mx-auto">
                            Discover the stars lighting up our stage
                        </p>
                    </div>

                    <!-- Carousel -->
                    <div class="crew-carousel relative overflow-hidden">
                        <div class="crew-track" id="crewTrack"></div>
                    </div>

                </div>
            </section>




            <!-- AMENITIES -->
            <section id="event-amenities-section"></section>


        </div>

        <!-- SMALL CREW MODAL (Right Expanding) -->
        <div id="crewModal"
            class="fixed inset-0 z-50 hidden
            items-center justify-center
            bg-black/60 backdrop-blur-sm
            transition-opacity duration-300
            px-6 md:px-16">

            <!-- Modal Box -->
            <div id="crewModalBox"
                class="relative w-auto
              max-w-[90vw] md:max-w-4xl
              bg-[#111111]
              border border-white/10
              rounded-2xl
              shadow-2xl
              overflow-hidden
              transform scale-95 opacity-0
              transition-all duration-300">

                <!-- Close -->
                <button id="crewModalClose"
                    class="absolute top-4 right-4 z-20
                   w-8 h-8 rounded-full
                   bg-white/5 hover:bg-white/10
                   border border-white/10
                   flex items-center justify-center
                   text-white text-sm">
                    ✕
                </button>

                <div class="flex">

                    <!-- IMAGE (FIXED WIDTH - NEVER SHRINKS) -->
                    <div class="relative w-[320px] flex-shrink-0 bg-black">
                        <img id="crewModalImg"
                            class="w-full h-full object-cover" />
                    </div>

                    <!-- CONTENT (EXPANDS WIDTH) -->
                    <div class="p-8 flex flex-col justify-center
                  max-h-[80vh] overflow-y-auto ">

                        <h2 id="crewModalName"
                            class="text-2xl font-semibold text-white mb-1">
                        </h2>

                        <p id="crewModalRole"
                            class="text-blue-400 text-xs uppercase tracking-widest mb-4">
                        </p>

                        <p id="crewModalBio"
                            class="text-gray-400 text-sm leading-relaxed mb-6">
                        </p>

                        <div id="crewModalLinks"
                            class="flex flex-wrap gap-2">
                        </div>

                    </div>

                </div>

            </div>
        </div>



        <!-- CONTACT + ENQUIRY SECTION -->
        <section class="relative py-16 bg-gradient-to-b from-gray-950 to-black border-t border-white/10">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">

                    <!-- LEFT : Company Contact Details -->
                    <!-- LEFT : Dynamic Contact Details -->
                    <div
                        id="event-contact-section"
                        class="text-white space-y-6 ">
                        <!-- Will be rendered dynamically -->
                    </div>


                    <!-- RIGHT : Enquiry Form -->
                    <div class="bg-white/5 backdrop-blur-xl border border-white/10 rounded-2xl p-8">

                        <h3 class="text-2xl font-semibold text-white mb-6">
                            Send an Enquiry
                        </h3>
                        <form id="eventEnquiryForm" class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            <input type="hidden" id="event_id" name="event_id">

                            <!-- Name -->
                            <div>
                                <input type="text" name="name" placeholder="Your Name"
                                    class="w-full rounded-xl bg-black/40 border border-white/10 
                   px-4 py-3 text-white placeholder-gray-400
                   focus:outline-none focus:border-blue-500 transition"
                                    required>
                            </div>

                            <!-- Email -->
                            <div>
                                <input type="email" name="email" placeholder="Your Email"
                                    class="w-full rounded-xl bg-black/40 border border-white/10 
                   px-4 py-3 text-white placeholder-gray-400
                   focus:outline-none focus:border-blue-500 transition"
                                    required>
                            </div>

                            <!-- Phone -->
                            <div>
                                <input type="text" name="phone" placeholder="Phone Number"
                                    class="w-full rounded-xl bg-black/40 border border-white/10 
                   px-4 py-3 text-white placeholder-gray-400
                   focus:outline-none focus:border-blue-500 transition">
                            </div>

                            <!-- Subject -->
                            <div>
                                <input type="text" name="subject" placeholder="Subject"
                                    class="w-full rounded-xl bg-black/40 border border-white/10 
                   px-4 py-3 text-white placeholder-gray-400
                   focus:outline-none focus:border-blue-500 transition">
                            </div>

                            <!-- Message (Full Width) -->
                            <div class="md:col-span-2">
                                <textarea name="message" rows="4" placeholder="Your Message"
                                    class="w-full rounded-xl bg-black/40 border border-white/10 
                   px-4 py-3 text-white placeholder-gray-400
                   focus:outline-none focus:border-blue-500 transition"
                                    required></textarea>
                            </div>

                            <!-- Button (Full Width) -->
                            <div class="md:col-span-2">
                                <button type="submit"
                                    class="w-full py-3 rounded-xl font-semibold text-white
                   bg-gradient-to-r from-blue-600 to-cyan-500
                   hover:from-blue-700 hover:to-cyan-600
                   transition-all duration-300
                   shadow-lg hover:shadow-blue-500/30">
                                    Submit Enquiry
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </section>


        <div class="relative py-6 text-center bg-gradient-to-b to-gray-900 from-black border-t border-white/10">
            <p class="text-sm text-gray-400 tracking-wide">
                © <span id="currentYear"></span>
                <span class="text-white font-medium">Thaalam media GmbH</span>.
                All rights reserved.
            </p>
        </div>

        <script>
            document.getElementById("currentYear").textContent =
                new Date().getFullYear();
        </script>

    </div>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/event-details.js" defer></script>

</body>

</html>
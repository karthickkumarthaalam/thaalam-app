<!DOCTYPE html>
<html>

<head>
    <?php
    $page_title = "Podcasts - Thaalam Radio Station";
    $page_description = "Explore Thaalam Radio Station podcasts. Listen to stories, music, and shows that connect you with our vibrant community.";
    $page_url = "https://thaalam.ch/podcasts-list";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php' ?>
    <?php include 'php/analyticsHeader.php'; ?>

    <style>
        .page-wrapper,
        #podcast-list {
            max-width: 100%;
            overflow-x: hidden;
        }

        @keyframes cardReveal {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-cardReveal {
            animation: cardReveal 0.5s ease forwards;
        }

        @keyframes sideFadeLeft {
            from {
                opacity: 0;
                transform: translateX(-8px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes sideFadeRight {
            from {
                opacity: 0;
                transform: translateX(8px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-sideFadeLeft {
            animation: sideFadeLeft 0.6s ease forwards;
        }

        .animate-sideFadeRight {
            animation: sideFadeRight 0.6s ease forwards;
            animation-delay: 0.2s;
        }

        @keyframes micFloat {

            0%,
            100% {
                transform: translateY(-50%) translateX(0);
            }

            50% {
                transform: translateY(-50%) translateX(-4px);
            }
        }

        .animate-micFloat {
            animation: micFloat 5s ease-in-out infinite;
        }

        .icon-anim:hover {
            transform: scale(1.2);
            transition: 0.2s;
        }

        @media (max-width: 640px) {

            .podcast-card,
            #podcast-list,
            .page-wrapper {
                overflow-x: hidden !important;
                max-width: 100vw !important;
            }
        }

        /* ====== PREMIUM JELLY BACKGROUND ANIMATIONS ====== */
        .jelly-layer {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
            filter: contrast(120%) brightness(120%);
        }

        /* Jelly blob with premium glow */
        .jelly-blob {
            position: absolute;
            background: radial-gradient(circle at center,
                    rgba(255, 0, 127, 0.6) 0%,
                    rgba(138, 43, 226, 0.4) 40%,
                    rgba(79, 70, 229, 0.2) 70%,
                    transparent 100%);
            border-radius: 50%;
            filter: blur(30px);
            opacity: 0.4;
            z-index: 0;
            mix-blend-mode: screen;
            animation-timing-function: cubic-bezier(0.42, 0, 0.58, 1);
        }

        /* Floating jelly shapes */
        .jelly-shape {
            position: absolute;
            background: linear-gradient(45deg,
                    rgba(230, 0, 0, 0.3) 0%,
                    rgba(255, 0, 127, 0.2) 100%);
            filter: blur(30px);
            opacity: 0.3;
            animation-timing-function: cubic-bezier(0.37, 0, 0.63, 1);
        }

        /* Main jelly blobs */
        .jelly-1 {
            width: 800px;
            height: 800px;
            top: -30%;
            left: -20%;
            animation: jellyFloat1 35s infinite alternate,
                jellyMorph1 25s infinite ease-in-out,
                jellyPulse1 15s infinite alternate;
        }

        .jelly-2 {
            width: 700px;
            height: 700px;
            bottom: -25%;
            right: -15%;
            animation: jellyFloat2 40s infinite alternate,
                jellyMorph2 30s infinite ease-in-out,
                jellyPulse2 18s infinite alternate;
        }

        .jelly-3 {
            width: 600px;
            height: 600px;
            top: 40%;
            right: 30%;
            opacity: 0.25;
            animation: jellyFloat3 45s infinite alternate,
                jellyMorph3 35s infinite ease-in-out;
        }

        /* Jelly shapes */
        .shape-1 {
            width: 300px;
            height: 300px;
            top: 20%;
            left: 10%;
            border-radius: 45% 55% 60% 40% / 50% 40% 60% 50%;
            animation: shapeFloat1 25s infinite alternate,
                shapeMorph1 15s infinite ease-in-out;
        }

        .shape-2 {
            width: 250px;
            height: 250px;
            bottom: 30%;
            left: 5%;
            border-radius: 60% 40% 40% 60% / 60% 50% 50% 40%;
            animation: shapeFloat2 30s infinite alternate,
                shapeMorph2 20s infinite ease-in-out;
        }

        .shape-3 {
            width: 200px;
            height: 200px;
            top: 60%;
            right: 10%;
            border-radius: 40% 60% 50% 50% / 50% 60% 40% 50%;
            animation: shapeFloat3 20s infinite alternate,
                shapeMorph3 18s infinite ease-in-out;
        }

        /* Jelly float animations */
        @keyframes jellyFloat1 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(-80px, 60px) rotate(120deg);
            }

            66% {
                transform: translate(40px, -40px) rotate(240deg);
            }

            100% {
                transform: translate(-60px, 80px) rotate(360deg);
            }
        }

        @keyframes jellyFloat2 {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(60px, -80px) rotate(-120deg);
            }

            66% {
                transform: translate(-40px, 60px) rotate(-240deg);
            }

            100% {
                transform: translate(80px, -60px) rotate(-360deg);
            }
        }

        @keyframes jellyFloat3 {
            0% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(-40px, 40px) scale(1.1);
            }

            100% {
                transform: translate(40px, -40px) scale(0.9);
            }
        }

        /* Jelly morphing animations */
        @keyframes jellyMorph1 {

            0%,
            100% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }

            25% {
                border-radius: 30% 60% 70% 40% / 50% 60% 30% 60%;
            }

            50% {
                border-radius: 50% 50% 30% 70% / 50% 40% 60% 50%;
            }

            75% {
                border-radius: 70% 30% 50% 50% / 40% 60% 50% 60%;
            }
        }

        @keyframes jellyMorph2 {

            0%,
            100% {
                border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
            }

            25% {
                border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            }

            50% {
                border-radius: 30% 70% 50% 50% / 30% 50% 70% 50%;
            }

            75% {
                border-radius: 70% 30% 60% 40% / 70% 60% 30% 40%;
            }
        }

        @keyframes jellyMorph3 {

            0%,
            100% {
                border-radius: 50% 50% 50% 50% / 50% 50% 50% 50%;
            }

            33% {
                border-radius: 40% 60% 40% 60% / 60% 40% 60% 40%;
            }

            66% {
                border-radius: 60% 40% 60% 40% / 40% 60% 40% 60%;
            }
        }

        /* Jelly pulse animations */
        @keyframes jellyPulse1 {

            0%,
            100% {
                opacity: 0.4;
                filter: blur(60px) brightness(1);
            }

            50% {
                opacity: 0.6;
                filter: blur(80px) brightness(1.2);
            }
        }

        @keyframes jellyPulse2 {

            0%,
            100% {
                opacity: 0.3;
                filter: blur(50px) brightness(1);
            }

            50% {
                opacity: 0.5;
                filter: blur(70px) brightness(1.3);
            }
        }

        /* Shape animations */
        @keyframes shapeFloat1 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(30px, -30px) rotate(180deg);
            }
        }

        @keyframes shapeFloat2 {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            50% {
                transform: translate(-25px, 25px) rotate(-90deg);
            }
        }

        @keyframes shapeFloat3 {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            50% {
                transform: translate(20px, 20px) scale(1.3);
            }
        }

        @keyframes shapeMorph1 {

            0%,
            100% {
                border-radius: 45% 55% 60% 40% / 50% 40% 60% 50%;
            }

            50% {
                border-radius: 60% 40% 45% 55% / 40% 60% 50% 40%;
            }
        }

        @keyframes shapeMorph2 {

            0%,
            100% {
                border-radius: 60% 40% 40% 60% / 60% 50% 50% 40%;
            }

            50% {
                border-radius: 40% 60% 60% 40% / 50% 60% 40% 50%;
            }
        }

        @keyframes shapeMorph3 {

            0%,
            100% {
                border-radius: 40% 60% 50% 50% / 50% 60% 40% 50%;
            }

            50% {
                border-radius: 50% 50% 60% 40% / 60% 50% 50% 40%;
            }
        }

        /* Wave effect */
        .jelly-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: linear-gradient(to top,
                    rgba(230, 0, 0, 0.1) 0%,
                    transparent 100%);
            animation: waveMove 10s infinite linear;
            mask-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none"><path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25"/><path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5"/><path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z"/></svg>');
            mask-size: 1200px 100%;
            mask-repeat: repeat-x;
        }

        @keyframes waveMove {
            0% {
                mask-position: 0 bottom;
            }

            100% {
                mask-position: 1200px bottom;
            }
        }

        /* Interactive jelly effect on hover */
        .jelly-interactive {
            transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        .jelly-interactive:hover {
            filter: blur(100px) brightness(1.5);
            transform: scale(1.2);
        }

        /* Dynamic color shifting */
        @keyframes colorShift {
            0% {
                background: radial-gradient(circle at center,
                        rgba(255, 0, 127, 0.6) 0%,
                        rgba(138, 43, 226, 0.4) 40%,
                        rgba(79, 70, 229, 0.2) 70%,
                        transparent 100%);
            }

            33% {
                background: radial-gradient(circle at center,
                        rgba(79, 70, 229, 0.6) 0%,
                        rgba(230, 0, 0, 0.4) 40%,
                        rgba(255, 0, 127, 0.2) 70%,
                        transparent 100%);
            }

            66% {
                background: radial-gradient(circle at center,
                        rgba(138, 43, 226, 0.6) 0%,
                        rgba(79, 70, 229, 0.4) 40%,
                        rgba(230, 0, 0, 0.2) 70%,
                        transparent 100%);
            }

            100% {
                background: radial-gradient(circle at center,
                        rgba(255, 0, 127, 0.6) 0%,
                        rgba(138, 43, 226, 0.4) 40%,
                        rgba(79, 70, 229, 0.2) 70%,
                        transparent 100%);
            }
        }

        .jelly-1 {
            animation: colorShift 45s infinite alternate;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .jelly-blob {
                filter: blur(40px);
            }

            .jelly-1 {
                width: 500px;
                height: 500px;
            }

            .jelly-2 {
                width: 400px;
                height: 400px;
            }

            .jelly-3 {
                width: 300px;
                height: 300px;
            }

            .jelly-shape {
                filter: blur(20px);
            }

            .shape-1,
            .shape-2,
            .shape-3 {
                width: 150px;
                height: 150px;
            }
        }

        /* Content wrapper with higher z-index */
        .content-wrapper {
            position: relative;
            z-index: 10;
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            padding: 1.5rem;
        }
    </style>
</head>

<body class="bg-white custom-cursor page-podcast-list">
    <?php $pagename = "podcasts"; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>


        <section class="relative">
            <!-- 🔥 PREMIUM JELLY BACKGROUND ANIMATIONS -->
            <div class="jelly-layer">
                <!-- Main jelly blobs -->
                <div class="jelly-blob jelly-1 jelly-interactive"></div>
                <div class="jelly-blob jelly-2 jelly-interactive"></div>
                <div class="jelly-blob jelly-3"></div>

                <!-- Jelly shapes -->
                <div class="jelly-shape shape-1"></div>
                <div class="jelly-shape shape-2"></div>
                <div class="jelly-shape shape-3"></div>

                <!-- Wave effect -->
                <div class="jelly-wave"></div>
            </div>

            <section class="max-w-7xl mx-auto px-4 py-6 relative overflow-hidden min-h-screen bg-white/10 backdrop-blur-[42px]  rounded-2xl">
                <!-- Content wrapper -->
                <div class="content-wrapper bg-transparent">
                    <div class="relative flex flex-col items-center sm:flex-row justify-between border-b border-gray-200 pb-4 gap-4">

                        <!-- Left Icon -->
                        <div class="absolute left-1 top-1/2 -translate-y-1/2 text-thaalam opacity-[0.05] text-3xl sm:text-4xl animate-micFloat pointer-events-none">
                            <i class="fa-solid fa-podcast"></i>
                        </div>

                        <!-- TITLE -->
                        <div class="relative z-10 ml-2">
                            <h1 class="text-2xl md:text-3xl font-semibold text-dark tracking-tight animate-sideFadeLeft">
                                Thaalam <span class="text-thaalam">Podcasts</span>
                            </h1>
                            <p class="text-[12px] sm:text-xs text-gray-500 mt-1 animate-cardReveal">
                                Listen to legendary Tamil beats 🎧
                            </p>
                        </div>

                        <!-- SEARCH -->
                        <div class="relative z-10 w-full sm:w-[260px] animate-sideFadeRight">
                            <div class="flex items-center bg-slate-50/80 backdrop-blur-sm rounded-md px-3 py-[6px] focus-within:ring-2 focus-within:ring-thaalam/50 transition-all">
                                <input type="text" id="podcastSearchInput"
                                    placeholder="Search podcasts..."
                                    class="bg-transparent text-[14px] w-full focus:outline-none text-dark placeholder:text-gray-400" />
                                <button id="podcastSearchBtn">
                                    <i class="fa fa-search text-xs text-gray-600 hover:text-thaalam transition-transform hover:scale-110"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- CARDS GRID -->
                    <div id="podcast-list" class="min-h-screen "></div>

                    <!-- PAGINATION -->
                    <div id="pagination" class="flex justify-center my-6"></div>
                </div>

            </section>

        </section>


        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/podcast.js" defer></script>

    <!-- Enhanced animations script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Interactive jelly effect
            const jellyLayer = document.querySelector('.jelly-layer');

            // Mouse move effect on jelly background
            document.addEventListener('mousemove', (e) => {
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;

                const blobs = document.querySelectorAll('.jelly-interactive');
                blobs.forEach((blob, index) => {
                    const speed = 0.05 + (index * 0.02);
                    const moveX = (x - 0.5) * 100 * speed;
                    const moveY = (y - 0.5) * 100 * speed;

                    blob.style.transform = `translate(${moveX}px, ${moveY}px) scale(${1 + (index * 0.1)})`;
                });
            });

            // Parallax effect on scroll
            let lastScrollY = window.scrollY;

            function updateJellyParallax() {
                const scrolled = window.scrollY;
                const blobs = document.querySelectorAll('.jelly-blob');

                blobs.forEach((blob, index) => {
                    const speed = 0.3 + (index * 0.1);
                    const yPos = -(scrolled * speed * 0.5);
                    blob.style.transform += ` translateY(${yPos}px)`;
                });

                lastScrollY = scrolled;
                requestAnimationFrame(updateJellyParallax);
            }

            // Start parallax effect
            requestAnimationFrame(updateJellyParallax);

            // Add animation to cards when they load
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry, index) => {
                    if (entry.isIntersecting) {
                        setTimeout(() => {
                            entry.target.style.opacity = '1';
                            entry.target.style.transform = 'translateY(0)';
                        }, index * 100);
                    }
                });
            }, {
                threshold: 0.1
            });

            // Observe podcast cards (you'll need to add this when cards are loaded)
            function observeCards() {
                const cards = document.querySelectorAll('.podcast-card');
                cards.forEach(card => {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(20px)';
                    card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    observer.observe(card);
                });
            }

            // Call observeCards when your podcast.js loads cards
            setTimeout(observeCards, 1000);
        });
    </script>
</body>

</html>
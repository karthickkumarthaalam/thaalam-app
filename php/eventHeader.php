<header class="relative z-50">

    <div id="mainHeader"
        class="relative bg-gradient-to-b from-black to-gray-900
           shadow-lg transition-all duration-300">

        <div class="px-6">
            <div class="flex items-center justify-between h-16 md:h-20">
                <div class="w-24 md:w-32"></div>

                <div id="headerContactSection"
                    class="hidden lg:flex flex-col items-end gap-3">
                </div>


            </div>
        </div>


        <div class="absolute left-1/2 -translate-x-1/2
                -bottom-6 md:-bottom-8
                z-50">

            <img
                src="assets/img/logo/thalam-logo.png"
                alt="Thalam"
                class="headerLogo h-24 md:h-32 w-auto object-contain
                   drop-shadow-[0_15px_30px_rgba(0,0,0,0.8)]
                   transition-all duration-500
                   hover:scale-105 hover:-translate-y-1">
        </div>

    </div>



    <!-- STICKY HEADER -->
    <div id="eventStickyHeader"
        class="fixed top-0 inset-x-0 z-40
              bg-white/5 backdrop-blur-md shadow-lg
              -translate-y-full transition-transform duration-500">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex items-center justify-between h-16">


                <!-- Logo (Center) -->
                <div class="absolute left-1/2 -translate-x-1/2">
                    <a href="index" class="inline-block">
                        <img
                            src="assets/img/logo/thalam-logo.png"
                            alt="Thalam"
                            class="headerLogo h-28 w-auto object-contain" />
                    </a>
                </div>



            </div>
        </div>
    </div>

    <!-- JS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const stickyHeader = document.getElementById("eventStickyHeader");
            const mainHeader = document.getElementById("mainHeader");

            window.addEventListener("scroll", () => {
                const trigger = mainHeader.offsetHeight;

                if (window.scrollY > trigger) {
                    stickyHeader.classList.remove("-translate-y-full");
                    stickyHeader.classList.add("translate-y-0");
                } else {
                    stickyHeader.classList.add("-translate-y-full");
                    stickyHeader.classList.remove("translate-y-0");
                }
            }, {
                passive: true
            });
        });
    </script>

</header>
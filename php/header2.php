<style>
    .nav-dropdown {
        display: none;
    }

    li.relative:hover>.nav-dropdown {
        display: block;
    }
</style>

<header class="sticky top-0 z-50 w-full bg-white shadow-sm border-b border-slate-200"> <!-- Top Bar -->
    <div class="flex items-center justify-between px-4 py-1 text-xs bg-gray-900">
        <div class="flex items-center gap-4 flex-wrap">
            <span id="swiss-time" class="flex items-center gap-2 text-slate-50"></span>

            <span class="flex items-center gap-2 text-slate-50 font-medium">
                <i class="fas fa-phone"></i>
                Reach Us: 079 694 88 89
            </span>
        </div>

        <select class="border border-slate-300 rounded-md px-2 py-0.5 text-xs focus:ring-2 focus:ring-red-100 focus:border-red-500">
            <option>EN</option>
            <option>DE</option>
            <option>FR</option>
        </select>
    </div>

    <!-- Main Header -->
    <div class="bg-white backdrop-blur-md bg-white/95">
        <div class="flex items-center justify-between px-4 py-3">

            <!-- Logo -->
            <a href="index" class="flex items-center">
                <img src="assets/img/logo/thalam-logo.png" class="h-14" />
            </a>

            <!-- Desktop Menu -->
            <ul class="hidden xl:flex items-center gap-6 text-[15px] font-medium text-slate-800">

                <!-- Item -->
                <li>
                    <a href="index"
                        class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600 transition group-hover:bg-red-50 group-hover:text-red-600">
                            <i class="fas fa-music text-xs"></i>
                        </span>

                        Audio
                    </a>
                </li>

                <li>
                    <a href="podcasts-list"
                        class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-microphone text-xs"></i>
                        </span>

                        Podcast
                    </a>
                </li>
                <!-- 
                <li>
                    <a href="rewind-2025"
                        class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-backward text-xs"></i>
                        </span>

                        Rewind
                    </a>
                </li> -->

                <!-- Explore -->
                <li class="relative group">
                    <button id="exploreBtn" class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-compass text-xs"></i>
                        </span>

                        Explore

                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown -->

                    <div id="exploreMenu"
                        class="nav-dropdown absolute left-1/2 -translate-x-1/2 top-7 w-48 rounded-xl bg-white shadow-lg border border-slate-100 p-2 z-50">

                        <a href="rewind-2025"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100 transition">

                            <i class="fas fa-backward text-slate-500 text-xs"></i>
                            Rewind
                        </a>

                        <a href="news-list"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100 transition">

                            <i class="fas fa-newspaper text-slate-500 text-sm"></i>
                            News
                        </a>

                        <a href="blogs-list"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100 transition">

                            <i class="fas fa-blog text-slate-500 text-sm"></i>
                            Blogs
                        </a>

                    </div>
                </li>

                <li>
                    <a href="rj-portfolio"
                        class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-users text-xs"></i>
                        </span>

                        Our Team
                    </a>
                </li>

                <li>
                    <a href="our-shows"
                        class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-broadcast-tower text-xs"></i>
                        </span>

                        Our Shows
                    </a>
                </li>

                <!-- About -->
                <li class="relative group">
                    <button id="aboutBtn" class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-info-circle text-xs"></i>
                        </span>

                        About

                        <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>


                    <div id="aboutMenu"
                        class="nav-dropdown absolute left-1/2 -translate-x-1/2 top-7 w-52 rounded-xl bg-white shadow-lg border border-slate-100 p-2 z-50">

                        <a href="about-us"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100 transition">

                            <i class="fas fa-info-circle text-slate-500 text-sm"></i>
                            About Us
                        </a>

                        <a href="careers-form"
                            class="flex items-center gap-2 px-3 py-2 rounded-lg hover:bg-slate-100 transition">

                            <i class="fas fa-suitcase text-slate-500 text-sm"></i>
                            Careers
                        </a>

                    </div>
                </li>

                <li>
                    <a href="contact-us"
                        class="flex items-center gap-2 px-2 py-1 transition duration-200 hover:text-red-600">

                        <span class="flex items-center justify-center w-6 h-6 rounded-md bg-slate-100 text-slate-600">
                            <i class="fas fa-envelope text-xs"></i>
                        </span>

                        Contact
                    </a>
                </li>

            </ul>

            <!-- Right Section -->
            <div id="menu-right" class="hidden xl:flex items-center gap-3"></div>

            <!-- Mobile Header Right -->
            <div class="xl:hidden flex items-center gap-2">
                <div id="mobile-menu-right" class="flex items-center gap-2"></div>
                <!-- Mobile Menu Button -->
                <button id="menu-toggle" class="mobile-nav__toggler px-2 py-1.5 text-lg  font-medium border border-red-500 rounded-lg">
                    <i class="fas fa-bars text-slate-900 "></i>
                </button>
            </div>
        </div>
    </div>

</header>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const username = localStorage.getItem("username");
        const token = localStorage.getItem("token");

        const desktop = document.getElementById("menu-right");
        const mobile = document.getElementById("mobile-menu-right");

        let html = "";

        if (username && token) {
            html = `
                <!-- USER UI -->
                <div class="relative">
                    <button id="userMenuBtn"
                        class="inline-flex items-center justify-center gap-2 rounded-lg xl:rounded-full border border-slate-200 bg-white px-2 xl:px-4 py-2 text-sm font-semibold text-slate-900 shadow-sm hover:border-red-400 hover:text-red-600 transition">

                        <div class="w-8 h-8 xl:w-7 xl:h-7 rounded-lg xl:rounded-full bg-gradient-to-br from-red-600 to-red-500 flex items-center justify-center text-white text-xs font-bold shadow-md">
                            ${username.charAt(0).toUpperCase()}
                        </div>

                        <span class="hidden xl:block truncate max-w-[120px]">${username}</span>
                        <i class="fas fa-chevron-down text-xs hidden xl:block"></i>
                    </button>

                    <div id="userMenu"
                        class="hidden absolute -right-12 xl:right-0 w-56 xl:w-48 mt-2 rounded-xl border border-slate-200 bg-white shadow-2xl z-50 origin-top-right animate-in fade-in duration-200">

                        <div class="px-4 py-3 border-b border-slate-100 xl:hidden">
                            <p class="text-sm font-semibold text-slate-900">${username}</p>
                            <p class="text-xs text-slate-500">Account Menu</p>
                        </div>

                        <a href="my-account" class="flex items-center gap-3 px-4 py-3  xl:px-3 xl:py-2 rounded-xl hover:bg-slate-50 transition duration-150">
                            <i class="fas fa-user text-slate-600 text-sm"></i>
                            <span class="text-sm font-medium text-slate-700">Profile</span>
                        </a>

                        <button id="logoutBtn" class=" logoutBtn w-full flex items-center gap-3 px-4 py-3 xl:px-3 xl:py-2 rounded-xl hover:bg-red-50 transition duration-150 text-left border-t border-slate-100">
                            <i class="fas fa-sign-out-alt text-red-600 text-sm"></i>
                            <span class="text-sm font-medium text-red-600">Logout</span>
                        </button>
                    </div>
                </div>
                `;
        } else {
            html = `
                <a href="register"
                    class="hidden xl:flex items-center justify-center px-4 py-2 border border-slate-300 rounded-full text-sm font-medium text-slate-700 transition hover:border-red-400 hover:text-red-600 hover:bg-red-50">
                
                    <span>Register</span>
                </a>
                
                <a href="login"
                    class="flex items-center justify-center w-9 h-9 xl:w-auto xl:h-auto xl:px-4 py-2 bg-gradient-to-r from-red-600 to-red-500 text-white  rounded-md xl:rounded-full text-sm font-medium shadow transition hover:from-red-700 hover:to-red-600">
                
                    <!-- Mobile Icon -->
                    <i class="fas fa-sign-in-alt xl:hidden text-sm"></i>
                
                    <!-- Desktop Text -->
                    <span class="hidden xl:inline">Login</span>
                </a>
                `;
        }

        if (desktop) desktop.innerHTML = html;
        if (mobile) mobile.innerHTML = html;

        // Setup event listeners after DOM is updated
        function setupUserMenuEvents() {
            const userButtons = document.querySelectorAll("#userMenuBtn");

            userButtons.forEach((btn) => {
                const wrapper = btn.closest(".relative");

                if (!wrapper) return;

                const menu = wrapper.querySelector("#userMenu");

                if (!menu) return;

                const logoutBtn = wrapper.querySelector(".logoutBtn");

                // Toggle menu
                btn.addEventListener("click", (e) => {
                    e.stopPropagation();

                    document.querySelectorAll("#userMenu").forEach((m) => {
                        if (m !== menu) {
                            m.classList.add("hidden");
                        }
                    });

                    menu.classList.toggle("hidden");
                });

                // Logout
                if (logoutBtn) {
                    logoutBtn.addEventListener("click", (e) => {
                        e.preventDefault();
                        e.stopPropagation();

                        localStorage.clear();

                        window.location.href = "index";
                    });
                }

                // Prevent menu close on inside click
                menu.addEventListener("click", (e) => {
                    e.stopPropagation();
                });
            });

            // Outside click
            document.addEventListener("click", () => {
                document.querySelectorAll("#userMenu").forEach((menu) => {
                    menu.classList.add("hidden");
                });
            });
        }

        setupUserMenuEvents();
        // Swiss Time
        function updateTime() {
            const el = document.getElementById("swiss-time");
            if (!el) return;

            const now = new Date();
            const time = now.toLocaleTimeString("en-GB", {
                timeZone: "Europe/Zurich",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            });

            el.innerHTML = `<i class="fas fa-clock"></i> ${time}`;
        }

        updateTime();
        setInterval(updateTime, 1000);
    });
</script>
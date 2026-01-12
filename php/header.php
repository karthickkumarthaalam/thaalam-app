<style>
    /* ================= SNOW SYMBOL FALL ================= */

    .christmas-overlay {
        pointer-events: none;
        position: fixed;
        inset: 0;
        z-index: 9999;
        overflow: hidden;
    }

    .snow-symbol {
        position: absolute;
        top: -40px;
        color: #c4e4f7ff;
        opacity: 0.85;
        user-select: none;
        animation-name: snowSymbolFall;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        text-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
    }

    /* Sizes */
    .snow-small {
        font-size: 14px;
        opacity: 0.4;
    }

    .snow-medium {
        font-size: 20px;
        opacity: 0.6;
    }

    .snow-large {
        font-size: 26px;
        opacity: 0.85;
    }

    /* Falling animation */
    @keyframes snowSymbolFall {
        0% {
            transform: translateY(-40px) rotate(0deg);
        }

        100% {
            transform: translateY(110vh) rotate(360deg);
        }
    }

    /* Mobile optimization */
    @media (max-width: 768px) {
        .snow-large {
            display: none;
        }
    }
</style>
<div class="christmas-overlay">
    <div id="snowflakes"></div>
</div>


<header class="main-header-two">
    <nav class="main-menu main-menu-two">
        <div class="main-menu-two__wrapper">
            <div class="main-menu-top__header">
                <div>
                    <ul class="top__header">
                        <li id="swiss-time"> </li>
                        <li>
                            <div class="d-flex align-items-center gap-2">
                                <i class="fas fa-phone"></i>
                                <p>Reach Us: 079 694 88 89</p>
                            </div>

                        </li>
                        <li>
                            <select class="language-select">
                                <option value="en">EN</option>
                                <option value="de">DE</option>
                                <option value="fr">FR</option>
                            </select>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-menu-two__wrapper-inside">
                <div class="main-menu-two__wrapper-inner">
                    <div class="only-mob mobile-header__first">
                        <div class="main-menu__logo only-mob">
                            <a href="index"><img src="assets/img/logo/thalam-logo.png" alt=""></a>
                        </div>
                        <div class="mobile-header__inner">
                            <div class="mobile-menu-right">

                            </div>
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        </div>
                    </div>
                    <div class="main-menu-two__main-menu-box">
                        <ul class="main-menu__list desktop-menu">
                            <li class="desktop-main__logo">
                                <a href="index">
                                    <img src="assets/img/logo/thalam-logo.png" alt="" class="main-menu__logo2">
                                </a>
                            </li>
                            <li>
                                <a href="index">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-music pe-2"></i>
                                        <span>Audio</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="podcasts-list">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-microphone pe-2"></i>
                                        <span>Podcast</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="rewind-2025">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-backward pe-2"></i>
                                        <span>Rewind</span>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown">
                                <a role="button" aria-label="Explore news and blogs" aria-haspopup="true" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-compass pe-2"></i>
                                        <span>Explore</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="news-list" target="_blank" aria-label="News"><i class="fas fa-newspaper pe-2"></i>News</a></li>
                                    <li><a href="blogs-list" target="_blank" aria-label="Blogs"><i class="fas fa-blog pe-2"></i>Blogs</a></li>
                                </ul>
                            </li>
                            <!-- <li class="dropdown">
                                <a role="button" aria-label="Marketing and pricing services" aria-haspopup="true" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bullhorn pe-2"></i>
                                        <span>Services</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="marketing" aria-label="Marketing"><i class="fas fa-bullhorn pe-2"></i>Marketing</a></li>
                                    <li><a href="pricing" aria-label="Pricing"><i class="fas fa-tags pe-2"></i>Pricing</a></li>
                                </ul>
                            </li> -->
                            <li>
                                <a href="rj-portfolio">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users pe-2"></i>
                                        <span>Our Team</span>
                                    </div>
                                </a>
                            </li>

                            <li class="dropdown">
                                <a role="button" aria-label="About our teams and career" aria-haspopup="true" aria-expanded="false">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-info-circle pe-2"></i>
                                        <span>About</span>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="about-us" aria-label="About Us"><i class="fas fa-info-circle pe-2"></i>About Us</a></li>
                                    <!-- <li><a href="rj-portfolio" aria-label="Our Team"><i class="fas fa-users pe-2"></i>Our Team</a></li> -->
                                    <li><a href="careers-form" aria-label="Careers"><i class="fas fa-suitcase pe-2"></i>Careers</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact-us">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope pe-2"></i>
                                        <span> Contact Us</span>
                                    </div>
                                </a>
                            </li>
                            <!-- <li>
                                <a href="https://thaalamsummerfestival.com/tickets" target="_blank">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-ticket-alt pe-2"></i>
                                        <p>Book Now</p>
                                    </div>
                                </a>
                            </li> -->

                        </ul>
                    </div>
                    <div class="main-menu-two__right desktop-menu">

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>

<div class="stricky-header stricked-main main-menu main-menu-two">
    <div class="stricky-header__content">
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const username = localStorage.getItem("username");
        const token = localStorage.getItem("token");

        const menuRight = document.querySelector(".main-menu-two__right");
        const stickyMenuRight = document.querySelector(".stricky-header__content .main-menu-two__right");
        const mobileMenuRight = document.querySelector(".mobile-header__inner .mobile-menu-right");


        let menuHtml = "";

        if (username && token) {
            menuHtml = `
            <div class="main-menu-two__support-box user-dropdown desktop-menu">
                <div class="login-style" id="userGreeting">
                    <div><i class="fas fa-users me-2"></i>${username}</div> 
                </div>
                <div class="dropdown-menu">
                    <a href="my-account" class="dropdown-item">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                    <a href="javascript:;" id="logoutBtn" class="dropdown-item">
                        <i class="fas fa-sign-out me-2"></i>Logout
                    </a>
                </div>
            </div>
             <div class="main-menu-two__support-box user-dropdown only-mob">
                <div class="user-greetings" id="userGreeting">
                    <div class="dropdown-arrow"><i class="fas fa-user-tie p-1"></i></div> 
                </div>
                <div class="dropdown-menu">
                    <a href="my-account" class="dropdown-item">
                        <i class="fas fa-user me-2"></i>Profile
                    </a>
                    <a href="javascript:;" id="logoutBtn" class="dropdown-item">
                        <i class="fas fa-sign-out me-2"></i>Logout
                    </a>
                </div>
            </div>
        `;
        } else {
            menuHtml = `
                <div class="auth-buttons-desktop auth-buttons desktop-menu">
                    <a href="register" class="auth-btn register-btn">Register</a>
                    <a href="login" class="auth-btn login-btn">Login</a>
                </div>

                <a href="login" class="mobile-user-icon only-mob">
                    <i class="fas fa-user-tie"></i>
                </a>
        `;
        }

        // Update both headers
        if (menuRight) menuRight.innerHTML = menuHtml;
        if (stickyMenuRight) stickyMenuRight.innerHTML = menuHtml;
        if (mobileMenuRight) mobileMenuRight.innerHTML = menuHtml;

        // Handle logout (delegated)
        document.addEventListener("click", function(e) {
            if (e.target.closest("#logoutBtn")) {
                localStorage.clear();
                window.location.href = "index";
            }
        });


        function updateSiwssTime() {
            const swissTimeElement = document.getElementById("swiss-time");
            if (!swissTimeElement) return;

            const now = new Date();
            const options = {
                timeZone: "Europe/Zurich",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            };

            swissTimeElement.innerHTML = `<div class="swiss-timmer"><i class="fas fa-clock"></i> <p> ${now.toLocaleTimeString("en-GB", options)}</p></div>`
        }

        updateSiwssTime();

        setInterval(updateSiwssTime, 1000);

    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const container = document.getElementById("snowflakes");

        const snowSymbols = ["❄", "❅", "❆"];

        /* ⬇ Reduced initial density */
        const density = window.innerWidth < 768 ? 1 : 1;

        for (let i = 0; i < density; i++) {
            createSnow(true);
        }

        /* ⬇ Slower continuous snowfall */
        setInterval(
            () => createSnow(false),
            window.innerWidth < 768 ? 550 : 450
        );

        function createSnow(initial) {
            const snow = document.createElement("div");

            const sizes = ["snow-small", "snow-medium", "snow-large"];
            const size = sizes[Math.floor(Math.random() * sizes.length)];

            snow.className = `snow-symbol ${size}`;
            snow.innerHTML = snowSymbols[Math.floor(Math.random() * snowSymbols.length)];

            snow.style.left = Math.random() * 100 + "%";

            snow.style.animationDuration =
                size === "snow-large" ? "22s" :
                size === "snow-medium" ? "16s" :
                "12s";

            snow.style.animationDelay = initial ? Math.random() * 15 + "s" : "0s";

            container.appendChild(snow);

            setTimeout(() => snow.remove(), 26000);
        }
    });
</script>
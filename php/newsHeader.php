<header class="main-header-two">
    <nav class="main-menu main-menu-two">
        <div class="main-menu-two__wrapper">

            <!-- TOP HEADER BAR (Clock + Phone + Language) -->
            <div class="main-menu-top__header">
                <ul class="top__header">
                    <li id="swiss-time"></li>
                    <li>
                        <div class="d-flex align-items-center gap-2">
                            <i class="fas fa-phone"></i>
                            <p>Reach Us: +41 79 288 22 71</p>
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

            <!-- MAIN HEADER AREA -->
            <div class="news-menu-two__wrapper-inside">
                <div class="header-layout">

                    <!-- Left empty space -->
                    <div class="header-left">
                        <span id="current-date-main" class="header-date"></span>
                    </div>


                    <!-- Center Logo -->
                    <div class="header-center">
                        <a href="index">
                            <img src="assets/img/logo/thalam-logo.png" />
                        </a>
                    </div>

                    <!-- Right Dynamic Buttons -->
                    <div class="header-right" id="newsHeaderRight"></div>

                </div>
            </div>

            <!-- Sticky Header -->
            <div class="stricky-header news-sticky">
                <div class="header-layout" id="stickyHeaderContent">
                    <div class="header-left">
                        <span id="current-date-sticky" class="header-date"></span>
                    </div>


                    <div class="header-center">
                        <a href="index">
                            <img src="assets/img/logo/thalam-logo.png" />
                        </a>
                    </div>

                    <div class="header-right" id="stickyRight"></div>
                </div>
            </div>


        </div>
    </nav>
</header>
<script>
    document.addEventListener("DOMContentLoaded", () => {

        const username = localStorage.getItem("username");
        const token = localStorage.getItem("token");

        const newsHeaderRight = document.getElementById("newsHeaderRight");
        const stickyRight = document.getElementById("stickyRight");

        function renderMenu() {
            let html = "";

            if (username && token) {
                html = `
                <div class="auth-buttons-desktop">
                    <div class="user-dropdown login-style">
                        <i class="fas fa-user"></i> ${username}
                        <div class="dropdown-menu">
                            <a href="my-account" class="dropdown-item">
                                <i class="fas fa-user"></i> Profile
                            </a>
                            <a href="javascript:;" id="logoutBtn" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </div>
                    </div>
                </div>

                <a href="my-account" class="mobile-user-icon only-mob">
                    <i class="fas fa-user-circle"></i>
                </a>
            `;
            } else {
                html = `
                <div class="auth-buttons-desktop auth-buttons">
                    <a href="register" class="auth-btn register-btn">Register</a>
                    <a href="login" class="auth-btn login-btn">Login</a>
                </div>

                <a href="login" class="mobile-user-icon only-mob">
                    <i class="fas fa-user-tie"></i>
                </a>
            `;
            }

            newsHeaderRight.innerHTML = html;
            stickyRight.innerHTML = html;
        }

        renderMenu();

        // Logout handler
        document.addEventListener("click", (e) => {
            if (e.target.closest("#logoutBtn")) {
                localStorage.clear();
                window.location.reload();
            }
        });

        /* SWISS TIME */
        function updateSwissTime() {
            const el = document.getElementById("swiss-time");
            const now = new Date();
            const options = {
                timeZone: "Europe/Zurich",
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit"
            };
            el.innerHTML = `<i class="fas fa-clock"></i> ${now.toLocaleTimeString("en-GB", options)}`;
        }

        updateSwissTime();
        setInterval(updateSwissTime, 1000);

        function updateCurrentDate() {
            const now = new Date();
            const formattedDate = now.toLocaleDateString("en-GB", {
                weekday: "short",
                day: "2-digit",
                month: "short",
                year: "numeric",
            });

            const mainDate = document.getElementById("current-date-main");
            const stickyDate = document.getElementById("current-date-sticky");

            if (mainDate) mainDate.textContent = formattedDate;
            if (stickyDate) stickyDate.textContent = formattedDate;
        }

        updateCurrentDate();


        updateCurrentDate()
    });

    // SHOW STICKY HEADER ON SCROLL
    window.addEventListener("scroll", () => {
        const sticky = document.querySelector(".news-sticky");
        const mainHeader = document.querySelector(".news-menu-two__wrapper-inside");

        if (window.scrollY > mainHeader.offsetHeight) {
            sticky.classList.add("show");
        } else {
            sticky.classList.remove("show");
        }
    });
</script>
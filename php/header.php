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
                                        <p>Audio</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="podcasts-list">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-microphone pe-2"></i>
                                        <p>Podcast</p>
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="dropdown">
                                <a href="javascript:void(0)">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-broadcast-tower pe-2"></i>
                                        <p>Shows</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="podcasts.php"><i class="fas fa-microphone pe-2"></i>Podcasts</a></li>
                                    <li><a href="blogs.php"><i class="fas fa-blog pe-2"></i>Blogs</a></li>
                                    <li><a href="news.php"><i class="fas fa-newspaper pe-2"></i>News</a></li>
                                </ul>
                            </li> -->
                            <li class="dropdown">
                                <a href="javascript:void(0)">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bullhorn pe-2"></i>
                                        <p>Services</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="marketting"><i class="fas fa-bullhorn pe-2"></i>Marketing</a></li>
                                    <li><a href="pricing"><i class="fas fa-tags pe-2"></i>Pricing</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="javascript:void(0)">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-info-circle pe-2"></i>
                                        <p>About</p>
                                    </div>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="about-us"><i class="fas fa-info-circle pe-2"></i>About Us</a></li>
                                    <li><a href="rj-portfolio"><i class="fas fa-users pe-2"></i>Our Team</a></li>
                                    <li><a href="careers"><i class="fas fa-suitcase pe-2"></i>Careers</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact-us">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope pe-2"></i>
                                        <p> Contact Us</p>
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
            <div class="main-menu__btn-box-2  desktop-menu">
                <a href="login"  class="login-style">
                    <i class="fas fa-sign-in"></i> Login
                </a>
            </div>
            <div class="main-menu-two__support-box  desktop-menu">
                    <a href="register" class="login-style">
                    <i class="fas fa-user-tie"></i>
                    Become a Member
                    </a>
            </div>
            <div class="main-menu__btn-box-2 only-mob" >
                <a href="login" class="thm-btn" style="padding:10px 15px;" >
                    <i class="fas fa-user-alt" style="font-size: 13px;"></i>
                </a>
            </div>
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
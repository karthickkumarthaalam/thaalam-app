<header class="main-header-two">
    <nav class="main-menu main-menu-two">
        <div class="main-menu-two__wrapper">
            <div class="container">
                <div class="main-menu-two__wrapper-inner">
                    <div class="main-menu__logo only-mob">
                        <a href="index.php"><img src="assets/img/logo/thalam-logo.png" alt=""></a>
                    </div>
                    <div class="only-mob">
                        <?php if($pagename=="my-account"){?>
                        <div class="main-menu-two__support-box user-dropdown">
                            <div class="thm-btn btn-clr2 user-greeting">
                                <div><i class="fas fa-users me-2"></i>Vijay</div> <i class="dropdown-arrow">▼</i>
                            </div>
                            <div class="dropdown-menu">
                                <a href="javascript:;" class="dropdown-item"><i class="fas fa-user me-2"></i>Profile</a>
                                <a href="index.php" class="dropdown-item"><i class="fas fa-sign-out me-2"></i>Logout</a>
                            </div>
                        </div>

                        <?php }else{ ?>
                        <div class="main-menu__btn-box-2">
                            <a href="login.php" class="thm-btn">Login</a>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="main-menu-two__main-menu-box">
                        <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list desktop-menu">
                            <li>
                                <a href="audio.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-music pe-2"></i>
                                        <p>Audio</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://m.youtube.com/@thaalammediaofficial" target="_blank">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-tv pe-2"></i>
                                        <p>TV</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="marketting.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bullhorn pe-2"></i>
                                        <p>Marketting</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="rj-portfolio.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users pe-2"></i>
                                        <p>RJ Portfolio</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <ul class="main-menu__list mobile-menu">
                            <li>
                                <a href="index.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-home pe-2"></i>
                                        <p>Home</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="about-us.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-info-circle pe-2"></i>
                                        <p>About Us</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="pricing.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-tags pe-2"></i>
                                        <p>Pricing</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="podcasts.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-microphone pe-2"></i>
                                        <p>Podcasts</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="audio.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-music pe-2"></i>
                                        <p>Audio</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://m.youtube.com/@thaalammediaofficial" target="_blank">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-tv pe-2"></i>
                                        <p>TV</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="marketting.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-bullhorn pe-2"></i>
                                        <p>Marketting</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="rj-portfolio.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-users pe-2"></i>
                                        <p>RJ Portfolio</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="careers.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-suitcase pe-2"></i>
                                        <p>Careers</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="news.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-newspaper pe-2"></i>
                                        <p>News</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="blogs.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-blog pe-2"></i>
                                        <p>Blogs</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="contact-us.php">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-envelope pe-2"></i>
                                        <p>Contact Us</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://thaalamsummerfestival.com/tickets">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-ticket-alt pe-2"></i>
                                        <p>Book Now</p>
                                    </div>
                                </a>
                            </li>

                        </ul>
                    </div>
                    <div class="main-menu-two__right">
                        <div class="main-menu-two__search-box">
                            <a href="#" class="main-menu-two__search searcher-toggler-box icon-search"></a>
                        </div>
                        <?php if($pagename=="my-account"){?>
                        <div class="main-menu__btn-box-2">
                            <a href="https://thaalamsummerfestival.com/tickets" class="thm-btn"><i
                                    class="fas fa-ticket-alt"></i>Book Now</a>
                        </div>
                        <div class="main-menu-two__support-box user-dropdown">
                            <div class="thm-btn btn-clr2 user-greeting">
                                <div><i class="fas fa-users me-2"></i>Vijay</div> <i class="dropdown-arrow">▼</i>
                            </div>
                            <div class="dropdown-menu">
                                <a href="javascript:;" class="dropdown-item"><i class="fas fa-user me-2"></i>Profile</a>
                                <a href="index.php" class="dropdown-item"><i class="fas fa-sign-out me-2"></i>Logout</a>
                            </div>
                        </div>

                        <?php }else{ ?>
                        <div class="main-menu__btn-box-2">
                            <a href="login.php" class="thm-btn">Login</a>
                        </div>

                        <div class="main-menu-two__support-box">
                            <div class="main-menu__btn-box-2">
                                <a href="register.php" class="thm-btn btn-clr2">Register</a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
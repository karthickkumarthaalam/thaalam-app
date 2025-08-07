<nav class="sidebar-menu">
    <div class="logo-box">
        <a href="index.php" class="logo-box__logo">
            <img src="assets/img/logo/thalam-logo.png" alt="Thaalam Logo" />
        </a>
    </div>

    <ul>
        <li><a href="index.php" class="<?php echo ($pagename == 'home') ? 'active' : ''; ?>"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="about-us.php" class="<?php echo ($pagename == 'about-us') ? 'active' : ''; ?>"><i class="fas fa-info-circle"></i> About Us</a></li>
        <li><a href="pricing.php" class="<?php echo ($pagename == 'pricing') ? 'active' : ''; ?>"><i class="fas fa-tags"></i> Pricing</a></li>
        <li><a href="podcasts.php" class="<?php echo ($pagename == 'podcasts') ? 'active' : ''; ?>"><i class="fas fa-microphone"></i> Podcasts</a></li>
        <li><a href="careers.php" class="<?php echo ($pagename == 'careers') ? 'active' : ''; ?>"><i class="fas fa-suitcase"></i> Careers</a></li>
        <li><a href="news.php" class="<?php echo ($pagename == 'news') ? 'active' : ''; ?>"><i class="fas fa-newspaper"></i> News</a></li>
        <li><a href="blogs.php" class="<?php echo ($pagename == 'blogs') ? 'active' : ''; ?>"><i class="fas fa-blog"></i> Blogs</a></li>
        <li><a href="contact-us.php" class="<?php echo ($pagename == 'contact-us') ? 'active' : ''; ?>"><i class="fas fa-envelope"></i> Contact Us</a></li>
    </ul>
</nav>
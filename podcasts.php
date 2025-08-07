<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Podcasts - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
    <style>
        /* Podcast List Styles */
        .podcast-list__right {
            padding: 30px;
            background-color: #fff;
            box-shadow: 0px 10px 60px 0px rgba(0, 0, 0, 0.05);
            border-radius: 10px;
        }

        .podcast-list__right-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .podcast-list__right-top-text {
            margin: 0;
            font-size: 16px;
            color: var(--fistudy-base);
        }

        .podcast-list__right-top-btn a {
            width: 40px;
            height: 40px;
            background-color: var(--fistudy-base);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            border-radius: 50%;
            margin-left: 10px;
            transition: all 0.3s ease;
        }

        .podcast-list__right-top-btn a:hover {
            background-color: var(--fistudy-black);
        }

        .podcast-list__showing-sort {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .podcast-list__showing-sort p {
            margin: 0;
            color: var(--fistudy-base);
        }

        .podcast-list__single {
            display: flex;
            margin-bottom: 30px;
            padding-bottom: 30px;
            border-bottom: 1px solid #e5e5e5;
            gap: 30px;
        }

        .podcast-list__img-box {
            width: 250px;
            flex-shrink: 0;
            position: relative;
        }

        .podcast-list__img {
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .podcast-list__img img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .podcast-list__play-btn {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 60px;
            height: 60px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--fistudy-base);
            font-size: 20px;
            transition: all 0.3s ease;
        }

        .podcast-list__play-btn:hover {
            background-color: var(--fistudy-base);
            color: #fff;
        }

        .podcast-list__content {
            flex-grow: 1;
        }

        .podcast-list__date-and-download {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        .podcast-list__date p {
            margin: 0;
            color: var(--fistudy-base);
            font-size: 14px;
        }

        .podcast-list__download a {
            color: var(--fistudy-base);
            transition: all 0.3s ease;
        }

        .podcast-list__download a:hover {
            color: var(--fistudy-black);
        }

        .podcast-list__title {
            margin: 0 0 15px 0;
            font-size: 22px;
            line-height: 1.4;
        }

        .podcast-list__title a {
            color: var(--fistudy-black);
            transition: all 0.3s ease;
        }

        .podcast-list__title a:hover {
            color: var(--fistudy-base);
        }

        .podcast-list__stats-box {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .podcast-list__duration {
            display: flex;
            align-items: center;
            gap: 5px;
            color: var(--fistudy-base);
        }

        .podcast-list__stats-text {
            margin: 0;
            color: #666;
            font-size: 14px;
        }

        .podcast-list__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 25px;
        }

        .podcast-list__meta li p {
            margin: 0;
            display: flex;
            align-items: center;
            gap: 5px;
            color: #666;
            font-size: 14px;
        }

        .podcast-list__btn-and-host-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .podcast-list__host-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .podcast-list__host-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
        }

        .podcast-list__host-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .podcast-list__host-content h4 {
            margin: 0 0 5px 0;
            font-size: 16px;
            color: var(--fistudy-black);
        }

        .podcast-list__host-content p {
            margin: 0;
            font-size: 12px;
            color: #666;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Pagination Styles */
        .blog-list__pagination {
            margin-top: 40px;
        }

        .pg-pagination {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .pg-pagination li a {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background-color: #f5f5f5;
            color: var(--fistudy-black);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .pg-pagination li a:hover,
        .pg-pagination li.active a {
            background-color: var(--fistudy-base);
            color: #fff;
        }

        /* Responsive Styles */
        @media (max-width: 991px) {
            .podcast-list__single {
                flex-direction: column;
            }

            .podcast-list__img-box {
                width: 100%;
            }

            .podcast-list__img img {
                height: 300px;
            }
        }

        @media (max-width: 575px) {
            .podcast-list__right-top {
                flex-direction: column;
                align-items: flex-start;
            }

            .podcast-list__img img {
                height: 250px;
            }

            .podcast-list__btn-and-host-info {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>

</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div>

            <div class="col-lg-80">
                <?php include 'php/header.php'; ?>
                <section class="podcast-list">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="podcast-list__right" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                                    <div class="course-list__right-top">
                                        <p class="course-list__right-top-text">Showing 3 Podcasts of 12</p>
                                        <div class="course-list__showing-sort">
                                            <p>Sort by: </p>
                                            <div class="select-box">
                                                <select class="wide">
                                                    <option data-display="Most Listened">Most Listened</option>
                                                    <option value="1">Most Popular</option>
                                                    <option value="2">Longest</option>
                                                    <option value="3">Shortest</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Podcast Single Start -->
                                    <div class="podcast-list__single">
                                        <div class="podcast-list__img-box">
                                            <div class="podcast-list__img">
                                                <img src="assets/img/common/podcasts/img22.jpg"
                                                    alt="Media Trends Podcast">
                                                <div class="podcast-list__play-btn">
                                                    <span class="fas fa-microphone"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="podcast-list__content">
                                            <div class="podcast-list__date-and-download">
                                                <div class="podcast-list__date">
                                                    <p>June 15, 2025</p>
                                                </div>
                                                <div class="podcast-list__download">
                                                    <a href="#"><span class="icon-download"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="podcast-list__title"><a href="podcast-details.php">The Future of
                                                    Digital Media: Trends to Watch in 2025</a></h3>
                                            <div class="podcast-list__stats-box">
                                                <div class="podcast-list__duration">
                                                    <span class="icon-clock"></span>
                                                    <p>42:18</p>
                                                </div>
                                                <p class="podcast-list__stats-text">(1.2K listens)</p>
                                            </div>
                                            <ul class="podcast-list__meta list-unstyled">
                                                <li>
                                                    <p><span class="icon-microphone"></span>RJ Nisha</p>
                                                </li>
                                                <li>
                                                    <p><span class="icon-headphones"></span>Interview</p>
                                                </li>
                                                <li>
                                                    <p><span class="icon-share"></span>Share</p>
                                                </li>
                                            </ul>
                                            <div class="podcast-list__btn-and-host-info">
                                                <div class="podcast-list__btn-box">
                                                    <a href="podcast-details.php" class="thm-btn-two">
                                                        <span>Listen Now</span>
                                                        <i class="icon-angles-right"></i>
                                                    </a>
                                                </div>
                                                <div class="podcast-list__host-box">
                                                    <div class="podcast-list__host-img">
                                                        <img src="assets/img/common/podcasts/rj2.jpg" alt="RJ Nisha">
                                                    </div>
                                                    <div class="podcast-list__host-content">
                                                        <h4>RJ Nisha</h4>
                                                        <p><span class="odometer" data-count="8">00</span><i>+</i> Years
                                                            Experience</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Podcast Single End -->

                                    <!-- Podcast Single Start -->
                                    <div class="podcast-list__single">
                                        <div class="podcast-list__img-box">
                                            <div class="podcast-list__img">
                                                <img src="assets/img/common/podcasts/img21.jpg"
                                                    alt="Music Industry Podcast">
                                                <div class="podcast-list__play-btn">
                                                    <span class="fas fa-microphone"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="podcast-list__content">
                                            <div class="podcast-list__date-and-download">
                                                <div class="podcast-list__date">
                                                    <p>May 28, 2025</p>
                                                </div>
                                                <div class="podcast-list__download">
                                                    <a href="#"><span class="icon-download"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="podcast-list__title"><a href="podcast-details.php">Behind the
                                                    Scenes: Sri Lanka's Music Industry Secrets</a></h3>
                                            <div class="podcast-list__stats-box">
                                                <div class="podcast-list__duration">
                                                    <span class="icon-clock"></span>
                                                    <p>58:42</p>
                                                </div>
                                                <p class="podcast-list__stats-text">(2.4K listens)</p>
                                            </div>
                                            <ul class="podcast-list__meta list-unstyled">
                                                <li>
                                                    <p><span class="icon-microphone"></span>RJ Arjun</p>
                                                </li>
                                                <li>
                                                    <p><span class="icon-headphones"></span>Roundtable</p>
                                                </li>
                                                <li>
                                                    <p><span class="icon-share"></span>Share</p>
                                                </li>
                                            </ul>
                                            <div class="podcast-list__btn-and-host-info">
                                                <div class="podcast-list__btn-box">
                                                    <a href="podcast-details.php" class="thm-btn-two">
                                                        <span>Listen Now</span>
                                                        <i class="icon-angles-right"></i>
                                                    </a>
                                                </div>
                                                <div class="podcast-list__host-box">
                                                    <div class="podcast-list__host-img">
                                                        <img src="assets/img/common/podcasts/rj1.jpg" alt="RJ Arjun">
                                                    </div>
                                                    <div class="podcast-list__host-content">
                                                        <h4>RJ Arjun</h4>
                                                        <p><span class="odometer" data-count="5">00</span><i>+</i> Years
                                                            Experience</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Podcast Single End -->

                                    <!-- Podcast Single Start -->
                                    <div class="podcast-list__single">
                                        <div class="podcast-list__img-box">
                                            <div class="podcast-list__img">
                                                <img src="assets/img/common/podcasts/img23.jpg"
                                                    alt="Radio History Podcast">
                                                <div class="podcast-list__play-btn">
                                                    <span class="fas fa-microphone"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="podcast-list__content">
                                            <div class="podcast-list__date-and-download">
                                                <div class="podcast-list__date">
                                                    <p>April 10, 2025</p>
                                                </div>
                                                <div class="podcast-list__download">
                                                    <a href="#"><span class="icon-download"></span></a>
                                                </div>
                                            </div>
                                            <h3 class="podcast-list__title"><a href="podcast-details.php">20 Years of
                                                    Thaalam Media: Our Radio Journey</a></h3>
                                            <div class="podcast-list__stats-box">
                                                <div class="podcast-list__duration">
                                                    <span class="icon-clock"></span>
                                                    <p>36:15</p>
                                                </div>
                                                <p class="podcast-list__stats-text">(3.1K listens)</p>
                                            </div>
                                            <ul class="podcast-list__meta list-unstyled">
                                                <li>
                                                    <p><span class="icon-microphone"></span>RJ Meera</p>
                                                </li>
                                                <li>
                                                    <p><span class="icon-headphones"></span>Documentary</p>
                                                </li>
                                                <li>
                                                    <p><span class="icon-share"></span>Share</p>
                                                </li>
                                            </ul>
                                            <div class="podcast-list__btn-and-host-info">
                                                <div class="podcast-list__btn-box">
                                                    <a href="podcast-details.php" class="thm-btn-two">
                                                        <span>Listen Now</span>
                                                        <i class="icon-angles-right"></i>
                                                    </a>
                                                </div>
                                                <div class="podcast-list__host-box">
                                                    <div class="podcast-list__host-img">
                                                        <img src="assets/img/common/podcasts/rj3.jpg" alt="RJ Meera">
                                                    </div>
                                                    <div class="podcast-list__host-content">
                                                        <h4>RJ Meera</h4>
                                                        <p><span class="odometer" data-count="12">00</span><i>+</i>
                                                            Years Experience</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Podcast Single End -->

                                    <div class="blog-list__pagination">
                                        <ul class="pg-pagination list-unstyled">
                                            <li class="prev">
                                                <a href="#" aria-label="prev"><i class="fas fa-arrow-left"></i></a>
                                            </li>
                                            <li class="count active"><a href="#">01</a></li>
                                            <li class="count"><a href="#">02</a></li>
                                            <li class="next">
                                                <a href="#" aria-label="Next"><i class="fas fa-arrow-right"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>



</body>

</html>
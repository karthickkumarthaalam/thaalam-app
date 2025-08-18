<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Podcast Details - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

    <link rel="stylesheet" href="assets/css/module-css/podcast-details.css">
</head>

<body class="custom-cursor">
    <?php $pagename = 'podcasts'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>
                <!--Blog Details Start-->
                <section class="blog-details" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-8 col-lg-7">
                                <div class="blog-details__left">
                                    <div class="blog-details__img-box">
                                        <div class="blog-details__img">
                                            <img src="#" oncontextmenu="return false" alt="" id="podcastImage">
                                        </div>
                                    </div>
                                    <div class="blog-details__content">
                                        <h3 class="blog-details__title-1" id="podcastTitle">Behind the Scenes: Sri Lanka's Music Industry
                                            Secrets</h3>
                                        <div class="blog-details__client-and-meta">
                                            <div class="blog-details__client-box">
                                                <div class="blog-details__client-img">
                                                    <img src="assets/images/blog/blog-details-client-img-1.jpg" alt="">
                                                </div>
                                                <div class="blog-details__client-content">
                                                    <p>Hosted By</p>
                                                    <h4 id="rjName">RJ Arun</h4>
                                                </div>
                                            </div>
                                            <ul class="blog-details__client-meta list-unstyled">
                                                <li>
                                                    <div class="icon">
                                                        <span class="icon-calendar"></span>
                                                    </div>
                                                    <p id="publishedDate">July 02, 2025</p>
                                                </li>

                                            </ul>
                                        </div>
                                        <div>
                                            <p id="podcastDescription"></p>
                                        </div>

                                        <div id="thaalam-audio-player">
                                            <audio id="thaalam-player" controls>
                                                <source src="" id="audioSource" type=" audio/mp3">
                                                Your browser does not support the audio element.
                                            </audio>
                                            <div id="thaalam-custom-controls">
                                                <button id="thaalam-play-pause-btn">
                                                    <i class="fas fa-play"></i>
                                                </button>
                                                <div id="thaalam-progress-container">
                                                    <div id="thaalam-progress-bar"></div>
                                                    <input type="range" id="thaalam-progress-slider" min="0" max="100"
                                                        value="0">
                                                </div>
                                                <div id="thaalam-time-display">
                                                    <span id="thaalam-current-time">00:00</span> /
                                                    <span id="thaalam-duration">00:00</span>
                                                </div>
                                                <div id="thaalam-volume-control">
                                                    <button id="thaalam-volume-btn">
                                                        <i class="fas fa-volume-up"></i>
                                                    </button>
                                                    <input type="range" id="thaalam-volume-slider" min="0" max="1"
                                                        step="0.01" value="1">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="blog-details__tag-and-share">
                                            <div class="blog-details__tag">
                                                <p>Tags: </p>
                                                <a href="" id="podcastTags"></a>
                                            </div>
                                        </div>

                                        <div class="podcast-reactions" id="podcastReactions">
                                            <button class="reaction-btn like-btn" data-reaction="like">
                                                <i class="fas fa-heart"></i>
                                                <span class="count" id="likeCount">0</span>
                                            </button>
                                            <button class="reaction-btn">
                                                <i class="fas fa-comment"></i>
                                                <span class="count" id="commentCount"></span>
                                            </button>
                                            <button class="reaction-btn" id="shareButton">
                                                <i class="fas fa-share-alt"></i>
                                            </button>
                                        </div>

                                        <div class="podcast-details__share" id="shareOptions">
                                            <a id="fb-share" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                            <a id="x-share" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M20.75 3h-3.43L12 9.35 6.68 3H3l7.47 8.43L3 21h3.43L12 14.65 17.32 21H21l-7.47-8.57L20.75 3z" />
                                                </svg>
                                            </a> <a id="tiktok-share" target="_blank"><i class="fab fa-tiktok"></i></a>
                                            <a id="insta-share" target="_blank"><i class="fab fa-instagram"></i></a>
                                            <a id="whatsapp-share" target="_blank"><i class="fab fa-whatsapp"></i></a>
                                            <a href="#" onclick="copyLink(); return false;"><i class="fas fa-link"></i></a>
                                        </div>

                                        <div class="podcast-details__comments">
                                            <h3>Comments</h3>
                                            <form id="commentForm" onSubmit="submitComment(event)">
                                                <textarea name="" id="commentInput" rows="1" placeholder="Write your comment..."
                                                    required></textarea>
                                                <button type="submit"> <i class="fas fa-paper-plane"></i>
                                                </button>
                                            </form>

                                            <div class="comments-list" id="commentsList">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-5">
                                <div class="sidebar">
                                    <div class="sidebar__single sidebar__post">
                                        <div class="sidebar__title-box">
                                            <div class="sidebar__title-icon">
                                                <img src="assets/img/home/rock.png" alt="">
                                            </div>
                                            <h3 class="sidebar__title" id="relatedRJ"></h3>
                                        </div>
                                        <ul class="sidebar__post-list list-unstyled">
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Blog Details End-->
                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/podcast-details.js"></script>

</body>

</html>
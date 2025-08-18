<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Us - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'contact-us'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>

                <!--Contact Two Start-->
                <section class="contact-two" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="container">
                        <ul class="row list-unstyled">
                            <li class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="100ms">
                                <div class="contact-two__single">
                                    <div class="contact-two__icon">
                                        <img src="assets/img/common/contact/0.3.png" alt="">
                                    </div>
                                    <h3 class="contact-two__title">Our Address</h3>
                                    <p>Talacker 41, <br>8001 Zürich</p>
                                </div>
                            </li>
                            <li class="col-xl-4 col-lg-6 col-md-6 wow fadeInLeft" data-wow-delay="200ms">
                                <div class="contact-two__single">
                                    <div class="contact-two__icon">
                                        <img src="assets/img/common/contact/0.2.png" alt="">
                                    </div>
                                    <h3 class="contact-two__title">Contact Number</h3>
                                    <p><a href="tel:+41792882271">+41 79 288 22 71</a></p>
                                    <p><a href="tel:+41415627944">+41 41 562 79 44</a></p>
                                </div>
                            </li>
                            <li class="col-xl-4 col-lg-6 col-md-6 wow fadeInRight" data-wow-delay="300ms">
                                <div class="contact-two__single">
                                    <div class="contact-two__icon">
                                        <img src="assets/img/common/contact/0.1.png" alt="">
                                    </div>
                                    <h3 class="contact-two__title">Email Addresss</h3>
                                    <p><a href="mailto:info@thaalam.ch">info@thaalam.ch</a></p>
                                    <p><a href="mailto:marketing@thaalam.ch">marketing@thaalam.ch</a></p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <!--Contact Two End-->

                <!--Contact Three Start-->
                <section class="contact-three" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-3.png');background-size: contain;">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="contact-three__right">
                                    <div class="section-title-two text-center sec-title-animation animation-style1">
                                        <div class="section-title-two__tagline-box">
                                            <div class="section-title-two__tagline-shape">
                                                <img src="assets/img/home/rock.png" alt="">
                                            </div>
                                            <span class="section-title-two__tagline">Get in Touch</span>
                                        </div>
                                        <h2 class="section-title-two__title title-animation">We’re Here to Help and
                                            Ready to
                                            Hear from You
                                        </h2>
                                    </div>
                                    <form id="contactForm" class="contact-form-validated contact-three__form" novalidate>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6">
                                                <h4 class="contact-three__input-title">Full Name *</h4>
                                                <div class="contact-three__input-box">
                                                    <input type="text" name="name" placeholder="John Doe" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-6">
                                                <h4 class="contact-three__input-title">Email Address *</h4>
                                                <div class="contact-three__input-box">
                                                    <input type="email" name="email" placeholder="john@domain.com" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <h4 class="contact-three__input-title">Subject *</h4>
                                                <div class="contact-three__input-box">
                                                    <input type="text" name="subject" placeholder="Write about your enquiry" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <h4 class="contact-three__input-title">Purpose *</h4>
                                                <div class="contact-three__input-box">
                                                    <select name="purpose" required>
                                                        <option value="">Select</option>
                                                        <option value="Enquiry">Enquiry</option>
                                                        <option value="Feedback">Feedback</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <h4 class="contact-three__input-title">Message *</h4>
                                                <div class="contact-three__input-box text-message-box">
                                                    <textarea name="message" placeholder="Write Your Message" required></textarea>
                                                </div>
                                                <div class="contact-three__btn-box">
                                                    <button type="submit" id="formBtn" class="thm-btn-two contact-three__btn">
                                                        <span>Submit</span><i class="icon-angles-right"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="result"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--Contact Three End-->


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <script src="assets/js/module/contact-us.js"></script>

</body>

</html>
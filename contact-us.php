<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Contact Us - Thaalam Radio Station";
    $page_description = "Have questions, feedback, or advertising inquiries? Get in touch with Thaalam Radio Station via our contact form, email, or phone numbers. We’re here to help.";
    $page_url = "https://demoview.ch/summerfest/thaalam-main/contact-us";
    $page_image = "https://demoview.ch/summerfest/thaalam-main/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

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

                <section class="contact-three" style="background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); 
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
            min-height: 200px;">
                    <div class="container">
                        <div class="col-xl-12 col-lg-12 contact-sidebar">
                            <div class="contact-box">
                                <div class="contact-header">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <h3 class="contact-two__title">Our Address</h3>
                                </div>
                                <div class="contact-content">
                                    <p>Talacker 41, <br>8001 Zürich</p>
                                </div>
                            </div>

                            <div class="contact-box">
                                <div class="contact-header">
                                    <i class="fas fa-phone"></i>
                                    <h3 class="contact-two__title">Contact Number</h3>
                                </div>
                                <div class="contact-content">

                                    <p><a href="tel:+41792882271" style="color: #333">+41 79 288 22 71</a></p>
                                    <p><a href="tel:+41415627944" style="color: #333">+41 41 562 79 44</a></p>
                                </div>
                            </div>
                            <div class="contact-box">
                                <div class="contact-header">
                                    <i class="fas fa-envelope"></i>
                                    <h3 class="contact-two__title">Email Address</h3>
                                </div>
                                <div class="contact-content">
                                    <p><a href="mailto:info@thaalam.ch" style="color: #333">info@thaalam.ch</a></p>
                                    <p><a href="mailto:marketing@thaalam.ch" style="color: #333">marketing@thaalam.ch</a></p>
                                </div>
                            </div>
                        </div>

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
                                    <div class="tab-buttons ">
                                        <button class="tab-btn active" data-target="#feedback">Feedback</button>
                                        <button class="tab-btn" data-target="#advertisement">Advertisement</button>
                                    </div>

                                    <div class="tab-content contact-us_container">
                                        <div id="feedback" class="tab-pane active wow fadeInUp">
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
                                        </div>

                                        <div id="advertisement" class="tab-pane  wow fadeInUp">
                                            <form id="advertisementForm" class="contact-three_from" novalidate>
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6">
                                                        <h4 class="contact-three__input-title">Company Name *</h4>
                                                        <div class="contact-three__input-box">
                                                            <input type="text" name="company_name" placeholder="Company Name" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6">
                                                        <h4 class="contact-three__input-title">Contact Person *</h4>
                                                        <div class="contact-three__input-box">
                                                            <input type="text" name="contact_person" placeholder="Contact Person" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6">
                                                        <h4 class="contact-three__input-title">Email *</h4>
                                                        <div class="contact-three__input-box">
                                                            <input type="email" name="email" placeholder="john@domain.com" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6">
                                                        <h4 class="contact-three__input-title">Phone *</h4>
                                                        <div class="contact-three__input-box">
                                                            <input type="text" name="phone" placeholder="+41 79 288 22 71" required>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12 ">
                                                        <h4 class="contact-three__input-title">Company website Address </h4>
                                                        <div class="contact-three__input-box">
                                                            <input type="text" name="site_address" placeholder="www.thaalam.ch">
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-12">
                                                        <h4 class="contact-three__input-title">Requirement *</h4>
                                                        <div class="contact-three__input-box text-message-box">
                                                            <textarea name="requirement" placeholder="Tell me about your requirement" required></textarea>
                                                        </div>
                                                        <div class="contact-three__btn-box">
                                                            <button type="submit" id="advertiseBtn" class="thm-btn-two contact-three__btn">
                                                                <span>Submit</span><i class="icon-angles-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

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
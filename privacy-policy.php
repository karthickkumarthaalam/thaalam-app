<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Privacy Policy - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'privacy'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="forgot-password-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="privacy-policy-section">
                        <div class="privacy-container">
                            <h2 class="privacy-title"><i class="fas fa-shield-alt"></i> Privacy Policy</h2>

                            <div class="privacy-content">
                                <div class="policy-item">
                                    <h3><i class="fas fa-info-circle"></i> Information We Collect</h3>
                                    <p>We collect personal information when you register on our site, subscribe to our
                                        newsletter, or fill out a form. This may include your name, email address, phone
                                        number, and other contact details.</p>
                                </div>

                                <div class="policy-item">
                                    <h3><i class="fas fa-cookie"></i> Cookies Usage</h3>
                                    <p>Our website uses cookies to enhance your experience. Cookies are small files
                                        stored on your device that help us analyze web traffic and remember your
                                        preferences.</p>
                                </div>

                                <div class="policy-item">
                                    <h3><i class="fas fa-lock"></i> Data Protection</h3>
                                    <p>We implement security measures to maintain the safety of your personal
                                        information. All sensitive data is transmitted via Secure Socket Layer (SSL)
                                        technology.</p>
                                </div>

                                <div class="policy-item">
                                    <h3><i class="fas fa-share-alt"></i> Third-Party Disclosure</h3>
                                    <p>We do not sell, trade, or transfer your personally identifiable information to
                                        outside parties unless we provide users with advance notice.</p>
                                </div>

                                <div class="policy-item">
                                    <h3><i class="fas fa-external-link-alt"></i> Third-Party Links</h3>
                                    <p>Occasionally, we may include links to third-party products or services on our
                                        website. These third-party sites have separate privacy policies.</p>
                                </div>

                                <div class="policy-item">
                                    <h3><i class="fas fa-calendar-alt"></i> Policy Changes</h3>
                                    <p>We may update this privacy policy periodically. Any changes will be posted on
                                        this page with an updated revision date.</p>
                                </div>

                                <div class="policy-item">
                                    <h3><i class="fas fa-envelope"></i> Contact Us</h3>
                                    <p>If you have any questions regarding this privacy policy, please contact us at
                                        privacy@thaalamradio.com.</p>
                                </div>
                            </div>

                            <div class="policy-update">
                                <p><i class="fas fa-history"></i> Last updated: June 15, 2023</p>
                            </div>
                        </div>
                    </div>
                </section>

                <style>
                    .privacy-policy-section {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        background: #f9f9f9;
                        padding: 40px 0;
                        color: #333;
                    }

                    .privacy-container {
                        max-width: 900px;
                        margin: 0 auto;
                        padding: 0 20px;
                    }

                    .privacy-title {
                        color: #d50000;
                        text-align: center;
                        margin-bottom: 30px;
                        font-size: 32px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 15px;
                    }

                    .privacy-title i {
                        font-size: 1.2em;
                    }

                    .privacy-content {
                        background: #fff;
                        border-radius: 10px;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                        padding: 30px;
                    }

                    .policy-item {
                        margin-bottom: 25px;
                        padding-bottom: 25px;
                        border-bottom: 1px solid #eee;
                        transition: all 0.3s ease;
                    }

                    .policy-item:last-child {
                        margin-bottom: 0;
                        padding-bottom: 0;
                        border-bottom: none;
                    }

                    .policy-item:hover {
                        transform: translateX(5px);
                    }

                    .policy-item h3 {
                        color: #222;
                        margin-top: 0;
                        margin-bottom: 15px;
                        font-size: 20px;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    }

                    .policy-item h3 i {
                        color: #d50000;
                        font-size: 1.1em;
                    }

                    .policy-item p {
                        line-height: 1.6;
                        margin: 0;
                        color: #555;
                    }

                    .policy-update {
                        text-align: right;
                        margin-top: 20px;
                        font-size: 14px;
                        color: #777;
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        gap: 8px;
                    }

                    .policy-update i {
                        color: #d50000;
                    }

                    /* Responsive Design */
                    @media (max-width: 768px) {
                        .privacy-title {
                            font-size: 26px;
                        }

                        .privacy-content {
                            padding: 20px;
                        }

                        .policy-item h3 {
                            font-size: 18px;
                        }
                    }
                </style>

                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Terms and Conditions - Thaalam Radio Station";
    $page_description = "Read the Terms and Conditions for using Thaalam Radio Station website. Understand your rights and responsibilities while accessing our services.";
    $page_url = "https://thaalam.ch/terms-conditions";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'terms'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="forgot-password-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="terms-section">
                        <div class="terms-container">
                            <h2 class="terms-title"><i class="fas fa-file-contract"></i> Terms & Conditions</h2>

                            <div class="terms-content">
                                <div class="terms-item">
                                    <h3><i class="fas fa-user-check"></i> Acceptance of Terms</h3>
                                    <p>By accessing and using the Thaalam Radio Station website, you accept and agree to
                                        be bound by these Terms and Conditions. If you do not agree, please refrain from
                                        using our services.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-id-card"></i> User Accounts</h3>
                                    <p>When creating an account, you must provide accurate information. You are
                                        responsible for maintaining the confidentiality of your account credentials and
                                        for all activities under your account.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-music"></i> Content Usage</h3>
                                    <p>All audio content, text, graphics, and logos are property of Thaalam Radio
                                        Station and protected by copyright laws. Unauthorized use, reproduction, or
                                        distribution is strictly prohibited.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-comment-alt"></i> User Conduct</h3>
                                    <p>Users must not post offensive, defamatory, or illegal content. Thaalam reserves
                                        the right to remove any content and terminate accounts violating these terms
                                        without notice.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-exchange-alt"></i> Third-Party Services</h3>
                                    <p>Our website may contain links to third-party websites. We are not responsible for
                                        the content or practices of these external sites.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-ban"></i> Prohibited Activities</h3>
                                    <p>You may not: attempt to hack our systems, use automated scraping tools,
                                        impersonate others, or disrupt service to other users.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-gavel"></i> Limitation of Liability</h3>
                                    <p>Thaalam Radio Station shall not be liable for any indirect, incidental, or
                                        consequential damages resulting from use of our services.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-pencil-alt"></i> Modifications</h3>
                                    <p>We reserve the right to modify these terms at any time. Continued use after
                                        changes constitutes acceptance of the new terms.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-balance-scale"></i> Governing Law</h3>
                                    <p>These terms shall be governed by and construed in accordance with the laws of
                                        Switzerland, without regard to conflict of law principles.</p>
                                </div>

                                <div class="terms-item">
                                    <h3><i class="fas fa-question-circle"></i> Contact</h3>
                                    <p>For questions regarding these Terms & Conditions, please contact us at
                                        legal@thaalamradio.com.</p>
                                </div>
                            </div>

                            <div class="terms-update">
                                <p><i class="fas fa-history"></i> Last updated: June 15, 2023</p>
                            </div>
                        </div>
                    </div>


                </section>
                <style>
                    .terms-section {
                        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                        background: #f9f9f9;
                        padding: 40px 0;
                        color: #333;
                    }

                    .terms-container {
                        max-width: 900px;
                        margin: 0 auto;
                        padding: 0 20px;
                    }

                    .terms-title {
                        color: #d50000;
                        text-align: center;
                        margin-bottom: 30px;
                        font-size: 32px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 15px;
                    }

                    .terms-title i {
                        font-size: 1.2em;
                    }

                    .terms-content {
                        background: #fff;
                        border-radius: 10px;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
                        padding: 30px;
                    }

                    .terms-item {
                        margin-bottom: 25px;
                        padding-bottom: 25px;
                        border-bottom: 1px solid #eee;
                        transition: all 0.3s ease;
                    }

                    .terms-item:last-child {
                        margin-bottom: 0;
                        padding-bottom: 0;
                        border-bottom: none;
                    }

                    .terms-item:hover {
                        transform: translateX(5px);
                    }

                    .terms-item h3 {
                        color: #222;
                        margin-top: 0;
                        margin-bottom: 15px;
                        font-size: 20px;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                    }

                    .terms-item h3 i {
                        color: #d50000;
                        font-size: 1.1em;
                    }

                    .terms-item p {
                        line-height: 1.6;
                        margin: 0;
                        color: #555;
                        padding-left: 28px;
                    }

                    .terms-update {
                        text-align: right;
                        margin-top: 20px;
                        font-size: 14px;
                        color: #777;
                        display: flex;
                        align-items: center;
                        justify-content: flex-end;
                        gap: 8px;
                    }

                    .terms-update i {
                        color: #d50000;
                    }

                    /* Responsive Design */
                    @media (max-width: 768px) {
                        .terms-title {
                            font-size: 26px;
                        }

                        .terms-content {
                            padding: 20px;
                        }

                        .terms-item h3 {
                            font-size: 18px;
                        }

                        .terms-item p {
                            padding-left: 0;
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
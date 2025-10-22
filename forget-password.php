<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Forgot Password - Thaalam Radio Station";
    $page_description = "Reset your Thaalam Radio Station account password. Enter your email to receive an OTP and securely reset your password.";
    $page_url = "https://thaalam.ch/forget-password";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/forgor-password.css">

    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'forget'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>
    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="forgot-password-section" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                    <div class="forgot-password-header">
                        <h2>Reset Your Password</h2>
                        <p class="subtext" id="subtext">Enter your email to receive a password reset OTP</p>
                    </div>
                    <div class="forgot-password-container">
                        <form id="forgotPasswordForm" class="forgot-password-form">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <div class="input-container">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                                </div>
                            </div>

                            <div class="form-group" style="display: none;" id="otpContainer">
                                <label for="otp"> OTP</label>
                                <div class="input-container">
                                    <i class="fas fa-shield"></i>
                                    <input type="number" id="otp" name="otp" placeholder="Enter your OTP">
                                </div>
                            </div>

                            <button type="submit" class="btn-primary" id="submitBtn">
                                <i class="fas fa-paper-plane"></i>
                                Send OTP
                            </button>

                            <div class="auth-footer">
                                <p>Remember your password? <a href="login">Sign in</a></p>
                            </div>
                        </form>
                    </div>
                </section>


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/forgot-password.js" defer></script>

</body>

</html>
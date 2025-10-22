<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Reset Password - Thaalam Radio Station";
    $page_description = "Securely reset your Thaalam Radio Station account password. Enter a new password to continue enjoying music, shows, and community features.";
    $page_url = "https://thaalam.ch/reset-password";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php' ?>
    <link rel="stylesheet" href="assets/css/module-css/forgor-password.css">
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'resetPassword'; ?>

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
                    <div class="forgot-password-container">
                        <div class="forgot-password-header">
                            <h2>Reset Your Password</h2>
                            <p class="subtext" id="subtext">Enter your email to receive a password reset OTP</p>
                        </div>

                        <form id="resetPasswordForm" class="forgot-password-form">
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <div class="input-container">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" id="newPassword" name="newPassword" placeholder="Enter New Password" required>
                                    <i class="fas fa-eye-slash password-toggle" data-target="#newPassword"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <div class="input-container">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Enter Confirm Password" required>
                                    <i class="fas fa-eye-slash password-toggle" data-target="#confirmPassword"></i>
                                </div>
                            </div>

                            <button type="submit" class="btn-primary" id="submitBtn">
                                Submit
                                <i class="fas fa-paper-plane"></i>
                            </button>

                            <div class="auth-footer">
                                <p>Remember your password? <a href="login">Sign in</a></p>
                            </div>
                        </form>
                    </div>
                </section>
            </div>


            <?php include 'php/footer.php'; ?>
        </div>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/reset-password.js" defer></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register OTP - Thaalam Radio Station</title>

    <?php include 'php/css.php' ?>
    <link rel="stylesheet" href="assets/css/module-css/login.css">
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'register-otp'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php' ?>

    <?php include 'php/toast.php' ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php' ?>
                <section class="login-section" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                    <div class="login-header">
                        <h2>Verification required</h2>
                        <p class="subtext">OTP sent to your registered Email Address</p>
                    </div>
                    <div class="login-container">
                        <form id="otpForm" class="login-form">
                            <div class="form-group">
                                <label for="otp">Enter your OTP</label>
                                <div class="input-container">
                                    <input type="text" id="otp" name="otp" required>
                                </div>
                            </div>

                            <button type="submit" id="submitBtn" class="btn-primary">
                                <i class="fas fa-paper-plane"></i>
                                Verify OTP
                            </button>
                        </form>

                    </div>

                </section>

                <?php include 'php/footer.php'; ?>

            </div>
        </div>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/register-otp.js" defer></script>

</body>

</html>
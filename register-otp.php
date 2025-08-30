<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register OTP - Thaalam Radio Station</title>

    <?php include 'php/css.php' ?>
    <link rel="stylesheet" href="assets/css/module-css/login.css">

</head>

<body class="custom-cursor">
    <?php $pagename = 'register-otp'; ?>

    <?php include 'php/preloader.php' ?>

    <?php include 'php/toast.php' ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php' ?>
                <section class="login-section" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                    <div class="login-container">
                        <div class="login-header">
                            <h2>Verification required</h2>
                            <p class="subtext">OTP sent to your registered Email Address</p>
                        </div>

                        <form id="otpForm" class="login-form">
                            <div class="form-group">
                                <div class="input-container">
                                    <input type="text" id="otp" name="otp" required>
                                </div>
                            </div>

                            <button type="submit" id="submitBtn" class="btn-primary">
                                Verify OTP
                                <i class="fas fa-arrow-right"></i>
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

    <script src="assets/js/module/register-otp.js"></script>

</body>

</html>
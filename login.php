<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/login.css">

</head>

<body class="custom-cursor">
    <?php $pagename = 'login'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>

                <section class="login-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-2.png');background-size: contain;">
                    <div class="login-container">
                        <div class="login-header">
                            <h2>Member Sign In</h2>
                            <p class="subtext">Welcome back! Please enter your details</p>
                        </div>

                        <form id="loginForm" class="login-form">
                            <div class="form-group">
                                <label for="loginId">Email / Mobile Number</label>
                                <div class="input-container">
                                    <i class="fas fa-user"></i>
                                    <input type="text" id="loginId" name="loginId"
                                        placeholder="Enter email or mobile number" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <div class="input-container">
                                    <i class="fas fa-lock"></i>
                                    <input type="password" id="password" name="password"
                                        placeholder="Enter your password" required>
                                    <i class="fas fa-eye-slash password-toggle"></i>
                                </div>
                            </div>

                            <div class="form-options">
                                <label class="remember-me">
                                    <input type="checkbox" name="remember">
                                    <span class="checkmark"></span>
                                    Remember me
                                </label>
                                <a href="forget-password.php" class="forgot-password">Forgot password?</a>
                            </div>

                            <button type="submit" id="submitBtn" class="btn-primary">
                                Sign In
                                <i class="fas fa-arrow-right"></i>
                            </button>

                            <div class="auth-footer">
                                <p>New to thaalam? <a href="register.php">Sign up</a></p>
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

    <script src="assets/js/module/login.js"></script>
</body>

</html>
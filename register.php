<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/register.css">

</head>

<body class="custom-cursor">
    <?php $pagename = 'register'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>
                <section class="signup-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-2.png');background-size: contain;">
                    <div class="signup-container">
                        <div class="signup-header">
                            <div class="logo-placeholder"></div>
                            <h2>Register Your Account</h2>
                            <p class="subtext">Join our platform to get started</p>
                        </div>

                        <form id="signupForm" class="signup-form">
                            <div class="form-grid">
                                <!-- Name and Gender Row -->
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <div class="input-container">
                                        <i class="fas fa-user"></i>
                                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="radio-group">
                                        <label class="radio-option">
                                            <input type="radio" name="gender" value="Male" required>
                                            <span class="radio-custom"></span>
                                            <span class="radio-label">Male</span>
                                        </label>
                                        <label class="radio-option">
                                            <input type="radio" name="gender" value="Female">
                                            <span class="radio-custom"></span>
                                            <span class="radio-label">Female</span>
                                        </label>
                                        <label class="radio-option">
                                            <input type="radio" name="gender" value="Other">
                                            <span class="radio-custom"></span>
                                            <span class="radio-label">Other</span>
                                        </label>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <!-- Address Row -->
                                <div class="form-group">
                                    <label for="address1">Address Line 1</label>
                                    <div class="input-container">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <input type="text" id="address1" name="address1" placeholder="Street address"
                                            required>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <div class="input-container">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <input type="text" id="address2" name="address2"
                                            placeholder="Apt, suite, etc. (optional)">
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <!-- Location Row -->
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <div class="select-container">
                                        <i class="fas fa-globe"></i>
                                        <select id="country" name="country" required>

                                        </select>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="state">State/Region</label>
                                    <div class="select-container">
                                        <i class="fas fa-map"></i>
                                        <select id="state" name="state" required>
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <!-- City and Mobile Row -->
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <div class="select-container">
                                        <i class="fas fa-city"></i>
                                        <select id="city" name="city" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <div class="input-container">
                                        <i class="fas fa-phone rot-90"></i>
                                        <input type="tel" id="mobile" name="mobile" placeholder="+41 79 123 45 67"
                                            required>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <!-- Email and Password Row -->
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <div class="input-container">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" id="email" name="email" placeholder="your@email.com"
                                            required>
                                    </div>
                                    <span class="error-message"></span>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-container">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" id="password" name="password"
                                            placeholder="At least 8 characters" required>
                                        <i class="fas fa-eye-slash password-toggle"></i>
                                    </div>
                                    <span class="error-message"></span>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" id="submitBtn" class="btn-primary">
                                    Create Account
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                                <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>
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

    <script src="assets/js/module/register.js"></script>

</body>

</html>
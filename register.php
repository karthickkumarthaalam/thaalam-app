<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Register - Thaalam Radio Station";
    $page_description = "Create your account at Thaalam Radio Station and join our music community. Get access to Podcast interactions";
    $page_url = "https://thaalam.ch/register";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/register.css">
    <link rel="stylesheet" href="assets/css/module-css/careers.css">
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'register'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>
                <section class="signup-section" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                    <div class="career-form-container container">
                        <h2 class="form-title">Register Your Account</h2>
                        <p class="form-subtitle">Join our platform to get started</p>

                        <form id="signupForm" class="modern-form">
                            <!-- Personal Information -->
                            <div class="form-section">
                                <h3><i class="fas fa-user"></i> Personal Information</h3>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="name"><i class="fas fa-signature"></i> Full Name *</label>
                                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="gender"><i class="fas fa-venus-mars"></i> Gender *</label>
                                        <select id="gender" name="gender" required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Address Information -->
                            <div class="form-section">
                                <h3><i class="fas fa-map-marked-alt"></i> Address Information</h3>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="address1"><i class="fas fa-map-marker-alt"></i> Address Line 1 *</label>
                                        <input type="text" id="address1" name="address1" placeholder="Street address" required>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="address2"><i class="fas fa-map-marker-alt"></i> Address Line 2</label>
                                        <input type="text" id="address2" name="address2" placeholder="Apt, suite, etc. (optional)">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="country"><i class="fas fa-globe"></i> Country *</label>
                                        <select id="country" name="country" required></select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="state"><i class="fas fa-map"></i> State *</label>
                                        <select id="state" name="state" required>
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group full-width">
                                        <label for="city"><i class="fas fa-city"></i> City *</label>
                                        <select id="city" name="city" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information -->
                            <div class="form-section">
                                <h3><i class="fas fa-phone-alt"></i> Contact Information</h3>

                                <div class="form-row">
                                    <div class="form-group full-width">
                                        <label for="mobile"><i class="fas fa-phone rot-90"></i> Mobile *</label>
                                        <input type="tel" id="mobile" name="mobile" placeholder="+41 79 123 45 67" required>
                                    </div>
                                </div>
                            </div>

                            <!-- Account Information -->
                            <div class="form-section">
                                <h3><i class="fas fa-user-lock"></i> Account Information</h3>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="email"><i class="fas fa-envelope"></i> Email *</label>
                                        <input type="email" id="email" name="email" placeholder="your@email.com" required>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="password"><i class="fas fa-lock"></i> Password *</label>
                                        <div class="input-container">
                                            <input type="password" id="password" name="password" placeholder="At least 8 characters" required>
                                            <i class="fas fa-eye-slash password-toggle"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Section -->
                            <div class="form-actions">
                                <button type="submit" id="submitBtn" class="submit-btn">
                                    <i class="fas fa-paper-plane"></i>
                                    Create Account
                                </button>
                            </div>
                            <p class="login-link">Already have an account? <a href="login">Log in</a></p>

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
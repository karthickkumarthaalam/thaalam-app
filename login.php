<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'login'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div>

            <div class="col-lg-80">
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

                            <button type="submit" class="btn-primary">
                                Sign In
                                <i class="fas fa-arrow-right"></i>
                            </button>

                            <div class="auth-footer">
                                <p>New to thaalam? <a href="register.php">Sign up</a></p>
                            </div>
                        </form>
                    </div>
                </section>

                <style>
                    :root {
                        --primary: #D50000;
                        --primary-dark: #B71C1C;
                        --text: #222222;
                        --text-light: #666666;
                        --border: #E0E0E0;
                        --border-focus: #BDBDBD;
                        --background: #FAFAFA;
                        --error: #D50000;
                        --white: #FFFFFF;
                    }

                    .login-section {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                        background-color: var(--background);
                        padding: 2rem;
                    }

                    .login-container {
                        background: var(--white);
                        border-radius: 12px;
                        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
                        width: 100%;
                        max-width: 500px;
                        overflow: hidden;
                        position: relative;
                    }

                    .login-container::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 4px;
                        background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
                    }

                    .login-header {
                        padding: 2.5rem 2.5rem 1.5rem;
                        text-align: center;
                    }

                    .logo-placeholder {
                        width: 48px;
                        height: 48px;
                        margin: 0 auto 1rem;
                        background-color: var(--primary);
                        border-radius: 8px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        color: white;
                        font-size: 1.5rem;
                    }

                    .login-header h2 {
                        font-size: 1.75rem;
                        font-weight: 600;
                        margin-bottom: 0.5rem;
                        color: var(--text);
                    }

                    .subtext {
                        color: var(--text-light);
                        font-size: 0.95rem;
                    }

                    .login-form {
                        padding: 0 2.5rem 2.5rem;
                    }

                    .form-group {
                        margin-bottom: 1.25rem;
                    }

                    label {
                        display: block;
                        margin-bottom: 0.5rem;
                        font-size: 0.875rem;
                        font-weight: 500;
                        color: var(--text);
                    }

                    .input-container {
                        position: relative;
                        display: flex;
                        align-items: center;
                    }

                    .input-container i {
                        position: absolute;
                        left: 1rem;
                        color: var(--text-light);
                        font-size: 1rem;
                    }

                    input {
                        width: 100%;
                        padding: 0.5rem 1rem 0.5rem 2.5rem;
                        font-size: 0.9375rem;
                        border: 1px solid var(--border);
                        border-radius: 8px;
                        background-color: var(--white);
                        transition: all 0.2s ease;
                    }

                    input:focus {
                        border-color: var(--primary);
                        box-shadow: 0 0 0 2px rgba(213, 0, 0, 0.1);
                        outline: none;
                    }

                    input:hover {
                        border-color: var(--border-focus);
                    }

                    .password-toggle {
                        position: absolute;
                        right: 1rem;
                        left: unset !important;
                        cursor: pointer;
                        color: var(--text-light);
                        transition: color 0.2s ease;
                    }

                    .password-toggle:hover {
                        color: var(--primary);
                    }


                    .form-options {
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        margin: 1.5rem 0;
                    }

                    .remember-me {
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        font-size: 0.875rem;
                        color: var(--text-light);
                        cursor: pointer;
                        position: relative;
                        padding-left: 1.75rem;
                        /* Add padding for custom checkbox */
                    }

                    .remember-me input {
                        position: absolute;
                        opacity: 0;
                        cursor: pointer;
                        height: 0;
                        width: 0;
                    }

                    .checkmark {
                        position: absolute;
                        left: 0;
                        top: 50%;
                        transform: translateY(-50%);
                        height: 1.125rem;
                        width: 1.125rem;
                        border: 1.5px solid var(--border);
                        border-radius: 4px;
                        background-color: var(--white);
                        transition: all 0.2s ease;
                    }

                    .remember-me:hover input~.checkmark {
                        border-color: var(--border-focus);
                    }

                    .remember-me input:checked~.checkmark {
                        background-color: var(--primary);
                        border-color: var(--primary);
                    }

                    .checkmark:after {
                        content: "";
                        position: absolute;
                        display: none;
                    }

                    .remember-me input:checked~.checkmark:after {
                        display: block;
                    }

                    .remember-me .checkmark:after {
                        left: 6px;
                        top: 2px;
                        width: 4px;
                        height: 9px;
                        border: solid white;
                        border-width: 0 2px 2px 0;
                        transform: rotate(45deg);
                    }

                    .forgot-password {
                        color: var(--primary);
                        font-size: 0.875rem;
                        text-decoration: none;
                        transition: color 0.2s ease;
                    }

                    .forgot-password:hover {
                        color: var(--primary-dark);
                        text-decoration: underline;
                    }

                    .btn-primary {
                        background-color: var(--primary);
                        color: white;
                        border: none;
                        padding: 1rem 1.5rem;
                        font-size: 0.9375rem;
                        font-weight: 500;
                        border-radius: 8px;
                        width: 100%;
                        cursor: pointer;
                        transition: all 0.2s ease;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 0.75rem;
                    }

                    .btn-primary:hover {
                        background-color: var(--primary-dark);
                        transform: translateY(-1px);
                    }

                    .btn-primary:active {
                        transform: translateY(0);
                    }

                    .auth-footer {
                        text-align: center;
                        margin-top: 1.5rem;
                        font-size: 0.875rem;
                        color: var(--text-light);
                    }

                    .auth-footer a {
                        color: var(--primary);
                        text-decoration: none;
                        font-weight: 500;
                        transition: color 0.2s ease;
                    }

                    .auth-footer a:hover {
                        color: var(--primary-dark);
                        text-decoration: underline;
                    }

                    /* Responsive adjustments */
                    @media (max-width: 768px) {
                        .login-container {
                            padding: 1.5rem;
                        }

                        .login-header {
                            padding: 1.5rem 1rem 1rem;
                        }

                        .login-form {
                            padding: 0 1rem 1.5rem;
                        }

                        .form-options {
                            flex-direction: column;
                            align-items: flex-start;
                            gap: 0.75rem;
                        }
                    }
                </style>



                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>
    <script>
        $(document).ready(function () {
            // Password toggle
            $('.password-toggle').on('click', function () {
                const $password = $('#password');
                const type = $password.attr('type') === 'password' ? 'text' : 'password';
                $password.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });

            // Form validation
            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                let isValid = true;

                // Clear previous errors
                $('.error-message').text('');

                // Validate login ID (email or mobile)
                const loginId = $('#loginId').val().trim();
                if (!loginId) {
                    $('#loginId').nextAll('.error-message').first().text('Email or mobile number is required');
                    isValid = false;
                } else if (!isValidEmail(loginId)) {
                    // If not email, check if it's a valid mobile number
                    if (!/^[+]?[0-9\s-]{10,15}$/.test(loginId)) {
                        $('#loginId').nextAll('.error-message').first().text('Please enter a valid email or mobile number');
                        isValid = false;
                    }
                }

                // Validate password
                const password = $('#password').val();
                if (!password) {
                    $('#password').nextAll('.error-message').first().text('Password is required');
                    isValid = false;
                } else if (password.length < 6) {
                    $('#password').nextAll('.error-message').first().text('Password must be at least 6 characters');
                    isValid = false;
                }

                if (isValid) {
                    // Form submission would go here
                    console.log('Form is valid, submitting...');
                    // this.submit();
                }
            });

            function isValidEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

            // Focus effects
            $('input').on({
                focus: function () {
                    $(this).css({
                        'border-color': 'var(--primary)',
                        'box-shadow': '0 0 0 2px rgba(213, 0, 0, 0.1)'
                    });
                },
                blur: function () {
                    $(this).css({
                        'border-color': 'var(--border)',
                        'box-shadow': 'none'
                    });
                }
            });
        });
    </script>

</body>

</html>
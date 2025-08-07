<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forget Password - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'forget'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div>

            <div class="col-lg-80">
                <?php include 'php/header.php'; ?>

                <section class="forgot-password-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0.5)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
                    <div class="forgot-password-container">
                        <div class="forgot-password-header">
                            <h2>Reset Your Password</h2>
                            <p class="subtext">Enter your email to receive a password reset link</p>
                        </div>

                        <form id="forgotPasswordForm" class="forgot-password-form">
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <div class="input-container">
                                    <i class="fas fa-envelope"></i>
                                    <input type="email" id="email" name="email" placeholder="your@email.com" required>
                                </div>
                            </div>

                            <button type="submit" class="btn-primary">
                                Send Reset Link
                                <i class="fas fa-paper-plane"></i>
                            </button>

                            <div class="auth-footer">
                                <p>Remember your password? <a href="login.php">Sign in</a></p>
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

                    .forgot-password-section {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                        background-color: var(--background);
                        padding: 2rem;
                    }

                    .forgot-password-container {
                        background: var(--white);
                        border-radius: 12px;
                        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
                        width: 100%;
                        max-width: 440px;
                        overflow: hidden;
                        position: relative;
                    }

                    .forgot-password-container::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 4px;
                        background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
                    }

                    .forgot-password-header {
                        padding: 2.5rem 2.5rem 1.5rem;
                        text-align: center;
                    }


                    .forgot-password-header h2 {
                        font-size: 1.75rem;
                        font-weight: 600;
                        margin-bottom: 0.5rem;
                        color: var(--text);
                    }

                    .subtext {
                        color: var(--text-light);
                        font-size: 0.95rem;
                    }

                    .forgot-password-form {
                        padding: 0 2.5rem 2.5rem;
                    }

                    .form-group {
                        margin-bottom: 1.5rem;
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
                        .forgot-password-container {
                            padding: 1.5rem;
                        }

                        .forgot-password-header {
                            padding: 1.5rem 1rem 1rem;
                        }

                        .forgot-password-form {
                            padding: 0 1rem 1.5rem;
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
            // Form validation
            $('#forgotPasswordForm').on('submit', function (e) {
                e.preventDefault();
                let isValid = true;

                // Clear previous errors
                $('.error-message').text('');

                // Validate email
                const email = $('#email').val().trim();
                if (!email) {
                    $('#email').nextAll('.error-message').first().text('Email is required');
                    isValid = false;
                } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                    $('#email').nextAll('.error-message').first().text('Please enter a valid email');
                    isValid = false;
                }

                if (isValid) {
                    // Form submission would go here
                    console.log('Form is valid, submitting...');

                    // Show success message (optional)
                    alert('Password reset link has been sent to your email!');

                    // Reset form
                    this.reset();

                    // Alternatively, you could redirect:
                    // window.location.href = 'reset-confirmation.html';
                }
            });

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
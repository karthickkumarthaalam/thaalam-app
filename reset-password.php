<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Reset Password - Thaalam Radio Station";
    $page_description = "Securely reset your Thaalam Radio Station account password. Enter a new password to continue enjoying music, shows, and community features.";
    $page_url = "https://demoview.ch/summerfest/thaalam-main/reset-password";
    $page_image = "https://demoview.ch/summerfest/thaalam-main/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php' ?>
    <link rel="stylesheet" href="assets/css/module-css/forgor-password.css">

</head>

<body class="custom-cursor">
    <?php $pagename = 'resetPassword'; ?>

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

    <script>
        $(document).ready(function() {

            $('.password-toggle').on('click', function() {
                const $target = $($(this).data("target"));
                const type = $target.attr('type') === 'password' ? 'text' : 'password';
                $target.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });


            $('#resetPasswordForm').on('submit', function(e) {
                e.preventDefault();

                const submitBtn = $('#subtmiBtn');
                const email = localStorage.getItem('forgotEmail') || "";


                const newPassword = $('#newPassword').val().trim();
                const confirmPassword = $('#confirmPassword').val().trim();

                if (!newPassword || !confirmPassword) {
                    showToast("Please enter New Password", "error");
                    return;
                }

                submitBtn.prop('disabled', true).text("Sending...");
                $.ajax({
                    url: `${window.API_BASE_URL}/members/reset-password`,
                    method: "POST",
                    contentType: "application/json",
                    data: JSON.stringify({
                        email,
                        newPassword,
                        confirmPassword
                    }),
                    success: function() {
                        showToast('Password updated successfully', "success");
                        localStorage.removeItem("forgotEmail", email);
                        window.location.href = "login.php";
                    },
                    error: function(xhr) {
                        const res = xhr.responseJSON;
                        showToast(res?.message || "Failed to reset password", "error");
                    },
                    complete: function() {
                        submitBtn.prop('disabled', false)
                    }
                })
            })


            $('input').on({
                focus: function() {
                    $(this).css({
                        'border-color': 'var(--primary)',
                        'box-shadow': '0 0 0 2px rgba(213, 0, 0, 0.1)'
                    });
                },
                blur: function() {
                    $(this).css({
                        'border-color': 'var(--border)',
                        'box-shadow': 'none'
                    });
                }
            });
        })
    </script>
</body>

</html>
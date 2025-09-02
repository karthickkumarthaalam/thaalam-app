<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Forget Password - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/forgor-password.css">

</head>

<body class="custom-cursor">
    <?php $pagename = 'forget'; ?>

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
                                <p>Remember your password? <a href="login.php">Sign in</a></p>
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

    <script>
        $(document).ready(function() {
            let step = localStorage.getItem("forgotStep") || 1;
            let savedEmail = localStorage.getItem("forgotEmail") || "";

            // Restore state if user already requested OTP
            if (step == 2 && savedEmail) {
                $("#email").val(savedEmail).prop("readonly", true);
                $("#otpContainer").show();
                $("#submitBtn").text("Verify OTP");
                $("#subtext").text("Enter the OTP you received in your email");
            }

            $('#forgotPasswordForm').on('submit', function(e) {
                e.preventDefault();
                const submitBtn = $('#submitBtn');
                const subtext = $('#subtext');
                const otpContainer = $('#otpContainer');

                const email = $('#email').val().trim();
                const otp = $('#otp').val().trim();

                // STEP 1 → Send OTP
                if (step == 1) {
                    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                        showToast("Please enter a valid email", "error");
                        return;
                    }

                    submitBtn.prop('disabled', true).text("Sending...");
                    $.ajax({
                        url: `${window.API_BASE_URL}/members/forgot-password`,
                        method: "POST",
                        contentType: 'application/json',
                        data: JSON.stringify({
                            email
                        }),
                        success: function() {
                            showToast('OTP has been sent to your registered Email Address', "success");
                            subtext.text('Enter the OTP you received in your email');
                            otpContainer.show();
                            submitBtn.text("Verify OTP");

                            // Save progress in localStorage
                            localStorage.setItem("forgotStep", 2);
                            localStorage.setItem("forgotEmail", email);
                            step = 2;
                        },
                        error: function(xhr) {
                            const res = xhr.responseJSON;
                            showToast(res?.message || "Failed to send OTP", "error");
                            submitBtn.text("Send OTP");
                        },
                        complete: function() {
                            submitBtn.prop('disabled', false);
                        }
                    });
                }

                // STEP 2 → Verify OTP
                else if (step == 2) {
                    if (!otp) {
                        showToast("Please enter OTP", "error");
                        return;
                    }

                    submitBtn.prop('disabled', true).text("Verifying...");
                    $.ajax({
                        url: `${window.API_BASE_URL}/members/verify-otp`,
                        method: "POST",
                        contentType: 'application/json',
                        data: JSON.stringify({
                            email,
                            otp
                        }),
                        success: function() {
                            showToast("OTP verified successfully!", "success");

                            // Clear localStorage so flow can restart next time
                            localStorage.removeItem("forgotStep");

                            // Redirect to reset password page
                            window.location.href = "reset-password.php";
                        },
                        error: function(xhr) {
                            const res = xhr.responseJSON;
                            showToast(res?.message || "Invalid OTP", "error");
                        },
                        complete: function() {
                            submitBtn.prop('disabled', false).append($('<i>').addClass('fas fa-paper-plane')).text("Verify OTP");
                        }
                    });
                }
            });

            // Focus effects
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
        });
    </script>



</body>

</html>
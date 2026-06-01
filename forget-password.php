<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Forgot Password - Thaalam Radio Station";
    $page_description = "Reset your Thaalam Radio Station account password. Enter your email to receive an OTP and securely reset your password.";
    $page_url = "https://thaalam.ch/forget-password";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(24px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes blob {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            33% {
                transform: translate(-12px, 12px) scale(1.05);
            }

            66% {
                transform: translate(12px, -12px) scale(0.95);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.9s ease-out both;
        }

        .animate-blob {
            animation: blob 8s ease-in-out infinite;
        }

        .animation-delay-1000 {
            animation-delay: 1s;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }
    </style>
</head>

<body class="custom-cursor">
    <?php $pagename = 'forget'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="min-h-screen bg-white text-slate-900 antialiased">
        <?php include 'php/header2.php'; ?>

        <section class="relative  min-h-screen overflow-hidden px-4 py-12 sm:px-6 lg:px-8"
            style="background-image: linear-gradient(rgba(255,255,255,0.16), rgba(255,255,255,0.16)), url('./assets/images/backgrounds/background_image.jpg'); background-size: cover; background-position: center;">

            <div class="relative mx-auto w-full max-w-lg">
                <div class="animate-fade-up rounded-[40px] border border-red-100 bg-white p-8 shadow-[0_40px_120px_rgba(15,23,42,0.08)]">
                    <h1 class="mb-8 text-center mt-6 text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl">Reset Your Password</h1>

                    <form id="forgotPasswordForm" class="space-y-6">
                        <div class="space-y-3">
                            <label for="email" class="block text-sm font-medium text-slate-700">Email Address</label>
                            <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                <i class="fas fa-envelope text-slate-500"></i>
                                <input type="email" id="email" name="email" placeholder="your@email.com"
                                    class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-400 outline-none"
                                    required>
                            </div>
                        </div>

                        <div id="otpContainer" class="space-y-3 hidden">
                            <label for="otp" class="block text-sm font-medium text-slate-700">OTP Code</label>
                            <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                <i class="fas fa-shield-alt text-slate-500"></i>
                                <input type="text" id="otp" name="otp" placeholder="Enter your OTP"
                                    class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none">
                            </div>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-translate-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white transition duration-300 group-hover:bg-white/25">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            Send OTP
                        </button>

                        <div class="pt-4 text-center text-sm text-slate-600">
                            <p>Remember your password? <a href="login" class="font-semibold text-red-600 transition hover:text-red-700">Sign in</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/forgot-password.js" defer></script>
</body>

</html>
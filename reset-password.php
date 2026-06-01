<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Reset Password - Thaalam Radio Station";
    $page_description = "Securely reset your Thaalam Radio Station account password. Enter a new password to continue enjoying music, shows, and community features.";
    $page_url = "https://thaalam.ch/reset-password";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php' ?>
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
    <?php $pagename = 'resetPassword'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="min-h-screen bg-white text-slate-900 antialiased">
        <?php include 'php/header2.php'; ?>

        <section class="relative min-h-screen overflow-hidden px-4 py-12 sm:px-6 lg:px-8"
            style="background-image: linear-gradient(rgba(255,255,255,0.16), rgba(255,255,255,0.16)), url('./assets/images/backgrounds/background_image.jpg'); background-size: cover; background-position: center;">


            <div class="relative mx-auto max-w-lg">
                <div class="animate-fade-up rounded-[40px] border border-red-100 bg-white p-8 shadow-[0_40px_120px_rgba(15,23,42,0.08)]">
                    <div class="mb-8 text-center">
                        <h1 class="mt-6 text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl">Reset Your Password</h1>
                    </div>

                    <form id="resetPasswordForm" class="space-y-6">
                        <div class="space-y-3">
                            <label for="newPassword" class="block text-sm font-medium text-slate-700">New Password</label>
                            <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                <i class="fas fa-lock text-slate-500"></i>
                                <input type="password" id="newPassword" name="newPassword" placeholder="Enter New Password"
                                    class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                    required>
                                <i class="fas fa-eye-slash password-toggle text-slate-400 cursor-pointer hover:text-slate-600" data-target="#newPassword"></i>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <label for="confirmPassword" class="block text-sm font-medium text-slate-700">Confirm Password</label>
                            <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                <i class="fas fa-lock text-slate-500"></i>
                                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm New Password"
                                    class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                    required>
                                <i class="fas fa-eye-slash password-toggle text-slate-400 cursor-pointer hover:text-slate-600" data-target="#confirmPassword"></i>
                            </div>
                        </div>

                        <button type="submit" id="submitBtn"
                            class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-translate-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white transition duration-300 group-hover:bg-white/25">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            Reset Password
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

    <script src="assets/js/module/reset-password.js" defer></script>

</body>

</html>
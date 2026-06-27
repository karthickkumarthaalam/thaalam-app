<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Login - Thaalam Radio Station";
    $page_description = "Login to Thaalam Radio Station to manage your membership, access exclusive content, and enjoy personalized experiences.";
    $page_url = "https://thaalam.ch/login";
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
    <?php $pagename = 'login'; ?>

    <?php include 'php/analyticsBody.php'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="min-h-screen bg-slate-50 text-slate-900 antialiased">
        <?php include 'php/header2.php'; ?>

        <section class="relative min-h-screen px-4 py-12 overflow-hidden"
            style="background-image: linear-gradient(rgba(255,255,255,0.16), rgba(255,255,255,0.16)), url('./assets/images/backgrounds/background_image.jpg'); background-size: cover; background-position: center;">

            <div class="relative w-full max-w-lg mx-auto animate-fade-up rounded-[32px] border border-white/70 bg-white/85 backdrop-blur-xl p-8 shadow-2xl shadow-slate-900/10 transition duration-500 hover:-translate-y-1 hover:shadow-2xl hover:shadow-slate-900/15">
                <h1 class="mb-8 text-center mt-6 text-xl font-semibold tracking-tight text-slate-900 sm:text-2xl">Member Sign In</h1>

                <form id="loginForm" class="space-y-6">
                    <div class="space-y-3">
                        <label for="loginId" class="block text-sm font-medium text-slate-700">Email / Mobile Number</label>
                        <div class="flex items-center gap-3 rounded-[28px] border border-slate-200 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                            <i class="fas fa-user text-slate-500"></i>
                            <input type="text" id="loginId" name="loginId"
                                placeholder="Enter email or mobile number"
                                class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-400 outline-none"
                                required>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <label for="password" class="block text-sm font-medium text-slate-700">Password</label>
                        <div class="flex items-center gap-3 rounded-[28px] border border-slate-200 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                            <i class="fas fa-lock text-slate-500"></i>
                            <input type="password" id="password" name="password"
                                placeholder="Enter your password"
                                class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-400 outline-none"
                                required>
                            <button type="button" class=" text-slate-400 transition hover:text-slate-600" aria-label="Toggle password visibility">
                                <i class="password-toggle fas fa-eye-slash"></i>
                            </button>
                        </div>
                    </div>


                    <button type="submit"
                        class=" group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-translate-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">
                        <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white transition duration-300 group-hover:bg-white/25">
                            <i class="fas fa-paper-plane"></i>
                        </span>
                        Sign In
                    </button>


                    <div class="pt-4 text-center text-sm text-slate-600">
                        <a href="forget-password" class="font-semibold text-red-600 transition hover:text-red-700">Forget Password</a>
                    </div>
                    <div class=" text-center text-sm text-slate-600">
                        <p>New to thaalam? <a href="register" class="font-semibold text-red-600 transition hover:text-red-700">Sign up</a></p>
                    </div>

                </form>
            </div>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/login.js" defer></script>
</body>

</html>
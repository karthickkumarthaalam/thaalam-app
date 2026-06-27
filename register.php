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

        select {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%236B7280' d='M6 9L1 4h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
            appearance: none;
        }
    </style>
</head>

<body class="custom-cursor">
    <?php $pagename = 'register'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="min-h-screen bg-white text-slate-900 antialiased">
        <?php include 'php/header2.php'; ?>

        <section class="relative overflow-hidden px-4 py-12 sm:px-6 lg:px-8"
            style="background-image: linear-gradient(rgba(255,255,255,0.16), rgba(255,255,255,0.16)), url('./assets/images/backgrounds/background_image.jpg'); background-size: cover; background-position: center;">
            <div class="relative mx-auto max-w-5xl">
                <div class="animate-fade-up rounded-[40px] border border-red-100 bg-white p-8 shadow-[0_40px_120px_rgba(15,23,42,0.08)]">
                    <div class="mb-10 text-center">

                        <span class="inline-flex items-center gap-2 rounded-full border border-red-100 bg-red-50 px-5 py-2 text-xs font-bold uppercase tracking-[0.28em] text-red-700 shadow-sm">
                            <span class="h-2 w-2 rounded-full bg-red-500 animate-pulse"></span>
                            Join Us
                        </span>

                        <h1 class="mt-6 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                            Create Your
                            <span class="bg-gradient-to-r from-red-600 via-red-500 to-orange-500 bg-clip-text text-transparent">
                                Account
                            </span>
                        </h1>

                        <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                            Join our music community and unlock access to exclusive podcasts,
                            live shows, and unforgettable experiences crafted just for you.
                        </p>

                    </div>
                    <form id="signupForm" class="space-y-6">
                        <!-- Personal Information Section -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-user h-4 w-4 text-slate-500"></i>
                                Personal Information
                            </h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label for="name" class="block text-sm font-medium text-slate-700">Full Name *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-signature text-slate-500"></i>
                                        <input type="text" id="name" name="name" placeholder="John Doe"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                            required>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label for="gender" class="block text-sm font-medium text-slate-700">Gender *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-venus-mars text-slate-500"></i>
                                        <select id="gender" name="gender"
                                            class="w-full bg-transparent text-sm text-slate-900 outline-none"
                                            required>
                                            <option value="">Select Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Address Information Section -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-map-marked-alt h-4 w-4 text-slate-500"></i>
                                Address Information
                            </h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label for="address1" class="block text-sm font-medium text-slate-700">Address Line 1 *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-map-marker-alt text-slate-500"></i>
                                        <input type="text" id="address1" name="address1" placeholder="Street address"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                            required>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label for="address2" class="block text-sm font-medium text-slate-700">Address Line 2</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-map-marker-alt text-slate-500"></i>
                                        <input type="text" id="address2" name="address2" placeholder="Apt, suite, etc."
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none">
                                    </div>
                                </div>
                            </div>

                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label for="country" class="block text-sm font-medium text-slate-700">Country *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-globe text-slate-500"></i>
                                        <select id="country" name="country"
                                            class="w-full bg-transparent text-sm text-slate-900 outline-none"
                                            required></select>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label for="state" class="block text-sm font-medium text-slate-700">State *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-map text-slate-500"></i>
                                        <select id="state" name="state"
                                            class="w-full bg-transparent text-sm text-slate-900 outline-none"
                                            required>
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="space-y-3">
                                <label for="city" class="block text-sm font-medium text-slate-700">City *</label>
                                <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                    <i class="fas fa-city text-slate-500"></i>
                                    <select id="city" name="city"
                                        class="w-full bg-transparent text-sm text-slate-900 outline-none"
                                        required>
                                        <option value="">Select City</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information Section -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-phone-alt h-4 w-4 text-slate-500"></i>
                                Contact Information
                            </h3>
                            <div class="space-y-3">
                                <label for="mobile" class="block text-sm font-medium text-slate-700">Mobile *</label>
                                <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                    <i class="fas fa-phone text-slate-500"></i>
                                    <input type="tel" id="mobile" name="mobile" placeholder="+41 79 123 45 67"
                                        class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                        required>
                                </div>
                            </div>
                        </div>

                        <!-- Account Information Section -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-user-lock h-4 w-4 text-slate-500"></i>
                                Account Information
                            </h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label for="email" class="block text-sm font-medium text-slate-700">Email *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-envelope text-slate-500"></i>
                                        <input type="email" id="email" name="email" placeholder="your@email.com"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                            required>
                                    </div>
                                </div>

                                <div class="space-y-3">
                                    <label for="password" class="block text-sm font-medium text-slate-700">Password *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-lock text-slate-500"></i>
                                        <input type="password" id="password" name="password" placeholder="At least 8 characters"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none"
                                            required>
                                        <i class="fas fa-eye-slash password-toggle text-slate-400 cursor-pointer hover:text-slate-600"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" id="submitBtn"
                            class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-translate-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white transition duration-300 group-hover:bg-white/25">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            Create Account
                        </button>

                        <div class="pt-4 text-center text-sm text-slate-600">
                            <p>Already have an account? <a href="login" class="font-semibold text-red-600 transition hover:text-red-700">Sign in</a></p>
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

    <script src="assets/js/module/register.js" defer></script>

</body>

</html>
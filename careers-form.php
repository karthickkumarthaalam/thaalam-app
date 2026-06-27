<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Careers - Thaalam Radio Station";
    $page_description = "Explore exciting career opportunities at Thaalam Radio Station, Switzerland's first official Tamil radio station. Apply now to become an RJ, content creator, or media professional.";
    $page_url = "https://www.thaalamradio.com/careers-form";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-up { animation: fadeUp 0.9s ease-out both; }
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
    <?php $pagename = 'careers-form'; ?>

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
                            We're Hiring
                        </span>
                        <h1 class="mt-6 text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">
                            Join Our
                            <span class="bg-gradient-to-r from-red-600 via-red-500 to-orange-500 bg-clip-text text-transparent">Team</span>
                        </h1>
                        <p class="mx-auto mt-5 max-w-2xl text-sm leading-7 text-slate-600 sm:text-base">
                            Opportunity to work at Switzerland's first official Tamil radio station.
                        </p>
                    </div>

                    <form id="careerForm" class="space-y-6">

                        <!-- Personal Information -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-user-tie text-slate-500"></i> Personal Information
                            </h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label for="name" class="block text-sm font-medium text-slate-700">Full Name *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-signature text-slate-500"></i>
                                        <input type="text" id="name" name="name" required placeholder="Your full name"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none">
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-slate-700">Gender *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-venus-mars text-slate-500"></i>
                                        <select name="gender" required class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                            <option value="prefer-not-to-say">Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-address-book text-slate-500"></i> Contact Information
                            </h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-slate-700">Country *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-globe text-slate-500"></i>
                                        <select id="country" name="country" required class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                            <option value="" disabled selected>Select Country</option>
                                            <option value="Switzerland">Switzerland</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="space-y-3" id="stateGroup">
                                    <label class="block text-sm font-medium text-slate-700">State *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-map text-slate-500"></i>
                                        <select id="state" name="state" required disabled class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                            <option value="" disabled selected>Select State</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3" id="cityGroup">
                                    <label class="block text-sm font-medium text-slate-700">City *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-city text-slate-500"></i>
                                        <select id="city" name="city" required disabled class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                            <option value="" disabled selected>Select City</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <label for="mobile" class="block text-sm font-medium text-slate-700">Mobile *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-phone text-slate-500"></i>
                                        <input type="tel" id="mobile" name="mobile" required placeholder="+41 79 123 45 67"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none">
                                    </div>
                                </div>
                            </div>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label for="email" class="block text-sm font-medium text-slate-700">Email *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-envelope text-slate-500"></i>
                                        <input type="email" id="email" name="email" required placeholder="your@email.com"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none">
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <label for="current_job" class="block text-sm font-medium text-slate-700">Current Job *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-user-md text-slate-500"></i>
                                        <input type="text" id="current_job" name="current_job" required placeholder="Your current position"
                                            class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Professional Information -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-briefcase text-slate-500"></i> Professional Information
                            </h3>
                            <div class="grid gap-4 sm:grid-cols-2">
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-slate-700">Already Experienced? *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-star text-slate-500"></i>
                                        <select name="is_experienced" required class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                            <option value="" disabled selected>Select option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-slate-700">Job Type *</label>
                                    <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-tasks text-slate-500"></i>
                                        <select name="job_type" id="jobtype" required class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                            <option value="" disabled selected>Select your job type</option>
                                            <option value="Announcer">Announcer</option>
                                            <option value="Content writer/creator">Content writer/creator</option>
                                            <option value="Program producer">Program producer</option>
                                            <option value="Video editor">Video editor</option>
                                            <option value="Graphics designer">Graphics designer</option>
                                            <option value="Blogger">Blogger</option>
                                            <option value="News producer">News producer</option>
                                            <option value="Tele caller">Tele caller</option>
                                            <option value="PHP developer">PHP developer</option>
                                            <option value="Web Designer">Web Designer</option>
                                            <option value="Marketing analyst">Marketing analyst</option>
                                            <option value="Marketing executive">Marketing executive</option>
                                            <option value="Translator">Translator (German, French, English)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="space-y-3">
                                <label for="experience" class="block text-sm font-medium text-slate-700">Experience</label>
                                <div class="rounded-[20px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                    <textarea id="experience" name="experience" rows="3" placeholder="Describe your relevant experience"
                                        class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none resize-none"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Documents -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-file-alt text-slate-500"></i> Documents
                            </h3>
                            <div class="space-y-3">
                                <label for="resume" class="block text-sm font-medium text-slate-700">Resume Attachment * <span class="text-xs text-slate-400">(PDF only, max 5MB)</span></label>
                                <div class="flex items-center gap-3 rounded-[28px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                    <i class="fas fa-file-pdf text-slate-500"></i>
                                    <input type="file" id="resume" name="resume" accept=".pdf" required
                                        class="w-full bg-transparent text-sm text-slate-900 outline-none">
                                </div>
                                <div class="file-preview"></div>
                            </div>
                        </div>

                        <!-- Motivation -->
                        <div class="space-y-4">
                            <h3 class="flex items-center gap-2 text-sm font-semibold text-slate-700">
                                <i class="fas fa-heart text-slate-500"></i> Motivation
                            </h3>
                            <div class="space-y-3">
                                <label for="interest" class="block text-sm font-medium text-slate-700">Why are you interested in media jobs? *</label>
                                <div class="rounded-[20px] border border-red-100 bg-slate-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                    <textarea id="interest" name="application_reason" required rows="4" placeholder="Tell us why you want to join our team..."
                                        class="w-full bg-transparent text-sm text-slate-900 placeholder-slate-500 outline-none resize-none"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit" id="submit-btn"
                            class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-translate-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 text-white transition duration-300 group-hover:bg-white/25">
                                <i class="fas fa-paper-plane"></i>
                            </span>
                            Submit Application
                        </button>

                    </form>
                </div>
            </div>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script src="assets/js/module/careers.js" defer></script>
</body>

</html>
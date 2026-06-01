<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Contact Us - Thaalam Radio Station";
    $page_description = "Have questions, feedback, or advertising inquiries? Get in touch with Thaalam Radio Station via our contact form, email, or phone numbers. We’re here to help.";
    $page_url = "https://thaalam.ch/contact-us";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>

    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="custom-cursor">
    <?php $pagename = 'contact-us'; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header2.php'; ?>
                <section class="relative px-4 py-12 sm:px-6 lg:px-8"
                    style="background-image: linear-gradient(rgba(255,255,255,0.16), rgba(255,255,255,0.16)), url('./assets/images/backgrounds/background_image.jpg'); background-size: cover; background-position: center;">

                    <div class="max-w-7xl mx-auto grid lg:grid-cols-3 gap-10">
                        <div class="lg:col-span-1 animate-fade-up">

                            <div class="rounded-3xl bg-white border border-gray-200 p-6 shadow-md">

                                <!-- HEADER -->
                                <div class="mb-6">
                                    <h3 class="text-lg font-semibold text-gray-900">Contact Information</h3>
                                    <p class="text-sm text-gray-500 mt-1">We’re available to help you anytime</p>
                                </div>

                                <!-- ITEMS -->
                                <div class="space-y-4">

                                    <!-- ADDRESS -->
                                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 hover:bg-red-50 transition">
                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-100 text-red-600">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Address</p>
                                            <p class="text-sm text-gray-500">Talacker 41, Zürich</p>
                                        </div>
                                    </div>

                                    <!-- PHONE -->
                                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 hover:bg-red-50 transition">
                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-100 text-red-600">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Phone</p>
                                            <a href="tel:0796948889" class="text-sm text-red-600 hover:text-red-700 transition">
                                                079 694 88 89
                                            </a>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 hover:bg-red-50 transition">
                                        <div class="flex h-11 w-11 items-center justify-center rounded-xl bg-red-100 text-red-600">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-900">Email</p>
                                            <div class="text-sm space-y-1">
                                                <a href="mailto:info@thaalam.ch" class="block text-red-600 hover:text-red-700 transition">
                                                    info@thaalam.ch
                                                </a>
                                                <a href="mailto:marketing@thaalam.ch" class="block text-red-600 hover:text-red-700 transition">
                                                    marketing@thaalam.ch
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="lg:col-span-2 animate-fade-up rounded-[32px] border border-white/70 bg-white/85 backdrop-blur-xl p-8 shadow-2xl shadow-gray-900/10">
                            <!-- HEADER -->
                            <div class="text-center mb-10">

                                <!-- TITLE -->
                                <h2 class="mt-4 text-2xl sm:text-3xl font-bold text-gray-900 tracking-tight">
                                    Let’s <span class="text-red-600">Connect</span>
                                </h2>

                                <!-- SUBTEXT -->
                                <p class="mt-3 text-xs sm:text-sm text-gray-500 max-w-md mx-auto leading-relaxed">
                                    Have questions, feedback, or business enquiries? We’d love to hear from you.
                                </p>

                            </div>

                            <div class="flex justify-center mb-10">
                                <div class="relative flex items-center gap-2 px-2 py-2 bg-[#0f0f0f] border border-white/10 rounded-full shadow-md">

                                    <!-- ACTIVE BACKGROUND -->
                                    <div id="tab-indicator"
                                        class="absolute top-1 bottom-1 left-1 w-[calc(50%-4px)] bg-red-600/90 rounded-full transition-all duration-300">
                                    </div>

                                    <!-- FEEDBACK -->
                                    <button onclick="switchTab('contactForm', 0)"
                                        class="tab-btn relative z-10 px-6 py-2 text-sm font-medium text-white transition">
                                        Feedback
                                    </button>

                                    <!-- ADVERTISEMENT -->
                                    <button onclick="switchTab('advertisementForm', 1)"
                                        class="tab-btn relative z-10 px-6 py-2 text-sm font-medium text-white transition">
                                        Advertisement
                                    </button>

                                </div>
                            </div>
                            <!-- FEEDBACK FORM -->
                            <form id="contactForm" class="tab-content space-y-6">

                                <div class="grid sm:grid-cols-2 gap-4">

                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Full Name *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-user text-gray-500"></i>

                                            <input type="text"
                                                name="name"
                                                placeholder="Enter your full name"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                    <!-- EMAIL -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Email *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-envelope text-gray-500"></i>

                                            <input type="email"
                                                name="email"
                                                placeholder="Enter your email"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                </div>

                                <div class="grid sm:grid-cols-2 gap-4">

                                    <!-- PHONE -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Phone *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-phone text-gray-500"></i>

                                            <input type="text"
                                                name="phone"
                                                placeholder="+41 79 123 45 67"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                    <!-- PURPOSE -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Purpose *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-list text-gray-500"></i>

                                            <select name="purpose" class="w-full bg-transparent text-sm text-gray-900 outline-none">
                                                <option>Select Purpose</option>
                                                <option>Enquiry</option>
                                                <option>Feedback</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Subject *
                                    </label>

                                    <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-pen text-gray-500"></i>

                                        <input type="text"
                                            name="subject"
                                            placeholder="Enter subject"
                                            class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                            required>
                                    </div>
                                </div>

                                <!-- MESSAGE -->
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Message *
                                    </label>

                                    <div class="flex items-start gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">

                                        <textarea
                                            name="message"
                                            placeholder="Write your message"
                                            class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none h-28 resize-none"
                                            required></textarea>
                                    </div>
                                </div>
                                <!-- BUTTON -->
                                <button
                                    id="formBtn" type="submit"
                                    class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-trangray-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">

                                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 group-hover:bg-white/25 transition">
                                        <i class="fas fa-paper-plane"></i>
                                    </span>

                                    Submit
                                </button>

                            </form>

                            <!-- ADVERTISEMENT FORM -->
                            <form id="advertisementForm" class="tab-content hidden space-y-6">

                                <!-- ROW 1 -->
                                <div class="grid sm:grid-cols-2 gap-4">

                                    <!-- COMPANY NAME -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Company Name *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-building text-gray-500"></i>

                                            <input type="text"
                                                name="company_name"
                                                placeholder="Enter company name"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                    <!-- CONTACT PERSON -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Contact Person *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-user text-gray-500"></i>

                                            <input type="text"
                                                name="contact_person"
                                                placeholder="Enter contact person"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                </div>

                                <!-- ROW 2 -->
                                <div class="grid sm:grid-cols-2 gap-4">

                                    <!-- EMAIL -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Email *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-envelope text-gray-500"></i>

                                            <input type="email"
                                                name="email"
                                                placeholder="Enter your email"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                    <!-- PHONE -->
                                    <div class="space-y-3">
                                        <label class="block text-sm font-medium text-gray-700">
                                            Phone *
                                        </label>

                                        <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                            <i class="fas fa-phone text-gray-500"></i>

                                            <input type="text"
                                                name="phone"
                                                placeholder="+41 79 123 45 67"
                                                class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none"
                                                required>
                                        </div>
                                    </div>

                                </div>

                                <!-- WEBSITE -->
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Website
                                    </label>

                                    <div class="flex items-center gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">
                                        <i class="fas fa-globe text-gray-500"></i>

                                        <input type="text"
                                            name="site_address"
                                            placeholder="https://yourwebsite.com"
                                            class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none">
                                    </div>
                                </div>

                                <!-- REQUIREMENT -->
                                <div class="space-y-3">
                                    <label class="block text-sm font-medium text-gray-700">
                                        Requirement *
                                    </label>

                                    <div class="flex items-start gap-3 rounded-[28px] border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm transition duration-300 focus-within:border-red-500 focus-within:ring-1 focus-within:ring-red-500/20">

                                        <textarea
                                            name="requirement"
                                            placeholder="Tell us about your requirement"
                                            class="w-full bg-transparent text-sm text-gray-900 placeholder-gray-400 outline-none h-28 resize-none"
                                            required></textarea>
                                    </div>
                                </div>

                                <!-- BUTTON -->
                                <button
                                    id="advertiseBtn" type="submit"
                                    class="group flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-red-600 to-red-500 px-6 py-3 text-sm font-semibold text-white shadow-lg shadow-red-500/20 transition duration-300 hover:-trangray-y-0.5 hover:from-red-700 hover:to-red-600 focus:outline-none focus:ring-4 focus:ring-red-500/20">

                                    <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-white/15 group-hover:bg-white/25 transition">
                                        <i class="fas fa-paper-plane"></i>
                                    </span>

                                    Submit Request
                                </button>

                            </form>

                        </div>
                    </div>
                </section>


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <?php include 'php/config-js.php'; ?>

    <script src="assets/js/module/contact-us.js" defer></script>
    <script>
        function switchTab(tab, index) {
            // Toggle content
            document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
            document.getElementById(tab).classList.remove('hidden');

            const buttons = document.querySelectorAll('.tab-btn');
            const indicator = document.getElementById('tab-indicator');

            // Update active text
            buttons.forEach((btn, i) => {
                btn.classList.toggle('text-gray-900', i === index);
                btn.classList.toggle('text-gray-400', i !== index);
            });

            // Move underline
            const activeBtn = buttons[index];
            const parentRect = activeBtn.parentElement.getBoundingClientRect();
            const btnRect = activeBtn.getBoundingClientRect();

            indicator.style.width = btnRect.width + "px";
            indicator.style.left = (btnRect.left - parentRect.left) + "px";
        }
    </script>
</body>

</html>
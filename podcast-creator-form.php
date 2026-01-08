<!DOCTYPE html>
<html>

<head>
    <?php
    $page_title = "Podcast Creator Form - Thaalam Media";
    $page_description = "Join Thaalam Media as a Podcast Creator and share your voice with the world. Fill out our podcast creator form to get started on your journey to podcasting success.";
    $page_url = "https://www.thaalam.ch/podcast-creator-form.php";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php';
    ?>

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .tab-btn {
            padding: 0.55rem 1.4rem;
            border-radius: 9999px;
            font-weight: 600;
            font-size: 0.875rem;
            color: #4b5563;
            /* gray-600 */
            background: #f3f4f6;
            /* gray-100 */
            border: 1px solid #e5e7eb;
            /* gray-200 */
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.25s ease;
        }

        .tab-btn:hover {
            background: #e5e7eb;
            /* gray-200 */
            color: #111827;
            /* gray-900 */
        }

        .tab-btn.active {
            color: #ffffff;
            background: linear-gradient(135deg, #f53f3fff, #ee3030ff);
            border-color: transparent;
            box-shadow: 0 8px 20px rgba(220, 38, 38, 0.35);
        }

        .tab-btn.active i {
            color: #ffffff;
        }


        .tab-panel {
            display: none;
        }

        .tab-panel.active {
            display: block;
        }

        /* Mobile tab improvements */
        @media (max-width: 640px) {
            .tab-btn {
                flex: 1 1 auto;
                justify-content: center;
                padding: 0.6rem 0.75rem;
                font-size: 0.8rem;
                border-radius: 0.75rem;
                gap: 0.4rem;
            }


            /* Make tabs scrollable instead of wrapping */
            .tab-btn-container {
                display: flex;
                gap: 0.5rem;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                scrollbar-width: none;
                /* Firefox */
            }

            .tab-btn-container::-webkit-scrollbar {
                display: none;
                /* Chrome / Safari */
            }
        }
    </style>

</head>

<body class="bg-white custom-cursor">
    <?php $pagename = "podcast-creator-form"; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>
        <section class="p-10 min-h-screen bg-gradient-to-b from-purple-50 to-white ">
            <div class="max-w-3xl mx-auto pb-10 text-center">
                <h1 class="text-xl md:text-2xl lg:text-3xl font-semibold mb-3 text-gray-800 relative inline-block">
                    Become a <span class="text-red-600">Podcast Creator</span>
                </h1>

                <p class="text-lg text-gray-800">
                    Share your voice with the world. Submit your details and join the Thaalam Media.
                </p>
            </div>

            <form
                novalidate
                id="podcastCreatorForm"
                enctype="multipart/form-data"
                class="w-full max-w-6xl mx-auto rounded-xl shadow-lg bg-white p-3 sm:p-6 md:p-10 lg:p-12 space-y-6">

                <!-- TAB NAV -->
                <div class="flex items-center justify-center gap-2 mb-8 border-b pb-4 tab-btn-container">
                    <button type="button" class="tab-btn active" data-tab="personal">Personal</button>
                    <button type="button" class="tab-btn" data-tab="address">Address</button>
                    <button type="button" class="tab-btn whitespace-nowrap" data-tab="id">ID Proof</button>
                    <button type="button" class="tab-btn" data-tab="creator">Creator</button>
                </div>

                <div class="tab-panel active min-h-[50vh]" id="tab-personal">
                    <div class="mb-4 md:p-4 flex items-center gap-3">
                        <i class="fas fa-user text-gray-700 text-lg"></i>
                        <h2 class="text-xl font-semibold text-red-500">
                            Personal Information
                        </h2>
                        <div class="flex-1 h-px bg-gradient-to-r from-red-500/80 to-transparent"></div>
                    </div>


                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>

                            <label for="profileInput"
                                class="group relative w-32 h-32 rounded-xl bg-gray-50
                           border-2 border-dashed border-gray-300 flex items-center
                            justify-center cursor-pointer hover:border-red-500 hover:bg-red-50 transition">
                                <div class="text-gray-400 group-hover:text-red-500 transition">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14" />
                                    </svg>
                                </div>

                                <!-- Image preview -->
                                <img
                                    id="profilePreview"
                                    class="absolute inset-0 w-full h-full object-cover rounded-xl hidden" />
                            </label>
                            <input
                                type="file"
                                id="profileInput"
                                name="profile"
                                accept="image/*"
                                class="hidden" />

                            <p class="text-xs text-gray-500 mt-2">
                                JPG or PNG • Max 2MB
                            </p>
                        </div>
                        <div class="flex flex-col gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700 mb-1.5">
                                    Full Name <span class="text-red-500">*</span>
                                </label>
                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Your full name"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2
                                        focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none" />
                            </div>
                            <div>
                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-1.5">Gender <span class="text-red-500">*</span> </label>
                                <select id="gender"
                                    name="gender"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none">
                                    <option value="">Select Gender</option>
                                    <option value=" male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex flex-col gap-6">
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1.5">Email <span class="text-red-500">*</span> </label>
                                <input
                                    type="email"
                                    name="email"
                                    id="email"
                                    placeholder="Your Email ID"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none" />
                            </div>
                            <div>
                                <label for="phone" class="text-sm font-medium text-gray-700 mb-1.5">Phone <span class="text-red-500">*</span></label>
                                <input
                                    type="tel"
                                    name="phone"
                                    id="phone"
                                    placeholder="Your Phone Number"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none" />

                            </div>
                        </div>
                        <div>
                            <label for="dob" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Date of Birth <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="date"
                                name="date_of_birth"
                                id="dob"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none" />
                        </div>
                        <div class="md:col-span-2 lg:col-span-2">
                            <label for="bio" class="block text-sm font-medium text-gray-700 mb-1.5">
                                Bio
                            </label>
                            <textarea
                                name="bio"
                                id="bio"
                                rows="3"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2
                                    focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none"
                                placeholder="Enter about you"></textarea>
                        </div>


                    </div>

                    <div class="flex items-end justify-end mt-10 ">

                        <button type="button" class="next-btn bg-gradient-to-b from-blue-500 to-blue-600 text-white px-6 py-2 rounded-full font-semibold">
                            Next →
                        </button>
                    </div>

                </div>

                <div class="tab-panel  min-h-[50vh]" id="tab-address">
                    <div class="my-6 md:p-4 flex items-center gap-3">
                        <i class="fas fa-map-marker-alt text-gray-700 text-lg"></i>
                        <h2 class="text-red-500 text-xl font-semibold">Address Information</h2>
                        <div class="flex-1 h-px bg-gradient-to-r from-red-500/80 to-transparent"></div>
                    </div>
                    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        <div>
                            <label for="address1" class="block text-sm font-medium text-gray-700 mb-1.5">Address 1 <span class="text-red-500">*</span></label>
                            <input
                                type="text"
                                name="address1"
                                id="address1"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none"
                                placeholder="Street address" />
                        </div>

                        <div>
                            <label for="address2" class="block text-sm font-medium text-gray-700 mb-1.5">Address 2</label>
                            <input
                                type="text"
                                name="address2"
                                id="address2"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none"
                                placeholder="Apt, suite, etc (optional)" />
                        </div>

                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1.5">Country <span class="text-red-500">*</span></label>
                            <select
                                name="country"
                                id="country"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none">
                                <option value="">Select Country</option>
                            </select>
                        </div>

                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700 mb-1.5">State <span class="text-red-500">*</span></label>
                            <select
                                name="state"
                                id="state"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none">
                                <option value="">Select State</option>
                            </select>
                        </div>

                        <div>
                            <label for="city" class="block text-sm font-medium text-gray-700 mb-1.5">City <span class="text-red-500">*</span></label>
                            <select
                                name="city"
                                id="city"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2 focus:border-none focus:ring-2 focus:ring-red-500 transition outline-none">
                                <option value="">Select City</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-between mt-10">
                        <button type="button" class="prev-btn text-gray-500 font-semibold hidden">
                            ← Previous
                        </button>

                        <button type="button" class="next-btn bg-gradient-to-b from-blue-500 to-blue-600  text-white px-6 py-2 rounded-full font-semibold">
                            Next →
                        </button>
                    </div>

                </div>

                <div class="tab-panel  min-h-[50vh]" id="tab-id">
                    <div class=" my-6 md:p-4 flex items-center gap-3">
                        <i class="fas fa-id-card text-gray-700 text-lg"></i>
                        <h2 class="text-xl font-semibold text-red-500">ID Verification</h2>
                        <div class="flex-1 h-px bg-gradient-to-r from-red-500/80 to-transparent"></div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-6 items-start">
                        <div class="flex flex-col gap-6">
                            <div>
                                <label for="id_proof_name" class="block text-sm font-medium text-gray-700 mb-1.5">ID Proof Type <span class="text-red-500">*</span></label>
                                <select
                                    name="id_proof_name"
                                    id="id_proof_name"
                                    class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2
               focus:ring-2 focus:ring-red-500 transition outline-none">

                                    <option value="">Select ID Proof</option>
                                    <option value="Aadhaar">Aadhaar Card</option>
                                    <option value="Passport">Passport</option>
                                    <option value="Driving License">Driving License</option>
                                    <option value="Voter ID">Voter ID</option>
                                </select>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Upload ID Proof <span class="text-red-500">*</span></label>
                                <label
                                    for="idInput"
                                    class="group relative w-full h-32 rounded-xl bg-gray-50
               border-2 border-dashed border-gray-300
               flex items-center justify-center cursor-pointer
               hover:border-red-500 hover:bg-red-50 transition">
                                    <!-- plus icon -->
                                    <div class="text-gray-400 group-hover:text-red-500 transition">
                                        <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 5v14M5 12h14" />
                                        </svg>
                                    </div>

                                    <!-- preview -->
                                    <div
                                        id="idPreview"
                                        class="absolute inset-0 hidden rounded-xl flex items-center justify-center bg-white"></div>
                                </label>

                                <input
                                    type="file"
                                    id="idInput"
                                    name="id_proof"
                                    accept="image/*,application/pdf"
                                    class="hidden" />

                                <p class="text-xs text-gray-500 mt-2">
                                    Image or PDF • Max 5MB
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between mt-10">
                        <button type="button" class="prev-btn text-gray-500 font-semibold hidden">
                            ← Previous
                        </button>

                        <button type="button" class="next-btn bg-gradient-to-b from-blue-500 to-blue-600  text-white px-6 py-2 rounded-full font-semibold">
                            Next →
                        </button>
                    </div>

                </div>

                <div class="tab-panel  min-h-[50vh]" id="tab-creator">
                    <div class="flex my-6 md:p-4 items-center gap-3">
                        <i class="fas fa-lightbulb text-gray-700 text-lg"></i>
                        <h2 class="text-xl font-semibold text-red-500">
                            Creator Background & Social Presence
                        </h2>
                        <div class="flex-1 h-px bg-gradient-to-r from-red-500/80 to-transparent"></div>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Podcasting Experience
                            </label>

                            <select
                                name="experience"
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2
           focus:ring-2 focus:ring-red-500 transition outline-none">
                                <option value="">Select experience</option>
                                <option value="Beginner">Beginner (0–1 year)</option>
                                <option value="Intermediate">Intermediate (1–3 years)</option>
                                <option value="Experienced">Experienced (3+ years)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1.5">
                                Why do you want to join Thaalam Media?
                            </label>

                            <textarea
                                name="reason_to_join"
                                rows="4"
                                placeholder="Tell us your motivation..."
                                class="w-full rounded-xl border border-gray-300 bg-white px-3 py-2
           focus:ring-2 focus:ring-red-500 transition outline-none"></textarea>
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Social Links
                        </label>

                        <!-- Input Row -->
                        <div class="flex flex-col md:flex-row gap-3">
                            <select
                                id="socialType"
                                class="md:w-1/3 rounded-xl border border-gray-300 bg-white px-3 py-2
             focus:ring-2 focus:ring-red-500 outline-none transition">
                                <option value="">Select Platform</option>
                                <option value="instagram">Instagram</option>
                                <option value="youtube">YouTube</option>
                                <option value="spotify">Spotify</option>
                                <option value="facebook">Facebook</option>
                                <option value="twitter">Twitter / X</option>
                                <option value="website">Website</option>
                            </select>

                            <div class="flex flex-1 gap-3">
                                <input
                                    type="url"
                                    id="socialLink"
                                    placeholder="Paste profile link"
                                    class="flex-1 rounded-xl border border-gray-300 bg-white px-3 py-2
             focus:ring-2 focus:ring-red-500 outline-none transition" />

                                <button
                                    type="button"
                                    id="addSocial"
                                    class="group inline-flex items-center gap-2 px-2 md:px-5 py-2 md:py-2.5 rounded-xl
                                     bg-gradient-to-r from-purple-500 to-indigo-600 text-white
                                     text-sm font-semibold
                                     shadow-sm shadow-red-500/30
                                     hover:shadow-lg hover:shadow-red-500/40
                                     hover:scale-[1.02]
                                     active:scale-[0.98]
                                     transition-all duration-200">
                                    <span class="inline-flex items-center justify-center w-6 h-6 rounded-full
               bg-white/20 group-hover:bg-white/30 transition">
                                        <i class="fas fa-plus text-xs"></i>
                                    </span>
                                    <span class="hidden md:block">Add Link</span>
                                </button>
                            </div>

                        </div>

                        <!-- Chips -->
                        <div
                            id="socialChips"
                            class="flex flex-wrap gap-3 mt-4"></div>

                        <!-- Hidden JSON -->
                        <input type="hidden" name="social_links" id="socialLinksInput">
                    </div>

                    <div class="flex justify-between mt-10">
                        <button type="button" class="prev-btn text-gray-500 font-semibold hidden">
                            ← Previous
                        </button>
                        <button
                            type="submit"
                            class="group inline-flex items-center gap-3 px-6 py-2 rounded-full
         bg-gradient-to-r from-green-500 to-green-600 text-white
         text-sm md:text-base font-semibold
         shadow-sm shadow-green-500/30
         hover:shadow-lg hover:shadow-green-500/40
         hover:scale-[1.03]
         active:scale-[0.98]
         transition-all duration-200">
                            <span class="inline-flex items-center justify-center w-7 h-7 rounded-full
               bg-white/20 group-hover:bg-white/30 transition">
                                <i class="fas fa-paper-plane text-xs"></i>
                            </span>
                            Submit Application
                        </button>

                    </div>


                </div>
            </form>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>
    <script src="assets/js/module/podcast-creator-form.js" defer></script>
</body>

</html>
<!DOCTYPE html>
<html>

<head>
    <?php
    $page_title = "Thaalam Podcast Creator - Create and Share your Podcasts Easily";
    $page_description = "Thaalam Podcast Creator enables you to create and share your podcasts effortlessly with our tools.";
    $page_url = "https://www.thaalam.ch/podcast-creator";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php'; ?>

    <?php include 'php/css.php'; ?>
    <?php include 'php/analyticsHeader.php'; ?>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .animate-fade {
            opacity: 0;
            animation: fade-in 0.9s ease-out forwards;
        }

        .fade-delay-1 {
            animation-delay: 1s;
        }

        .fade-delay-2 {
            animation-delay: 1.2;
        }

        .fade-delay-3 {
            animation-delay: 1.2s;
        }
    </style>


</head>

<body class="bg-white custom-cursor">
    <?php $pagename = "podcast-creator"; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <section class="pt-20 pb-20 px-6 bg-gradient-to-b from-purple-50 to-white overflow-hidden border-b border-purple-300">
            <div class="container mx-auto">
                <div class="grid md:grid-cols-2 gap-12 items-center">

                    <!-- TEXT -->
                    <div class="space-y-6  md:ml-6 lg:ml-12 ">
                        <h1 class="text-3xl lg:text-4xl  font-semibold text-gray-900 leading-tight animate-fade">
                            Your Voice Deserves to be
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-500 to-red-600">
                                Heard & Rewarded
                            </span>
                        </h1>

                        <p class="text-base lg:text-xl text-gray-600 leading-relaxed animate-fade fade-delay-1">
                            Join Thaalam Radio's Creator Program! Share your podcast with our audience and get paid based on your reach.
                            No experience needed – just your unique story and passion.
                        </p>

                        <div class="flex flex-col items-center justify-start flex-row gap-4 pt-4 animate-fade fade-delay-2">
                            <a href="/podcast-creator-form"
                                class="border-2 border-red-500 bg-gradient-to-r from-red-500 to-red-600 text-white px-3 py-2 rounded-full text-base font-semibold hover:shadow-xl transition-all text-center">
                                Become a Creator
                            </a>

                            <a href="#how-it-works"
                                class="border-2 border-red-500 text-red-600 px-3 py-2 rounded-full text-base font-semibold hover:bg-red-50 transition-all text-center">
                                Learn More
                            </a>
                        </div>
                    </div>

                    <!-- IMAGE -->
                    <div class="animate-fade fade-delay-3">
                        <img
                            src="assets/img/radio/podcast-sofa.webp"
                            alt="Podcast recording microphone for Thaalam Podcast Creator"
                            class="w-full max-w-sm lg:max-w-lg mx-auto h-auto object-contain"
                            loading="lazy">
                    </div>
                </div>
            </div>
        </section>

        <section id="about" class="py-10 px-6 ">
            <div class="container mx-auto">

                <div class="flex flex-col-reverse md:flex-row gap-12 items-center">

                    <!-- IMAGE (first on desktop) -->
                    <div class=" flex justify-center md:w-1/2">
                        <img
                            src="assets/img/radio/radio-mic.webp"
                            alt="Podcast recording microphone for Thaalam Podcast Creator"
                            class="w-full max-w-sm md:max-w-md lg:max-w-lg rounded-xl shadow-lg object-contain"
                            loading="lazy">
                    </div>

                    <!-- CONTENT (first on mobile) -->
                    <div class=" space-y-6 md:w-1/2">
                        <span class="text-red-500 font-semibold text-sm uppercase tracking-wider">
                            About Thaalam Podcast
                        </span>
                        <h2 class="text-3xl lg:text-4xl font-bold text-gray-800">
                            Expanding Our Voice with Yours
                        </h2>
                        <p class="text-base lg:text-lg text-gray-600 leading-relaxed">
                            For years, our talented RJs have been creating engaging podcasts that our community loves.
                            Now, we're opening our platform to YOU – our listeners!
                        </p>
                        <p class="text-base lg:text-lg text-gray-600 leading-relaxed">
                            We believe everyone has a story worth sharing. Whether you're passionate about music,
                            technology, culture, storytelling, or any topic that moves you,
                            Thaalam Radio wants to amplify your voice.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="how-it-works" class="py-20 px-6 bg-slate-50">
            <div class="container mx-auto">
                <div class="text-center mb-16">
                    <span class="text-red-500 font-semibold text-base uppercase tracking-wider">Simple Process</span>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mt-3 mb-3">How It Works</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">From creation to earnings – your journey on Thaalam Radio</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold shadow-lg">1</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Create Your Podcast</h3>
                        <p class="text-gray-600">Record your podcast on any topic you're passionate about. Use your phone or any recording device.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold shadow-lg">2</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Submit for Review</h3>
                        <p class="text-gray-600">Upload your podcast through our application. Our team reviews it within 48 hours.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold shadow-lg">3</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Get Published</h3>
                        <p class="text-gray-600">Once approved, we publish your podcast on our platform and promote it to our audience.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-lg text-center relative">
                        <div class="w-16 h-16 bg-gradient-to-br from-red-500 to-red-600 rounded-full flex items-center justify-center mx-auto mb-6 text-white text-2xl font-bold shadow-lg">4</div>
                        <h3 class="text-xl font-bold text-gray-900 mb-3">Earn Money</h3>
                        <p class="text-gray-600">Get paid monthly based on your podcast's reach, listens, and engagement metrics.</p>
                    </div>
                </div>

            </div>
        </section>

        <section id="looking-for" class="py-20 px-6 bg-gradient-to-b from-white to-purple-50">
            <div class="container mx-auto">
                <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                    <div class="grid lg:grid-cols-2">
                        <div class="p-10 space-y-6">
                            <h3 class="text-2xl font-bold text-gray-900">What We're Looking For</h3>
                            <ul class="space-y-4">
                                <li class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-red-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold text-gray-900">Original Content</div>
                                        <div class="text-gray-600">Share your unique perspective and stories</div>
                                    </div>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-red-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold text-gray-900">Clear Audio Quality</div>
                                        <div class="text-gray-600">Good sound quality (professional equipment not required)</div>
                                    </div>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-red-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold text-gray-900">Engaging Topics</div>
                                        <div class="text-gray-600">Stories, interviews, education, entertainment, or inspiration</div>
                                    </div>
                                </li>
                                <li class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-red-600 mt-1 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                    <div>
                                        <div class="font-semibold text-gray-900">Length: 10-45 minutes</div>
                                        <div class="text-gray-600">Perfect duration for listener engagement</div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="relative h-full min-h-96">
                            <img src="assets/img/radio/radio-room.webp" alt="Podcast recording microphone for Thaalam Podcast Creator"
                                class="absolute inset-0 w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="earnings" class="relative py-16 px-6 bg-gradient-to-b from-purple-50 to-white">
            <div class="max-w-4xl mx-auto">

                <div class=" overflow-hidden rounded-3xl shadow-2xl bg-gradient-to-br from-red-500 via-red-600 via-red-700 to-red-800 p-10 md:p-14 text-white">
                    <!-- CONTENT -->
                    <div class="relative z-10">

                        <h2 class="text-2xl md:text-3xl text-white font-extrabold mb-4">
                            Ready to Get Started?
                        </h2>

                        <p class="text-red-100 mb-10 text-lg md:text-xl max-w-2xl">
                            Submit your podcast today and join our growing community of creators.
                            Turn your voice into impact — and income.
                        </p>

                        <!-- FEATURES -->
                        <div class="grid md:grid-cols-2 gap-6 mb-12">
                            <div class="flex items-start gap-4">
                                <span class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-base md:text-lg">Quick 48-hour review process</p>
                            </div>

                            <div class="flex items-start gap-4">
                                <span class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-base md:text-lg">No upfront costs or hidden fees</p>
                            </div>

                            <div class="flex items-start gap-4">
                                <span class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-base md:text-lg">You keep 100% creative rights</p>
                            </div>

                            <div class="flex items-start gap-4">
                                <span class="flex-shrink-0 mt-1">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <p class="text-base md:text-lg">Dedicated creator support</p>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="flex justify-center md:justify-start">
                            <a
                                href="/podcast-creator-form"
                                class="inline-flex items-center gap-3 bg-white text-red-600 px-4 py-3 rounded-full text-base  md:text-lg font-bold shadow-lg hover:shadow-2xl hover:scale-105 transition-all">
                                Become a Podcast Creator
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </section>


        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>
</body>

</html>
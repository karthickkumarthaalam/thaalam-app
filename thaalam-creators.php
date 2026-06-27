<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $page_title = "Thaalam Podcast Creator - Create and Share your Podcasts Easily";
    $page_description = "Thaalam Podcast Creator enables you to create and share your podcasts effortlessly with our tools.";
    $page_url = "https://www.thaalam.ch/thaalam-creators";
    $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
    include 'php/meta.php'; ?>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/thaalam-creators.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = "podcast-creator"; ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>
    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper creator-page">
        <?php include 'php/header2.php'; ?>

        <main>
            <section class="creator-hero" aria-labelledby="creator-title">
                <div class="creator-glow creator-glow--one" aria-hidden="true"></div>
                <div class="creator-glow creator-glow--two" aria-hidden="true"></div>
                <div class="creator-grid" aria-hidden="true"></div>

                <div class="creator-container creator-hero__grid">
                    <div class="creator-hero__content">
                        <div class="creator-eyebrow creator-hero__eyebrow">
                            <span class="creator-eyebrow__dot"></span>
                            Thaalam Creator Program
                        </div>

                        <h1 id="creator-title">
                            Your story has a
                            <span class="creator-gradient-text">frequency.</span>
                            Let the world tune in.
                        </h1>

                        <p class="creator-hero__copy">
                            Create the podcast only you can make. Thaalam helps you publish, reach a global
                            Tamil audience, and earn as your community grows.
                        </p>

                        <div class="creator-actions">
                            <a href="/podcast-creator-form" class="creator-button creator-button--primary">
                                Start creating
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M5 12h14M13 6l6 6-6 6"></path>
                                </svg>
                            </a>
                            <a href="#how-it-works" class="creator-button creator-button--ghost">
                                <span class="creator-play" aria-hidden="true">
                                    <svg viewBox="0 0 24 24">
                                        <path d="m9 7 8 5-8 5V7Z"></path>
                                    </svg>
                                </span>
                                See how it works
                            </a>
                        </div>

                        <div class="creator-trust">
                            <div class="creator-avatars" aria-hidden="true">
                                <span>RJ</span><span>ST</span><span>YOU</span>
                            </div>
                            <div>
                                <div class="creator-stars" aria-label="Five stars">★★★★★</div>
                                <p>Built for original voices</p>
                            </div>
                        </div>
                    </div>

                    <div class="creator-hero__visual" data-parallax-area aria-label="Podcast creator studio illustration">
                        <div class="creator-orbit creator-orbit--outer" aria-hidden="true"></div>
                        <div class="creator-orbit creator-orbit--inner" aria-hidden="true"></div>

                        <div class="creator-studio-card" data-parallax-item>
                            <div class="creator-studio-card__top">
                                <span class="creator-live"><i></i> Recording</span>
                                <span class="creator-time">12:48</span>
                            </div>
                            <img src="assets/img/radio/podcast-sofa.webp"
                                alt="A comfortable podcast recording setup"
                                width="640" height="520">
                            <div class="creator-waveform" aria-hidden="true">
                                <span></span><span></span><span></span><span></span><span></span>
                                <span></span><span></span><span></span><span></span><span></span>
                                <span></span><span></span><span></span><span></span><span></span>
                                <span></span><span></span><span></span><span></span><span></span>
                                <span></span><span></span><span></span><span></span>
                            </div>
                        </div>

                        <div class="creator-float-card creator-float-card--reach" data-float-depth="1">
                            <span class="creator-float-icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M4 19V9m6 10V5m6 14v-7m4 7H2"></path>
                                </svg>
                            </span>
                            <div><strong>Grow your reach</strong><small>One story at a time</small></div>
                        </div>

                        <div class="creator-float-card creator-float-card--rights" data-float-depth="2">
                            <span class="creator-float-icon creator-float-icon--warm">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 21s8-4.4 8-11V5l-8-3-8 3v5c0 6.6 8 11 8 11Z"></path>
                                    <path d="m9 12 2 2 4-4"></path>
                                </svg>
                            </span>
                            <div><strong>100% yours</strong><small>Keep your creative rights</small></div>
                        </div>
                    </div>
                </div>

                <a class="creator-scroll-cue" href="#about" aria-label="Scroll to learn more">
                    <span></span> Explore
                </a>
            </section>

            <section id="about" class="creator-section creator-about">
                <div class="creator-container creator-about__grid">
                    <div class="creator-about__visual creator-reveal">
                        <div class="creator-image-frame">
                            <img src="assets/img/radio/radio-mic.webp"
                                alt="Microphone ready to record a Thaalam podcast"
                                loading="lazy" width="640" height="640">
                            <div class="creator-image-frame__badge">
                                <span class="creator-pulse-icon">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="M12 2a4 4 0 0 0-4 4v6a4 4 0 0 0 8 0V6a4 4 0 0 0-4-4Z"></path>
                                        <path d="M19 10v2a7 7 0 0 1-14 0v-2M12 19v3M8 22h8"></path>
                                    </svg>
                                </span>
                                <span><strong>Your voice.</strong><small>Your platform.</small></span>
                            </div>
                        </div>
                    </div>

                    <div class="creator-about__content creator-reveal">
                        <div class="creator-kicker">More than a microphone</div>
                        <h2>We turn fresh voices into <span>shared experiences.</span></h2>
                        <p>
                            For years, Thaalam's RJs have made podcasts our community loves. Now the studio
                            door is open to you—our listeners, storytellers, and next generation of creators.
                        </p>
                        <p>
                            Music, technology, culture, interviews or a story no one else has told yet:
                            bring the passion and we will help amplify it.
                        </p>

                        <div class="creator-mini-stats">
                            <div><strong>48h</strong><span>Review window</span></div>
                            <div><strong>10–45</strong><span>Ideal minutes</span></div>
                            <div><strong>0</strong><span>Upfront cost</span></div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="how-it-works" class="creator-section creator-process">
                <div class="creator-process__halo" aria-hidden="true"></div>
                <div class="creator-container">
                    <div class="creator-heading creator-reveal">
                        <div class="creator-kicker">Simple by design</div>
                        <h2>From first take to <span>first listener.</span></h2>
                        <p>Four clear steps. No complicated production maze.</p>
                    </div>

                    <div class="creator-process__track">
                        <div class="creator-process__line" aria-hidden="true"><span></span></div>

                        <article class="creator-step creator-reveal">
                            <div class="creator-step__number">01</div>
                            <div class="creator-step__icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2a4 4 0 0 0-4 4v6a4 4 0 0 0 8 0V6a4 4 0 0 0-4-4Z"></path>
                                    <path d="M19 10v2a7 7 0 0 1-14 0v-2M12 19v3M8 22h8"></path>
                                </svg>
                            </div>
                            <h3>Create</h3>
                            <p>Record a story or topic you care about using the setup you already have.</p>
                        </article>

                        <article class="creator-step creator-reveal">
                            <div class="creator-step__number">02</div>
                            <div class="creator-step__icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 16V4m0 0L7 9m5-5 5 5"></path>
                                    <path d="M20 15v4a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2v-4"></path>
                                </svg>
                            </div>
                            <h3>Submit</h3>
                            <p>Send your episode through our creator application for a quick review.</p>
                        </article>

                        <article class="creator-step creator-reveal">
                            <div class="creator-step__number">03</div>
                            <div class="creator-step__icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8 5v14l11-7L8 5Z"></path>
                                    <circle cx="12" cy="12" r="10"></circle>
                                </svg>
                            </div>
                            <h3>Go live</h3>
                            <p>Once approved, Thaalam publishes and shares it with our growing audience.</p>
                        </article>

                        <article class="creator-step creator-reveal">
                            <div class="creator-step__number">04</div>
                            <div class="creator-step__icon">
                                <svg viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                                </svg>
                            </div>
                            <h3>Grow & earn</h3>
                            <p>Build an audience and earn monthly based on reach and engagement.</p>
                        </article>
                    </div>
                </div>
            </section>

            <section id="looking-for" class="creator-section creator-fit">
                <div class="creator-container">
                    <div class="creator-fit__card creator-reveal">
                        <div class="creator-fit__content">
                            <div class="creator-kicker creator-kicker--light">Your show, your signature</div>
                            <h2>What makes a great <span>Thaalam podcast?</span></h2>
                            <p class="creator-fit__intro">No expensive studio required. The things that matter most cannot be bought.</p>

                            <div class="creator-checks">
                                <div class="creator-check">
                                    <span><svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="m5 12 4 4L19 6"></path>
                                        </svg></span>
                                    <div><strong>Original perspective</strong><small>A voice and story that feel unmistakably yours.</small></div>
                                </div>
                                <div class="creator-check">
                                    <span><svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="m5 12 4 4L19 6"></path>
                                        </svg></span>
                                    <div><strong>Clear, listenable audio</strong><small>Your phone and a quiet room can be enough.</small></div>
                                </div>
                                <div class="creator-check">
                                    <span><svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="m5 12 4 4L19 6"></path>
                                        </svg></span>
                                    <div><strong>A topic with energy</strong><small>Teach, entertain, interview, or inspire.</small></div>
                                </div>
                                <div class="creator-check">
                                    <span><svg viewBox="0 0 24 24" aria-hidden="true">
                                            <path d="m5 12 4 4L19 6"></path>
                                        </svg></span>
                                    <div><strong>A focused 10–45 minutes</strong><small>Long enough to matter, tight enough to replay.</small></div>
                                </div>
                            </div>
                        </div>

                        <div class="creator-fit__image">
                            <img src="assets/img/radio/radio-room.webp"
                                alt="Thaalam Radio podcast recording room"
                                loading="lazy" width="760" height="900">
                            <div class="creator-now-playing">
                                <span class="creator-now-playing__play" aria-hidden="true">
                                    <svg viewBox="0 0 24 24" aria-hidden="true">
                                        <path d="m9 7 8 5-8 5V7Z"></path>
                                    </svg>
                                </span>
                                <div>
                                    <span>Now recording</span>
                                    <strong>Your next big idea</strong>
                                </div>
                                <div class="creator-mini-wave" aria-hidden="true">
                                    <i></i><i></i><i></i><i></i><i></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="earnings" class="creator-section creator-cta">
                <div class="creator-container">
                    <div class="creator-cta__card creator-reveal">
                        <div class="creator-cta__rings" aria-hidden="true"></div>
                        <div class="creator-cta__wave" aria-hidden="true">
                            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
                            <i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i><i></i>
                        </div>
                        <div class="creator-kicker creator-kicker--light">The mic is ready</div>
                        <h2>Make something worth<br><span>listening to.</span></h2>
                        <p>Join Thaalam's creator community. Your first episode could be the one someone needs today.</p>

                        <div class="creator-cta__benefits">
                            <span><i>✓</i> 48-hour review</span>
                            <span><i>✓</i> No hidden fees</span>
                            <span><i>✓</i> You keep your rights</span>
                        </div>

                        <a href="/podcast-creator-form" class="creator-button creator-button--white">
                            Become a podcast creator
                            <svg viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M5 12h14M13 6l6 6-6 6"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </section>
        </main>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/config-js.php'; ?>
    <?php include 'php/scripts.php'; ?>
    <script src="assets/js/module/thaalam-creators.js" defer></script>
</body>

</html>
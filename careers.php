<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Careers - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/careers.css">
</head>

<body class="custom-cursor">
    <?php $pagename = 'careers'; ?>

    <?php include 'php/preloader.php'; ?>

    <?php include 'php/toast.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>

                <section class="career-sec" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
                    <div class="career-form-container container">
                        <h2 class="form-title"><i class="fas fa-microphone-alt"></i> Join Our Team</h2>
                        <p class="form-subtitle">Opportunity to work at Switzerland's first official Tamil radio station
                        </p>

                        <form id="careerForm" class="modern-form">
                            <!-- Personal Information Section -->
                            <div class="form-section">
                                <h3><i class="fas fa-user-tie"></i> Personal Information</h3>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="name"><i class="fas fa-signature"></i> Name *</label>
                                        <input type="text" id="name" name="name" required placeholder="Your full name">
                                        <div class="validation-icon"><i class="fas fa-check-circle"></i></div>
                                    </div>

                                    <div class="form-group half-width">
                                        <label><i class="fas fa-venus-mars"></i> Gender *</label>
                                        <select name="gender" required>
                                            <option value="" disabled selected>Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="other">Other</option>
                                            <option value="prefer-not-to-say">Prefer not to say</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Contact Information Section -->
                            <div class="form-section">
                                <h3><i class="fas fa-address-book"></i> Contact Information</h3>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label><i class="fas fa-globe-europe"></i> Country *</label>
                                        <select id="country" name="country" required>
                                            <option value="" disabled selected>Select Country</option>
                                            <option value="Switzerland">Switzerland</option>
                                        </select>
                                    </div>

                                    <div class="form-group half-width" id="stateGroup">
                                        <label><i class="fas fa-map-marked-alt"></i> State *</label>
                                        <select id="state" name="state" required disabled>
                                            <option value="" disabled selected>Select State</option>
                                            <!-- Will be populated by JavaScript -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group half-width" id="cityGroup">
                                        <label><i class="fas fa-city"></i> City *</label>
                                        <select id="city" name="city" required disabled>
                                            <option value="" disabled selected>Select City</option>
                                            <!-- Will be populated by JavaScript -->
                                        </select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="mobile"><i class="fas fa-mobile-alt"></i> Mobile *</label>
                                        <input type="tel" id="mobile" name="mobile" required
                                            placeholder="+41 79 123 45 67">
                                        <div class="validation-icon"><i class="fas fa-check-circle"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label for="email"><i class="fas fa-envelope"></i> Email *</label>
                                        <input type="email" id="email" name="email" required
                                            placeholder="your@email.com">
                                        <div class="validation-icon"><i class="fas fa-check-circle"></i></div>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="current_job"><i class="fas fa-user-md"></i> What is your current job?
                                            *</label>
                                        <input type="text" id="current_job" name="current_job" required
                                            placeholder="Your current position">
                                        <div class="validation-icon"><i class="fas fa-check-circle"></i></div>
                                    </div>
                                </div>
                            </div>

                            <!-- Professional Information Section -->
                            <div class="form-section">
                                <h3><i class="fas fa-briefcase"></i> Professional Information</h3>

                                <div class="form-row">
                                    <div class="form-group half-width">
                                        <label><i class="fas fa-star"></i> Are you already experienced? *</label>
                                        <select name="is_experienced" required>
                                            <option value="" disabled selected>Select option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label><i class="fas fa-tasks"></i> Job Type *</label>
                                        <select name="job_type" id="jobtype" required>
                                            <option value="" disabled selected>Select your job Type</option>
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

                                <div class="form-group">
                                    <label for="experience"><i class="fas fa-history"></i> Experience</label>
                                    <textarea id="experience" name="experience"
                                        placeholder="Describe your relevant experience"></textarea>
                                </div>
                            </div>

                            <!-- Documents Section (Full width) -->
                            <div class="form-section">
                                <h3><i class="fas fa-file-alt"></i> Documents</h3>

                                <div class="form-group file-upload">
                                    <label for="resume"><i class="fas fa-file-pdf"></i> Resume Attachment *</label>
                                    <input type="file" id="resume" name="resume" accept=".pdf" required>
                                    <div class="file-info">(PDF file - 5 MB Only Allowed)</div>
                                    <div class="file-preview"></div>
                                </div>
                            </div>

                            <!-- Motivation Section (Full width) -->
                            <div class="form-section">
                                <h3><i class="fas fa-question-circle"></i> Motivation</h3>

                                <div class="form-group">
                                    <label for="interest"><i class="fas fa-heart"></i> Why you are interested in media
                                        jobs? *</label>
                                    <textarea id="interest" name="application_reason" required
                                        placeholder="Tell us why you want to join our team..."></textarea>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <button type="submit" class="submit-btn" id="submit-btn">
                                    <i class="fas fa-paper-plane"></i> Submit Application
                                </button>
                                <button type="reset" class="cancel-btn">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
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

    <script src="assets/js/module/careers.js"></script>
</body>

</html>
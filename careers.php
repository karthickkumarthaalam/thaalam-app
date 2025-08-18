<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Careers - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'careers'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">

            <div>
                <?php include 'php/header.php'; ?>

                <section class="career-sec" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.35), rgba(255, 255, 255, 0.35)), 
        url('assets/img/home/pattern/banner-4.png');background-size: contain;">
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

                                    <div class="form-group half-width" id="stateGroup" style="display:none;">
                                        <label><i class="fas fa-map-marked-alt"></i> State *</label>
                                        <select id="state" name="state" required disabled>
                                            <option value="" disabled selected>Select State</option>
                                            <!-- Will be populated by JavaScript -->
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group half-width" id="cityGroup" style="display:none;">
                                        <label><i class="fas fa-city"></i> City *</label>
                                        <select id="city" name="city" required disabled>
                                            <option value="" disabled selected>Select City</option>
                                            <!-- Will be populated by JavaScript -->
                                        </select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label for="mobile"><i class="fas fa-mobile-alt"></i> Mobile *</label>
                                        <input type="tel" id="mobile" name="mobile" required
                                            placeholder="+41 79 123 45 67"
                                            pattern="(\+41|0)\s?\d{2}\s?\d{3}\s?\d{2}\s?\d{2}">
                                        <div class="validation-icon"><i class="fas fa-check-circle"></i></div>
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
                                        <label for="currentJob"><i class="fas fa-user-md"></i> What is your current job?
                                            *</label>
                                        <input type="text" id="currentJob" name="currentJob" required
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
                                        <select name="experienced" required>
                                            <option value="" disabled selected>Select option</option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group half-width">
                                        <label><i class="fas fa-tasks"></i> Job Type *</label>
                                        <select name="jobType" id="jobtype" required>
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
                                    <textarea id="interest" name="interest" required
                                        placeholder="Tell us why you want to join our team..."></textarea>
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="form-actions">
                                <button type="submit" class="submit-btn">
                                    <i class="fas fa-paper-plane"></i> Submit Application
                                </button>
                                <button type="reset" class="cancel-btn">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </section>

                <style>
                    .career-sec {
                        padding: 20px;
                    }

                    .form-title {
                        color: #d50000;
                        margin-bottom: 5px;
                        font-size: 28px;
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                    }

                    .form-subtitle {
                        color: #555;
                        margin-bottom: 30px;
                        font-size: 16px;
                        text-align: center;
                    }

                    .modern-form {
                        display: flex;
                        flex-direction: column;
                        gap: 25px;
                    }

                    .form-section {
                        background: #f9f9f9;
                        padding: 15px 25px;
                        border-radius: 10px;
                        border-left: 4px solid #d50000;
                        transition: all 0.3s ease;
                    }

                    .form-section:hover {
                        background: #f5f5f5;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
                    }

                    .form-section h3 {
                        margin-top: 0;
                        margin-bottom: 10px;
                        color: #333;
                        display: flex;
                        align-items: center;
                        gap: 10px;
                        font-size: 18px;
                    }

                    .form-row {
                        display: flex;
                        gap: 20px;
                        margin-bottom: 10px;
                    }

                    .form-group {
                        position: relative;
                        flex: 1;
                    }

                    .half-width {
                        width: 50%;
                    }

                    .form-group label {
                        display: block;
                        margin-bottom: 8px;
                        color: #444;
                        font-weight: 500;
                        display: flex;
                        align-items: center;
                        gap: 8px;
                    }

                    .form-group input,
                    .form-group select,
                    .form-group textarea {
                        width: 100%;
                        padding: 12px 15px;
                        border: 1px solid #ddd;
                        border-radius: 8px;
                        font-size: 15px;
                        transition: all 0.3s ease;
                        background-color: #fff;
                    }

                    .form-group input:focus,
                    .form-group select:focus,
                    .form-group textarea:focus {
                        border-color: #d50000;
                        box-shadow: 0 0 0 3px rgba(213, 0, 0, 0.1);
                        outline: none;
                    }

                    .form-group textarea {
                        min-height: 100px;
                        resize: vertical;
                    }

                    .validation-icon {
                        position: absolute;
                        right: 15px;
                        top: 38px;
                        color: #4CAF50;
                        opacity: 0;
                        transition: opacity 0.3s;
                    }

                    .form-group input:valid+.validation-icon,
                    .form-group input:focus:valid+.validation-icon {
                        opacity: 1;
                    }

                    .file-upload {
                        position: relative;
                    }

                    .file-upload input[type="file"] {
                        position: absolute;
                        width: 1px;
                        height: 1px;
                        padding: 0;
                        margin: -1px;
                        overflow: hidden;
                        clip: rect(0, 0, 0, 0);
                        border: 0;
                    }

                    .file-upload label {
                        display: block;
                        cursor: pointer;
                        padding: 12px 15px;
                        background: #f0f0f0;
                        border: 1px dashed #ccc;
                        border-radius: 8px;
                        text-align: center;
                        transition: all 0.3s;
                    }

                    .file-upload label:hover {
                        background: #e9e9e9;
                        border-color: #d50000;
                    }

                    .file-info {
                        font-size: 12px;
                        color: #777;
                        margin-top: 5px;
                    }

                    .file-preview {
                        margin-top: 10px;
                        font-size: 14px;
                        color: #333;
                    }

                    .form-actions {
                        display: flex;
                        justify-content: flex-end;
                        gap: 15px;
                    }

                    .submit-btn,
                    .cancel-btn {
                        padding: 12px 25px;
                        border-radius: 8px;
                        font-weight: 600;
                        cursor: pointer;
                        transition: all 0.3s;
                        display: flex;
                        align-items: center;
                        gap: 8px;
                    }

                    .submit-btn {
                        background-color: #d50000;
                        color: white;
                        border: none;
                    }

                    .submit-btn:hover {
                        background-color: #b71c1c;
                        transform: translateY(-2px);
                        box-shadow: 0 4px 8px rgba(213, 0, 0, 0.2);
                    }

                    .cancel-btn {
                        background-color: #f5f5f5;
                        color: #555;
                        border: 1px solid #ddd;
                    }

                    .cancel-btn:hover {
                        background-color: #e0e0e0;
                        color: #333;
                    }

                    /* Responsive adjustments */
                    @media (max-width: 768px) {
                        .career-form-container {
                            padding: 20px;
                        }

                        .form-row {
                            flex-direction: column;
                            gap: 15px;
                        }

                        .half-width {
                            width: 100%;
                        }

                        .form-actions {
                            flex-direction: column;
                        }

                        .submit-btn,
                        .cancel-btn {
                            width: 100%;
                        }
                    }
                </style>


                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>

    <script>
        // Swiss cantons and cities data
        const swissData = {
            cantons: [
                "Zürich", "Bern", "Luzern", "Uri", "Schwyz", "Obwalden", "Nidwalden",
                "Glarus", "Zug", "Fribourg", "Solothurn", "Basel-Stadt", "Basel-Landschaft",
                "Schaffhausen", "Appenzell Ausserrhoden", "Appenzell Innerrhoden",
                "St. Gallen", "Graubünden", "Aargau", "Thurgau", "Ticino", "Vaud",
                "Valais", "Neuchâtel", "Genève", "Jura"
            ],
            citiesByCanton: {
                "Zürich": ["Zürich", "Winterthur", "Uster", "Dübendorf", "Dietikon"],
                "Bern": ["Bern", "Biel/Bienne", "Thun", "Köniz", "Ostermundigen"],
                "Luzern": ["Luzern", "Emmen", "Kriens", "Horw", "Sursee"],
                "Genève": ["Genève", "Vernier", "Lancy", "Meyrin", "Carouge"],
                "Vaud": ["Lausanne", "Yverdon-les-Bains", "Montreux", "Renens", "Nyon"],
                // Add more cantons and cities as needed
            }
        };

        document.addEventListener('DOMContentLoaded', function() {
            const countrySelect = document.getElementById('country');
            const stateGroup = document.getElementById('stateGroup');
            const stateSelect = document.getElementById('state');
            const cityGroup = document.getElementById('cityGroup');
            const citySelect = document.getElementById('city');

            // Country change handler
            countrySelect.addEventListener('change', function() {
                if (this.value === 'Switzerland') {
                    stateGroup.style.display = 'block';
                    stateSelect.disabled = false;

                    // Populate cantons
                    stateSelect.innerHTML = '<option value="" disabled selected>Select Canton</option>';
                    swissData.cantons.forEach(canton => {
                        stateSelect.innerHTML += `<option value="${canton}">${canton}</option>`;
                    });
                } else {
                    stateGroup.style.display = 'none';
                    cityGroup.style.display = 'none';
                    stateSelect.disabled = true;
                    citySelect.disabled = true;
                }
            });

            // State (Canton) change handler
            stateSelect.addEventListener('change', function() {
                if (this.value) {
                    cityGroup.style.display = 'block';
                    citySelect.disabled = false;

                    // Populate cities for selected canton
                    citySelect.innerHTML = '<option value="" disabled selected>Select City</option>';
                    const cities = swissData.citiesByCanton[this.value] || [];
                    cities.forEach(city => {
                        citySelect.innerHTML += `<option value="${city}">${city}</option>`;
                    });
                } else {
                    cityGroup.style.display = 'none';
                    citySelect.disabled = true;
                }
            });

            // File upload preview
            const resumeInput = document.getElementById('resume');
            const filePreview = document.querySelector('.file-preview');

            resumeInput.addEventListener('change', function() {
                if (this.files && this.files[0]) {
                    if (this.files[0].size > 5 * 1024 * 1024) {
                        alert('File size exceeds 5 MB limit');
                        this.value = '';
                        filePreview.textContent = '';
                        return;
                    }

                    if (this.files[0].type !== 'application/pdf') {
                        alert('Only PDF files are allowed');
                        this.value = '';
                        filePreview.textContent = '';
                        return;
                    }

                    filePreview.textContent = `Selected: ${this.files[0].name} (${(this.files[0].size / 1024 / 1024).toFixed(2)} MB)`;
                }
            });

            // Form submission
            document.getElementById('careerForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // Add your form submission logic here
                alert('Form submitted successfully!');
                this.reset();
                filePreview.textContent = '';
            });
        });
    </script>

</body>

</html>
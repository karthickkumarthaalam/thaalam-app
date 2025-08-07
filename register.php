<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>

</head>

<body class="custom-cursor">
    <?php $pagename = 'register'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div class="col-lg-20">
                <?php include 'php/side-nav.php'; ?>
            </div>

            <div class="col-lg-80">
                <?php include 'php/header.php'; ?>




                <section class="signup-section" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-2.png');background-size: contain;">
                    <div class="signup-container">
                        <div class="signup-header">
                            <div class="logo-placeholder"></div>
                            <h2>Register Your Account</h2>
                            <p class="subtext">Join our platform to get started</p>
                        </div>

                        <form id="signupForm" class="signup-form">
                            <div class="form-grid">
                                <!-- Name and Gender Row -->
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <div class="input-container">
                                        <i class="fas fa-user"></i>
                                        <input type="text" id="name" name="name" placeholder="John Doe" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Gender</label>
                                    <div class="radio-group">
                                        <label class="radio-option">
                                            <input type="radio" name="gender" value="male" required>
                                            <span class="radio-custom"></span>
                                            <span class="radio-label">Male</span>
                                        </label>
                                        <label class="radio-option">
                                            <input type="radio" name="gender" value="female">
                                            <span class="radio-custom"></span>
                                            <span class="radio-label">Female</span>
                                        </label>
                                        <label class="radio-option">
                                            <input type="radio" name="gender" value="other">
                                            <span class="radio-custom"></span>
                                            <span class="radio-label">Other</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Address Row -->
                                <div class="form-group">
                                    <label for="address1">Address Line 1</label>
                                    <div class="input-container">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <input type="text" id="address1" name="address1" placeholder="Street address"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="address2">Address Line 2</label>
                                    <div class="input-container">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <input type="text" id="address2" name="address2"
                                            placeholder="Apt, suite, etc. (optional)">
                                    </div>
                                </div>

                                <!-- Location Row -->
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <div class="select-container">
                                        <i class="fas fa-globe"></i>
                                        <select id="country" name="country" required>
                                            <option value="">Select Country</option>
                                            <option value="switzerland">Switzerland</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="state">State/Region</label>
                                    <div class="select-container">
                                        <i class="fas fa-map"></i>
                                        <select id="state" name="state" required>
                                            <option value="">Select State</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- City and Mobile Row -->
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <div class="select-container">
                                        <i class="fas fa-city"></i>
                                        <select id="city" name="city" required>
                                            <option value="">Select City</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="mobile">Mobile Number</label>
                                    <div class="input-container">
                                        <i class="fas fa-phone rot-90"></i>
                                        <input type="tel" id="mobile" name="mobile" placeholder="+41 79 123 45 67"
                                            required>
                                    </div>
                                </div>

                                <!-- Email and Password Row -->
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <div class="input-container">
                                        <i class="fas fa-envelope"></i>
                                        <input type="email" id="email" name="email" placeholder="your@email.com"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <div class="input-container">
                                        <i class="fas fa-lock"></i>
                                        <input type="password" id="password" name="password"
                                            placeholder="At least 8 characters" required>
                                        <i class="fas fa-eye-slash password-toggle"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="form-footer">
                                <button type="submit" class="btn-primary">
                                    Create Account
                                    <i class="fas fa-arrow-right"></i>
                                </button>
                                <p class="login-link">Already have an account? <a href="login.php">Log in</a></p>
                            </div>
                        </form>
                    </div>
                </section>

                <style>
                    :root {
                        --primary: #D50000;
                        --primary-dark: #B71C1C;
                        --text: #222222;
                        --text-light: #666666;
                        --border: #E0E0E0;
                        --border-focus: #BDBDBD;
                        --background: #FAFAFA;
                        --error: #D50000;
                        --white: #FFFFFF;
                    }

                    .signup-section {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        min-height: 100vh;
                        background-color: var(--background);
                        padding: 2rem;
                    }

                    .signup-container {
                        background: var(--white);
                        border-radius: 12px;
                        box-shadow: 0 4px 24px rgba(0, 0, 0, 0.08);
                        width: 100%;
                        max-width: 880px;
                        overflow: hidden;
                        position: relative;
                    }

                    .signup-container::before {
                        content: '';
                        position: absolute;
                        top: 0;
                        left: 0;
                        width: 100%;
                        height: 4px;
                        background: linear-gradient(90deg, var(--primary) 0%, var(--primary-dark) 100%);
                    }

                    .signup-header {
                        padding: 2.5rem 2.5rem 1.5rem;
                        text-align: center;
                    }

                    .signup-header h2 {
                        font-size: 1.75rem;
                        font-weight: 600;
                        margin-bottom: 0.5rem;
                        color: var(--text);
                    }

                    .subtext {
                        color: var(--text-light);
                        font-size: 0.95rem;
                    }

                    .signup-form {
                        padding: 0 2.5rem 2.5rem;
                    }

                    .form-grid {
                        display: grid;
                        grid-template-columns: repeat(2, 1fr);
                        gap: 0 1.5rem;
                        margin-bottom: 1.5rem;
                    }

                    .form-group {
                        margin-bottom: 0.5rem;
                    }

                    .form-group.full-width {
                        grid-column: span 2;
                    }

                    .rot-90 {
                        transform: rotate(90deg);
                    }

                    label {
                        display: block;
                        margin-bottom: 0.5rem;
                        font-size: 0.875rem;
                        font-weight: 500;
                        color: var(--text);
                    }

                    .input-container,
                    .select-container {
                        position: relative;
                        display: flex;
                        align-items: center;
                    }

                    .input-container i,
                    .select-container i {
                        position: absolute;
                        left: 1rem;
                        color: var(--text-light);
                        font-size: 1rem;
                    }

                    input,
                    select {
                        width: 100%;
                        padding: 0.5rem 1rem 0.5rem 2.5rem;
                        font-size: 0.9375rem;
                        border: 1px solid var(--border);
                        border-radius: 8px;
                        background-color: var(--white);
                        transition: all 0.2s ease;
                        appearance: none;
                        -webkit-appearance: none;
                        color: #666666;
                    }

                    /* select {
                        background-image: none;
                        padding-right: 1rem;
                        cursor: pointer;
                    } */

                    input:focus {
                        border-color: var(--primary);
                        box-shadow: 0 0 0 2px rgba(213, 0, 0, 0.1);
                        outline: none;
                    }

                    input:hover {
                        border-color: var(--border-focus);
                    }

                    .password-toggle {
                        position: absolute;
                        right: 1rem;
                        cursor: pointer;
                        left: unset !important;
                        color: var(--text-light);
                        transition: color 0.2s ease;
                    }

                    .password-toggle:hover {
                        color: var(--primary);
                    }

                    .radio-group {
                        display: flex;
                        gap: 1.5rem;
                        margin-top: 0.5rem;
                    }

                    .radio-option {
                        display: flex;
                        align-items: center;
                        gap: 0.5rem;
                        cursor: pointer;
                    }

                    .radio-custom {
                        width: 1.125rem;
                        height: 1.125rem;
                        border: 1.5px solid var(--border);
                        border-radius: 50%;
                        display: inline-block;
                        position: relative;
                        transition: all 0.2s ease;
                    }

                    .radio-option input {
                        position: absolute;
                        opacity: 0;
                        cursor: pointer;
                    }

                    .radio-option input:checked~.radio-custom {
                        border-color: var(--primary);
                    }

                    .radio-option input:checked~.radio-custom::after {
                        content: '';
                        position: absolute;
                        top: 2px;
                        left: 2px;
                        width: 0.75rem;
                        height: 0.75rem;
                        border-radius: 50%;
                        background: var(--primary);
                    }

                    .radio-label {
                        font-size: 0.875rem;
                        color: var(--text);
                    }


                    .form-footer {
                        margin-top: 1.5rem;
                    }

                    .btn-primary {
                        background-color: var(--primary);
                        color: white;
                        border: none;
                        padding: 1rem 1.5rem;
                        font-size: 0.9375rem;
                        font-weight: 500;
                        border-radius: 8px;
                        width: 100%;
                        cursor: pointer;
                        transition: all 0.2s ease;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        gap: 0.75rem;
                    }

                    .btn-primary:hover {
                        background-color: var(--primary-dark);
                        transform: translateY(-1px);
                    }

                    .btn-primary:active {
                        transform: translateY(0);
                    }

                    .login-link {
                        text-align: center;
                        margin-top: 1.5rem;
                        font-size: 0.875rem;
                        color: var(--text-light);
                    }

                    .login-link a {
                        color: var(--primary);
                        text-decoration: none;
                        font-weight: 500;
                        transition: color 0.2s ease;
                    }

                    .login-link a:hover {
                        color: var(--primary-dark);
                        text-decoration: underline;
                    }

                    /* Responsive adjustments */
                    @media (max-width: 768px) {
                        .signup-container {
                            padding: 1.5rem;
                        }

                        .signup-header {
                            padding: 1.5rem 1rem 1rem;
                        }

                        .signup-form {
                            padding: 0 1rem 1.5rem;
                        }

                        .form-grid {
                            grid-template-columns: 1fr;
                            gap: 1rem;
                        }

                        .form-group.full-width {
                            grid-column: span 1;
                        }

                        .radio-group {
                            flex-direction: column;
                            gap: 0.75rem;
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
        $(document).ready(function() {
            // Enhanced country-state-city data
            const countryData = {
                "switzerland": {
                    "Zurich": ["Zurich", "Winterthur", "Uster", "Dübendorf", "Dietikon"],
                    "Bern": ["Bern", "Thun", "Biel/Bienne", "Köniz", "Ostermundigen"],
                    "Vaud": ["Lausanne", "Yverdon-les-Bains", "Montreux", "Renens", "Nyon"],
                    "Geneva": ["Geneva", "Carouge", "Vernier", "Lancy", "Meyrin"],
                    "Valais": ["Sion", "Martigny", "Monthey", "Sierre", "Brig-Glis"]
                }
            };

            // Country change handler
            $('#country').on('change', function() {
                const country = $(this).val();
                const $state = $('#state');
                const $city = $('#city');

                $state.empty().append('<option value="">Select State</option>').prop('disabled', !country);
                $city.empty().append('<option value="">Select City</option>').prop('disabled', true);

                if (country && countryData[country]) {
                    $state.prop('disabled', false);
                    $.each(countryData[country], function(state) {
                        $state.append($('<option>').val(state).text(state));
                    });
                }
            });

            // State change handler
            $('#state').on('change', function() {
                const country = $('#country').val();
                const state = $(this).val();
                const $city = $('#city');

                $city.empty().append('<option value="">Select City</option>').prop('disabled', !state);

                if (country && state && countryData[country] && countryData[country][state]) {
                    $city.prop('disabled', false);
                    $.each(countryData[country][state], function(_, city) {
                        $city.append($('<option>').val(city).text(city));
                    });
                }
            });

            // Password toggle
            $('.password-toggle').on('click', function() {
                const $password = $('#password');
                const type = $password.attr('type') === 'password' ? 'text' : 'password';
                $password.attr('type', type);
                $(this).toggleClass('fa-eye fa-eye-slash');
            });

            // Form validation
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();
                let isValid = true;

                // Clear previous errors
                $('.error-message').text('');

                // Validate required fields
                $(this).find('[required]').each(function() {
                    const $field = $(this);
                    const $error = $field.closest('.form-group').find('.error-message');

                    if ($field.is('select') && $field.val() === '') {
                        $error.text('This field is required');
                        isValid = false;
                    } else if ($field.is(':radio') && !$('[name="' + $field.attr('name') + '"]:checked').length) {
                        $error.text('Please select a gender');
                        isValid = false;
                    } else if ($field.val().trim() === '') {
                        $error.text('This field is required');
                        isValid = false;
                    } else if ($field.attr('type') === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test($field.val())) {
                        $error.text('Please enter a valid email');
                        isValid = false;
                    } else if ($field.attr('id') === 'mobile' && !/^[+]?[0-9\s-]{10,15}$/.test($field.val())) {
                        $error.text('Please enter a valid mobile number');
                        isValid = false;
                    } else if ($field.attr('id') === 'password' && $field.val().length < 8) {
                        $error.text('Password must be at least 8 characters');
                        isValid = false;
                    }
                });

                if (isValid) {
                    // Form submission would go here
                    console.log('Form is valid, submitting...');
                    // this.submit();
                }
            });

            // Focus effects
            $('input, select').on({
                focus: function() {
                    $(this).css({
                        'border-color': 'var(--primary)',
                        'box-shadow': '0 0 0 2px rgba(213, 0, 0, 0.1)'
                    });
                },
                blur: function() {
                    $(this).css({
                        'border-color': 'var(--border)',
                        'box-shadow': 'none'
                    });
                }
            });
        });
    </script>


</body>

</html>
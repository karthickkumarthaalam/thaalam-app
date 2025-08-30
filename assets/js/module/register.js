$(document).ready(function () {
    let countryData = [];

    // Load countries from the JSON file
    $.getJSON("assets/json/countries.json", function (data) {
        countryData = data;

        const $country = $('#country');
        $country.append('<option value="">Select Country</option>');
        $.each(countryData, function (index, country) {
            $country.append(
                $('<option>').val(country.name).text(country.name)
            );
        });
    });

    // Country change handler
    $('#country').on('change', function () {
        const selectedCountryName = $(this).val();
        const selectedCountry = countryData.find(c => c.name === selectedCountryName);
        const $state = $('#state');
        const $city = $('#city');

        $state.empty().append('<option value="">Select State</option>').prop('disabled', !selectedCountry);
        $city.empty().append('<option value="">Select City</option>').prop('disabled', true);

        if (selectedCountry && selectedCountry.states) {
            $state.prop('disabled', false);
            $.each(selectedCountry.states, function (index, state) {
                $state.append(
                    $('<option>').val(state.name).text(state.name)
                );
            });
        }
    });

    // State change handler
    $('#state').on('change', function () {
        const selectedCountryName = $('#country').val();
        const selectedStateName = $(this).val();
        const selectedCountry = countryData.find(c => c.name === selectedCountryName);
        const $city = $('#city');

        $city.empty().append('<option value="">Select City</option>').prop('disabled', !selectedStateName);

        if (selectedCountry && selectedCountry.states) {
            const selectedState = selectedCountry.states.find(s => s.name === selectedStateName);
            if (selectedState && selectedState.cities) {
                $city.prop('disabled', false);
                $.each(selectedState.cities, function (index, city) {
                    $city.append(
                        $('<option>').val(city).text(city)
                    );
                });
            }
        }
    });

    // Password toggle
    $('.password-toggle').on('click', function () {
        const $password = $('#password');
        const type = $password.attr('type') === 'password' ? 'text' : 'password';
        $password.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

    // Form validation
    $('#signupForm').on('submit', function (e) {
        e.preventDefault();
        let isValid = true;

        $('.error-message').text('');

        $(this).find('[required]').each(function () {
            const $field = $(this);
            const $error = $field.closest('.form-group').find('.error-message');

            if ($field.is('select') && $field.val() === '') {
                $error.text('This field is required');
                isValid = false;
            } else if ($field.attr('id') === 'gender' && $field.val() === '') {
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
            const payload = {
                name: $('#name').val().trim(),
                gender: $('#gender').val(),
                country: $('#country').val(),
                state: $('#state').val(),
                city: $('#city').val(),
                email: $('#email').val().trim(),
                phone: $('#mobile').val().trim(),
                password: $('#password').val(),
                address1: $('#address1').val().trim(),
                address2: $('#address2').val().trim()
            };

            // Disable the submit button
            $('#submitBtn').prop('disabled', true).text('Submitting...');

            $.ajax({
                url: `${window.API_BASE_URL}/members/signup`,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payload),
                success: function (response) {
                    showToast(response.message || 'Signup successful!', "success");
                    localStorage.setItem("memberId", response.member.member_id);
                    localStorage.setItem("username", response.member.name);
                    localStorage.setItem("email", response.member.email);
                    $('#signupForm')[0].reset();
                    setTimeout(() => {
                        window.location.href = 'register-otp.php';
                    }, 1000);
                },
                error: function (xhr) {
                    const res = xhr.responseJSON;
                    showToast(res?.message || 'Signup failed. Please try again.', "warning");
                },
                complete: function () {
                    $('#submitBtn')
                        .prop('disabled', false)
                        .text('Create Account ')
                        .append($('<i>').addClass('fas fa-arrow-right'));
                }
            });
        }
    });

    // Focus effects
    $('input, select').on({
        focus: function () {
            $(this).css({
                'border-color': 'var(--primary)',
                'box-shadow': '0 0 0 2px rgba(213, 0, 0, 0.1)'
            });
        },
        blur: function () {
            $(this).css({
                'border-color': 'var(--border)',
                'box-shadow': 'none'
            });
        }
    });
});

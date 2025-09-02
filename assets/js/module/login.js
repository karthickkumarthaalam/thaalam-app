$(document).ready(function () {
    // Password toggle
    $('.password-toggle').on('click', function () {
        const $password = $('#password');
        const type = $password.attr('type') === 'password' ? 'text' : 'password';
        $password.attr('type', type);
        $(this).toggleClass('fa-eye fa-eye-slash');
    });

    // Form validation + jQuery AJAX login
    $('#loginForm').on('submit', function (e) {
        e.preventDefault();
        let isValid = true;

        $('.error-message').text('');

        const loginId = $('#loginId').val().trim();
        const password = $('#password').val();
        const $submitBtn = $('#submitBtn');

        // Validate login ID
        if (!loginId) {
            $('#loginId').nextAll('.error-message').first().text('Email or mobile number is required');
            isValid = false;
        } else if (!isValidEmail(loginId)) {
            if (!/^[+]?[0-9\s-]{10,15}$/.test(loginId)) {
                $('#loginId').nextAll('.error-message').first().text('Please enter a valid email or mobile number');
                isValid = false;
            }
        }

        // Validate password
        if (!password) {
            $('#password').nextAll('.error-message').first().text('Password is required');
            isValid = false;
        } else if (password.length < 6) {
            $('#password').nextAll('.error-message').first().text('Password must be at least 6 characters');
            isValid = false;
        }

        if (isValid) {
            const payload = { username: loginId, password };

            $submitBtn.prop('disabled', true).text('Logging in...');
            $.ajax({
                url: `${window.API_BASE_URL}/members/login`,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payload),
                success: function (response) {
                    localStorage.setItem("token", response.token);
                    localStorage.setItem("memberId", response.memberid);
                    localStorage.setItem("username", response.username);
                    showToast(response.message || "Login Successful!", "success");
                    $('#loginForm')[0].reset();
                    window.location.href = "index.php";
                },
                error: function (xhr) {
                    const res = xhr.responseJSON;
                    showToast(res.message || "Invalid username or password", "error");

                },
                complete: function () {
                    $submitBtn.prop('disabled', false).append($('<i>').addClass('fas fa-paper-plane')).text('Log In');
                }
            });
        }
    });

    function isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    // Focus styles
    $('input').on({
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

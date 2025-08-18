$(document).ready(function () {
    $('#otpForm').on('submit', function (e) {
        e.preventDefault();

        let isValid = true;

        $('.error-message').text("");

        const otp = $('#otp').val().trim();
        const email = localStorage.getItem('email');

        if (!otp) {
            $('#otp').nextAll('.error-message').first().text('OTP is required');
            isValid = false;
        }

        if (isValid) {
            const payload = {
                otp,
                email
            };

            $('#submitBtn').prop('disabled', true).text('Submitting...');

            $.ajax({
                url: `${window.API_BASE_URL}/members/verify-otp`,
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(payload),
                success: function (response) {
                    showToast(response.message || "OTP Verified Successfully", "success");
                    setTimeout(() => {
                        window.location.href = 'login.php';
                    }, 1000);
                },
                error: function (xhr) {
                    const res = xhr.responseJSON;
                    showToast(res?.message || "Invalid OTP");
                },
                complete: function () {
                    $('#submitBtn').prop('disabled', false).text('');
                }
            });
        }
    });

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
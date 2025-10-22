$(document).ready(function () {
  let step = localStorage.getItem("forgotStep") || 1;
  let savedEmail = localStorage.getItem("forgotEmail") || "";

  // Restore state if user already requested OTP
  if (step == 2 && savedEmail) {
    $("#email").val(savedEmail).prop("readonly", true);
    $("#otpContainer").show();
    $("#submitBtn").text("Verify OTP");
    $("#subtext").text("Enter the OTP you received in your email");
  }

  $("#forgotPasswordForm").on("submit", function (e) {
    e.preventDefault();
    const submitBtn = $("#submitBtn");
    const subtext = $("#subtext");
    const otpContainer = $("#otpContainer");

    const email = $("#email").val().trim();
    const otp = $("#otp").val().trim();

    // STEP 1 → Send OTP
    if (step == 1) {
      if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        showToast("Please enter a valid email", "error");
        return;
      }

      submitBtn.prop("disabled", true).text("Sending...");
      $.ajax({
        url: `${window.API_BASE_URL}/members/forgot-password`,
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({
          email,
        }),
        success: function () {
          showToast(
            "OTP has been sent to your registered Email Address",
            "success"
          );
          subtext.text("Enter the OTP you received in your email");
          otpContainer.show();
          submitBtn.text("Verify OTP");

          // Save progress in localStorage
          localStorage.setItem("forgotStep", 2);
          localStorage.setItem("forgotEmail", email);
          step = 2;
        },
        error: function (xhr) {
          const res = xhr.responseJSON;
          showToast(res?.message || "Failed to send OTP", "error");
          submitBtn.text("Send OTP");
        },
        complete: function () {
          submitBtn.prop("disabled", false);
        },
      });
    }

    // STEP 2 → Verify OTP
    else if (step == 2) {
      if (!otp) {
        showToast("Please enter OTP", "error");
        return;
      }

      submitBtn.prop("disabled", true).text("Verifying...");
      $.ajax({
        url: `${window.API_BASE_URL}/members/verify-otp`,
        method: "POST",
        contentType: "application/json",
        data: JSON.stringify({
          email,
          otp,
        }),
        success: function () {
          showToast("OTP verified successfully!", "success");

          // Clear localStorage so flow can restart next time
          localStorage.removeItem("forgotStep");

          // Redirect to reset password page
          window.location.href = "reset-password.php";
        },
        error: function (xhr) {
          const res = xhr.responseJSON;
          showToast(res?.message || "Invalid OTP", "error");
        },
        complete: function () {
          submitBtn
            .prop("disabled", false)
            .append($("<i>").addClass("fas fa-paper-plane"))
            .text("Verify OTP");
        },
      });
    }
  });

  // Focus effects
  $("input").on({
    focus: function () {
      $(this).css({
        "border-color": "var(--primary)",
        "box-shadow": "0 0 0 2px rgba(213, 0, 0, 0.1)",
      });
    },
    blur: function () {
      $(this).css({
        "border-color": "var(--border)",
        "box-shadow": "none",
      });
    },
  });
});

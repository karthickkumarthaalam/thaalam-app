$(document).ready(function () {
  $(".password-toggle").on("click", function () {
    const $target = $($(this).data("target"));
    const type = $target.attr("type") === "password" ? "text" : "password";
    $target.attr("type", type);
    $(this).toggleClass("fa-eye fa-eye-slash");
  });

  $("#resetPasswordForm").on("submit", function (e) {
    e.preventDefault();

    const submitBtn = $("#subtmiBtn");
    const email = localStorage.getItem("forgotEmail") || "";

    const newPassword = $("#newPassword").val().trim();
    const confirmPassword = $("#confirmPassword").val().trim();

    if (!newPassword || !confirmPassword) {
      showToast("Please enter New Password", "error");
      return;
    }

    submitBtn.prop("disabled", true).text("Sending...");
    $.ajax({
      url: `${window.API_BASE_URL}/members/reset-password`,
      method: "POST",
      contentType: "application/json",
      data: JSON.stringify({
        email,
        newPassword,
        confirmPassword,
      }),
      success: function () {
        showToast("Password updated successfully", "success");
        localStorage.removeItem("forgotEmail", email);
        window.location.href = "login";
      },
      error: function (xhr) {
        const res = xhr.responseJSON;
        showToast(res?.message || "Failed to reset password", "error");
      },
      complete: function () {
        submitBtn.prop("disabled", false);
      },
    });
  });

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

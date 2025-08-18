document.addEventListener("DOMContentLoaded", function () {
    const contactForm = document.getElementById("contactForm");
    const formBtn = document.getElementById("formBtn");

    if (formBtn && contactForm) {
        formBtn.addEventListener("click", async function (e) {
            e.preventDefault(); // stop the form from reloading the page

            const formData = {
                name: contactForm.name.value.trim(),
                email: contactForm.email.value.trim(),
                subject: contactForm.subject.value.trim(),
                purpose: contactForm.purpose.value.trim(),
                message: contactForm.message.value.trim()
            };

            try {
                const response = await fetch(`${window.API_BASE_URL}/enquiry`, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(formData)
                });

                if (response.ok) {
                    showToast("Your details have been submitted successfully", "success");
                    contactForm.reset();
                } else {
                    showToast("Failed to submit details", "error");
                }
            } catch (error) {
                console.error("Error submitting form:", error);
                showToast("An error occurred while submitting your details", "error");
            }
        });
    }
});

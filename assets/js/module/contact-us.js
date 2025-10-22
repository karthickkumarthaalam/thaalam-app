document.addEventListener("DOMContentLoaded", function () {
  const tabs = document.querySelectorAll(".tab-btn");
  const panels = document.querySelectorAll(".tab-pane");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const target = tab.dataset.target;

      // Remove active class from all tabs
      tabs.forEach((t) => t.classList.remove("active"));

      // Remove active class from all panels
      panels.forEach((panel) => panel.classList.remove("active"));

      // Add active to current tab and panel
      tab.classList.add("active");
      const activePanel = document.querySelector(target);
      if (activePanel) activePanel.classList.add("active");
    });
  });

  const contactForm = document.getElementById("contactForm");
  const formBtn = document.getElementById("formBtn");

  if (formBtn && contactForm) {
    formBtn.addEventListener("click", async function (e) {
      e.preventDefault(); // stop the form from reloading the page
      const formData = {
        name: contactForm.name.value.trim(),
        email: contactForm.email.value.trim(),
        phone: contactForm.phone.value.trim(),
        subject: contactForm.subject.value.trim(),
        purpose: contactForm.purpose.value.trim(),
        message: contactForm.message.value.trim(),
      };

      try {
        const response = await fetch(`${window.API_BASE_URL}/enquiry`, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify(formData),
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

  const advertiseForm = document.getElementById("advertisementForm");
  const advertiseBtn = document.getElementById("advertiseBtn");

  if (advertiseForm && advertiseBtn) {
    advertiseBtn.addEventListener("click", async (e) => {
      e.preventDefault();

      const payload = {
        company_name: advertiseForm.company_name.value.trim(),
        contact_person: advertiseForm.contact_person.value.trim(),
        email: advertiseForm.email.value.trim(),
        phone: advertiseForm.phone.value.trim(),
        site_address: advertiseForm.site_address.value.trim(),
        requirement: advertiseForm.requirement.value.trim(),
      };

      try {
        const response = await fetch(`${window.API_BASE_URL}/advertisement`, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify(payload),
        });

        if (response.ok) {
          showToast("Your details have been submitted successfully", "success");
          advertiseForm.reset();
        } else {
          showToast("Failed to submit details", "error");
        }
      } catch (error) {
        showToast("An error occured while submitting your details", "error");
      }
    });
  }
});

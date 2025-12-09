document.addEventListener("DOMContentLoaded", function () {
  const rjList = document.getElementById("rj-list");

  function handleAccordion(btn) {
    const allToggles = rjList.querySelectorAll(".accordion-toggle");
    const content = btn.nextElementSibling;
    allToggles.forEach((otherBtn) => {
      if (otherBtn !== btn) {
        otherBtn.classList.remove("active");
        otherBtn.nextElementSibling.classList.remove("active");
      }
    });

    content.classList.toggle("active");
    btn.classList.toggle("active");
  }

  function slugify(name) {
    return name.split(" ").join("-");
  }

  if (rjList) {
    fetch(`${window.API_BASE_URL}/system-user/all-profile`)
      .then((response) => response.json())
      .then((res) => {
        const data = res.data || [];
        if (data.length > 0) {
          data.forEach((rj) => {
            const rjItem = document.createElement("div");
            const slug = slugify(rj.name);
            rjItem.className = "wow fadeInLeft";
            rjItem.setAttribute("data-wow-delay", "100ms");
            const profile = rj.image
              ? window.API_BASE_URL + "/" + rj.image.replace(/\\/g, "/")
              : "/assets/img/home/default-rj.jpg";
            rjItem.innerHTML = `
                            <div class="rj-portfolio-box">
                              <div class="rj-profile">
                                <img src="${profile}" />
                              </div>
                              <div class="rj-content">
                                <h3 class="rj-name">${rj.name}</h3>
                                <button class="accordion-toggle">View Details</button>
                                <div class="accordion-content">
                                  <p class="rj-description">${
                                    rj.description || "No description available"
                                  }</p>
                                </div>
                              </div>
                            </div>
                        `;
            rjList.appendChild(rjItem);

            const toggleBtn = rjItem.querySelector(".accordion-toggle");
            toggleBtn.addEventListener("click", () =>
              handleAccordion(toggleBtn)
            );

            rjItem.addEventListener("click", (e) => {
              if (!e.target.classList.contains("accordion-toggle")) {
                window.location.href = `/rj-details?slug=${slug}`;
              }
            });
          });
        }
      })
      .catch((err) => console.error("Error fetching RJ details:", err));
  }
});

document.addEventListener("DOMContentLoaded", function () {
  const rjList = document.getElementById("rj-list");

  function handleAccordion(btn) {
    const allToggles = rjList.querySelectorAll('.accordion-toggle');
    const content = btn.nextElementSibling;
    allToggles.forEach(otherBtn => {
      if (otherBtn !== btn) {
        otherBtn.classList.remove('active');
        otherBtn.nextElementSibling.classList.remove('active');
      }
    });

    content.classList.toggle('active');
    btn.classList.toggle('active');
  }

  if (rjList) {
    fetch(`${window.API_BASE_URL}/system-user/all-profile`)
      .then(response => response.json())
      .then(res => {
        const data = res.data || [];
        if (data.length > 0) {
          data.forEach(rj => {
            const rjItem = document.createElement("div");
            rjItem.className = "wow fadeInLeft";
            rjItem.setAttribute("data-wow-delay", "100ms");
            rjItem.innerHTML = `
                            <div class="rj-portfolio-box">
                              <div class="rj-profile">
                                <img src="${window.API_BASE_URL}/${rj.image.replace(/\\/g, "/")}" alt="${rj.name}" />
                              </div>
                              <div class="rj-content">
                                <h3 class="rj-name">${rj.name}</h3>
                                <button class="accordion-toggle">View Details</button>
                                <div class="accordion-content">
                                  <p class="rj-description">${rj.description || "No description available"}</p>
                                  <div class="rj-shows">
                                    ${rj.shows && rj.shows.length
                ? rj.shows
                  .map(
                    p => {
                      const start = p.startTime ? p.startTime.slice(0, 5) : "N/A";
                      const end = p.endTime ? p.endTime.slice(0, 5) : "N/A";
                      return `<div class="rj-show">
                                                         <strong>${p.category || "N/A"}</strong> - ${start || "N/A"} - ${end || "N/A"}
                                                      </div>`;
                    })
                  .join("")
                : `<p class="no-shows">No shows available</p>`}
                                  </div>
                                </div>
                              </div>
                            </div>
                        `;
            rjList.appendChild(rjItem);

            const toggleBtn = rjItem.querySelector('.accordion-toggle');
            toggleBtn.addEventListener('click', () => handleAccordion(toggleBtn));
          });
        }
      })
      .catch(err => console.error("Error fetching RJ details:", err));
  }
});

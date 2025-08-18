document.addEventListener("DOMContentLoaded", function () {
    const rjId = new URLSearchParams(window.location.search).get("id");

    const rjDetailsContainer = document.getElementById("rj-details");

    fetch(`${window.API_BASE_URL}/system-user/${rjId}/rj-details`)
        .then(response => response.json())
        .then(res => {
            const rj = res.data;
            if (rj) {
                const rjProfile = document.createElement("div");
                rjProfile.className = "rj-profile-card";

                let showsHTML = '';
                if (rj.radioPrograms && rj.radioPrograms.length) {
                    rj.radioPrograms.forEach(program => {
                        showsHTML += `
                        <div class="rj-show-details">
                            <span class="rj-show-name">${program.category || "N/A"}</span>
                            <span class="rj-show-time">
                                ${program.startTime || "N/A"} - ${program.endTime || "N/A"}
                            </span>
                        </div>
                    `;
                    });
                } else {
                    showsHTML = `<div class="rj-show-details">No shows available</div>`;
                }

                rjProfile.innerHTML = `
                <div class="rj-image-wrap">
                    <img src="${window.API_BASE_URL}/${rj.imageUrl}" alt="${rj.name}">
                </div>
                <div class="rj-info-wrap">
                    <h1 class="rj-name">${rj.name}</h1>
                    ${showsHTML}
                    <p class="rj-description">${rj.description || "No description available."}</p>
                </div>
            `;

                rjDetailsContainer.appendChild(rjProfile);
            }
        })
        .catch(err => console.error("Error fetching RJ details:", err));


    const rjList = document.getElementById("rj-list");

    if (rjList) {
        fetch(`${window.API_BASE_URL}/system-user/all-profile?limit=4&skipId=${rjId}`)
            .then(response => response.json())
            .then(res => {
                const data = res.data || [];
                if (data && data.length > 0) {
                    data.forEach(rj => {
                        const rjItem = document.createElement("div");
                        rjItem.className = "col-xl-3 col-lg-6 col-md-6 wow fadeInLeft";
                        rjItem.setAttribute("data-wow-delay", "100ms");
                        rjItem.innerHTML = `
                         <div class="team-one__single">
                                    <div class="team-one__img-box">
                                        <div class="team-one__img">
                                            <img src="${window.API_BASE_URL}/${rj.image}" alt="${rj.name}">
                                        </div>
                                        <div class="team-one__content">
                                            <div class="team-one__single-bg-shape"
                                                style="background-image: url(assets/images/shapes/team-one-single-bg-shape.png);">
                                            </div>
                                            <div class="team-one__content-shape-1">
                                                <img src="assets/images/shapes/team-one-content-shape-1.png" alt="">
                                            </div>
                                            <div class="team-one__content-shape-2">
                                                <img src="assets/images/shapes/team-one-content-shape-2.png" alt="">
                                            </div>
                                            <div class="team-one__plus-and-social">
                                                <div class="team-one__plus">
                                                    <span class="icon-plus"></span>
                                                </div>
                                            </div>
                                            <h3 class="team-one__title"><a href="rj-details.php?id=${rj.id}">${rj.name}</a>
                                            </h3>
                                            <p class="team-one__sub-title">${rj.categories ? rj.categories.join(', ') : ""}</p>
                                        </div>
                                    </div>
                                </div>`;
                        rjList.appendChild(rjItem);

                    });
                }
            })
            .catch(err => console.error("Error fetching RJ details:", err));

    }

});
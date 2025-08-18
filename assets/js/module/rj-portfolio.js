document.addEventListener("DOMContentLoaded", function () {
    const rjList = document.getElementById("rj-list");

    if (rjList) {
        fetch(`${window.API_BASE_URL}/system-user/all-profile`)
            .then(response => response.json())
            .then(res => {

                const data = res.data || [];
                console.log("RJs Data:", data);
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
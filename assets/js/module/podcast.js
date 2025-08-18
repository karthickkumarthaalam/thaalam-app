const API_URL = `${window.API_BASE_URL}/podcasts`;
const podcastsPerPage = 6;
let podcastData = [];
let currentPage = 1;

$(document).ready(function () {
    fetchAllPodcasts();

    // Search listener
    $(document).on("keyup", ".podcast-search input", function () {
        const searchValue = $(this).val().trim().toLowerCase();
        if (searchValue === "") {
            renderPaginatedPodcasts(currentPage);
            renderPagination(Math.ceil(podcastData.length / podcastsPerPage), currentPage);
            return;
        }

        const filtered = podcastData.filter(podcast =>
            podcast.title.toLowerCase().includes(searchValue) ||
            podcast.rjname.toLowerCase().includes(searchValue) ||
            podcast.content.toLowerCase().includes(searchValue) ||
            podcast.tags.some(tag => tag.toLowerCase().includes(searchValue))
        );

        renderPodcasts(filtered);
        $("#pagination").html("");
    });

    // Pagination click
    $(document).on("click", ".pg-pagination li.count a", function (e) {
        e.preventDefault();
        const page = parseInt($(this).text());
        changePage(page);
    });

    $(document).on("click", ".pg-pagination li.prev a", function (e) {
        e.preventDefault();
        if (currentPage > 1) changePage(currentPage - 1);
    });

    $(document).on("click", ".pg-pagination li.next a", function (e) {
        e.preventDefault();
        const totalPages = Math.ceil(podcastData.length / podcastsPerPage);
        if (currentPage < totalPages) changePage(currentPage + 1);
    });
});

function fetchAllPodcasts() {
    $.get(`${API_URL}?status=active&limit=1000`, function (result) {
        podcastData = result.data.data || [];
        renderPaginatedPodcasts(currentPage);
        renderPagination(Math.ceil(podcastData.length / podcastsPerPage), currentPage);
    }).fail(function (err) {
        console.error("Error fetching podcasts:", err);
    });
}

function renderPaginatedPodcasts(page) {
    const startIndex = (page - 1) * podcastsPerPage;
    const endIndex = startIndex + podcastsPerPage;
    const paginated = podcastData.slice(startIndex, endIndex);
    renderPodcasts(paginated);
}

function renderPodcasts(podcasts) {
    const $list = $("#podcast-list");
    if (podcasts.length === 0) {
        $list.html(`<div class="no-results"><h3>No podcasts found</h3></div>`);
        $("#pagination").html("");
        return;
    }

    const html = podcasts.map(podcast => {
        const date = new Date(podcast.date);
        const formattedDate = date.toLocaleDateString("en-US", {
            year: "numeric",
            month: "long",
            day: "numeric"
        });

        return `
                <div class="podcast-list__single">
                    <div class="podcast-list__img-box">
                        <div class="podcast-list__img">
                        <img src="${podcast?.image_url
                ? `${window.API_BASE_URL}/${podcast?.image_url.replace(/\\/g, "/")}`
                : 'assets/img/common/podcast-details/podcast-banner.jpg'}" 
                alt="${podcast.title}">                            
                <div class="podcast-list__play-btn">
                                <span class="fas fa-microphone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="podcast-list__content">
                        <div class="podcast-list__date-and-download">
                            <div class="podcast-list__date"><p>${formattedDate}</p></div>
                            <div class="podcast-list__download">
                                <a href="${podcast.audio_url || '#'}"><span class="icon-download"></span></a>
                            </div>
                        </div>
                        <h3 class="podcast-list__title">
                            <a href="podcast-details.php?id=${podcast.id}">${podcast.title}</a>
                        </h3>
                        <div class="podcast-list__stats-box">
                            <div class="podcast-list__duration">
                                <span class="icon-clock"></span>
                                <p>${podcast.duration || "00:00"}</p>
                            </div>
                            <p class="podcast-list__stats-text">(${podcast.listens || 0} listens)</p>
                        </div>
                        <ul class="podcast-list__meta list-unstyled">
                            <li><p><span class="icon-microphone"></span>${podcast.rjname}</p></li>
                            <li><p><span class="icon-headphones"></span>${podcast.content}</p></li>
                            <li><p><span class="icon-share-from"></span>Share</p></li>
                        </ul>
                        <div class="podcast-list__btn-and-host-info">
                            <div class="podcast-list__btn-box">
                                <a href="podcast-details.php?id=${podcast.id}" class="thm-btn-two">
                                    <span>Listen Now</span>
                                    <i class="icon-angles-right"></i>
                                </a>
                            </div>
                            <div class="podcast-list__host-box">
                                <div class="podcast-list__host-img">
                                    <img src="${podcast.host_image || 'assets/img/common/podcasts/rj1.jpg'}" alt="${podcast.rjname}">
                                </div>
                                <div class="podcast-list__host-content">
                                    <h4>${podcast.rjname}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
    }).join("");

    $list.html(html);
}

function renderPagination(totalPages, current) {
    let html = `<ul class="pg-pagination list-unstyled">`;

    html += `<li class="prev"><a href="#"><i class="fas fa-arrow-left"></i></a></li>`;

    for (let i = 1; i <= totalPages; i++) {
        html += `<li class="count ${i === current ? 'active' : ''}"><a href="#">${String(i).padStart(2, '0')}</a></li>`;
    }

    html += `<li class="next"><a href="#"><i class="fas fa-arrow-right"></i></a></li>`;
    html += `</ul>`;

    $("#pagination").html(html);
}

function changePage(page) {
    currentPage = page;
    renderPaginatedPodcasts(page);
    renderPagination(Math.ceil(podcastData.length / podcastsPerPage), page);
}

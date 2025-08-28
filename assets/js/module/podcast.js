const API_URL = `${window.API_BASE_URL}/podcasts`;
const podcastsPerPage = 10;
let podcastData = [];
let currentPage = 1;

$(document).ready(function () {
    fetchAllPodcasts();

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

    $(document).on("click", ".podcast", function () {
        const podcastId = $(this).data("id");
        if (podcastId) {
            window.location.href = `podcast-details.php?id=${podcastId}`;
        }
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
        $list.html(`<div class="no-results> <h3> No Podcasts found</h3></div>`);
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

        const podcastImage = podcast?.image_url ? `${window.API_BASE_URL}/${podcast.image_url.replace(/\\/g, "/")}` : "assets/img/common/podcast-details/podcast-banner.jpg";

        return `<div class="podcast" data-id="${podcast.id}">
                            <div class="podcast-image">
                                <img src=${podcastImage} alt=${podcast.title}/>
                            </div>
                            <div class="podcast-details">
                                <div class="podcast-content">
                                    <p class="released-stamp">${formattedDate}</p>
                                    <h5 class="podcast-heading">${podcast.title}</h5>
                                    <p class="podcast-desc">
                                        ${podcast.description}
                                    </p>
                                </div>
                                <div class="audio-details">
                                    <p class="audio-duration">${podcast.duration}  MIN</p>
                                </div>
                            </div>
                        </div>`;
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

    const podcastList = document.querySelector(".page-wrapper");
    if (podcastList) {
        podcastList.scrollIntoView({ behavior: "smooth", block: "start" });
    }
}

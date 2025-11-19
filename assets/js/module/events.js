const API_URL = `${window.API_BASE_URL}/event/all-events`;
const EventsPerPage = 10;
let currentPage = 1;
let totalPages = 1;
let searchValue = "";

$(document).ready(function () {
  fetchEvents(currentPage);

  $(document).on("click", ".events-searchbar__btn", function () {
    searchValue = $(".events-search__input").val().trim().toLowerCase();
    currentPage = 1;
    fetchEvents(currentPage);
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
    if (currentPage < totalPages) changePage(currentPage + 1);
  });

  $(document).on("click", ".event-card", function () {
    const slug = $(this).data("slug");
    if (slug) window.location.href = `event-details.php?slug=${slug}`;
  });
});

function fetchEvents(page = 1) {
  $(".events-list").html(`
    <div class="loading-container">
      <div class="spinner"></div>
      <p>Loading events...</p>
    </div>
   `);

  let query = `?limit=${EventsPerPage}&page=${page}`;
  if (searchValue) query += `&search=${encodeURIComponent(searchValue)}`;

  $.get(`${API_URL}${query}`)
    .done(function (res) {
      const data = res.data || [];

      if (res.pagination) {
        totalPages = res.pagination.totalPages || 1;
        currentPage = res.pagination.currentPage || 1;
      } else {
        totalPages = Math.ceil(data.length / EventsPerPage);
      }

      if (data.length === 0) {
        $("#events-list").html(`
          <div class="no-results-container">
            <div class="no-results-icon"><i class="fas fa-calendar-times"></i></div>
            <h3>No Events Found</h3>
            <p class="no-results-text">
              Try another keyword or check back later for upcoming events.
            </p>
          </div>
        `);
        $("#pagination").html("");
        return;
      }

      renderEvents(data);
      renderPagination(totalPages, currentPage);
    })
    .fail(function (err) {
      $("#events-list").html(`
          <div class="no-results-container">
          <h3>Error Loading Events</h3>
          <p>Please try again later.</p>
        </div>
        `);
    });
}

function renderEvents(eventList) {
  const html = eventList
    .map((event) => {
      // ✅ Format start and end dates
      const startDate = event.start_date
        ? new Date(event.start_date).toLocaleDateString("en-US", {
            day: "numeric",
            month: "short",
            year: "numeric",
          })
        : "—";

      const endDate = event.end_date
        ? new Date(event.end_date).toLocaleDateString("en-US", {
            day: "numeric",
            month: "short",
            year: "numeric",
          })
        : "";

      const dateDisplay =
        startDate && endDate && startDate !== endDate
          ? `${startDate} - ${endDate}`
          : startDate || "—";

      const image =
        event.logo_image && event.logo_image.trim() !== ""
          ? event.logo_image
          : "assets/img/common/default-event.jpg";

      const desc = event.description
        ? event.description.replace(/<\/?[^>]+(>|$)/g, "")
        : "Join us for an exciting celebration of music, culture, and community at Thaalam events!";
      const shortDesc = desc.length > 160 ? desc.slice(0, 160) + "..." : desc;

      const location = event.venue
        ? `${event.venue}, ${event.city || ""}`.trim()
        : event.city || "Online";

      const status =
        event.status && event.status !== ""
          ? `<span class="event-status ${event.status.toLowerCase()}">${
              event.status
            }</span>`
          : "";

      return `
        <article class="event-card" data-slug="${event.slug}">
          <div class="event-image">
            <img src="${image}" alt="${event.title}" loading="lazy"
              onerror="this.src='assets/img/common/default-event.jpg';">
          </div>
          <div class="event-body">
            <div class="event-header">
              <h3 class="event-title">${event.title}</h3>
              ${status}
            </div>
            <p class="event-desc">${shortDesc}</p>
            <div class="event-meta">
              <span class="event-location"><i class="fas fa-map-marker-alt"></i> ${location}</span>
              <span class="event-date"><i class="far fa-calendar-alt"></i> ${dateDisplay}</span>
            </div>
          </div>
        </article>`;
    })
    .join("");

  // ✅ Smooth fade transition
  $("#events-list").fadeOut(150, function () {
    $("#events-list").html(html).fadeIn(200);
  });
}

function renderPagination(totalPages, current) {
  $("#pagination").empty();
  if (!totalPages || totalPages <= 1) return;

  let html = `<ul class="pg-pagination list-unstyled">`;

  // Disable prev when on first page
  html += `<li class="prev ${current === 1 ? "disabled" : ""}">
             <a href="#"><i class="fas fa-arrow-left"></i></a>
           </li>`;

  for (let i = 1; i <= totalPages; i++) {
    html += `<li class="count ${i === current ? "active" : ""}">
      <a href="#">${String(i).padStart(2, "0")}</a>
    </li>`;
  }

  // Disable next on last page
  html += `<li class="next ${current === totalPages ? "disabled" : ""}">
             <a href="#"><i class="fas fa-arrow-right"></i></a>
           </li>`;

  html += `</ul>`;
  $("#pagination").html(html);
}

function changePage(page) {
  if (page < 1 || page > totalPages) return;

  currentPage = page;
  fetchEvents(page);

  const wrapper = document.querySelector(".page-wrapper");
  if (wrapper) wrapper.scrollIntoView({ behavior: "smooth", block: "start" });
}

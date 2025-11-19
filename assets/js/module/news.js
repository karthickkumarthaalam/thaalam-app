const API_URL = `${window.API_BASE_URL}/news`;
const NewsPersPage = 10;
let currentPage = 1;
let totalPages = 1;
let activeCategory = "all";
let searchValue = "";

$(document).ready(function () {
  fetchNews(currentPage);
  fetchCategories();

  // 🔍 Search Functionality
  $(document).on("click", ".news-searchbar__btn", function () {
    searchValue = $(".news-searchbar__input").val().trim().toLowerCase();
    activeCategory = "all";
    currentPage = 1;

    $(".category-filter").removeClass("active");
    $('.category-filter[data-category="all"]').addClass("active");

    fetchNews(currentPage);
  });

  // 🏷️ Category Filter
  $(document).on("click", ".category-filter", function (e) {
    e.preventDefault();
    $(".category-filter").removeClass("active");
    $(this).addClass("active");

    activeCategory = $(this).data("category");
    searchValue = "";
    currentPage = 1;

    fetchNews(currentPage);
  });

  // 📄 Pagination Clicks
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

  // 📰 Click News Card → Redirect to Details
  $(document).on("click", ".news-card", function () {
    const slug = $(this).data("slug");
    if (slug) window.location.href = `news-details?slug=${slug}`;
  });

  // ↔️ Scroll Buttons for Category Filters
  const container = document.getElementById("category-filters");
  const scrollLeftBtn = document.getElementById("scrollLeft");
  const scrollRightBtn = document.getElementById("scrollRight");

  if (scrollLeftBtn && scrollRightBtn && container) {
    scrollLeftBtn.addEventListener("click", () => {
      container.scrollBy({ left: -200, behavior: "smooth" });
    });
    scrollRightBtn.addEventListener("click", () => {
      container.scrollBy({ left: 200, behavior: "smooth" });
    });
  }
});

// 📰 Fetch News (with pagination)
function fetchNews(page = 1) {
  $("#news-list").html(`
    <div class="loading-container">
      <div class="spinner"></div>
      <p>Loading news...</p>
    </div>
  `);

  let query = `?status=published&limit=${NewsPersPage}&page=${page}`;

  if (activeCategory && activeCategory !== "all") {
    query += `&category=${encodeURIComponent(activeCategory)}`;
  }
  if (searchValue) {
    query += `&search=${encodeURIComponent(searchValue)}`;
  }

  $.get(`${API_URL}${query}`)
    .done(function (res) {
      const data = res.data || [];

      // ✅ Fix: Read pagination data correctly
      if (res.pagination) {
        totalPages = res.pagination.totalPages || 1;
        currentPage = res.pagination.currentPage || 1;
      } else {
        totalPages = Math.ceil((res.total || data.length) / NewsPersPage);
      }

      if (data.length === 0) {
        $("#news-list").html(`
          <div class="no-results-container">
            <div class="no-results-icon"><i class="fas fa-newspaper"></i></div>
            <h3>No News Articles Found</h3>
            <p class="no-results-text">
              Try adjusting your keywords or explore other categories.
            </p>
          </div>
        `);
        $("#pagination").html("");
        return;
      }

      renderNews(data);
      renderPagination(totalPages, currentPage);
    })
    .fail(function (err) {
      console.error("Error fetching news:", err);
      $("#news-list").html(`
        <div class="no-results-container">
          <h3>Error Loading News</h3>
          <p>Please try again later.</p>
        </div>
      `);
    });
}

// 📰 Render News
function renderNews(newslist) {
  const html = newslist
    .map((news) => {
      const formattedDate = news.published_date
        ? new Date(news.published_date).toLocaleDateString("en-US", {
            year: "numeric",
            month: "short",
            day: "numeric",
          })
        : "—";

      const imagePath =
        news.cover_image ||
        "assets/img/common/podcast-details/podcast-banner.jpg";

      const allowed = news.content.replace(
        /<(?!\/?(strong|em|a)\b)[^>]*>/g,
        ""
      );
      const shortDesc =
        allowed.length > 180 ? allowed.slice(0, 180) + "..." : allowed;

      return `
        <article class="news-card" data-slug="${news.slug}">
          <div class="news-image">
            <img src="${imagePath}" alt="${news.title}" loading="lazy"
              onerror="this.src='assets/img/common/podcast-details/podcast-banner.jpg';">
          </div>
          <div class="news-body">
            <h3 class="news-title">${news.title}</h3>
            <p class="news-desc">${shortDesc}</p>
            <div class="news-cat">
              ${
                news.category
                  ? `<span class="news-category">
                      <i class="fas fa-folder-open"></i> ${news.category}
                    </span>`
                  : ""
              }
              <span class="news-date">
                <i class="far fa-calendar-alt"></i> ${formattedDate}
              </span>
            </div>
          </div>
        </article>`;
    })
    .join("");

  $("#news-list").fadeOut(150, function () {
    $("#news-list").html(html).fadeIn(200);
    if (window.innerWidth <= 768) $(".news-desc").hide();
  });
}

// 🔢 Render Pagination
function renderPagination(totalPages, current) {
  $("#pagination").empty();

  if (!totalPages || totalPages <= 1) return;

  let html = `<ul class="pg-pagination list-unstyled">`;

  // Disable prev on first page
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

// 🔁 Change Page
function changePage(page) {
  if (page < 1 || page > totalPages) return;
  currentPage = page;
  fetchNews(page);

  const wrapper = document.querySelector(".page-wrapper");
  if (wrapper) wrapper.scrollIntoView({ behavior: "smooth", block: "start" });
}

// 🏷️ Fetch Categories
function fetchCategories() {
  $.get(`${window.API_BASE_URL}/news-category/category-list`)
    .done(function (res) {
      if (res.status === "success" && res.data) {
        const $container = $("#category-filters");
        $container.html(""); // clear existing
        $container.append(
          `<a href="#" class="category-filter active" data-category="all">All</a>`
        );

        res.data.forEach((cat) => {
          $container.append(
            `<a href="#" class="category-filter" data-category="${cat}">${cat}</a>`
          );
        });
      }
    })
    .fail(function (err) {
      console.error("Error fetching categories:", err);
    });
}

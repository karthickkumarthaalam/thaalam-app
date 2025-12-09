const API_URL = `${window.API_BASE_URL}/blogs`;
const BlogsPerPage = 9;
let currentPage = 1;
let totalPages = 1;
let activeCategory = "all";
let searchValue = "";

$(document).ready(function () {
  activeCategory = "all";
  currentPage = 1;

  $(".category-filter").removeClass("active");
  $('.category-filter[data-category="all"]').addClass("active");

  fetchBlogs(true, 1);
  fetchCategories();
});

// ---------------- CATEGORY FILTER ✅ ----------------

$(document).on("click", ".category-filter", function (e) {
  e.preventDefault();
  $(".category-filter").removeClass("active");
  $(this).addClass("active");

  activeCategory = $(this).data("category"); // ✅ FIXED SELECTOR
  searchValue = "";
  currentPage = 1;

  fetchBlogs(false, 1);
});

// ---------------- PAGINATION CLICK ✅ ----------------

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

// ---------------- BLOG CARD CLICK ✅ ----------------

$(document).on("click", ".blog-card", function () {
  const slug = $(this).data("slug");
  if (slug) window.location.href = `blog-details?slug=${slug}`;
});

// ---------------- FETCH BLOGS ✅ ----------------

async function fetchBlogs(initial = false, page = 1) {
  $("#blogs-list").html(`
     <div class="loading-container">
      <div class="spinner"></div>
      <p>Loading blogs...</p>
    </div>
  `);

  let query = `?status=published&limit=${BlogsPerPage}&page=${page}`;

  if (activeCategory && activeCategory !== "all") {
    query += `&category=${encodeURIComponent(activeCategory)}`;
  }

  if (searchValue) {
    query += `&search=${encodeURIComponent(searchValue)}`;
  }

  try {
    const res = await $.ajax({
      url: `${API_URL}${query}`,
      method: "GET",
    });

    const data = res?.data || [];
    const pagination = res.pagination;

    if (pagination) {
      totalPages = pagination.totalPages || 1;
      currentPage = pagination.currentPage || 1;
      totalPages = pagination.totalPages;
    } else {
      totalPages = Math.ceil((res.total || data.length) / BlogsPerPage);
    }

    if (!data.length) {
      $("#blogs-list").html(`
        <div class="no-results-container">
            <div class="no-results-icon"><i class="fas fa-folder-open "></i></div>
            <h3>No Blogs Articles Found</h3>
            <p class="no-results-text">
              Try adjusting your keywords or explore other categories.
            </p>
          </div>
      `);
      $("#pagination").html("");
      return;
    }

    renderBlogs(data);
    renderPagination(totalPages, currentPage);
  } catch (err) {
    console.error("Blogs loading failed:", err);
    $("#blogs-list").html(`
      <div class="col-xl-12 text-center mt-5">
        <h3>Error Loading Blogs</h3>
      </div>
    `);
  }
}

// ---------------- RENDER BLOGS ✅ ----------------

function renderBlogs(blogsList) {
  const html = blogsList.map((blog) => {
    const formattedDate = blog.published_date
      ? new Date(blog.published_date).toLocaleDateString("en-US", {
          year: "numeric",
          month: "short",
          day: "numeric",
        })
      : "";

    const imagePath = blog.cover_image
      ? blog.cover_image
      : `assets/img/common/blogs/default.jpg`;

    const content = blog.subtitle || blog.content || "";
    const cleanText = content.replace(/<(?!\/?(strong|em|a)\b)[^>]*>/g, "");
    const shortDesc =
      cleanText.length > 160 ? cleanText.slice(0, 160) + "..." : cleanText;

    return `
      <div class="col-xl-4 col-lg-4 col-md-6 mb-4 blog-card blog-card-animation-style2 blog-card-blur position-relative blog-card--shadow 
      blog-card--rounded" 
      data-slug="${blog.slug}">
        <div class="blog-two__single blog-card blog-card-animation">
          <div class="blog-two__img">
            <img src="${imagePath}" alt="${blog.title}" loading="lazy"/>
            <div class="blog-two__date">
              <span class="icon-calendar"></span>
              <p>${formattedDate}</p>
            </div>
          </div>
          <div class="blog-two__content">
            <div class="blog-two__meta-box">
              <ul class="blog-two__meta list-unstyled">
                <li><span class="icon-tags"></span> ${
                  blog.category || "General"
                }</li>
              </ul>
            </div>
            <h4 class="blog-two__title">${blog.title}</h4>
            <p class="blog-two__text">${shortDesc}</p>
          </div>
        </div>
      </div>
    `;
  });

  $("#blogs-list").html(html.join("")).fadeIn(300);
}

// ---------------- Pagination UI Render ✅ ----------------

function renderPagination(total, current) {
  totalPages = total;

  if (total <= 1) {
    $("#pagination").html("");
    return;
  }

  let pageHTML = `<ul class="pg-pagination list-unstyled ">`;

  pageHTML += `
    <li class="prev ${current === 1 ? "disabled opacity-50" : ""}">
      <a href="#"><i class="fas fa-arrow-left"></i></a>
    </li>`;

  for (let i = 1; i <= total; i++) {
    pageHTML += `
      <li class="count ${i === current ? "active" : ""}">
        <a href="#">${i.toString().padStart(2, "0")}</a>
      </li>`;
  }

  pageHTML += `
    <li class="next ${current === total ? "disabled opacity-50" : ""}">
      <a href="#"><i class="fas fa-arrow-right"></i></a>
    </li>`;

  pageHTML += `</ul>`;
  $("#pagination").html(pageHTML);
}

// ---------------- Page Change Logic ✅ ----------------

function changePage(page) {
  if (page < 1 || page > totalPages) return;

  currentPage = page;
  fetchBlogs(false, page);

  document.querySelector(".page-wrapper")?.scrollIntoView({
    behavior: "smooth",
    block: "start",
  });
}

// ---------------- CATEGORY API ✅ ----------------

function fetchCategories() {
  $("#category-filters").html(`<span>Loading...</span>`);

  $.ajax({
    url: `${window.API_BASE_URL}/blogs-category/category-list`,
    method: "GET",
  })
    .done(function (res) {
      if (res.status === "success" && res.data) {
        const $container = $("#category-filters");
        $container.html(
          `<a href="#" class="category-filter active" data-category="all">All</a>`
        );

        res.data.forEach((cat) => {
          $container.append(
            `<a href="#" class="category-filter" data-category="${cat}">${cat}</a>`
          );
        });
      }
    })
    .fail((err) => console.error("Category API failed:", err));
}

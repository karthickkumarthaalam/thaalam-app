const API_URL = `${window.API_BASE_URL}/news`;
const NewsPerPage = 20;

let currentPage = 1;
let activeCategory = "all";
let isLoading = false;

function buildBigSkeleton() {
  return `
    <article class="animate-pulse border-b border-gray-200 pb-6">
      <div class="h-[240px] bg-gray-200 mb-4"></div>
      <div class="h-3 w-24 bg-gray-300 mb-3"></div>
      <div class="h-6 w-3/4 bg-gray-300 mb-2"></div>
      <div class="h-6 w-2/3 bg-gray-200 mb-3"></div>
      <div class="h-4 w-full bg-gray-200"></div>
    </article>
  `;
}

function buildSmallSkeleton() {
  return `
    <article class="animate-pulse border-b border-gray-200 pb-6">
      <div class="h-44 bg-gray-200 mb-4"></div>
      <div class="h-5 w-5/6 bg-gray-300 mb-2"></div>
      <div class="h-3 w-24 bg-gray-300"></div>
    </article>
  `;
}

/* =============================
   SKELETON LOADER (INITIAL ONLY)
============================= */
function renderSkeletons() {
  $("#news-grid").html(`
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">

      ${buildBigSkeleton()}
      ${buildBigSkeleton()}

    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      ${buildSmallSkeleton()}
      ${buildSmallSkeleton()}
      ${buildSmallSkeleton()}

    </div>
  `);
}

/* =============================
   DOCUMENT READY
============================= */
$(document).ready(function () {
  renderSkeletons();
  fetchCategories();
  fetchNews(false);

  // Read More
  $("#read-more-btn").on("click", function () {
    if (isLoading) return;
    currentPage++;
    fetchNews(true);
  });

  // Card click
  $(document).on("click", ".news-card", function () {
    const slug = $(this).data("slug");
    if (slug) window.location.href = `news-details?slug=${slug}`;
  });

  // Category click
  $(document).on("click", ".category-filter", function (e) {
    e.preventDefault();

    $(".category-filter")
      .removeClass("text-red-600 border-red-600 font-semibold")
      .addClass("text-gray-600 border-transparent font-medium");

    $(this)
      .addClass("text-red-600 border-red-600 font-semibold")
      .removeClass("text-gray-600 border-transparent");

    activeCategory = $(this).data("category");
    currentPage = 1;

    $("#news-grid").empty();
    renderSkeletons();
    fetchNews(false);
  });
});

/* =============================
   FETCH NEWS
============================= */
function fetchNews(isLoadMore) {
  isLoading = true;

  let query = `?status=published&limit=${NewsPerPage}&page=${currentPage}`;
  if (activeCategory !== "all") {
    query += `&category=${encodeURIComponent(activeCategory)}`;
  }

  $.get(`${API_URL}${query}`)
    .done((res) => {
      const data = res.data || [];

      if (data.length === 0 && !isLoadMore) {
        showNoResults();
        $("#read-more-btn").addClass("hidden");
        return;
      }

      if (!isLoadMore) {
        renderInitialGrid(data);
      } else {
        appendSmallGrid(data);
      }

      if (data.length > NewsPerPage) {
        $("#read-more-btn").removeClass("hidden");
      } else {
        $("#read-more-btn").addClass("hidden");
      }
    })
    .always(() => {
      isLoading = false;
    });
}

function showNoResults() {
  $("#news-grid").html(`
    <div class="flex flex-col items-center justify-center
                text-center py-16 px-4">

      <!-- Icon -->
      <div class="mb-6">
        <svg xmlns="http://www.w3.org/2000/svg"
             class="h-14 w-14 text-gray-300"
             fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                d="M19 11H5m14 0a7 7 0 11-14 0 7 7 0 0114 0z" />
        </svg>
      </div>

      <!-- Title -->
      <h3 class="text-2xl font-semibold text-gray-900 mb-2">
        No articles found
      </h3>

      <!-- Description -->
      <p class="text-gray-500 max-w-md mb-6">
        We couldn’t find any news under this category right now.
        Try exploring other topics or check out our latest updates below.
      </p>

      <!-- Action -->
      <button
        id="browse-all-news"
        class="inline-flex items-center gap-2
               px-5 py-2.5 rounded-md
               text-sm font-medium
               bg-red-600 text-white
               hover:bg-red-700
               transition"
      >
        Browse all news
      </button>

    </div>
  `);

  // Reset to all category
  $("#browse-all-news").on("click", function () {
    activeCategory = "all";
    currentPage = 1;

    $(".category-filter")
      .removeClass("text-red-600 border-red-600 font-semibold")
      .addClass("text-gray-600 border-transparent font-medium");

    $('.category-filter[data-category="all"]').addClass(
      "text-red-600 border-red-600 font-semibold",
    );

    renderSkeletons();
    fetchNews(false);
  });
}

/* =============================
   INITIAL GRID
   2 BIG + SMALL GRID
============================= */
function renderInitialGrid(newslist) {
  let big = "";
  let small1 = "";
  let small2 = "";
  let compact = "";

  newslist.forEach((news, index) => {
    if (index < 2) {
      big += buildBigCard(news);
    } else if (index < 5) {
      small1 += buildSmallCard(news);
    } else if (index < 8) {
      small2 += buildSmallCard(news);
    } else if (index < 10) {
      compact += buildCompactCard(news);
    }
  });

  $("#news-grid").html(`
    <!-- 2 BIG -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
      ${big}
    </div>

    <!-- 3 SMALL -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
      ${small1}
    </div>

    <!-- 3 SMALL -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-10">
      ${small2}
    </div>

    <!-- 2 COMPACT ROW -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
      ${compact}
    </div>
  `);
}

/* =============================
   APPEND SMALL NEWS (READ MORE)
============================= */
function appendSmallGrid(newslist) {
  let html = "";
  newslist.forEach((news) => {
    html += buildSmallCard(news);
  });

  $("#news-grid .grid:last").append(html);
}

/* =============================
   BIG CARD
============================= */
function buildBigCard(news) {
  const image =
    news.cover_image || "assets/img/common/podcast-details/podcast-banner.jpg";

  const date = formatDate(news.published_date);
  const desc = stripHtml(news.content);

  return `
<article
  class="news-card group cursor-pointer
         bg-white
         border-b border-gray-200
         pb-6
         transition-colors"
  data-slug="${news.slug}"
>

  <!-- IMAGE -->
  <div class="mb-4 overflow-hidden">
    <img
      src="${image}"
      alt="${news.title}"
      class="w-full h-[280px] object-cover"
    />
  </div>

  <!-- CONTENT -->
  <div class="p-3">

    <!-- DATE -->
    <div class="text-xs text-red-500 mb-2">
      ${date}
    </div>

    <!-- TITLE -->
    <h2
      class="text-xl md:text-2xl font-bold
             text-gray-900 leading-snug
             group-hover:underline decoration-red-600 decoration-2 underline-offset-4"
    >
      ${news.title}
    </h2>

    <!-- DESCRIPTION -->
    <p class="mt-3 text-sm text-gray-700 leading-relaxed line-clamp-3">
      ${desc}
    </p>

  </div>
</article>
`;
}

/* =============================
   SMALL CARD
============================= */
function buildSmallCard(news) {
  const image =
    news.cover_image || "assets/img/common/podcast-details/podcast-banner.jpg";

  const date = formatDate(news.published_date);

  return `
    <article
      class="news-card group cursor-pointer
             bg-white
             border-b border-gray-200
             pb-5
             transition-colors"
      data-slug="${news.slug}"
    >

      <!-- MOBILE: ROW REVERSE | DESKTOP: COLUMN -->
      <div class="flex flex-row-reverse gap-4 sm:block">

        <!-- IMAGE -->
        <div class="flex-shrink-0 sm:mb-3">
          <img
            src="${image}"
            alt="${news.title}"
            class="w-28 h-20 object-cover
                   sm:w-full sm:h-48"
          />
        </div>

        <!-- CONTENT -->
        <div class="flex flex-col-reverse sm:flex-col
                    justify-center
                    px-2 sm:px-0">

          <!-- DATE -->
          <span class="text-xs text-red-500 mt-1 sm:mt-0">
            ${date}
          </span>

          <!-- TITLE -->
          <h3
            class="mt-1 sm:mt-0
                   font-semibold text-gray-900 leading-snug
                   group-hover:underline
                   decoration-red-600 decoration-2 underline-offset-4"
          >
            ${news.title}
          </h3>

        </div>

      </div>
    </article>
  `;
}

function buildCompactCard(news) {
  const image = news.cover_image;
  const date = formatDate(news.published_date);

  return `
    <article 
      class="news-card group flex items-center gap-4 bg-white border border-gray-200 rounded-md p-3 hover:bg-gray-50 transition cursor-pointer"
      data-slug="${news.slug}"
    >
      <img src="${image}" alt="${news.title}" class="w-24 h-16 object-cover rounded" />
      <div class="flex flex-col">
         <span class="text-xs text-red-500 mb-1">${date}</span>
         <h4 class="font-semibold group-hover:underline underline-offset-4 decoration-red-600 decoration-2 text-gray-900 leading-snug line-clamp-2">
          ${news.title}
        </h4>
      </div>
    </article>
  `;
}

/* =============================
   HELPERS
============================= */
function stripHtml(html) {
  return html ? html.replace(/<[^>]*>/g, "").slice(0, 140) + "…" : "";
}

function formatDate(date) {
  return date
    ? new Date(date).toLocaleDateString("en-GB", {
        day: "numeric",
        month: "short",
        year: "numeric",
      })
    : "";
}

/* =============================
   CATEGORIES (NO STYLE CHANGE)
============================= */
function fetchCategories() {
  $.get(`${window.API_BASE_URL}/news-category/category-list`).done((res) => {
    if (!res.data) return;

    const $c = $("#category-filters");
    $c.html(`
        <a href="#" data-category="all"
           class="category-filter px-1 pb-2 text-base font-semibold
                  text-red-600 border-b-2 border-red-600">
          All
        </a>
      `);

    res.data.forEach((cat) => {
      $c.append(`
          <a href="#" data-category="${cat}"
             class="category-filter px-1 pb-2 text-base font-medium
                    text-gray-600 hover:text-gray-900
                    border-b-2 border-transparent hover:border-gray-300">
            ${cat}
          </a>
        `);
    });
  });
}

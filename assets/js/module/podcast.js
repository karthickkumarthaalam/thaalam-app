"use strict";

const API_URL = `${window.API_BASE_URL}/podcasts`;
const podcastsPerPage = 12;
let currentPage = 1;
let totalPages = 1;

// ✅ Run on page load
document.addEventListener("DOMContentLoaded", () => {
  const searchInput = document.getElementById("podcastSearchInput");
  const searchBtn = document.getElementById("podcastSearchBtn");
  const paginationEl = document.getElementById("pagination");
  const listEl = document.getElementById("podcast-list");

  attachSearch(searchInput, searchBtn);
  attachCardNavigation(listEl);
  attachPagination(paginationEl, searchInput);

  fetchPodcasts(1, "");
});

// ✅ Search Binding + debounce
function attachSearch(input, btn) {
  if (!input) return;

  input.addEventListener(
    "keyup",
    debounce((e) => {
      fetchPodcasts(1, e.target.value.trim());
    }, 400)
  );

  if (btn) {
    btn.addEventListener("click", () => {
      fetchPodcasts(1, input.value.trim());
    });
  }
}

// ✅ Card Navigation
function attachCardNavigation(list) {
  if (!list) return;

  list.addEventListener("click", (e) => {
    const card = e.target.closest(".podcast-card");
    window.location.href = `podcast-details?slug=${card.dataset.slug}&id=${card.dataset.id}`;
  });
}

// ✅ Pagination Binding
function attachPagination(paginationEl, searchInput) {
  if (!paginationEl) return;

  paginationEl.addEventListener("click", (e) => {
    const btn = e.target.closest("button");
    if (!btn?.dataset.page) return;

    const page = Number(btn.dataset.page);
    const search = searchInput?.value.trim() || "";
    fetchPodcasts(page, search);
  });
}

// ✅ Fetch Podcasts from backend + render UI
async function fetchPodcasts(page = 1, search = "") {
  const list = document.getElementById("podcast-list");
  const paginationEl = document.getElementById("pagination");

  if (!list) return;

  list.innerHTML = `<p class="text-sm text-gray-400 text-center mt-6 animate-pulse">Loading podcasts...</p>`;

  try {
    const res = await fetch(
      `${API_URL}?status=approved&page=${page}&limit=${podcastsPerPage}&search=${encodeURIComponent(
        search
      )}`
    );

    const result = await res.json();
    const data = result?.data?.data || [];
    const pg = result?.data?.pagination || {};

    currentPage = pg.page || page;
    totalPages = pg.totalPages || 1;

    renderSpotifyCards(data, list);
    renderSpotifyPagination(totalPages, currentPage, paginationEl);
  } catch (err) {
    console.error(err);
    list.innerHTML = `<p class="text-sm text-red-500 text-center mt-6">Failed to load podcasts</p>`;
  }
}

// ✅ Render podcast cards in Spotify vibe
function renderSpotifyCards(podcasts, list) {
  if (!podcasts.length) {
    list.innerHTML = `<p class="text-sm text-gray-400 text-center mt-8">No Podcasts Found</p>`;
    return;
  }

  const html = podcasts
    .map((p, i) => {
      const img =
        p.image_url || "assets/img/common/podcast-details/podcast-banner.jpg";
      const title =
        (p.title || "").slice(0, 100) + (p.title?.length > 100 ? "…" : "");
      const duration = `${p.duration ?? 0} min`;

      return `
      <div class="podcast-card opacity-0 animate-cardReveal bg-transparent rounded-xl border border-slate-50 p-2 shadow-sm hover:shadow-lg hover:-translate-y-1 transition-all cursor-pointer"
        data-slug="${p.slug}" data-id="${p.id}" style="animation-delay:${
        i * 80
      }ms;">

        <div class="rounded-lg overflow-hidden mb-3 relative">
          <img src="${img}" class="w-full h-[150px] object-cover" alt="podcast-cover">
          <div class="absolute inset-0 bg-black/10 hover:bg-black/20 transition-all"></div>
        </div>

        <p class="text-[16px]  text-black truncate">${title}</p>

          <div class="flex items-center gap-2 text-gray-600 text-sm mt-2">
            <i class="fa fa-clock text-[11px] hover:text-black transition"></i>
            <span class="text-[14px] font-medium text-thaalam">${duration}</span>
        </div>

      </div>`;
    })
    .join("");

  list.innerHTML = `<div class="grid grid-cols-1 md:grid-cols-3  lg:grid-cols-4 gap-6 mt-6 ">${html}</div>`;
}

// ✅ Render Pagination Spotify vibe
function renderSpotifyPagination(total, current, paginationEl) {
  if (!paginationEl) return;

  if (total <= 1) {
    paginationEl.innerHTML = "";
    return;
  }

  let html = `<div class="flex items-center justify-center gap-3">`;

  if (current > 1) {
    html += `<button data-page="${
      current - 1
    }" class="p-2 hover:text-black transition"><i class="fa fa-arrow-left"></i></button>`;
  }

  for (let i = 1; i <= total; i++) {
    html += `
    <button data-page="${i}" 
      class="w-8 h-8 rounded-full flex items-center justify-center transition-all ${
        i === current
          ? "bg-thaalam text-white border-thaalam"
          : "border border-gray-200 text-gray-700 hover:bg-black hover:text-white"
      }">
      ${i}
    </button>`;
  }

  if (current < total) {
    html += `<button data-page="${
      current + 1
    }" class="p-2 hover:text-black transition"><i class="fa fa-arrow-right"></i></button>`;
  }

  html += `</div>`;
  paginationEl.innerHTML = html;
}

// ⭐ Debounce Helper
function debounce(fn, wait) {
  let t;
  return (...a) => {
    clearTimeout(t);
    t = setTimeout(() => fn(...a), wait);
  };
}

// ✅ Expose function globally so onclick works
window.fetchPodcasts = fetchPodcasts;

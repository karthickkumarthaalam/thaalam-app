document.addEventListener("DOMContentLoaded", () => {
  const slug = new URLSearchParams(location.search).get("slug");
  if (!slug) return showError("Invalid RJ Link");

  const API = `${window.API_BASE_URL}/rj-details/data/${slug}`;
  const content = document.getElementById("rj-content");

  initNavigation();

  fetch(API)
    .then((res) => res.json())
    .then(({ data }) => {
      if (!data) return showError("RJ Not Found");

      content.classList.remove("hidden");

      updateHero(data);
      renderPrograms(data.radio_programs);
      renderNews(data.news);
      renderPodcasts(data.podcasts);
      renderBlogs(data.blogs);
    })
    .catch(() => showError("Failed to load RJ details"));

  function showError(msg) {
    content.classList.remove("hidden");
    content.innerHTML = `<div class="empty">${msg}</div>`;
  }

  function updateHero(rj) {
    const profile = rj.image_url
      ? window.API_BASE_URL + "/" + rj.image_url.replace(/\\/g, "/")
      : "/assets/img/home/default-rj.jpg";

    const preload = new Image();
    preload.src = profile;

    const imgEl = document.getElementById("rj-image");
    imgEl.src = profile;
    imgEl.loading = "eager";
    imgEl.decoding = "async";
    document.getElementById("rj-name").textContent = rj.name;
    document.getElementById("rj-description").textContent =
      rj.description || "No description available";
  }

  function renderPrograms(programs = []) {
    const el = document.getElementById("rj-programs");
    const emptyel = document.getElementById("rj-programs-empty");

    if (!programs.length) {
      el.innerHTML = "";
      emptyel.innerHTML = empty("No radio shows");
      return;
    }

    // 🔑 Dynamic grid layout
    el.classList.remove("sm:grid-cols-2", "lg:grid-cols-3");
    if (programs.length === 1) {
      el.classList.add("grid-cols-1");
    } else if (programs.length === 2) {
      el.classList.remove("lg:grid-cols-3");
      el.classList.add("lg:grid-cols-2");
    } else {
      el.classList.add("sm:grid-cols-2", "lg:grid-cols-3");
    }

    el.innerHTML = programs
      .map((p) => {
        const pc = p.program_category ?? {};
        const img =
          pc.image_url || "/assets/images/site-images/default-banner.jpg";

        return `
        <div class="w-full max-w-sm group relative bg-white rounded-xl
                    border border-gray-100 overflow-hidden transition
                    hover:-translate-y-1 hover:shadow-lg">
          <div class="relative h-40 overflow-hidden">
            <img src="${img}"
                 class="w-full h-full object-cover
                        group-hover:scale-105 transition-transform duration-300">
            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent"></div>
          </div>

          <div class="p-4 space-y-1">
            <h4 class="font-semibold text-gray-900">
              ${pc.category || "Unnamed Show"}
            </h4>
            <p class="text-sm text-gray-500">
              ${pc.start_time?.slice(0, 5) || "N/A"} – ${pc.end_time?.slice(0, 5) || "N/A"}
            </p>
          </div>
        </div>
      `;
      })
      .join("");
  }

  function preciousItem({ link, img, title, meta }) {
    const alteredTitle =
      title && title.length > 50 ? title.slice(0, 50).trim() + "…" : title;

    return `
    <a href="${link}"
       class="group block">

      <div
        class="bg-white rounded-xl overflow-hidden
               border border-gray-100
               transition-all duration-300
               hover:shadow-md hover:-translate-y-0.5">

        <!-- Image -->
        <div class="relative h-40 bg-gray-100 overflow-hidden">
          <img src="${img}"
               class="w-full h-full object-cover
                      transition-transform duration-500
                      group-hover:scale-105">
        </div>

        <!-- Content -->
        <div class="p-4">
          <h3
            class="text-[16px] font-medium text-gray-900
                   leading-snug">
            ${alteredTitle}
          </h3>

          ${
            meta
              ? `
            <p class="mt-1 text-sm text-gray-500">
              ${meta}
            </p>`
              : ""
          }
        </div>

      </div>
    </a>
  `;
  }

  function applyCenteredGrid(el, itemsLength) {
    el.classList.remove("lg:grid-cols-2", "lg:grid-cols-3");

    if (itemsLength === 1) {
      el.classList.add("lg:grid-cols-1");
    } else if (itemsLength === 2) {
      el.classList.add("lg:grid-cols-2");
    } else {
      el.classList.add("lg:grid-cols-3");
    }
  }

  function renderNews(news = []) {
    const el = document.getElementById("rj-news");
    const emptyel = document.getElementById("rj-news-empty");
    if (!news.length) return (emptyel.innerHTML = empty("No news available"));
    applyCenteredGrid(el, news.length);

    el.innerHTML = news
      .map((n) =>
        preciousItem({
          link: `/news-details?slug=${n.slug}`,
          img: n.cover_image,
          title: n.title,
        }),
      )
      .join("");
  }

  function renderBlogs(blogs = []) {
    const el = document.getElementById("rj-blogs");
    const emptyel = document.getElementById("rj-blogs-empty");
    if (!blogs.length) return (emptyel.innerHTML = empty("No blogs available"));
    applyCenteredGrid(el, blogs.length);

    el.innerHTML = blogs
      .map((b) =>
        preciousItem({
          link: `/news-details?slug=${b.slug}`,
          img: b.cover_image,
          title: b.title,
        }),
      )
      .join("");
  }

  function renderPodcasts(podcasts = []) {
    const el = document.getElementById("rj-podcasts");
    const emptyel = document.getElementById("rj-podcasts-empty");
    if (!podcasts.length)
      return (emptyel.innerHTML = empty("No podcasts available"));
    applyCenteredGrid(el, podcasts.length);

    el.innerHTML = podcasts
      .map((p) =>
        preciousItem({
          link: `/podcast-details?id=${p.id}`,
          img:
            p.image_url ||
            "assets/img/common/podcast-details/podcast-banner.jpg",
          title: p.title,
        }),
      )
      .join("");
  }

  function empty(text) {
    return `
    <div class="flex flex-col items-center justify-center px-6 py-16 text-center">

      <!-- Illustration / Icon -->
      <div
        class="w-16 h-16 mb-3 rounded-full
               bg-gray-100 flex items-center justify-center">
          <i class="fas fa-search text-2xl text-gray-400"></i>

      </div>

      <!-- Title -->
      <h3 class="text-base font-medium text-gray-900">
        ${text || "There’s no content available right now. Please check back later."}
      </h3>

      <!-- Optional Action -->
      <button
        onclick="window.location.reload()"
        class="mt-6 inline-flex items-center gap-2
               text-sm font-medium text-red-600
               hover:text-red-700 transition">
        Refresh
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="1.5"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M4.5 12a7.5 7.5 0 0113.5-4.5M19.5 12a7.5 7.5 0 01-13.5 4.5" />
        </svg>
      </button>

    </div>
  `;
  }

  function initNavigation() {
    const tabs = document.querySelectorAll(".tab-btn");
    const sections = document.querySelectorAll(".tab-content");
    const indicator = document.getElementById("tab-indicator");

    function activate(tab) {
      tabs.forEach((t) => {
        t.classList.remove("active", "text-red-600", "font-semibold");
        t.classList.add("text-gray-500", "font-medium");
      });

      tab.classList.add("active", "text-red-600", "font-semibold");
      tab.classList.remove("text-gray-500", "font-medium");

      sections.forEach((sec) =>
        sec.classList.toggle("hidden", sec.id !== tab.dataset.target),
      );

      // Move underline
      indicator.style.width = `${tab.offsetWidth}px`;
      indicator.style.left = `${tab.offsetLeft}px`;
    }

    tabs.forEach((tab) => tab.addEventListener("click", () => activate(tab)));

    // Init default
    activate(tabs[0]);
  }
});

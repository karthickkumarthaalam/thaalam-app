(function () {
  "use strict";

  const apiBase = window.API_BASE_URL;
  const fallbackImage = "assets/img/logo/thalam-logo.png";

  const escapeHtml = (value = "") =>
    String(value).replace(
      /[&<>'\"]/g,
      (char) =>
        ({
          "&": "&amp;",
          "<": "&lt;",
          ">": "&gt;",
          "'": "&#039;",
          '"': "&quot;",
        })[char],
    );
  const slugify = (value = "") =>
    String(value)
      .trim()
      .toLowerCase()
      .replace(/[^a-z0-9]+/g, "-")
      .replace(/(^-|-$)/g, "");
  const imageUrl = (image) =>
    image
      ? `${apiBase}/${String(image).replace(/\\/g, "/").replace(/^\/+/, "")}`
      : fallbackImage;

  function initReveal() {
    const items = document.querySelectorAll(".home-reveal");
    const observer = new IntersectionObserver(
      (entries) =>
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            observer.unobserve(entry.target);
          }
        }),
      { threshold: 0.12 },
    );
    items.forEach((item) => observer.observe(item));
  }

  async function loadRjs() {
    const container = document.getElementById("home-rj-list");
    if (!container) return;
    try {
      const response = await fetch(`${apiBase}/system-user/all-profile`);
      if (!response.ok) throw new Error("RJ request failed");
      const rjs = (await response.json()).data || [];
      if (!rjs.length) throw new Error("No RJ profiles");
      const cards = rjs
        .map((rj) => {
          const name = escapeHtml(rj.name || "Thaalam RJ");
          const show = escapeHtml(
            rj.shows?.[0]?.category?.trim() || "Thaalam Radio",
          );
          const bio = escapeHtml(
            rj.bio ||
              "Bringing music, conversations and good energy to Thaalam listeners.",
          );
          const href = `rj-details?slug=${encodeURIComponent(slugify(rj.name))}`;
          return `<a href="${href}" class="rj-card group block shrink-0 rounded-3xl border border-slate-200 bg-white p-3 shadow-sm transition duration-300 hover:-translate-y-2 hover:border-red-200 hover:shadow-xl">
                    <div class="relative overflow-hidden rounded-2xl bg-slate-100">
                        <img src="${imageUrl(rj.image)}" alt="${name}" class="h-64 w-full object-cover object-top transition duration-500 group-hover:scale-105" loading="lazy">
                    </div>
                    <div class="px-1 pb-2 pt-4">
                        <p class="text-[10px] font-black uppercase tracking-[.22em] text-red-500">Radio Jockey</p>
                        <h3 class="mt-1 text-xl font-bold text-slate-950">${name}</h3>
                        <p class="mt-2 line-clamp-2 text-sm leading-6 text-slate-500">${bio}</p>
                        <span class="mt-4 inline-flex items-center gap-2 text-xs font-bold text-slate-800 group-hover:text-red-500">View profile <i class="fas fa-arrow-right text-[10px]"></i>
                        </span>
                    </div>
                    </a>`;
        })
        .join("");
      container.innerHTML = `<div class="rj-track">${cards}${cards}${cards}</div>`;
    } catch (error) {
      console.error("Unable to load RJs", error);
      container.innerHTML =
        '<p class="py-8 text-center text-sm text-slate-400">Our RJ profiles are unavailable right now. Please try again shortly.</p>';
    }
  }

  async function loadPodcasts() {
    const container = document.getElementById("new-podcasts");
    if (!container) return;
    container.innerHTML = Array.from(
      { length: 4 },
      () =>
        `<div class="animate-pulse overflow-hidden rounded-3xl border border-slate-100">
                <div class="h-44 bg-slate-100"></div>
                <div class="space-y-3 p-5">
                    <div class="h-3 w-1/3 rounded bg-slate-100"></div>
                    <div class="h-5 rounded bg-slate-100"></div>
                </div>
            </div>`,
    ).join("");
    try {
      const response = await fetch(
        `${apiBase}/podcasts?status=approved&limit=4`,
      );
      if (!response.ok) throw new Error("Podcast request failed");
      const podcasts = (await response.json())?.data?.data || [];
      if (!podcasts.length) throw new Error("No podcasts");
      const cards = podcasts
        .slice(0, 4)
        .map((podcast) => {
          const title = escapeHtml(podcast.title || "Thaalam Podcast");
          const duration = escapeHtml(`${podcast.duration ?? 0} min`);
          const image = escapeHtml(
            podcast.image_url ||
              "assets/img/common/podcast-details/podcast-banner.jpg",
          );

          return `
<a href="podcast-details?id=${encodeURIComponent(podcast.id)}"
   class="group podcast-card block shrink-0 overflow-hidden rounded-xl border border-slate-100 bg-white p-2 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg">

    <div class="relative mb-3 overflow-hidden rounded-lg">
        <img
            src="${image}"
            alt="${title}"
            class="h-[170px] w-full object-cover transition duration-500 group-hover:scale-105">

        <div class="absolute bottom-3 right-3 rounded-full bg-white/95 px-3 py-1 text-xs font-semibold text-slate-700 shadow-sm">
            <i class="far fa-clock mr-1 text-red-500"></i>
            ${duration}
        </div>
    </div>

    <div class="px-1 pb-2">
        <span class="inline-flex items-center rounded-full bg-red-50 px-2.5 py-1 text-[10px] font-bold uppercase tracking-wider text-red-600">
            Podcast
        </span>

        <h3 class="mt-3 line-clamp-2 min-h-[3.4rem] text-[17px] font-semibold leading-7 text-slate-900 group-hover:text-red-600">
            ${title}
        </h3>
    </div>

</a>`;
        })
        .join("");

      container.innerHTML = `
    <div class="podcast-track">
        ${cards}
        ${cards}
        ${cards}
    </div>
`;
    } catch (error) {
      console.error("Unable to load podcasts", error);
      container.innerHTML =
        '<p class="col-span-full py-8 text-center text-sm text-slate-400">Podcasts are unavailable right now. Please try again shortly.</p>';
    }
  }

  async function loadPopupBanner() {
    const popup = document.getElementById("popupBanner");
    const image = document.getElementById("popupBanner-image");
    const closeButton = document.getElementById("close-popupBanner");
    if (!popup || !image || !closeButton) return;

    const hidePopupBanner = () => {
      popup.classList.add("hidden");
      popup.classList.remove("flex");
      document.body.style.overflow = "";
    };

    const showPopupBanner = () => {
      popup.classList.remove("hidden");
      popup.classList.add("flex");
      document.body.style.overflow = "hidden";
    };

    closeButton.addEventListener("click", hidePopupBanner);
    popup.addEventListener("click", (event) => {
      if (event.target.id === "popupBanner") {
        hidePopupBanner();
      }
    });

    try {
      const response = await fetch(`${apiBase}/popup-banner?status=active`);
      if (!response.ok) throw new Error("Popup banner request failed");
      const banner = (await response.json())?.data?.[0];
      if (!banner) return;

      image.src = imageUrl(banner.website_image);
      if (banner.status === "active") {
        showPopupBanner();
      }
    } catch (error) {
      console.error("Unable to load popup banner", error);
    }
  }

  document.addEventListener("DOMContentLoaded", () => {
    initReveal();
    loadRjs();
    loadPodcasts();
    loadPopupBanner();
  });
})();

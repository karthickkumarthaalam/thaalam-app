document.addEventListener("DOMContentLoaded", function () {
  const rjList = document.getElementById("rj-list");

  function slugify(name) {
    return name.toLowerCase().replace(/\s+/g, "-");
  }

  function socialLink(rj, platform) {
    return rj.socialLinks?.[platform] || "#";
  }

  if (!rjList) return;

  // Trigger header animation
  const header = document.querySelector(".rj-fade-up");
  if (header) setTimeout(() => header.classList.add("visible"), 100);

  // IntersectionObserver for scroll-triggered card animations
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
          observer.unobserve(entry.target);
        }
      });
    },
    { threshold: 0.15 },
  );

  rjList.innerHTML = Array(4)
    .fill(
      `
    <div class="animate-pulse flex bg-white rounded-3xl overflow-hidden shadow-sm border border-gray-100 h-80">
      <div class="w-2/6 bg-gray-200"></div>
      <div class="w-4/6 p-10 flex flex-col justify-center gap-3">
        <div class="h-2 bg-gray-100 rounded w-1/4"></div>
        <div class="h-7 bg-gray-200 rounded w-2/3"></div>
        <div class="h-2 bg-gray-100 rounded w-1/2 mt-1"></div>
        <div class="h-2 bg-gray-100 rounded w-2/5"></div>
        <div class="flex gap-2 mt-3">
          <div class="h-9 w-9 bg-gray-100 rounded-full"></div>
          <div class="h-9 w-9 bg-gray-100 rounded-full"></div>
          <div class="h-9 w-9 bg-gray-100 rounded-full"></div>
        </div>
        <div class="h-10 bg-gray-100 rounded-xl w-36 mt-2"></div>
      </div>
    </div>
  `,
    )
    .join("");

  fetch(`${window.API_BASE_URL}/system-user/all-profile`)
    .then((res) => res.json())
    .then((res) => {
      const data = res.data || [];
      rjList.innerHTML = "";

      data.forEach((rj, index) => {
        const slug = slugify(rj.name);
        const profile = rj.image
          ? window.API_BASE_URL + "/" + rj.image.replace(/\\/g, "/")
          : "/assets/img/home/default-rj.jpg";

        const imageLeft = index % 2 === 0;

        const showsHTML =
          rj.shows && rj.shows.length
            ? `<div class="rj-shows mt-3 space-y-2">
              ${rj.shows
                .slice(0, 2)
                .map(
                  (show) => `
                <div class="flex items-center gap-2 text-xs text-gray-500">
                  <span class="w-1.5 h-1.5 rounded-full bg-red-400 flex-shrink-0"></span>
                  <span class="font-semibold text-gray-600">${show.category.trim()}</span>
                  <span class="ml-auto tabular-nums font-medium">${show.startTime.slice(0, 5)} – ${show.endTime.slice(0, 5)}</span>
                </div>`,
                )
                .join("")}
             </div>`
            : `<div class="rj-shows"></div>`;

        const imageBlock = `
          <div class="rj-img-wrap relative w-2/6 flex-shrink-0 bg-gray-100">
            <img src="${profile}" alt="${rj.name}" loading="lazy"
                 class="w-full h-full object-cover object-top" />
            <!-- shimmer overlay on load -->
            <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent
                        -translate-x-full animate-[shimmer_1.5s_ease_1]"></div>
          </div>`;

        const contentBlock = `
          <div class="rj-content flex-1 flex flex-col justify-center px-10 py-8">
            <div class="rj-line mb-4"></div>
            <span class="rj-tag text-xs font-bold text-red-500 uppercase tracking-[0.2em]">Radio Jockey</span>
            <h3 class="rj-name mt-2 text-xl font-bold text-gray-900 ">${rj.name.trim()}</h3>
            ${showsHTML}
            <div class="rj-actions flex items-center gap-3 mt-6">
              <a href="${socialLink(rj, "whatsapp")}" onclick="event.stopPropagation()" aria-label="WhatsApp"
                 class="rj-social w-10 h-10 rounded-full border-2 border-gray-100 flex items-center justify-center
                        text-gray-400 hover:border-green-400 hover:text-green-500 hover:bg-green-50">
                <i class="fab fa-whatsapp text-base"></i>
              </a>
              <a href="${socialLink(rj, "instagram")}" onclick="event.stopPropagation()" aria-label="Instagram"
                 class="rj-social w-10 h-10 rounded-full border-2 border-gray-100 flex items-center justify-center
                        text-gray-400 hover:border-pink-400 hover:text-pink-500 hover:bg-pink-50">
                <i class="fab fa-instagram text-base"></i>
              </a>
              <a href="${socialLink(rj, "facebook")}" onclick="event.stopPropagation()" aria-label="Facebook"
                 class="rj-social w-10 h-10 rounded-full border-2 border-gray-100 flex items-center justify-center
                        text-gray-400 hover:border-blue-400 hover:text-blue-500 hover:bg-blue-50">
                <i class="fab fa-facebook-f text-base"></i>
              </a>
              <button class="rj-btn ml-2 flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold
                             text-white bg-red-500 hover:bg-red-600 shadow-md shadow-red-200
                             hover:shadow-red-300 hover:scale-105 active:scale-95 transition-all duration-300">
                View Profile
                <svg class="w-4 h-4 transition-transform duration-300 group-hover:translate-x-1"
                     fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
          </div>`;

        const card = document.createElement("div");
        card.className = `rj-card cursor-pointer group ${imageLeft ? "rj-slide-left" : "rj-slide-right"}`;
        card.innerHTML = `
<article class="flex h-80 backdrop-blur-sm rounded-3xl overflow-hidden
                shadow-[0_2px_20px_rgba(0,0,0,0.06)]
                transition-all duration-500 ${imageLeft ? "" : "flex-row-reverse"}">
  ${imageBlock}
  <!-- Vertical divider -->
  <div class="w-px bg-transparent  flex-shrink-0"></div>
  ${contentBlock}
</article>`;

        card.addEventListener("click", () => {
          window.location.href = `/rj-details?slug=${slug}`;
        });

        rjList.appendChild(card);
        observer.observe(card);
      });
    })
    .catch((err) => {
      console.error("Error fetching RJ details:", err);
      rjList.innerHTML = `
        <div class="text-center py-16">
          <div class="w-16 h-16 mx-auto mb-4 bg-red-50 rounded-full flex items-center justify-center">
            <i class="fas fa-exclamation-triangle text-red-400 text-xl"></i>
          </div>
          <h3 class="text-base font-semibold text-gray-900 mb-1">Unable to load RJ profiles</h3>
          <p class="text-sm text-gray-400 mb-5">Please check your connection and try again.</p>
          <button onclick="location.reload()"
                  class="px-6 py-2.5 bg-red-500 text-white text-sm font-semibold rounded-xl
                         hover:bg-red-600 shadow-md shadow-red-200 transition-all duration-200">
            Try Again
          </button>
        </div>`;
    });
});

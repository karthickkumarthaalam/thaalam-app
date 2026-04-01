document.addEventListener("DOMContentLoaded", function () {
  const rjList = document.getElementById("rj-list");
  if (!rjList) return;

  // Trigger hero animation
  const hero = document.querySelector(".rj-fade-up");
  if (hero) setTimeout(() => hero.classList.add("visible"), 100);

  // IntersectionObserver for card scroll-in
  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((e) => {
        if (e.isIntersecting) {
          e.target.classList.add("visible");
          observer.unobserve(e.target);
        }
      });
    },
    { threshold: 0.15 }
  );

  function slugify(name) {
    return name.toLowerCase().replace(/\s+/g, "-");
  }

  function socialHref(rj, platform) {
    return rj.socialLinks?.[platform] || "#";
  }

  function stars(n = 5) {
    return Array.from({ length: n })
      .map(() => `<svg class="w-4 h-4 fill-red-500 text-red-500" viewBox="0 0 24 24"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/></svg>`)
      .join("");
  }

  fetch(`${window.API_BASE_URL}/system-user/all-profile`)
    .then((r) => r.json())
    .then((res) => {
      const data = res.data || [];
      rjList.innerHTML = "";

      if (!data.length) {
        rjList.innerHTML = `<p class="text-center text-gray-400 py-20">No RJ profiles found.</p>`;
        return;
      }

      data.forEach((rj, idx) => {
        const isEven   = idx % 2 === 0;
        const slug     = slugify(rj.name);
        const imgSrc   = rj.image
          ? `${window.API_BASE_URL}/${rj.image.replace(/\\/g, "/")}`
          : "assets/img/logo/thalam-logo.png";

        // show-time chips (up to 2)
        const showChips = (rj.shows || []).slice(0, 2).map((s) => `
          <div class="flex items-center gap-2.5 rounded-xl border border-gray-200 bg-gray-50 px-4 py-3 shadow-sm">
            <svg class="w-4 h-4 text-red-500 shrink-0" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
            </svg>
            <div>
              <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">${s.category.trim()}</p>
              <p class="text-sm font-semibold text-gray-800">${s.startTime.slice(0,5)} – ${s.endTime.slice(0,5)}</p>
            </div>
          </div>`).join("");

        // social links
        const socials = [
          { platform: "instagram", icon: "fab fa-instagram", hover: "hover:border-pink-400 hover:text-pink-500 hover:bg-pink-50" },
          { platform: "facebook",  icon: "fab fa-facebook-f", hover: "hover:border-blue-400 hover:text-blue-500 hover:bg-blue-50" },
          { platform: "whatsapp",  icon: "fab fa-whatsapp",   hover: "hover:border-green-400 hover:text-green-500 hover:bg-green-50" },
        ].map((s) => `
          <a href="${socialHref(rj, s.platform)}" onclick="event.stopPropagation()" aria-label="${s.platform}"
             class="w-10 h-10 rounded-full border-2 border-gray-200 flex items-center justify-center
                    text-gray-400 transition-all duration-200 hover:-translate-y-1 ${s.hover}">
            <i class="${s.icon} text-sm"></i>
          </a>`).join("");

        // image block
        const imgBlock = `
          <div class="rj-img-block relative w-full lg:w-2/5 shrink-0">
            <!-- offset decorative border -->
            <div class="rj-offset absolute -top-4 h-full w-full rounded-3xl border-2 border-red-200
                        ${isEven ? "-left-4" : "-right-4"}"></div>
            <!-- image -->
            <div class="rj-img-wrap relative overflow-hidden rounded-3xl shadow-2xl">
              <img src="${imgSrc}" alt="${rj.name}"
                   class="w-full h-[400px] object-cover object-top" loading="lazy" />
              <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent"></div>
              <!-- show badge -->
              ${rj.shows?.length ? `
              <div class="absolute bottom-5 left-5 rounded-full bg-red-500 px-4 py-1.5
                          text-[11px] font-black uppercase tracking-wider text-white shadow-lg">
                ${rj.shows[0].category.trim()}
              </div>` : ""}
            </div>
          </div>`;

        // content block
        const contentBlock = `
          <div class="flex-1 space-y-5">
            <div>
              <p class="rj-tag text-[11px] font-black uppercase tracking-[.3em] text-red-500 mb-2">Radio Jockey</p>
              <div class="rj-line mb-3"></div>
              <h2 class="rj-name text-3xl md:text-4xl font-bold text-gray-900">${rj.name.trim()}</h2>
            </div>

            <p class="rj-desc text-sm text-gray-500 leading-relaxed">
              ${rj.bio || `${rj.name.trim()} is one of Thaalam Radio's beloved voices, bringing energy and passion to every show. Tune in and experience the magic live.`}
            </p>

            ${showChips ? `<div class="rj-chips flex flex-wrap gap-3 pt-1">${showChips}</div>` : ""}

            <div class="rj-stars flex items-center gap-1 pt-1">
              ${stars(5)}
              <span class="ml-2 text-xs text-gray-400 font-medium">Live Performer</span>
            </div>

            <div class="flex flex-wrap items-center gap-3 pt-2">
              ${socials}
              <button onclick="window.location.href='/rj-details?slug=${slug}'"
                      class="rj-btn ml-1 flex items-center gap-2 px-6 py-2.5 rounded-xl text-sm font-bold
                             text-white bg-red-500 hover:bg-red-600 shadow-md shadow-red-200
                             hover:shadow-red-300 hover:scale-105 active:scale-95 transition-all duration-300">
                View Profile
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                </svg>
              </button>
            </div>
          </div>`;

        const card = document.createElement("div");
        card.className = `rj-card cursor-pointer ${isEven ? "rj-slide-l" : "rj-slide-r"}`;
        card.innerHTML = `
          <div class="flex flex-col gap-12 items-center ${isEven ? "lg:flex-row" : "lg:flex-row-reverse"}">
            ${imgBlock}
            ${contentBlock}
          </div>`;

        card.addEventListener("click", (e) => {
          if (e.target.closest("a")) return;
          window.location.href = `/rj-details?slug=${slug}`;
        });

        rjList.appendChild(card);
        observer.observe(card);
      });
    })
    .catch((err) => {
      console.error("RJ fetch error:", err);
      rjList.innerHTML = `
        <div class="text-center py-20">
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

document.addEventListener("DOMContentLoaded", function () {
  const rjList = document.getElementById("rj-list");

  function slugify(name) {
    return name.toLowerCase().replace(/\s+/g, "-");
  }

  if (!rjList) return;

  fetch(`${window.API_BASE_URL}/system-user/all-profile`)
    .then((response) => response.json())
    .then((res) => {
      const data = res.data || [];
      data.forEach((rj) => {
        const slug = slugify(rj.name);
        const profile = rj.image
          ? window.API_BASE_URL + "/" + rj.image.replace(/\\/g, "/")
          : "/assets/img/home/default-rj.jpg";

        const card = document.createElement("div");

        const showsHTML =
          rj.shows && rj.shows.length
            ? `
      <div class="mt-4 space-y-3 ">
        ${rj.shows
          .map(
            (show) => `
              <div class="flex flex-col items-center text-sm">
                <span class="text-gray-800 font-semibold">
                  ${show.category.trim()}
                </span>
                <span class="text-gray-600 text-xs font-semibold mt-0.5">
                  ${show.startTime.slice(0, 5)} – ${show.endTime.slice(0, 5)}
                </span>
              </div>
            `,
          )
          .join("")}
      </div>
    `
            : "";

        card.innerHTML = `
<article
  class="group cursor-pointer relative
bg-gradient-to-br from-white via-slate-50 to-neutral-100/60
         rounded-3xl
         border border-red-100/60
         shadow-sm
         transition-all duration-300 ease-out
         hover:shadow-2xl hover:-translate-y-1.5
         hover:border-red-200
         overflow-hidden flex items-center justify-center">
              <div class="absolute top-0 left-0 h-[2px] w-full overflow-hidden bg-gradient-to-r from-transparent via-indigo-500 to-transparent"></div>

 <div class="absolute bottom-0 left-0 h-[2px] w-full overflow-hidden bg-gradient-to-r from-transparent via-indigo-500 to-transparent"></div>


    <div class="flex flex-col items-center w-full  px-8 pb-4 pt-8">

      <!-- Avatar -->
      <div class="relative mb-6">
        <div
          class="w-40 h-40 rounded-2xl overflow-hidden
                 bg-gray-100">
          <img src="${profile}"
               alt="${rj.name}"
               loading="lazy"
               class="w-full h-full object-cover
                      transition-transform duration-500
                      group-hover:scale-110" />
        </div>
      </div>
              <h3
        class="text-lg font-semibold text-gray-600 ">
        ${rj.name.trim()}
      </h3>

      <!-- Role -->
      <p class="mt-2 text-sm text-sky-700 px-3 py-2  rounded-3xl bg-blue-50 border border-sky-500">
        Radio Host
      </p>

      ${showsHTML}

      <!-- CTA -->
      <span
        class="mt-6 inline-flex items-center gap-2
               text-sm font-medium text-red-600
               opacity-0 group-hover:opacity-100
               transition">
        View Profile
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
             viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round"
                d="M9 5l7 7-7 7" />
        </svg>
      </span>
        </div>

  </article>
`;

        card.classList.add("mb-4", "last:mb-0");

        // Card Click Handler
        card.addEventListener("click", () => {
          // Don't redirect if clicking toggle button or view profile button

          window.location.href = `/rj-details?slug=${slug}`;
        });

        rjList.appendChild(card);
      });
    })
    .catch((err) => {
      console.error("Error fetching RJ details:", err);
      // Add error state UI
      rjList.innerHTML = `
      <div class="text-center py-12">
        <div class="w-20 h-20 mx-auto mb-4
                    bg-gradient-to-br from-gray-100 to-gray-200
                    rounded-2xl
                    flex items-center justify-center">
          <i class="fas fa-exclamation-triangle text-gray-400 text-2xl"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900 mb-2">
          Unable to load RJ profiles
        </h3>
        <p class="text-gray-600 mb-4">
          Please check your connection and try again.
        </p>
        <button onclick="location.reload()"
                class="px-6 py-2
                       bg-gradient-to-r from-gray-900 to-gray-800
                       text-white font-medium
                       rounded-xl
                       hover:shadow-lg
                       transition-all">
          Try Again
        </button>
      </div>
    `;
    });
});

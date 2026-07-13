document.addEventListener("DOMContentLoaded", function () {
  const hero = document.querySelector(".show-fade-up");
  if (hero) setTimeout(() => hero.classList.add("visible"), 100);

  const showList = document.getElementById("show-list");
  if (!showList) return;

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

  const formatTime = (value) => {
    if (!value) return "--:--";
    return typeof value === "string" && value.length >= 5
      ? value.slice(0, 5)
      : value;
  };

  const premiumPill = (label) => `
    <span class="inline-flex items-center rounded-full border border-red-200 bg-red-50 px-3 py-1 text-[10px] font-black uppercase tracking-[0.28em] text-red-600">
      ${label}
    </span>`;

  const normalizeShow = (show = {}) => ({
    id: show.id,
    category: show.category || show.name || "Untitled Show",
    start_time: show.start_time || show.startTime || "",
    end_time: show.end_time || show.endTime || "",
    country: show.country || "Switzerland",
    status: show.status || "active",
    image_url: show.image_url || show.imageUrl || null,
  });

  const renderShows = (shows = []) => {
    showList.innerHTML = "";

    if (!shows.length) {
      showList.innerHTML = `<div class="col-span-full rounded-3xl border border-dashed border-gray-200 bg-gray-50 py-16 text-center text-sm text-gray-500">No shows available right now.</div>`;
      return;
    }

    shows.forEach((show, index) => {
      const item = normalizeShow(show);
      const card = document.createElement("article");
      const isEven = index % 2 === 0;
      card.className = `show-card py-6 lg:py-16 group relative overflow-hidden rounded-[34px] transition-all duration-700 ${isEven ? "show-card-left" : "show-card-right"}`;
      const description = item?.description
        ? item.description
        : "A thoughtfully curated broadcast experience that brings atmosphere, music, and meaningful conversation to the air.";
      const imageMarkup = item.image_url
        ? `
          <div class="relative overflow-hidden rounded-[28px] w-[100%] lg:w-[46%] lg:shrink-0">
            <img src="${item.image_url}" alt="${item.category}" class="show-card-image h-full w-full object-cover transition duration-700" loading="lazy" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/45 via-black/10 to-transparent"></div>
          </div>`
        : `
          <div class="show-card-image relative flex h-64 w-full items-center justify-center overflow-hidden rounded-[28px] bg-[radial-gradient(circle_at_top_left,_rgba(255,255,255,0.35),_transparent_40%),linear-gradient(135deg,#ef4444_0%,#f43f5e_45%,#fb923c_100%)] text-white lg:w-[46%] lg:shrink-0 lg:h-full">
            <div class="absolute inset-0 bg-[linear-gradient(110deg,transparent_0%,rgba(255,255,255,0.15)_50%,transparent_100%)]"></div>
            <div class="relative text-center">
              <div class="mx-auto mb-3 flex h-14 w-14 items-center justify-center rounded-full border border-white/40 bg-white/20 shadow-lg backdrop-blur">
                <svg class="h-7 w-7" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
                </svg>
              </div>
              <p class="text-[11px] font-black uppercase tracking-[.35em]">Live Show</p>
            </div>
          </div>`;
      card.innerHTML = `
<div class="group relative border-b border-gray-200 py-2 transition-all duration-500 hover:border-red-500">
    <div class="flex flex-col gap-10 lg:flex-row lg:items-start lg:justify-between">
        <div class="flex-1 pl-0 lg:pl-6">

            <div class="flex items-center gap-3">

                <span class="text-[11px] font-bold uppercase tracking-[0.35em] text-red-500">
                    ${item.country}
                </span>

                <span class="h-px w-12 bg-red-200"></span>

            </div>

            <h2 class="mt-5 text-2xl  lg:text-3xl font-bold tracking-tight text-gray-900 transition-colors duration-300 ">
                ${item.category.trim()}
            </h2>

            <p class="mt-6 max-w-3xl text-[15px] leading-8 text-gray-600">
                ${description}
            </p>

        </div>

   <div class="lg:min-w-[240px] flex flex-col gap-8">

    <div class="flex items-start gap-4">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-red-50 text-red-500">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
            </svg>
        </div>

        <div>
            <p class="text-[11px] uppercase tracking-[0.35em] text-gray-400">
                Broadcast Time
            </p>

            <p class="mt-1 text-lg font-semibold text-gray-900">
                ${formatTime(item.start_time)} – ${formatTime(item.end_time)}
            </p>
        </div>
    </div>

    <div class="h-px bg-gray-200"></div>

    <div class="hidden lg:flex items-start gap-4">
        <div class="flex h-11 w-11 items-center justify-center rounded-full bg-red-50 text-red-500">
            <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l7 4v6c0 5-3.5 8.5-7 10-3.5-1.5-7-5-7-10V6l7-4z"/>
            </svg>
        </div>

        <div>
            <p class="text-[11px] uppercase tracking-[0.35em] text-gray-400">
                Region
            </p>

            <p class="mt-1 text-lg font-semibold text-gray-900">
                ${item.country}
            </p>
        </div>
    </div>

</div>

    </div>

</div>
`;
      showList.appendChild(card);
      observer.observe(card);
    });
  };

  showList.innerHTML = `<div class="col-span-full rounded-3xl border border-dashed border-gray-200 bg-gray-50 py-16 text-center text-sm text-gray-500">Loading shows...</div>`;

  fetch(`${window.API_BASE_URL}/program-category/public`)
    .then((response) => response.json())
    .then((res) => {
      const shows = Array.isArray(res) ? res : res?.data || [];
      renderShows(shows);
    })
    .catch((err) => {
      console.error(err);
      showList.innerHTML = `<div class="col-span-full rounded-3xl border border-dashed border-gray-200 bg-gray-50 py-16 text-center text-sm text-gray-500">Unable to load shows right now.</div>`;
    });
});

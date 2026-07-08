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
        <div class="flex flex-col gap-6 p-2 lg:items-center lg:p-6 ${isEven ? "lg:flex-row-reverse" : "lg:flex-row"}">
          ${imageMarkup}
          <div class="flex-1 space-y-5">
            <div class="space-y-3">
              <div class="flex flex-wrap items-center gap-2">
                <span class="text-[11px] font-black uppercase tracking-[0.3em] text-gray-400">${item.country}</span>
              </div>
              <h3 class="text-xl md:text-3xl font-bold tracking-tight text-gray-900">${item.category.trim()}</h3>
                            <div class="show-line mb-2"></div>
              <p class="text-sm leading-7 text-gray-600">
              ${description}
              </p>
            </div>

            <div class="flex flex-wrap gap-3">
              <div class="flex min-w-[150px] items-center gap-2 rounded-2xl border border-gray-200/80 bg-gray-50 px-3 py-2.75 shadow-sm">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-50 text-red-500">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2m6-2a10 10 0 11-20 0 10 10 0 0120 0z"/>
                  </svg>
                </div>
                <div>
                  <p class="text-[10px] font-black uppercase tracking-[.25em] text-gray-400">Time</p>
                  <p class="text-sm font-semibold text-gray-800">${formatTime(item.start_time)} – ${formatTime(item.end_time)}</p>
                </div>
              </div>
              <div class="hidden md:flex min-w-[150px] items-center gap-2 rounded-2xl border border-gray-200/80 bg-gray-50 px-3 py-2.75 shadow-sm">
                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-red-50 text-red-500">
                  <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 2l7 4v6c0 5-3.5 8.5-7 10-3.5-1.5-7-5-7-10V6l7-4z"/>
                  </svg>
                </div>
                <div>
                  <p class="text-[10px] font-black uppercase tracking-[.25em] text-gray-400">Region</p>
                  <p class="text-sm font-semibold text-gray-800">${item.country}</p>
                </div>
              </div>
            </div>
          </div>
        </div>`;

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

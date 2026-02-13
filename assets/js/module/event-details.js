document.addEventListener("DOMContentLoaded", () => {
  const slug = new URLSearchParams(location.search).get("slug");
  if (!slug) return;

  queueMicrotask(generateParticles);
  fetchEventDetails(slug);
});

/* ============================================================
    PARTICLES – Optimized (Fragment + GPU styles)
============================================================ */
function generateParticles() {
  const container = document.querySelector(".bg-particles");
  if (!container) return;

  const COUNT = 35;
  const types = ["p1", "p2", "p3"];

  const frag = document.createDocumentFragment();
  const vw = window.innerWidth;
  const vh = window.innerHeight;

  for (let i = 0; i < COUNT; i++) {
    const p = document.createElement("div");
    p.className = `particle ${types[(Math.random() * 3) | 0]}`;
    const size = Math.random() * 6 + 2;

    p.style.cssText = `
      width:${size}px;
      height:${size}px;
      left:${Math.random() * vw}px;
      top:${Math.random() * vh}px;
      animation-duration:${Math.random() * 10 + 12}s;
      will-change: transform;
    `;

    frag.appendChild(p);
  }

  container.appendChild(frag);
}

/* ============================================================
    FETCH EVENT DETAILS – Optimized (Abort + Timeout)
============================================================ */
async function fetchEventDetails(slug) {
  const controller = new AbortController();

  const timeout = setTimeout(() => controller.abort(), 10000);

  try {
    const res = await fetch(`${window.API_BASE_URL}/event/details/${slug}`, {
      signal: controller.signal,
    });

    clearTimeout(timeout);

    if (!res.ok) throw new Error("Invalid response");

    const { status, data } = await res.json();
    if (status !== "success" || !data) return renderError();

    // Lazy batch rendering via requestIdleCallback
    requestIdleCallback(() => renderHero(data), { timeout: 200 });
    requestIdleCallback(() => renderDescription(data), { timeout: 200 });
    requestIdleCallback(() => renderBanner(data.banners), { timeout: 200 });
    requestIdleCallback(() => renderCrew(data.crew_members), { timeout: 200 });
    requestIdleCallback(() => renderAmenities(data.amenities), {
      timeout: 200,
    });
    requestIdleCallback(() => renderContactDetails(data.id), { timeout: 200 });
    requestIdleCallback(() => renderHeaderContact(data.id), { timeout: 200 });
  } catch (e) {
    if (e.name !== "AbortError") renderError();
  }
}

function renderError() {
  const el = document.getElementById("event-details-container");
  if (!el) return;
  el.innerHTML = `
    <div class="error-message">
      <h2>Error loading event details</h2>
    </div>`;
}

function renderHeader(event) {
  const logos = document.querySelectorAll(".headerLogo");

  logos.forEach((logo) => {
    logo.src = event.logo_image || "assets/img/logo/thalam-logo.png";
    logo.alt = event.title || "Event Logo";
  });
}

/* ============================================================
    HERO SECTION – Optimized
============================================================ */
function renderHero(event) {
  const container = document.getElementById("event-header-section");
  document.getElementById("event_id").value = event.id;

  if (!container) return;
  renderHeader(event);
  container.innerHTML = `
    <section class="relative py-20  text-white overflow-hidden bg-gradient-to-br from-gray-900 to-black">

      <div class="absolute inset-0 pointer-events-none overflow-hidden">
        <div class="absolute top-10 left-10 w-72 h-72 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-cyan-500/5 rounded-full blur-3xl"></div>
        
        <div class="absolute inset-0" style="
          background-image: 
            linear-gradient(to right, rgba(255,255,255,0.03) 1px, transparent 1px),
            linear-gradient(to bottom, rgba(255,255,255,0.03) 1px, transparent 1px);
          background-size: 40px 40px;
        "></div>
      </div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1  gap-12 lg:gap-20 items-center">

          <div class="flex flex-col items-center text-center lg:text-left space-y-7">

            ${
              event.logo_image
                ? `<div>
                    <img
                      src="${event.logo_image}"
                      alt="${event.title}"
                      class="h-24 md:h-32 object-contain"
                      loading="lazy"
                    />
                  </div>`
                : ""
            }

            <!-- Title -->
            <h1 class="text-3xl md:text-4xl xl:text-5xl font-semibold leading-snug text-slate-100 max-w-xl">
              ${event.title}
            </h1>

            <!-- Meta Cards -->
            <div class="flex flex-wrap justify-center lg:justify-start gap-4">

              <div class="flex items-center gap-4 px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          hover:border-white/20 transition">
                <div class="hidden md:flex items-center justify-center w-10 h-10 rounded-xl bg-blue-500/20 text-lg">
                  📍
                </div>
                <div class="text-left">
                  <p class="text-xs uppercase tracking-wide text-gray-400 mb-0.5">
                    Location
                  </p>
                  <p class="text-sm font-medium text-slate-100">
                    ${event.city}, ${event.country}
                  </p>
                </div>
              </div>

              <div class="flex items-center gap-4 px-5 py-4 rounded-2xl
                          bg-white/5 border border-white/10
                          hover:border-white/20 transition">
                <div class="hidden md:flex items-center justify-center w-10 h-10 rounded-xl bg-purple-500/20 text-lg">
                  📅
                </div>
                <div class="text-left">
                  <p class="text-xs uppercase tracking-wide text-gray-400 mb-0.5">
                    Date
                  </p>
                  <p class="text-sm font-medium text-slate-100">
                    ${formatEventDate(event.start_date, event.end_date)}
                  </p>
                </div>
              </div>

            </div>

            <!-- CTA -->
            <div class="pt-3">
                   <a href="#register"
                       class="group px-8 py-4 rounded-xl font-semibold text-white
                              bg-gradient-to-r from-blue-600 via-blue-500 to-cyan-500
                              hover:from-blue-700 hover:via-blue-600 hover:to-cyan-600
                              shadow-lg hover:shadow-xl hover:shadow-blue-500/25
                              transition-all duration-300
                              flex items-center justify-center gap-3
                              transform hover:-translate-y-0.5">
                      <span>Get Your Tickets</span>
                      <span class="text-xl opacity-0 group-hover:opacity-100 transition-opacity">→</span>
                    </a>
            </div>

          </div>

          <!-- RIGHT : Countdown Card -->
          <div class="flex justify-center">
            <div
              class="w-full max-w-2xl rounded-2xl p-8
                     bg-gradient-to-br from-gray-800/80 to-gray-900/80
                     backdrop-blur-xl
                     border border-gray-700/50
                     shadow-2xl
                     hover:shadow-3xl hover:border-gray-600/50
                     transition-all duration-500">

              <!-- Card Header -->
              <div class="text-center mb-10">
                <div class="inline-flex items-center gap-3 px-5 py-2 rounded-full bg-gradient-to-r from-blue-500/10 to-purple-500/10 border border-blue-500/20 mb-4">
                  <span class="text-xl animate-pulse">⏱</span>
                  <h4 class="text-lg font-semibold tracking-wide">
                    Countdown to Event
                  </h4>
                </div>
                <p class="text-gray-400 text-sm mt-2">
                  Don't miss this amazing opportunity
                </p>
              </div>

              <!-- Countdown -->
              <div id="eventCountdown" class="grid grid-cols-4 gap-3 mb-8">
                </div>
            </div>
          </div>

        </div>

        <!-- Scroll Indicator -->
        <div class="absolute -bottom-16 left-1/2 transform -translate-x-1/2">
          <a href="#event-description-section" 
             class="flex flex-col items-center text-gray-400 hover:text-white transition-colors animate-bounce">
            <span class="text-sm mb-2">Explore More</span>
            <span class="text-2xl">⌄</span>
          </a>
        </div>
      </div>
    </section>
  `;

  startEventCountdown(event.start_date, event.start_time);
}

/* ============================================================
    DESCRIPTION – Optimized
============================================================ */
function renderDescription(event) {
  const container = document.getElementById("event-description-section");
  if (!container) return;

  container.innerHTML = `
    <section class="relative py-20 bg-gradient-to-b from-slate-50 to-slate-100 text-white overflow-hidden rounded-t-xl">

      <!-- subtle background texture -->
      <div class="absolute inset-0 pointer-events-none">
        <div class="absolute top-20 right-20 w-72 h-72 bg-blue-500/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 left-10 w-96 h-96 bg-purple-500/5 rounded-full blur-3xl"></div>
      </div>

      <div class="relative max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="desc-inner
                    rounded-2xl
                    bg-white backdrop-blur-xl
                    border border-black/10
                    p-8 md:p-12
                    transition-all duration-700 ease-out">

          <!-- Section header -->
          <div class="mb-8 flex items-center flex-col ">
            <h2 class="desc-title
                       text-2xl md:text-3xl text-center font-semibold text-gray-900">
              About the Event
            </h2>
            <div class="mt-3 w-16 h-1 rounded-full bg-gradient-to-r from-blue-500 to-purple-500 "></div>
          </div>

          <!-- Description text -->
          <p class="desc-text
                    text-gray-700 leading-relaxed text-base md:text-lg">
            ${event.description}
          </p>

        </div>
      </div>
    </section>
  `;
}

/* ============================================================
   BANNER CAROUSEL – PRODUCTION READY
============================================================ */

let bannerIndex = 1;
let bannerCount = 0;
let bannerInterval = null;
let bannerReady = false;
let isTransitioning = false;

function renderBanner(banners) {
  const track = document.getElementById("loopTrack");
  const section = document.getElementById("event-banner-section");
  const dotsContainer = document.getElementById("bannerDots");

  if (!track || !banners || banners.length === 0) {
    section?.classList.add("hidden");
    return;
  }

  section.classList.remove("hidden");

  // Reset track
  track.innerHTML = "";
  track.style.transition = "none";
  track.style.transform = "translate3d(0,0,0)";

  bannerCount = banners.length;
  bannerIndex = 1;
  bannerReady = false;
  isTransitioning = false;

  // Create slides
  const slides = banners.map((b, idx) => {
    const slide = document.createElement("div");
    slide.className = "min-w-full h-full flex-wrap-0";
    slide.setAttribute("data-slide-index", idx);
    slide.innerHTML = `
            <img
                src="${b.url}"
                class="w-full h-full object-cover lg:object-contain"
                loading="${idx === 0 ? "eager" : "lazy"}"
                alt="${b.alt || `Banner ${idx + 1}`}"
            />
        `;
    return slide;
  });

  // Clone for infinite loop
  track.appendChild(slides[slides.length - 1].cloneNode(true));
  slides.forEach((s) => track.appendChild(s));
  track.appendChild(slides[0].cloneNode(true));

  // Create dots indicator
  if (dotsContainer) {
    dotsContainer.innerHTML = "";
    banners.forEach((_, idx) => {
      const dot = document.createElement("button");
      dot.className = `w-2 h-2 md:w-3 md:h-3 rounded-full transition-all duration-300 ${idx === 0 ? "bg-white scale-110" : "bg-white/50 hover:bg-white/70"}`;
      dot.setAttribute("data-dot-index", idx);
      dot.setAttribute("aria-label", `Go to slide ${idx + 1}`);
      dot.addEventListener("click", () => goToSlide(idx + 1));
      dotsContainer.appendChild(dot);
    });
  }

  // Wait for next frame to ensure DOM is ready
  setTimeout(() => {
    updateBannerPosition(false);

    // Set ready after a small delay to ensure layout is complete
    setTimeout(() => {
      bannerReady = true;
      updateDots();
      startBannerAutoplay();
    }, 50);
  }, 50);

  // Bind controls only once
  if (!track.dataset.bound) {
    bindBannerControls();
    track.dataset.bound = "true";
  }
}

function updateBannerPosition(animate = true) {
  if (isTransitioning && animate) return;

  const track = document.getElementById("loopTrack");
  if (!track || !track.children.length) return;

  const container = track.parentElement;
  const width = container
    ? container.offsetWidth
    : track.children[0].offsetWidth;

  // Guard for zero width
  if (!width || width === 0) return;

  track.style.transition =
    animate && bannerReady
      ? "transform 0.7s cubic-bezier(0.4, 0, 0.2, 1)"
      : "none";
  track.style.transform = `translate3d(-${bannerIndex * width}px, 0, 0)`;

  if (animate) {
    isTransitioning = true;
  }
}

function nextBanner() {
  if (!bannerReady || isTransitioning) return;

  bannerIndex++;
  updateBannerPosition(true);
  updateDots();

  const track = document.getElementById("loopTrack");
  if (track) {
    track.addEventListener("transitionend", handleTransitionEnd, {
      once: true,
    });
  }
}

function prevBanner() {
  if (!bannerReady || isTransitioning) return;

  bannerIndex--;
  updateBannerPosition(true);
  updateDots();

  const track = document.getElementById("loopTrack");
  if (track) {
    track.addEventListener("transitionend", handleTransitionEnd, {
      once: true,
    });
  }
}

function goToSlide(index) {
  if (!bannerReady || isTransitioning) return;

  bannerIndex = index;
  updateBannerPosition(true);
  updateDots();

  const track = document.getElementById("loopTrack");
  if (track) {
    track.addEventListener("transitionend", handleTransitionEnd, {
      once: true,
    });
  }
}

function handleTransitionEnd() {
  const track = document.getElementById("loopTrack");
  if (!track) return;

  isTransitioning = false;

  // Handle infinite loop
  if (bannerIndex === bannerCount + 1) {
    bannerIndex = 1;
    updateBannerPosition(false);
  }
  if (bannerIndex === 0) {
    bannerIndex = bannerCount;
    updateBannerPosition(false);
  }

  updateDots();
}

function updateDots() {
  const dots = document.querySelectorAll("#bannerDots button");
  if (!dots.length) return;

  const activeIndex = (bannerIndex - 1 + bannerCount) % bannerCount;

  dots.forEach((dot, idx) => {
    if (idx === activeIndex) {
      dot.className =
        "w-3 h-3 md:w-4 md:h-4 rounded-full bg-white scale-110 transition-all duration-300";
    } else {
      dot.className =
        "w-2 h-2 md:w-3 md:h-3 rounded-full bg-white/50 hover:bg-white/70 transition-all duration-300";
    }
  });
}

function bindBannerControls() {
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");
  const track = document.getElementById("loopTrack");

  if (prevBtn) {
    prevBtn.addEventListener("click", prevBanner);
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", nextBanner);
  }

  // Pause on hover
  if (track) {
    track.addEventListener("mouseenter", stopBannerAutoplay);
    track.addEventListener("mouseleave", startBannerAutoplay);

    // Touch support for mobile
    let touchStartX = 0;
    let touchEndX = 0;

    track.addEventListener(
      "touchstart",
      (e) => {
        touchStartX = e.changedTouches[0].screenX;
      },
      { passive: true },
    );

    track.addEventListener(
      "touchend",
      (e) => {
        touchEndX = e.changedTouches[0].screenX;
        handleSwipe();
      },
      { passive: true },
    );

    function handleSwipe() {
      const swipeThreshold = 50;
      const diff = touchStartX - touchEndX;

      if (Math.abs(diff) > swipeThreshold) {
        if (diff > 0) {
          nextBanner(); // Swipe left
        } else {
          prevBanner(); // Swipe right
        }
      }
    }
  }

  // Handle window resize with debounce
  let resizeTimeout;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(() => {
      updateBannerPosition(false);
    }, 250);
  });
}

function startBannerAutoplay() {
  stopBannerAutoplay();
  if (!bannerReady) return;

  bannerInterval = setInterval(() => {
    if (!isTransitioning && document.visibilityState === "visible") {
      nextBanner();
    }
  }, 5000);
}

function stopBannerAutoplay() {
  if (bannerInterval) {
    clearInterval(bannerInterval);
    bannerInterval = null;
  }
}

// Pause autoplay when page is not visible
document.addEventListener("visibilitychange", () => {
  if (document.visibilityState === "hidden") {
    stopBannerAutoplay();
  } else {
    startBannerAutoplay();
  }
});

// Cleanup function
function destroyBanner() {
  stopBannerAutoplay();

  const track = document.getElementById("loopTrack");
  if (track) {
    track.removeEventListener("transitionend", handleTransitionEnd);
    track.removeEventListener("mouseenter", stopBannerAutoplay);
    track.removeEventListener("mouseleave", startBannerAutoplay);
    delete track.dataset.bound;
  }

  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  if (prevBtn) prevBtn.removeEventListener("click", prevBanner);
  if (nextBtn) nextBtn.removeEventListener("click", nextBanner);

  window.removeEventListener("resize", updateBannerPosition);
}

/* ============================================================
    CREW – Ultra Optimized Infinite Loop
============================================================ */
function renderCrew(crew) {
  const track = document.getElementById("crewTrack");
  const carousel = document.querySelector(".crew-carousel");

  if (!crew || crew.length === 0) {
    carousel.style.display = "block";

    track.innerHTML = `
      <div class="w-full flex justify-center">
        <div class="max-w-3xl w-full text-center rounded-2xl
                    bg-white/5 backdrop-blur-xl
                    border border-white/10
                    p-10">
          <div class="text-4xl mb-4">🎤</div>
          <h4 class="text-lg font-semibold text-slate-100 mb-2">
            Artists Coming Soon
          </h4>
          <p class="text-sm text-gray-400">
            We’re finalizing the lineup. Stay tuned for exciting announcements!
          </p>
        </div>
      </div>
    `;
    return;
  }

  if (!track || !carousel || !crew?.length) {
    if (carousel) carousel.style.display = "none";
    return;
  }

  track.innerHTML = "";

  // Clone list for infinite scroll
  const clones = Array(5).fill(crew).flat();

  const inner = document.createElement("div");
  inner.className = "crew-track-inner flex gap-6 will-change-transform";

  const frag = document.createDocumentFragment();

  clones.forEach((m) => {
    const card = document.createElement("div");

    card.className = `
      crew-card
      min-w-[180px]
      sm:min-w-[337px]
      lg:min-w-[300px]
      xl:min-w-[385px]
      rounded-2xl
      bg-white/5 backdrop-blur-xl
      border border-white/10
      p-4
      cursor-pointer
      transition-all duration-300
      hover:-translate-y-1
      hover:border-white/20
    `;

    card.innerHTML = `
      <div class="relative h-[200px] sm:h-[395px] lg:h-[380px] xl:h-[430px] rounded-xl overflow-hidden bg-black/40 mb-4">
        <img
          src="${m.image}"
          loading="lazy"
          class="w-full h-full object-cover transition-transform duration-500 hover:scale-105"
        />
      </div>

      <div class="text-center">
        <h4 class="text-sm font-semibold text-slate-100 mb-1">
          ${escapeHtml(m.name)}
        </h4>
        <p class="text-xs text-gray-400">
          ${escapeHtml(m.role || "")}
        </p>
      </div>
    `;

    card.onclick = () => showCrewModal(m);
    frag.appendChild(card);
  });

  inner.appendChild(frag);
  track.appendChild(inner);

  startNetflixAutoScroll(inner, crew.length, crew.length);
}

function startNetflixAutoScroll(inner, count, startIdx = 0) {
  let idx = startIdx;
  let isPaused = false;
  let autoScroll;

  const cardWidth = () =>
    inner.children[0].offsetWidth +
    (parseInt(getComputedStyle(inner).gap) || 24);

  const apply = (smooth = true) => {
    inner.style.transition = smooth ? "transform .8s ease" : "none";
    inner.style.transform = `translateX(-${idx * cardWidth()}px)`;
  };

  const step = () => {
    if (isPaused) return;
    idx++;
    apply(true);

    if (idx >= count * 3) {
      setTimeout(() => {
        idx = count;
        apply(false);
      }, 850);
    }
  };

  autoScroll = setInterval(step, 3000);
  apply(false);

  const pause = () => {
    isPaused = true;
    clearInterval(autoScroll);
  };

  const resume = () => {
    isPaused = false;
    autoScroll = setInterval(step, 3000);
  };

  inner.addEventListener("mouseenter", pause, { passive: true });
  inner.addEventListener("mouseleave", resume, { passive: true });
  inner.addEventListener("touchstart", pause, { passive: true });
  inner.addEventListener("touchend", resume, { passive: true });

  new ResizeObserver(() => apply(false)).observe(inner);
}

/* ============================================================
    AMENITIES – Optimized Grid Render + Animate
============================================================ */
function renderAmenities(list) {
  const container = document.getElementById("event-amenities-section");

  if (!list || list.length === 0) {
    container.innerHTML = `
      <section class="relative py-20 bg-gradient-to-b from-gray-50 to-gray-100 overflow-hidden">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

          <div class="rounded-2xl bg-white/70 backdrop-blur-xl
                      border border-gray-200 p-10">
            <div class="text-4xl mb-4">🛠️</div>
            <h4 class="text-xl font-semibold text-slate-900 mb-2">
              Amenities Coming Soon
            </h4>
            <p class="text-slate-600 text-sm max-w-md mx-auto">
              We’re preparing the best facilities to enhance your experience.
              Details will be announced shortly.
            </p>
          </div>

        </div>
      </section>
    `;
    return;
  }

  container.innerHTML = `
    <section class="relative py-20 bg-gradient-to-b from-gray-100 to-gray-200 text-white overflow-hidden">

      <div class="relative max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Section Header -->
        <div class="text-center mb-14">
          <h5 class="text-2xl md:text-3xl font-semibold text-slate-900 mb-3">
            Amenities
          </h5>
          <p class="text-slate-700 max-w-xl mx-auto">
            What we offer at the event
          </p>
        </div>

        <!-- Amenities Grid -->
        <div class="amenities-grid grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8"></div>

      </div>
    </section>
  `;

  const grid = container.querySelector(".amenities-grid");
  const frag = document.createDocumentFragment();

  list.forEach((a) => {
    const card = document.createElement("div");

    card.className = `
      amenity-card
      rounded-2xl
      bg-gray-900/5 backdrop-blur-xl
      border border-black/5
      p-4
      transition-all duration-500
      hover:-translate-y-1
    `;

    card.style.opacity = "0";
    card.style.transform = "translateY(40px)";

    card.innerHTML = `
      <div class="mb-5 rounded-xl overflow-hidden bg-black/30">
        <img
          src="${a.image}"
          alt="${escapeHtml(a.name)}"
          class="w-full h-44 object-cover"
          loading="lazy"
        />
      </div>

      <h4 class="text-lg font-semibold text-slate-900 mb-2">
        ${escapeHtml(a.name)}
      </h4>

      <p class="text-sm text-slate-700 leading-relaxed">
        ${escapeHtml(a.description)}
      </p>
    `;

    frag.appendChild(card);
  });

  grid.appendChild(frag);
  animateAmenities();
}

function animateAmenities() {
  const cards = document.querySelectorAll(".amenity-card");

  cards.forEach((card, i) => {
    setTimeout(() => {
      card.style.opacity = "1";
      card.style.transform = "translateY(0)";
    }, i * 120);
  });
}

/* ============================================================
    UTIL
============================================================ */
function escapeHtml(str) {
  const div = document.createElement("div");
  div.textContent = str || "";
  return div.innerHTML;
}

function formatEventDate(start, end) {
  const opt = { day: "numeric", month: "short", year: "numeric" };
  const s = new Date(start).toLocaleDateString("en-US", opt);
  return end ? `${s} - ${new Date(end).toLocaleDateString("en-US", opt)}` : s;
}

function showCrewModal(member) {
  const modal = document.getElementById("crewModal");
  const box = document.getElementById("crewModalBox");

  document.getElementById("crewModalImg").src = member.image;
  document.getElementById("crewModalName").textContent = member.name;
  document.getElementById("crewModalRole").textContent = member.role || "";
  document.getElementById("crewModalBio").textContent =
    member.description || "No description available";

  // Social Links
  const socials = member.social_links || [];
  let linksHTML = "";

  socials.forEach((link) => {
    const domain = link.toLowerCase();
    const icon = detectSocialIcon(domain);

    linksHTML += `
      <a href="${link}" target="_blank"
         class="w-10 h-10 rounded-xl
                bg-white/5 hover:bg-white/10
                border border-white/10
                flex items-center justify-center
                text-white
                transition-all duration-300
                hover:-translate-y-1 hover:border-white/20">
        ${icon}
      </a>
    `;
  });

  document.getElementById("crewModalLinks").innerHTML = linksHTML;

  // Show modal
  modal.classList.remove("hidden");
  modal.classList.add("flex");

  // Animate in
  setTimeout(() => {
    box.classList.remove("scale-95", "opacity-0");
    box.classList.add("scale-100", "opacity-100");
  }, 10);
}

function closeCrewModal() {
  const modal = document.getElementById("crewModal");
  const box = document.getElementById("crewModalBox");

  box.classList.remove("scale-100", "opacity-100");
  box.classList.add("scale-95", "opacity-0");

  setTimeout(() => {
    modal.classList.remove("flex");
    modal.classList.add("hidden");
  }, 250);
}

document.getElementById("crewModalClose").onclick = closeCrewModal;

document.getElementById("crewModal").onclick = (e) => {
  if (e.target.id === "crewModal") {
    closeCrewModal();
  }
};

function detectSocialIcon(domain) {
  if (domain.includes("facebook"))
    return `<svg width="18" height="18" fill="currentColor"><path d="M10 6h2V3h-2c-2 0-3 1-3 3v2H5v3h2v7h3v-7h2l1-3h-3V6c0-.6.4-1 1-1z"/></svg>`;

  if (domain.includes("instagram"))
    return `<svg width="18" height="18" fill="currentColor"><circle cx="12" cy="12" r="3"/><path d="M4 4h16v16H4z"/></svg>`;

  if (domain.includes("twitter") || domain.includes("x.com"))
    return `<svg width="18" height="18" fill="currentColor"><path d="M18 2L6 12l12 10h-4L2 12 14 2h4z"/></svg>`;

  if (domain.includes("linkedin"))
    return `<svg width="18" height="18" fill="currentColor"><path d="M4 3h4v18H4zM10 8h4v2h.1c.5-1 1.7-2 3.4-2 3.6 0 4.3 2.4 4.3 5.6V21h-4v-6.3c0-1.5 0-3.4-2-3.4s-2.3 1.6-2.3 3.3V21h-4z"/></svg>`;

  return `<svg width="18" height="18" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>`;
}

/* ============================================================
   COUNTDOWN TIMER
============================================================ */
function startEventCountdown(startDate, startTime) {
  const countdownContainer = document.getElementById("eventCountdown");
  if (!countdownContainer) return;

  if (!startTime || startTime.trim() === "") {
    startTime = "09:00";
  }

  const target = new Date(`${startDate}T${startTime}`).getTime();

  function updateCountdown() {
    const now = Date.now();
    const diff = target - now;

    if (diff <= 0) {
      // Event has started - update all boxes to show zeros
      countdownContainer.innerHTML = `
        ${["Days", "Hours", "Mins", "Secs"]
          .map(
            (label) => `
          <div class="relative group">
            <div class="absolute inset-0 bg-gradient-to-r from-green-500/20 to-emerald-500/20 
                        rounded-xl blur-xl opacity-0 group-hover:opacity-50 transition-opacity"></div>
            <div class="relative rounded-xl bg-white/5 backdrop-blur-md 
                        border border-white/10 p-4 text-center
                        group-hover:border-white/20 transition-all">
              <div class="text-3xl md:text-4xl font-bold text-white tabular-nums mb-1">00</div>
              <div class="text-xs font-medium text-gray-300 tracking-wider">
                ${label}
              </div>
            </div>
          </div>
        `,
          )
          .join("")}
      `;

      // Update card header
      const headerDiv = countdownContainer
        .closest(".rounded-2xl")
        ?.querySelector(".text-center h4");
      if (headerDiv) {
        headerDiv.textContent = "Event Started!";
        headerDiv.classList.add("text-green-400");
      }

      clearInterval(timer);
      return;
    }

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    const timeValues = [
      String(days).padStart(2, "0"),
      String(hours).padStart(2, "0"),
      String(minutes).padStart(2, "0"),
      String(seconds).padStart(2, "0"),
    ];

    // Update the HTML while preserving the structure
    countdownContainer.innerHTML = `
      ${["Days", "Hours", "Mins", "Secs"]
        .map(
          (label, index) => `
        <div class="relative group">
          <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 to-purple-500/20 
                      rounded-xl blur-xl opacity-0 group-hover:opacity-50 transition-opacity"></div>
          <div class="relative rounded-xl bg-white/5 backdrop-blur-md 
                      border border-white/10 p-4 text-center
                      group-hover:border-white/20 transition-all
                      ${index === 3 ? "animate-pulse" : ""}">
            <div class="text-3xl md:text-4xl font-bold text-white tabular-nums mb-1
                        transition-all duration-300">${timeValues[index]}</div>
            <div class="text-xs font-medium text-gray-300 tracking-wider">
              ${label}
            </div>
          </div>
        </div>
      `,
        )
        .join("")}
    `;
  }

  updateCountdown();
  const timer = setInterval(updateCountdown, 1000);

  function validateEmail(email) {
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
  }

  function showToast(message, success = false) {
    const toast = document.createElement("div");

    toast.className = `
    fixed top-6 right-6 z-50
    px-5 py-3
    rounded-lg
    text-white text-sm font-medium
    shadow-md
    transition-all duration-300 ease-out
    transform translate-y-[-10px] opacity-0
    ${success ? "bg-green-600" : "bg-red-600"}
  `;

    toast.textContent = message;
    document.body.appendChild(toast);

    // Animate in
    requestAnimationFrame(() => {
      toast.classList.remove("translate-y-[-10px]", "opacity-0");
      toast.classList.add("translate-y-0", "opacity-100");
    });

    // Auto remove
    setTimeout(() => {
      toast.classList.add("opacity-0", "translate-y-[-10px]");
      setTimeout(() => toast.remove(), 300);
    }, 3000);
  }

  document.addEventListener("submit", async function (e) {
    if (e.target.id !== "eventEnquiryForm") return;

    e.preventDefault();

    const form = e.target;
    const button = form.querySelector("button[type='submit']");
    const formData = new FormData(form);

    const data = Object.fromEntries(formData.entries());

    if (!data.name.trim()) {
      return showToast("Name is required");
    }

    if (!validateEmail(data.email)) {
      return showToast("Enter a valid email address");
    }

    if (!data.message.trim()) {
      return showToast("Message cannot be empty");
    }

    try {
      button.disabled = true;
      button.innerHTML = `
      <span class="flex items-center justify-center gap-2">
        <span class="w-4 h-4 border-2 border-white/40 border-t-white rounded-full animate-spin"></span>
        Sending...
      </span>
    `;

      const res = await fetch(`${window.API_BASE_URL}/event-enquiries`, {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(data),
      });

      const result = await res.json();

      if (result.status === "success") {
        showToast("Enquiry submitted successfully!", true);
        form.reset();
      } else {
        showToast(result.message || "Something went wrong");
      }
    } catch (error) {
      showToast("Error submitting enquiry");
    } finally {
      button.disabled = false;
      button.innerHTML = "Submit Enquiry";
    }
  });
}

function renderDefaultContact(container) {
  container.innerHTML = `
    <h3 class="text-2xl font-semibold mb-4">
      Contact Information
    </h3>

    <div class="space-y-4 text-sm text-gray-300">
      <div class="flex items-start gap-3">
        <i class="fas fa-map-marker-alt text-blue-500 mt-1"></i>
        <p>Contact details will be announced soon.</p>
      </div>
    </div>
  `;
}

async function renderContactDetails(eventId) {
  const container = document.getElementById("event-contact-section");
  if (!container) return;

  try {
    const res = await fetch(
      `${window.API_BASE_URL}/event-contact-details/${eventId}`,
    );

    const result = await res.json();
    const data = result?.data;

    if (!data) {
      return renderDefaultContact(container);
    }

    // Safe parse (because production returns stringified JSON)
    const mobiles =
      typeof data.mobile_numbers === "string"
        ? JSON.parse(data.mobile_numbers)
        : data.mobile_numbers || [];

    const emails =
      typeof data.emails === "string"
        ? JSON.parse(data.emails)
        : data.emails || [];

    const socials =
      typeof data.social_links === "string"
        ? JSON.parse(data.social_links)
        : data.social_links || {};

    container.innerHTML = `
  <div class="space-y-6">

    <!-- Title -->
    <h3 class="text-2xl font-semibold text-white">
      Contact Information
    </h3>

    <div class="space-y-4 text-sm text-gray-300">

      ${
        data.address
          ? `
        <div class="flex items-start gap-3">
          <i class="fas fa-map-marker-alt text-blue-500 mt-1"></i>
          <p class="leading-relaxed">${data.address}</p>
        </div>
      `
          : ""
      }

      ${
        mobiles.length
          ? mobiles
              .map(
                (m) => `
          <div class="flex items-center gap-3">
            <i class="fas fa-phone-alt text-blue-500"></i>
            <a href="tel:${m}" 
               class="hover:text-white transition">
              ${m}
            </a>
          </div>
        `,
              )
              .join("")
          : ""
      }

      ${
        emails.length
          ? emails
              .map(
                (e) => `
          <div class="flex items-center gap-3">
            <i class="fas fa-envelope text-blue-500"></i>
            <a href="mailto:${e}" 
               class="hover:text-white transition">
              ${e}
            </a>
          </div>
        `,
              )
              .join("")
          : ""
      }

    </div>

    ${
      Object.keys(socials || {}).some((k) => socials[k])
        ? `
      <div class="pt-4 border-t border-white/10">
        <div class="flex gap-3 mt-3">
          ${renderSocialIcons(socials)}
        </div>
      </div>
    `
        : ""
    }

  </div>
`;
  } catch (error) {
    renderDefaultContact(container);
  }
}

function renderSocialIcons(socials) {
  if (!socials || Object.values(socials).every((v) => !v)) return "";

  return `
  <div>
    <p class="text-gray-200 font-semibold">Follow us on:</p>
    <div class="pt-4 flex gap-4 text-lg">
      ${socials.facebook ? `<a href="${socials.facebook}" target="_blank"><i class="fab fa-facebook-f hover:text-white transition"></i></a>` : ""}
      ${socials.instagram ? `<a href="${socials.instagram}" target="_blank"><i class="fab fa-instagram hover:text-white transition"></i></a>` : ""}
      ${socials.youtube ? `<a href="${socials.youtube}" target="_blank"><i class="fab fa-youtube hover:text-white transition"></i></a>` : ""}
      ${socials.twitter ? `<a href="${socials.twitter}" target="_blank"><i class="fab fa-x-twitter hover:text-white transition"></i></a>` : ""}
      ${socials.linkedin ? `<a href="${socials.linkedin}" target="_blank"><i class="fab fa-linkedin-in hover:text-white transition"></i></a>` : ""}
      ${socials.tiktok ? `<a href="${socials.tiktok}" target="_blank"><i class="fab fa-tiktok hover:text-white transition"></i></a>` : ""}
    </div>
  </div>
  `;
}

async function renderHeaderContact(eventId) {
  const container = document.getElementById("headerContactSection");
  if (!container) return;

  try {
    const res = await fetch(
      `${window.API_BASE_URL}/event-contact-details/${eventId}`,
    );

    const result = await res.json();
    const data = result?.data;

    if (!data) {
      container.innerHTML = "";
      return;
    }

    const mobiles =
      typeof data.mobile_numbers === "string"
        ? JSON.parse(data.mobile_numbers)
        : data.mobile_numbers || [];

    const socials =
      typeof data.social_links === "string"
        ? JSON.parse(data.social_links)
        : data.social_links || {};

    const primaryNumber = mobiles.length ? mobiles[0] : null;

    container.innerHTML = `
      ${
        primaryNumber
          ? `
        <div class="flex gap-2 text-sm font-medium text-gray-300">
          <p class="text-blue-500">Contact us:</p>
          <a href="tel:${primaryNumber}"
             class="hover:text-blue-400 transition-colors duration-300">
            ${primaryNumber}
          </a>
        </div>
      `
          : ""
      }

      <div class="flex items-center gap-3">
        ${renderHeaderSocialIcons(socials)}
      </div>
    `;
  } catch (error) {
    container.innerHTML = "";
  }
}

function renderHeaderSocialIcons(socials) {
  if (!socials) return "";

  return `
    ${
      socials.facebook
        ? `
      <a href="${socials.facebook}" target="_blank"
         class="w-6 h-6 flex items-center justify-center
                rounded-full bg-blue-600 text-white
                transition-all duration-300
                hover:shadow-lg hover:shadow-blue-500/40
                hover:-translate-y-1">
        <i class="fab fa-facebook-f text-xs"></i>
      </a>`
        : ""
    }

    ${
      socials.instagram
        ? `
      <a href="${socials.instagram}" target="_blank"
         class="w-6 h-6 flex items-center justify-center
                rounded-full bg-gradient-to-r from-pink-500 to-purple-500
                text-white transition-all duration-300
                hover:shadow-lg hover:shadow-pink-500/40
                hover:-translate-y-1">
        <i class="fab fa-instagram text-xs"></i>
      </a>`
        : ""
    }

    ${
      socials.youtube
        ? `
      <a href="${socials.youtube}" target="_blank"
         class="w-6 h-6 flex items-center justify-center
                rounded-full bg-red-600 text-white
                transition-all duration-300
                hover:shadow-lg hover:shadow-red-500/40
                hover:-translate-y-1">
        <i class="fab fa-youtube text-xs"></i>
      </a>`
        : ""
    }

    ${
      socials.tiktok
        ? `
      <a href="${socials.tiktok}" target="_blank"
         class="w-6 h-6 flex items-center justify-center
                rounded-full bg-gradient-to-r from-cyan-400 to-pink-500
                text-white transition-all duration-300
                hover:shadow-lg hover:shadow-pink-500/40
                hover:-translate-y-1">
        <i class="fab fa-tiktok text-xs"></i>
      </a>`
        : ""
    }

    ${
      socials.twitter
        ? `
      <a href="${socials.twitter}" target="_blank"
         class="w-6 h-6 flex items-center justify-center
                rounded-full bg-black text-white
                transition-all duration-300
                hover:shadow-lg hover:shadow-gray-500/40
                hover:-translate-y-1">
        <i class="fab fa-x-twitter text-xs"></i>
      </a>`
        : ""
    }

    ${
      socials.linkedin
        ? `
      <a href="${socials.linkedin}" target="_blank"
         class="w-6 h-6 flex items-center justify-center
                rounded-full bg-blue-700 text-white
                transition-all duration-300
                hover:shadow-lg hover:shadow-blue-500/40
                hover:-translate-y-1">
        <i class="fab fa-linkedin-in text-xs"></i>
      </a>`
        : ""
    }
  `;
}

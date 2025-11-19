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

/* ============================================================
    HERO SECTION – Optimized
============================================================ */
function renderHero(event) {
  const container = document.getElementById("event-header-section");
  if (!container) return;

  container.innerHTML = `
    <div class="heroPro" id="heroPro">
      <div class="hero-inner">
        <img src="${event.logo_image}" class="hero-logoPro" loading="lazy"/>
        <h1 class="hero-titlePro">${event.title}</h1>
        <div class="hero-metaPro">
          <span>${event.city}, ${event.country}</span>
          <span>${formatEventDate(event.start_date, event.end_date)}</span>
          <div id="eventCountdown" class="event-countdown">
            <span>Loading countdown...</span>
          </div>
        </div>

        <div class="hero-actions">
          <button class="hero-btnPro primary">Book Tickets</button>
          <button class="hero-btnPro outline">View Details</button>
        </div>
      </div>
    </div>
  `;

  playHeroAnimation();
  startEventCountdown(event.start_date, event.start_time);
}

function playHeroAnimation() {
  const hero = document.getElementById("heroPro");
  if (!hero) return;

  const logo = hero.querySelector(".hero-logoPro");
  const title = hero.querySelector(".hero-titlePro");
  const meta = hero.querySelector(".hero-metaPro");
  const actions = hero.querySelector(".hero-actions");

  const animate = (el, delay, transform = "translateY(0)") => {
    if (!el) return;
    setTimeout(() => {
      el.style.opacity = "1";
      el.style.transform = transform;
    }, delay);
  };

  animate(logo, 200, "translateY(0) scale(1)");
  animate(title, 500);
  animate(meta, 800);
  animate(actions, 1000);
}

/* ============================================================
    DESCRIPTION – Optimized
============================================================ */
function renderDescription(event) {
  const container = document.getElementById("event-description-section");
  if (!container) return;

  container.innerHTML = `
    <div class="desc-inner">
      <h2 class="desc-title">About the Event</h2>
      <p class="desc-text">${event.description}</p>
    </div>
  `;

  const desc = container.querySelector(".desc-inner");
  const title = desc.querySelector(".desc-title");
  const text = desc.querySelector(".desc-text");

  setTimeout(() => {
    desc.classList.add("loaded");
    desc.style.opacity = "1";
    desc.style.transform = "translateY(0)";
  }, 300);

  setTimeout(() => (title.style.opacity = 1), 600);
  setTimeout(() => (text.style.opacity = 1), 900);
}

/* ============================================================
    BANNER – Optimized
============================================================ */
function renderBanner(banners) {
  const track = document.getElementById("loopTrack");
  const carousel = document.querySelector(".loop-carousel");

  if (!track || !carousel) return;

  track.innerHTML = "";

  if (!banners?.length) {
    carousel.style.display = "none";
    return;
  }

  const frag = document.createDocumentFragment();

  banners.forEach((b, i) => {
    const slide = document.createElement("div");
    slide.className = `loop-slide ${i === 0 ? "active" : ""}`;
    slide.innerHTML = `<img src="${b.url}" loading="lazy" style="border-radius:16px;">`;
    frag.appendChild(slide);
  });

  track.appendChild(frag);

  if (banners.length > 1) setupCarouselControls(banners.length);
  else track.querySelector(".loop-slide").style.opacity = "1";
}

let currentSlide = 0;
let autoPlayInterval;

function setupCarouselControls(total) {
  const slides = document.querySelectorAll(".loop-slide");
  const prevBtn = document.getElementById("prevBtn");
  const nextBtn = document.getElementById("nextBtn");

  const update = () => {
    slides.forEach((s, i) => {
      s.style.opacity = i === currentSlide ? "1" : "0";
      s.style.transform = i === currentSlide ? "scale(1)" : "scale(.95)";
      s.style.zIndex = i === currentSlide ? "2" : "1";
    });
  };

  const next = () => {
    currentSlide = (currentSlide + 1) % total;
    update();
  };

  const prev = () => {
    currentSlide = (currentSlide - 1 + total) % total;
    update();
  };

  prevBtn.onclick = () => {
    prev();
    restartAuto();
  };
  nextBtn.onclick = () => {
    next();
    restartAuto();
  };

  const restartAuto = () => {
    clearInterval(autoPlayInterval);
    autoPlayInterval = setInterval(next, 5000);
  };

  autoPlayInterval = setInterval(next, 5000);
  update();
}

/* ============================================================
    CREW – Ultra Optimized Infinite Loop
============================================================ */
function renderCrew(crew) {
  const track = document.getElementById("crewTrack");
  const carousel = document.querySelector(".crew-carousel");

  if (!track || !carousel || !crew?.length) {
    if (carousel) carousel.style.display = "none";
    return;
  }

  track.innerHTML = "";

  // Build 5X clone for smooth infinite scroll
  const clones = Array(5).fill(crew).flat();
  const inner = document.createElement("div");
  inner.className = "crew-track-inner";

  const frag = document.createDocumentFragment();

  clones.forEach((m) => {
    const card = document.createElement("div");
    card.className = "crew-card";
    card.innerHTML = `
      <div class="crew-img-container">
        <img src="${m.image}" loading="lazy" class="crew-img"/>
      </div>
      <div class="crew-info">
        <h4 class="crew-name">${escapeHtml(m.name)}</h4>
        <p class="crew-role">${escapeHtml(m.role || "")}</p>
      </div>`;
    frag.appendChild(card);
    card.onclick = () => showCrewModal(m);
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
  if (!container || !list?.length) return;

  const frag = document.createDocumentFragment();

  container.innerHTML = `
    <div class="amenities-heading">
      <h5 class="amenities-title">Amenities</h5>
      <p class="amenities-subtitle">What we offer at the event</p>
    </div>
    <div class="amenities-grid"></div>
  `;

  const grid = container.querySelector(".amenities-grid");

  list.forEach((a) => {
    const card = document.createElement("div");
    card.className = "amenity-card";
    card.style.opacity = "0";
    card.style.transform = "translateY(40px)";
    card.innerHTML = `
      <div class="amenity-img">
        <img src="${a.image}" loading="lazy"/>
      </div>
      <h4 class="amenity-name">${escapeHtml(a.name)}</h4>
      <p class="amenity-desc">${escapeHtml(a.description)}</p>
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
    }, i * 130);
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

  document.getElementById("crewModalImg").src = member.image;
  document.getElementById("crewModalName").textContent = member.name;
  document.getElementById("crewModalRole").textContent = member.role || "";
  document.getElementById("crewModalBio").textContent =
    member.description || "No description available";

  // Social Links Rendering
  let linksHTML = "";
  const socials = member.social_links || [];

  socials.forEach((link) => {
    const domain = link.toLowerCase();

    const icon = detectSocialIcon(domain);
    linksHTML += `<a href="${link}" target="_blank">${icon}</a>`;
  });

  document.getElementById("crewModalLinks").innerHTML = linksHTML;

  modal.style.display = "flex";
}

document.getElementById("crewModalClose").onclick = () => {
  document.getElementById("crewModal").style.display = "none";
};

/* Close on background click */
document.getElementById("crewModal").onclick = (e) => {
  if (e.target.id === "crewModal") {
    document.getElementById("crewModal").style.display = "none";
  }
};

function detectSocialIcon(domain) {
  if (domain.includes("facebook")) return `<i class="fab fa-facebook-f"></i>`;
  if (domain.includes("instagram")) return `<i class="fab fa-instagram"></i>`;
  if (domain.includes("twitter") || domain.includes("x.com"))
    return `
    <svg width="20" height="20" fill="currentColor">
      <path d="M18 2l-7 8 7 8h-3l-7-8 7-8h3zm-8 0L3 10l7 8H7L0 10 7 2h3z"/>
    </svg>`;

  if (domain.includes("linkedin")) return `<i class="fab fa-linkedin-in"></i>`;
  if (domain.includes("tiktok"))
    return `
  <svg width="20" height="20" fill="currentColor">
    <path d="M17 6c-2 0-4-2-4-4h-3v12a3 3 0 1 1-3-3V8a6 6 0 1 0 9 5V6z"/>
  </svg>`;
  if (domain.includes("youtube") || domain.includes("youtu"))
    return `<i class="fab fa-youtube"></i>`;
  if (domain.includes("pinterest")) return `<i class="fab fa-pinterest"></i>`;

  return `<i class="fas fa-link"></i>`; // default icon
}

/* ============================================================
   COUNTDOWN TIMER
============================================================ */
function startEventCountdown(startDate, startTime) {
  const box = document.getElementById("eventCountdown");
  if (!box) return;

  // FIX: If time is empty/null → assign default time
  if (!startTime || startTime.trim() === "") {
    startTime = "00:00"; // default midnight OR choose "18:00"
  }

  // Build final timestamp
  const target = new Date(`${startDate}T${startTime}:00`).getTime();

  function update() {
    const now = Date.now();
    const diff = target - now;

    if (diff <= 0) {
      box.innerHTML = `<span class="started">Event Started</span>`;
      clearInterval(timer);
      return;
    }

    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
    const minutes = Math.floor((diff / (1000 * 60)) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    box.innerHTML = `
    <div class="cd-box">
      <div><strong>${String(days).padStart(
        2,
        "0"
      )}</strong><small>Days</small></div>
      <div><strong>${String(hours).padStart(
        2,
        "0"
      )}</strong><small>Hours</small></div>
      <div><strong>${String(minutes).padStart(
        2,
        "0"
      )}</strong><small>Mins</small></div>
      <div><strong>${String(seconds).padStart(
        2,
        "0"
      )}</strong><small>Secs</small></div>
    </div>
  `;
  }

  update();
  const timer = setInterval(update, 1000);
}

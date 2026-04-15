$(document).ready(function () {
  const $carousel = $(".main-slider__carousel");
  const $podcastList = $("#new-podcasts");
  const $festivalLeft = $("#festivalLeft");
  const $festivalRight = $("#festivalRight");

  // Hide sections until content injected
  $festivalLeft.hide();
  $festivalRight.hide();
  $podcastList.hide();

  function slugify(name) {
    return name.split(" ").join("-");
  }

  const $flashNewsBar = $("#flash-news-bar");

  let flashNewsItems = [];
  let flashNewsIndex = 0;
  let flashNewsInitialized = false;
  let flashNewsTitleEl = null;
  let flashNewsTrackEl = null;

  /* ------------------- HELPERS ------------------- */

  function areFlashNewsItemsEqual(newItems) {
    if (newItems.length !== flashNewsItems.length) return false;
    return newItems.every(
      (item, index) => item.id === flashNewsItems[index]?.id,
    );
  }

  /* ------------------- DOM BUILD ------------------- */

  function buildFlashNewsDOM() {
    $flashNewsBar
      .html(
        `
  <div class="max-w-full overflow-hidden rounded-md mx-2 sm:mx-3 md:mx-4 shadow-md border border-gray-200 bg-white">

    <!-- TOP ROW -->
    <div class="flex items-center h-[36px] sm:h-[40px] md:h-[44px]">

      <!-- Breaking -->
      <div class="bg-red-600 px-3 sm:px-4 h-full flex items-center font-bold uppercase text-xs tracking-wider text-white">
        <span class="relative flex mr-2">
          <span class="w-2 h-2 bg-white rounded-full animate-ping absolute"></span>
          <span class="w-2 h-2 bg-white rounded-full"></span>
        </span>
        Breaking News
      </div>

      <!-- Title -->
      <div class="flex-1 bg-slate-50 h-full flex items-center overflow-hidden relative">
        <div id="news-title"
          class="px-3 sm:px-4 text-gray-900 font-semibold text-sm uppercase truncate transition-all duration-500">
        </div>
      </div>

    </div>

    <!-- BOTTOM ROW -->
    <div class="bg-white text-gray-800 overflow-hidden h-[36px] flex items-center relative border-t">

      <div id="news-track"
        class="flex items-center whitespace-nowrap will-change-transform text-sm font-medium">
      </div>

    </div>

  </div>
`,
      )
      .show();

    flashNewsTitleEl = document.getElementById("news-title");
    flashNewsTrackEl = document.getElementById("news-track");
  }

  /* ------------------- TICKER ------------------- */

  function buildTicker(text) {
    if (!flashNewsTrackEl) return;

    // Clear previous content (important)
    flashNewsTrackEl.innerHTML = "";

    flashNewsTrackEl.innerHTML = `
    <div class="px-8">${text}</div>
  `;

    const contentWidth = flashNewsTrackEl.scrollWidth;
    const containerWidth = flashNewsTrackEl.parentElement.clientWidth || 1;

    const speedFactor = 0.04;
    const duration = Math.max(
      12,
      Math.ceil((contentWidth + containerWidth) * speedFactor),
    );

    // Reset animation
    flashNewsTrackEl.style.animation = "none";
    flashNewsTrackEl.offsetHeight;

    // Remove old listeners (important fix)
    flashNewsTrackEl.replaceWith(flashNewsTrackEl.cloneNode(true));
    flashNewsTrackEl = document.getElementById("news-track");

    // Add animation end listener
    flashNewsTrackEl.addEventListener(
      "animationend",
      () => {
        flashNewsIndex = (flashNewsIndex + 1) % flashNewsItems.length;
        showNews(flashNewsIndex);
      },
      { once: true },
    );

    flashNewsTrackEl.style.animation = `tickerScroll ${duration}s linear forwards`;
  }

  /* ------------------- TITLE ANIMATION ------------------- */

  function animateTitle(newTitle) {
    if (!flashNewsTitleEl) return;

    flashNewsTitleEl.classList.add("-translate-y-full", "opacity-0");

    setTimeout(() => {
      flashNewsTitleEl.innerText = newTitle;
      flashNewsTitleEl.classList.remove("-translate-y-full", "opacity-0");
      flashNewsTitleEl.classList.add("translate-y-0", "opacity-100");

      flashNewsTitleEl.classList.add("bg-gray-200/30");
      setTimeout(() => {
        flashNewsTitleEl.classList.remove("bg-gray-200/30");
      }, 400);
    }, 250);
  }

  /* ------------------- MAIN DISPLAY ------------------- */

  function showNews(index, first = false) {
    if (!flashNewsItems.length || !flashNewsTitleEl || !flashNewsTrackEl)
      return;

    const item = flashNewsItems[index];

    const title = item.title || "Breaking";
    const text = item.news_content || item.title;

    if (first) {
      flashNewsTitleEl.innerText = title;
    } else {
      animateTitle(title);
    }

    buildTicker(text);
  }

  /* ------------------- INIT ------------------- */

  function initFlashNewsTicker(items) {
    if (!Array.isArray(items) || !items.length) {
      $flashNewsBar.hide();
      return;
    }

    if (flashNewsInitialized && areFlashNewsItemsEqual(items)) {
      return;
    }

    flashNewsItems = items;
    flashNewsIndex = 0;

    buildFlashNewsDOM();
    showNews(0, true);

    flashNewsInitialized = true;
  }
  // ---------------- CAROUSEL + BANNERS ✅ ----------------

  async function updateCarousel(program, firstLoad = false) {
    $("#bannerLoader").show();
    if ($carousel.hasClass("owl-loaded")) {
      $carousel.trigger("destroy.owl.carousel");
      $carousel.removeClass("owl-loaded owl-hidden");
      $carousel.find(".owl-stage-outer").children().unwrap();
    }

    $carousel.empty();
    const slides = [];
    const programImage = program?.program_category?.image_url;

    if (programImage) {
      slides.push(`
        <div class="item"><div class="main-slider__bg">
          <img src="${programImage}" decoding="async" fetchpriority="high"  alt="${programImage}" />
        </div></div>
      `);
    }

    try {
      const bannerRes = await $.ajax({
        url: `${window.API_BASE_URL}/banners?status=active`,
        method: "GET",
      });
      const banners = bannerRes?.data?.data || [];
      banners.forEach((b) => {
        const path = b.website_image.replace(/\\/g, "/");
        slides.push(`
          <div class="item"><div class="main-slider__bg">
            <img src="${window.API_BASE_URL}/${path}" decoding="async" fetchpriority="high"  alt="${path}" />
          </div></div>
        `);
      });
    } catch (err) {
      console.error("Banner failed:", err);
      showToast("Failed to load banners", "error");
    }

    if (!slides.length) {
      slides.push(`
        <div class="item"><div class="main-slider__bg">
          <img src="assets/img/logo/thaalam-logo.png" decoding="async" fetchpriority="high"   alt="thaalam-logo" />
        </div></div>
      `);
    }

    $carousel.html(slides.join(""));

    // Initialize Owl
    $carousel.owlCarousel({
      items: 1,
      loop: slides.length > 1,
      autoplay: true,
      autoplayTimeout: 5000,
      dots: false,
      nav: false,
      onInitialized: function () {
        hideBannerLoaderSafely($carousel);
      },

      onResized: function () {
        hideBannerLoaderSafely($carousel);
      },
    });
  }

  function hideBannerLoaderSafely($carousel) {
    let done = false;

    function hide() {
      if (done) return;
      done = true;
      $("#bannerLoader").fadeOut(300);
    }

    requestAnimationFrame(() => {
      requestAnimationFrame(hide);
    });

    const $images = $carousel.find("img");
    $images.each(function () {
      $(this).one("load error", hide);
    });

    setTimeout(hide, 2500);
  }

  // ---------------- LIVE PROGRAM API ✅ ----------------

  async function loadCurrentProgram(first = false) {
    try {
      const res = await $.ajax({
        url: `${window.API_BASE_URL}/radio-program/live-program`,
        method: "GET",
      });

      const program = res.current;
      const programId = program?.id || null;

      if (programId) {
        window.dispatchEvent(
          new CustomEvent("program:changed", {
            detail: {
              programId,
            },
          }),
        );
      }

      const title = program?.program_category?.category || "No live program";
      const rj = program?.system_users?.name || "";
      const rjSlug = slugify(rj);
      const rjurl = `/rj-details?slug=${rjSlug}`;
      const time = program?.program_category
        ? `Show Time: ${program.program_category.start_time.substring(
            0,
            5,
          )} - ${program.program_category.end_time.substring(0, 5)}`
        : "";
      const imgURL = program?.system_users?.image_url
        ? `${window.API_BASE_URL}/${program.system_users.image_url.replace(
            /\\/g,
            "/",
          )}`
        : "images/default-cover.png";

      if (first) updateCarousel(program, true);

      $("#programTitle").text(title);
      $("#programArtist").text(rj);
      $("#showTime").text(time);
      $("#programImage").attr("src", imgURL).attr("alt", title);

      $("#programImage")
        .css("cursor", "pointer")
        .off("click")
        .on("click", () => {
          window.location.href = rjurl;
        });

      $("#programArtist")
        .css("cursor", "pointer")
        .off("click")
        .on("click", () => {
          window.location.href = rjurl;
        });

      if (res.minutesLeft <= 30 && res.next?.program_category) {
        $("#nextProgramNotice")
          .text(`Next Show : ${res.next.program_category.category}`)
          .fadeIn(300);
      } else {
        $("#nextProgramNotice").fadeOut(200);
      }

      initFlashNewsTicker(res.flash_news || []);
    } catch (err) {
      console.error("Program API Error:", err);
    }
  }

  loadCurrentProgram(true);
  setInterval(() => loadCurrentProgram(false), 1 * 60 * 1000);

  // ---------------- PODCASTS API ✅ ----------------

  function renderPodcastSkeleton(count = 4) {
    let html = "";

    for (let i = 0; i < count; i++) {
      html += `
      <div class="bg-white rounded-xl border border-gray-100 p-2 shadow-sm">
        <div class="skeleton w-full h-[150px] mb-3"></div>
        <div class="skeleton h-4 w-3/4 mb-2"></div>
        <div class="skeleton h-3 w-1/3"></div>
      </div>
    `;
    }

    $("#new-podcasts")
      .html(
        `
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
      ${html}
    </div>
  `,
      )
      .show();
  }

  async function loadPodcasts() {
    if (!$podcastList.length) return;

    $podcastList.empty();
    renderPodcastSkeleton(4);

    try {
      const res = await $.ajax({
        url: `${window.API_BASE_URL}/podcasts?status=approved&limit=4`,
        method: "GET",
      });

      const podcasts = res?.data?.data || [];

      if (!podcasts.length) {
        $podcastList.html(
          `<p class="text-sm text-gray-400 text-center mt-8">No Podcasts Found</p>`,
        );
        return;
      }

      const html = podcasts
        .map((p, i) => {
          const img =
            p.image_url ||
            "assets/img/common/podcast-details/podcast-banner.jpg";
          const title =
            (p.title || "").slice(0, 80) + (p.title?.length > 80 ? "…" : "");
          const duration = `${p.duration ?? 0} min`;

          return `
        <a href="podcast-details.php?id=${p.id}" class="podcast-card block group">
          <div class="relative overflow-hidden">
            <img src="${img}" alt="podcast-cover"
                 class="w-full h-[160px] object-cover group-hover:scale-105 transition-transform duration-500">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
            ${i < 2 ? `<span class="absolute top-2 left-2 bg-red-500 text-white text-[9px] font-bold px-2 py-0.5 rounded-full">NEW</span>` : ""}
            <span class="absolute bottom-2 right-2 flex items-center gap-1 bg-black/60 text-white text-[10px] font-medium px-2 py-0.5 rounded-full">
              <i class="fa fa-clock text-[9px]"></i> ${duration}
            </span>
          </div>
          <div class="p-3">
            <p class="text-sm font-semibold text-gray-900 leading-snug line-clamp-2">${title}</p>
          </div>
        </a>
      `;
        })
        .join("");

      $podcastList.html(`
      <div class="grid grid-cols-1 min-[500px]:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
        ${html}
      </div>
    `);

      $podcastList.fadeIn(300);
    } catch (err) {
      console.error("Podcast failed:", err);
    }
  }

  loadPodcasts();

  // ---------------- FESTIVAL GIFS API ✅ ----------------

  async function loadFestivalGifs() {
    if (!$festivalLeft.length && !$festivalRight.length) return;

    try {
      const r = await $.ajax({
        url: `${window.API_BASE_URL}/festival-gif?status=true`,
        method: "GET",
      });

      const gif = r?.data?.data?.[0];
      if (!gif) return;

      if (gif.left_side_image) {
        $festivalLeft
          .attr(
            "src",
            `${window.API_BASE_URL}/${gif.left_side_image.replace(/\\/g, "/")}`,
          )
          .fadeIn(400);
      } else {
        $festivalLeft.fadeOut(200);
      }

      if (gif.right_side_image) {
        $festivalRight
          .attr(
            "src",
            `${window.API_BASE_URL}/${gif.right_side_image.replace(/\\/g, "/")}`,
          )
          .fadeIn(400);
      } else {
        $festivalRight.fadeOut(200);
      }
    } catch (err) {
      console.error("GIF API error:", err);
    }
  }

  loadFestivalGifs();
  setInterval(loadFestivalGifs, 10 * 60 * 1000);

  // ---------------- POPUP BANNER API ✅ ----------------

  function hidePopupBanner() {
    $("#popupBanner").fadeOut(200);
    document.body.style.overflow = "";
  }

  async function loadPopupBanner() {
    try {
      const r = await $.ajax({
        url: `${window.API_BASE_URL}/popup-banner?status=active`,
        method: "GET",
      });
      const b = r?.data?.[0];

      if (!b) return;

      const path = b.website_image.replace(/\\/g, "/");
      $("#popupBanner-image").attr("src", `${window.API_BASE_URL}/${path}`);

      if (b.status === "active") {
        $("#popupBanner").css("display", "flex").hide().fadeIn(400);
        document.body.style.overflow = "hidden";
      }
    } catch (err) {
      console.error("Popup banner failed:", err);
    }
  }

  $("#close-popupBanner").on("click", hidePopupBanner);
  $("#popupBanner").on("click", function (event) {
    if (event.target.id === "popupBanner") {
      hidePopupBanner();
    }
  });

  loadPopupBanner();

  // ---------------- VISITOR TRACKING ✅ ----------------

  (async function trackVisitor() {
    let visitorId = localStorage.getItem("visitor_id_v2");
    if (!visitorId) {
      visitorId = Math.random().toString(36).substring(2, 10);
      localStorage.setItem("visitor_id_v2", visitorId);
    }

    let publicIp = localStorage.getItem("visitor_ip") || "";
    let country = localStorage.getItem("visitor_country") || "";
    let city = localStorage.getItem("visitor_city") || "";
    let region = localStorage.getItem("visitor_region") || "";

    if (!publicIp || !country || !city || !region) {
      try {
        const res = await fetch("https://ipapi.co/json/");
        const data = await res.json();

        publicIp = data.ip;
        country = data.country_name;
        region = data.region;
        city = data.city;

        localStorage.setItem("visitor_ip", publicIp);
        localStorage.setItem("visitor_country", country);
        localStorage.setItem("visitor_region", region);
        localStorage.setItem("visitor_city", city);
      } catch (err) {
        console.warn("Failed to fetch IP info:", err);
      }
    }

    const payload = {
      visitor_id: visitorId,
      ip: publicIp,
      country,
      region,
      city,
      page: window.location.pathname,
    };

    try {
      await fetch(`${window.API_BASE_URL}/visit`, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(payload),
        keepalive: true,
      });
    } catch (err) {
      console.error("Failed to send visitor tracking:", err);
    }
  })();

  // ---------------- AUDIO CONTROLS ✅ ----------------

  function initAudioPlayer() {
    const audio = document.getElementById("audioPlayer");
    const playBtn = document.getElementById("mainPlayBtn");
    const playIcon = document.getElementById("mainPlayIcon");
    const volumeBtn = document.getElementById("volumeBtn");
    const volumeSlider = document.getElementById("volumeSlider");
    const volumeIcon = document.getElementById("volumeIcon");
    const shareBtn = document.getElementById("shareBtn");

    if (!audio) return;

    const updatePlayState = () => {
      if (audio.paused) {
        playIcon.classList.replace("fa-pause", "fa-play");
      } else {
        playIcon.classList.replace("fa-play", "fa-pause");
      }
    };

    setTimeout(() => {
      audio.play().catch(() => {});
    }, 1000);

    audio.addEventListener("play", updatePlayState);
    audio.addEventListener("pause", updatePlayState);
    audio.addEventListener("ended", updatePlayState);

    playBtn?.addEventListener("click", () => {
      if (audio.paused) audio.play();
      else audio.pause();
    });

    // volume slider
    volumeSlider?.addEventListener("input", (e) => {
      audio.volume = e.target.value;
      volumeIcon.classList.toggle("fa-volume-mute", audio.volume == 0);
      volumeIcon.classList.toggle("fa-volume-up", audio.volume > 0);
    });

    // mute button
    volumeBtn?.addEventListener("click", () => {
      audio.muted = !audio.muted;
      volumeIcon.classList.toggle("fa-volume-mute", audio.muted);
      volumeIcon.classList.toggle("fa-volume-up", !audio.muted);
    });

    // Page visible change (fix when waking from lock)
    document.addEventListener("visibilitychange", () => {
      if (!document.hidden) updatePlayState();
    });

    shareBtn?.addEventListener("click", () => {
      navigator.clipboard
        .writeText(window.location.href)
        .then(() => showToast("Link Copied", "success"))
        .catch(console.error);
    });
  }

  initAudioPlayer();
});

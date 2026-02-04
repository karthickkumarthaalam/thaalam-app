$(document).ready(function () {
  let $loader = $("#globalLoader");
  const $carousel = $(".main-slider__carousel");
  const $podcastList = $("#new-podcasts");
  const $festivalLeft = $("#festivalLeft");
  const $festivalRight = $("#festivalRight");

  // Hide sections until content injected
  $festivalLeft.hide();
  $festivalRight.hide();
  $podcastList.hide();

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

      if (res.minutesLeft <= 30 && res.next?.program_category) {
        $("#nextProgramNotice")
          .text(`Next Show : ${res.next.program_category.category}`)
          .fadeIn(300);
      } else {
        $("#nextProgramNotice").fadeOut(200);
      }
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
        <div
          class="podcast-card 
                 bg-white rounded-xl border border-gray-100
                 p-2 shadow-sm hover:shadow-lg hover:-translate-y-1
                 transition-all cursor-pointer">

          <a href="podcast-details.php?id=${p.id}" class="block">

            <!-- Image -->
            <div class="relative rounded-lg overflow-hidden mb-3">
            <span
              class="absolute top-2 left-2 z-10
                     bg-red-600 text-white text-[10px]
                     font-bold px-2 py-0.5 rounded-full
                     shadow"
            >
              NEW
            </span>
              <img src="${img}" alt="podcast-cover"
                   class="w-full h-[150px] object-cover">

              <div class="absolute inset-0 bg-black/10 hover:bg-black/20 transition-all"></div>
            </div>

            <!-- Title -->
            <p class="text-[15px] font-medium text-gray-900 truncate">
              ${title}
            </p>

            <!-- Duration -->
            <div class="flex items-center gap-2 text-gray-600 text-sm mt-2">
              <i class="fa fa-clock text-[11px]"></i>
              <span class="text-[13px] font-medium text-[#f90000]">
                ${duration}
              </span>
            </div>

          </a>
        </div>
      `;
        })
        .join("");

      $podcastList.html(`
      <div class="grid grid-cols-1 xs:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-6">
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

  async function loadPopupBanner() {
    try {
      const r = await $.ajax({
        url: `${window.API_BASE_URL}/popup-banner?status=active`,
        method: "GET",
      });

      const b = r?.data?.data?.[0];
      if (!b) return;

      const path = b.website_image.replace(/\\/g, "/");
      $("#popupBanner-image").attr("src", `${window.API_BASE_URL}/${path}`);

      if (b.status === "active") {
        $("#popupBanner").css("display", "flex").hide().fadeIn(400);
        document.body.style.overflow = "hidden";
      }
    } catch {}
  }

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

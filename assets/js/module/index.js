$(document).ready(function () {
  let $loader = $("#globalLoader");
  const $carousel = $(".main-slider__carousel");
  const $podcastList = $(".live-class-two__list");
  const $festivalLeft = $("#festivalLeft");
  const $festivalRight = $("#festivalRight");

  // Hide sections until content injected
  $festivalLeft.hide();
  $festivalRight.hide();
  $podcastList.hide();

  // ---------------- CAROUSEL + BANNERS ✅ ----------------

  async function updateCarousel(program, firstLoad = false) {
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
          <img src="${programImage}" loading="eager" alt="${programImage}" />
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
            <img src="${window.API_BASE_URL}/${path}" loading="eager" alt="${path}" />
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
          <img src="assets/img/logo/thaalam-logo.png" loading="eager" alt="thaalam-logo" />
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
      dots: true,
      nav: false,
    });
  }

  // ---------------- LIVE PROGRAM API ✅ ----------------

  async function loadCurrentProgram(first = false) {
    try {
      const res = await $.ajax({
        url: `${window.API_BASE_URL}/radio-program/live-program`,
        method: "GET",
      });

      const program = res.current;
      const title = program?.program_category?.category || "No live program";
      const rj = program?.system_users?.name || "";
      const time = program?.program_category
        ? `Show Time: ${program.program_category.start_time.substring(
            0,
            5
          )} - ${program.program_category.end_time.substring(0, 5)}`
        : "";
      const imgURL = program?.system_users?.image_url
        ? `${window.API_BASE_URL}/${program.system_users.image_url.replace(
            /\\/g,
            "/"
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

  async function loadPodcasts() {
    if (!$podcastList.length) return;
    $podcastList.empty();
    try {
      const res = await $.ajax({
        url: `${window.API_BASE_URL}/podcasts?status=active&limit=4`,
        method: "GET",
      });
      const podcasts = res?.data?.data || [];
      podcasts.forEach((podcast) => {
        $podcastList.append(`
          <li>
                        <a href="podcast-details.php?id=${podcast.id}"  class="video-popup">
              <div class="live-class-two__icon"></div>
                            <h3 class="live-class-two__content-title">
                                <a href="podcast-details.php?id=${podcast.id}" >${podcast.title}</a>
                            </h3>
            </a>
                           
          </li>
        `);
      });
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
            `${window.API_BASE_URL}/${gif.left_side_image.replace(/\\/g, "/")}`
          )
          .fadeIn(400);
      } else {
        $festivalLeft.fadeOut(200);
      }

      if (gif.right_side_image) {
        $festivalRight
          .attr(
            "src",
            `${window.API_BASE_URL}/${gif.right_side_image.replace(/\\/g, "/")}`
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

    // autoplay attempt
    setTimeout(() => {
      audio
        .play()
        .then(() => {
          playIcon.classList.replace("fa-play", "fa-pause");
        })
        .catch(() => {});
    }, 200);

    // play/pause
    playBtn?.addEventListener("click", () => {
      if (audio.paused) {
        audio.play();
        playIcon.classList.replace("fa-play", "fa-pause");
      } else {
        audio.pause();
        playIcon.classList.replace("fa-pause", "fa-play");
      }
    });

    // volume slider
    volumeSlider?.addEventListener("input", (e) => {
      audio.volume = e.target.value;
      if (audio.volume == 0)
        volumeIcon.classList.replace("fa-volume-up", "fa-volume-mute");
      else volumeIcon.classList.replace("fa-volume-mute", "fa-volume-up");
    });

    // mute button
    volumeBtn?.addEventListener("click", () => {
      audio.muted = !audio.muted;
      if (audio.muted)
        volumeIcon.classList.replace("fa-volume-up", "fa-volume-mute");
      else volumeIcon.classList.replace("fa-volume-mute", "fa-volume-up");
    });

    // share copy
    shareBtn?.addEventListener("click", () => {
      navigator.clipboard
        .writeText(window.location.href)
        .then(() => showToast("Link Copied", "success"))
        .catch(console.error);
    });
  }

  initAudioPlayer();
});

$(document).ready(function () {
  function updateCarousel(program) {
    const $carousel = $(".main-slider__carousel");

    // Destroy existing carousel instance if exists
    if ($carousel.hasClass("owl-loaded")) {
      $carousel.trigger("destroy.owl.carousel");
      $carousel.removeClass("owl-loaded owl-hidden");
      $carousel.find(".owl-stage-outer").children().unwrap();
    }

    $carousel.empty();

    // Step 1: Collect slides (program banner + banners)
    const slides = [];

    // Add Program Banner (if exists)
    const programImage = program?.program_category?.image_url;
    if (programImage) {
      slides.push(`
            <div class="item">
              <div class="main-slider__bg">
                <img src="${programImage}" alt="Program Image" loading="eager" />
              </div>
            </div>
        `);
    }

    // Step 2: Fetch banners and append
    $.ajax({
      url: `${window.API_BASE_URL}/banners?status=active`,
      method: "GET",
      success: function (response) {
        const banners = response?.data?.data || [];

        banners.forEach((banner) => {
          const fixedPath = banner.website_image.replace(/\\/g, "/");
          slides.push(`
                    <div class="item">
                        <div class="main-slider__bg">
                          <img src="${window.API_BASE_URL}/${fixedPath}" alt="Program Image" loading="eager" />
                        </div>
                    </div>
                `);
        });

        // Step 3: Add all slides together (program + banners)
        $carousel.html(slides.join(""));

        // Step 4: Initialize Owl Carousel
        $carousel.owlCarousel({
          items: 1,
          loop: slides.length > 1,
          autoplay: true,
          autoplayTimeout: 5000,
          dots: true,
          nav: false,
        });
      },
      error: function () {
        showToast("Failed to load banners", "error");

        // Still show program image if available
        if (slides.length) {
          $carousel.html(slides.join(""));
          $carousel.owlCarousel({
            items: 1,
            loop: false,
            autoplay: true,
            autoplayTimeout: 5000,
            dots: true,
            nav: false,
          });
        }
      },
    });
  }

  const $audio = $("#audioPlayer");
  const $playBtn = $("#mainPlayBtn");
  const $playIcon = $("#mainPlayIcon");
  const $volumeBtn = $("#volumeBtn");
  const $volumeIcon = $("#volumeIcon");
  const $volumeSlider = $("#volumeSlider");

  let isMuted = false;

  $audio[0]
    .play()
    .then(function () {
      $playIcon.removeClass("fa-play").addClass("fa-pause");
    })
    .catch(function (err) {
      console.log(
        "Autoplay blocked by browser, will require user interaction:",
        err
      );
      $playIcon.removeClass("fa-pause").addClass("fa-play");
    });

  $playBtn.on("click", function () {
    if ($audio[0].paused) {
      $audio[0].play();
      $playIcon.removeClass("fa-play").addClass("fa-pause");
    } else {
      $audio[0].pause();
      $playIcon.removeClass("fa-pause").addClass("fa-play");
    }
  });

  $volumeSlider.on("input", function () {
    $audio[0].volume = $(this).val();
    if ($audio[0].volume === 0) {
      $volumeIcon.removeClass("fa-volume-up").addClass("fa-volume-mute");
    } else {
      $volumeIcon.removeClass("fa-volume-mute").addClass("fa-volume-up");
    }
  });

  $volumeBtn.on("click", function () {
    isMuted = !isMuted;
    $audio[0].muted = isMuted;
    if (isMuted) {
      $volumeIcon.removeClass("fa-volume-up").addClass("fa-volume-mute");
    } else {
      $volumeIcon.removeClass("fa-volume-mute").addClass("fa-volume-up");
    }
  });

  const shareBtn = $("#shareBtn");

  shareBtn.on("click", function () {
    const currentUrl = window.location.href;

    navigator.clipboard
      .writeText(currentUrl)
      .then(() => {
        showToast("Link Copied", "success");
      })
      .catch((err) => {
        console.error("Failed to copy: ", err);
      });
  });

  function loadCurrentProgram() {
    $.ajax({
      url: `${window.API_BASE_URL}/radio-program/live-program`,
      method: "GET",
      success: function (response) {
        const program = response.current;

        const programTitle =
          program?.program_category?.category || "No live program";
        const programArtist = program?.system_users?.name || "";
        const showTime = program?.program_category
          ? `Show Time: ${program.program_category.start_time.substring(
              0,
              5
            )} - ${program.program_category.end_time.substring(0, 5)}`
          : "";
        const imagePath = program?.system_users?.image_url
          ? `${window.API_BASE_URL}/${program.system_users.image_url.replace(
              /\\/g,
              "/"
            )}`
          : "/images/default-cover.jpg";

        // Only update if changed
        if ($("#programTitle").text() !== programTitle) {
          updateCarousel(program);
          $("#programTitle").text(programTitle);
        }
        if ($("#programArtist").text() !== programArtist)
          $("#programArtist").text(programArtist);
        if ($("#showTime").text() !== showTime) $("#showTime").text(showTime);
        if ($("#programImage").attr("src") !== imagePath)
          $("#programImage").attr("src", imagePath);

        // Next program notice
        if (response.minutesLeft <= 30 && response.next?.program_category) {
          const nextText = `Next Show : ${response.next.program_category.category}`;
          if (!$("#nextProgramNotice").length) {
            $("#showTime").after(
              '<div id="nextProgramNotice" class="blinking"></div>'
            );
          }
          if ($("#nextProgramNotice").text() !== nextText) {
            $("#nextProgramNotice").text(nextText).show();
          }
        } else {
          $("#nextProgramNotice").hide();
        }
      },
      error: function () {
        $("#programTitle").text("Error loading program");
        $("#programArtist").text("");
        $("#showTime").text("");
        $("#nextProgramNotice").hide();
        $("#programImage").attr("src", "/images/default-cover.jpg");
      },
    });
  }

  loadCurrentProgram();
  setInterval(loadCurrentProgram, 1 * 60 * 1000);

  const podcastList = $(".live-class-two__list");
  podcastList.empty();

  $.ajax({
    url: `${window.API_BASE_URL}/podcasts?status=active&limit=4`,
    method: "GET",
    success: function (response) {
      const podcasts = response?.data?.data;

      podcasts.forEach((podcast) => {
        const item = `
                    <li>
                        <a href="podcast-details.php?id=${podcast.id}"  class="video-popup">
                            <div class="live-class-two__icon"></div>
                            <h3 class="live-class-two__content-title">
                                <a href="podcast-details.php?id=${podcast.id}" >${podcast.title}</a>
                            </h3>
                        </a>
                           
                    </li>
                `;
        podcastList.append(item);
      });
    },
    error: function () {
      console.error("Failed to fetch podcasts");
    },
  });

  function popupbanner() {
    const popupBanner = document.getElementById("popupBanner");
    const popupBannerImage = document.getElementById("popupBanner-image");
    const closePopup = document.getElementById("close-popupBanner");

    popupBanner.style.display = "none";

    $.ajax({
      url: `${window.API_BASE_URL}/popup-banner?status=active`,
      method: "GET",
      success: function (response) {
        const bannerData = response?.data[0];

        if (!bannerData) return;

        const imagePath = bannerData.website_image.replace("/\\/g", "/");
        const imageURL = `${window.API_BASE_URL}/${imagePath}`;
        popupBannerImage.src = imageURL;

        if (bannerData.status === "active") {
          popupBanner.style.display = "flex";
          document.body.style.overflow = "hidden";
          $(popupBanner).hide().fadeIn(400);
        }
      },
      error: function () {
        console.error("Failed to fetch popup banner");
      },
    });

    closePopup.addEventListener("click", function () {
      $(popupBanner).fadeOut(300, function () {
        popupBanner.style.display = "none";
        document.body.style.overflow = ""; // Restore scroll
      });
    });

    // Close when clicking outside the container
    $(popupBanner).on("click", function (e) {
      if (e.target.id === "popupBanner") {
        $(popupBanner).fadeOut(300, function () {
          popupBanner.style.display = "none";
          document.body.style.overflow = ""; // Restore scroll
        });
      }
    });
  }

  popupbanner();

  function loadFestivalGifs() {
    const leftImg = document.getElementById("festivalLeft");
    const rightImg = document.getElementById("festivalRight");

    // Hide initially
    leftImg.style.display = "none";
    rightImg.style.display = "none";

    $.ajax({
      url: `${window.API_BASE_URL}/festival-gif?status=true`,
      method: "GET",
      success: function (response) {
        const gifData = response?.data[0];
        if (!gifData) return;

        if (gifData.left_side_image) {
          leftImg.src = `${
            window.API_BASE_URL
          }/${gifData.left_side_image.replace(/\\/g, "/")}`;
          leftImg.style.display = "block"; // show only if image exists
        }
        if (gifData.right_side_image) {
          rightImg.src = `${
            window.API_BASE_URL
          }/${gifData.right_side_image.replace(/\\/g, "/")}`;
          rightImg.style.display = "block"; // show only if image exists
        }
      },
      error: function () {
        console.error("Failed to fetch festival GIFs");
      },
    });
  }

  loadFestivalGifs();

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
});

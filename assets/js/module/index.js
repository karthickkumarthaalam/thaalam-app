$(document).ready(function () {

    function updateCarousel(program) {
        const $carousel = $('.main-slider__carousel');

        // Destroy existing carousel instance if exists
        if ($carousel.hasClass('owl-loaded')) {
            $carousel.trigger('destroy.owl.carousel');
            $carousel.removeClass('owl-loaded owl-hidden');
            $carousel.find('.owl-stage-outer').children().unwrap();
        }

        $carousel.empty();

        // Check if current program has an image
        const programImage = program?.program_category?.image_url;

        if (programImage) {
            const slide = `
            <div class="item">
                <div class="main-slider__bg" 
                     style="background-image: url(${programImage})"></div>
            </div>
        `;
            $carousel.append(slide);

            $carousel.owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                dots: true,
                nav: false
            });
        } else {
            // Fallback: load banners as before
            $.ajax({
                url: `${window.API_BASE_URL}/banners?status=active`,
                method: "GET",
                success: function (response) {
                    const banners = response?.data?.data || [];
                    banners.forEach(banner => {
                        const fixedPath = banner.website_image.replace(/\\/g, "/");
                        const slide = `
                        <div class="item">
                            <div class="main-slider__bg" 
                                 style="background-image: url(${window.API_BASE_URL}/${fixedPath})"></div>
                        </div>
                    `;
                        $carousel.append(slide);
                    });

                    $carousel.owlCarousel({
                        items: 1,
                        loop: true,
                        autoplay: true,
                        autoplayTimeout: 5000,
                        dots: true,
                        nav: false
                    });
                },
                error: function () {
                    showToast('Failed to load banners', 'error');
                }
            });
        }
    }

    const $audio = $("#audioPlayer");
    const $playBtn = $("#mainPlayBtn");
    const $playIcon = $("#mainPlayIcon");
    const $volumeBtn = $("#volumeBtn");
    const $volumeIcon = $("#volumeIcon");
    const $volumeSlider = $("#volumeSlider");


    let isMuted = false;

    $audio[0].play()
        .then(function () {
            $playIcon.removeClass("fa-play").addClass("fa-pause");
        })
        .catch(function (err) {
            console.log("Autoplay blocked by browser, will require user interaction:", err);
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

        navigator.clipboard.writeText(currentUrl)
            .then(() => {
                showToast("Link Copied", "success");
            })
            .catch(err => {
                console.error("Failed to copy: ", err);
            });
    });


    function loadCurrentProgram() {
        $.ajax({
            url: `${window.API_BASE_URL}/radio-program/live-program`,
            method: "GET",
            success: function (response) {
                const program = response.current;

                const programTitle = program?.program_category?.category || "No live program";
                const programArtist = program?.system_users?.name || "";
                const showTime = program?.program_category
                    ? `Show Time: ${program.program_category.start_time.substring(0, 5)} - ${program.program_category.end_time.substring(0, 5)}`
                    : "";
                const imagePath = program?.system_users?.image_url
                    ? `${window.API_BASE_URL}/${program.system_users.image_url.replace(/\\/g, "/")}`
                    : "/images/default-cover.jpg";

                // Only update if changed
                if ($("#programTitle").text() !== programTitle) {
                    updateCarousel(program);
                    $("#programTitle").text(programTitle);
                }
                if ($("#programArtist").text() !== programArtist) $("#programArtist").text(programArtist);
                if ($("#showTime").text() !== showTime) $("#showTime").text(showTime);
                if ($("#programImage").attr("src") !== imagePath) $("#programImage").attr("src", imagePath);

                // Next program notice
                if (response.minutesLeft <= 30 && response.next?.program_category) {
                    const nextText = `Next Show : ${response.next.program_category.category}`;
                    if (!$("#nextProgramNotice").length) {
                        $("#showTime").after('<div id="nextProgramNotice" class="blinking"></div>');
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
            }
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

            podcasts.forEach(podcast => {
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
        }
    });

});

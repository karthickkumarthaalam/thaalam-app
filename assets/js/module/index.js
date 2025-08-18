$(document).ready(function () {
    const $carousel = $('.main-slider__carousel');

    $.ajax({
        url: `${window.API_BASE_URL}/banners?status=active`,
        method: "GET",
        success: function (response) {
            const banners = response?.data?.data || [];

            if ($carousel.hasClass('owl-loaded')) {
                $carousel.trigger('destroy.owl.carousel');
                $carousel.removeClass('owl-loaded owl-hidden');
                $carousel.find('.owl-stage-outer').children().unwrap();
            }

            $carousel.empty();

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

            // Reinitialize carousel
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

    const $audio = $("#audioPlayer");
    const $playBtn = $("#mainPlayBtn");
    const $playIcon = $("#mainPlayIcon");
    const $volumeBtn = $("#volumeBtn");
    const $volumeIcon = $("#volumeIcon");
    const $volumeSlider = $("#volumeSlider");


    let isMuted = false;

    $audio[0].play().catch(function (err) {
        console.log("Autoplay blocked by browser, will require user interaction:", err);
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


    function loadCurrentProgram() {
        $.ajax({
            url: `${window.API_BASE_URL}/radio-program/live-program`,
            method: "GET",
            success: function (response) {
                const program = response.current;

                if (!program || !program.program_category) {
                    $("#programTitle").text("No live program");
                    $("#programArtist").text("");
                    $("#showTime").text("");
                    $("#nextProgramNotice").hide();
                    $("#programImage").attr("src", "/images/default-cover.jpg");
                    return;
                }

                // Current program info
                $('#programTitle').text(program?.program_category?.category);
                $('#programArtist').text(program?.system_users?.name);
                $('#showTime').text(
                    `Show Time: ${program?.program_category?.start_time?.substring(0, 5)} - ${program?.program_category?.end_time?.substring(0, 5)}`
                );

                const imagePath = program?.system_users?.image_url
                    ? `${window.API_BASE_URL}/${program?.system_users?.image_url?.replace(/\\/g, "/")}`
                    : "/images/default-cover.jpg";

                $("#programImage").attr("src", imagePath);

                // Next program notice (only if minutesLeft <= 15)
                if (response.minutesLeft <= 15 && response.next?.program_category) {
                    if (!$("#nextProgramNotice").length) {
                        $("#showTime").after('<div id="nextProgramNotice" class="blinking"></div>');
                    }
                    $("#nextProgramNotice")
                        .text(`Next Show : ${response.next.program_category.category}`)
                        .show();
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
        url: `${window.API_BASE_URL}/podcasts?status=active&limit=2`,
        method: "GET",
        success: function (response) {

            const podcasts = response?.data?.data;

            podcasts.forEach(podcast => {
                const tagsHtml = podcast.tags && podcast.tags.length > 0
                    ? podcast.tags.map(tag => `<span class="tag">${tag}</span>`).join(" ")
                    : "";

                const item = `
                    <li>
                        <a href="podcast-details.php?id=${podcast.id}"  class="video-popup">
                            <div class="live-class-two__icon"></div>
                        </a>
                        <div class="live-class-two__content">
                            <ul class="live-class-two__content-meta-list list-unstyled">
                                <li>
                                    <div class="icon">
                                        <span class="icon-microphone"></span>
                                    </div>
                                    <p>${podcast.rjname}</p>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-clock"></span>
                                    </div>
                                    <p>${new Date(podcast.date).toLocaleDateString()}</p>
                                </li>
                            </ul>
                            <h3 class="live-class-two__content-title">
                                <a href="#">${podcast.title}</a>
                            </h3>
                            <div class="live-class-two__tags">
                                ${tagsHtml}
                            </div>
                        </div>
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

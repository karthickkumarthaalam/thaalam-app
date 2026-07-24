<?php if (isset($pagename) && $pagename === 'home') return; ?>

<!-- Floating Radio Modal -->
<div id="radioModal" class="fixed bottom-5 right-5 z-[999] w-72 rounded-2xl bg-white shadow-2xl border border-slate-100 overflow-hidden transition-all duration-300" style="display:none;">

    <!-- Banner -->
    <div class="relative h-32 bg-gray-900 overflow-hidden">
        <img id="rmBanner" alt="Radio Banner"
            class="w-full h-full object-cover opacity-70" />
        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>

        <!-- Live badge -->
        <span class="absolute top-2 left-3 inline-flex items-center gap-1.5 bg-red-600 text-white text-[10px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wide">
            <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span> Live
        </span>

        <!-- Close -->
        <button id="rmClose" class="absolute top-2 right-2 w-6 h-6 flex items-center justify-center rounded-full bg-black/50 text-white hover:bg-black/70 text-xs">
            <i class="fas fa-minus"></i>
        </button>
    </div>

    <!-- Info -->
    <div class="flex items-center gap-3 px-4 py-3 border-b border-slate-100">
        <img id="rmRjImage" src="assets/img/logo/thalam-logo.png" alt="RJ"
            class="w-12 h-12 rounded-lg object-contain border-2 border-red-100 flex-shrink-0" />
        <div class="min-w-0">
            <p id="rmTitle" class="text-sm font-semibold text-slate-900 truncate">Thaalam Live Stream</p>
            <!-- <p id="rmRjName" class="text-xs text-slate-500 truncate flex items-center gap-1">
                Live RJ
                <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse inline-block"></span>
            </p> -->
        </div>
    </div>

    <!-- Controls -->
    <div class="flex items-center justify-between px-4 py-1.5">
        <button id="rmVolumeBtn" class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition text-sm">
            <i class="fas fa-volume-up" id="rmVolumeIcon"></i>
        </button>

        <button id="rmPlayBtn"
            class="w-12 h-12 flex items-center justify-center rounded-full bg-gradient-to-br from-red-500 to-red-600 text-white shadow-md hover:scale-105 transition text-base">
            <i class="fas fa-play" id="rmPlayIcon"></i>
        </button>

        <a href="index" class="w-8 h-8 flex items-center justify-center rounded-full bg-slate-100 hover:bg-slate-200 text-slate-600 transition text-sm">
            <i class="fas fa-external-link-alt"></i>
        </a>
    </div>

    <audio id="rmAudio" src="https://thaalam.out.airtime.pro/thaalam_b"></audio>
</div>

<!-- Trigger Tab -->
<button id="rmTrigger"
    class="fixed bottom-5 right-5 z-[999] flex items-center gap-2 bg-gradient-to-r from-red-600 to-red-500 text-white px-4 py-2.5 rounded-full shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition text-sm font-semibold">
    <span class="w-2 h-2 rounded-full bg-white animate-pulse"></span>
    Listen Live
</button>

<script>
    (function() {
        const modal = document.getElementById('radioModal');
        const trigger = document.getElementById('rmTrigger');
        const closeBtn = document.getElementById('rmClose');
        const playBtn = document.getElementById('rmPlayBtn');
        const playIcon = document.getElementById('rmPlayIcon');
        const audio = document.getElementById('rmAudio');
        const volBtn = document.getElementById('rmVolumeBtn');
        const volIcon = document.getElementById('rmVolumeIcon');

        let playing = false;
        let muted = false;

        const shouldOpen = sessionStorage.getItem('radioModalOpen');
        const shouldPlay = sessionStorage.getItem('radioPlaying');

        if (shouldOpen === 'true') {
            modal.style.display = 'block';
            trigger.style.display = 'none';

            if (shouldPlay === 'true') {
                setTimeout(() => {
                    startPlay();
                }, 300);
            }
        }

        trigger.addEventListener('click', () => {
            modal.style.display = 'block';
            trigger.style.display = 'none';

            sessionStorage.setItem('radioModalOpen', 'true');

            if (!playing) {
                startPlay();
            }
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
            trigger.style.display = 'flex';

            sessionStorage.removeItem('radioModalOpen');
            sessionStorage.setItem('radioPlaying', 'false');


        });

        playBtn.addEventListener('click', () => {
            if (playing) {
                audio.pause();
                playIcon.className = 'fas fa-play';
                playing = false;
                sessionStorage.setItem('radioPlaying', 'false');
            } else {
                startPlay();
            }
        });

        volBtn.addEventListener('click', () => {
            muted = !muted;
            audio.muted = muted;
            volIcon.className = muted ? 'fas fa-volume-mute' : 'fas fa-volume-up';
        });

        let interruptedByOtherMedia = false;

        document.addEventListener('play', function(e) {

            const media = e.target;

            if (
                media instanceof HTMLMediaElement &&
                media !== audio &&
                !audio.paused
            ) {
                interruptedByOtherMedia = true;

                audio.pause();

                playing = false;
                playIcon.className = 'fas fa-play';
            }

        }, true);
        document.addEventListener('ended', function(e) {

            const media = e.target;

            if (
                interruptedByOtherMedia &&
                media instanceof HTMLMediaElement &&
                media !== audio
            ) {

                const otherPlaying = Array.from(
                    document.querySelectorAll('audio,video')
                ).some(el =>
                    el !== audio &&
                    !el.paused &&
                    !el.ended
                );

                if (
                    !otherPlaying &&
                    sessionStorage.getItem('radioModalOpen') === 'true' &&
                    sessionStorage.getItem('radioPlaying') === 'true'
                ) {
                    startPlay();
                    interruptedByOtherMedia = false;
                }
            }

        }, true);

        document.addEventListener('visibilitychange', () => {

            if (
                !document.hidden &&
                sessionStorage.getItem('radioModalOpen') === 'true' &&
                sessionStorage.getItem('radioPlaying') === 'true' &&
                audio.paused
            ) {
                startPlay();
            }

        });

        function startPlay() {
            audio.play()
                .then(() => {
                    playIcon.className = 'fas fa-pause';
                    playing = true;

                    sessionStorage.setItem('radioPlaying', 'true');
                })
                .catch(() => {});
        }
        // Sync with index page player via event, or fetch independently on other pages
        function updateModalInfo(title, rjName, imgURL, bannerURL) {
            if (title) document.getElementById('rmTitle').textContent = title;
            // if (rjName) document.getElementById('rmRjName').innerHTML =
            //     rjName + ' <span class="w-1.5 h-1.5 bg-green-500 rounded-full animate-pulse inline-block"></span>';
            if (imgURL) document.getElementById('rmRjImage').src = imgURL;
            if (bannerURL) document.getElementById('rmBanner').src = bannerURL;
        }

        function extractModalData(res) {
            const program = res.current;
            const title = program?.program_category?.category || '';
            const rj = program?.system_users?.name || '';
            const imgURL = program?.system_users?.image_url ?
                window.API_BASE_URL + '/' + program.system_users.image_url.replace(/\\/g, '/') :
                '';
            const bannerURL = program?.program_category?.image_url || '';
            return {
                title,
                rj,
                imgURL,
                bannerURL
            };
        }

        // Listen for event fired by index.js (index page)
        window.addEventListener('program:changed', function(e) {
            updateModalInfo(e.detail.title, e.detail.rj, e.detail.imgURL, e.detail.bannerURL);
        });

        window.API_BASE_URL = 'https://api.thaalam.ch/api'

        // On non-index pages, fetch independently
        if (typeof window.API_BASE_URL !== 'undefined') {
            fetch(window.API_BASE_URL + '/radio-program/live-program')
                .then(r => r.json())
                .then(res => {
                    const {
                        title,
                        rj,
                        imgURL,
                        bannerURL
                    } = extractModalData(res);
                    updateModalInfo(title, rj, imgURL, bannerURL);
                    setInterval(() => {
                        fetch(window.API_BASE_URL + '/radio-program/live-program')
                            .then(r => r.json())
                            .then(res => {
                                const {
                                    title,
                                    rj,
                                    imgURL,
                                    bannerURL
                                } = extractModalData(res);
                                updateModalInfo(title, rj, imgURL, bannerURL);
                            }).catch(() => {});
                    }, 60000);
                }).catch(() => {});
        }
    })();
</script>
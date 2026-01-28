"use strict";

/* ------------------------------------------------------------------
   CONFIG
------------------------------------------------------------------ */
const API_URL = `${window.API_BASE_URL}/podcasts`;
const PER_PAGE = 15;
const CATEGORY_ID = 1;

let currentPage = 1;
let totalPages = 1;

const globalAudio = new Audio();
let currentTrackId = null;
let activeRow = null;
let activeBtn = null;

/* ------------------------------------------------------------------
   INIT
------------------------------------------------------------------ */
document.addEventListener("DOMContentLoaded", () => {
  fetchPodcasts(1);
  bindPagination();
  bindGlobalAudio();
  bindDockControls();
});

/* ------------------------------------------------------------------
   FETCH
------------------------------------------------------------------ */
async function fetchPodcasts(page = 1) {
  const list = document.getElementById("podcast-list");
  const pagination = document.getElementById("pagination");

  if (!list) return;

  list.innerHTML = skeletonUI();

  try {
    const res = await fetch(
      `${API_URL}?status=approved&page=${page}&limit=${PER_PAGE}&category_id=${CATEGORY_ID}`,
    );
    if (!res.ok) throw new Error("API failed");

    const json = await res.json();
    const podcasts = json?.data?.data || [];
    const pg = json?.data?.pagination || {};

    currentPage = pg.currentPage || page;
    totalPages = pg.totalPages || 1;

    renderPodcasts(podcasts, list);
    renderPagination(pagination);

    // Restore playing state if any
    restorePlayingState();
  } catch (err) {
    console.error(err);
    list.innerHTML = errorUI();
  }
}

/* ------------------------------------------------------------------
   UI RENDER
------------------------------------------------------------------ */
function renderPodcasts(items, container) {
  if (!items.length) {
    container.innerHTML = emptyUI();
    return;
  }

  container.innerHTML = `
    <div class="space-y-2 mt-6">
      ${items.map(renderCard).join("")}
    </div>
  `;
}

function renderCard(p, i) {
  // Create a unique ID for each track
  const trackId = `track-${currentPage}-${i}`;
  const isCurrentTrack = currentTrackId === trackId;
  const isPlaying =
    isCurrentTrack && !globalAudio.paused && globalAudio.currentTime > 0;
  return `
<div class="podcast-row group relative flex items-center justify-between gap-4 px-4 py-4
              border-b border-gray-200 transition-all duration-300
              hover:bg-gradient-to-r hover:from-red-50/60 hover:to-pink-50/40
              ${
                isCurrentTrack
                  ? "playing bg-gradient-to-r from-red-50/60 to-pink-50/40"
                  : ""
              }">
    <!-- Active bar -->
    <span class="absolute left-0 top-0 h-full w-1
                 bg-gradient-to-b from-red-400 to-pink-600
                 scale-y-0 group-[.playing]:scale-y-100
                 transition-transform origin-top"></span>

    <!-- LEFT -->
    <div class="flex items-start gap-4 min-w-0">

      <!-- Index -->
      <div class="hidden sm:block w-8 text-sm font-mono pt-1
                  ${isCurrentTrack ? "text-red-500" : "text-gray-400"}">
        ${String(i + 1).padStart(2, "0")}
      </div>

      <!-- Title + Meta -->
      <div class="min-w-0">
        <h3 class="text-[15px] sm:text-[16px] font-semibold truncate
                   ${isCurrentTrack ? "text-red-600" : "text-gray-900"}">
          ${p.title}
        </h3>

        <div class="flex items-center gap-4 text-xs sm:text-sm mt-2">
          <!-- Author -->
          <div class="flex items-center gap-2">
            <div class="relative">
              <div class="w-2 h-2 rounded-full bg-gradient-to-r from-red-500 to-pink-500 ${
                isPlaying ? "animate-pulse" : ""
              }"></div>
              ${
                isPlaying
                  ? '<div class="absolute -inset-1 rounded-full bg-red-500/30 animate-ping"></div>'
                  : ""
              }
            </div>
            <span class="font-medium text-gray-900">${
              p.rjname || "Thaalam Team"
            }</span>
          </div>

          <!-- Separator -->
          <div class="w-px h-4 bg-gradient-to-b from-transparent via-gray-300 to-transparent"></div>

          <!-- Duration -->
          <div class="flex items-center gap-2">
            <svg class="w-3.5 h-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            <span class="font-medium text-gray-700">${
              p.duration || "--:--"
            }</span>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <button
      class="play-btn flex items-center justify-center gap-1
             w-11 h-11 sm:w-auto sm:h-auto
             sm:px-4 sm:py-1.5
             text-sm font-semibold
             rounded-full border
             transition-all duration-300
             ${
               isCurrentTrack
                 ? "bg-gradient-to-r from-purple-500 to-indigo-600 text-white border-red-500"
                 : "text-purple-800 border-red-300 hover:bg-gradient-to-r hover:from-purple-500 hover:to-indigo-600 hover:text-white hover:border-red-500"
             }"
      data-podcast-id="${p.id}"
      data-audio-url="${p.audio_drive_file_link}"
      data-title="${p.title}"
      data-rj="${p.rjname}"
      data-track-id="${trackId}">

      <!-- Icon -->
      <span class="play-icon text-lg sm:text-base">
        ${isPlaying ? "⏸" : "▶"}
      </span>

      <!-- Text only on desktop -->
      <span class="hidden sm:inline">
        ${isPlaying ? "Pause" : "Play"}
      </span>
    </button>
  </div>
  `;
}

/* ---------------------------------------------------------------
PODCAST VIEW TRACKER (LIST PAGE)
-----------------------------------------------------------------*/
const trackPodcastView = (() => {
  const REQUIRED_SECONDS = 20;

  let currentPodcastId = null;
  let watchedSeconds = 0;
  let lastTime = 0;
  let playing = false;
  let tracked = false;

  const reset = (podcastId) => {
    currentPodcastId = podcastId;
    watchedSeconds = 0;
    lastTime = 0;
    playing = false;
    tracked = false;
  };

  const sendView = () => {
    if (tracked || !currentPodcastId) return;
    tracked = true;

    fetch(`${API_URL}/reaction/${currentPodcastId}/view`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        member_id: localStorage.getItem("memberId") || null,
        guest_id: localStorage.getItem("memberId") ? null : getGuestId?.(),
      }),
      priority: "low",
    }).catch(() => {});
  };

  return {
    reset,

    play(media) {
      if (tracked) return;
      playing = true;
      lastTime = media.currentTime;
    },

    pause(media) {
      if (!playing || tracked) return;

      watchedSeconds += Math.max(0, media.currentTime - lastTime);
      playing = false;

      if (watchedSeconds >= REQUIRED_SECONDS) {
        sendView();
      }
    },

    timeupdate(media) {
      if (!playing || tracked || document.hidden) return;

      const delta = media.currentTime - lastTime;

      if (delta > 0 && delta < 1.5) {
        watchedSeconds += delta;
      }

      lastTime = media.currentTime;

      if (watchedSeconds >= REQUIRED_SECONDS) {
        sendView();
      }
    },

    ended(media) {
      this.pause(media);
    },
  };
})();

/* ------------------------------------------------------------------
   EVENT DELEGATION (LIST PLAY)
------------------------------------------------------------------ */
document.addEventListener("click", (e) => {
  const btn = e.target.closest(".play-btn");
  if (!btn) return;

  const row = btn.closest(".podcast-row");
  const url = btn.dataset.audioUrl;
  const trackId = btn.dataset.trackId;

  // If clicking the same track that's currently loaded
  if (currentTrackId === trackId) {
    // Toggle play/pause
    if (globalAudio.paused) {
      globalAudio.play();
    } else {
      globalAudio.pause();
    }
    return;
  }

  // If it's a different track, load and play it
  playNewTrack({ url, trackId, row, btn });
});

/* ------------------------------------------------------------------
   CORE PLAY LOGIC
------------------------------------------------------------------ */
function playNewTrack({ url, trackId, row, btn }) {
  const podcastId = btn.dataset.podcastId;

  trackPodcastView.reset(podcastId);

  // Clear previous playing state
  clearActiveState();

  // Update current track ID
  currentTrackId = trackId;
  activeRow = row;
  activeBtn = btn;

  // Set audio source and load
  globalAudio.src = url;
  globalAudio.load();

  // Play the audio
  globalAudio.play().catch((e) => {
    console.error("Playback failed:", e);
    // Reset state on error
    clearActiveState();
    currentTrackId = null;
  });

  // Update UI immediately
  updateButtonUI(btn, true);
  row.classList.add("playing");
  updateDock(btn.dataset.title, btn.dataset.rj);
}

function togglePlayback() {
  if (!currentTrackId) return;

  if (globalAudio.paused) {
    globalAudio.play();
  } else {
    globalAudio.pause();
  }
}

function clearActiveState() {
  // Remove playing class from all rows
  document.querySelectorAll(".podcast-row.playing").forEach((row) => {
    row.classList.remove("playing");
  });

  // Reset all buttons to play state
  document.querySelectorAll(".play-btn").forEach((btn) => {
    const playIcon = btn.querySelector(".play-icon");
    const playText = btn.querySelector("span:not(.play-icon)");

    if (playIcon) playIcon.textContent = "▶";
    if (playText) playText.textContent = "Play";

    // Reset button styles
    btn.classList.remove(
      "bg-gradient-to-r",
      "from-purple-500",
      "to-indigo-600",
      "text-white",
      "border-red-500",
    );
    btn.classList.add("text-purple-800", "border-red-300");
  });

  activeRow = null;
  activeBtn = null;
}

function updateButtonUI(btn, isPlaying) {
  if (!btn) return;

  const playIcon = btn.querySelector(".play-icon");
  const playText = btn.querySelector("span:not(.play-icon)");

  if (playIcon) {
    playIcon.textContent = isPlaying ? "⏸" : "▶";
  }

  if (playText) {
    playText.textContent = isPlaying ? "Pause" : "Play";
  }

  // Update button styles
  if (isPlaying) {
    btn.classList.add(
      "bg-gradient-to-r",
      "from-purple-500",
      "to-indigo-600",
      "text-white",
      "border-red-500",
    );
    btn.classList.remove("text-purple-800", "border-red-300");
  } else {
    btn.classList.remove(
      "bg-gradient-to-r",
      "from-purple-500",
      "to-indigo-600",
      "text-white",
      "border-red-500",
    );
    btn.classList.add("text-purple-800", "border-red-300");
  }
}

function restorePlayingState() {
  if (!currentTrackId) return;

  // Find the current track button
  const currentBtn = document.querySelector(
    `[data-track-id="${currentTrackId}"]`,
  );
  if (!currentBtn) {
    // Track not found on this page
    currentTrackId = null;
    return;
  }

  const currentRow = currentBtn.closest(".podcast-row");

  // Restore UI state
  activeBtn = currentBtn;
  activeRow = currentRow;

  const isPlaying = !globalAudio.paused && globalAudio.currentTime > 0;

  updateButtonUI(currentBtn, isPlaying);
  if (isPlaying) {
    currentRow.classList.add("playing");
  }
}

/* ------------------------------------------------------------------
   GLOBAL AUDIO EVENTS
------------------------------------------------------------------ */
function bindGlobalAudio() {
  globalAudio.addEventListener("play", () => {
    setDockIcon("⏸");
    if (activeBtn) {
      updateButtonUI(activeBtn, true);
    }
    if (activeRow) {
      activeRow.classList.add("playing");
    }

    trackPodcastView.play(globalAudio);
  });

  globalAudio.addEventListener("pause", () => {
    setDockIcon("▶");
    if (activeBtn) {
      updateButtonUI(activeBtn, false);
    }
    trackPodcastView.pause(globalAudio);
  });

  globalAudio.addEventListener("timeupdate", () => {
    trackPodcastView.timeupdate(globalAudio);
    if (!globalAudio.duration || isNaN(globalAudio.duration)) return;

    const progress = (globalAudio.currentTime / globalAudio.duration) * 100;
    document.getElementById("dock-progress").style.width = progress + "%";

    document.getElementById("dock-cur").innerText = fmt(
      globalAudio.currentTime,
    );
    document.getElementById("dock-dur").innerText = fmt(globalAudio.duration);
  });

  globalAudio.addEventListener("ended", () => {
    trackPodcastView.ended(globalAudio);
    clearActiveState();
    setDockIcon("▶");
    currentTrackId = null;
  });

  globalAudio.addEventListener("error", () => {
    console.error("Audio playback error");
    clearActiveState();
    setDockIcon("▶");
    currentTrackId = null;
  });
}

/* ------------------------------------------------------------------
   DOCK CONTROLS
------------------------------------------------------------------ */
function bindDockControls() {
  const dockPlayBtn = document.getElementById("dock-play-pause");
  if (dockPlayBtn) {
    dockPlayBtn.addEventListener("click", () => {
      togglePlayback();
    });
  }

  const progressContainer = document.getElementById("progress-container");
  if (progressContainer) {
    progressContainer.addEventListener("click", (e) => {
      if (!globalAudio.duration) return;

      const rect = e.currentTarget.getBoundingClientRect();
      const percent = (e.clientX - rect.left) / rect.width;
      globalAudio.currentTime = percent * globalAudio.duration;
    });
  }
}

function updateDock(title, rj) {
  const dockTitle = document.getElementById("dock-title");
  const dockRJ = document.getElementById("dock-rj");
  const playerDock = document.getElementById("player-dock");

  if (dockTitle) dockTitle.innerText = title;
  if (dockRJ) dockRJ.innerText = "RJ " + rj;
  if (playerDock) playerDock.classList.remove("translate-y-[150%]");
}

function setDockIcon(icon) {
  const dockPlayBtn = document.getElementById("dock-play-pause");
  if (dockPlayBtn) {
    dockPlayBtn.textContent = icon;
  }
}

/* ------------------------------------------------------------------
   PAGINATION
------------------------------------------------------------------ */
function renderPagination(el) {
  if (!el || totalPages <= 1) {
    el.innerHTML = "";
    return;
  }

  el.innerHTML = `
    <div class="flex justify-center gap-2 mt-8">
      ${Array.from({ length: totalPages })
        .map(
          (_, i) => `
          <button data-page="${i + 1}"
            class="px-3 py-2 rounded ${
              currentPage === i + 1
                ? "bg-red-500 text-white"
                : "bg-gray-100 hover:bg-gray-200"
            }">
            ${i + 1}
          </button>`,
        )
        .join("")}
    </div>
  `;
}

function bindPagination() {
  document.addEventListener("click", (e) => {
    const btn = e.target.closest("[data-page]");
    if (!btn) return;

    const page = Number(btn.dataset.page);
    if (page !== currentPage) {
      // Pause audio and reset state
      globalAudio.pause();
      clearActiveState();
      currentTrackId = null;
      trackPodcastView.reset(null);
      // Fetch new page
      fetchPodcasts(page);
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  });
}

/* ------------------------------------------------------------------
   HELPERS
------------------------------------------------------------------ */
const fmt = (s) => {
  if (isNaN(s)) return "0:00";
  const mins = Math.floor(s / 60);
  const secs = Math.floor(s % 60);
  return `${mins}:${secs.toString().padStart(2, "0")}`;
};

const skeletonUI = () =>
  `<div class="space-y-4 mt-6 animate-pulse">
    ${Array(4).fill(`<div class="h-20 bg-gray-100 rounded-xl"></div>`).join("")}
   </div>`;

const emptyUI = () =>
  `<p class="text-center text-gray-400 mt-10">No podcasts found</p>`;

const errorUI = () =>
  `<p class="text-center text-red-500 mt-10">Failed to load podcasts</p>`;

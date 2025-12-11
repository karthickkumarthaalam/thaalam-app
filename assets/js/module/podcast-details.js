/* assets/js/module/podcasts-details.js
   Optimized for performance and memory usage
*/

document.addEventListener("DOMContentLoaded", () => {
  // API base provided by your config-js (window.API_BASE_URL)
  const API = window.API_BASE_URL;

  // DOM references using more memory-efficient approach
  const el = (() => {
    const ids = [
      "thaalam-player",
      "audioSource",
      "thaalam-play-pause-btn",
      "prev-btn",
      "next-btn",
      "repeat-btn",
      "thaalam-progress-bar",
      "thaalam-progress-fill",
      "thaalam-current-time",
      "thaalam-duration",
      "like-btn",
      "like-count",
      "share-btn",
      "share-modal",
      "close-share",
      "copy-link",
      "podcast-link",
      "comment-btn",
      "comments-modal",
      "close-comments",
      "comments-list",
      "commentCount",
      "toggle-comment-box",
      "comment-input-section",
      "guest-fields",
      "guest-name",
      "guest-email",
      "comment-message",
      "submit-comment",
      "podcastTitle",
      "podcastCategoryName",
      "publishedDate",
      "sidebar-duration",
      "podcastImage",
      "podcastDescription",
      "relatedPodcasts",
      "videoSection",
      "videoContainer",
      "relatedPodcastsSidebar",
      "relatedPodcastsBottom",
      "relatedBottomContainer",
      "relatedSidebarContainer",
    ];

    const elements = {};
    for (const id of ids) {
      elements[id.replace(/-([a-z])/g, (g) => g[1].toUpperCase())] =
        document.getElementById(id);
    }
    return elements;
  })();

  // Memoized utility functions
  const utils = {
    formatTime: (() => {
      const cache = new Map();
      return (seconds) => {
        if (!seconds || isNaN(seconds)) return "00:00";
        if (cache.has(seconds)) return cache.get(seconds);

        const m = Math.floor(seconds / 60);
        const s = Math.floor(seconds % 60);
        const result = `${String(m).padStart(2, "0")}:${String(s).padStart(
          2,
          "0"
        )}`;
        cache.set(seconds, result);
        return result;
      };
    })(),

    timeAgo: (() => {
      const cache = new Map();
      const ONE_MINUTE = 60000;
      const ONE_HOUR = 450000;
      const ONE_DAY = 86400000;

      return (dateString) => {
        if (!dateString) return "Just now";
        if (cache.has(dateString)) return cache.get(dateString);

        const now = Date.now();
        const posted = new Date(dateString).getTime();
        const diff = now - posted;

        let result;
        if (diff < ONE_MINUTE) result = "Just now";
        else if (diff < ONE_HOUR) {
          const mins = Math.floor(diff / ONE_MINUTE);
          result = `${mins} min${mins !== 1 ? "s" : ""} ago`;
        } else if (diff < ONE_DAY) {
          const hours = Math.floor(diff / ONE_HOUR);
          result = `${hours} hour${hours !== 1 ? "s" : ""} ago`;
        } else {
          result = new Date(posted).toLocaleDateString();
        }

        cache.set(dateString, result);
        // Clean old cache entries periodically
        if (cache.size > 100) {
          const keys = Array.from(cache.keys()).slice(0, 20);
          keys.forEach((key) => cache.delete(key));
        }
        return result;
      };
    })(),

    escapeHtml: (() => {
      const escapeMap = {
        "&": "&amp;",
        "<": "&lt;",
        ">": "&gt;",
        '"': "&quot;",
        "'": "&#039;",
      };
      const escapeRegex = /[&<>"']/g;

      return (unsafe) => {
        if (!unsafe) return "";
        return String(unsafe).replace(escapeRegex, (char) => escapeMap[char]);
      };
    })(),

    truncate: (str, n) => {
      if (!str || str.length <= n) return str || "";
      return str.slice(0, n) + "…";
    },

    toast: (() => {
      const activeToasts = new Set();
      return (msg, type = "info") => {
        if (typeof showToast === "function") return showToast(msg, type);
        console[type === "error" ? "error" : "log"](msg);
      };
    })(),
  };

  // Header gradient - generate once
  const headerGradient = (() => {
    const gradients = [
      "linear-gradient(45deg, #0f172a 0%, #1e3a8a 50%, #3b82f6 100%)",
      "linear-gradient(45deg, #280a0a 0%, #8a1e1e 50%, #ff4d4d 100%)",
      "linear-gradient(45deg, #1b0f2a 0%, #5a1e8a 50%, #b450ff 100%)",
      "linear-gradient(45deg, #0a1f12 0%, #1e8a4e 50%, #4dff88 100%)",
      "linear-gradient(45deg, #2a0f1e 0%, #8a1e5a 50%, #ff50a8 100%)",
      "linear-gradient(45deg, #0b0b0b 0%, #3a3a3a 50%, #bfbfbf 100%)",
      "linear-gradient(45deg, #1f0a00 0%, #a33200 50%, #ff7a3b 100%)",
    ];

    const header = document.querySelector(".podcast-header-gradient");
    if (header) {
      header.style.background =
        gradients[Math.floor(Math.random() * gradients.length)];
    }
  })();

  // Get podcast ID from URL
  const params = new URLSearchParams(window.location.search);
  const podcastId = params.get("id");
  const memberId = localStorage.getItem("memberId") || null;

  // State management
  const state = {
    repeatMode: "off",
    isPlaying: false,
    currentCommentsPage: 1,
    isLoading: false,
  };

  // Debounce utility
  const debounce = (fn, delay) => {
    let timeoutId;
    return (...args) => {
      clearTimeout(timeoutId);
      timeoutId = setTimeout(() => fn(...args), delay);
    };
  };

  // Throttle utility for scroll/resize events
  const throttle = (fn, limit) => {
    let inThrottle;
    return (...args) => {
      if (!inThrottle) {
        fn(...args);
        inThrottle = true;
        setTimeout(() => (inThrottle = false), limit);
      }
    };
  };

  // Update guest fields visibility
  const updateGuestFieldsVisibility = () => {
    if (!el.guestFields) return;
    el.guestFields.style.display = memberId ? "none" : "block";
  };

  // ----------------------------
  // AUDIO PLAYER OPTIMIZATIONS
  // ----------------------------
  if (el.thaalamPlayer) {
    // Throttled timeupdate handler
    const updateProgress = throttle(() => {
      if (!el.thaalamPlayer.duration) return;
      const pct =
        (el.thaalamPlayer.currentTime / el.thaalamPlayer.duration) * 100;
      if (el.thaalamProgressFill)
        el.thaalamProgressFill.style.width = `${pct}%`;
      if (el.thaalamCurrentTime) {
        el.thaalamCurrentTime.textContent = utils.formatTime(
          el.thaalamPlayer.currentTime
        );
      }
    }, 100); // Update at most every 100ms instead of every frame

    el.thaalamPlayer.addEventListener("timeupdate", updateProgress);

    // Single loadedmetadata handler
    el.thaalamPlayer.addEventListener(
      "loadedmetadata",
      () => {
        if (el.thaalamDuration) {
          el.thaalamDuration.textContent = utils.formatTime(
            el.thaalamPlayer.duration
          );
        }
      },
      { once: true }
    );

    el.thaalamPlayer.addEventListener("error", () => {
      utils.toast("Failed to load audio", "error");
    });

    // Cleanup function for player
    const cleanupPlayer = () => {
      el.thaalamPlayer.removeEventListener("timeupdate", updateProgress);
      if (el.thaalamPlayer && !el.thaalamPlayer.paused) {
        el.thaalamPlayer.pause();
      }
    };

    // Store for later cleanup
    state.cleanupPlayer = cleanupPlayer;
  }

  // Play/pause with requestAnimationFrame for smoother UI updates
  if (el.thaalamPlayPauseBtn) {
    el.thaalamPlayPauseBtn.addEventListener("click", () => {
      if (!el.thaalamPlayer) return;

      state.isPlaying = !el.thaalamPlayer.paused;

      if (state.isPlaying) {
        el.thaalamPlayer.pause();
      } else {
        el.thaalamPlayer.play().catch((err) => console.error(err));
      }

      // Use requestAnimationFrame for immediate UI feedback
      requestAnimationFrame(() => {
        el.thaalamPlayPauseBtn.innerHTML = state.isPlaying
          ? '<i class="fas fa-play text-white text-xl"></i>'
          : '<i class="fas fa-pause text-white text-xl"></i>';
      });
    });
  }

  // Progress bar with debounced click handler
  if (el.thaalamProgressBar) {
    el.thaalamProgressBar.addEventListener("click", (e) => {
      if (!el.thaalamPlayer || !el.thaalamPlayer.duration) return;
      const rect = el.thaalamProgressBar.getBoundingClientRect();
      const x = e.clientX - rect.left;
      const pct = x / rect.width;
      el.thaalamPlayer.currentTime = pct * el.thaalamPlayer.duration;
    });
  }

  // ----------------------------
  // REPEAT BUTTON
  // ----------------------------
  if (el.repeatBtn) {
    el.repeatBtn.addEventListener("click", () => {
      if (state.repeatMode === "off") {
        state.repeatMode = "one";
        el.thaalamPlayer.loop = true;
        el.repeatBtn.classList.add("text-red-600");
        el.repeatBtn.innerHTML = '<i class="fas fa-redo-alt text-lg"></i>';
        utils.toast("Repeat enabled");
      } else {
        state.repeatMode = "off";
        el.thaalamPlayer.loop = false;
        el.repeatBtn.classList.remove("text-red-600");
        el.repeatBtn.innerHTML = '<i class="fas fa-redo text-lg"></i>';
        utils.toast("Repeat off");
      }
    });
  }

  // Audio end handler
  if (el.thaalamPlayer) {
    el.thaalamPlayer.addEventListener("ended", () => {
      requestAnimationFrame(() => {
        el.thaalamPlayPauseBtn.innerHTML =
          '<i class="fas fa-play text-white text-xl"></i>';
        state.isPlaying = false;
      });
    });
  }

  // ----------------------------
  // SHARE MODAL - Optimized event handlers
  // ----------------------------
  const shareModal = {
    open: () => {
      if (!el.shareModal) return;
      el.shareModal.classList.remove("hidden");
      const url = window.location.href;
      if (el.podcastLink) el.podcastLink.value = url;

      // Update platform links efficiently
      const enc = encodeURIComponent(url);
      const platforms = {
        "share-whatsapp": `https://wa.me/?text=${enc}`,
        "share-facebook": `https://www.facebook.com/sharer/sharer.php?u=${enc}`,
        "share-twitter": `https://twitter.com/intent/tweet?url=${enc}`,
        "share-instagram": `https://www.instagram.com/?url=${enc}`,
        "share-tiktok": `https://www.tiktok.com/share?url=${enc}`,
      };

      Object.entries(platforms).forEach(([id, href]) => {
        const element = document.getElementById(id);
        if (element) element.href = href;
      });
    },

    close: () => {
      if (!el.shareModal) return;
      el.shareModal.classList.add("hidden");
    },
  };

  // Event delegation for share modal
  document.addEventListener("click", (e) => {
    if (e.target === el.shareBtn || e.target.closest("#share-btn")) {
      shareModal.open();
    } else if (e.target === el.closeShare || e.target.closest("#close-share")) {
      shareModal.close();
    } else if (el.shareModal && !el.shareModal.classList.contains("hidden")) {
      const box = document.getElementById("share-modal-box");
      if (box && !box.contains(e.target)) {
        shareModal.close();
      }
    }
  });

  if (el.copyLink) {
    el.copyLink.addEventListener("click", async () => {
      if (!el.podcastLink) return;
      try {
        await navigator.clipboard.writeText(el.podcastLink.value);
        utils.toast("Link copied to clipboard", "success");
        const orig = el.copyLink.innerHTML;
        el.copyLink.innerHTML = '<i class="fas fa-check"></i>';
        setTimeout(() => (el.copyLink.innerHTML = orig), 450);
      } catch {
        utils.toast("Failed to copy link", "error");
      }
    });
  }

  // ----------------------------
  // LIKE - Optimized with requestIdleCallback
  // ----------------------------
  if (el.likeBtn) {
    el.likeBtn.addEventListener("click", () => {
      if (!podcastId || el.likeBtn.classList.contains("active")) {
        if (el.likeBtn.classList.contains("active")) {
          utils.toast("You already liked this", "warning");
        }
        return;
      }

      // Use requestIdleCallback for non-critical update
      requestIdleCallback(
        () => {
          const payload = {
            podcast_id: podcastId,
            reaction: "like",
            member_id: memberId || null,
            guest_id: !memberId ? getGuestId() : null,
          };

          fetch(`${API}/podcasts/reaction`, {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(payload),
            priority: "low", // Hint to browser about priority
          })
            .then((r) => r.json())
            .then((res) => {
              if (res.status === "success") {
                el.likeBtn.classList.add("active");
                el.likeCount.textContent =
                  Number(el.likeCount.textContent || 0) + 1;
                utils.toast("You liked this podcast ❤️", "success");
              } else {
                utils.toast(res.message || "Failed to like", "error");
              }
            })
            .catch(() => utils.toast("Failed to submit like", "error"));
        },
        { timeout: 1000 }
      );
    });
  }

  // ----------------------------
  // COMMENTS - Optimized with Intersection Observer
  // ----------------------------
  const commentsModal = {
    open: () => {
      if (!el.commentsModal) return;
      el.commentsModal.classList.remove("hidden");
      updateGuestFieldsVisibility();

      if (el.commentsList) {
        el.commentsList.innerHTML =
          '<p class="text-gray-500">Loading comments...</p>';
      }

      if (podcastId) {
        // Load comments on idle
        requestIdleCallback(() => fetchComments(podcastId, 1), {
          timeout: 500,
        });
      }
    },

    close: () => {
      if (!el.commentsModal) return;
      el.commentsModal.classList.add("hidden");
      // Clear comments to free memory
      if (el.commentsList) {
        el.commentsList.innerHTML = "";
      }
    },
  };

  // Event delegation for comments modal
  document.addEventListener("click", (e) => {
    if (e.target === el.commentBtn || e.target.closest("#comment-btn")) {
      commentsModal.open();
    } else if (
      e.target === el.closeComments ||
      e.target.closest("#close-comments")
    ) {
      commentsModal.close();
    } else if (
      el.commentsModal &&
      !el.commentsModal.classList.contains("hidden")
    ) {
      const box = document.getElementById("comments-modal-box");
      if (box && !box.contains(e.target)) {
        commentsModal.close();
      }
    }
  });

  if (el.toggleCommentBox) {
    el.toggleCommentBox.addEventListener("click", () => {
      const isHidden = el.commentInputSection.classList.contains("hidden");
      el.commentInputSection.classList.toggle("hidden");
      el.toggleCommentBox.textContent = isHidden
        ? "Hide comment box"
        : "Write a Comment";
    });
  }

  // Fetch comments with abort controller for cleanup
  const fetchComments = (podcastId, page = 1) => {
    if (!podcastId || state.isLoading) return;

    state.isLoading = true;
    const controller = new AbortController();
    const timeoutId = setTimeout(() => controller.abort(), 10000);

    fetch(`${API}/podcasts/${podcastId}/comments?page=${page}&limit=1000`, {
      signal: controller.signal,
    })
      .then((res) => res.json())
      .then((result) => {
        clearTimeout(timeoutId);
        state.isLoading = false;

        // Normalize response structure
        const payload = result.result || result;
        const comments = payload.data?.data || payload.data || payload;
        const pagination = payload.pagination || {};

        renderComments(comments || [], pagination);
      })
      .catch((err) => {
        if (err.name !== "AbortError") {
          console.error("fetchComments error:", err);
          if (el.commentsList) {
            el.commentsList.innerHTML = `<p class="text-gray-500">Failed to load comments.</p>`;
          }
        }
        state.isLoading = false;
      });
  };

  // Virtual DOM-like rendering for comments
  const renderComments = (comments, pagination = {}) => {
    if (!el.commentsList) return;

    if (!comments || !comments.length) {
      el.commentsList.innerHTML = `<p class="text-gray-500">No comments yet. Be the first to comment!</p>`;
      if (el.commentCount) el.commentCount.textContent = "";
      return;
    }

    // Batch DOM updates
    const fragment = document.createDocumentFragment();

    comments.forEach((comment) => {
      const div = document.createElement("div");
      div.className = "comment mb-3 p-3 border-b";
      const author = comment.Member?.name || comment.guest_name || "Anonymous";
      const created = utils.timeAgo(
        comment.created_at || comment.createdAt || comment.date
      );
      const text = comment.comment || comment.text || "";

      div.innerHTML = `
        <div class="font-medium text-gray-800">
          ${utils.escapeHtml(author)}
          <span class="text-xs text-gray-400 ml-2">• ${created}</span>
        </div>
        <div class="text-gray-600 mt-1">${utils.escapeHtml(
          utils.truncate(text, 450)
        )}</div>
      `;
      fragment.appendChild(div);
    });

    // Single DOM update
    el.commentsList.innerHTML = "";
    el.commentsList.appendChild(fragment);

    // Update count
    if (pagination.totalRecords && el.commentCount) {
      el.commentCount.textContent = `(${pagination.totalRecords})`;
    } else if (Array.isArray(comments)) {
      el.commentCount.textContent = `(${comments.length})`;
    }
  };

  // Submit comment with debounced validation
  const submitComment = debounce(() => {
    if (!podcastId) {
      utils.toast("Invalid podcast", "error");
      return;
    }

    const text = (el.commentMessage?.value || "").trim();
    if (!text) {
      utils.toast("Please write a comment before submitting", "error");
      return;
    }

    const guestNameVal = (el.guestName?.value || "").trim();
    const guestEmailVal = (el.guestEmail?.value || "").trim();

    if (!memberId) {
      if (!guestNameVal) {
        utils.toast("Please enter your name", "error");
        return;
      }
      if (!guestEmailVal || !guestEmailVal.includes("@")) {
        utils.toast("Please enter a valid email", "error");
        return;
      }
    }

    const payload = {
      podcast_id: podcastId,
      member_id: memberId || null,
      guest_id: memberId ? null : getGuestId(),
      guest_name: memberId ? null : guestNameVal,
      guest_email: memberId ? null : guestEmailVal,
      comment: text,
    };

    if (el.submitComment) {
      el.submitComment.disabled = true;
      el.submitComment.textContent = "Submitting...";
    }

    fetch(`${API}/podcasts/comments`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    })
      .then((r) => r.json())
      .then((res) => {
        if (el.submitComment) {
          el.submitComment.disabled = false;
          el.submitComment.textContent = "Submit";
        }

        if (res.status === "success") {
          // Clear form
          if (el.commentMessage) el.commentMessage.value = "";
          if (el.guestName) el.guestName.value = "";
          if (el.guestEmail) el.guestEmail.value = "";

          commentsModal.close();
          utils.toast(
            "Your comment was submitted and is pending approval",
            "success"
          );
        } else {
          utils.toast(res.message || "Failed to post comment", "error");
        }
      })
      .catch((err) => {
        console.error(err);
        if (el.submitComment) {
          el.submitComment.disabled = false;
          el.submitComment.textContent = "Submit";
        }
        utils.toast("Failed to post comment, please try again", "error");
      });
  }, 300);

  if (el.submitComment) {
    el.submitComment.addEventListener("click", submitComment);
  }

  // ----------------------------
  // LOAD PODCAST DATA - Optimized with caching
  // ----------------------------
  const loadPodcast = (() => {
    const podcastCache = new Map();

    return (id) => {
      if (!id) return;

      // Check cache first
      if (podcastCache.has(id)) {
        renderPodcast(podcastCache.get(id));
        return;
      }

      fetch(`${API}/podcasts/${id}`)
        .then((r) => r.json())
        .then((res) => {
          const podcast = res.podcast || res;
          if (!podcast) {
            utils.toast("Podcast not found", "error");
            return;
          }

          // Cache for 5 minutes
          podcastCache.set(id, { podcast, ...res });
          setTimeout(() => podcastCache.delete(id), 5 * 60 * 1000);

          renderPodcast({ podcast, ...res });
        })
        .catch((err) => {
          console.error("loadPodcast error:", err);
          utils.toast("Failed to load podcast", "error");
        });
    };
  })();

  const renderPodcast = (data) => {
    const { podcast, prevPodcast, nextPodcast, reaction } = data;

    // Update DOM elements efficiently
    const updates = [
      [el.podcastTitle, podcast.title || "Untitled"],
      [el.podcastCategoryName, podcast.category?.name || ""],
      [el.publishedDate, new Date(podcast.date).toLocaleDateString()],
      [el.sidebarDuration, `${podcast.duration || 0} min`],
    ];

    updates.forEach(([element, value]) => {
      if (element) element.textContent = value;
    });

    if (el.podcastImage && podcast.image_url) {
      el.podcastImage.src = podcast.image_url;
    }

    if (el.podcastDescription) {
      el.podcastDescription.innerHTML =
        podcast.description || "No description available";
    }

    // Prev/Next buttons
    updateNavigationButtons(prevPodcast, nextPodcast);

    // Audio source
    setAudioSource(podcast);

    // Like count
    if (reaction?.like && el.likeCount) {
      el.likeCount.textContent = reaction.like;
    }

    // Video embed
    updateVideoSection(podcast);

    // Sidebar info
    updateSidebarInfo(podcast);

    // Related podcasts
    // fetchRelated(podcast.rjname || "", podcast.id);
    const hasVideo =
      podcast.video_link &&
      podcast.video_link !== "NA" &&
      podcast.video_link !== null;

    if (hasVideo) {
      el.relatedPodcastsSidebar.style.display = "block";
      el.relatedBottomContainer.style.display = "none";

      fetchRelated(podcast.rjname || "", podcast.id, "sidebar");
    } else {
      el.relatedSidebarContainer.style.display = "none";
      el.relatedPodcastsBottom.style.display = "block";
      fetchRelated(podcast.rjname || "", podcast.id, "bottom");
    }
  };

  const updateNavigationButtons = (prev, next) => {
    if (el.prevBtn) {
      if (prev) {
        el.prevBtn.disabled = false;
        el.prevBtn.style.opacity = "1";
        el.prevBtn.onclick = () => {
          window.location.href = `/podcast-details?slug=${prev.slug}&id=${prev.id}`;
        };
      } else {
        el.prevBtn.disabled = true;
        el.prevBtn.style.opacity = "0.4";
        el.prevBtn.onclick = null;
      }
    }

    if (el.nextBtn) {
      if (next) {
        el.nextBtn.disabled = false;
        el.nextBtn.style.opacity = "1";
        el.nextBtn.onclick = () => {
          window.location.href = `/podcast-details?slug=${next.slug}&id=${next.id}`;
        };
      } else {
        el.nextBtn.disabled = true;
        el.nextBtn.style.opacity = "0.4";
        el.nextBtn.onclick = null;
      }
    }
  };

  const setAudioSource = (podcast) => {
    const audioUrl = podcast.audio_drive_file_link;

    if (!audioUrl || !el.audioSource || !el.thaalamPlayer) {
      if (el.thaalamPlayPauseBtn) el.thaalamPlayPauseBtn.style.opacity = "0.45";
      return;
    }

    el.audioSource.src = audioUrl;

    // Detect MIME type
    if (audioUrl.toLowerCase().endsWith(".wav")) {
      el.audioSource.type = "audio/wav";
    } else if (audioUrl.toLowerCase().endsWith(".mp3")) {
      el.audioSource.type = "audio/mpeg";
    } else {
      el.audioSource.type = "audio/mpeg";
    }

    el.thaalamPlayer.load();
  };

  const updateVideoSection = (podcast) => {
    if (
      !podcast.video_link ||
      podcast.video_link === "NA" ||
      podcast.video_link === "null" ||
      !el.videoContainer
    ) {
      if (el.videoSection) el.videoSection.style.display = "none";
      return;
    }

    el.videoContainer.innerHTML = `
      <video controls playsinline class="w-full h-full rounded-lg" preload="metadata">
        <source src="${podcast.video_link}" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    `;
  };

  const updateSidebarInfo = (podcast) => {
    const elements = {
      "published-name": podcast.rjname || "Unknown",
      "content-creator": podcast.content || "Unknown",
      "published-date": new Date(podcast.date).toLocaleDateString(),
      "video-available":
        podcast.video_link &&
        podcast.video_link !== "NA" &&
        podcast.video_link !== "null"
          ? "Yes"
          : "No",
    };

    Object.entries(elements).forEach(([id, value]) => {
      const element = document.getElementById(id);
      if (element) element.textContent = value;
    });
  };

  const fetchRelated = debounce((name, excludeId, target = "sidebar") => {
    if (!name) return;

    fetch(`${API}/podcasts?search=${encodeURIComponent(name)}&limit=4`)
      .then((r) => r.json())
      .then((res) => {
        const items = res?.data?.data || res?.data || res || [];
        renderRelated(items, excludeId, target);
      })
      .catch((err) => console.error("fetchRelated error:", err));
  }, 300);

  const renderRelated = (list, excludeId, target) => {
    const container =
      target === "sidebar"
        ? el.relatedPodcastsSidebar
        : el.relatedPodcastsBottom;

    if (!container) return;

    if (!Array.isArray(list) || !list.length) {
      container.innerHTML = `<p class="text-gray-500 text-sm">No related podcasts found</p>`;
      return;
    }

    const fragment = document.createDocumentFragment();

    list.forEach((p) => {
      if (String(p.id) === String(excludeId)) return;

      const item = document.createElement("div");
      item.className =
        "rounded-md p-3 glass-effect hover-card cursor-pointer transition";
      item.onclick = () => {
        window.location.href = `/podcast-details?slug=${p.slug}&id=${p.id}`;
      };

      item.innerHTML = `
        <div class="flex gap-4">
          <img src="${
            p.image_url ||
            "assets/img/common/podcast-details/podcast-banner.jpg"
          }" 
               class="w-20 h-20 rounded-lg object-cover"
               loading="lazy"
               alt="${utils.escapeHtml(p.title || "")}">
          <div>
            <h4 class="font-semibold text-gray-800">${utils.escapeHtml(
              p.title
            )}</h4>
            <p class="text-sm text-gray-500">${new Date(
              p.date
            ).toLocaleDateString()}</p>
            <p class="text-sm text-gray-500">${p.duration} min</p>
          </div>
        </div>
      `;
      fragment.appendChild(item);
    });

    container.innerHTML = "";
    container.appendChild(fragment);
  };

  // Initial load
  if (podcastId) {
    // Load podcast on idle
    requestIdleCallback(() => loadPodcast(podcastId), { timeout: 100 });
  }

  // Keyboard shortcuts
  document.addEventListener("keydown", (e) => {
    if ((e.ctrlKey || e.metaKey) && e.key === "Enter") {
      if (el.commentMessage && document.activeElement === el.commentMessage) {
        submitComment();
      }
    }

    // Spacebar to toggle play/pause when player is focused
    if (
      e.key === " " &&
      document.activeElement === el.thaalamPlayer &&
      e.target.tagName !== "INPUT" &&
      e.target.tagName !== "TEXTAREA"
    ) {
      e.preventDefault();
      el.thaalamPlayPauseBtn?.click();
    }
  });

  // Cleanup on unload
  window.addEventListener("beforeunload", () => {
    // Cleanup player
    if (state.cleanupPlayer) state.cleanupPlayer();

    // Remove event listeners
    document.removeEventListener("keydown", submitComment);

    // Clear intervals and timeouts
    clearAllTimeouts();
  });

  // Helper to clear all timeouts
  const clearAllTimeouts = () => {
    const highestId = window.setTimeout(() => {}, 0);
    for (let i = highestId; i >= 0; i--) {
      window.clearTimeout(i);
    }
  };
});

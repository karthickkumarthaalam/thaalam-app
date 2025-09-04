
document.addEventListener('DOMContentLoaded', function () {
    const player = document.getElementById('thaalam-player');
    const playPauseBtn = document.getElementById('thaalam-play-pause-btn');
    const progressBar = document.getElementById('thaalam-progress-bar');
    const progressFill = document.getElementById('thaalam-progress-fill');
    const currentTimeDisplay = document.getElementById('thaalam-current-time');
    const durationDisplay = document.getElementById('thaalam-duration');
    const volumeBtn = document.getElementById('thaalam-volume-btn');
    const volumeSlider = document.getElementById('thaalam-volume-slider');

    // Initialize volume
    player.volume = parseFloat(volumeSlider.value || 1);
    updateVolumeIcon();

    // Play / Pause
    playPauseBtn.addEventListener('click', function () {
        if (player.paused) {
            player.play().then(() => {
                playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
            }).catch(error => {
                console.error("Playback failed:", error);
            });
        } else {
            player.pause();
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    });

    // Update progress
    player.addEventListener('timeupdate', function () {
        if (player.duration) {
            const percent = (player.currentTime / player.duration) * 100;
            progressFill.style.width = percent + '%';

            currentTimeDisplay.textContent = formatTime(player.currentTime);
            durationDisplay.textContent = formatTime(player.duration);
        }
    });

    // Load metadata (duration)
    player.addEventListener('loadedmetadata', function () {
        durationDisplay.textContent = formatTime(player.duration);
    });

    // Seek on progress bar click
    progressBar.addEventListener('click', function (e) {
        const rect = progressBar.getBoundingClientRect();
        const clickX = e.clientX - rect.left;
        const percent = clickX / rect.width;
        player.currentTime = percent * player.duration;
    });

    // Volume control
    volumeSlider.addEventListener('input', function () {
        player.volume = volumeSlider.value;
        updateVolumeIcon();
    });

    volumeBtn.addEventListener('click', function () {
        if (player.volume > 0) {
            player.volume = 0;
            volumeSlider.value = 0;
        } else {
            player.volume = 1;
            volumeSlider.value = 1;
        }
        updateVolumeIcon();
    });

    function updateVolumeIcon() {
        if (player.volume === 0) {
            volumeBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        } else if (player.volume < 0.5) {
            volumeBtn.innerHTML = '<i class="fas fa-volume-down"></i>';
        } else {
            volumeBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        }
    }

    function formatTime(seconds) {
        if (isNaN(seconds)) return "00:00";
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }

    document.querySelectorAll(".accordion-toggle").forEach(toggleBtn => {
        const content = toggleBtn.nextElementSibling;

        toggleBtn.addEventListener("click", () => {
            const isOpen = content.style.display === "block";
            content.style.display = isOpen ? "none" : "block";

            content.classList.toggle("active", !isOpen);
        });
    });



    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const podcastId = urlParams.get("id");
    const memberId = localStorage.getItem("memberId");

    if (!podcastId) {
        return;
    }

    loadPodCastData(podcastId);
    fetchComments(podcastId);
    fetchUserReaction(podcastId, memberId);

    const likeBtn = document.getElementById("like-btn");
    const likeCountElem = document.getElementById("like-count");

    if (likeBtn) {
        likeBtn.addEventListener("click", () => handleLike(likeBtn, likeCountElem, podcastId, memberId));
    }
});


function loadPodCastData(podcastId) {
    fetch(`${window.API_BASE_URL}/podcasts/${podcastId}`)
        .then(res => {
            return res.json();
        })
        .then(result => {
            const data = result.podcast;
            if (!data) {
                throw new Error("Podcast Data not found");
            }

            updatePodcastUI(result);
            fetchRelatedPodcasts(data.rjname, data.id);
        })
        .catch(err => {
            showErrorUI();
        });
}

function updatePodcastUI(result) {

    const data = result?.podcast;
    const podcastImage = document.getElementById("podcastImage");
    podcastImage.src = data.image_url
        ? `${window.API_BASE_URL}/${data.image_url.replace(/\\/g, "/")}`
        : "assets/img/common/podcast-details/podcast-banner.jpg";

    const formattedDate = new Date(data.date).toLocaleDateString("en-US", {
        year: 'numeric',
        month: "short",
        day: "numeric"
    });

    document.getElementById("podcastTitle").textContent = data.title;
    document.getElementById("publishedDate").innerHTML = `${formattedDate} <span>${data.duration} MIN</span>`;

    document.getElementById("podcastDescription").textContent = data.description;

    const audioSource = document.getElementById("audioSource");
    if (data.audio_drive_file_link) {
        audioSource.src = data.audio_drive_file_link;
        document.getElementById("thaalam-player").load();
    }

    //podcast information tab
    document.getElementById("published-name").textContent = data.rjname;
    document.getElementById("content-creator").textContent = data.content;
    document.getElementById("published-date").textContent = formattedDate;
    document.getElementById("duration").textContent = `${data.duration} MIN`;

    const likeCountElem = document.getElementById("like-count");
    if (likeCountElem) {
        likeCountElem.textContent = result.reaction.like || 0;
    }
}

$(document).on("click", ".podcast", function () {
    const podcastId = $(this).data("id");
    if (podcastId) {
        window.location.href = `podcast-details?id=${podcastId}`;
    }
});

function fetchRelatedPodcasts(name, excludedId) {
    if (!name) return;

    fetch(`${window.API_BASE_URL}/podcasts?page=1&search=${encodeURIComponent(name)}&limit=4`)
        .then(res => res.json())
        .then(result => {
            const container = document.querySelector(".podcast-list");
            if (!container) return;

            container.innerHTML = "";

            if (result?.data?.data && result.data.data.length > 1) {
                result?.data?.data.forEach(p => {
                    if (p.id === parseInt(excludedId)) return;

                    let formattedDate = new Date(p.date).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: 'numeric'
                    });

                    let imagePath = p.image_url
                        ? `${window.API_BASE_URL}/${p.image_url.replace(/\\/g, "/")}`
                        : "assets/img/common/podcast-details/podcast-banner.jpg";

                    const listItem = document.createElement("div");
                    listItem.className = 'podcast';
                    listItem.setAttribute("data-id", p.id);
                    listItem.innerHTML = `
                        <div class="related-podcast-image">
                            <img src=${imagePath} alt=${p.title}>
                        </div>
                        <div class="podcast-details">
                            <div class="podcast-content">
                                <p class="released-stamp">${formattedDate}</p>
                                <h5 class="podcast-heading">${p.title}</h5>
                                <p class="podcast-desc">
                                   ${p.description}
                                </p>
                            </div>
                            <div class="audio-details">
                                <p class="audio-duration">${p.duration} MIN</p>
                            </div>
                        </div>
                    `;
                    container.appendChild(listItem);
                });
            } else {
                container.innerHTML = `<div class="no-related">No other podcasts by ${name} found.</div>`;
            }
        })
        .catch(error => {
            console.error("Error fetching related podcasts:", error);
            const container = document.querySelector(".sidebar__post-list");
            if (container) {
                container.innerHTML = `<li class="error">Failed to load related podcasts</li>`;
            }
        });
}

function showErrorUI() {
    const container = document.querySelector(".podcast-details-page");

    if (container) {
        container.innerHTML = `
             <div class="error-message">
                    <h3>Podcast Not Found</h3>
                    <p>We couldn't find the podcast you're looking for.</p>
                    <a href="podcasts.php" class="btn">Browse Podcasts</a>
                </div>
        `;
    }
}

function submitComment(e) {
    e.preventDefault();

    const podcastId = new URLSearchParams(window.location.search).get("id");
    const memberId = localStorage.getItem("memberId");
    const commentInput = document.getElementById("commentInput");

    if (!memberId) {
        window.location.href = `/login.php?redirect_url=${encodeURIComponent(window.location.href)}`;
        return;
    }

    const commentText = commentInput.value.trim();
    if (!commentText) {
        showToast("Please write a comment before submitting", "error");
        return;
    }

    fetch(`${window.API_BASE_URL}/podcasts/comments`,
        {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                podcast_id: podcastId,
                member_id: memberId,
                comment: commentText
            })
        }
    ).then(res => res.json())
        .then(result => {
            if (result.status === "success") {
                commentInput.value = "";
                fetchComments(podcastId);
                showToast("Comment has been posted successfully, it will be reflected soon", "success");
            } else {
                throw new Error(result.message || "Failed to post comment");
            }
        })
        .catch(err => {
            console.error(err);
            showToast("Failed to post comment, please try again", "error");
        });
}

const commentsList = document.getElementById("commentsList");
let currentPage = 1;
let totalPages = 1;
let totalComments = 1;
const COMMENTS_LIMIT = 10;

function fetchComments(podcastId, page = 1) {
    if (!podcastId) return;

    fetch(`${window.API_BASE_URL}/podcasts/${podcastId}/comments?page=${page}&limit=${COMMENTS_LIMIT}`)
        .then(res => res.json())
        .then(result => {
            const { data, pagination } = result.result || {};
            totalPages = pagination?.totalPages || 1;
            currentPage = pagination?.currentPage || 1;
            totalComments = pagination?.totalRecords || 0;

            renderComments(data || []);
            renderPagination(podcastId);
        })
        .catch(err => {
            console.error("Error fetching comments:", err);
            renderComments([]);
        });
}

function renderComments(comments) {
    if (!commentsList) return;

    commentsList.innerHTML = "";

    // Update comment count
    const commentCountElem = document.getElementById("commentCount");
    if (commentCountElem) commentCountElem.textContent = `(${totalComments})`;

    if (!comments.length) {
        commentsList.innerHTML = `<p class="no-comments"> No Comments yet. Be the first to comment! </p>`;
        return;
    }

    comments.forEach(comment => {
        const commentDiv = document.createElement("div");
        commentDiv.className = "comment";

        const fullComment = comment.comment || "";
        const shortComment = fullComment.length > 200 ? fullComment.slice(0, 200) + "..." : fullComment;
        const needsToggle = fullComment.length > 200;

        commentDiv.innerHTML = `
            <p class="comment-author">${comment.Member?.name || "Anonymous"} <span>• ${timeAgo(comment.created_at)}</span></p>
            <p class="comment-text">${shortComment} ${needsToggle ? "<span class='more-link'>More</span>" : ""}</p>
        `;

        if (needsToggle) {
            const textElem = commentDiv.querySelector(".comment-text");
            textElem.addEventListener("click", function (e) {
                if (e.target.classList.contains("more-link")) {
                    e.preventDefault();
                    const isExpanded = textElem.textContent.includes(fullComment);
                    textElem.innerHTML = isExpanded
                        ? `${shortComment}<span class="more-link">More</span>`
                        : `${fullComment}<span class="more-link">Less</span>`;
                }
            });
        }

        commentsList.appendChild(commentDiv);
    });
}

function timeAgo(dateString) {
    if (!dateString) return "Just now";

    const now = new Date();
    const postedDate = new Date(dateString);
    const diffMs = now - postedDate;
    const diffSecs = Math.floor(diffMs / 1000);
    const diffMins = Math.floor(diffSecs / 60);
    const diffHours = Math.floor(diffMins / 60);
    const diffDays = Math.floor(diffHours / 24);

    if (diffSecs < 60) return "Just now";
    if (diffMins < 60) return `${diffMins} min${diffMins !== 1 ? "s" : ""} ago`;
    if (diffHours < 24) return `${diffHours} hour${diffHours !== 1 ? "s" : ""} ago`;
    if (diffDays < 7) return `${diffDays} day${diffDays !== 1 ? "s" : ""} ago`;

    return new Date(dateString).toLocaleDateString('en-US', {
        year: 'numeric', month: 'short', day: 'numeric'
    });
}

function renderPagination(podcastId) {
    const paginationContainer = document.createElement("div");
    paginationContainer.className = "comment-pagination";

    const existingPagination = commentsList.nextElementSibling;
    if (existingPagination && existingPagination.classList.contains("comment-pagination")) {
        existingPagination.remove();
    }

    if (totalPages <= 1) return;

    let buttons = "";

    if (currentPage > 1) {
        buttons += `<button class="page-btn prev" data-page="${currentPage - 1}">Previous</button>`;
    }

    for (let i = 1; i <= totalPages; i++) {
        buttons += `<button class="page-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
    }

    if (currentPage < totalPages) {
        buttons += `<button class="page-btn next" data-page="${currentPage + 1}">Next</button>`;
    }

    paginationContainer.innerHTML = buttons;
    commentsList.after(paginationContainer);

    paginationContainer.querySelectorAll(".page-btn").forEach(btn => {
        btn.addEventListener("click", () => {
            const page = parseInt(btn.dataset.page);
            if (page !== currentPage) {
                fetchComments(podcastId, page);
            }
        });
    });
}


function handleLike(likeBtn, likeCountElem, podcastId, memberId) {
    if (!memberId) {
        window.location.href = `/login.php?redirect_url=${encodeURIComponent(window.location.href)}`;
        return;
    }

    if (likeBtn.classList.contains("active")) {
        showToast("You have already liked this podcast", "warning");
        return;
    }

    sendLikeToServer(podcastId, memberId, likeBtn, likeCountElem);
}

function sendLikeToServer(podcastId, memberId, likeBtn, likeCountElem) {
    fetch(`${window.API_BASE_URL}/podcasts/reaction`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            podcast_id: podcastId,
            member_id: memberId,
            reaction: "like"
        })
    }).then(res => res.json())
        .then(result => {
            if (result.status !== "success") {
                throw new Error(result.message || "Failed to like podcast");
            }

            let likeCount = parseInt(likeCountElem.textContent, 10) || 0;
            likeCountElem.textContent = likeCount + 1;
            likeBtn.classList.add("active");
            showToast("You liked this podcast!", "success");

        })
        .catch(err => {
            console.error(err);
            showToast("Failed to like podcast, please try again", "error");
        });
}


function fetchUserReaction(podcast_id, member_id) {
    fetch(`${window.API_BASE_URL}/podcasts/${podcast_id}/reaction/${member_id}`)
        .then(res => res.json())
        .then(data => {
            if (data.status === "success" && data.reaction === "like") {
                const likeBtn = document.getElementById("like-btn");
                if (likeBtn) likeBtn.classList.add("active");
            }
        });
}

const shareBtn = document.getElementById("share-btn");
const shareModal = document.getElementById("share-modal");
const closeShare = document.getElementById("close-share");
const copyLink = document.getElementById("copy-link");
const podcastLink = document.getElementById("podcast-link");

// Open modal
shareBtn.addEventListener("click", () => {
    shareModal.style.display = "block";

    // Get current podcast URL
    const currentUrl = window.location.href;
    podcastLink.value = currentUrl; // fill input field

    // Update share links dynamically
    document.getElementById("share-whatsapp").href =
        `https://wa.me/?text=${encodeURIComponent(currentUrl)}`;
    document.getElementById("share-facebook").href =
        `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
    document.getElementById("share-twitter").href =
        `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}`;
    document.getElementById("share-instagram").href =
        `https://www.instagram.com/?url=${encodeURIComponent(currentUrl)}`;
    document.getElementById("share-tiktok").href = `https://www.tiktok.com/share?url=${encodeURIComponent(currentUrl)}`;

});

// Close modal
closeShare.addEventListener("click", () => {
    shareModal.style.display = "none";
});

// Close modal if clicked outside
window.addEventListener("click", (e) => {
    if (e.target === shareModal) {
        shareModal.style.display = "none";
    }
});

// Copy link
copyLink.addEventListener("click", () => {
    navigator.clipboard.writeText(podcastLink.value).then(() => {
        copyLink.innerHTML = `<i class="fas fa-check"></i>`;
        setTimeout(() => {
            copyLink.innerHTML = `<i class="fas fa-copy"></i>`;
        }, 2000);
    });
});

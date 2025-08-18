// Audio Player Functionality
document.addEventListener('DOMContentLoaded', function () {
    const player = document.getElementById('thaalam-player');
    const playPauseBtn = document.getElementById('thaalam-play-pause-btn');
    const progressBar = document.getElementById('thaalam-progress-bar');
    const progressSlider = document.getElementById('thaalam-progress-slider');
    const currentTimeDisplay = document.getElementById('thaalam-current-time');
    const durationDisplay = document.getElementById('thaalam-duration');
    const volumeBtn = document.getElementById('thaalam-volume-btn');
    const volumeSlider = document.getElementById('thaalam-volume-slider');

    // Initialize player
    player.volume = volumeSlider.value;
    updateVolumeIcon();

    // Play/Pause functionality
    playPauseBtn.addEventListener('click', function () {
        if (player.paused) {
            player.play()
                .then(() => {
                    playPauseBtn.innerHTML = '<i class="fas fa-pause"></i>';
                })
                .catch(error => {
                    console.error("Playback failed:", error);
                });
        } else {
            player.pause();
            playPauseBtn.innerHTML = '<i class="fas fa-play"></i>';
        }
    });

    // Update progress bar
    player.addEventListener('timeupdate', function () {
        if (player.duration) {
            const percent = (player.currentTime / player.duration) * 100;
            progressBar.style.width = percent + '%';
            if (progressSlider) {
                progressSlider.value = percent;
            }

            // Update time display
            currentTimeDisplay.textContent = formatTime(player.currentTime);
            if (!isNaN(player.duration)) {
                durationDisplay.textContent = formatTime(player.duration);
            }
        }
    });

    // Handle audio loaded metadata
    player.addEventListener('loadedmetadata', function () {
        durationDisplay.textContent = formatTime(player.duration);
    });

    // Seek functionality
    if (progressSlider) {
        progressSlider.addEventListener('input', function () {
            const seekTime = (progressSlider.value / 100) * player.duration;
            player.currentTime = seekTime;
        });
    }

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
        if (!volumeBtn) return;

        if (player.volume === 0) {
            volumeBtn.innerHTML = '<i class="fas fa-volume-mute"></i>';
        } else if (player.volume < 0.5) {
            volumeBtn.innerHTML = '<i class="fas fa-volume-down"></i>';
        } else {
            volumeBtn.innerHTML = '<i class="fas fa-volume-up"></i>';
        }
    }

    // Format time (seconds to MM:SS)
    function formatTime(seconds) {
        if (isNaN(seconds)) return "00:00";
        const minutes = Math.floor(seconds / 60);
        const secs = Math.floor(seconds % 60);
        return `${minutes.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    }
});

// Podcast Details and Interactions
document.addEventListener("DOMContentLoaded", () => {
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    const podcastId = urlParams.get("id");
    const memberId = localStorage.getItem("memberId");
    const currentURL = window.location.href;

    if (!podcastId) {
        console.error("No podcast ID found in URL");
        return;
    }

    // Initialize elements
    const likeBtn = document.querySelector("[data-reaction='like']");
    const likeCountElem = document.getElementById("likeCount");
    let isLiked = false;

    const commentBtn = document.querySelector(".reaction-btn i.fa-comment").parentElement;
    const commentSection = document.querySelector(".podcast-details__comments");

    const shareBtn = document.getElementById("shareButton");
    const shareOptions = document.getElementById("shareOptions");

    // UI Event Listeners
    likeBtn?.addEventListener("click", handleLike);
    commentBtn?.addEventListener("click", toggleCommentSection);
    shareBtn?.addEventListener("click", toggleShareOptions);

    // Load podcast data
    loadPodcastData(podcastId);

    function handleLike() {
        if (!memberId) {
            window.location.href = `/login.php?redirect_url=${encodeURIComponent(window.location.href)}`;
            return;
        }

        if (likeBtn.classList.contains("active")) {
            showToast("You've already liked this podcast", "info");
            return;
        }

        const currentLikes = parseInt(likeCountElem.textContent) || 0;
        likeCountElem.textContent = currentLikes + 1;
        likeBtn.classList.add("active");

        sendLikeToServer();
    }

    function sendLikeToServer() {
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
        })
            .then(response => {
                if (!response.ok) {
                    throw new Error("Network response was not ok");
                }
                return response.json();
            })
            .then(data => {
                if (data.status === "error" && data.already_liked) {
                    likeBtn.classList.add("active");
                    showToast("You've already liked this podcast", "info");
                } else if (data.status === "success") {
                    likeCountElem.textContent = data.like_count ||
                        (parseInt(likeCountElem.textContent) || 0) + 1;
                }
            })
            .catch(error => {
                console.error("Error sending reaction:", error);
                // Revert UI if API fails
                const currentLikes = parseInt(likeCountElem.textContent) || 0;
                likeCountElem.textContent = Math.max(0, currentLikes - 1);
                likeBtn.classList.remove("active");
                showToast("Failed to send like. Please try again.", "error");
            });
    }

    function toggleCommentSection() {
        commentSection.classList.toggle("active");
        commentSection.style.display = commentSection.classList.contains("active") ? "block" : "none";

        // Load comments if opening
        if (commentSection.classList.contains("active")) {
            fetchComments(podcastId);
        }
    }

    function toggleShareOptions() {
        shareOptions.classList.toggle("active");
        shareOptions.style.display = shareOptions.classList.contains("active") ? "flex" : "none";
    }

    function loadPodcastData(podcastId) {
        fetch(`${window.API_BASE_URL}/podcasts/${podcastId}`)
            .then(res => {
                if (!res.ok) throw new Error("Network response was not ok");
                return res.json();
            })
            .then(result => {
                const data = result.podcast;
                if (!data) {
                    throw new Error("Podcast data not found");
                }

                updatePodcastUI(result);
                fetchRelatedPodcasts(data.rjname, data.id);
                setupReactionHandlers(podcastId, memberId);
            })
            .catch(err => {
                console.error("Error loading podcast:", err);
                showErrorUI();
            });
    }

    function updatePodcastUI(result) {
        const data = result.podcast;

        // Update main podcast image
        const podcastImage = document.getElementById("podcastImage");
        podcastImage.src = data.image_url
            ? `${window.API_BASE_URL}/${data.image_url.replace(/\\/g, "/")}`
            : "assets/img/common/podcast-details/podcast-banner.jpg";

        // Basic info
        document.getElementById("podcastTitle").textContent = data.title;
        document.getElementById("rjName").textContent = data.rjname;
        document.getElementById("publishedDate").textContent = new Date(data.date).toLocaleDateString('en-US', {
            year: 'numeric', month: 'short', day: 'numeric'
        });
        document.getElementById("podcastDescription").textContent = data.description;

        // Audio source
        const audioSource = document.getElementById("audioSource");
        if (data.audio_drive_file_link) {
            audioSource.src = data.audio_drive_file_link;
            document.getElementById("thaalam-player").load();
        }

        // Tags
        const tagsContainer = document.getElementById("podcastTags");
        tagsContainer.innerHTML = Array.isArray(data.tags)
            ? data.tags.map(tag => `<span>${tag}</span>`).join(' ')
            : '';

        // Reactions and Comments count - UPDATED FOR YOUR API STRUCTURE
        if (result.reaction) {
            document.getElementById("likeCount").textContent = result.reaction.like || 0;
        }

        // Get comment count from PodcastComments array length
        const commentCount = data.PodcastComments?.length || 0;
        document.getElementById("commentCount").textContent = commentCount;

        // Share links
        const shareLink = `https://api.demoview.ch/share/podcast/${data.id}`;
        document.getElementById("fb-share").href = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(shareLink)}`;
        document.getElementById("x-share").href = `https://twitter.com/intent/tweet?url=${encodeURIComponent(shareLink)}&text=${encodeURIComponent(data.title)}`;
        document.getElementById("whatsapp-share").href = `https://api.whatsapp.com/send?text=${encodeURIComponent(shareLink)}`;

        window.currentShareLink = shareLink;
    }

    function showErrorUI() {
        // Show error message to user
        const container = document.querySelector(".blog-details__left");
        if (container) {
            container.innerHTML = `
                <div class="error-message">
                    <h3>Podcast Not Found</h3>
                    <p>We couldn't find the podcast you're looking for.</p>
                    <a href="/podcasts.php" class="btn">Browse Podcasts</a>
                </div>
            `;
        }
    }
});

// Related Podcasts
function fetchRelatedPodcasts(rjName, excludeId) {
    if (!rjName) return;

    const relatedRJElement = document.getElementById("relatedRJ");
    if (relatedRJElement) {
        relatedRJElement.textContent = `More by ${rjName}`;
    }

    fetch(`${window.API_BASE_URL}/podcasts?page=1&search=${encodeURIComponent(rjName)}`)
        .then(res => {
            if (!res.ok) throw new Error("Network response was not ok");
            return res.json();
        })
        .then(result => {
            const container = document.querySelector(".sidebar__post-list");
            if (!container) return;

            container.innerHTML = "";


            if (result?.data?.data && result.data.data.length > 1) {
                result.data.data.forEach(p => {
                    if (p.id === parseInt(excludeId)) return;

                    let formattedDate = new Date(p.date).toLocaleDateString('en-US', {
                        year: 'numeric', month: 'short', day: 'numeric'
                    });

                    const listItem = document.createElement("li");
                    listItem.className = "sidebar__post-list-item";
                    listItem.innerHTML = `
                        <div class="sidebar__post-content">
                            <h4>
                                <a href="podcast-details.php?id=${p.id}">${p.title}</a>
                            </h4>
                            <p>${formattedDate}</p>
                        </div>
                    `;
                    container.appendChild(listItem);
                });
            } else {
                container.innerHTML = `<li class="no-related">No other podcasts by ${rjName} found.</li>`;
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

// Comments System
const commentsList = document.getElementById("commentsList");
let currentPage = 1;
let totalPages = 1;

function fetchComments(podcastId, page = 1) {
    if (!podcastId) return;

    fetch(`${window.API_BASE_URL}/podcasts/${podcastId}/comments?page=${page}&limit=10`)
        .then(res => {
            if (!res.ok) throw new Error("Network response was not ok");
            return res.json();
        })
        .then(result => {
            const { data, pagination } = result.result;
            totalPages = pagination?.totalPages || 1;
            currentPage = pagination?.currentPage || 1;
            renderComments(data);
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

    if (!comments.length) {
        commentsList.innerHTML = `<p class="no-comments">No comments yet. Be the first to comment!</p>`;
        return;
    }

    document.getElementById("commentCount").textContent = comments.length;

    comments.forEach(comment => {
        const commentDiv = document.createElement("div");
        commentDiv.classList.add("comment-item");

        const initials = comment.Member?.name?.charAt(0)?.toUpperCase() || "U";
        const fullComment = comment.comment || "";
        const shortComment = fullComment.length > 200 ? fullComment.slice(0, 200) + "..." : fullComment;
        const needsToggle = fullComment.length > 200;

        commentDiv.innerHTML = `
            <div class="comment-avatar">${initials}</div>
            <div class="comment-content">
                <div class="comment-author">
                    <strong>${comment.Member?.name || "User"}</strong>
                    <span class="comment-date">• ${timeAgo(comment.created_at)}</span>
                </div>
                <div class="comment-bottom">
                    <p class="comment-text">${shortComment}
                        ${needsToggle ? `<span class="more-link">More</span>` : ""}
                    </p>
                </div>
            </div>
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

    // Clear existing pagination
    const existingPagination = commentsList.nextElementSibling;
    if (existingPagination && existingPagination.classList.contains("comment-pagination")) {
        existingPagination.remove();
    }

    if (totalPages <= 1) return;

    let buttons = "";

    // Previous button
    if (currentPage > 1) {
        buttons += `<button class="page-btn prev" data-page="${currentPage - 1}">Previous</button>`;
    }

    // Page buttons
    for (let i = 1; i <= totalPages; i++) {
        buttons += `<button class="page-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
    }

    // Next button
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

// Comment Submission
function submitComment(event) {
    event.preventDefault();

    const podcastId = new URLSearchParams(window.location.search).get("id");
    const memberId = localStorage.getItem("memberId");
    const commentInput = document.getElementById("commentInput");

    if (!memberId) {
        window.location.href = `/login.php?redirect_url=${encodeURIComponent(window.location.href)}`;
        return;
    }

    const commentText = commentInput.value.trim();
    if (!commentText) {
        alert("Please write a comment before submitting.");
        return;
    }

    fetch(`${window.API_BASE_URL}/podcasts/comments`, {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            podcast_id: podcastId,
            member_id: memberId,
            comment: commentText
        })
    })
        .then(res => {
            if (!res.ok) throw new Error("Network response was not ok");
            return res.json();
        })
        .then(result => {
            if (result.status === "success") {
                commentInput.value = "";
                fetchComments(podcastId);
                showToast("Comment has been posted successfully, it will be reflected soon", "success");
            } else {
                throw new Error(result.message || "Failed to post comment");
            }
        })
        .catch(error => {
            console.error("Error posting comment:", error);
            alert("Failed to post comment. Please try again.");
        });
}

// Share Functionality
function copyLink() {
    if (!window.currentShareLink) {
        alert("Share link not available");
        return;
    }

    navigator.clipboard.writeText(window.currentShareLink)
        .then(() => {
            alert("Link copied to clipboard!");
        })
        .catch(err => {
            console.error("Failed to copy:", err);
            alert("Failed to copy link. Please try again.");
        });
}

// Initialize reactions
function setupReactionHandlers(podcastId, memberId) {
    document.querySelectorAll(".reaction-btn:not([data-reaction='like'])").forEach(btn => {
        const reactionType = btn.dataset.reaction;
        if (!reactionType) return;

        if (!btn.hasAttribute('data-listener-added')) {
            btn.addEventListener("click", () => {
                if (!memberId) {
                    window.location.href = `/login.php?redirect_url=${encodeURIComponent(window.location.href)}`;
                    return;
                }

                fetch(`${window.API_BASE_URL}/podcasts/reaction`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        podcast_id: podcastId,
                        member_id: memberId,
                        reaction: reactionType
                    })
                })
                    .then(res => {
                        if (!res.ok) throw new Error("Network response was not ok");
                        return res.json();
                    })
                    .then(result => {
                        if (result.status === "success") {
                            refreshReactionCounts(podcastId);
                            showToast("Reaction updated successfully", "success");
                        } else {
                            throw new Error(result.message || "Failed to update reaction");
                        }
                    })
                    .catch(error => {
                        console.error("Error updating reaction:", error);
                        showToast("Failed to update reaction", "error");
                    });
            });

            btn.setAttribute('data-listener-added', 'true');
        }
    });
}
function refreshReactionCounts(podcastId) {
    fetch(`${window.API_BASE_URL}/podcasts/${podcastId}/reactions`)
        .then(res => res.json())
        .then(result => {
            if (result.status === "success") {
                document.querySelectorAll(".reaction-btn").forEach(btn => {
                    const type = btn.dataset.reaction;
                    const countSpan = btn.querySelector(".count");
                    if (type && countSpan && result.reactions[type] !== undefined) {
                        countSpan.textContent = result.reactions[type];
                    }
                });
            }
        })
        .catch(console.error);
}
document.addEventListener("DOMContentLoaded", function () {
  const slug = new URLSearchParams(window.location.search).get("slug");
  if (slug) fetchNews(slug);
});

/* =============================
   📰 Fetch News Details
============================= */
async function fetchNews(slug) {
  try {
    const res = await fetch(`${window.API_BASE_URL}/news/per-slug/${slug}`);
    const { status, data } = await res.json();

    if (status === "success" && data) renderNews(data);
    else showError();
  } catch (error) {
    console.error("Error fetching news:", error);
    showError();
  }
}

/* =============================
   🕒 Helper: Time Ago
============================= */
function timeAgo(dateString) {
  const date = new Date(dateString);
  const seconds = Math.floor((new Date() - date) / 1000);
  const intervals = {
    year: 31536000,
    month: 2592000,
    week: 604800,
    day: 86400,
    hour: 3600,
    minute: 60,
  };
  for (const [key, value] of Object.entries(intervals)) {
    const count = Math.floor(seconds / value);
    if (count >= 1) return `${count} ${key}${count > 1 ? "s" : ""} ago`;
  }
  return "Just now";
}

/* =============================
   🧩 Render News Layout
============================= */
function renderNews(news) {
  fetchRelatedNews(news.category, news.slug);

  const hasAudio =
    news.audio_url &&
    news.audio_url.trim() &&
    news.audio_url !== "null" &&
    news.audio_url !== "undefined";

  const slides = [];

  if (news.video_url && news.video_url.trim() && news.video_url !== "null") {
    slides.push(`
      <div class="carousel-slide">
        <video controls poster="${news.cover_image || ""}">
          <source src="${news.video_url}" type="video/mp4" />
        </video>
      </div>
    `);
  }

  if (
    news.cover_image &&
    news.cover_image.trim() &&
    news.cover_image !== "null"
  ) {
    slides.push(`
      <div class="carousel-slide">
        <img src="${news.cover_image}" alt="${news.title}" />
      </div>
    `);
  }

  if (Array.isArray(news.media)) {
    news.media.forEach((m) => {
      if (m.url && m.url.trim() && m.url !== "null") {
        slides.push(`
          <div class="carousel-slide">
            <img src="${m.url}" alt="${news.title}" />
          </div>
        `);
      }
    });
  }

  if (slides.length > 0)
    slides[0] = slides[0].replace("carousel-slide", "carousel-slide active");

  const carouselHTML =
    slides.length > 0
      ? `
    <div class="carousel-container">
      <div class="carousel-track">${slides.join("")}</div>
      ${
        slides.length > 1
          ? `
        <button class="carousel-btn prev"><i class="fas fa-chevron-left"></i></button>
        <button class="carousel-btn next"><i class="fas fa-chevron-right"></i></button>
        <div class="carousel-indicators">
          ${slides
            .map(
              (_, i) =>
                `<div class="carousel-indicator ${
                  i === 0 ? "active" : ""
                }" data-index="${i}"></div>`
            )
            .join("")}
        </div>`
          : ""
      }
    </div>`
      : "";

  const audioHTML = hasAudio
    ? `
    <div class="audio-player">
      <h3><i class="fas fa-headphones"></i> Listen to this story</h3>
      <audio controls preload="metadata" style="width: 100%;">
        <source src="${news.audio_url}" type="audio/mpeg" />
      </audio>
    </div>`
    : "";

  const newsDetailsHTML = `
    <div class="news-header">
      <div class="news-meta">
        <span class="category">${news.category || "Uncategorized"}</span>
        ${
          news.subcategory
            ? `<span class="subcategory">${news.subcategory}</span>`
            : ""
        }
      </div>
      <h1 class="news-title">${news.title || "Untitled"}</h1>
      ${news.subtitle ? `<h2 class="news-subtitle">${news.subtitle}</h2>` : ""}
      <div class="news-info">
        <span><i class="fas fa-user"></i> ${
          news.published_by || "Unknown"
        }</span>
        <span><i class="fas fa-calendar"></i> ${
          news.published_date
            ? new Date(news.published_date).toLocaleDateString()
            : "Unknown date"
        }</span>
        <span><i class="fas fa-map-marker-alt"></i> ${
          news.city || "Unknown"
        }, ${news.state || "Unknown"}</span>
        <span class="comment-trigger" data-newsid="${
          news.id
        }" title="View Comments">
          <i class="fas fa-comments"></i>
        </span>
      </div>
    </div>
    ${carouselHTML}
    ${audioHTML}
    <div class="news-body">${
      news.content || "<p>No content available.</p>"
    }</div>
    <div class="news-footer">
      <div>
        <p>Written by <strong>${
          news.content_creator || news.published_by || "Unknown"
        }</strong></p>
        <p>Published on ${
          news.published_date
            ? new Date(news.published_date).toLocaleDateString()
            : "Unknown date"
        }</p>
      </div>
      <div class="social-share">
        <a href="#" id="share-facebook" title="Share on Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" id="share-twitter" title="Share on X" aria-label="Share on X">
          <svg
            viewBox="0 0 24 24"
            width="20"
            height="20"
            aria-hidden="true"
            focusable="false"
            fill="currentColor"
            role="img"
          >
            <path d="M18.244 2.25h3.356l-7.336 8.385 8.607 11.115h-6.706l-5.258-6.803L5.48 21.75H2.125l7.55-8.613L1.25 2.25h6.834l4.797 6.199 5.363-6.199Z"/>
          </svg>
        </a>        <a href="#" id="share-whatsapp" title="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="#" id="share-instagram" title="Share on Instagram"><i class="fab fa-instagram"></i></a>
        <a href="#" id="copy-link" title="Copy Link"><i class="fas fa-link"></i></a>
      </div>
    </div>`;

  document.getElementById("news-details").innerHTML = newsDetailsHTML;

  setupSocialShare(news);

  const breadcrumbTitle = document.getElementById("breadcrumb-title");
  if (breadcrumbTitle)
    breadcrumbTitle.textContent =
      news.title?.length > 30
        ? news.title.substring(0, 30) + "..."
        : news.title || "News Article";

  if (slides.length > 0) setTimeout(initCarousel, 100);
}

/* =============================
   🎠 Carousel
============================= */
function initCarousel() {
  const track = document.querySelector(".carousel-track");
  const slides = Array.from(document.querySelectorAll(".carousel-slide"));
  const indicators = document.querySelectorAll(".carousel-indicator");
  const nextBtn = document.querySelector(".carousel-btn.next");
  const prevBtn = document.querySelector(".carousel-btn.prev");

  if (!track || slides.length === 0) return;

  let currentIndex = 0;
  const totalSlides = slides.length;

  function goToSlide(index) {
    currentIndex = (index + totalSlides) % totalSlides;
    const offset = -currentIndex * track.clientWidth;
    track.style.transform = `translateX(${offset}px)`;

    slides.forEach((s, i) => s.classList.toggle("active", i === currentIndex));
    indicators.forEach((dot, i) =>
      dot.classList.toggle("active", i === currentIndex)
    );
  }

  nextBtn?.addEventListener("click", () => goToSlide(currentIndex + 1));
  prevBtn?.addEventListener("click", () => goToSlide(currentIndex - 1));
  indicators.forEach((dot, i) =>
    dot.addEventListener("click", () => goToSlide(i))
  );

  function setSlideWidths() {
    const trackWidth = track.clientWidth;
    slides.forEach((slide) => (slide.style.width = `${trackWidth}px`));
    goToSlide(currentIndex);
  }

  let resizeTimeout;
  window.addEventListener("resize", () => {
    clearTimeout(resizeTimeout);
    resizeTimeout = setTimeout(setSlideWidths, 200);
  });
  setSlideWidths();
}

function setupSocialShare(news) {
  const pageUrl = encodeURIComponent(window.location.href);
  const title = encodeURIComponent(news.title || "Thaalam Radio News");

  // Platform URLs
  const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${pageUrl}`;
  const twitterUrl = `https://twitter.com/intent/tweet?text=${title}&url=${pageUrl}`;
  const whatsappUrl = `https://api.whatsapp.com/send?text=${title}%20${pageUrl}`;

  // Set hrefs
  document.getElementById("share-facebook").href = facebookUrl;
  document.getElementById("share-twitter").href = twitterUrl;
  document.getElementById("share-whatsapp").href = whatsappUrl;

  // Instagram (placeholder)
  document.getElementById("share-instagram").addEventListener("click", (e) => {
    e.preventDefault();
    showToast("Instagram does not support direct web sharing.");
  });

  // Copy link
  document.getElementById("copy-link").addEventListener("click", async () => {
    try {
      await navigator.clipboard.writeText(window.location.href);
      showToast(" Link copied to clipboard!");
    } catch (err) {
      console.error("Copy failed:", err);
      showToast("Failed to copy link. Please copy manually.");
    }
  });
}

/* =============================
   🗞 Related News
============================= */
async function fetchRelatedNews(category, currentSlug) {
  try {
    const res = await fetch(
      `${window.API_BASE_URL}/news/related-news/${category}?limit=4&status=published`
    );
    const { status, data } = await res.json();

    if (status === "success" && Array.isArray(data)) {
      const related = data.filter(
        (n) => n.category === category && n.slug !== currentSlug
      );
      renderRelatedNews(related);
    }
  } catch (err) {
    console.error("Error fetching related news:", err);
  }
}

function renderRelatedNews(related) {
  const container = document.getElementById("related-news");
  if (!container) return;

  if (!related || !related.length) {
    container.innerHTML = `<p class="no-related">No related articles available.</p>`;
    return;
  }

  container.innerHTML = related
    .map(
      (news) => `
      <a href="news-details?slug=${news.slug}" class="related-card">
        <div class="related-image">
          <img src="${
            news.cover_image || "./assets/images/default-news.jpg"
          }" alt="${news.title}">
        </div>
        <div class="related-content">
          <h3>${news.title.substring(0, 70)}...</h3>
          <span class="related-date">
            <i class="fas fa-calendar-alt"></i>
            ${new Date(news.published_date).toLocaleDateString("en-US", {
              month: "short",
              day: "numeric",
              year: "numeric",
            })}
          </span>
        </div>
      </a>`
    )
    .join("");
}

/* =============================
   💬 Comments
============================= */
document.addEventListener("click", (e) => {
  const commentTrigger = e.target.closest(".comment-trigger");
  if (commentTrigger) openCommentModal(commentTrigger.dataset.newsid);
  if (e.target.closest(".close-comment-modal")) closeCommentModal();
});

document.addEventListener("click", function (e) {
  const modal = document.getElementById("comment-modal");
  const isOpen = modal.classList.contains("active");

  if (
    isOpen &&
    !e.target.closest(".comment-modal-content") &&
    !e.target.closest(".comment-trigger")
  ) {
    closeCommentModal();
  }
});

function openCommentModal(newsId) {
  document.getElementById("comment-modal").classList.add("active");
  document.getElementById("news_id").value = newsId;
  fetchComments(newsId);
  renderCommentForm();
}

function closeCommentModal() {
  document.getElementById("comment-modal").classList.remove("active");
}

async function fetchComments(newsId) {
  const res = await fetch(
    `${window.API_BASE_URL}/news-comments/news/${newsId}`
  );
  const { status, result } = await res.json();
  const listContainer = document.getElementById("comment-list");
  const countEl = document.querySelector(".comment-count");

  if (status === "success" && result?.data?.length) {
    listContainer.innerHTML = result.data
      .map(
        (c) => `
      <div class="comment-item">
        <div class="comment-content">
          <div>
            <strong>${c.Member?.name || c.guest_name || "Guest"}</strong>
            <small>${timeAgo(c.created_at)}</small>
          </div>
          <p>${c.comment}</p>
        </div>
      </div>`
      )
      .join("");
  } else {
    listContainer.innerHTML = `<p class="no-comments">No comments yet. Be the first!</p>`;
  }

  if (countEl) countEl.textContent = result?.pagination?.totalRecords || 0;
}

function renderCommentForm() {
  const memberID = localStorage.getItem("memberId");
  const username = localStorage.getItem("username");
  const fieldsDiv = document.getElementById("member-fields");

  if (memberID && username) {
    fieldsDiv.innerHTML = `
      <input type="hidden" id="member_id" value="${memberID}" />
      <p style="color:#555; font-size:0.9rem; margin:0;">
        Commenting as <strong>${username}</strong>
      </p>`;
  } else {
    fieldsDiv.innerHTML = `
      <input type="text" id="guest_name" placeholder="Your Name" required />
      <input type="email" id="guest_email" placeholder="Your Email" required />`;
  }
}

document
  .getElementById("add-comment-form")
  .addEventListener("submit", async (e) => {
    e.preventDefault();

    const news_id = document.getElementById("news_id").value;
    const comment = document.getElementById("comment-text").value.trim();
    if (!comment) return showToast("Please write a comment.");

    const memberID = localStorage.getItem("memberId");
    const payload = { news_id, comment };

    if (memberID) {
      payload.member_id = memberID;
    } else {
      payload.guest_id = getGuestId();
      payload.guest_name = document.getElementById("guest_name").value.trim();
      payload.guest_email = document.getElementById("guest_email").value.trim();
      if (!payload.guest_name || !payload.guest_email)
        return showToast("Please fill name and email.");
    }

    const res = await fetch(`${window.API_BASE_URL}/news-comments`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });

    const data = await res.json();
    if (data.status === "success") {
      document.getElementById("comment-text").value = "";
      fetchComments(news_id);
      showToast("Comment posted and pending approval!");
    } else {
      showToast(data.message || "Failed to post comment.");
    }
  });

/* =============================
   📱 Keyboard Fix (Mobile)
============================= */
const commentTextarea = document.getElementById("comment-text");
const commentForm = document.querySelector(".comment-form");

if (commentTextarea && commentForm) {
  commentTextarea.addEventListener("focus", () => {
    if (window.innerWidth <= 768)
      setTimeout(() => commentForm.classList.add("keyboard-open"), 100);
  });
  commentTextarea.addEventListener("blur", () => {
    if (window.innerWidth <= 768) commentForm.classList.remove("keyboard-open");
  });
}

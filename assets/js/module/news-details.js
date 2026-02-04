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

  const newsDetailsHTML = `
  <!-- Category -->
  <div class="mb-3">
    <span class="text-xs uppercase tracking-widest text-red-600 font-semibold">
      ${news.category || "News"}
    </span>
    ${
      news.subcategory
        ? `<span class="ml-3 text-xs text-gray-500">${news.subcategory}</span>`
        : ""
    }
  </div>

  <!-- Title -->
  <h1 class="text-xl md:text-2xl font-semibold leading-tight text-gray-900">
    ${news.title}
  </h1>

  <!-- Subtitle -->
  ${
    news.subtitle
      ? `<p class="mt-5 text-lg text-gray-700 leading-relaxed max-w-3xl">
          ${news.subtitle}
        </p>`
      : ""
  }

  <!-- Meta -->
  <div class="mt-6 flex flex-wrap items-center gap-3 text-sm text-gray-500 border-b pb-6">
    <span class="font-medium text-gray-900">
      ${news.published_by || "Thaalam News"}
    </span>
    <span class="h-1 w-1 rounded-full bg-gray-400"></span>
    <span>
      ${
        news.published_date
          ? new Date(news.published_date).toLocaleDateString("en-GB", {
              day: "numeric",
              month: "short",
              year: "numeric",
            })
          : ""
      }
    </span>
    <span class="h-1 w-1 rounded-full bg-gray-400"></span>
    <span>${news.city || "Switzerland"}</span>

    <button
      class="comment-trigger ml-auto text-sm font-semibold text-red-600 hover:underline"
      data-newsid="${news.id}">
      Comments
    </button>
  </div>

  <!-- HERO MEDIA -->
  ${
    news.cover_image
      ? `
      <div class="mt-8 -mx-6 md:-mx-10">
        <img
          src="${news.cover_image}"
          alt="${news.title}"
          class="w-full max-h-[420px] object-cover"
        />
      </div>
      `
      : ""
  }


  <!-- Content -->
  <div class="prose prose-lg md:prose-xl max-w-none mt-10 leading-relaxed">
    ${news.content}
  </div>

  <!-- Footer -->
  <div class="mt-14 pt-6 border-t flex items-center justify-between">

    <div class="text-sm text-gray-600">
      Written by<br>
      <span class="font-medium text-gray-900">
        ${news.content_creator || news.published_by}
      </span>
    </div>

    <div class="flex items-center gap-5 text-lg text-gray-500">
      <a id="share-facebook" class="hover:text-blue-600" title="Share on Facebook">
        <i class="fab fa-facebook"></i>
      </a>

      <a id="share-twitter" class="hover:text-black" title="Share on X">
        <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
          <path d="M18.244 2.25h3.356l-7.336 8.385 8.607 11.115h-6.706l-5.258-6.803L5.48 21.75H2.125l7.55-8.613L1.25 2.25h6.834l4.797 6.199 5.363-6.199Z"/>
        </svg>
      </a>

      <a id="share-whatsapp" class="hover:text-green-600" title="Share on WhatsApp">
        <i class="fab fa-whatsapp"></i>
      </a>

      <a id="copy-link" class="hover:text-gray-900" title="Copy link">
        <i class="fas fa-link"></i>
      </a>
    </div>

  </div>
`;

  document.getElementById("news-details").innerHTML = newsDetailsHTML;

  setupSocialShare(news);

  const breadcrumbTitle = document.getElementById("breadcrumb-title");
  if (breadcrumbTitle)
    breadcrumbTitle.textContent =
      news.title?.length > 50
        ? news.title.substring(0, 50) + "..."
        : news.title || "News Article";
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
      `${window.API_BASE_URL}/news/related-news/${category}?limit=4&status=published`,
    );
    const { status, data } = await res.json();

    if (status === "success" && Array.isArray(data)) {
      const related = data.filter(
        (n) => n.category === category && n.slug !== currentSlug,
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
    container.innerHTML = `
    <div class="py-6 text-sm text-gray-500">
      <p>No related stories at the moment.</p>
      <p class="mt-1 text-xs text-gray-400">
        Check back soon for more updates.
      </p>
    </div>
  `;
    return;
  }

  container.innerHTML = related
    .map(
      (news) => `
    <a
      href="news-details?slug=${news.slug}"
      class="group block bg-white border border-gray-200 rounded-lg overflow-hidden
             hover:shadow-md hover:-translate-y-0.1 transition-all duration-300"
    >

      <!-- Image -->
      <div class="overflow-hidden">
        <img
          src="${news.cover_image || "./assets/images/default-news.jpg"}"
          alt="${news.title}"
          class="w-full h-48 object-cover
                 group-hover:scale-101 transition-transform duration-300"
        />
      </div>

      <!-- Content -->
      <div class="p-4">

        <!-- Date -->
        <span class="block text-xs text-red-600 mb-2">
          ${new Date(news.published_date).toLocaleDateString("en-GB", {
            day: "numeric",
            month: "short",
            year: "numeric",
          })}
        </span>

        <!-- Title -->
        <h3
          class="text-sm font-semibold text-gray-900 leading-snug
                 group-hover:underline decoration-red-600 decoration-2 underline-offset-4 line-clamp-2"
        >
          ${news.title}
        </h3>

      </div>

    </a>
  `,
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
  const modal = document.getElementById("comment-modal");
  modal.classList.remove("hidden");
  modal.classList.add("flex");

  document.getElementById("news_id").value = newsId;
  fetchComments(newsId);
  renderCommentForm();

  document.body.classList.add("overflow-hidden");
}

function closeCommentModal() {
  const modal = document.getElementById("comment-modal");
  modal.classList.add("hidden");
  modal.classList.remove("flex");

  document.body.classList.remove("overflow-hidden");
}

function renderCommentForm() {
  const memberID = localStorage.getItem("memberId");
  const username = localStorage.getItem("username");
  const fieldsDiv = document.getElementById("member-fields");

  if (!fieldsDiv) return;

  // Logged-in member
  if (memberID && username) {
    fieldsDiv.innerHTML = `
      <div class="text-sm text-gray-600">
        Commenting as
        <span class="font-semibold text-gray-900">${username}</span>
      </div>
    `;
  }
  // Guest user
  else {
    fieldsDiv.innerHTML = `
      <input
        type="text"
        id="guest_name"
        placeholder="Your name"
        required
        class="w-full rounded-lg border border-gray-300
               px-3 py-2 text-sm
               focus:outline-none focus:ring-2 focus:ring-red-500"
      />

      <input
        type="email"
        id="guest_email"
        placeholder="Your email"
        required
        class="w-full rounded-lg border border-gray-300
               px-3 py-2 text-sm
               focus:outline-none focus:ring-2 focus:ring-red-500"
      />
    `;
  }
}

async function fetchComments(newsId) {
  const listContainer = document.getElementById("comment-list");

  listContainer.innerHTML = `
    <p class="text-sm text-gray-400 animate-pulse">
      Loading comments…
    </p>
  `;

  try {
    const res = await fetch(
      `${window.API_BASE_URL}/news-comments/news/${newsId}`,
    );
    const { status, result } = await res.json();

    if (status === "success" && result?.data?.length) {
      listContainer.innerHTML = result.data
        .map(
          (c) => `
        <div class="flex gap-3 border-b pb-4">

          <div
            class="w-9 h-9 rounded-full bg-gray-200
                   flex items-center justify-center
                   text-xs font-semibold text-gray-600"
          >
            ${(c.Member?.name || c.guest_name || "G").charAt(0).toUpperCase()}
          </div>

          <div class="flex-1">
            <div class="flex justify-between">
              <span class="text-sm font-semibold text-gray-900">
                ${c.Member?.name || c.guest_name || "Guest"}
              </span>
              <span class="text-xs text-gray-400">
                ${timeAgo(c.created_at)}
              </span>
            </div>

            <p class="mt-1 text-sm text-gray-700">
              ${c.comment}
            </p>
          </div>

        </div>
      `,
        )
        .join("");
    } else {
      listContainer.innerHTML = `
        <p class="text-sm text-gray-500">
          No comments yet. Be the first to comment!
        </p>
      `;
    }
  } catch (err) {
    console.error(err);
    listContainer.innerHTML = `
      <p class="text-sm text-red-500">
        Failed to load comments.
      </p>
    `;
  }
}

document.addEventListener("submit", async (e) => {
  if (!e.target.matches("#add-comment-form")) return;

  e.preventDefault();

  const form = e.target;
  const btn = form.querySelector('button[type="submit"]');

  const commentInput = document.getElementById("comment-text");
  const newsInput = document.getElementById("news_id");

  if (!commentInput || !newsInput) {
    return showToast("Comment form not ready.", "error");
  }

  const comment = commentInput.value.trim();
  const news_id = newsInput.value;

  if (!comment) return showToast("Please write a comment.", "error");

  btn.disabled = true;
  btn.textContent = "Posting…";

  const memberID = localStorage.getItem("memberId");
  const payload = { news_id, comment };

  if (memberID) {
    payload.member_id = memberID;
  } else {
    const guestNameEl = document.getElementById("guest_name");
    const guestEmailEl = document.getElementById("guest_email");

    if (!guestNameEl || !guestEmailEl) {
      btn.disabled = false;
      btn.textContent = "Post Comment";
      return showToast("Please enter your name and email.", "info");
    }

    payload.guest_id = getGuestId();
    payload.guest_name = guestNameEl.value.trim();
    payload.guest_email = guestEmailEl.value.trim();

    if (!payload.guest_name || !payload.guest_email) {
      btn.disabled = false;
      btn.textContent = "Post Comment";
      return showToast("Please fill name and email.", "info");
    }
  }

  try {
    const res = await fetch(`${window.API_BASE_URL}/news-comments`, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });

    const data = await res.json();

    if (data.status === "success") {
      commentInput.value = "";
      fetchComments(news_id);
      showToast("Comment submitted for approval!");
    } else {
      showToast(data.message || "Failed to post comment.", "error");
    }
  } catch (err) {
    console.error(err);
    showToast("Network error. Try again.", "error");
  }

  btn.disabled = false;
  btn.textContent = "Post Comment";
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

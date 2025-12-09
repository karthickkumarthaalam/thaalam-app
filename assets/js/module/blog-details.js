document.addEventListener("DOMContentLoaded", function () {
  const slug = new URLSearchParams(window.location.search).get("slug");

  if (!slug) {
    showError("No blog specified.");
    return;
  }

  fetchBlog(slug);
  fetchLatestPosts(slug);
});

// ---------------- TIME AGO HELPER (optional, used in sidebar) ----------------
function timeAgo(dateString) {
  if (!dateString) return "";
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

// ---------------- MAIN BLOG FETCH ----------------
async function fetchBlog(slug) {
  try {
    const res = await fetch(`${window.API_BASE_URL}/blogs/per-slug/${slug}`);
    const { status, data } = await res.json();

    if (status === "success" && data) {
      renderBlogDetails(data);
    } else {
      showError("Blog not found.");
    }
  } catch (error) {
    console.error("Error fetching blog:", error);
    showError();
  }
}

// ---------------- RENDER MAIN BLOG USING YOUR TEMPLATE ----------------
function renderBlogDetails(blog) {
  // Cover Image
  const imgEl = document.querySelector(".blog-details__img img");
  if (imgEl) {
    const cover = blog.cover_image
      ? blog.cover_image
      : "assets/img/common/blog-details/img-1.jpg";
    imgEl.src = cover;
    imgEl.alt = blog.title || "Blog cover image";
  }

  // Title
  const titleEl = document.querySelector(".blog-details__title-1");
  if (titleEl) titleEl.textContent = blog.title || "Blog Title";

  // Subtitle
  const subtitleEl = document.querySelector(".blog-details__subtitle");
  if (subtitleEl) subtitleEl.textContent = blog.subtitle || "";

  // Author image & name
  const authorImgEl = document.querySelector(".blog-details__client-img img");
  if (authorImgEl) {
    if (blog.author_image) {
      authorImgEl.src = `${window.API_BASE_URL}/${blog.author_image.replace(
        /\\/g,
        "/"
      )}`;
    } else {
      authorImgEl.src = "assets/images/blog/blog-details-client-img-1.jpg";
    }
  }

  const authorNameEl = document.querySelector(
    ".blog-details__client-content h4"
  );
  if (authorNameEl) {
    authorNameEl.textContent = blog.published_by || "";
  }

  // Published Date
  const dateEl = document.querySelector(
    ".blog-details__client-meta li:nth-child(1) p"
  );
  if (dateEl) {
    if (blog.published_date) {
      const d = new Date(blog.published_date);
      dateEl.textContent = d.toLocaleDateString("en-US", {
        year: "numeric",
        month: "short",
        day: "2-digit",
      });
    } else {
      dateEl.textContent = "";
    }
  }

  // Category
  const categoryEl = document.querySelector(
    ".blog-details__client-meta li:nth-child(2) p"
  );
  if (categoryEl) {
    categoryEl.textContent = blog.category || "General";
  }

  // Sub Category
  const subCategoryEl = document.querySelector(
    ".blog-details__client-meta li:nth-child(3) p"
  );
  if (subCategoryEl) {
    subCategoryEl.textContent = blog.subcategory || "—";
  }

  // Main Content
  const contentEl = document.querySelector(".blog-details__text-1");
  if (contentEl) {
    // blog.content may already be HTML from CMS
    contentEl.innerHTML = blog.content || "";
  }

  // Optional: Update <title> dynamically
  if (blog.title) {
    document.title = `${blog.title} - Thaalam Radio Station`;
  }

  const breadcrumbTitle = document.getElementById("breadcrumb-title");
  if (breadcrumbTitle)
    breadcrumbTitle.textContent =
      blog.title?.length > 30
        ? blog.title.substring(0, 30) + "..."
        : blog.title || "News Article";
}

// ---------------- LATEST POSTS SIDEBAR ----------------
async function fetchLatestPosts(currentSlug) {
  const listEl = document.querySelector(".sidebar__post-list");
  if (!listEl) return;

  // Show small loader while fetching
  listEl.innerHTML = `
    <li>
      <p>Loading latest posts...</p>
    </li>
  `;

  try {
    const res = await fetch(
      `${window.API_BASE_URL}/blogs?status=published&limit=4&page=1`
    );
    const json = await res.json();

    const blogs = json?.data?.data || json?.data || [];

    if (!blogs.length) {
      listEl.innerHTML = `
        <li>
          <p>No recent posts available.</p>
        </li>
      `;
      return;
    }

    const filtered = blogs.filter((b) => b.slug !== currentSlug);

    listEl.innerHTML = filtered
      .map((blog) => {
        const imgPath = blog.cover_image
          ? blog.cover_image
          : "assets/img/common/blog-details/img-4.jpg";

        const readTime =
          blog.read_time_minutes ||
          Math.max(1, Math.round((blog.content || "").split(" ").length / 200));

        return `
         <li class="blog-sidebar-item">
            <div class="blog-sidebar-item__img">
              <img src="${imgPath}" alt="${blog.title}" loading="lazy">
            </div>
            <div class="blog-sidebar-item__info">
              <div class="blog-sidebar-item__meta">
                <span class="blog-category-tag"><span class="icon-tags"></span> ${
                  blog.category || "General"
                }</span>
                <span class="blog-read-time"><span class="icon-clock"></span> ${readTime} Min Read</span>
              </div>
              <h4 class="blog-sidebar-item__title">
                <a href="blog-details.php?slug=${encodeURIComponent(
                  blog.slug
                )}">
                  ${blog.title}
                </a>
              </h4>
            </div>
          </li>
        `;
      })
      .join("");
  } catch (err) {
    console.error("Error fetching latest posts:", err);
    listEl.innerHTML = `
      <li>
        <p>Failed to load latest posts.</p>
      </li>
    `;
  }
}

// ---------------- ERROR HANDLER ----------------
function showError(
  message = "Unable to load this blog. Please try again later."
) {
  const container = document.querySelector(".blog-details__left");
  if (container) {
    container.innerHTML = `
      <div class="blog-details__content text-center py-5">
        <h3>${message}</h3>
        <p><a href="blogs.php">Go back to Blogs</a></p>
      </div>
    `;
  }
}

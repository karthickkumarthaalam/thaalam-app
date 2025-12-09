document.addEventListener("DOMContentLoaded", () => {
  const slug = new URLSearchParams(location.search).get("slug");
  if (!slug) return showError("Invalid RJ Link");

  const API = `${window.API_BASE_URL}/rj-details/data/${slug}`;
  const content = document.getElementById("rj-content");

  initNavigation();

  fetch(API)
    .then((res) => res.json())
    .then(({ data }) => {
      if (!data) return showError("RJ Not Found");

      content.classList.remove("hidden");

      updateHero(data);
      renderPrograms(data.radio_programs);
      renderNews(data.news);
      renderPodcasts(data.podcasts);
      renderBlogs(data.blogs);
    })
    .catch(() => showError("Failed to load RJ details"));

  function showError(msg) {
    content.classList.remove("hidden");
    content.innerHTML = `<div class="empty">${msg}</div>`;
  }

  function updateHero(rj) {
    const profile = rj.image_url
      ? window.API_BASE_URL + "/" + rj.image_url.replace(/\\/g, "/")
      : "/assets/img/home/default-rj.jpg";

    document.getElementById("rj-image").src = profile;
    document.getElementById("rj-name").textContent = rj.name;
    document.getElementById("rj-description").textContent =
      rj.description || "No description available";
  }

  function renderPrograms(programs = []) {
    const el = document.getElementById("rj-programs");
    if (!programs.length) return (el.innerHTML = empty("No radio shows"));

    el.innerHTML = programs
      .map((p, i) => {
        const pc = p.program_category ?? {};
        const img =
          pc.image_url || "/assets/images/site-images/default-banner.jpg";

        return `
        <div class="program list-item" style="--i:${i}">
          <img src="${img}" alt="${pc.category}">
          <div class="program-list-content">
            <h4>${pc.category || "Unnamed Show"}</h4>
            <p>Running On : ${pc.start_time?.slice(0, 5) || "N/A"} – ${
          pc.end_time?.slice(0, 5) || "N/A"
        }</p>
          </div>
        </div>`;
      })
      .join("");
  }

  function renderNews(news = []) {
    const el = document.getElementById("rj-news");
    if (!news.length) return (el.innerHTML = empty("No news available"));

    el.innerHTML = news
      .map(
        (n, i) => `
      <a href="/news-details?slug=${n.slug}" class="list-item" style="--i:${i}">
        <img src="${n.cover_image}" alt="${n.title}">
        <div class="list-content">
          <h4>${n.title}</h4>
          <p>${n.content ? n.content.slice(0, 200) + "..." : ""}</p>
        </div>
      </a>`
      )
      .join("");
  }

  function renderPodcasts(podcasts = []) {
    const el = document.getElementById("rj-podcasts");
    if (!podcasts.length) return (el.innerHTML = empty("No podcasts"));

    el.innerHTML = podcasts
      .map(
        (p, i) => `
      <a href="/podcast-details?id=${p.id}" class="list-item" style="--i:${i}">
        <img src="${p.image_url || "assets/images/default-podcast.jpg"}" alt="${
          p.title
        }">
        <div class="list-content">
          <h4>${p.title}</h4>
          <p>${(p.description || "")
            .replace(/<[^>]*>/g, "")
            .slice(0, 100)}...</p>
        </div>
      </a>`
      )
      .join("");
  }

  function renderBlogs(blogs = []) {
    const el = document.getElementById("rj-blogs");
    if (!blogs.length) return (el.innerHTML = empty("No Blogs"));

    el.innerHTML = blogs
      .map(
        (b, i) => `
          <a href="/news-details?slug=${
            b.slug
          }" class="list-item" style="--i:${i}">
            <img src="${b.cover_image}" alt="${b.title}">
            <div class="list-content">
              <h4>${b.title}</h4>
              <p>${(b.subtitle || "").slice(0, 120)}...</p>
            </div>
          </a>
        `
      )
      .join(""); // ✅ Important fix
  }

  function empty(text) {
    return `<div class="empty">${text}</div>`;
  }

  function initNavigation() {
    const nav = document.querySelectorAll(".nav-item");
    const sections = document.querySelectorAll(".rj-block");

    nav.forEach((btn) =>
      btn.addEventListener("click", () => {
        nav.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");

        sections.forEach((sec) =>
          sec.classList.toggle("active", sec.id === btn.dataset.target)
        );

        // Scroll right section into view smoothly
        document.querySelector(".rj-body");
      })
    );
  }
});

(() => {
    "use strict";

    const prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    const revealItems = document.querySelectorAll(".creator-reveal");
    const processTrack = document.querySelector(".creator-process__track");

    if (!prefersReducedMotion && "IntersectionObserver" in window) {
        const revealObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) return;
                entry.target.classList.add("is-visible");
                observer.unobserve(entry.target);
            });
        }, { threshold: 0.14, rootMargin: "0px 0px -45px" });

        revealItems.forEach((item) => revealObserver.observe(item));

        if (processTrack) {
            const trackObserver = new IntersectionObserver((entries, observer) => {
                if (!entries[0].isIntersecting) return;
                processTrack.classList.add("is-visible");
                observer.disconnect();
            }, { threshold: 0.3 });
            trackObserver.observe(processTrack);
        }
    } else {
        revealItems.forEach((item) => item.classList.add("is-visible"));
        processTrack?.classList.add("is-visible");
    }

    const parallaxArea = document.querySelector("[data-parallax-area]");
    const parallaxItem = document.querySelector("[data-parallax-item]");

    if (!prefersReducedMotion && parallaxArea && parallaxItem && window.matchMedia("(pointer: fine)").matches) {
        parallaxArea.addEventListener("pointermove", (event) => {
            const bounds = parallaxArea.getBoundingClientRect();
            const x = (event.clientX - bounds.left) / bounds.width - 0.5;
            const y = (event.clientY - bounds.top) / bounds.height - 0.5;
            parallaxItem.style.transform = `rotate(2deg) rotateY(${x * 7}deg) rotateX(${-y * 7}deg) translate3d(${x * 7}px, ${y * 7}px, 0)`;
        });

        parallaxArea.addEventListener("pointerleave", () => {
            parallaxItem.style.transform = "rotate(2deg)";
        });
    }

    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener("click", (event) => {
            const target = document.querySelector(anchor.getAttribute("href"));
            if (!target) return;
            event.preventDefault();
            target.scrollIntoView({ behavior: prefersReducedMotion ? "auto" : "smooth", block: "start" });
        });
    });
})();

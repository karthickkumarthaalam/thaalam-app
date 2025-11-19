<header class="event-header">

    <div class="event-header-main">
        <!-- center logo -->
        <div class="header-center">
            <a href="index">
                <img src="assets/img/logo/thalam-logo.png" class="event-logo">
            </a>
        </div>

        <!-- right side dynamic -->
    </div>

    <!-- Sticky header -->
    <div class="event-sticky" id="eventStickyHeader">
        <div class="event-header-main sticky-inner">

            <div class="header-center">
                <a href="index">
                    <img src="assets/img/logo/thalam-logo.png" class="event-logo">
                </a>
            </div>

        </div>
    </div>
</header>

<script>
    document.addEventListener("DOMContentLoaded", () => {

        const stickyHeader = document.getElementById("eventStickyHeader");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 120) stickyHeader.classList.add("show");
            else stickyHeader.classList.remove("show");
        });

        window.addEventListener("scroll", () => {
            if (window.scrollY > mainHeader.offsetHeight) {
                sticky.classList.add("show");
            } else {
                sticky.classList.remove("show");
            }
        });
    });
</script>
document.addEventListener("DOMContentLoaded", function () {
    const smoothScroll = (target) => {
        document.querySelector(target).scrollIntoView({
            behavior: "smooth",
        });
    };

    document
        .querySelector('a[href="#main-content"]')
        .addEventListener("click", function (event) {
            event.preventDefault();
            smoothScroll("#main-content");
        });

    document
        .querySelector('a[href="#tech-details"]')
        .addEventListener("click", function (event) {
            event.preventDefault();
            smoothScroll("#tech-details");
        });
});

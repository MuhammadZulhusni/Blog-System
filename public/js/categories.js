document.addEventListener("DOMContentLoaded", function () {
    const popup = document.getElementById("popup");
    const closePopupButton = document.getElementById("close-popup");

    // Show popup initially
    popup.classList.add("opacity-100");

    // Hide popup with transition when the button is clicked
    closePopupButton.addEventListener("click", function () {
        popup.classList.remove("opacity-100");
        popup.classList.add("opacity-0");
        setTimeout(() => (popup.style.display = "none"), 500); // Hide after transition
    });
});

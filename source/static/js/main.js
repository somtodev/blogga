window.onload = handleBackToTopButton;
window.addEventListener("scroll", handleBackToTopButton);

function handleBackToTopButton() {
  const button = document.querySelector("[back-top-button]");

  window.scrollY > 200
    ? (button.style.display = "block")
    : (button.style.display = "none");
}

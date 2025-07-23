document.addEventListener("DOMContentLoaded", function () {
  const tabs_header = document.querySelector(".tabs__header");
  const window_href = window.location.search;
  const searchParams = new URLSearchParams(window_href);
  const has_term_name = searchParams.has("term_name");
  if (has_term_name) {
    tabs_header.scrollIntoView({
      behavior: "smooth",
    });
  }
});

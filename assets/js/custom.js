document.addEventListener("DOMContentLoaded", function () {
  console.log("Hello World");
  const tabs_header = document.querySelector(".tabs__header");
  const window_href = window.location.search;
  console.log(window_href);
  const searchParams = new URLSearchParams(window_href);
  const has_term_name = searchParams.has("term_name");
  console.log(has_term_name);
  if (has_term_name) {
    console.log(searchParams.get("term_name"));
    tabs_header.scrollIntoView({
      behavior: "smooth",
    });
  }
});

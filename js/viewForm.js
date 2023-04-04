const viewButton = document.querySelector("#viewButton");
const form = document.querySelector("#formCategories");

viewButton.addEventListener("click", () => {
  form.classList.toggle("active");
});

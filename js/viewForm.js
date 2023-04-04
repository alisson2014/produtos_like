const viewButton = document.querySelector("#viewButton");
const form = document.querySelector("#formCategories");

const addClass = () => {
  if (form.classList.contains("active")) {
    form.classList.remove("active");
  } else {
    form.classList.add("active");
  }
};

viewButton.addEventListener("click", addClass);

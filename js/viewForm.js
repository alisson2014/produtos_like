const viewButton = document.querySelector("#viewButton");

function addEvent(id) {
  const htmlElement = document.querySelector(`#${id}`);

  viewButton.addEventListener("click", () => {
    htmlElement.classList.toggle("active");
  });
}

addEvent("formCategories");
addEvent("formProducts");

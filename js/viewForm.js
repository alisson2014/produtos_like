function addEvent(form, button) {
  const htmlElement = document.querySelector(`#${form}`);
  const buttonElement = document.querySelector(`#${button}`);

  buttonElement.addEventListener("click", () => {
    htmlElement.classList.toggle("active");
  });
}

addEvent("formCategories", "registerCategorie");
addEvent("formCategories", "updateCategorie");

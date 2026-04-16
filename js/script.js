const clearButton = document.getElementById("clearBtn");
const registrationForm = document.getElementById("registrationForm");
const firstNameInput = document.getElementById("firstName");

clearButton.addEventListener("click", () => {
  registrationForm.reset();
  firstNameInput.focus();
});

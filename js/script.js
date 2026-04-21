const clearButton = document.getElementById("clearBtn");
const registrationForm = document.getElementById("registrationForm");
const firstNameInput = document.getElementById("firstName");
const loginClearButton = document.getElementById("clearLoginBtn");
const loginForm = document.getElementById("loginForm");
const usernameInput = document.getElementById("username");

if (clearButton && registrationForm && firstNameInput) {
  clearButton.addEventListener("click", () => {
    registrationForm.reset();
    firstNameInput.focus();
  });
}

if (loginClearButton && loginForm && usernameInput) {
  loginClearButton.addEventListener("click", () => {
    loginForm.reset();
    usernameInput.focus();
  });
}

document
  .getElementById("registrationForm")
  .addEventListener("submit", function (event) {
    let nom = document.getElementById("nom").value.trim();
    let prenom = document.getElementById("prenom").value.trim();
    let email = document.getElementById("email").value.trim();
    let password = document.getElementById("password").value.trim();
    let errorMessage = document.getElementById("error-message");

    if (nom === "" || prenom === "" || email === "" || password === "") {
      event.preventDefault(); // Empêche l'envoi du formulaire
      errorMessage.style.display = "block";
    } else {
      errorMessage.style.display = "none";
    }
  });

function togglePassword() {
  let passwordInput = document.getElementById("password");
  if (passwordInput.type === "password") {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
}

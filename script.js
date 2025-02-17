document.addEventListener("DOMContentLoaded", function () {
  const image = document.querySelector(".homepage");
  const buttons = document.querySelector(".buttons");

  if (image) {
    image.addEventListener("animationend", function () {
      console.log("Animation terminée, affichage des boutons...");
      buttons.style.display = "flex"; // Affiche les boutons après l'animation
    });
  } else {
    console.error("L'image n'a pas été trouvée.");
  }
});

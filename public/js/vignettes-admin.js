//idContainer : identifiants de l'élément englobant les images
// folderName : chemin du dossier des images
function showImages(idContainer, folderName) {
    let containLabels = document.querySelector(idContainer);
    let allLabels = containLabels.querySelectorAll('label');
    allLabels.forEach(function(one) {
      const img = document.createElement("img");
      img.src = folderName+one.textContent;
      one.textContent = "";
      one.appendChild(img);
    });
}
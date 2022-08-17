function showImages(idContainer, folderName) {
    let containLabels = document.querySelector(idContainer);
    let allLabels = containLabels.querySelectorAll('label');
    allLabels.forEach(function(one) {
      //console.log(one.textContent);
      const img = document.createElement("img");
      img.src = folderName+one.textContent;
      one.textContent = "";
      one.appendChild(img);
    });

}
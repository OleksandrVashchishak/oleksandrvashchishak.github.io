
 if(document.querySelector('.vacancion_add-container')){
  let bunnerLabel = document.querySelector(".personal__add-bunner-label");
  let leadBunner = document.querySelector(".personal__lead-bunner");


  bunnerLabel.addEventListener("click", getBunnerBlock);
  function getBunnerBlock() {
    leadBunner.classList.toggle("active");
    bunnerLabel.classList.toggle("active");
  }
}

for(let i = 1; i <= 9; i++){
function handleFileSelect(evt) {
  var file = evt.target.files;
  var f = file[0];
  if (!f.type.match("image.*")) {
    alert("Image only please....");
  }
  var reader = new FileReader();
  reader.onload = (function (theFile) {
    return function (e) {
      document.getElementById("filesBtn" + [i]).disabled;
      var span = document.createElement("span");
      span.innerHTML = [
        '<img class="thumb" title="',
        escape(theFile.name),
        '" src="',
        e.target.result,
        '" />',
      ].join("");
      document.getElementById("output" + [i]).insertBefore(span, null);
      document.getElementById("output" + [i]).style.display = "flex";
      document.getElementById("outputSvg" + [i]).style.display = "none";
      document.getElementById("filesBtn" + [i]).disabled = true;
     
    };
  })(f);
  reader.readAsDataURL(f);
}
let files = document.getElementById("files" + [i]);
files.addEventListener("change", handleFileSelect, false);
let outputs = document.getElementById("output"  + [i]);
outputs.style.display = "none";
let filesBtn = document.getElementById("filesBtn" + [i])

if(document.querySelector('.editingImgLoad' + [i])){
  document.getElementById("output" + [i]).style.display = "flex";
  document.getElementById("outputSvg" + [i]).style.display = "none";
  document.getElementById("filesBtn" + [i]).disabled = true;
}
document.getElementById("delatePhotoPersonal" + [i]).addEventListener("click", delateDataImg);
function delateDataImg() {
  filesBtn.disabled = true
  files.value = "";
  document.getElementById("outputSvg" + [i]).style.display = "block";
  outputs.children[2].remove();
  outputs.style.display = "none";
  setTimeout(() => (filesBtn.disabled = false), 100);
  
}
document.getElementById("editPhotoPersonal"  + [i]).addEventListener("click", editDataImg);
function editDataImg() {
  filesBtn.disabled = false
}
  }


 
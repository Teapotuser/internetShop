/* let uploadButton = document.getElementById("upload-button");
let chosenImage = document.getElementById("chosen-image");
let fileName = document.getElementById("file-name"); */

/* var alert = document.querySelector(".alert");
var closeAlertButton = document.getElementById("close-alert-button"); */

/* if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
}else{
    ready();
};

function ready(){
      document.addEventListener('DOMContentLoaded', function () {
        setTimeout(function(){
            alert.classList.remove("show");
            alert.classList.add("hide");
          },5000);       
}, false)}  */

if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
}else{
    ready();
}

function ready() {
    let alertContainer = document.querySelector(".alert-container");
    let alert = document.querySelector(".alert");
    let closeAlertButton = document.querySelector(".alert .close-btn");
    // let closeAlertButton = document.getElementById("close-alert-button");
    closeAlertButton.onclick = () => {
        alert.classList.remove("show");
        alert.classList.add("hide");
        setTimeout(function(){
            alertContainer.style.height = "0px";
        },1100);
        // alert.classList.remove("showAlert");
    }
    setTimeout(function(){
        alert.classList.remove("show");
        alert.classList.add("hide");
        setTimeout(function(){
            alertContainer.style.height = "0px";
        },1100);
    },5000);
    
}

/* uploadButton.onchange = () => {
    let reader = new FileReader();
    reader.readAsDataURL(uploadButton.files[0]);
    reader.onload = () => {
        chosenImage.setAttribute("src",reader.result);
    }
    fileName.textContent = uploadButton.files[0].name;
	
	clearButton.classList.remove("hidden");
} */
/* 
closeAlertButton.onclick = () => {
	alert.classList.remove("show");
    alert.classList.add("hide");    
}; */


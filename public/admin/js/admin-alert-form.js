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
   /*  setTimeout(function(){
        alert.classList.remove("show");
        alert.classList.add("hide");
        setTimeout(function(){
            alertContainer.style.height = "0px";
        },1100);
    },5000); */
    // 
}
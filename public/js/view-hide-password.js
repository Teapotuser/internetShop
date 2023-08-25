let hideViewPasswordButtons= document.querySelectorAll('.view-password-button');

for (let i = 0; i < hideViewPasswordButtons.length; i++) {
    let hideViewPasswordButton = hideViewPasswordButtons[i];
    hideViewPasswordButton.addEventListener('click', hideViewPasswordButtonClicked);
}

function hideViewPasswordButtonClicked(event) {
    // event.preventDefault();
    let button = event.target;

    let parentDiv;
    parentDiv = button;
    let parentClass;
    //Цикл чтобы в svg кликнуть любой path и Корзина не исчезала
    do{
        parentDiv = parentDiv.parentNode; /* button.parentElement; */
        // console.log(parentDiv);
        parentClass = parentDiv.classList;
    }while(!(parentClass.contains("password-input-wrapper")));
    // console.log(parentDiv);

    // let parentDiv = button.parentElement;
    let inputPassword = parentDiv.getElementsByClassName('password-field')[0];
    let icon = parentDiv.getElementsByClassName('view-password-icon')[0];

    /* console.log(inputPassword);
    console.log(icon); */

    if (inputPassword.type == "password"){
        inputPassword.type = "text";
        icon.setAttribute("src", "/images/noun-view-5783158-pink.svg");
    } else{
        inputPassword.type = "password";
        icon.setAttribute("src", "/images/noun-hide-5783163-grey.svg");
    }

}


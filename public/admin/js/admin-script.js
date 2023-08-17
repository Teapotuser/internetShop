const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      // searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


/* if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
}else{
    ready();
};

function ready(){

      document.addEventListener('DOMContentLoaded', function () {
        if(body.classList.contains("dark")){
            modeText.innerText = "Light mode";            
        }else{
            modeText.innerText = "Dark mode";            
        }
       
}, false); */


// will be called whenever window size changes
// закрыть и задизэйблить левую панель на мобильном устройстве
window.addEventListener('resize', function() {
	// viewport and full window dimensions will change	
	var viewport_width = window.innerWidth;
	// var viewport_height = window.innerHeight;
    if (viewport_width < 900){
        if(!sidebar.classList.contains("close")){
            sidebar.classList.add("close");
            toggle.style.pointer="none";       
        }
    }
});

toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

/* searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
}) */

/* modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
        localStorage.setItem('darkMode', 1);
    }else{
        modeText.innerText = "Dark mode";
        localStorage.removeItem('darkMode');
    }
}); */

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    // console.warn('switch');
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
        document.cookie='display_Mode = dark; path=/; max-age=1209600;';
    }else{
        modeText.innerText = "Dark mode";
        document.cookie='display_Mode = light; path=/; max-age=0;';
    }
});
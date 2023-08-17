//Search поля
let searchInput = document.querySelector('.search-field'); // поле ввода search
let searchResults = document.querySelector('.search-results-list'); // список результатов поиска
let noResults = document.querySelector('.search-li-not-found'); // li ничего не найдено

//Search Working JS
if (document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready);
} else{
    ready();
};

//Making Function
function ready(){   
    searchInput.addEventListener('input', showSearchResult); // вместо события keyup  
};


async function showSearchResult(event) {
    event.preventDefault();
    var searchField = event.target;
    var inputText = searchField.value.trim();
    let params = { method: 'post'  };
    
    if (inputText.length >= 3){
        //.value.toLowerCase();
        let myResponse = await fetch("/search?sSearch=Jolly");
        // const jsonData = await resp.json();
        searchResults.innerHTML = await myResponse.text();
        searchResults.classList.remove("hide-search-results");


        if (inputText == "000"){
            //вывод "Не найдено"
            searchResults.classList.remove("hide-search-results");
            noResults.classList.remove("hide-search-results");
        }
        else{
        searchResults.classList.remove("hide-search-results");
        }
    }
    else{
        searchResults.innerHTML = ''; 
        searchResults.classList.add("hide-search-results");
    }
}


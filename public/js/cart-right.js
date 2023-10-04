//Cart
let cartIcon = document.querySelector('.basket'); // icon Basket with items counter
let cartOverlay = document.querySelector('.cart-right-overlay'); //серый фон на сайт при открытой корзине
let cart = document.querySelector('.cart-right');
let closeCart = document.querySelector('.cart-close');

let clearCart = document.querySelector('.btn-clear-cart');
let clearCartInCart = document.querySelector('.main-cart-clear-cart'); // Очистить корзину в cart.blade.php
let cartItemsCounter = document.querySelector('.cart-items-counter'); // Счетчик желтый около корзины
let itemsInCart = []; //cart
// let cartItemObject = {}; // товар в корзине


async function getCartFromServer() {
    // let response = fetch(`/api/getCart/`).then(response=>response.json()).then(json=>);
    // let response = await fetch(`/getCart/`);
    let response = await fetch(`/getCart`);
    let result = await response.json();
    itemsInCart = result.cart ? result.cart : [];
    rePrintCart();
}


//Open Cart
cartIcon.onclick = () => {
    cartOverlay.classList.add("transparentBcg");
    cart.classList.add("active");

    // document.body.classList.toggle('_lock');
    document.body.classList.add('_lock');
};
//Close Cart
closeCart.onclick = () => {
    cartOverlay.classList.remove("transparentBcg");
    cart.classList.remove("active");

    document.body.classList.remove('_lock');
};
cartOverlay.onclick = (event) => {
    if (event.target.className === 'cart-right-overlay transparentBcg') {
        cartOverlay.classList.remove("transparentBcg");
        cart.classList.remove("active");

        document.body.classList.remove('_lock');
    }
};

//Cart Working JS
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function init_buttons() {
    let removeCartButtons = document.getElementsByClassName('cart-remove'); // Кнопка с Мусоркой для удаления строки: в cart right (header.blade.php) и cart.blade.php
    for (let i = 0; i < removeCartButtons.length; i++) {
        let button = removeCartButtons[i];
        button.addEventListener('click', removeCartItem);
    }
    //Quantity Changes
    let quantityInputs = document.getElementsByClassName('cart-quantity'); // Quantity поле: в cart right (header.blade.php) и cart.blade.php
    for (let i = 0; i < quantityInputs.length; i++) {
        let input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    let cart_minus_quantity = document.getElementsByClassName('cart-minus-quantity'); // Кнопка уменьшить Quantity: в cart right (header.blade.php) и cart.blade.php
    for (let i = 0; i < cart_minus_quantity.length; i++) {
        let input = cart_minus_quantity[i];
        input.addEventListener('click', changeQuantity);
    }

    let cart_plus_quantity = document.getElementsByClassName('cart-plus-quantity'); // Кнопка увеличить Quantity: в cart right (header.blade.php) и cart.blade.php
    for (let i = 0; i < cart_plus_quantity.length; i++) {
        let input = cart_plus_quantity[i];
        input.addEventListener('click', changeQuantity);
    }

    let add_buttons = document.getElementsByClassName('add-cart'); // Кнопка В корзину
    for (let i = 0; i < add_buttons.length; i++) {
        let id = add_buttons[i].dataset.id;
        // console.log(id)
        // console.log(itemsInCart);
        let in_cart = itemsInCart.filter(function (item) {
            return item.id === id;
        })
        // console.log(in_cart);
        if (in_cart.length === 0) {
            enableButtonAfterRemove(add_buttons[i]);
        }

    }
}

// Making Function
function ready() {
    // if (typeof itemsInCart !== 'undefined') {
    //
    // }

    getCartFromServer().then(
        function () {
            //Add to Cart
            let addCart = document.getElementsByClassName('add-cart'); // Кнопка 'В корзину' в галерее товаров
            for (let i = 0; i < addCart.length; i++) {
                let button = addCart[i];
                let id = button.dataset.id; //взять Артикул товара из аттрибута data-id кнопки .add-cart
                if (itemsInCart && itemsInCart.length > 0) {
                    let in_cart = itemsInCart.filter(function (item) {
                        return item.id === id;
                    })
                    if (in_cart.length > 0) {
                        blockButtonAfterAdd(button);
                    }
                }
                button.addEventListener("click", addCartClicked);
            }
        }
    );


    init_buttons();


    //Buy Button Work
    // document.getElementsByClassName('btn-buy')[0].addEventListener('click', buyButtonClicked);
    //Clear Cart Button Work
    clearCart.addEventListener('click', clearCartButtonClicked);
    if (clearCartInCart) {
        clearCartInCart.addEventListener('click', clearCartButtonClicked);
    }

}

function blockButtonAfterAdd(button) {
// Задизэйблить кнопку "В корзину" для добавленного товара
    button.innerText = "Добавлен";
    button.disabled = true;
    button.classList.add('disabled');
}

function enableButtonAfterRemove(button) {
    // Раздизэйблить кнопку "В корзину" для удаленного из корзины товара
    button.innerText = "В корзину";
    button.disabled = false;
    button.classList.remove('disabled');
    }

//Buy Button
function buyButtonClicked() {
    alert("Ваш заказ успешно оформлен");
    let cartContent = document.getElementsByClassName('cart-right-content')[0]; //Контейнер cart right (header.blade.php) для строк отобранных товаров
    while (cartContent.hasChildNodes()) {
        cartContent.removeChild(cartContent.firstChild);
    }
    updateTotal();
}

//Clear Cart Button
async function clearCartButtonClicked() {
    let response = await fetch(`/clearCart/`);
    let result = await response.json();
    if (response.status !== 200) {
        alert(result.message);
        return false;
    }
    // Присваиваем корзине значение соответствующее значению в нашей сессии;
    itemsInCart = result.cart;
    rePrintCart();
    return;

    //
    // // alert("Ваша корзина пуста");
    // var cartContent = document.getElementsByClassName('cart-right-content')[0];
    // while (cartContent.hasChildNodes()) {
    //     cartContent.removeChild(cartContent.firstChild);
    // }
    // updateTotal();
    // // массив id товаров в корзине
    // let cartItems = itemsInCart.map(function (element) {
    //     return element.id;
    // });
    // //обновление кнопок "Add to Cart"
    // var addCart = document.getElementsByClassName('add-cart');
    // for (var i = 0; i < addCart.length; i++) {
    //     var button = addCart[i];
    //     //Проверка что товар уже был положен в корзину
    //     var id = button.dataset.id; //взять Артикул товара из аттрибута data-id кнопки .add-cart
    //     // console.log(id);
    //     var inCart = itemsInCart.find(function (element) {
    //         return element.id === id;
    //     });
    //     // console.log(inCart);
    //     // Раздизэйблить кнопки "В корзину"
    //     if (inCart) {
    //         button.innerText = "В корзину";
    //         button.disabled = false;
    //         button.classList.remove('disabled');
    //     }
    // }
    // //Обнуление массива товаров в корзине
    // itemsInCart = [];
    // // console.log(itemsInCart);
    // // Добавление содержимого корзины в localStorage
    // saveCartInLocalStorage(itemsInCart);
    // // localStorage.removeItem('myNICIcart');
    // //Пересчет счетчика товаров
    // updateCartCounter(itemsInCart);
    //
    // /*   cartItems.forEach(function(element) {
    //       removeCartItemClearButton(id);
    //   }); */
}

//Clear Cart
function removeCartItemClearButton(id) {
    itemsInCart = itemsInCart.filter(function (element) {
        return element.id !== id;
    });
}


//Remove items from the cart
async function removeCartItem(event) {
    let buttonClicked = event.target;
    event.preventDefault();
    let id = buttonClicked.dataset.id; //взять Артикул товара из аттрибута data-id кнопки .add-cart
    let response = await fetch(`/removeFromCart/${id}`);
    let result = await response.json();
    if (response.status !== 200) {
        alert(result.message);
        return false;
    }
    // Присваиваем корзине значение соответствующее значению в нашей сессии;
    itemsInCart = result.cart;
    rePrintCart();
    // enableButtonAfterRemove(button); я добавила
}

//Quantity Changes
async function quantityChanged(event) {
    event.preventDefault();
    let input = event.target;


    let response = await fetch(`/updateProductInCart/${input.dataset.id}/${input.value}`);

    let result = await response.json();
    if (response.status !== 200) {
        alert(result.message);
        return false;
    }
    // Присваиваем корзине значение соответствующее значению в нашей сессии;
    itemsInCart = result.cart;
    rePrintCart()
}


//Plus\Minus button изменяет Quantity
function changeQuantity(event) {
    // console.warn(event);
    event.preventDefault();
    let button = event.target;
    // console.log(button);
    let id = button.dataset.id; //взять Артикул товара из аттрибута data-id кнопки .add-cartvar id = button.dataset.id;
    //Вернуть элемент массива с id
    let tempItem = itemsInCart.find(function (element) {
        return element.id == id;
    })
    if (tempItem) {
        if (button.dataset.actiontype === 'plus') {
            tempItem.quantity = parseInt(tempItem.quantity) + 1;
            if (isNaN(tempItem.quantity) || tempItem.quantity <= 0) {
                button.previousElementSibling.value = 1;
                tempItem.quantity = 1;
            } else {
                button.previousElementSibling.value = tempItem.quantity;
            }
        } else {
            tempItem.quantity = parseInt(tempItem.quantity) - 1;
            if (isNaN(tempItem.quantity) || tempItem.quantity <= 1) {
                button.nextElementSibling.value = 1;
                tempItem.quantity = 1;
            } else {
                button.nextElementSibling.value = tempItem.quantity;
            }
        }
        // отправляем запрос на обновление данных на сервере 
        fetch(`/updateProductInCart/${id}/${tempItem.quantity}`);
        rePrintCart()
    } else {
        if (button.dataset.actiontype === 'plus') {
            button.previousElementSibling.value = parseInt(button.previousElementSibling.value)+1;
        } else {
            // button.nextElementSibling.value = parseInt(button.nextElementSibling.value)-1;
            let tempValue = parseInt(button.nextElementSibling.value) - 1
            if (isNaN(tempValue) || tempValue <= 1) {
                button.nextElementSibling.value = 1;
            } else {
                button.nextElementSibling.value = tempValue;
            }
        }
    }
}

//Add to Cart
function addCartClicked(event) {
    event.preventDefault();
    let button = event.target;
    let id = button.dataset.id; //взять Артикул товара из аттрибута data-id кнопки .add-cart var id = button.dataset.id;
    let formWithButton = button.parentElement; //кнопка .add-cart теперь обернута в форму
    let shopProducts = formWithButton.parentElement;
    if (shopProducts.getElementsByClassName('cart-quantity').length) {
        quantity = shopProducts.getElementsByClassName('cart-quantity')[0].value;
    } else {
        quantity = 1;
    }
    // console.log(shopProducts)
    /* if (shopProducts.classList.contains('img_block')) {
        aTitle = shopProducts.getElementsByClassName('link-img-product')[0];
        title = aTitle.getElementsByClassName('name-product')[0].innerText; */
        // console.log(title);

       /*  divPrice = shopProducts.getElementsByClassName('price-product')[0];
        finalPrice = divPrice.getElementsByClassName('final-price-product')[0];
        price = finalPrice.getElementsByClassName('final-price-product-amount')[0].innerText; */
        // console.log(price);

       /*  divProductImg = aTitle.getElementsByClassName('img-product')[0];
        productImg = divProductImg.getElementsByClassName('img')[0].src;
    } else {
        title = document.getElementsByClassName('product-name')[0].innerText;
        price = document.getElementsByClassName('final-price-product-amount')[0].innerText;
        productImg = document.getElementById('slick-slide00').getElementsByClassName('slider-img')[0].src;
    } */

    // console.log(productImg);
    // console.log(id, title, price, productImg, button);
    // addProductToCart(id, title, quantity, price, productImg, button);
    addProductToCart(id, quantity, button);
}

//Вывод в правую панель корзины
// async function addProductToCart(id, title, quantity, price, productImg, button) {
async function addProductToCart(id, quantity, button) {
    let response = await fetch(`/addToCart/${id}/${quantity}`);
    let result = await response.json();
    if (response.status !== 200) {
        alert(result.message);
        return false;
    }
    // console.log(result.cart);
    // Присваиваем корзине значение соответствующее значению в нашей сессии;
    itemsInCart = result.cart;
    // перерисовываем корзину
    rePrintCart();
    // РОМАН: Открывает правую панель корзины при добавлении товара в корзину
    cartOverlay.classList.add("transparentBcg");
    cart.classList.add("active");

    blockButtonAfterAdd(button);
}

function rePrintCart() {
    var cartItems = document.getElementsByClassName("cart-right-content")[0]; //Контейнер cart right (header.blade.php) для строк отобранных товаров
    var cartItemsMain = document.getElementsByClassName("main-cart-row-footer")[0]; //Строка Итого в cart.blade.php, назвал класс Даниил
    if (cartItemsMain) {
        let printed_items = document.getElementsByClassName('main-cart-row-product');
        for (let i = printed_items.length - 1; i >= 0; --i) {
            printed_items[i].remove();
        }
    }
    cartItems.innerHTML = '';
    itemsInCart.forEach(function (item, key) {
        let cartShopBox = document.createElement("div");
        cartShopBox.classList.add("cart-right-box"); // Одна строка с отобранным товаром в cart right (header.blade.php)
        cartShopBox.innerHTML = `
            <img src="${item.picture}" alt="" class="cart-img">
            <div class="detail-box">
                <div class="cart-product-title">${item.name}</div>
                <div class="cart-price">
                    <span class="cart-price-amount">${item.price}</span>
                    <span class="cart-price-currency"> р.</span>
                </div>
                <form action="" method="post" class="">
                    <div class="cart-quantity-controls">
                        <button class="cart-minus-quantity" data-actionType="minus" data-id="${item.id}">-</button>
                        <input type="number" value="${item.quantity}" class="cart-quantity" data-id="${item.id}">
                        <button class="cart-plus-quantity" data-actionType="plus" data-id="${item.id}">+</button>
                    </div>
                </form>
            </div>
            <!--Remove cart-->
            <form action="" method="post" class="">
                <button class="cart-remove" data-id="${item.id}"></button>
            </form>`;
        cartItems.append(cartShopBox);

        if (cartItemsMain) {
            let cartShopBox = document.createElement("div");
            cartShopBox.classList.add("main-cart-row");
            cartShopBox.classList.add("main-cart-row-product");
            cartShopBox.innerHTML = `
                <div class="main-cart-itemimage-container main-cart-not-column" data-set="50%">
                    <div class="main-cart-image main-cart-column">
                        <a href="${item.url}"><img src="${item.picture}" alt="" class="main-cart-img"></a>
                    </div>
                    <div class="main-cart-item main-cart-column">
                        <a href="${item.url}" class="main-cart-title">${item.name}</a>
                        <div>Артикул: ${item.id}</div>
                        <div>Размер: ${item.size} см</div>
                    </div>
                </div>
                <div class="main-cart-priceqtysum-container main-cart-not-column" data-set="50%">
                    <div class="main-cart-hide main-cart-column"></div>
                    <div class="main-cart-quantity main-cart-column">
                        <p class="main-cart-header-hide">Количество</p>
                        <div class="cart-quantity-controls">
                            <button class="cart-minus-quantity" data-actionType="minus" data-id="${item.id}">-</button>
                            <input type="number" value="${item.quantity}" class="cart-quantity" data-id="${item.id}">
                            <button class="cart-plus-quantity" data-actionType="plus" data-id="${item.id}">+</button>
                        </div>
                    </div>
                    <div class="main-cart-price main-cart-column">
                        <div class="cart-price">
                        <p class="main-cart-header-hide">Цена</p>
                        <p>${item.price} р.</p>
                    </div>
                    </div>
                    <div class="main-cart-sum main-cart-column">
                        <p class="main-cart-header-hide">Сумма</p>
                        <span>${(item.price * item.quantity).toFixed(2)}</span><span> р.</span>
                    </div>
                    <div class="main-cart-delete main-cart-column"></div>
                </div>
                <div class="main-cart-remove">
                    <form action="" method="post" class="">
                        <button class="cart-remove" data-id="${item.id}"></button>
                    </form>
                </div>`;
            cartItemsMain.before(cartShopBox);
        }
    })

    updateCartCounter(itemsInCart);
    updateTotal();
    init_buttons();
}

//Update Total
function updateTotal() {
    var cartContent = document.getElementsByClassName('cart-right-content')[0]; //Контейнер cart right (header.blade.php) для строк отобранных товаров
    var cartBoxes = cartContent.getElementsByClassName('cart-right-box'); // Одна строка с отобранным товаром в cart right (header.blade.php)
    var total = 0;
    for (var i = 0; i < cartBoxes.length; i++) {
        var cartBox = cartBoxes[i];
        var priceElement = cartBox.getElementsByClassName('cart-price')[0];
        // console.log(priceElement);
        var price = priceElement.getElementsByClassName('cart-price-amount')[0].innerHTML;
        // console.log(price);
        var quantityElement = cartBox.getElementsByClassName('cart-quantity')[0];
        // var price = parseFloat(priceElement.innerText.replace(" р.", ""));
        var quantity = quantityElement.value;
        total = total + (price * quantity);
    }
    //If Price contains some Cents value
    total = Math.round(total * 100) / 100;

    document.getElementsByClassName('total-price')[0].innerText = total + " р."; // Итого сумма в cart right (header.blade.php)
    if (document.getElementsByClassName('main-cart-total-price')[0]) {
        document.getElementsByClassName('main-cart-total-price')[0].innerText = total + " р."; // Итого сумма в cart.blade.php
    }

}

//Пересчет счетчика товаров
function updateCartCounter(cart) {
    let itemsCounter = 0;
    cart.map(function (element) {
        return itemsCounter += parseInt(element.quantity);
    });
    cartItemsCounter.innerText = itemsCounter;
}


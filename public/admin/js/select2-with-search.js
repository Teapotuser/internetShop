$(document).ready(function() {
  var $productsSelect = $('.js-example-basic-single').select2({
    placeholder: 'Выберите товар ...',
    allowClear: true,
    width: '100%',
    templateResult: formatState
  });

  var $usersSelect = $('.select2-users').select2({
    placeholder: 'Выберите пользователя ...', 
    allowClear: true, 
    width: '100%'
  });  
  
  $(document).on('click', '#add-orderitem-to-order-button', function () {
      var data = $('.js-example-basic-single').select2('data')[0];
      // console.log(data);
      appendToCart(data.id,data.element.dataset.articul, data.text, data.element.dataset.price, data.element.dataset.picture, data.element.dataset.size, data.element.dataset.url);
      $productsSelect.val(null).trigger('change');
      recountTotal();

  })
  $usersSelect.on('select2:unselect, select2:clear',function (e) {
    $('#name').val('').removeAttr('disabled');
    $('#last_name').val('').removeAttr('disabled');
    $('#email').val('').removeAttr('disabled');
    $('#phone_number').val('').removeAttr('disabled');
  })

  $usersSelect.on('select2:select',function (e) {
    // console.log(e);
    let data = e.params.data;
    let elementDataSet = e.params.data.element.dataset;
    $('#name').val(elementDataSet.name).attr('disabled',true);
    $('#last_name').val(elementDataSet.last_name).attr('disabled',true);
    $('#email').val(elementDataSet.email).attr('disabled',true);
    $('#phone_number').val(elementDataSet.phone_number).attr('disabled',true);
  })

});

function recountTotal() {
  var price = 0;
  var total_items = 0;
  $('.itemRow').each(function (index, item) {
      // console.log(item, $(item).find('.orderitem-price-column span').text(), $(item).find('.orderitem-sum-column span'))
      let currentItemPrice = parseFloat(
          $(item).find('.orderitem-price-column span').text()
      ) * parseInt($(item).find('.admin-orderitem-quantity').val());
      price = price + currentItemPrice;
      total_items = total_items + parseInt($(item).find('.admin-orderitem-quantity').val());
      $(item).find('.orderitem-sum-column span').text(currentItemPrice)
  });
  $('.orderitem-total-sum-column span').text(price);
  $('#order_total').val(price);
  $('.orderitem-total-quantity-column span').text(total_items);
  $('#orderitems_count').val(total_items);
}

function removeOrderItem() {
  $(this).parents('itemRow').remove();
  recountTotal();
}

$(document).on('click', '.admin-orderitem-minus-quantity, .admin-orderitem-plus-quantity', function () {
  let $quantity_input = $(this).parents('.admin-orderitem-quantity-controls').find('.admin-orderitem-quantity');
  let current_val = parseInt($quantity_input.val());
  if ($(this).hasClass('admin-orderitem-minus-quantity')) {
      if (current_val - 1 >= 1) {
          $quantity_input.val(current_val - 1);
      }
  } else {
      $quantity_input.val(current_val + 1);
  }
  recountTotal();
})

function appendToCart(id,articul, title, price, picture, size, url) {
  console.log(articul, title, price, picture, url)
  var card =
      `<div class="account-card list itemRow">
          <div class="account-card-item orderitem-image-column orderitem">
              <p class="card-mobile-text">Изображение</p>
              <div class="account admin-table-img-container">
                  <img class="admin-table-img" src="${picture}" alt="">
              </div>
          </div>
          <div class="account-card-item orderitem-title-column orderitem">
              <p class="card-mobile-text">Название</p>
              <p class="account">${title}</p>
              <p class="account orderitem">Артикул: ${articul}</p>
              <p class="account orderitem">Размер: ${size} см</p>
          </div>
          <div class="account-card-item orderitem-quantity-column orderitem">
              <p class="card-mobile-text">Количество</p>
              <p class="account">
              <div class="admin-orderitem-quantity-controls">
                  <button class="admin-orderitem-minus-quantity" data-id="${articul}">-</button>
                  <input type="hidden" form="order-form" value="${id}" name="products[]">
                  <input type="number" form="order-form" value="1" class="admin-orderitem-quantity"
                          name="quantity[]
                         data-id="${articul}">
                  <button class="admin-orderitem-plus-quantity" data-id="${articul}">+</button>
              </div>
              </p>
          </div>
          <div class="account-card-item orderitem-price-column orderitem">
              <p class="card-mobile-text">Цена</p>
              <p class="account"><span>${price}</span> р.</p>
          </div>
          <div class="account-card-item orderitem-sum-column orderitem">
              <p class="card-mobile-text">Сумма</p>
              <p class="account"><span>${price}</span> р.</p>
          </div>

          <div class="account-card-item orderitem-actions-column orderitem">
              <p class="card-mobile-text">Действие</p>
              <div class="account">
                  <div class="wrapper-icon">
                      <button class="admin-action-ahref orderitem removeOrderItem">
                          <div class="btn-delete"></div>
                      </button>
                  </div>
              </div>
          </div>
      </div>`

  $('.list.orderitem-total').before(card);
}


function formatState (state) {
    if (!state.id) {
      return state.text;
    }
    // var baseUrl = "D:/OpenServer_543/domains/blog/public/admin/images";
    var $state = $(
    //   '<span><img src="' + baseUrl + '/' + state.element.value.toLowerCase() + '.png" class="img-flag" /> ' + state.text + '</span>'
    // '<span><img src="' + baseUrl + '/' + 48531_01_200_200 + '.jpg" class="img-flag" /> ' + state.text + '</span>'
    // '<span><img src="' + baseUrl + '/' + 'logo' + '.png" class="img-flag" /> ' + state.text + '</span>'
    '<span><img src="' + state.element.dataset.picture + '" class="img-flag" /> ' + state.text + '</span>');
    // );
    return $state;
  };
var register_checkbox = document.querySelector("#create-account"); //checkbox "Р—Р°СЂРµРіРёСЃС‚СЂРёСЂРѕРІР°С‚СЊ Р°РєРєР°СѓРЅС‚"
var password_fields = document.querySelectorAll(".password");
var password_field_wrappers = document.querySelectorAll(".password-input-wrapper");

var address_inputs = document.querySelectorAll(".delivery-address");
var delivery_radios = document.querySelectorAll('input[type=radio][name="delivery_method"]');
// var delivery_radio_post = document.querySelector("#post");

//РћС‚РѕР±СЂР°Р·РёС‚СЊ РїРѕР»СЏ РїР°СЂРѕР»СЏ РµСЃР»Рё РІС‹Р±СЂР°РЅ checkbox "Р—Р°СЂРµРіРёСЃС‚СЂРёСЂРѕРІР°С‚СЊ Р°РєРєР°СѓРЅС‚"
if (register_checkbox) {
    register_checkbox.addEventListener('change', e => {
        if (register_checkbox.checked) {
			password_field_wrappers.forEach(password_field_wrapper => {
                password_field_wrapper.classList.remove('hidden');                
            });
            password_fields.forEach(password_field => {
                password_field.classList.remove('hidden');
                password_field.required = true;
            });
        } else {
			console.log('hide password_field_wrappers');
			password_field_wrappers.forEach(password_field_wrapper => {
                password_field_wrapper.classList.add('hidden');                
            });
            password_fields.forEach(password_field => {
                password_field.classList.add('hidden');
                password_field.required = false;
            });
        }
    });
}


//РћС‚РѕР±СЂР°Р·РёС‚СЊ РїРѕР»СЏ Р°РґСЂРµСЃР° РµСЃР»Рё РІС‹Р±СЂР°РЅ СЃРїРѕСЃРѕР± РґРѕСЃС‚Р°РІРєРё "РђРґСЂРµСЃРЅР°СЏ РґРѕСЃС‚Р°РІРєР°" radiobutton
delivery_radios.forEach(delivery_radio => delivery_radio.addEventListener('change', e => {
    if (delivery_radio.value === "post") {
        address_inputs.forEach(address_input => address_input.classList.remove('hidden'));
    } else {
        address_inputs.forEach(address_input => address_input.classList.add('hidden'));
        // delivery_radio_post.style.marginBottom = "0px";
    }
    ;
}));

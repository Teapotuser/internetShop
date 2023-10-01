// Полифилл для метода forEach для NodeList
if (window.NodeList && !NodeList.prototype.forEach) {
	NodeList.prototype.forEach = function (callback, thisArg) {
		thisArg = thisArg || window;
		for (var i = 0; i < this.length; i++) {
			callback.call(thisArg, this[i], i, this);
		}
	};
}

document.querySelectorAll('.dropdown').forEach(function (dropDownWrapper) {
	const dropDownBtn = dropDownWrapper.querySelector('.dropdown__button.enabled');
    const dropDownBtnText = dropDownBtn.querySelector('.dropdown__button-text.enabled');
	const dropDownList = dropDownWrapper.querySelector('.dropdown__list');
	const dropDownListItems = dropDownList.querySelectorAll('.dropdown__list-item');
    // const dropDownListItems = dropDownWrapper.querySelectorAll('.dropdown__list-item');
	const dropDownInput = dropDownWrapper.querySelector('.dropdown__input-hidden');

	// Клик по кнопке. Открыть/Закрыть select
	dropDownBtn.addEventListener('click', function (e) {
        e.stopPropagation();
		// Вадим добавил
		/* dropDownList.classList.toggle('dropdown__list--visible');
        this.classList.add('dropdown__button--active'); */
		const current = e.currentTarget;
		if(current.parentElement.classList.contains('dropdown--active')) {
			// console.dir(current.parentElement)
			dropDownBtn.classList.remove('dropdown__button--active');
			dropDownList.classList.remove('dropdown__list--visible');
			dropDownWrapper.classList.remove('dropdown--active');
		} else {
			document.querySelectorAll('.dropdown').forEach(element => {
				if(element.classList.contains('dropdown--active')) {
					element.querySelector('.dropdown__button.enabled').classList.remove('dropdown__button--active');
					element.querySelector('.dropdown__list').classList.remove('dropdown__list--visible');
					element.classList.remove('dropdown--active');
				}
			})
			this.classList.toggle('dropdown__button--active');
			dropDownList.classList.toggle('dropdown__list--visible');
			dropDownWrapper.classList.toggle('dropdown--active');
		}

	});

    // Клик по тексту кнопки. Открыть/Закрыть select
	/* dropDownBtnText.addEventListener('click', function (e) {
        e.stopPropagation();
        dropDownList.classList.toggle('dropdown__list--visible');       
        dropDownBtn.classList.add('dropdown__button--active');        
	}); */

	// Выбор элемента списка. Запомнить выбранное значение. Закрыть дропдаун
	dropDownListItems.forEach(function (listItem) {
		listItem.addEventListener('click', function (e) {
			e.stopPropagation();
			// dropDownBtn.innerText = this.innerText;
            dropDownBtnText.innerText = this.innerText;
			dropDownBtn.focus();
			dropDownInput.value = this.dataset.value;
			dropDownList.classList.remove('dropdown__list--visible');
		});
	});

	// Клик снаружи дропдауна. Закрыть дропдаун
	document.addEventListener('click', function (e) {
		if (e.target !== dropDownBtn || e.target !== dropDownBtnText) {
			dropDownBtn.classList.remove('dropdown__button--active');
			dropDownList.classList.remove('dropdown__list--visible');
			// Вадим добавил
			dropDownWrapper.classList.remove('dropdown--active');
		}
	}); 

	// Нажатие на Tab или Escape. Закрыть дропдаун
	document.addEventListener('keydown', function (e) {
		if (e.key === 'Tab' || e.key === 'Escape') {
			dropDownBtn.classList.remove('dropdown__button--active');
			dropDownList.classList.remove('dropdown__list--visible');
			// Вадим добавил
			dropDownWrapper.classList.remove('dropdown--active');
		}
	});
});

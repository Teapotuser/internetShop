// Полифилл для метода forEach для NodeList
if (window.NodeList && !NodeList.prototype.forEach) {
	NodeList.prototype.forEach = function (callback, thisArg) {
		thisArg = thisArg || window;
		for (var i = 0; i < this.length; i++) {
			callback.call(thisArg, this[i], i, this);
		}
	};
}

document.querySelectorAll('.file-upload-container').forEach(uploadFile);
    
    function uploadFile(fileUploadWrapper, key) {
    // const dropDownBtn = fileUploadWrapper.querySelector('.dropdown__button');

    let uploadButton = fileUploadWrapper.querySelector(".upload-button");
    let chosenImage = fileUploadWrapper.querySelector(".chosen-image");
    let fileName = fileUploadWrapper.querySelector(".file-name");
    let clearButton = fileUploadWrapper.querySelector(".clear-file-button");

    uploadButton.onchange = () => {        
        let reader = new FileReader();
        reader.readAsDataURL(uploadButton.files[0]);
        reader.onload = () => {
            chosenImage.setAttribute("src",reader.result);
        }
        //Имя файла есть только в одиночном file upload, в паре нет
        if(!(fileName === null)){
            fileName.textContent = uploadButton.files[0].name;
        }
        
        clearButton.classList.remove("hidden");
    }

    clearButton.onclick = () => {
        //Даниил добавил
        let type = clearButton.dataset.type;
        let key = clearButton.dataset.key;
        let imageToRemoveUrl = chosenImage.dataset.image;

        chosenImage.setAttribute("src", "/admin/images/Untitled.png");
        //Имя файла есть только в одиночном file upload, в паре нет
        if(!(fileName === null)){
            fileName.textContent = "";
        }
        uploadButton.value="";
        
       /*  if(!(fileUploadWrapper.querySelector('[name="removeImage[0]"]') === null)){
            fileUploadWrapper.querySelector('[name="removeImage[0]"]').value=true;
        }; */
        //Даниил добавил
        if (type === 'preview') {
            fileUploadWrapper.getElementsByClassName('removePreviewImage')[0].value = imageToRemoveUrl;

        } else if (type === 'image') {
            fileUploadWrapper.getElementsByClassName('removeImage')[0].value = imageToRemoveUrl;
        } else {
            if (!(fileUploadWrapper.querySelector('[name="removeImage"]') === null)) {
                fileUploadWrapper.querySelector('[name="removeImage"]').value = imageToRemoveUrl;
            }
        }

        clearButton.classList.add("hidden");
    }

};

let addMoreUploadButton = document.querySelector(".more-file-upload-fields-button");
let addMoreUploadBeforeDiv = document.querySelector(".more-file-upload-pairs-insert-before-div");
/* let countMoreUploadContainerChildren = addMoreUploadContainer.childElementCount;
countMoreUploadContainerChildren = countMoreUploadContainerChildren + 4; */

addMoreUploadButton.onclick = () => {
    let countMoreUploadPairs = document.getElementsByClassName("file-upload-pair-wrapper").length;
    countMoreUploadPairs = countMoreUploadPairs + 1;
    let divPair = document.createElement('div');
    divPair.className = "file-upload-pair-wrapper";
    var divPairContent = `                        
    <div class="file-upload-control">
    <p class="label">Иконка ${countMoreUploadPairs}</p>
    <div class="file-upload-container">
        <figure class="file-upload-preview-image-container">
            <img id="chosen-image" class="chosen-image" src="/admin/images/Untitled.png">
        </figure>

        <input type="file" id="upload-button-${countMoreUploadPairs}1" class="upload-button" accept="image/*" name="preview_path[]">
        <label for="upload-button-${countMoreUploadPairs}1" class="upload-file-label upload-file-label-in-pair">
            <div class="file-upload-icon"></div>        
        </label>
        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
    </div>    
    </div>
    <div class="file-upload-control">
    <p class="label">Изображение ${countMoreUploadPairs}</p>
    <div class="file-upload-container">
        <figure class="file-upload-preview-image-container">
            <img id="chosen-image" class="chosen-image" src="/admin/images/Untitled.png">
            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
        </figure>

        <input type="file" id="upload-button-${countMoreUploadPairs}2" class="upload-button" accept="image/*" name="path[]">
        <label for="upload-button-${countMoreUploadPairs}2" class="upload-file-label upload-file-label-in-pair">
            <div class="file-upload-icon"></div>
            <!-- <span>Загрузить файл</span> -->
        </label>
        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
    </div>
    </div>`;

    divPair.innerHTML = divPairContent;
    addMoreUploadBeforeDiv.before(divPair);

    document.querySelectorAll('.file-upload-container').forEach(uploadFile);
    // console.log(countMoreUploadContainerChildren);
    if (countMoreUploadPairs === 10){
        addMoreUploadButton.classList.add('hidden');
    }
}


$('#saveProducts').on('submit', function (e) {
    let previews = document.getElementsByName('preview_path[]');
    let images = document.getElementsByName('path[]');
    let filled_previews = 0;
    let filled_images = 0;
    // previews.forEach(function (item) {
    //     console.log(item);
    // })
    images.forEach(function (item, index) {
        // console.log(item, index, item.files[0], item.files);
        if (item.files.length > 0) {
            filled_images++;
        }
    })
    previews.forEach(function (item, index) {
        // console.log(item, index, item.files[0], item.files);
        if (item.files.length > 0) {
            filled_previews++;
        }
    })

    if (filled_images !== images.length || filled_previews !== previews.length) {
        e.preventDefault();
        alert("Заполните все изображения");
    }

})
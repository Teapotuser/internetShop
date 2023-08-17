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
    
    function uploadFile(fileUploadWrapper) {
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
        chosenImage.setAttribute("src", "/admin/images/Untitled.png");
        //Имя файла есть только в одиночном file upload, в паре нет
        if(!(fileName === null)){
            fileName.textContent = "";
        }
        uploadButton.value="";
        // console.log(fileUploadWrapper.getElementsByName('removeImage'));
        // fileUploadWrapper.getElementsByName('removeImage')[0].value=true;
        if(!(fileUploadWrapper.querySelector('[name="removeImage[0]"]') === null)){
            fileUploadWrapper.querySelector('[name="removeImage[0]"]').value=true;
        };
        clearButton.classList.add("hidden");
    }

};

let addMoreUploadButton = document.querySelector(".more-file-upload-fields-button");
let addMoreUploadContainer = document.querySelector(".more-file-upload-pairs-container");
/* let countMoreUploadContainerChildren = addMoreUploadContainer.childElementCount;
countMoreUploadContainerChildren = countMoreUploadContainerChildren + 4; */

addMoreUploadButton.onclick = () => {
    let countMoreUploadContainerChildren = addMoreUploadContainer.childElementCount;
    countMoreUploadContainerChildren = countMoreUploadContainerChildren + 4;
    let divPair = document.createElement('div');
    divPair.className = "file-upload-pair-wrapper";
    var divPairContent = `                        
    <div class="file-upload-control">
    <p class="label">Иконка ${countMoreUploadContainerChildren}</p>
    <div class="file-upload-container">
        <figure class="file-upload-preview-image-container">
            <img id="chosen-image" class="chosen-image" src="/admin/images/Untitled.png">
        </figure>

        <input type="file" id="upload-button-${countMoreUploadContainerChildren}1" class="upload-button" accept="image/*" name="preview_path[]">
        <label for="upload-button-${countMoreUploadContainerChildren}1" class="upload-file-label upload-file-label-in-pair">
            <div class="file-upload-icon"></div>        
        </label>
        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
    </div>    
    </div>
    <div class="file-upload-control">
    <p class="label">Изображение ${countMoreUploadContainerChildren}</p>
    <div class="file-upload-container">
        <figure class="file-upload-preview-image-container">
            <img id="chosen-image" class="chosen-image" src="/admin/images/Untitled.png">
            <!-- <figcaption id="file-name" class="file-name"></figcaption> -->
        </figure>

        <input type="file" id="upload-button-${countMoreUploadContainerChildren}2" class="upload-button" accept="image/*" name="path[]">
        <label for="upload-button-${countMoreUploadContainerChildren}2" class="upload-file-label upload-file-label-in-pair">
            <div class="file-upload-icon"></div>
            <!-- <span>Загрузить файл</span> -->
        </label>
        <button type="button" id="clear-file-button" class="clear-file-button clear-file-button-in-pair hidden"></button>                            
    </div>
    </div>`;

    divPair.innerHTML = divPairContent;
    addMoreUploadContainer.append(divPair);

    document.querySelectorAll('.file-upload-container').forEach(uploadFile);
    // console.log(countMoreUploadContainerChildren);
    if (countMoreUploadContainerChildren === 10){
        addMoreUploadButton.classList.add('hidden');
    }
}

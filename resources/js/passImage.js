var imgtag = document.getElementById("image");

async function onFileSelected(event) {
    var selectedFile = event.target.files[0];
    var reader = new FileReader();
    imgtag.title = selectedFile.name;

    reader.onload = function (event) {
        imgtag.src = event.target.result;
    };
    await reader.readAsDataURL(selectedFile);

}

function q(){
    const cropper = new Cropper(imgtag, {
        crop(event) {
            console.log(event.detail.x);
            console.log(event.detail.y);
            console.log(event.detail.width);
            console.log(event.detail.height);
            console.log(event.detail.rotate);
            console.log(event.detail.scaleX);
            console.log(event.detail.scaleY);
        },
    });
}



const title = document.getElementById('title');
const imageBtn = document.getElementById('imagebtn');
const messageS = document.getElementById('message');
const form =  document.getElementById('upload-form');

document.getElementById("upload-btn").addEventListener("click", (event) => {
    event.preventDefault();

    checkUpload();
});

function checkUpload() {
    const titleValue = title.value.trim();
    const imageBtnValue = imageBtn.value.trim();

    if (titleValue === '') {
        setErrorFor("Title cannot be blank");
    } 
    
    if (imageBtnValue === '') {
      setErrorFor("You should choose an image");
    }

    if (titleValue === '' && imageBtnValue === '') {
        setErrorFor("Please choose image and give title");
    } else if (titleValue !== '' && imageBtnValue !== '') {
        form.submit();
    }


}

function setErrorFor(message) {
    messageS.innerHTML = message;
    messageS.style.color = "red";
}

function setSuccessFor(message) {
    messageS.innerHTML = message;
    messageS.style.color = "green";
}
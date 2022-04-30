<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styleaddphoto.css">
    <title>Add Photo</title>
</head>
<body>

<div class="add-photo">
            <h2 id="addht">Add Photo</h2>
            <div class="photo-form">
                <form id="upload-form" action="config/upload-img.php" method="POST" enctype="multipart/form-data">
                <div id="message"></div>
                <label class="label" for="title">Title</label>
                <input id ="title" class="title" type="textbox" name="imgtitle">
                <input type="file" accept="image/*" id="imagebtn" name="imageup">
                <input type="hidden" name="uploadBtn" id="uploadBtn">
                <div id="imagePreview" class="image-preview">
                    <img src="" alt="image preview" class="image-preview__image">
                    <span class="image-preview__default-text">Image preview</span>
                </div>
                </form>
                <div class="addphoto-btn">
                    <button id="upload-btn" name="upload-btn" class="upload-btn" >Upload</button>
                </div>
                <button class="addphoto-btn" id="cancel-btn" >Cancel</button>
            </div>
        </div>
        <script> 
        const imagebtn = document.getElementById("image-btn");
        const previewContainer = document.getElementById("imagePreview");
        const previewImage = previewContainer.querySelector(".image-preview__image");
        const previewDefaulText = previewContainer.querySelector(".image-preview__default-text");

        document.getElementById("imagebtn").addEventListener("change", function() {
            const file = this.files[0];

            if (file) {
                const reader = new FileReader();

                previewDefaulText.style.display = "none";
                previewImage.style.display = "block";

                reader.addEventListener("load", function() {
                    previewImage.setAttribute("src", this.result);
                });

                reader.readAsDataURL(file);
            } else {
                previewDefaulText.style.display = null;
                previewImage.style.display = null;
                previewImage.setAttribute("src", "");
            }

        });

        </script>


        <script>
        document.getElementById("popup").addEventListener("click", function(){
            document.querySelector(".add-photo").style.display = "block";
        })

        document.getElementById("cancel-btn").addEventListener("click", function(){
            document.querySelector(".add-photo").style.display = "none";
            location.reload();
        })
        </script>
<script type="text/javascript" src="js/uploadvalidation.js"></script>
</body>
</html>

<?php

    $id = $article['id'] ?? "";
    $judul = $article['judul'] ?? "";
    $deskripsi = $article['deskripsi'] ?? "";
    $link = $article['link'] ?? ""; 
?>

<a href="index.php?page=admin&module=portfolio"><- Kembali</a>

<br>

<h1>Create / Edit Portfolio</h1>

<br>

<form class="form-data" method="POST" action="index.php?page=admin&module=portfolio&action=addUpdate" enctype="multipart/form-data" onsubmit="return showLoader(event, document.getElementById('btn-simpan-portfolio'));">

    <input type="hidden" name="id" value="<?php if($portfolio != null) { echo $portfolio['id']; } ?>">

    <div class="form-input">
        <label>Judul :</label>
        <input type="text" name="judul" value="<?php if($portfolio != null) { echo $portfolio['judul']; } ?>" required>
    </div>

    <div class="form-input">
        <label>Deskripsi :</label><br>
        <textarea name="deskripsi" rows="6"><?php if($portfolio != null) { echo $portfolio['deskripsi']; } ?></textarea>
    </div>

    <div class="form-input">
        <label>Foto :</label><br>
        <div id="file-upload-1" class="preview_upload_pic" style="display: inline;">
            <div class="btn-upload-img foto-1" id="div-container-upload" onclick="clickUpload(event)">+ Upload</div>
            <input type="file" name="foto-1" data-index="1" onchange="fileUpload(event);" style="display: none;" accept="image/png, image/gif, image/jpeg">
        </div>
        <div id="file-upload-2" class="preview_upload_pic" style="display: inline;">
            <div class="btn-upload-img foto-2" id="div-container-upload" onclick="clickUpload(event)">+ Upload</div>
            <input type="file" name="foto-2" data-index="2" onchange="fileUpload(event);" style="display:none;" accept="image/png, image/gif, image/jpeg">
        </div>
        <div id="file-upload-3" class="preview_upload_pic" style="display: inline;">
            <div class="btn-upload-img foto-3" id="div-container-upload" onclick="clickUpload(event)">+ Upload</div>
            <input type="file" name="foto-3" data-index="3" onchange="fileUpload(event);" style="display:none;" accept="image/png, image/gif, image/jpeg">
        </div> 
    </div>

    <?php

        if($portfolio != null)
        {
            if($portfolio['id'] != null) {
                ?>

                <input type="text" name="deleted_photo">
                <input type="text" name="changed_photo">

                <?php
            }
        }


    ?>

    <div class="form-input">
        <label>Link :</label>
        <input type="text" name="link" value="<?php if($portfolio != null) { echo $portfolio['link']; } ?>">
    </div>

    <button type="submit" class="btn-action-admin" id="btn-simpan-portfolio" style="margin: 10px auto; width:100px;">Simpan</button>
</form>

<script>

    function clickUpload(event) {
        
        let clickedElement = event.target;
        document.querySelector('input[name=' + clickedElement.classList[1] +']').value = '';
        document.querySelector('input[name=' + clickedElement.classList[1] +']').click();

    }

    function fileUpload(event) {

        let dataIndex = event.target.getAttribute('data-index');
        const files = event.target.files;
        const previewContainer = event.target.parentElement;    

        const children1 = previewContainer.children[0];
        const children2 = previewContainer.children[1];

        const changedFotoContainer = document.querySelector('input[name=changed_photo]');
        const judul = document.querySelector('input[name=judul]').value;

        const isItImage = files[0].type.includes('image');

        if(isItImage == true) {
            Array.from(files).forEach((file, index) => {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewItem = document.createElement('div');
                    previewItem.classList.add('preview-upload');

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.alt = 'Image Preview';

                    if(changedFotoContainer != null) {

                        if(changedFotoContainer.value != "") 
                            changedFotoContainer.value += '|';

                        changedFotoContainer.value += (dataIndex-1);
                    }  
                    
                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.textContent = 'X';
                    removeButton.classList.add('remove-preview');
                    removeButton.addEventListener('click', () => {
                        previewItem.replaceWith(children1);
                        children2.value = '';
                    });

                    previewItem.appendChild(img);
                    previewItem.appendChild(removeButton);
                    children1.replaceWith(previewItem);
                };
                reader.readAsDataURL(file);
            });
        }
        else 
        {
            alert("Please upload an image file only");
        }
        
    }

    // function removePhotoInEditMode() {

    //     document.addEventListener("DOMContentLoaded", function() {
    //         const removeBtn = document.getElementsByClassName('remove-preview');
    //         const idPortfolio = document.querySelector('input[name=id]').value;

    //         if(idPortfolio != "") 
    //         {
    //             for (let i = 0 ; i < removeBtn.length; i++) {
    //                 removeBtn[i].addEventListener('click' , () => {
    //                     const imgSrc = document.getElementsByClassName('preview_upload_pic')[i];

    //                     console.log(imgSrc);
    //                 });
    //             }
    //         }
    //     });

    // }

    // removePhotoInEditMode();
    
</script>

<?php

if($portfolio != null) {

    $functionString = <<<FUNC
        function loadImage() {

        const idPortfolio = document.querySelector('input[name=id]').value;
        const deletedFotoContainer = document.querySelector('input[name=deleted_photo]');

        if(idPortfolio != "") 
        {
            const foto = '$portfolio[foto]';

            const fotoArr = foto.split('|');

            if(foto != "") {

                const previewContainer = document.getElementsByClassName('preview_upload_pic');

                for(let i=0; i < fotoArr.length; i++) {
                    const previewContainerItem = document.getElementsByClassName('preview_upload_pic')[i];

                    const children1 = previewContainerItem.children[0];
                    const children2 = previewContainerItem.children[1];

                    const previewItem = document.createElement('div');
                    previewItem.classList.add('preview-upload');

                    const img = document.createElement('img');
                    img.src = fotoArr[i];
                    img.alt = 'Image Preview';

                    const removeButton = document.createElement('button');
                    removeButton.type = 'button';
                    removeButton.textContent = 'X';
                    removeButton.classList.add('remove-preview');
                    removeButton.addEventListener('click', () => {
                    
                        if(deletedFotoContainer.value != "")
                            deletedFotoContainer.value += '|';

                        deletedFotoContainer.value += fotoArr[i];

                        previewItem.replaceWith(children1);
                        children2.value = '';
                    });

                    previewItem.appendChild(img);
                    previewItem.appendChild(removeButton);
                    children1.replaceWith(previewItem);
                }
            }
        }
    }
    loadImage()
    FUNC;

    echo "<script>$functionString</script>";
}
?>
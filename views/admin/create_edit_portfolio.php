<?php

    $id = $article['id'] ?? "";
    $judul = $article['judul'] ?? "";
    $deskripsi = $article['deskripsi'] ?? "";
    $link = $article['link'] ?? ""; 

?>

<a href="index.php?page=admin&module=portfolio"><- Kembali</a>

<br>

<h1>Create New Portfolio</h1>

<br>

<form method="POST" class="form-data" action="index.php?page=admin&module=portfolio&action=addUpdate" enctype="multipart/form-data">

    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="form-input">
        <label>Judul :</label>
        <input type="text" name="judul" value="<?= $judul ?>" required>
    </div>

    <div class="form-input">
        <label>Deskripsi :</label><br>
        <textarea name="deskripsi" rows="6"></textarea>
    </div>

    <div class="form-input">
        <label>Foto :</label><br>
        <div id="file-upload-1" style="display: inline;">
            <div class="btn-upload-img foto-1" id="div-container-upload" onclick="clickUpload(event)">+ Upload</div>
            <input type="file" name="foto-1" onchange="fileUpload();" id="fileInput-1" style="display: none;" accept="image/png, image/gif, image/jpeg">
        </div>
        <div id="file-upload-2" style="display: inline;">
            <div class="btn-upload-img foto-2" id="div-container-upload" onclick="clickUpload(event)">+ Upload</div>
            <input type="file" name="foto-2" onchange="fileUpload();" style="display:none;" id="fileInput" accept="image/png, image/gif, image/jpeg">
        </div>
        <div id="file-upload-3" style="display: inline;">
            <div class="btn-upload-img foto-3" id="div-container-upload" onclick="clickUpload(event)">+ Upload</div>
            <input type="file" name="foto-3" onchange="fileUpload();" style="display:none;" id="fileInput" accept="image/png, image/gif, image/jpeg">
        </div> 
    </div>

    <div class="form-input">
        <label>Link :</label>
        <input type="text" name="link" value="<?= $link ?>">
    </div>

    <button type="submit" class="btn-action-admin" style="margin: 10px auto; width:100px;">Simpan</button>
</form>

<script>

    function clickUpload(event) {
        
        let clickedElement = event.target;
        document.querySelector('input[name=' + clickedElement.classList[1] +']').value = '';
        document.querySelector('input[name=' + clickedElement.classList[1] +']').click();

    }

    function fileUpload() {

        const files = event.target.files;
        const previewContainer = event.target.parentElement;    

        const children1 = previewContainer.children[0];
        const children2 = previewContainer.children[1];

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
    
</script>
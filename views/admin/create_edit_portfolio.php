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
        <textarea name="deskripsi" rowspan="4">
           
        </textarea>
    </div>

    <div class="form-input">
        <label>Foto :</label>
        <div id="file-upload-1" style="display: inline;">
            <div class="btn-upload-img btn-upload-img-1" id="div-container-upload" onclick="clickUpload()">+ Upload</div>
            <input type="file" name="foto" onchange="fileUpload();" id="fileInput" style="display: none;" accept="image/png, image/gif, image/jpeg" multiple>
            <input type="text" name="foto_tmp_name" id="foto_tmp_name">
        </div>
        <div id="form-upload-container" style="display: inline;">
        </div>
        <!-- <div id="file-upload-2" style="display: inline;">
            <div class="btn-upload-img btn-upload-img-2" id="div-container-upload" onclick="clickUpload()">+ Upload</div>
            <input type="file" name="foto-1" style="display:none;" id="fileInput" accept="image/png, image/gif, image/jpeg">
        </div>
        <div id="file-upload-3" style="display: inline;">
            <div class="btn-upload-img btn-upload-img-3" id="div-container-upload" onclick="clickUpload()">+ Upload</div>
            <input type="file" name="foto-1" style="display:none;" id="fileInput" accept="image/png, image/gif, image/jpeg">
        </div> -->
        <div id="container-upload">
        </div>
        <input type="hidden" name="deletedFiles" id="deletedFiles" value="">
    </div>

    <div class="form-input">
        <label>Link :</label>
        <input type="text" name="link" value="<?= $link ?>">
    </div>

    <button type="submit" class="btn-action-admin" style="margin: 10px auto; width:100px;">Simpan</button>
</form>

<script>

    function clickUpload() {
        /*
        const idx = document.querySelectorAll('input[type=file]').length

        document.querySelector(`input[name=foto-${idx}]`).click()
        document.querySelector(`.btn-upload-img-${idx}`).style.display = 'none';

        document.getElementById('form-upload-container').innerHTML += `
           <div class="btn-upload-img btn-upload-img-${idx+1}" id="div-container-upload" onclick="clickUpload()">+ Upload</div>
            <input type="file" name="foto-${idx+1}" style="display:none;" onchange="fileUpload();" id="fileInput" accept="image/png, image/gif, image/jpeg">
        `;
        */
        
        document.querySelector('input[name=foto]').click();

    }

    function fileUpload() {

        const files = event.target.files;
        const previewContainer = document.getElementById('container-upload');
        const deletedFilesInput = document.getElementById('deletedFiles');
        const fileUploadContainer = document.getElementById('foto_tmp_name');
        //const previewContainer = document.getElementById('div-container-upload');

        // Clear existing previews
        // document.getElementById('div-container-upload').classList.remove('btn-upload-img')
        //previewContainer.innerHTML = '';

        Array.from(files).forEach((file, index) => {

            const reader = new FileReader();
            reader.onload = function(e) {
                const previewItem = document.createElement('div');
                previewItem.classList.add('preview-upload');

                const img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'Image Preview';

                //let fileName = files.length == 1 ? file.name : '/' + file.name;
                fileUploadContainer.value += file.name; 
                
                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.textContent = 'X';
                removeButton.classList.add('remove-preview');
                removeButton.addEventListener('click', () => {
                    deletedFilesInput.value += file.name + ',';
                    previewContainer.removeChild(previewItem);

                    fileUploadContainer.value = fileUploadContainer.value.replace(file.name + '/', "");
                });

                previewItem.appendChild(img);
                previewItem.appendChild(removeButton);
                previewContainer.appendChild(previewItem);
            };
            reader.readAsDataURL(file);
        });
        
    }

    // document.getElementsByClassName('btn-upload-img')[0].addEventListener('click', function(event) {
        
    // })

    document.getElementById('fileInput').addEventListener('change', function(event) {

        // const files = event.target.files;
        // const previewContainer = document.getElementById('container-upload');
        // const deletedFilesInput = document.getElementById('deletedFiles');
        // //const previewContainer = document.getElementById('div-container-upload');

        // // Clear existing previews
        // // document.getElementById('div-container-upload').classList.remove('btn-upload-img')
        // previewContainer.innerHTML = '';

        // Array.from(files).forEach((file, index) => {
        //     const reader = new FileReader();
        //     reader.onload = function(e) {
        //         const previewItem = document.createElement('div');
        //         previewItem.classList.add('preview-upload');

        //         const img = document.createElement('img');
        //         img.src = e.target.result;
        //         img.alt = 'Image Preview';
                
        //         const removeButton = document.createElement('button');
        //         removeButton.type = 'button';
        //         removeButton.textContent = 'X';
        //         removeButton.classList.add('remove-preview');
        //         removeButton.addEventListener('click', () => {
        //             deletedFilesInput.value += file.name + ',';
        //             previewContainer.removeChild(previewItem);

        //             if(document.getElementById('container-upload').children.length == 0) {
        //                 // jika kosong
        //                 document.getElementById('div-container-upload').style.display = 'block';
        //             }
        //         });

        //         previewItem.appendChild(img);
        //         previewItem.appendChild(removeButton);
        //         previewContainer.appendChild(previewItem);
        //     };
        //     reader.readAsDataURL(file);
        // });
    })

    // window.addEventListener("click", function(event) {

    //     if(event.target.classList.contains('remove-preview')) {
    //         event.target.parentElement.remove()
    //     }
    // });

    
</script>
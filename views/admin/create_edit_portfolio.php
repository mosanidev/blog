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
        <input type="text" name="judul" value="<?= $judul ?>">
    </div>

    <div class="form-input">
        <label>Deskripsi :</label><br>
        <textarea name="deskripsi" rowspan="4">
           
        </textarea>
    </div>

    <div class="form-input">
        <label>Foto :</label>
        <input type="file" name="foto[]" id="fileInput" accept="image/png, image/gif, image/jpeg" multiple>
        <div id="container-upload">
        </div>
    </div>

    <div class="form-input">
        <label>Link :</label>
        <input type="text" name="link" value="<?= $link ?>">
    </div>

    <button type="submit" class="btn-action-admin" style="margin: 10px auto; width:100px;">Simpan</button>
</form>

<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {

        document.querySelectorAll("#preview-upload img").forEach( function(e) {
            e.remove()
        })

        const files =  event.target.files;
        
        if(files.length > 0) {
            
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                const file = files[i];

                reader.onload = function(e) {
                    document.getElementById('container-upload').innerHTML += "<div class='preview-upload'><img src='" + e.target.result + "'><p>X</p></div>";
                }   

                reader.readAsDataURL(file);
            }
            
        }
    })
</script>
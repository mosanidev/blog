<?php

    $id = $article['id'] ?? "";
    $judul = $article['judul'] ?? "";
    $akses = $article['akses'] ?? "";
    $isi = $article['isi'] ?? "";

?>

<a href="index.php?page=admin&module=article"><- Kembali</a>

<br>

<h1>Create New Article</h1>

<br>

<form method="POST" action="index.php?page=admin&module=article&action=addUpdate" onsubmit="showLoader(event, document.getElementById('btn-simpan-article'))">

    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="form-input">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= $judul ?>">
    </div>

    
    <div class="form-input">
        <label>Akses</label>
        <input type="radio" name="akses" value="Publik" <?php if($akses == "Publik") { echo "checked";} else if($akses == "") { echo "checked"; } ?>>Publik
        <input type="radio" name="akses" value="Privat" <?php if($akses == "Privat") { echo "checked";} ?>>Privat
    </div>

    <div class="form-input">
        <label>Isi</label>
        <textarea id="editor" name="isi" style="height: 900px;">
           <?= $isi ?>
        </textarea>
    </div>

    <button type="submit" class="btn-action-admin" id="btn-simpan-article" style="margin: 10px auto; width:100px;">Simpan</button>
</form>

<script>
     ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
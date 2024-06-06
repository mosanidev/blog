<?php

    $id = $article['id'] ?? "";
    $judul = $article['judul'] ?? "";
    $isi = $article['isi'] ?? "";

?>

<h1>Create New Article</h1>

<br>

<form method="POST" action="index.php?page=admin&module=article&action=addUpdate">

    <input type="hidden" name="id" value="<?= $id ?>">

    <div class="form-input">
        <label>Judul</label>
        <input type="text" name="judul" value="<?= $judul ?>">
    </div>

    <div class="form-input">
        <label>Isi</label>
        <textarea id="editor" name="isi" style="height: 900px;">
           <?= $isi ?>
        </textarea>
    </div>

    <button type="submit" class="btn-action-admin" style="margin: 10px auto; width:100px;">Simpan</button>
</form>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
     ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
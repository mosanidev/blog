<h1>Create New Article</h1>

<br>

<form method="POST" action="">

    <div class="form-input">
        <label>Judul</label>
        <input type="text" name="judul">
    </div>

    <div class="form-input">
        <label>Isi</label>
        <div id="editor">
        </div>
    </div>

</form>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>
<h1>Article</h1>

<br>

<a class="btn-action-admin" href="index.php?page=admin&module=create_edit_article">Create New Article</a>

<br><br>

<table class="table-admin">
    <thead>
        <tr>    
            <th>No</th>
            <th>Judul</th>
            <th>Akses</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>

        <?php
            if($article != null) {
                    $num = 1;

                    for($i = 0; $i < count($article); $i++) {
                        
                ?>
                    <tr>
                        <td width="40" style="text-align: center;"><?= $num; ?></td>
                        <td><?= $article[$i]['judul']; ?></td>
                        <td width="70"><?= $article[$i]['akses']; ?></td>
                        <td width="150" style="text-align: center;"><a class="btn-action-admin" href="index.php?page=admin&module=create_edit_article&id=<?= $article[$i]["id"] ?>">Ubah</a> <a class="btn-action-admin" type="button" onclick="hapus(<?php echo $article[$i]['id']; ?>)">Hapus</a></td>
                    </tr>
                <?php
                     $num++;
                    }
            }
            else {

                ?>
                <tr>
                    <td colspan="3" style="text-align: center;">Kosong</td>
                </tr>

                <?php
            }

        ?>
        
    </tbody>
</table>


<div id="deleteArticle" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <h2>Warning</h2>
        <span class="close">×</span>
    </div>
    <p class="text-warning-delete">Are you sure to delete this ? </p>
    <div class="container-btn-warning-delete">
        <form method="POST" action="index.php?page=admin&module=article&action=delete">
            <input type="hidden" id="deleted_id" name="id">
            <input type='submit' class="btn-yes-delete" value="Yes">
            <button type="button" class="btn-no-delete">No</button>
        </form>
    </div>  
  </div>

</div>

<script>

    document.querySelector("#deleteArticle .close").onclick = function() {
        document.getElementById("deleteArticle").style.display = "none";
    }

    document.querySelector("#deleteArticle .btn-no-delete").onclick = function() {
        document.getElementById("deleteArticle").style.display = "none";
    }

    function hapus(id) {
        
        document.getElementById("deleteArticle").style.display = "block";

        document.querySelector("#deleteArticle #deleted_id").value = id;
    }
 </script>

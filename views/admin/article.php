<h1>Article</h1>

<br>

<a class="btn-action-admin" href="index.php?page=admin&module=create_new_article">Create New Article</a>

<br><br>

<table class="table-admin">
    <thead>
        <tr>    
            <th>No</th>
            <th>Judul</th>
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
                        <td width="40" style="text-align: center;"><?php echo $num; ?></td>
                        <td><?php echo $article[$i]['judul']; ?></td>
                        <td width="150" style="text-align: center;"><a class="btn-action-admin" href="index.php?page=admin&action=edit_article">Ubah</a> <a class="btn-action-admin" href="index.php?page=admin&action=delete_article">Hapus</a></td>
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
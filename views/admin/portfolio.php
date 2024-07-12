<h1>Portfolio</h1>

<br>

<a class="btn-action-admin" href="index.php?page=admin&module=create_edit_portfolio">Create New Portfolio</a>

<br><br>

<table class="table-admin">
    <thead>
        <tr>    
            <th>No</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            if($portfolio != null) {

                $num = 1;

                for($i = 0; $i < count($portfolio); $i++) {
                    
                ?>
                    <tr>
                        <td width="40" style="text-align: center;"><?= $num; ?></td>
                        <td><?= $portfolio[$i]['judul'] ?></td>
                        <td class="deskripsiPortfolio"><?= $portfolio[$i]['deskripsi'] ?></td>
                        <td width="150" style="text-align: center;"><a class="btn-action-admin" href="index.php?page=admin&module=create_edit_portfolio&id=<?= $portfolio[$i]["id"] ?>">Ubah</a> <a class="btn-action-admin" type="button" onclick="hapus(<?php echo $portfolio[$i]['id']; ?>)">Hapus</a></td>
                    </tr>
                <?php
                    $num++;
                }
            }
            else 
            {
                ?>
                <tr>
                    <td colspan="6" style="text-align: center;">Kosong</td>
                </tr>
                <?php
            }
        ?>
        
    </tbody>
</table>

<div id="deletePortfolio" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <h2>Warning</h2>
        <span class="close">×</span>
    </div>
    <p class="text-warning-delete">Are you sure to delete this ? </p>
    <div class="container-btn-warning-delete">
        <form method="POST" action="index.php?page=admin&module=portfolio&action=delete">
            <input type="hidden" id="deleted_id" name="id">
            <input type='submit' class="btn-yes-delete" id="btn-hapus-portfolio" value="Yes">
            <button type="button" class="btn-no-delete">No</button>
        </form>
    </div>  
  </div>

</div>

<script>
    
    function shortenLongText(content, numOfWord) {
        let temp = content.split(" ");
        let shorter = temp.splice(0, numOfWord).join(" ");

        return shorter;
    }

    let deskripsiPortfolio = document.getElementsByClassName('deskripsiPortfolio');

    for(let i = 0; i < deskripsiPortfolio.length; i++) {

        let deskripsiPortfolioContent = deskripsiPortfolio[i].innerText;
        deskripsiPortfolio[i].innerText = shortenLongText(deskripsiPortfolioContent, 10) + '....';
    }

    document.querySelector("#deletePortfolio .close").onclick = function() {
        document.getElementById("deletePortfolio").style.display = "none";
    }

    document.querySelector("#deletePortfolio .btn-no-delete").onclick = function() {
        document.getElementById("deletePortfolio").style.display = "none";
    }

    function hapus(id) {
        
        document.getElementById("deletePortfolio").style.display = "block";

        document.querySelector("#deletePortfolio #deleted_id").value = id;
    }

</script>
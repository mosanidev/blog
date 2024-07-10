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

</script>
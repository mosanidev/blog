<h1>Skill</h1>

<br>

<a type="button" id="btnAddSkill" class="btn-action-admin">Create New Skill</a>

<br><br>

<div class="container-table">
    <table class="table-admin">
        <thead>
            <tr>    
                <th>No</th>
                <th>Skill</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php 
                if($skill != null) {
                        $num = 1;

                        for($i = 0; $i < count($skill); $i++) {
                            
                    ?>
                        <tr>
                            <td width="40" style="text-align: center;"><?php echo $num; ?></td>
                            <td><?php echo $skill[$i]['skill']; ?></td>
                            <td width="150" style="text-align: center;"><a class="btn-action-admin" onclick="edit(<?php echo $skill[$i]['id']; ?>, '<?php echo $skill[$i]['skill']; ?>')" type="button">Ubah</a> <a class="btn-action-admin" type="button" onclick="hapus(<?php echo $skill[$i]['id']; ?>)">Hapus</a></td>
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
 </div>

<div id="createEditSkill" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header">
        <h2>Add / Edit</h2>
        <span class="close">&times;</span>
    </div>
    <form id="formCreateEdit" action="index.php?page=admin&module=skill&action=add" method="POST">
        <input type="hidden" name="id">
        <div class="form-input">
            <label>Skill : </label>
            <input type="text" name="skill">
        </div>
        <input type="submit"/>
    </form>
  </div>

</div>

<script>

    var modalSkill = document.getElementById("createEditSkill")
    var span = document.getElementsByClassName("close")[0]

    document.getElementById("btnAddSkill").onclick = function() {
        document.querySelector('input[name=id]').value = '';
        document.querySelector('input[name=skill]').value = '';

        document.getElementById('formCreateEdit').setAttribute("action", "index.php?page=admin&module=skill&action=add");

        modalSkill.style.display = "block";
    }

    span.onclick = function() {
        modalSkill.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modalSkill) {
            modalSkill.style.display = "none";
        }
    }

    function edit(id, skill) {
        document.querySelector('input[name=id]').value = id;
        document.querySelector('input[name=skill]').value = skill;

        document.getElementById('formCreateEdit').setAttribute("action", "index.php?page=admin&module=skill&action=update");

        modalSkill.style.display = "block";
    }

    function hapus(id) {
        
        document.getElementById('formCreateEdit').setAttribute("action", "index.php?page=admin&module=skill&action=delete");

        document.querySelector('input[name=id]').value = id;
        
        document.getElementById('formCreateEdit').submit();
    }

</script>
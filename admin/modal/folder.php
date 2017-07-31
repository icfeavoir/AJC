<?php
    include('../dev/fonctions.php');
    include('../../dev/db.php');

    check_modal_secure();

    //récupération des dossiers
    $data = $conn->prepare('SELECT * FROM dossier ORDER BY id');
    $data->execute();
?> 


    <div class="input-group">
        <span class="input-group-addon">Créer un nouveau dossier</span>
        <input type="text" class="form-control" id="new_folder" name="title">
        <span class="input-group-addon hover_main" onclick="save_new_folder()">
            <span class="fa fa-1x fa-check text-success"></span>
        </span>
    </div>
    <br/>
    <div class="err_new text-danger"></div>
    <br/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Dossier</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($row = $data->fetch()){
                    echo '<tr>
                        <td>'.$row['id'].'</td>
                        <td class="dossier_nom" id="dossier_'.$row['id'].'">'.$row['nom'].'</td>
                        <td><div class="btn-group"><button type="button" class="btn btn-warning" onclick="update('.$row['id'].')"><span class="fa fa-1x fa-pencil"></span></button><button type="button" class="btn btn-danger" onclick="delete_folder('.$row['id'].')"><span class="fa fa-1x fa-trash"></span></button></div></td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
    <br/>
    <div class="err text-danger"></div>


<script src="js/folder.js"></script>
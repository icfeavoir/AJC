<?php
    include('../dev/fonctions.php');
    include('../../dev/db.php');

    check_modal_secure();


    //récupération des dossiers
    $nombre = $conn->query('SELECT COUNT(*) FROM membre')->fetch();
    $nombre = $nombre[0];
    $nombre_pages = (int)($nombre/5)+($nombre%5==0?0:1);
?> 
    
    <div class="text-center">
        <button onclick="modal_show('new_ajceen', 'Ajout d\'un AJCéen')" class="btn btn-primary"><i class="fa fa-user-plus"></i> Ajouter un AJCéen</button>
    </div>

    <br/><br />
    <div class="err_new text-danger"></div>
    <br/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Prénom</th>
                <th>Nom</th>
                <th>Poste</th>
                <th>Surnom</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    <br/>
    <div class="text-center">
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
                for($i=1; $i<=$nombre_pages; $i++){
                    ?>
                    <li class="page-item hover_main" id="page_<?php echo $i; ?>">
                        <a class="page-link" onclick="change_page(<?php echo $i; ?>, 'membre', 5, 'tbody')"><?php echo $i; ?></a>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </nav>
    </div>

<script src="js/ajceen.js"></script>
<script src="js/fonctions.js"></script>
<script>
    change_page(1, 'membre', 5, 'tbody');
</script>
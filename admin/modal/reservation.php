<?php
    include('../dev/fonctions.php');
    include('../../dev/db.php');

    check_modal_secure();


    //récupération des dossiers
    $nombre = $conn->query('SELECT COUNT(*) FROM reservation')->fetch();
    $nombre = $nombre[0];
    $nombre_pages = (int)($nombre/10)+($nombre%10==0?0:1);

    $total = $conn->query('SELECT SUM(nombre) AS total FROM reservation')->fetch();
    echo '<h4><b>'.$total['total'].' réservations</b></h4>';
?> 

    <div class="text-center">
        <form action="liste_pdf.php" target="_blank">
            <button type="submit" class="btn btn-primary"><i class="fa fa-print"></i> Imprimer la liste</button>
        </form>
    </div>
    <br><br>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Nombre</th>
                <th>Date</th>
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
                        <a class="page-link" onclick="change_page(<?php echo $i; ?>, 'reservation', 10, 'tbody')"><?php echo $i; ?></a>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </nav>
    </div>

<script src="js/fonctions.js"></script>
<script>
    change_page(1, 'reservation', 10, 'tbody');
</script>
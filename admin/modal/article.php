<?php
    include('../dev/fonctions.php');
    include('../../dev/db.php');

    check_modal_secure();

    //récupération des dossiers
    $nombre_articles = $conn->query('SELECT COUNT(*) FROM article')->fetch();
    $nombre_articles = $nombre_articles[0];
    $nombre_pages = (int)($nombre_articles/5)+($nombre_articles%5==0?0:1);
?> 

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de création</th>
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
                        <a class="page-link" onclick="change_page(<?php echo $i; ?>, 'article', 5, 'tbody')"><?php echo $i; ?></a>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </nav>
    </div>


<script src="js/article.js"></script>
<script src="js/fonctions.js"></script>

<script>
    change_page(1, 'article', 5, 'tbody');
</script>
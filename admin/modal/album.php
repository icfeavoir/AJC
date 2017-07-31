<?php
    include('../dev/fonctions.php');
    include('../../dev/db.php');

    check_modal_secure();

    //récupération des dossiers
    $nombre_articles = $conn->query('SELECT COUNT(*) FROM album')->fetch();
    $nombre_articles = $nombre_articles[0];
    $nombre_pages = (int)($nombre_articles/5)+($nombre_articles%5==0?0:1);
?> 
    <form id="form_new_album">
        <div class="input-group">
            <span class="input-group-addon">Créer un nouvel album</span>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            <span class="input-group-addon">URL Google</span>
            <input type="text" class="form-control" id="url" name="url"  placeholder="URL">
        </div>
        <br/>
        <div class="text-center" id="selectImage">
            <label class="btn btn-info btn-file" id="photo">
                <span class="fa fa-picture-o"></span> <span id="text_photo">Photo de couverture de l'album</span> <input id="file" name="file" type="file" style="display: none;" accept="image/jpeg" name="photo" />
                </label><br /><br/>
                <span id="image_preview"><img style="display:none" height="230" id="previewing"/></span><br>
                <button id="submit_new_folder" class="btn btn-primary"><i class="fa fa-plus"></i> Ajouter l'album</button><br/>
                <div id="message" class="text-danger"></div>
        </div>
    </form>
    <br/>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Titre de l'album</th>
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
                        <a class="page-link" onclick="change_page(<?php echo $i; ?>, 'album', 5, 'tbody')"><?php echo $i; ?></a>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </nav>
    </div>


<script src="js/album.js"></script>
<script src="js/fonctions.js"></script>

<script>
    change_page(1, 'album', 5, 'tbody');
</script>
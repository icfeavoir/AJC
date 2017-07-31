<?php
    include('../dev/fonctions.php');
    include('../../dev/db.php');

    check_modal_secure();
    
    //récupération des dossiers
    $data = $conn->prepare('SELECT * FROM dossier ORDER BY id');
    $data->execute();

    $titre = '';
    $dossier = '';
    $article = 'Article...';
    if(isset($_POST['id'])){
        $data_article = $conn->query('SELECT * FROM article WHERE id='.$_POST['id']);
        $row = $data_article->fetch();
        $titre = $row['titre'];
        $dossier = $row['dossier'];
        $article = $row['article'];
    }
?>
<form class="new-article">
    <div class="input-group">
        <span class="input-group-addon">Titre</span>
        <input type="text" class="form-control" id="title" name="title" value="<?php echo $titre; ?>">
    </div>
    <br/>
    <div class="input-group">
        <span class="input-group-addon">Dossier</span>
        <div class="form-group">
            <select class="form-control" id="folder" name="folder">
                <option value="0"> Aucun dossier</option>
                <?php
                    while($row = $data->fetch()){
                        echo '<option value="'.$row['id'].'" '.($row['id']===$dossier?'selected="selected"':'').'> '.$row['nom'].'</option>';
                    }
                ?>
            </select>
        </div>
    </div>

    <br/><br/> 
    <textarea class="mceEditor" id="article"><?php echo $article; ?></textarea>
    <br>
    <div class="container">
        <button type="button" onclick="send()" class="btn btn-success" id="submit_btn">Enregistrer l'article</button>
        <br>
        <div class="err text-danger"></div>
    </div>
</form>

<script type="text/javascript" src="js/new_article.js"></script>
<?php
    if(!isset($_POST['secure_modal'])){
            header('Location: error.php?e=403');
    }

    include('../../dev/db.php');

    //récupération des postes
    $data = $conn->prepare('SELECT * FROM poste ORDER BY id');
    $data->execute();

    $nom = '';
    $prenom = '';
    $date = null;
    $surnom = '';
    $sexe = 0;
    $poste = 0;
    $photo = '';
    if(isset($_POST['id'])){
        $data_article = $conn->query('SELECT * FROM membre WHERE id='.$_POST['id']);
        $row = $data_article->fetch();
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $date = $row['annee'];
        $surnom = $row['surnom'];
        $sexe = $row['sexe'];
        $poste = $row['poste'];
    }
?>
<form id="form_new_ajceen">
    <div class="panel panel-primary">
        <div class="panel-heading">Ajouter un AJCéen</div>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Prénom</span>
                        <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $prenom; ?>">
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Nom</span>
                        <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>">
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br/>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Date de naissance</span>
                        <input type="date" class="form-control" id="annee" name="année" value="<?php echo $date; ?>">
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Surnom</span>
                        <input type="text" class="form-control" id="surnom" name="surnom" value="<?php echo $surnom; ?>">
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br/>
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexe" id="sexe" value="0" <?php echo ($sexe == 0?"checked":"") ?>/>Mec
                            </label>
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="sexe" id="sexe" value="1" <?php echo ($sexe == 1?"checked":"") ?>/>Meuf
                            </label>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1">Poste</span>
                        <div class="form-group">
                            <select class="form-control" id="poste" name="poste">
                                <?php
                                    while($row = $data->fetch()){
                                        echo '<option value="'.$row['id'].'" '.($row['id']===$poste?'selected="selected"':'').'> '.$row['poste'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
            <br/>

            <div class="row text-center">
                <div id="selectImage">
                    <label class="btn btn-info btn-file" id="photo">
                        <span class="fa fa-picture-o"></span> <span id="text_photo">Importer une photo pour ce membre</span> <input id="file" name="file" type="file" style="display: none;" accept="image/jpeg" name="photo" />
                    </label><br /><br/>
                    <span id="image_preview"><img style="display:  <?php echo (isset($_POST['id'])?'inline':'none'); ?>;" height="230" id="previewing" <?php echo (isset($_POST['id'])?($local == true?'src="../../img/members/'.$prenom.'_'.$nom.'.jpg"':'src="http://ajc-courcite.fr/img/members/'.$prenom.'_'.$nom.'.jpg"'):''); ?>/></span>
                </div>
            </div>

            <h4 class="text-center">
                <span class="label label-danger" id="message"></span>
            </h4>

            <br/>
            <div class="row text-center">
                <button type="button" class="btn btn-primary" onclick="modal_show('ajceen', 'Gestion des AJCéen')"><i class="fa fa-chevron-circle-left"></i> Retour</button>
                <button id="submit_new_ajceen" class="btn btn-primary"><i class="fa fa-user-plus"></i> Ajouter l'AJCéen</button>
            </div>
        </div>
    </div>
</form>

<script src="js/fonctions.js" />
<script src="js/new_ajceen.js" />
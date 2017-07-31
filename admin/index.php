<?php include('dev/header.php'); ?>

<div class="col-lg-6 page-header">
    <h1><span class="glyphicon glyphicon-cog"></span> Interface d'administration</h1>
</div>
<div class="col-lg-6 page-header text-right">
    <h1><a class="hover_main" href="login.php">Déconnexion <span class="glyphicon glyphicon-log-out"></span></a></h1>
</div>

<div class="col-lg-6">
    <div class="container panel text-center">
        <button class="btn btn-primary btn-lg btn-choice" data-toggle="modal" data-target="#modal" onclick="modal_show('new_article', 'Nouvel article')">
            <span class="fa fa-2x fa-pencil"> Nouvel article</span>
        </button>
    </div>
</div>

<div class="col-lg-6">
    <div class="container panel text-center">
        <button class="btn btn-danger btn-lg btn-choice" data-toggle="modal" data-target="#modal" onclick="modal_show('article', 'Gestion des articles')">
            <span class="fa fa-2x fa-newspaper-o"> Afficher les articles</span>
        </button>
    </div>
</div>

<div class="col-lg-6">
    <div class="container panel text-center">
        <button class="btn btn-warning btn-lg btn-choice" data-toggle="modal" data-target="#modal" onclick="modal_show('folder', 'Gestion des dossiers')">
            <span class="fa fa-2x fa-folder-open-o"> Dossiers</span>
        </button>
    </div>
</div>

<div class="col-lg-6">
    <div class="container panel text-center">
        <button class="btn btn-info btn-lg btn-choice" data-toggle="modal" data-target="#modal" onclick="modal_show('ajceen', 'Gestion des AJCéen')">
            <span class="fa fa-2x fa-users"> AJCéen</span>
        </button>
    </div>
</div>

<div class="col-lg-6">
    <div class="container panel text-center">
        <button class="btn btn-success btn-lg btn-choice" data-toggle="modal" data-target="#modal" onclick="modal_show('reservation', 'Réservations')">
            <span class="fa fa-2x fa-list"> Réservations</span>
        </button>
    </div>
</div>

<div class="col-lg-6">
    <div class="container panel text-center">
        <button class="btn btn-dark btn-lg btn-choice" data-toggle="modal" data-target="#modal" onclick="modal_show('album', 'Albums Photos')">
            <span class="fa fa-2x fa-picture-o"> Photos</span>
        </button>
    </div>
</div>

<div class="col-lg-12">
    <div class="container panel text-center">
        <a href="<?php echo $URL_WEBSITE; ?>" target="_blank">
            <button class="btn btn-info btn-lg btn-choice">
                <span class="fa fa-2x fa-external-link"> Accès au site</span>
            </button>
        </a>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel"></h4>
        </div>
            <div class="modal-body">
                <p class="text-center" style="font-size:24px">
                    <i class="fa fa-spinner fa-spin"></i> Chargement
                </p>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php include('dev/footer.php'); ?>

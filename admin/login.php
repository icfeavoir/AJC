<?php 
     include('dev/header.php'); 
     $_SESSION['connect'] = false;
?>

<div class="page-header">
     <h1><span class="fa fa-1x fa-sign-in"></span> Connexion sécurisée</h1>
</div>

<div class="container">
     <div class="row">
          <div class="col-md-offset-4 col-md-4">
               <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Identifiant</span>
                    <input type="text" class="form-control" id="log">
               </div>
               </br>
               <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">Mot de passe</span>
                         <input type="password" class="form-control" id="pass">
               </div>
               </br>
               <div class="wrapper text-center">
                    <span class="group-btn">     
                         <a onclick="login($('#log').val(), $('#pass').val())" class="btn btn-primary btn-md">Connexion <i class="fa fa-sign-in"></i></a>
                    </span>
               </div>
          </div>
     </div>
</div>
<br/>
<div class="erreur"></div>

<?php include('dev/footer.php'); ?>
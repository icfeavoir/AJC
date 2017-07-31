<?php
include('dev/header.php');

switch($_GET['erreur'])
{
   case '400':
   $msg = 'Échec de l\'analyse HTTP.';
   break;
   case '401':
   $msg = 'Le pseudo ou le mot de passe n\'est pas correct !';
   break;
   case '402':
   $msg = 'Le client doit reformuler sa demande avec les bonnes données de paiement.';
   break;
   case '403':
   $msg = 'Requête interdite !';
   break;
   case '404':
   $msg = 'La page n\'existe pas ou plus !';
   break;
   case '405':
   $msg = 'Méthode non autorisée.';
   break;
   case '500':
   $msg = 'Erreur interne au serveur ou serveur saturé.';
   break;
   case '501':
   $msg = 'Le serveur ne supporte pas le service demandé.';
   break;
   case '502':
   $msg = 'Mauvaise passerelle.';
   break;
   case '503':
   $msg = ' Service indisponible.';
   break;
   case '504':
   $msg = 'Trop de temps à la réponse.';
   break;
   case '505':
   $msg = 'Version HTTP non supportée.';
   break;
   default:
   $msg = 'Erreur !';
}

include('dev/footer.php');
?>
   <br/><br/>
   <div class="err">
      <a href="index.php" class="messErr">OUPS ! L'erreur suivant est survenue : <?php echo $msg; ?> Cliquez ici pour revenir au site !</a>
   </div>

<script>
   $('footer').css('position', 'absolute');
   $('footer').css('bottom', '0px');
</script>
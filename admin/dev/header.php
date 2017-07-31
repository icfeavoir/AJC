<?php 
      session_start();

      include('fonctions.php');
      if((!isset($_SESSION['connect']) || !$_SESSION['connect']) && basename($_SERVER['PHP_SELF']) != 'login.php'){
            header('Location:./login.php');
      }
            
?>
<!DOCTYPE html>
<html lang="fr">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Site internet de l'AJC">
      <meta name="author" content="AJC">
      <link rel="icon" type="image/png" href="img/brand_sign.png" />

      <title>AJC &#124; Association des Jeunes de Courcité</title>

      <link rel="icon" type="image/x-icon" href="img/favicon.ico" />

      <?php
            require 'config.php';
            include('link.php');
	 	$self = $_SERVER['SCRIPT_FILENAME'];
	  	$lastSlash = strrpos($self, '/');
	  	$css  ='css'.substr($self, $lastSlash, strrpos($self, '.')-$lastSlash).'.css';
	  	if(is_file(substr($self, 0, $lastSlash + 1).$css)) {
	    		echo '<link rel="stylesheet" type="text/css" href="'.$css.'">';
	  	}
	  	include '../dev/db.php';
	?>
      
</head>

<body>
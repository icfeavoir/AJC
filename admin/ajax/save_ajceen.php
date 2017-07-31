<?php
	foreach($_POST as $key => $value){
		if(empty($_POST[$key]) && $key!='surnom' && $key!='sexe' && $key!='poste'){
			exit($key);
		}
	}

	if(!isset($_FILES["file"]["type"])){
		exit('photo');
	}else{
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["file"]["name"]);
		$file_extension = end($temporary);
	}

	if(((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 400000) && in_array($file_extension, $validextensions)) == false){	//verif
		exit('photo');
	}

	if ($_FILES["file"]["error"] > 0){
		exit('photo');
	}

	//SUCCESS :

    	include('../../dev/config.php');
	include('../../dev/db.php');

	$req = $conn->prepare('INSERT INTO membre (nom, prenom, sexe, surnom, annee, poste) VALUES(:nom, :prenom, :sexe, :surnom, :annee, :poste)');
	$req->execute(array(
			':nom' => $_POST['nom'],
			':prenom' => $_POST['prenom'],
			':sexe' => $_POST['sexe'],
			':surnom' => $_POST['surnom'],
			':annee' => $_POST['année'],
			':poste' => $_POST['poste']
		));

	$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
	$targetPath = "../../img/members/".$_POST['prenom'].'_'.$_POST['nom'].'.'.$file_extension; // Target path where file is to be stored
	move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
	
	exit('success');
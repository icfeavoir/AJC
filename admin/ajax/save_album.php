<?php
	foreach($_POST as $key => $value){
		if(empty($_POST[$key])){
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

	$req = $conn->prepare('INSERT INTO album (nom, url) VALUES(:nom, :url)');
	$req->execute(array(
			':nom' => $_POST['nom'],
			':url' => $_POST['url'],
		));

	$id = $conn->query('SELECT id FROM album ORDER BY id DESC LIMIT 1')->fetch();
	$id = $id['id'];

	$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
	$targetPath = '../../img/album/'.$id.'.'.$file_extension; // Target path where file is to be stored
	move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
	
	exit('success');
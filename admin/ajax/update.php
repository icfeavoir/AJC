<?php
	require '../../dev/db.php';

	if(isset($_POST) && !is_array($_POST['data'])){
		$_POST['column'] = explode(',', $_POST['column']);
		$_POST['data'] = explode(',', $_POST['data']);
	}

	if(sizeof($_POST['data']) == 0)
		exit(0);

	// specials
	if(isset($_POST['type'])){
		switch($_POST['type']){
			case 'member':
				if(empty($_FILES)){
					$data = $conn->query('SELECT prenom, nom FROM membre WHERE id="'.$_POST['id'].'"');
					$data = $data->fetch();
					$old = $data['prenom'].'_'.$data['nom'];
					$new = $_POST['data'][array_search('prenom', $_POST['column'])].'_'.$_POST['data'][array_search('nom', $_POST['column'])];
					//renaming the picture
					if(file_exists('../../img/members/'.$old.'.jpg'))
						rename('../../img/members/'.$old.'.jpg', '../../img/members/'.$new.'.jpg');
				}else{		//nouvelle photo
					if(!isset($_FILES["file"]["type"])){
						exit('photo');
					}else{
						$validextensions = array("jpeg", "jpg");
						$temporary = explode(".", $_FILES["file"]["name"]);
						$file_extension = end($temporary);
					}

					if(((($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 400000) && in_array($file_extension, $validextensions)) == false){	//verif
						exit('photo');
					}

					if ($_FILES["file"]["error"] > 0){
						exit('photo');
					}
					$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
					$targetPath = "../../img/members/".$_POST['data'][array_search('prenom', $_POST['column'])].'_'.$_POST['data'][array_search('nom', $_POST['column'])].'.'.$file_extension; // Target path where file is to be stored
					move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
				}
				break;
		}
	}

	$update = '';
	for($i=0; $i<sizeof($_POST['column']); $i++){
		$update .= $_POST['column'][$i].' = "'.$_POST['data'][$i].'", ';
	}

	$update = substr($update, 0, strlen($update)-2);

	$req = $conn->exec('UPDATE '.$_POST['table'].' SET '.$update.' WHERE id = '.$_POST['id']);

	echo true;
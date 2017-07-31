<?php
	require '../../dev/db.php';

	if(empty($_POST['title']))
		exit('titre');

	$req = $conn->prepare('INSERT INTO article (titre, article, dossier, flux, taille) VALUES(:title, :text_article, :folder, "1", "1")');
	$req->execute(array(
			':title' => $_POST['title'],
			':text_article' => $_POST['text'],
			':folder' => $_POST['folder']
		));

	echo true;
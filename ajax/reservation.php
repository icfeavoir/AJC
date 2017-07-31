<?php
	require '../dev/db.php';

	$req = $conn->prepare('INSERT INTO reservation (nom, prenom, nombre) VALUES(:nom, :prenom, :nombre)');
	$req->execute(array(
			':nom' => $_POST['nom'],
			':prenom' => $_POST['prenom'],
			':nombre' => $_POST['nombre']
		));

	echo true;
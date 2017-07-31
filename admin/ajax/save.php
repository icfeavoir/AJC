<?php
	require '../../dev/db.php';

	if(empty($_POST['data']))
		exit(0);

	$req = $conn->exec('INSERT INTO '.$_POST['table'].' ('.$_POST['column'].') VALUES ("'.$_POST['data'].'")');

	echo true;
<?php
	require '../../dev/db.php';

	$req = $conn->exec('DELETE FROM '.$_POST['table'].' WHERE id = '.$_POST['id']);

	echo true;
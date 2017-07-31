<?php
	date_default_timezone_set('Europe/Paris');

	if(!isset($_POST['id']) || !isset($_POST['passwd']))
		exit('You cannot connect without identify yourself');

	$_POST['passwd'] = md5($_POST['passwd']);

	if($_POST['id'] != 'pmc' || $_POST['passwd'] != '8c3a1ae4147c6ad3e887c6afde28e760')
		exit('wrong id or passwd');

	if(!isset($_POST['capteur']) || !isset($_POST['state']))
		exit('Aucune valeur renseignée');

	require('pmc_connect_db.php');

	function changeState($capteur, $state){
		$sth = "UPDATE pmc SET state = :state WHERE capteur = (:capteur)";
		$q = $conn->prepare($sth);
		$q->execute(array(':state'=>$state, ':capteur'=>$capteur));

		echo 'Le capteur '.$capteur.' a pris la valeur '.$state;
	}

	changeState($_POST['capteur'], $_POST['state']);

	//pmc_user
<?php

	if(!isset($_POST['test']))
		exit("Erreur");
	else
		exit($_POST['test']);

	// if(!isset($_POST['id']) || !isset($_POST['passwd']))
	// 	exit('You cannot connect without identify yourself');

	// $_POST['passwd'] = md5($_POST['passwd']);

	// if($_POST['id'] != 'pmc' || $_POST['passwd'] != '8c3a1ae4147c6ad3e887c6afde28e760')
	// 	exit('wrong id or passwd');

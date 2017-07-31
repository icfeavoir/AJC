<?php
	$host = 'localhost';
	$db = 'pmc';
	$root = 'root';
	$pass = '';
	
	try {
		$conn = new PDO('mysql:host='.$host.';dbname='.$db, $root, $pass);
	    	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    	$conn->exec("SET CHARACTER SET utf8");
	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}
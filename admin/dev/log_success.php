<?php
	session_start();

	$_SESSION['connect'] = true;

     //setcookie('connect', 'true', time()+30*24*3600, null, null, false, true);
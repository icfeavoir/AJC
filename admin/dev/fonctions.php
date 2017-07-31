<?php

	function check_connection(){
		return $_COOKIE['connect'];
	}

	function timestamp2str($timestamp){
		$timestamp = strtotime($timestamp);
		$date = date('d/m/Y', $timestamp);
		$heure = date('H:i', $timestamp);
		return array($date, $heure);
	}

	function check_modal_secure(){
		if(!isset($_POST['secure_modal'])){
			header('Location: error.php?e=403');
		}
	}
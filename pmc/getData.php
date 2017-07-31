<?php

	if(!isset($_POST['id']) || !isset($_POST['passwd']))
		exit('You cannot connect without identify yourself');

	$_POST['passwd'] = md5($_POST['passwd']);

	if($_POST['id'] != 'pmc' || $_POST['passwd'] != '8c3a1ae4147c6ad3e887c6afde28e760')
		exit('wrong id or passwd');

	require('pmc_connect_db.php');

	$perimetre = isset($_GET['perimetre']) ? intval($_GET['perimetre']) : 0;
	$lat1 = 47.495734;
	$lon1 = -0.554493;

	function calculMeters($lat1, $lon1, $lat2, $lon2){
		$R = 6378.137; // Radius of earth in KM
	    	$dLat = ($lat2 * 3.14 / 180) - ($lat1 * 3.14 / 180);
	    	$dLon = ($lon2 * 3.14 / 180) - ($lon1 * 3.14 / 180);
	    	$a = sin($dLat/2) * sin($dLat/2) + cos($lat1 * 3.14 / 180) * cos($lat2 * 3.14 / 180) * sin($dLon/2) * sin($dLon/2);
	    	$c = 2 * atan2(sqrt($a), sqrt(1-$a));
	    	$d = $R * $c;
	    	return $d * 1000; // meters
	}

	$req = '6378.137*2 * atan2(sqrt(sin((coordX * 3.14 / 180) - ('.$lat1.' * 3.14 / 180)/2) * sin((coordX * 3.14 / 180) - ('.$lat1.' * 3.14 / 180)/2) + cos('.$lat1.' * 3.14 / 180) * cos(coordX * 3.14 / 180) * sin((coordY * 3.14 / 180) - ('.$lon1.' * 3.14 / 180)/2) * sin((coordY * 3.14 / 180) - ('.$lon1.' * 3.14 / 180)/2)), sqrt(1-sin((coordX * 3.14 / 180) - ('.$lat1.' * 3.14 / 180)/2) * sin((coordX * 3.14 / 180) - ('.$lat1.' * 3.14 / 180)/2) + cos('.$lat1.' * 3.14 / 180) * cos(coordX * 3.14 / 180) * sin((coordY * 3.14 / 180) - ('.$lon1.' * 3.14 / 180)/2) * sin((coordY * 3.14 / 180) - ('.$lon1.' * 3.14 / 180)/2)))*1000';
	
	$data = $conn->query('SELECT * FROM pmc WHERE state = 1 ORDER BY capteur');

	$result = array();

	while($pmc = $data->fetch()){
		array_push($result, array(
						'capteur'=>$pmc['capteur'],
						'state'=>$pmc['state'],
						'last_update'=>$pmc['last_update'],
						'lat'=>$pmc['lat'],
						'lon'=>$pmc['lon'],
						'distance'=>calculMeters($pmc['coordX'], $pmc['coordY'], $lat1, $lon1),
					));
	}

	$result = json_encode(array('result'=>$result));

	print_r($result);
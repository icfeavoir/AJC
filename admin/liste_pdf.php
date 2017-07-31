<?php

require('../dev/db.php');
require('api/fpdf/fpdf.php');

class PDF extends FPDF
{
	// Chargement des données
	function LoadData($conn)
	{
		$list = array();
		$data = $conn->query('SELECT * FROM reservation ORDER BY nom, prenom');
		while($res = $data->fetch()){
			$date = explode(' ',$res['date']);
			$d = array(utf8_decode($res['nom']), utf8_decode($res['prenom']), $res['nombre'], $date[0]);
			array_push($list, $d);	
		}
	    	return $list;
	}

	// Tableau simple
	function BasicTable($header, $data, $conn)
	{
	    // En-tête
		$this->SetFillColor(200,200,255);
	     foreach($header as $col)
	         $this->Cell(48,7,$col,1,0,'C',true);
	     $this->Ln();
	     // Données
	     $i = 0;
	     foreach($data as $row)
	     {
	     	if($i%2 == 0)
	     		$c = 240;
	     	else
	     		$c = 210;

	     	$this->SetFillColor($c, $c, $c);
	    		foreach($row as $col)
	          	$this->Cell(48,6,$col,1,0,'L',true);
	        	$this->Ln();
	        	$i++;
	    	}
	    	$this->SetFillColor(200,200,255);
	    	$this->Cell(96,6,'TOTAL',1,0,'C',true);
	    	$total = $conn->query('SELECT SUM(nombre) AS total FROM reservation')->fetch();
	    	$this->Cell(48,6,''.$total[0],1,0,'C',true);
	    	$this->Cell(48,6,'',1,0,'C',true);
	}
}

$pdf = new PDF();



// Titres des colonnes
$header = array('Nom', utf8_decode('Prénom'), 'Nombre', utf8_decode('Réservé le'));
// Chargement des données
$data = $pdf->LoadData($conn);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data, $conn);

$pdf->Output();
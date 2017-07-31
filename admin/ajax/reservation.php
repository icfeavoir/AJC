<?php
	include('../dev/fonctions.php');
	include('../../dev/db.php');
	$table = 'membre';

	$data = $conn->query('SELECT id, prenom, nom, nombre, date FROM reservation ORDER BY nom LIMIT 10 OFFSET '.$_POST['offset']);
	while($row = $data->fetch()){
		$date = timestamp2str($row['date']);
		echo '<tr>
				<td>'.$row['nom'].'</td>
                    <td>'.$row['prenom'].'</td>
                    <td>'.$row['nombre'].'</td>
                    <td>'.$date[0].'</td>
                    <td><div class="btn-group"><button type="button" class="btn btn-danger" onclick="delete_item(`reservation`, '.$row['id'].', `Voulez-vous vraiment supprimer la réservation de '.$row['prenom'].' '.$row['nom'].'?`)"><span class="fa fa-1x fa-trash"></span></button></div></td>
			</tr>';
	}
<?php
	include('../dev/fonctions.php');
	include('../../dev/db.php');
	$table = 'membre';

	$poste = $conn->query('SELECT id, poste FROM poste ORDER BY id');
	$poste_list = array();
	while($row = $poste->fetch()){
		$poste_list[$row['id']] = $row['poste'];
	}

	$data = $conn->query('SELECT id, prenom, nom, poste, surnom FROM membre ORDER BY poste LIMIT 5 OFFSET '.$_POST['offset']);
	while($row = $data->fetch()){
		echo '<tr>
				<td>'.$row['prenom'].'</td>
                    <td>'.$row['nom'].'</td>
                    <td>'.$poste_list[$row['poste']].'</td>
                    <td>'.$row['surnom'].'</td>
                    <td><div class="btn-group"><button type="button" class="btn btn-warning" onclick="update_ajceen('.$row['id'].')"><span class="fa fa-1x fa-pencil"></span></button><button type="button" class="btn btn-danger" onclick="delete_item(`membre`, '.$row['id'].', `Voulez-vous vraiment supprimer '.$row['prenom'].' '.$row['nom'].'?`)"><span class="fa fa-1x fa-trash"></span></button></div></td>
			</tr>';
	}
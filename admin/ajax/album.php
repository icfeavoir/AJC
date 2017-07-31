<?php
	include('../dev/fonctions.php');
	include('../../dev/db.php');

	$data = $conn->query('SELECT id, nom FROM album ORDER BY nom LIMIT 5 OFFSET '.$_POST['offset']);
	while($row = $data->fetch()){
		echo '<tr>
				<td>'.$row['nom'].'</td>
                    <td><div class="btn-group"><button type="button" class="btn btn-danger" onclick="delete_item(`album`, '.$row['id'].', `Voulez-vous vraiment supprimer l\'album '.$row['nom'].'?`)"><span class="fa fa-1x fa-trash"></span></button></div></td>
			</tr>';
	}
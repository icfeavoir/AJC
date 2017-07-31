<?php
	include('../dev/fonctions.php');
	include('../../dev/db.php');
	$table = 'article';
	$data = $conn->query('SELECT id, titre, date FROM article ORDER BY id DESC LIMIT 5 OFFSET '.$_POST['offset']);
	while($row = $data->fetch()){
		$date = timestamp2str($row['date']);
		echo '<tr id="articles">
				<td>'.$row['titre'].'</td>
                    <td>'.$date[0].' à '.$date[1].'</td>
                    <td><div class="btn-group"><button type="button" class="btn btn-warning" onclick="update_article('.$row['id'].')"><span class="fa fa-1x fa-pencil"></span></button><button type="button" class="btn btn-danger" onclick="delete_item(`article`, '.$row['id'].')"><span class="fa fa-1x fa-trash"></span></button></div></td>
			</tr>';
	}
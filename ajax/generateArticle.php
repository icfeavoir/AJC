<?php

require '../dev/db.php';

$id = $_GET['id'];

$req = $conn->query('SELECT * FROM article WHERE id < '.$id.' ORDER BY id DESC LIMIT 2');

if($req->rowCount() == 0){
	echo "empty";
}else{

	$months = array('', 'JAN', 'FÉV', 'MAR', 'AVR', 'MAI', 'JUIN', 'JUIL', 'AOU', 'SEP', 'OCT', 'NOV', 'DÉC');

	while($rep = $req->fetch()){
		$time = strtotime($rep['date']);
		$day = date('d', $time);
		$month = $months[intval(date('m', $time))];
	?>
		<div class="article" id="<?php echo $rep['id']; ?>">
			<div class="date-block">
				<p class="date">
					<span class="date-day"><?php echo $day; ?></span>
					<span class="date-month"><?php echo $month; ?></span>
				</p>
			</div>

			<div class="title">
				<p><?php echo $rep['titre']; ?></p>
			</div>

			<div class="text-article">
				<?php echo htmlspecialchars_decode($rep['article']); ?>
			</div>

			<div class="article-bottom">
				<div class="comments">
					<p>2 commentaires</p>
				</div>

				<div class="category">

					<p>Dossier : <u>Spectacle - Shérifement Vôtre</u></p>
				</div>
			</div>
		</div>
	<?php
	}
}	

?>

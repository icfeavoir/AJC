<?php require 'dev/header.php'; ?>
	
	<div class="text-center article-div masonry">

		<?php

		if(isset($_GET['f'])){
			$data = $conn->prepare('SELECT * FROM article WHERE dossier = :f ORDER BY id DESC');
			$data->execute(array(
					':f' => $_GET['f']
				));
		}else{
			$data = $conn->prepare('SELECT * FROM article ORDER BY id DESC LIMIT 0,4');
			$data->execute();
		}

		$months = array('', 'JAN', 'FÉV', 'MAR', 'AVR', 'MAI', 'JUIN', 'JUIL', 'AOU', 'SEP', 'OCT', 'NOV', 'DÉC');

		while($row = $data->fetch()){
			$time = strtotime($row['date']);
			$day = date('d', $time);
			$month = $months[intval(date('m', $time))];
		?>

			<div class="article" id="<?php echo $row['id']; ?>">

					<div class="date-block">
						<p class="date">
				            	<span class="date-day"><?php echo $day; ?></span>
				               <span class="date-month"><?php echo $month ?></span>
						</p>
					</div>

				<div class="title">
					<p><?php echo $row['titre']; ?></p>
				</div>

				<div class="text-article">
					<?php echo htmlspecialchars_decode($row['article']); ?>
				</div>

				<div class="article-bottom">
					<div class="comments">
						<p></p>
					</div>

					<div class="category">

						<p>Dossier : <u>Non précisé</u></p>
					</div>
				</div>

			</div>

			<?php

		}

		?>

	</div>
	
<?php require 'dev/footer.php'; ?>

<script src="./js/index.js"></script>
<script>
//$('.masonry').masonry();
</script>
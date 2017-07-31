<?php require 'dev/header.php'; 
	require 'dev/db.php';
?>

<?php
	$albums = $conn->query('SELECT * FROM album ORDER BY id DESC');
	while($album = $albums->fetch()){
		?>
			<div class="photo">
				<a class="link" href="<?php echo $album['url']; ?>" target="_blank">
					<div class="album-titre"><?php echo $album['nom']; ?></div>
					<img src="img/album/<?php echo $album['id']; ?>.jpg" title="Cliquer pour ouvrir" />
				</a>
			</div>
		<?php
	}
?>

<?php require 'dev/footer.php'; ?>

<script>
	function resize_img(){
		var w = $(window).width()*30/100;
		var h = w/1.5;
		$('.photo').css('height', h);
	}

	$(document).ready(function(){
		resize_img();
	});
	$(window).on("resize", function(){
		resize_img();
	});
</script>
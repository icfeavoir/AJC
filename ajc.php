<?php require 'dev/header.php'; ?>
	
	<div class="container">

		<div class="description">
			<p>
				<?php
					$req = $conn->query('SELECT * FROM description LIMIT 1');
					while($d = $req->fetch()){
						echo $d['description'];
					}
				?>
			</p>
		</div>

		<div class="members text-center">

			<?php

				$members = $conn->query('SELECT *, m.id AS idMember FROM membre m, poste p WHERE m.poste = p.id ORDER BY m.poste');
				while($member = $members->fetch()){
					?>

						<div class="member">

							<p class="name"><?php echo $member['prenom'].' '.$member['nom']; ?></p>

							<p class="position"><?php echo $member['poste']; ?></p>

							<img <?php echo 'src="/img/members/'.$member['prenom'].'_'.$member['nom'].'.jpg" alt="'.$member['prenom'].' '.$member['nom'].'"';?> class="img-member" />

							<p class="age">Âge : <?php echo calculeAge($member['annee']); ?></p>

							<p class="nickname"><?php
								$nick = $member['surnom'];
								if($nick != '' && !$member['sexe'])
									echo 'Surnommé '.$nick;
								else if($nick != '' && $member['sexe'])
									echo 'Surnommée '.$nick;
								else
									echo '<br>';
							?></p>

						</div>

					<?php
				}

			?>

		</div>

	</div>
	
<?php require 'dev/footer.php'; ?>
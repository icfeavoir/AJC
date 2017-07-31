<?php require 'dev/header.php'; ?>

	<br/><br/>

	<div class="container border-container text-center">
		<div class="row text-center">
			<div class="col-lg-12">
				<h1>
					<span class="label label-success">Caravane ou Palace ?</span>
				</h1><br/>
				<p>
					Réservez votre place pour <i>Caravane ou Palace ?</i> le <b>samedi 1er avril</b> à Évron.
				</p>
				<p>
					<i>Cette réservation est uniquement à titre indicatif et ne sera pas obligatoire le jour de la représentation.</i>
				</p>
			</div>
		</div>
		<br />
		<div class="container">
			<form id="form_new_ajceen">
				<div class="row">
		               <div class="col-lg-4">
		                    <div class="input-group">
		                    	<span class="input-group-addon" id="basic-addon1">Prénom</span>
		                        	<input type="text" class="form-control" err="prénom" id="prenom" name="prenom">
		                    </div>
		               </div>
		               <div class="col-lg-4">
		               	<div class="input-group">
		                    	<span class="input-group-addon" id="basic-addon1">Nom</span>
		                        	<input type="text" class="form-control" err="nom" id="nom" name="nom">
		                    </div>
		               </div>
		               <div class="col-lg-4">
		                    <div class="input-group">
		                    	<span class="input-group-addon" id="basic-addon1">Nombre de personnes</span>
		                        	<input type="number" min="1" max="500" value="1" class="form-control" err="nombre de personnes" id="nombre" name="nombre">
		                    </div>
		               </div>
	           	</div>
	           	<br />

	           	<button type="button" id="submit" class="btn btn-success">Valider</button><br/><br/>

	           	<h3><span class="error label label-danger"></span></h3>
			</form>
		</div>

		<div class="alert alert-success">
			<strong>Merci !</strong> Votre réservation au nom de <span id="confirm-nom"></span> pour <span id="confirm-nombre"></span> a bien été prise en compte.
		</div>

		<div class="alert alert-danger">
			<strong>Oups !</strong> Une erreur est survenue. Merci de rééssayer, si l'erreur persiste, contactez-nous !
		</div>
	</div>

	<br/><br/>
	
<?php require 'dev/footer.php'; ?>

<script src="./js/index.js"></script>

<script>
	$('footer').css('position', 'absolute');
	$('footer').css('bottom', '0px');

	$('.alert').css('display', 'none');

	//envoie du formulaire
	$('#submit').click(function(){
		var verif = true;7
		$('.alert').css('display', 'none');

		$form = $('form input');
		$.each($form, function(index, value){
			$(this).css('border-color', '');
			$('.error').text('');
			if($(this).val() === ''){
				verif = false;
				$(this).css('border-color', 'red');
				$('.error').text('Le champ '+$(this).attr('err')+' semble vide.');
				return false; //exit each;
			}
		});

		if(verif == true){
			$.ajax({
		          url: "ajax/reservation.php",
		          type: "POST",
		          data:{
		          	nom: $('#nom').val(),
		          	prenom: $('#prenom').val(),
		          	nombre: $('#nombre').val(),
		          },
		          success: function(data){
		          	if(data){
		          		$('#confirm-nom').text($('#prenom').val()+' '+$('#nom').val());
		          		if($('#nombre').val() > 1){
		          			$('#confirm-nombre').text($('#nombre').val()+' personnes');
		          		}else{
		          			$('#confirm-nombre').text('1 personne');
		          		}

		          		$('.alert-success').css('display', 'block');
						$.each($form, function(index, value){
							$(this).val('');
						});
		          	}else{
						$('.alert-danger').css('display', 'block');
					}
		          }
			});
		}
	});

	$('#nombre').on("focusout", function(){
		if($(this).val() < 1)
			$(this).val(1);
		else if($(this).val() > 500)
			$(this).val(500);
	});
</script>
<?php require 'dev/header.php'; ?>
	
	<div class="contact text-center general-div">

		<p>Vous pouvez nous contacter à cette adresse : <a href="mailto: ajcourcite@gmail.com">ajcourcite@gmail.com</a>.</p>
		<br>

		<p class="text-center follow">Suivez nous sur :
			<ul class="text-center">
				<li><a target="_blank" href="http://facebook.fr/ajcourcite"><i class="fa fa-2x fa-facebook"></i> Facebook</a></li>
				<li><a target="_blank" href="https://twitter.com/asso_AJC"><i class="fa fa-2x fa-twitter"></i> Twitter</a></li>
				<li><a target="_blank" href="https://www.instagram.com/ajc_courcite/"><i class="fa fa-2x fa-instagram"></i> Instagram</a></li>
			</ul>
		</p>

		<p>Vous pouvez également vous inscrire à notre newsletter pour ne rien rater de la vie AJCéenne : <input type="email" name="mail" placeholder="exemple@exemple.fr" class="mail"/><br><br>
		<button disabled="true">Envoyer</button>
		</p><br>

		<p class="error-msg">L'adresse mail entrée n'est pas valide</p>

		<br>

	</div>
	
<?php require 'dev/footer.php'; ?>

<script>

$('.mail').on('input', function(){
	if(validateEmail($('.mail').val())){
		$('button').attr('disabled', false);
		$('button').css('background-color', 'rgb(57, 115, 141)');
		$('.error-msg').css('display', 'none');
	}else{
		$('button').attr('disabled', true);
		$('button').css('background-color', 'grey');
		$('.error-msg').css('display', 'inline-block');
	}

	if($('.mail').val() == ""){		
		$('.error-msg').css('display', 'none');
	}
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

</script>
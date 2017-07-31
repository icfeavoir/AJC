function update_ajceen(id){
    	$('#modal .modal-title').text('Modification d\'un AJCéen');
	$('#modal .modal-body').load('modal/new_ajceen.php', {id: id, secure_modal: true}, function(){
		$('#submit_new_ajceen').text('Modifier l\'AJCéen');
		$('#submit_new_ajceen').attr('onclick', 'save_update_ajceen('+id+')');

		$('#text_photo').text('Changer de photo');
		//on évite les bugs avec le code original
		$("#form_new_ajceen").attr('state', 'update');
	});
}

function save_update_ajceen(id){
	var formData = new FormData();
	formData.append('table', 'membre');
	formData.append('id', id);
	formData.append('type', 'member');
	formData.append('column', new Array('nom', 'prenom', 'sexe', 'surnom', 'annee', 'poste'));
	formData.append('data', new Array($('#nom').val(), $('#prenom').val(), $('input[name="sexe"]:checked').val(), $('#surnom').val(), $('#annee').val(), $('#poste').val()));
	formData.append('file', $('#file')[0].files[0]);

	$.ajax({
	 	url: 'ajax/update.php',
		type: 'POST',
		processData: false, // important
		contentType: false, // important
		data: formData,
		success: function(data, status){
			if(data != true) //error
	     		$('.err').text('Erreur : veuillez vérifier les données...');
		    	else{
		    		$('#modal').modal('hide');
		    		bootbox.alert('Good job ! L\'ajcéen '+$('#prenom').val()+' '+$('#nom').val()+' a bien été modifié !');
		    	}
		}
	});
}
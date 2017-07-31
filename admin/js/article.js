function delete_article(id){
	bootbox.confirm({
    		message: "Voulez-vous supprimer cet article ? Attention c'est définitif !",
    		buttons: {
        		confirm: {
            		label: 'Yep !',
            		className: 'btn-success'
		     },
        		cancel: {
            		label: 'En fait non.',
            		className: 'btn-danger'
        		}
    		},
    		callback: function (result) {
        		if(result){
        			$.post(
					'./ajax/delete.php',
					{
						table: 'article',
						id: id,
					},
			        	function(data, status){
			          	change_page(current);
			        	}
				);
        		}
    		}
	});
}

function update_article(id){
	$('#modal .modal-title').text('Modification d\'un article');
	$('#modal .modal-body').load('modal/new_article.php', {id: id, secure_modal: true}, function(){
		$('#submit_btn').text('Modifier l\'article');
		$('#submit_btn').attr('onclick', 'save_update_article('+id+')');
	});
}

function save_update_article(id){
	var data = tinymce.activeEditor.getContent();
	$.post(
       	'./ajax/update.php',
       	{
          	table: 'article',
        		column: ['titre', 'dossier', 'article'],
        		data: [$('#title').val(), $('#folder').val(), htmlEntities(data)],
        		id: id
       	},
	    	function(data, status){
	     	if(data != true) //error
	     		$('.err').text('Vérifiez les données...');
		    	else{
		    		$('#modal').modal('hide');
		    		bootbox.alert('L\'article a bien été modifié wesh !');
		    	}
	     }
    	);
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
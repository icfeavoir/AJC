function update(id){
	var dossier = $('#dossier_'+id).text();
	$('#dossier_'+id).html('<div class="input-group"><input value="'+dossier+'" type="text" class="form-control" id="folder" name="title"><span class="input-group-addon hover_main" onclick="update_folder('+id+')"><span class="fa fa-1x fa-check text-success"></span></span></div>')	
}

function update_folder(id){
	var folder = $('#folder').val();
    $.post(
       	'./ajax/update.php',
        {
            table: 'dossier',
        	column: ['nom'],
        	data: [folder],
        	id: id
        },
    function(data, status){
        if(data != true) //error
            $('.err').text('Le champ semble vide');
	    else            //saved
     	    $('#dossier_'+id).text(folder);
        }
    );
}

function save_new_folder(){
	var folder = $('#new_folder').val();
    if(folder != ''){
    	$.post(
    		'./ajax/save.php',
    		{
    			table: 'dossier',
    			column: 'nom',
    			data : folder,
    		},
            function(data, status){
                if(data != true){ //error
                    $('.err_new').text('Une erreur est survenue');
                }else{        //saved
                    $('#new_folder').val('');
         	     	$('tbody').append('<tr><td></td><td class="dossier_nom">'+folder+'</td><td><div class="btn-group"><button type="button" class="btn btn-warning disabled"><span class="fa fa-1x fa-pencil"></span></button><button type="button" class="btn btn-danger disabled"><span class="fa fa-1x fa-trash"></span></button></div></td></tr>');
                }
            }
    	);
    }else{
        $('.err_new').text('Le champ est vide');
    }
}

function delete_folder(id){
	bootbox.confirm({
    		message: "Voulez-vous supprimer ce dossier ? Les articles correspondants ne seront pas supprimés.",
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
						table: 'dossier',
						id: id,
					},
			        	function(data, status){
			          	$('#dossier_'+id).parent().css('display', 'none');
			        	}
				);
        		}
    		}
	});
}
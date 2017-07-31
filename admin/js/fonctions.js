function login(user, passwd){
    $.post("./dev/login.php",
            {
                user: user,
                passwd: passwd,
            },
            function(data, status){
                $('.erreur').html(data);
                if(data === "error"){
                    $('.erreur').html('<h3><span class="label label-danger">Identifiant ou mot de passe incorrect</span></h3>');
                }else if(data === "success"){   //connexion réussie
                    $('.erreur').html('<h3><span class="label label-success">Connexion réussie, veuillez patienter...</span></h3>');
                    $.post("dev/log_success.php",
                        function(data, status){
                            window.location.href = "index.php";
                        });
                }
            }
    );
}

function modal_show(url, title){
        $('.modal-title').text(title);
        $('.modal-body').html('<p class="text-center" style="font-size:24px"><i class="fa fa-spinner fa-spin"></i> Chargement</p>');
        $.ajax({
            type: 'POST',
            url: './modal/'+url+'.php',
            data:{
                secure_modal: true,
            },
            success: function(data){
                $('.modal-body').html(data);
            }
        });
    }

function logout(){
    $.post("dev/log_out.php",
        function(data, status){
            window.location.href = "index.php";
    });
}

var current_page = 1;

function change_page(page, url, offset, selector){
	$('#page_'+current_page).removeClass('active');
	$('#page_'+page).addClass('active');

	$.post("ajax/"+url+".php",{offset: (page-1)*offset},
    	function(data, status){
     	$(selector).html(data);
    	});

	current_page = page;
}

function delete_item(table, id, texte = "Voulez-vous supprimer cet élément ?", selector = "tbody"){
	bootbox.confirm({
    		message: texte,
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
						table: table,
						id: id,
					},
			        	function(data, status){
			          	  change_page(current_page, table, 5, selector);
			        	}
				    );
        		}
    		}
	});
}
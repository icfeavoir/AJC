var id;
var scroll = true;
$(document).scroll(function(){
	if($(document).scrollTop() + $(window).height() > $(document).height()*0.99 && scroll){
		generateArticle();
	}
});

function generateArticle(){
	$('.article:last').after('<div class="loader"><i class="fa fa-spinner fa-spin" style="font-size:24px"><br><br></i></div>');
	//get the last id
	id = $('.article:last').attr('id');

  	scroll = false;
	$.get( "/ajax/generateArticle.php", { id: id } )
  		.done(function( data ) {
  			if(data == "empty"){
  				scroll = false;
	    			$('.loader').css('display', 'none');
  			}else{
	    			$('.article:last').after(data);
	    			$('.loader').css('display', 'none');
  				scroll = true;
  			}
  	});
}

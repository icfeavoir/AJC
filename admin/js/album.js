$(document).ready(function (e) {
    $("#form_new_album").on('submit',(function(e) {
        e.preventDefault();
         $.ajax({
            url: "ajax/save_album.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData:false,        // To send DOMDocument or non processed data file it is set to false
            success: function(data)   // A function to be called if request succeeds
            {
                $('#message').empty();
                $('input').css('border-color', '');

                var msg = "";

                if(data != "success"){   // erreur
                    msg = 'Veuillez remplir le champ '+data;
                    $('#'+data).css('border-color', 'red');
                    $('#'+data).focus();
                }else{
                    modal_show('album', 'Albums Photos');
                }

                if(data == "photo"){    // mieux
                    msg = "Veuillez sélectionner une photo de moins de 400ko et de type JPG";
                }
                $('#message').text(msg);
            }
        });
    }));

    $(function() {
        $("#img_picker").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
                $('#previewimg').attr('src','noimage.png');
                $("#message").html("<p id='error'>Please Select A valid Image File</p>"+"<h4>Note</h4>"+"<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            }else{
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    // Function to preview image after validation
    $(function() {
        $("#file").change(function() {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match= ["image/jpeg","image/png","image/jpg"];
            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
            {
                $('#previewing').attr('src','noimage.png');
                $("#message").html("<span id='message'>Les formats autorisés sont les suivants : JPG, PNG</span>");
                return false;
            }
            else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').css('display', 'inline');
    };
});
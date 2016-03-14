//This is going to contain the javascript functionalities for the profile page
//Here I should define a function that uploads a profile picture on the server!

$(document).ready(function(){
$('#pic-upload').on('click', function() { 
     $('#profile-image-upload').click();
});

$('#profile-image-upload').change(function() {
    //alert( "Handler for .change() called." );  
 	var file = this.files[0];
 	var formData = new FormData();
	formData.append("image", file);
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == -1){ }
                else{
                document.getElementById("user-occupation").innerHTML= xmlhttp.responseText;
                location.reload();
                }
            }   
        }
        xmlhttp.open("POST", "picUpload.php", true);
        //xmlhttp.setRequestHeader("Content-type","multipart/form-data");
        xmlhttp.send(formData);


/*
       $.ajax({
          url: '/echo/json/',
          type: 'POST',
          data: formData,
          //Options to tell JQuery not to process data or worry about content-type
          cache: false,
          contentType: false,
          processData: false
 });
*/

});

});

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

});
});

function closeall(){
$("#transparent").fadeOut();
document.getElementById("user-name").style.zIndex = "1";
document.getElementById("user-occupation").style.zIndex = "1";
document.getElementById("full-name-input-box").style.display = 'none';
document.getElementById("full-name").style.display = 'block';
document.getElementById("user-name-edit").innerHTML = "Edit";
document.getElementById("user-occupation-edit").innerHTML = "Edit";
document.getElementById("occupation-input-box").style.display = 'none';
document.getElementById("occupation").style.display = 'block';
}


function changename(){
document.getElementById("user-name").style.zIndex = "100";
document.getElementById("user-name-edit").innerHTML = "";
$("#transparent").fadeIn();
document.getElementById("full-name").style.display = 'none';
document.getElementById("full-name-input-box").style.display = 'block';
}

function changedescription(){
document.getElementById("user-occupation").style.zIndex = "100";
document.getElementById("user-occupation-edit").innerHTML = "";
$("#transparent").fadeIn();
document.getElementById("occupation").style.display = 'none';
document.getElementById("occupation-input-box").style.display = 'block';
}
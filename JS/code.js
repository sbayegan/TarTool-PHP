// GLOBAL VARIABLES
// VARIABLES USED FOR SIGNUP
var username = 0;
var email = 0;
var pass = 0;
var repass = 0;
// VARIABLES USED FOR ACCOUNT SETTING UPDATE
var currentpass = 0;
var newpass = 0 ;
var matched = 0 ;
// USED FOR MOBILE FLIPPING 
var flipped = 0;


$(document).ready(function(){
    $("#account-settings").submit(function(event) {
event.preventDefault();
     return   currentpassword();
    });});

$(document).ready(function(){
    $("#change-password").hide();
    $("#account-delete").hide();
});

function poppanel(){
$("#transparent").fadeIn();
$(".flat-panel").animate({"margin-bottom": "0vh"});
//$("#panel-flip").attr("onclick", "resetview()");
return;
}


function flipview(){
    $(".saving-icon").animate({left: "78vw"});
    $(".facebook-icon").animate({right: "78vw"});
    $(".linkedin-icon").animate({right: "66vw"});
    $(".panel-menu").animate({left: "65vw"});
    $(".panel-flip").animate({right: "70vw"});
    flipped= 1;

    $("#panel-flip").attr("onclick", "resetview()");
    return;
}

function resetview(){
    $(".saving-icon").animate({left: "2vw"});
    $(".facebook-icon").animate({right: "2vw"});
    $(".linkedin-icon").animate({right: "14vw"});
    $(".panel-menu").animate({left: "14vw"});
    $(".panel-flip").animate({right: "16vw"});
    flipped = 0;
    $("#panel-flip").attr("onclick", "flipview()");
    return;
}


function showsideone(){
$("#subcat-box").animate({width:'toggle'},350);
$("#cat-box").animate({width:'toggle'},350);
$("#subcat-status").animate({width:'toggle'},350);
$("#side-tab2").animate({width:'toggle'},350);
$("#side-tab").fadeOut();
$('.feed-column').animate({"margin-left":"-320px"},1000);
}



function showsidetwo(){
$("#subcat-box").animate({width:'toggle'},350);
$("#cat-box").animate({width:'toggle'},350);
$("#subcat-status").animate({width:'toggle'},350);
$("#side-tab2").animate({width:'toggle'},350);
$("#side-tab").fadeIn();
$('.feed-column').animate({"margin-left":"-200px"},1000);
}


function panelbusiness(){
    $("#checklist-frontend-section").fadeOut();
    $("#checklist-backend-section").fadeOut();
    $("#checklist-business-section").fadeIn();
    document.getElementById("subcat-status").style.backgroundColor= "red";
}

function panelfrontend(){
    $("#checklist-backend-section").fadeOut();
    $("#checklist-business-section").fadeOut();
    $("#checklist-frontend-section").fadeIn();
    document.getElementById("subcat-status").style.backgroundColor= "blue";
}

function panelbackend(){
    $("#checklist-frontend-section").fadeOut();
    $("#checklist-business-section").fadeOut();
    $("#checklist-backend-section").fadeIn();
    document.getElementById("subcat-status").style.backgroundColor= "#32cd32";
}


function rolllogin(){
$(document).ready(function(){
    $("#welcome-transparent").slideUp();
});
return showsignin();
}

function rollregister(){
$(document).ready(function(){
    $("#welcome-transparent").slideUp();
});
return showsignup();
}


function rollup(){
$(document).ready(function(){
    $("#welcome-transparent").slideUp();
});
}

function changeview(){
$("#mediumView").animate({width:'toggle'},300);
$("#categoryView").animate({width:'toggle'},300);
}


function showcomments(id){
$("#transparent").fadeIn();
$("#transparent-comments").fadeIn();
commentingResource = id;
document.getElementById("transparent-comments-ajax").innerHTML = "<img style='position:absolute;left:50%;margin-left:-50px;top:35%;' src='/pictures/squares-loader.gif'>";
var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // This is an error 
                if(xmlhttp.responseText == -1){
                }
                else {
                    document.getElementById("transparent-comments-ajax").innerHTML = xmlhttp.responseText;
                }

                                    }
                            }         
        xmlhttp.open("GET", "/PHP/commentFetcher.php?id="+id , true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();
}



function setvisitor(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    }
                            }         
        xmlhttp.open("POST", "PHP/account/setvisitor.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();



}
// This function takes the id of a minicard and its medium and category and deletes
// the card from the users favorites and updates the count numbers in the library
//

function removemini(id,cat,medium){

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                var name = "mini-";
                name += id;
                var jname = "#"+name+","+"#"+name;
                $(jname).fadeOut();

// The category status is decreased
                if (cat == "BE"){
                    var temp = document.getElementById("back-count").innerHTML;
                    temp--;
                    document.getElementById("back-count").innerHTML = temp;
                }
                if (cat == "FE"){
                    var temp = document.getElementById("front-count").innerHTML;
                    temp--;
                    document.getElementById("front-count").innerHTML = temp;
                }
                if (cat == "BD"){
                    var temp = document.getElementById("business-count").innerHTML;
                    temp--;
                    document.getElementById("business-count").innerHTML = temp;
                }
// The medium status is updated
                if(medium == "Website"){
                    var temp = document.getElementById("website-count").innerHTML;
                    temp--;
                    document.getElementById("website-count").innerHTML = temp;
                }
                if(medium == "Video/Audio"){
                    var temp = document.getElementById("media-count").innerHTML;
                    temp--;
                    document.getElementById("media-count").innerHTML = temp;
                }
                if(medium == "Book"){
                    var temp = document.getElementById("books-count").innerHTML;
                    temp--;
                    document.getElementById("books-count").innerHTML = temp;
                }
                if(medium == "Influencer"){
                    var temp = document.getElementById("influencer-count").innerHTML;
                    temp--;
                    document.getElementById("influencer-count").innerHTML = temp;
                }

                                            }
                                    }
                        }
         
        xmlhttp.open("POST", "PHP/account/unfavorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);

            }



function deleteaccount(){
var one = document.getElementById("update-username").value;
var two = document.getElementById("deleteaccount-password").value;



        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                   window.location.replace("logout.php"); 
                }
                if(xmlhttp.responseText == 0){
                    document.getElementById("changepassword-condition-delete").innerHTML = "Wrong Password";
                }



        }
    }
        document.getElementById("changepassword-condition-delete").innerHTML = "Processing";
        xmlhttp.open("POST", "/PHP/account/update.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&delpass="+two);

}



function currentpassword(){
var one = document.getElementById("update-username").value;
var two = document.getElementById("changepassword-password").value;
var three = document.getElementById("changepassword-password1").value;
var four = document.getElementById("changepassword-password2").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){//Success
                      if(four == three && three.length > 4){
                            //Update the password
                            var mlhttp = new XMLHttpRequest();
                            mlhttp.onreadystatechange = function() {
                            if (mlhttp.readyState == 4 && mlhttp.status == 200) {
                                //document.getElementById("change-password").innerHTML = "Just above conditions";
                                if(mlhttp.responseText == 1){
                                   document.getElementById("change-password").innerHTML = "Your password was updated successfully";
                                }
                                if(mlhttp.responseText == 0){
                                   document.getElementById("change-password").innerHTML = "Oops! Something went wrong, please refresh the page and try again";
                                }
                            }}
                            document.getElementById("change-password").innerHTML = "We are working";
                            mlhttp.open("POST", "/PHP/account/update.php", true);
                            mlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            mlhttp.send("user="+one+"&pass="+two+"&newpass="+four);
                      }
                      else
                      {
                if(three.length <= 4){
                    document.getElementById("changepassword-condition1").innerHTML = "The password is too short!";
                }
                else{
                    document.getElementById("changepassword-condition2").innerHTML = "The passwords do not match!";      
                      }
                      }
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("changepassword-condition").innerHTML = "Wrog password!";
                }
            }
        }
        document.getElementById("changepassword-condition").innerHTML = "";
        document.getElementById("changepassword-condition1").innerHTML = "";
        document.getElementById("changepassword-condition2").innerHTML = "";
        xmlhttp.open("POST", "/login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);

}


var loadFile = function(event) {
    var output = document.getElementById('samplecard-image');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

function del(){
$("#change-password").fadeOut();
$("#account-delete").fadeIn();
}




function showchangepassword(){
$("#change-password").fadeIn();
$("#account-delete").fadeOut();

}
function closechangepassword(){
$("#change-password").fadeOut();
}

function showsignup(){
$("#transparent-signin").fadeOut();
$("#transparent").fadeIn();
$("#transparent-signup").fadeIn();
//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-signup").style.display = 'block';
}

function showsignin(){
$("#transparent-signup").fadeOut();
$("#transparent").fadeIn();
$("#transparent-signin").fadeIn();
//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-signin").style.display = 'block';
}

function showprofile(){
$("#transparent").fadeIn();
$("#transparent-profile").fadeIn();

//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-profile").style.display = 'block';
}

function closeall(){
$("#transparent").fadeOut();
$("#transparent-signup").fadeOut();
$("#transparent-signin").fadeOut();
$("#transparent-profile").fadeOut();
$("#transparent-box").fadeOut();
$("#transparent-square").fadeOut();
$("#change-password").fadeOut();
$("#transparent-comments").fadeOut();

// MOBILE STUFF
$(".flat-panel").animate({"margin-bottom": "-30vh"});
//document.getElementById("transparent").style.display = 'none';
//document.getElementById("transparent-signup").style.display = 'none';
//document.getElementById("transparent-signin").style.display = 'none';
//document.getElementById("transparent-profile").style.display = 'none';
//document.getElementById("transparent-box").style.display = 'none';
//document.getElementById("transparent-square").style.display = 'none';


}


function numloader(last,string){
if(Ended == 0){ 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            LastCard = xmlhttp.responseText;}
                                            }
        xmlhttp.open("GET", "/PHP/numloader.php?last=" + last +"&cat="+string, true);
        xmlhttp.send();}
}


function loader(last,string){
  var loader;
// First check to see if ended was set to 1, if so then do nothing
    if(Ended == 1){return;}
    else{
// Else connect to a file called loader.php, get the results
// then create another child for feed and then put the results there
        Frame++;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 0){
                // Set Ended to 1 and then show a flag showing that there
                // are no more cards to be displayed
                Ended = 1;
                var node = document.createElement("DIV");
                node.setAttribute("id", "Frame"+Frame);
                document.getElementById("feed").appendChild(node);
                document.getElementById("Frame"+Frame).innerHTML = "<div class='end-of-feed'> End of Stack!</div>";
                  if(Load==1){loader.parentNode.removeChild(loader);Load=0;}    


                }
            else{// Append the content to the feed
                var node = document.createElement("DIV");
                node.setAttribute("id", "Frame"+Frame);
                document.getElementById("feed").appendChild(node);
                document.getElementById("Frame"+Frame).innerHTML = xmlhttp.responseText;
                if(Load == 1){loader.parentNode.removeChild(loader);Load=0;}
                }
            }// if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        }// xmlhttp.onreadystatechange

        if(Load == 0){
            Load = 1;
            loader = document.createElement("DIV");
            loader.setAttribute('id', 'loader');
            loader.innerHTML = "<img style='position:relative;padding-bottom:100px;left:50%;margin-left:-30px;margin-top:10px;'  src='/logo/loading.gif' title='Loading, please wait..'>";
            document.getElementById("feed").appendChild(loader);
}
        xmlhttp.open("GET", "/PHP/loader.php?last=" + last+"&cat="+string, true);
        xmlhttp.send();
            }//else
}


function favorite(cardid) {
   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  id = "save-";
                  id += cardid;
                  //document.getElementById("XXX").innerHTML = id;
                  output = "<span onclick=\'unfavorite(";
                  output += cardid;
                      if(flipped == 0){output += ")\'  > <img class='saving-icon' src=\'/pictures/cross-red.png\'  width=\'auto\' height=\'100%\' ></span>";}
                        else{output += ")\'  > <img  style ='left:78vw;' class='saving-icon' src=\'/pictures/cross-red.png\'  width=\'auto\' height=\'100%\' ></span>";}
                      document.getElementById(id).innerHTML= output;
                    }
     }
   }         

        if(flipped == 0){document.getElementById("save-"+cardid).innerHTML="<img class='saving-icon' src='/pictures/ajax_loader.gif' width='auto' height='100%' >";}
        else{document.getElementById("save-"+cardid).innerHTML="<img style ='left:78vw;' class='saving-icon' src='/pictures/ajax_loader.gif' width='auto' height='100%' >";}
    xmlhttp.open("POST", "/PHP/account/favorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+cardid);
}

function approve(cardid) {
   var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  id = "approve-";
                  id += cardid;
                      document.getElementById(id).innerHTML= "";
                    }
     }
   }    
 
    document.getElementById("approve-"+cardid).innerHTML="<img style='position:relative;top:10px;' src='/pictures/ajax_loader.gif' width='55' height='55' >";    
        xmlhttp.open("POST", "approve.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+cardid);
}
function unfavorite(cardid) {
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                id = "save-";
            id += cardid;
                //document.getElementById("XXX").innerHTML = id;
                output = "<span onclick=\'favorite(";
                output += cardid ;
                if(flipped == 0){output += ")\'    > <img class='saving-icon' src=\'/pictures/save.png\'  width=\'auto\' height=\'100%\' ></span>";}
                else{output += ")\'    > <img style ='left:78vw;' class='saving-icon' src=\'/pictures/save.png\'  width=\'auto\' height=\'100%\' ></span>";}
                document.getElementById(id).innerHTML= output;
                            }
                                    }
                            }         
       if(flipped == 0){document.getElementById("save-"+cardid).innerHTML="<img class='saving-icon' src='/pictures/ajax_loader.gif' width='auto' height='100%' >";}
        else{document.getElementById("save-"+cardid).innerHTML="<img style ='left:78vw;' class='saving-icon' src='/pictures/ajax_loader.gif' width='auto' height='100%' >";}
        xmlhttp.open("POST", "/PHP/account/unfavorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+cardid);
                }
                




function activate(str){
if(str.length > 5){document.getElementById("submit_bt").disabled = false;}
else {document.getElementById("submit_bt").disabled = true;}
}









function available(str) {
    if (str.length < 4) { 
        document.getElementById("user-status").innerHTML = "too short";
        username = 0;
        {document.getElementById("submit_btn").disabled = true;}
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  document.getElementById("user-status").innerHTML = "okay";
                  username = 1;
                  if(username ==1 && email ==1 && pass == 1 && repass ==1)
                  {document.getElementById("submit_btn").disabled = false;}
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("user-status").innerHTML = "taken";
                  username = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
            }
        }
        xmlhttp.open("GET", "PHP/usernamecheck.php?username=" + str, true);
        xmlhttp.send();
    }
}

function userlogin(str) {
    if (str.length < 4) { 
        //document.getElementById("welcome-message").innerHTML = "too short";
        {//document.getElementById("login-password").disabled = true;
    }
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                   //document.getElementById("welcome-message").innerHTML = "Doesnt exist";
                  {//document.getElementById("login-password").disabled = true;
              }
                }
                if(xmlhttp.responseText == 0){
                  //document.getElementById("welcome-message").innerHTML = "Okay";
                  {document.getElementById("login-password").disabled = false;}
                }
            }
        }
        xmlhttp.open("GET", "PHP/usernamecheck.php?username=" + str, true);
        xmlhttp.send();
    }
}

function valid(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  document.getElementById("email-status").innerHTML = "well formed :-)";
                  email = 1;
                  if(username ==1 && email ==1 && pass == 1 && repass ==1)
                  {document.getElementById("submit_btn").disabled = false;}
                }
                 if(xmlhttp.responseText == 0){
                  document.getElementById("email-status").innerHTML = "ill-formed email address";
                  email = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
        if(xmlhttp.responseText == 2){
                  document.getElementById("email-status").innerHTML = "already registered";
                  email = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
           }
        }
        xmlhttp.open("GET", "emailcheck.php?email=" + str, true);
        xmlhttp.send();
}



function passcheck(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  document.getElementById("pass-status").innerHTML = "good";
                  pass = 1;
                  if(username ==1 && email ==1 && pass == 1 && repass ==1)
                  {document.getElementById("submit_btn").disabled = false;}
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("pass-status").innerHTML = "too short";
                  pass = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
            }
        }
        xmlhttp.open("POST", "PHP/account/passwordcheck.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("pass="+str);
}






function changepasswordstepone(){
var one = document.getElementById("changepassword-user").value;
var two = document.getElementById("changepassword-password").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

         //document.getElementById("condition").innerHTML =  xmlhttp.responseText;

                if(xmlhttp.responseText == 1){
                  document.getElementById("change-password-inner").innerHTML = '<form  id="changepassword-form" action="login.php" method="post">'
                    +'<div class="form-group">'
                    +'<label for="user">This should be the new form </label>'
      +'<input  class="form-control" type="password"  name="user" id="changepassword-password">'
      +'<span id="changepassword-condition" style="display:inline-block;margin:5px;color:red;"></span>'
      //+'<input type="submit" id="submit" style="float:right;margin-top:10px;" class="btn btn-danger btn-sm" value="Next" onclick="changepasswordstepone()">'
      +'</div>'
      +'</form>'
                  ;
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("changepassword-condition").innerHTML = "Wrong password!";
                }
        if(xmlhttp.responseText == -1){
                  //document.getElementById("condition").innerHTML = "Please verify your email";
                 
                }
            }
    
        }
        document.getElementById("changepassword-condition").innerHTML = "";
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);




}


function login() {
var one = document.getElementById("loginusername").value;
var two = document.getElementById("login-password").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

         //document.getElementById("condition").innerHTML =  xmlhttp.responseText;

                if(xmlhttp.responseText == 1){
                  window.location.replace(".");
                  document.getElementById("condition").innerHTML = "good, lets go";
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("condition").innerHTML = "The username and password do not match!";
                }
        if(xmlhttp.responseText == -1){
                  document.getElementById("condition").innerHTML = "Please verify your email";
                 
                }
        if(xmlhttp.responseText == 2){
                  document.getElementById("condition").innerHTML = "Too many attemps, come back in 15 minutes";        
                }
            }
    
        }
        document.getElementById("condition").innerHTML = "";
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);
}

function deleteComment(id,resource){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == -1){ }
                if(xmlhttp.responseText == 1){
                $("#single-comment-"+id).fadeOut();
                var counter = document.getElementById("comment-counter-"+resource).innerHTML;
                counter--;
                document.getElementById("comment-counter-"+resource).innerHTML = counter;



                }
            }   
        }
        xmlhttp.open("POST", "PHP/commentDelete.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("commentid="+id);



}


/////////////////////////////////////
var commentingResource;
function commentUpload(){
var comment = document.getElementById("comment").value;
if(comment.length < 1){return;}
var resource = commentingResource;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == -1){ }
                else{
                    var node = document.createElement("DIV");
                    node.innerHTML = xmlhttp.responseText;
                    document.getElementById("commentAppend").appendChild(node);
                    document.getElementById("commentAppend").scrollTop = document.getElementById("commentAppend").scrollHeight;
                    document.getElementById("comment").value = "";
                    var counter = document.getElementById("comment-counter-"+resource).innerHTML;
                    counter++;
                    document.getElementById("comment-counter-"+resource).innerHTML = counter;
                }
            }   
        }
        xmlhttp.open("POST", "PHP/commentUploader.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("resource="+resource+"&comment="+comment);
}


$(document).ready(function(){
    $("#commentform").submit(function(event) {
    event.preventDefault();
});});


$(document).ready(function(){
    $("#login-form").submit(function(event) {
event.preventDefault();
login();
 });});

function passmatch(){
            if(document.getElementById("password").value == document.getElementById("password1").value){
                document.getElementById("pass1-status").innerHTML = "matched";
                repass = 1;
                        if(username ==1 && email ==1 && pass == 1 && repass ==1)
                    {document.getElementById("submit_btn").disabled = false;}
                            }
            if(document.getElementById("password").value != document.getElementById("password1").value){
                document.getElementById("pass1-status").innerHTML = "not mached";
                repass = 0;
                {document.getElementById("submit_btn").disabled = true;}
                            }
            }       
function passmatchrec(){ //for password recovery
            if(document.getElementById("password").value == document.getElementById("password1").value){
                document.getElementById("pass1-status").innerHTML = "matched";
                repass = 1;
                        if(pass == 1 && repass ==1)
                    {document.getElementById("submit_btn").disabled = false;}
                            }
            if(document.getElementById("password").value != document.getElementById("password1").value){
                document.getElementById("pass1-status").innerHTML = "not mached";
                repass = 0;
                {document.getElementById("submit_btn").disabled = true;}
                            }
            }                   


// This function is used to deleted resources. Only the ownsers can remove the resources.
function deleteResource(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                if(xmlhttp.responseText == 1){
                
                } // if clause
                if(xmlhttp.responseText == 0){
                  document.getElementById("condition").innerHTML = "The username and password do not match!";
                } // if clause
            }// if clause
    
        } // onreadystatechange
        xmlhttp.open("POST", "deleteResource.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+one);
}

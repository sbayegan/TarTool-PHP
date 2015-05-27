<?php
include('datalogin.php');
echo "<!DOCTYPE html>";
echo "<html>";

if(isset($_COOKIE['junto'])){
header('Location: http://junto.link/home.php');

}

echo "<head>";
echo "<title>";
echo "</title>";
echo '<link rel="stylesheet" type="text/css" href="style.css">';

echo '
<script>
var username = 0;
var email = 0;
var pass = 0;
var repass = 0;
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
        xmlhttp.open("GET", "usernamecheck.php?username=" + str, true);
        xmlhttp.send();
    }
}

function userlogin(str) {
    if (str.length < 4) { 
        document.getElementById("welcome-message").innerHTML = "too short";
        {document.getElementById("login-password").disabled = true;}
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                   document.getElementById("welcome-message").innerHTML = "Doesnt exist";
                  {document.getElementById("login-password").disabled = true;}
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("welcome-message").innerHTML = "Okay";
                  {document.getElementById("login-password").disabled = false;}
                }
            }
        }
        xmlhttp.open("GET", "usernamecheck.php?username=" + str, true);
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
        xmlhttp.open("POST", "passwordcheck.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("pass="+str);
}








function login(two) {
one = document.getElementById("loginusername").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

		 document.getElementById("condition").innerHTML =  xmlhttp.responseText;

                if(xmlhttp.responseText == 1){
                  document.getElementById("condition").innerHTML = "good, lets go";
		  window.location.replace("home.php");

                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("condition").innerHTML = "Waiting for the correct password";
                 
                }
 		if(xmlhttp.responseText == -1){
                  document.getElementById("condition").innerHTML = "Not activated, Please verify your email address and retype your password";
                 
                }
            }
	
        }
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);
}

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
</script>';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo "<body>";
echo '<div class="stick-to-top">';

echo '<div class="top-left"> <img src="/pictures/logo.png" alt="logo" height="85" width="185"/>  </div>';
echo '<div class="top-right">';


echo '<span style="position:absolute;right:50px;top:20px;"> <a href="feed.php"><img src="http://junto.link/pictures/glasses.png" height="45" width="45"></a></span>';

echo '</div>';
echo '</div>';


echo '<div class="middle-box">';

echo '<div class="signin-box">';
echo '<h2 style="margin-left:110px;"> Lets go ! </h2>';
echo '<form autocomplete="off">
<b>
<div class="form">
<label for="username">User name :</label>
<input type="text" name="username" id="loginusername"  onkeyup="userlogin(this.value)"/>
<span id="welcome-message"></span>
</div>
 <div class="form">
 <label for="password1">Password :</label>
 <input type="password" length="25" name="password" id="login-password" onkeyup="login(this.value)" disabled/>

</div>
</b>
<span id="condition"></span>';
echo '<div style="position:absolute;margin-left:50px;padding-top:60px;">
<a href="twitter/login_to_twitter.php">
<img src="https://g.twimg.com/dev/sites/default/files/images_documentation/sign-in-with-twitter-gray.png" title="Click to login with twitter">
</a>
</div>
';
if($_GET['sign'] == 1){

echo '<div style="position:absolute;color:red; margin-left: 30px;padding-top:30px;"> Verify your email before you sign in </div>';

}


echo '</form>
';


echo '</div>';echo '<div class="signup-box">';
echo '<h2 style="margin-bottom:30px"> Create your Junto Account </h2>';
echo
'<div  id="content">
<b>
 <form action="registeration.php" method="post" id="form" autocomplete="off">
 <div class="form">
 <label for="full_name">Name :</label>
 <input type="text" name="full_name" placeholder="your name" id="full_name" />
 </div>

 <div class="form">
 <label for="email">Email  :</label>
 <input type="text" name="email" placeholder="your email address" id="email" onkeyup="valid(this.value)"/>
 <span id="email-status"></span>
 </div>
 
 <div class="form">
 <label for="username">Username :</label>
 <input type="text" name="username" id="username" placeholder="at least four characters" onkeyup="available(this.value)"/>
 <span id="user-status"> </span> 
 </div>

 <div class="form">
 <label for="password">Password :</label>
 <input type="password" length="25" name="password" id="password" placeholder="at least 8 characters" onkeyup="passcheck(this.value)"/>
 <span id="pass-status"> </span> 
 </div>
</b>
  <div class="form">
 <label for="password1">Retype Password :</label>
 <input type="password" length="25" name="retype password" id="password1" onkeyup="passmatch()"/>
 <span id="pass1-status"> </span> 
 </div>

<div class="form">
Who are you? 
 <select name="type" form="form" id="dropdown">
        <option value="NULL">choose one</option>
        <option value="one">a founder</option>
        <option value="two">working at a startup</option>
         <option value="three">I just like strartups</option>
        <option value="four">None of your business!</option>
    </select>
 </div>
 <div>
 <input name="submit" type="submit" value="Create my account" id="submit_btn" disabled />
 </div>
    
 </form>

</div>';

echo '</div>';


echo '</div>';
echo '</body>';


$conn->close();
echo' </html>';
?>

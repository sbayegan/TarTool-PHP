<?php
include('UniversalHeader.php');
include('datalogin.php');
include('printer.php');
if(!isset($_COOKIE['junto'])){
header('Location: http://junto.link/index.php');
}

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>";
echo $UniversalName;
echo "</title>";
echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
echo '
<link rel="stylesheet" type="text/css" href="style.css">
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#myModal").modal(\'show\');
	});
</script>
<script>
function removemini(id){

 	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
 				var name = "mini-";
				name += id;
				var element = document.getElementById(name);
				element.parentNode.removeChild(element);
                                            }
     								}
   						}
         
        xmlhttp.open("POST", "unfavorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);

			}
</script>
';
echo '
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script>
  $(function() {
    $( "#accordion" ).accordion(
{
active:false,
collapsible:true,
heightStyle: "content"
}
);
});
</script>
                <script>
var lastused = 2;
var currentcat = "BD"
function activate(str){
if(str.length > 5){document.getElementById("submit_bt").disabled = false;}
else {document.getElementById("submit_bt").disabled = true;}
//document.getElementById("submit_bt").disabled = false;
}
function update(str){
lastused = 2;
document.getElementById("adderbutton").disabled = false;
if (document.getElementById("D5")){var element = document.getElementById("D5");element.parentNode.removeChild(element);}
if (document.getElementById("D4")){var element = document.getElementById("D4");element.parentNode.removeChild(element);}
if (document.getElementById("D3")){var element = document.getElementById("D3");element.parentNode.removeChild(element);}
if (document.getElementById("D2")){var element = document.getElementById("D2");element.parentNode.removeChild(element);}
currentcat = str;
if(str == "FE"){document.getElementById("D1").innerHTML = 
	\'<option value="">Choose One</option>\'+
        \'<option value="UserInterface">User Interface</option>\'+
        \'<option value="UserExperience">User Experience</option>\'+
        \'<option value="MockupsAndWireframing">Mockups & Wireframing</option>\'+
        \'<option value="HTML">HTML</option>\'+
        \'<option value="CSS">CSS</option>\'+
        \'<option value="JavaScript">JavaScript</option>\'+
        \'<option value="Themes">Themes</option>\'+
        \'<option value="Mobile">Mobile</option>\'+
        \'<option value="FrontEndiOS">iOS</option>\'+
        \'<option value="FrontEndAndroid">Android</option>\'+
        \'<option value="Bootstrap">Bootstrap</option>\'+
        \'<option value="XML">XML</option>\'+
	\'<option value="JQuery">jQuery</option>\'+
	\'<option value="Angular">Angular</option>\'+
	\'<option value="Canvas">Canvas</option>\'+
	\'<option value="SVG">Scalable Vector Graphics</option>\'+
	\'<option value="JSON">JSON</option>\'+
        \'<option value="Ajax">Ajax</option>\';
}
if(str == "BE"){document.getElementById("D1").innerHTML = 
	\'<option value="">Choose One</option>\'+
        \'<option value="Security">Security</option>\'+
        \'<option value="DataManagement">Data Management</option>\'+
        \'<option value="Hosting">Hosting</option>\'+
        \'<option value="PHP">PHP</option>\'+
        \'<option value="Python">Python</option>\'+
	\'<option value="ASPNET">ASP.NET</option>\'+
	\'<option value="VBScript">Visual Basic Script</option>\'+
	\'<option value="SQL">SQL</option>\'+
	\'<option value="C">C</option>\'+
	\'<option value="C++">C++</option>\'+
	\'<option value="Shell">Shell</option>\'+
	\'<option value="Java">Java</option>\'+
	\'<option value="Ruby">Ruby</option>\'+
	\'<option value="Objective-C">Objective-C</option>\'+
	\'<option value="Swift">Swift</option>\'+
        \'<option value="C#">C#</option>\'+
        \'<option value="Debugging Tools">Debugging</option>\';
}
if(str == "BD"){document.getElementById("D1").innerHTML = 
	\'<option value="">Choose One</option>\'+
	\'<option value="LeanStartup">Lean Startup</option>\'+
        \'<option value="MarketingAndResearch">Marketing & Research</option>\'+
        \'<option value="Naming">Naming</option>\'+
        \'<option value="CopyWriting">Copywriting</option>\'+
        \'<option value="Analytics">Analytics</option> \'+
        \'<option value="Launching">Launching</option>\'+
	\'<option value="UserFeedback">User Feedback</option>\'+        
        \'<option value="SEO">SEO</option>\'+
        \'<option value="SocialMediaCommunity">Social Media & Community</option>\'+
        \'<option value="ProjectManagement">Project Management</option>\'+
        \'<option value="CustomerService">Customer Service</option>\'+
        \'<option value="InventoryManagement">Inventory Management</option>\'+
        \'<option value="Sales">Sales</option>\'+
	\'<option value="Funding">Funding</option>\'+
	\'<option value="Administration">Administration</option>\'+
	\'<option value="Productivity">Productivity</option>\'+
        \'<option value="Outsourcing">Outsourcing</option>\'+
        \'<option value="E-commerce">E-commerce</option>\'+
	\'<option value="AcceleratorsAndIncubators">Accelerators & Incubators</option>\'+
	\'<option value="Events">Events</option>\';
}
}
function add() {
var FE = 
	\'<select name="subcat\' + lastused + \'" form="form" class="form-control" id=lastused>\'+
	\'<option value="">Choose One</option>\'+
        \'<option value="UserInterface">User Interface</option>\'+
        \'<option value="UserExperience">User Experience</option>\'+
        \'<option value="MockupsAndWireframing">Mockups & Wireframing</option>\'+
        \'<option value="HTML">HTML</option>\'+
        \'<option value="CSS">CSS</option>\'+
        \'<option value="JavaScript">JavaScript</option>\'+
        \'<option value="Themes">Themes</option>\'+
        \'<option value="Mobile">Mobile</option>\'+
        \'<option value="FrontEndiOS">iOS</option>\'+
        \'<option value="FrontEndAndroid">Android</option>\'+
        \'<option value="Bootstrap">Bootstrap</option>\'+
        \'<option value="XML">XML</option>\'+
	\'<option value="JQuery">jQuery</option>\'+
	\'<option value="Angular">Angular</option>\'+
	\'<option value="Canvas">Canvas</option>\'+
	\'<option value="SVG">Scalable Vector Graphics</option>\'+
	\'<option value="JSON">JSON</option>\'+
        \'<option value="Ajax">Ajax</option>\'+
	\'</select>\';
var BE = 
	\'<select name="subcat\'+ lastused +\'" form="form" class="form-control" id=lastused>\'+
	\'<option value="">Choose One</option>\'+
        \'<option value="Security">Security</option>\'+
        \'<option value="DataManagement">Data Management</option>\'+
        \'<option value="Hosting">Hosting</option>\'+
        \'<option value="PHP">PHP</option>\'+
        \'<option value="Python">Python</option>\'+
	\'<option value="ASPNET">ASP.NET</option>\'+
	\'<option value="VBScript">Visual Basic Script</option>\'+
	\'<option value="SQL">SQL</option>\'+
	\'<option value="C">C</option>\'+
	\'<option value="C++">C++</option>\'+
	\'<option value="Shell">Shell</option>\'+
	\'<option value="Java">Java</option>\'+
	\'<option value="Ruby">Ruby</option>\'+
	\'<option value="Objective-C">Objective-C</option>\'+
	\'<option value="Swift">Swift</option>\'+
        \'<option value="C#">C#</option>\'+
        \'<option value="Debugging Tools">Debugging</option>\'+
	\'</select>\';
var BD = 
 	\'<select name="subcat\'+ lastused + \'" form="form" class="form-control" id=lastused>\'+
 	\'<option value="">Choose One</option>\'+
        \'<option value="LeanStartup">Lean Startup</option>\'+
        \'<option value="MarketingAndResearch">Marketing & Research</option>\'+
        \'<option value="Naming">Naming</option>\'+
        \'<option value="CopyWriting">Copywriting</option>\'+
        \'<option value="Analytics">Analytics</option> \'+
        \'<option value="Launching">Launching</option>\'+
	\'<option value="UserFeedback">User Feedback</option>\'+        
        \'<option value="SEO">SEO</option>\'+
        \'<option value="SocialMediaCommunity">Social Media & Community</option>\'+
        \'<option value="ProjectManagement">Project Management</option>\'+
        \'<option value="CustomerService">Customer Service</option>\'+
        \'<option value="InventoryManagement">Inventory Management</option>\'+
        \'<option value="Sales">Sales</option>\'+
	\'<option value="Funding">Funding</option>\'+
	\'<option value="Administration">Administration</option>\'+
	\'<option value="Productivity">Productivity</option>\'+
        \'<option value="Outsourcing">Outsourcing</option>\'+
        \'<option value="E-commerce">E-commerce</option>\'+
	\'<option value="AcceleratorsAndIncubators">Accelerators & Incubators</option>\'+
	\'<option value="Events">Events</option>\'+
\'</select>\' ;
var node = document.createElement("DIV");
node.setAttribute("id", "D"+lastused);
document.getElementById("adder").appendChild(node);              
if(currentcat == "BE"){document.getElementById("D"+lastused).innerHTML = BE;}
if(currentcat == "BD"){document.getElementById("D"+lastused).innerHTML = BD;}
if(currentcat == "FE"){document.getElementById("D"+lastused).innerHTML = FE;}
lastused = lastused + 1;
if (lastused == 6){
document.getElementById("adderbutton").disabled = true;
}
}
</script>
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
		  window.location.replace("index.php");
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
</script>
';
 
echo "</head>";
// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo '<body style="background-color:white;">';
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <a href="index.php"><img src="/logo/junto_logo_solo.png" alt="logo" height="70" width="60"/> </a> </span>';
echo '<div class="top-left-name">tarTool</div>';

if(isset($_COOKIE['junto'])){
//echo '<span style="position:absolute;right:250px;top:10px;"><a href="check.php"> <img src="http://junto.link/pictures/check.png" height="65" width="65"></a></span>';
//echo '<span style="position:absolute;right:150px;top:10px;"><a href="profile.php"> <img src="http://junto.link/pictures/user.png" height="65" width="65"></a></span>';
//echo '<span style="position:absolute;right:350px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
}
else{
//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:150px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="#sign"  data-toggle="modal"><img src="pictures/power.png" height="45" width="45"></a></span>';
}
 
echo '</div>';
echo '<div class="slider">';

if(!isset($_COOKIE['junto']))
{
echo '
<img src="http://junto.link/pictures/check.png" height="100" width="100" style="position:absolute;left:10px;top:210px">
<img src="http://junto.link/pictures/reader.png" height="100" width="100" style="position:absolute;left:0px;top:330px">
<img src="http://junto.link/pictures/save.png" height="80" width="80" style="position:absolute;left:20px;top:460px">
<div style="position:relative;left:105px;width:70px;height:380px;top:200px;border:0px dashed black;z-index:0;">
<span style="display:block;margin-top:55px">Personalize</span> <span style="display:block;margin-top:110px">Discover</span><span style="display:block;margin-top:83px">Save</span>
</div>
</div>';
}
else{
echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
<a href="index.php">
<div style="position:relative;margin-left:40px;"><img src="pictures/glasses.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
Feed
</div>
</a>
</div>';
echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
<a href="#submit" data-toggle="modal">
<div style="position:relative;margin-left:40px;"><img src="pictures/pencil.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
Submit<br> Resource
</div>
</a>
</div>';
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
<a href="library.php">
<div style="position:relative;margin-left:40px;margin-top:25px"><img src="pictures/book.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:-10px;text-align:center;">
My library
</div>
</a>
</div>
';
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
<a href="check.php">
<div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/check.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;text-align:center">
My streams
</div>
</a>
</div>
';
/*
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:80px;width:150px;height:100px;border:0px dashed black;">
<a href="account.php">
<div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/user.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;text-align:center">
<b>Account<br>settings</b>
</div>
</a>
</div>
';*/
}
echo '</div>';

if(isset($_COOKIE['junto'])){
}
echo '
<div style="position:fixed;left:150px;margin-bottom:185px;top:86px;width:calc(100% - 0px);margin-right:200px;height:90%;overflow:scroll;background-color: white">
<div class="shelve-title">Website/Tools</div>
	<div class="shelve" style="background-color:#f1c40f;">
';
$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Website'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}

}


echo '
</div>
<div class="shelve-title">Video/Audio</div>

	<div class="shelve" style="background-color:#e74c3c;">';
//minicard(10);minicard(6);minicard(7);minicard(12);minicard(13);minicard(10);
$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Video/Audio'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}


echo '</div>';
echo '<div class="shelve-title">Blogs</div>';
echo '<div class="shelve" style="background-color:#2ecc71;">';

$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Blog'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}

//minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);
echo '</div>';
echo '<div class="shelve-title">Books</div>';
echo '<div class="shelve" style="background-color:#9b59b6;">';


$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Book'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}

//minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);
echo '</div>';
echo '<div class="shelve-title">Influencers</div>';
echo '<div class="shelve" style="background-color:#3498db;">';

$query = "SELECT * FROM FAVOURITES WHERE USERID=".$_COOKIE['junto'];
//echo $query;
$result = $conn->query($query);
while($item = mysqli_fetch_assoc($result)){
$query = "SELECT * FROM RESOURCES WHERE RESOURCEID=".$item['RESOURCEID']." AND MEDIUM='Influencer'";
$bit = $conn->query($query);
if($bit->num_rows != 0){minicard($item['RESOURCEID']);}
}

//minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);minicard(10);
echo '</div>';


echo '</div>';





echo '
<div id="submit" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Submit a card</h4>
            </div>
            <div class="modal-body">
                
<form  class="form-asd" role="form" action="submit.php" method="get" autocomplete="off">
   
   <div class="form-group">
   <label for="title">Title:</label>
   <input type="text" name="title" id="title"  size="45" class="form-control"/>
   <span id="title-status"></span> 

   <label for="description">Description:</label><br>
   <textarea rows="4" cols="50" name="description" id="description" class="form-control"></textarea>
   <span id="description-status"></span>

   <label for="url">URL:</label>
   <input type="text" name="url" id="url" size="45" onchange="activate(this.value)" class="form-control"/>
   <span id="url-status"> </span> 

   <label for="type">Medium: </label> 
   <select name="type"  class="form-control">
    <option value="Video/Audio">Video</option>
    <option value="Website">Website/Tool</option>
    <option value="Influencer">Twitter influencer</option>
    <option value="Blog">Blog</option>
    <option value="Book">Book</option>
   </select>
   </div>
  
     
     <div id="adder" class="form-group">
       <div>
       <label for="cat"> Category: </label> 
          <select name="cat"  onchange="update(this.value)" class="form-control">
          <option value="BD">Business development</option>
          <option value="FE">Front-end development/Design</option>
          <option value="BE">Back-end development</option>
          </select>
          <label > Labels: </label>  
          <select name="subcat1"  id="D1" class="form-control"> 
          <option value="">Choose One</option>
          <option value="LeanStartup">Lean Startup</option>
          <option value="MarketingAndResearch">Marketing & Research</option>
          <option value="Naming">Naming</option>
          <option value="CopyWriting">Copywriting</option>
          <option value="Analytics">Analytics</option> 
          <option value="Launching">Launching</option>
	  <option value="UserFeedback">User Feedback</option>  
          <option value="SEO">SEO</option>
          <option value="SocialMediaCommunity">Social Media & Community</option>
          <option value="ProjectManagement">Project Management</option>
          <option value="CustomerService">Customer Service</option>
          <option value="InventoryManagement">Inventory Management</option>
          <option value="Sales">Sales</option>
          <option value="Funding">Funding</option>
	  <option value="Administration">Administration</option>
	  <option value="Productivity">Productivity</option>
          <option value="Outsourcing">Outsourcing</option>
          <option value="E-commerce">E-commerce</option>
	  <option value="AcceleratorsAndIncubators">Accelerators & Incubators</option>
	  <option value="Events">Events</option>
          </select>
        </div>
      </div>
     
      
<button type="button" id="adderbutton" class="btn btn-default btn-xs" onclick="add()">add another category</button>
                
                
                <p class="text-warning"><small></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                
                <input type="submit" value="submit" class="btn btn-danger" id="submit_bt" >
                </form>
            </div>
            
	</div>
        </div>
    </div>
</div>
<div id="feedback" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Leave Your Feedback</h4>
            </div>
            <div class="modal-body">
                <form  class="form-asd" role="form" action="submit.php" method="get">
                <div class="form-group">
                <label for="title">Subject:</label>
                <input type="text" name="title" id="title"  size="45" class="form-control"/>
                <span id="title-status"></span> 
                </div>
                <div class="form-group">
                <label for="description">Your Feedback!</label><br>
                <textarea rows="4" cols="50" name="description" id="description" class="form-control"></textarea>
                <span id="description-status"></span>
                </div>
                
                <p class="text-warning"><small></small></p>
            </div>
            <div class="modal-footer">
                <input type="submit" value="submit" class="btn btn-danger" id="submit_bt" >
                 </form>
            </div>
        </div>
    </div>
</div>
<div id="sign" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Authentication</h4>
            </div>
            
            <div class="modal-body">
                
		<form autocomplete="off">
		<div class="form-group">
		<label for="username">Username:</label>
		<input type="text" name="username" id="loginusername"  onkeyup="userlogin(this.value)" class="form-control"/>
		<span id="welcome-message" class="text-warning"><small></small></span>
		<br>
		<label for="password">Password:</label>
 		<input type="password" length="25" name="password" id="login-password" onkeyup="login(this.value)" class="form-control"disabled/>
		<span id="condition" class="text-warning"><small></small></span>
		</div>
		<br>
		<a href="twitter/login_to_twitter.php">
			<img style="display:block;margin-left:auto;margin-right:auto;" src="https://g.twimg.com/dev/sites/default/files/images_documentation/sign-in-with-twitter-gray.png" title="Click to login with twitter">
		</a>
		<hr>
		</form>
			<form action="registeration.php" method="post" id="form" autocomplete="off">
 			 <div class="form-group">
			 <label for="full_name">Name :</label>
			 <input type="text" name="full_name" placeholder="your name" id="full_name" class="form-control"/>
 			 </div>
 			 <div class="form-group">
 			 <label for="email">Email  :</label>
			 <input type="text" name="email" placeholder="your email address" id="email" onkeyup="valid(this.value)" class="form-control"/>
			 <span id="email-status"></span>
			 </div>
 			 <div class="form-group">
 			<label for="username">Username:</label>
 			<input type="text" name="username" id="username" placeholder="at least four characters" onkeyup="available(this.value)" class="form-control"/>
 			<span id="user-status"> </span> 
 			</div>
 			 <div class="form-group">
			<label for="password">Password:</label>
 			<input type="password" length="25" name="password" id="password" placeholder="at least 8 characters" onkeyup="passcheck(this.value)" class="form-control" />
 			<span id="pass-status"> </span> 
 			</div>
 			<div class="form-group">
 			<label for="password1">Retype Password:</label>
			 <input type="password" length="25" name="retype password" id="password1" onkeyup="passmatch()" class="form-control" />
			 <span id="pass1-status"> </span> 
 			</div>
 			 	<div class="form-group">
				<label for="dropdown">Who are you?</label>
				<select name="type" form="form" id="dropdown" class="form-control" >
				<option value="NULL">choose one</option>
				<option value="one">a founder</option>
				<option value="two">working at a startup</option>
         			<option value="three">I just like strartups</option>
        			<option value="four">None of your business!</option>
        			</select>
				</div>
 			<div class="form-group">
 			<input name="submit" type="submit" value="Create my account" id="submit_btn" class="btn btn-danger" disabled />
 			</div>
    
 </form>
                
                <p class="text-warning"><small></small></p>
            </div>
            <div class="modal-footer">
                 </form>
            </div>
        </div>
    </div>
</div>
';
echo '</body>';
echo '<footer>';
//echo'<div class="footer-line">';
//echo'</div>';
echo '</footer>';
$conn->close();
echo '</html>';
?>

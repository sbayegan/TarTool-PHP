<?php
// Copyright 2015, Saeid Bayeganeh, All rights reserved
// Include the headers you need
include('UniversalHeader.php');
include('datalogin.php');
include('printer.php');

function interested($user, $subject){
include('datalogin.php');
$query = 'select * from INTERESTS where USERID='.$user.' and INTEREST="'.$subject.'"';
//echo '>'.$query;
$result=$conn->query($query);
if($result->num_rows > 0){return 1;}
else{return 0;}
}


// Introduce HTML
echo "<!DOCTYPE html>";
echo "<html>";

// HEADER ----------------------------------------------------------------------------------------------------------------
echo "<head>";
echo '<meta name="description" content="Tartool is a feed of startup resources essential to your success. Resources are streamed in 3 channels of Front-end, Back-end and Business development">';
// Set the title of the page
echo "<title>";
echo $UniversalName; echo " Startup Resources";
echo "</title>";

// Include the JavaScript code

echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
// Include the headers associated wth bootstrap
echo 
'<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';
echo '<script src="JS/code.js"></script>';
// Include the headers associated with jQuery
echo 
'<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>';
echo "</head>";


// BODY -----------------------------------------------------------------------------------------------------------------------
echo '<body >';
 

// WELCOME TRANSPARENT
echo '<div class="welcome-transparent" id="welcome-transparent">
<span style="position:fixed;margin-left:50%;left:30px;">  <img src="pictures/logoanlone.png">  </span>
<span style="position:fixed;margin-left:50%;left:35px;top:130px;font-size:110%;"><b>BETA</b></span>
<h1 style="font-family:Thin;margin-top:60px;font-size:400%;location:absolute;text-align:center;color:black;">tarTool</h1>
<h2 style="font-family:Thin;font-size:250%;location:absolute;text-align:center;color:black;margin-top:20px;color:grey;">Get Inspired</h2>
<h2 style="font-size:170%;location:absolute;text-align:center;color:black;margin-top:30px;color:red;">a platform for technology enthusiasts</h2>
<h3 style="font-size:150%;text-align:center;margin-left:0px;">Curate, collect and browse the best startup resources in the world.</h3>
<span style="position:fixed;margin-left:50%;left:-200px;top:330px;">  <img src="pictures/check.png" width="100" height="100">  </span>
<span style="position:fixed;margin-left:50%;left:-50px;top:330px;">  <img src="pictures/glasses.png" width="100" height="100">  </span>
<span style="position:fixed;margin-left:50%;left:100px;top:340px;">  <img src="pictures/save.png" width="80" height="80">  </span>
<span style="position:fixed;margin-left:50%;left:-180px;top:440px;font-size:130%;">Curate</span>
<span style="position:fixed;margin-left:50%;left:-28px;top:440px;font-size:130%;">Browse</span>
<span style="position:fixed;margin-left:50%;left:118px;top:440px;font-size:130%;">Save</span>
<span style="position:fixed;margin-left:50%;left:-220px;top:510px;font-size:130%;"><button type="button" style="width:200px;" class="btn btn-success btn-md" onclick="rollregister()">Register</button></span>
<span style="position:fixed;margin-left:50%;left:20px;top:510px;font-size:130%;"><button type="button" style="width:200px;" class="btn btn-default btn-md" onclick="rollup()">Continue</button></span>
<span style="position:fixed;margin-left:50%;left:-220px;top:550px;font-size:130%;"><button type="button" style="width:440px;" class="btn btn-primary btn-md" onclick="rolllogin()">Log In</button></span>
</div>';


if(!isset($_COOKIE["tartoolv"]) && !isset($_COOKIE['junto'])){ 
echo '
<script>
$(document).ready(function(){
    $("#welcome-transparent").slideDown();
});

setvisitor();
</script>
';

}




// The transparent background
echo '<div class="transparent" id="transparent" onclick="closeall()"></div>';
echo '<div class="comments-square" id="transparent-comments"> Im Working on the commenting feature today, hopefully this will be finished by the weekend</div>';
echo '<div class="signup-square" id="transparent-signup">';
echo '<a href="#" onclick="closeall()"><img class="closing-cross" src=pictures/cross-red.png width="18" height="18" alt="closing cross"></a>';
echo '
<div class="signup-title">
Sign Up
</div>
      <form action="PHP/account/registeration.php" method="post" id="form" autocomplete="off">
       <div class="form-group">
       <label >Name</label>
       <input type="text" name="full_name" placeholder="your name" id="full_name" class="form-control"/>
       </div>
       <div class="form-group">
       <label >Email</label>
       <input type="text" name="email" placeholder="your email address" id="email" onkeyup="valid(this.value)" class="form-control"/>
       <span id="email-status"></span>
       </div>
       <div class="form-group">
      <label >Username</label>
      <input type="text" name="username" id="username" placeholder="at least four characters" onkeyup="available(this.value)" class="form-control"/>
      <span id="user-status"> </span> 
      </div>
       <div class="form-group">
      <label >Password</label>
      <input type="password" name="password" id="password" placeholder="at least 8 characters" onkeyup="passcheck(this.value)" class="form-control" />
      <span id="pass-status"> </span> 
      </div>
      <div class="form-group">
      <label >Retype Password</label>
       <input type="password"  name="retype password" id="password1" onkeyup="passmatch()" class="form-control" />
       <span id="pass1-status"> </span> 
      </div>
        <div class="form-group">
        <label >What do you do for a living?</label>
        <select name="type" form="form" id="dropdown" class="form-control" >
        <option value="NULL">choose one</option>
        <option value="one">I am a founder</option>
        <option value="two">I work at a startup</option>
              <option value="three">I just like strartups</option>
              <option value="four">None of your business!</option>
              </select>
        </div>
      <div class="form-group">
      <input name="submit" type="submit" value="Create my account" id="submit_btn" class="btn btn-success" disabled />
      </div>
 </form>
</div>';
echo '<div class="submit-square" id="transparent-square">';
echo '
<a href="#" onclick="closeall()"><img class="closing-cross" src=pictures/cross-red.png width="18" height="18" alt="closing cross"></a>
<h3 style="color:#6C7A89;">
Submit a Card
</h3>
<hr>
<form  class="form-asd"  action="submit.php" method="post" enctype="multipart/form-data" autocomplete="off">
   <div class="form-group">
   <label  >Title</label>
   <input type="text" name="title" id="title"  size="30" class="form-control" onkeyup="submissionsample()"/>
   <span id="title-status"></span> 
   <br>
   <label >Description</label><br>
   <textarea rows="4" cols="30" name="description" id="description" class="form-control" onkeyup="submissionsample()"></textarea>
   <span id="description-status"></span>
   <br>
   <label >URL</label>
   <input type="text" name="url" id="url" size="45" onchange="submissionsample()" class="form-control"/>
   <span id="url-status"> </span> 
   <br>
      <div id="submission-thumbnail">
  <label >Thumbnail URL <a style="color:red;" href="#" onclick="submissionthumbnail()"> Upload </a> </label>
   <input type="text" name="imageurl" id="imageurl" size="45" onchange="submissionsample()" class="form-control"/>
   <br>
      </div> 
   
   <p><b>Medium</b></p> 
  <label class="radio-inline">
    <input type="radio" name="type" value="Website" onclick="submissionsample()">Website or Tool
      </label>
    
  <label class="radio-inline">
    <input type="radio" name="type" value="Video/Audio" onclick="submissionsample()">Video
      </label>
      <br>
  <label class="radio-inline"> 
    <input type="radio" name="type" value="Influencer" onclick="submissionsample()">Influencer
      </label>
      
  <label class="radio-inline">
    <input type="radio" name="type" value="Blog" onclick="submissionsample()">Blog
      </label>
      
   <label class="radio-inline">
    <input type="radio" name="type" value="Book" onclick="submissionsample()">Book
      </label>
      
   </div>
  
     <div id="adder" class="form-group">
       <div>
       <label > Category </label> 
          <select name="cat" id="category" onchange="update(this.value)" class="form-control">
          <option value="BD">Business development</option>
          <option value="FE">Front-end development/Design</option>
          <option value="BE">Back-end development</option>
          </select>
          <br>
          <label > Labels </label>  
          <select name="subcat1"  id="D1" class="form-control" onchange="submissionupdatelabels(1,this.options[this.selectedIndex].innerHTML)"> 
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
     
      

<button type="button" id="adderbutton" class="btn btn-default btn-xs" onclick="add()"> + </button>
<br>
<br>
<input type="submit" value="submit" class="btn btn-danger btn-sm" style="width:100%;" id="submit_bt">
        
        </form>


';
echo '</div>';

echo '<div class="submit-box" id="transparent-box">';
echo '
<div class="box" style="background-color:#FCFCFC;">
  <a href="#"><div class="sticker" id="samplecard-category">Business Development</div></a>
  <div class="subcats" id="samplecard-subcategory">
  </div>
  <div class="profile-picture">
    <img id="samplecard-image" src="http://www.white-lioness.com/img/logo/white-lioness-technologies-white-notext.png" width="100" height="100" style="margin-top:0px;float:right;margin-right:10px" alt="logo"> 
  </div>
  <a href="#">
    <div class="title" id="samplecard-title"></div>
    <div class="description" id="samplecard-description"></div>
  </a>
  <div class="score">

      <img src="pictures/facebook.png" width="30" height="30" class="facebook-icon" alt="facebook">

      <img src="pictures/twitter.png" width="30" height="30" class="twitter-icon" alt="twitter">

      <img src="pictures/linkedin.png" width="30" height="30" class="linkedin-icon" alt="linkedin">

  </div>
  <div class="numbers">
    <div class="linkedin-score" id="samplecard-linkedin">0</div>
    <div class="twitter-score" id="samplecard-twitter">0</div>
    <div class="facebook-score" id="samplecard-facebook">0</div>
  </div>
  <div class="box-stats" style="background-color:#ecf0f1;" id="samplecard-boxstats">
    <div style="border:0px dashed red;width:200px;position:absolute;right:20px;font-size:130%;text-align:center;margin-top:8px;color:#ecf0f1">
      social score: <div class="badge" style="font-size:100%"></div>
    </div>
      <div  id="samplecard-medium" style="position:absolute;left:10px;font-size:150%;margin-top:4px;color:#ecf0f1;">Website</div>
  </div>
</div>
';
echo '</div>';

  // A commented code snippet that gets the name of the user
if(isset($_COOKIE['junto'])){   
     $value = $_COOKIE['junto'];
     $result= $conn->query("SELECT * FROM USERS WHERE USERID=".$value);
     $result = mysqli_fetch_assoc($result);
     $name = $result["NAME"];
     $id = $result["USERNAME"];
     $email = $result["EMAIL"];
     $userid = $value;
   }


echo '<div class="profile-square" id="transparent-profile">';
echo '<a href="#" onclick="closeall()"><img class="closing-cross" src=pictures/cross-red.png width="18" height="18" alt="closig cross"></a>';
echo '<p class="signup-title">Account Settings</p>';

//echo '<form  id="account-settings" action="update.php" method="post">';
echo '<input type="hidden" name="userid" value="';echo $value;echo '">';
echo '<input type="hidden" id="update-username" value="';echo $id;echo '">';
echo '<div class="form-group">
      <b>Name: </b><div class="account-text">';echo $name;echo '</div>
      </div>';
echo '<div class="form-group">
      <b>Email: </b><div class="account-text">';echo $email;echo '</div>
      </div>';
echo '<form action="update.php" id="account-settings">';
echo '<div class="form-group">
      <b>Username: </b><div class="account-text">';echo $id;echo '</div>
      </div>';
echo '<div  id="change-password">';
echo '<div class="form-group" >
      <label >Current password</label>
      <input  class="form-control" type="password"  name="user" id="changepassword-password">
      <span id="changepassword-condition" class="red-text"></span>
      </div>

      <div class="form-group">
      <label >New Password</label>
      <input  class="form-control" type="password"  name="user" id="changepassword-password1">
      <span id="changepassword-condition1" class="red-text"></span>
      </div>

      <div class="form-group">
      <label >Re-type New Password </label>
      <input  class="form-control" type="password"  name="user" id="changepassword-password2">
      <span id="changepassword-condition2" class="red-text"></span>
      </div>';
echo '</div>';


echo '<div  id="account-delete">';
echo '<div class="form-group" >
      <label >Password:</label>
      <input  class="form-control" type="password"  name="user" id="deleteaccount-password">
      <span id="changepassword-condition-delete" class="red-text"></span>
      <button type="button" style="width:30%;margin-right:5px;margin-top:-28px;float:right;" class="btn btn-danger btn-xs" onclick="deleteaccount()">Delete</button>
      </div>';


echo '</div>';


echo '<hr>';
echo '<button type="button" style="width:100%;" class="btn btn-danger btn-xs" onclick="showchangepassword()">Change Password</button>';
echo '<button type="button" style="width:100%;margin-top:5px;" class="btn btn-danger btn-xs" onclick="del()">Delete My Account</button>';
echo '<hr>';
echo '<button type="button" style="width:45%;" class="btn btn-default btn-sm" onclick="closeall()">Cancel</button>';
echo '<button type="submit" style="width:45%;margin-left:10%;" class="btn btn-warning btn-sm">Submit</button>';
echo '</div>';
echo '</form>';
//echo '</form>';



echo '<div class="signin-square" id="transparent-signin">';
      echo '
    <a href="#" onclick="closeall()"><img class="closing-cross" src=pictures/cross-red.png width="18" height="18" alt="closing cross"></a>
    <p class="signup-title"> Log In</p>
    <hr style="margin-top:-5px;">

      <form  id="login-form" action="login.php" method="post">
    <div class="form-group">

      <label >Username </label>
      <input  class="form-control" type="text"      name="user" id="loginusername"   placeholder=" Username">
    </div>
    <div class="form-group">
      <label >Password </label>
      <input  class="form-control" type="password"  name="pass"  id="login-password" placeholder=" Password">
      <span id="condition" style="display:inline-block;margin:5px;color:red;"></span>
      <br>
      <input style="width:100%;" type="submit" id="submit" class="btn btn-default btn-sm" value="Log In" > 
      <a href="forgotpassword.html"><button type="button" style="position:absolute;width:90px;right:25px;top:176px;" class="btn btn-danger btn-xs">Forgot?</button></a>
      
      
      </div>
  </form>';
echo '</div>';


echo '<div class="stick-to-top">';
	// LOGO
	echo '<span class="top-left"> <img src="/logo/junto_logo_solo.png" alt="logo" height="50" width="40"/></span>';
  echo '<h2 style="font-family:Thin;font-size:190%;location:fixed;color:black;margin-top:17px;margin-left:200px;color:grey;">Get Inspired</h2>';
  echo '<div class="top-left-name">tarTool</div>';
  echo '<div class="top-left-beta">BETA</div>';
  echo '<a href="."><div class="logo-link"></div></a>';


	// POWER BUTTON - Check the cookie and set the color and the link of the power button accordingly
	   if(isset($_COOKIE['junto'])){
	   echo '<span style="position:absolute;float:left;right:30px;top:5px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45" alt="signout"></a></span>';
	   echo '<span style="position:absolute;float:left;right:100px;top:5px;"> <a href="#" onclick="showprofile()"><img src="pictures/profile.png" height="50" width="50" alt="account"></a></span>';     }
	   else{
	   echo '<div class="login-square">';
     echo '<a style="margin-right:20px;font-size:110%;" href="#" onclick="showsignin()"  role="button">Log In</a>';
     echo '<a href="#" onclick="showsignup()" class="btn btn-default" role="button">Sign Up</a>';
     echo '</div>';
	   }
echo '</div>';//stick-to-top

echo '<div class="cat-box" id="cat-box">';
echo '<div class="names" style="color:#ff614e;" onclick="panelbusiness()">';
echo 'Business';
echo '</div>';
echo '<div class="names" style="color:#0068fd;" onclick="panelfrontend()">';
echo 'Front end';
echo '</div>';
echo '<div class="names" style="color:#3ecd3e;" onclick="panelbackend()">';
echo 'Back end';
echo '</div>';

echo '</div>';

echo '<div class="subcat-status" id="subcat-status"></div>';

echo '<div class="side-tab" id="side-tab" onclick="showsideone()">filter</div>';
echo '<div class="side-tab2" id="side-tab2" onclick="showsidetwo()">close</div>';

echo '<div class="subcat-box" id="subcat-box">';
echo '<form action="checklist.php" method="post">';

echo '<div class="checklist-business" id="checklist-business-section">';
echo '<input type="checkbox" class="css-checkbox" id="SEO" name="SEO" value="1"';
if(interested($userid,"SEO")==1){echo ' checked';};
echo '> <label for="SEO" class="css-label">SEO</label>';

echo'<br><input type="checkbox" class="css-checkbox" id="Sales" name="Sales" value="1"';
if(interested($userid,"Sales")==1){echo ' checked';};
echo'> <label for="Sales" class="css-label">Sales</label><br>';


echo '<input type="checkbox" class="css-checkbox" id="Naming" name="Naming" value="1"';
if(interested($userid,"Naming")==1){echo ' checked';}
echo'> <label for="Naming" class="css-label">Naming</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Copywriting" name="CopyWriting" value="1"';
if(interested($userid,"CopyWriting")==1){echo ' checked';}
echo'> <label for="Copywriting" class="css-label">Copywriting</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="MarketingAndResearch" name="MarketingAndResearch" value="1"';
if(interested($userid,"MarketingAndResearch")==1){echo ' checked';}
echo '><label for="MarketingAndResearch" class="css-label">Marketing & Research</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="UserFeedback" name="UserFeedback" value="1"';
if(interested($userid,"UserFeedback")==1){echo ' checked';}
echo '> <label for="UserFeedback" class="css-label">User Feedback</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="ProjectManagement" name="ProjectManagement" value="1"';
if(interested($userid,"ProjectManagement")){echo ' checked';}
echo '> <label for="ProjectManagement" class="css-label">Project Management</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="InventoryManagement" name="InventoryManagement" value="1"';
if(interested($userid,"InventoryManagement")){echo ' checked';}
echo '><label for="InventoryManagement" class="css-label">Inventory Management</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Outsourcing" name="Outsourcing" value="1"';
if(interested($userid, "Outsourcing")==1){echo ' checked';}
echo '> <label for="Outsourcing" class="css-label">Outsourcing</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Funding" name="Funding" value="1"';
if(interested($userid, "Funding")){echo ' checked';}
echo '> <label for="Funding" class="css-label">Funding</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Productivity" name="Productivity" value="1"';
if(interested($userid, "Productivity")==1){ echo ' checked';}
echo '> <label for="Productivity" class="css-label">Productivity</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Analytics" name="Analytics" value="1"';
if(interested($userid, "Analytics")==1){echo ' checked';}
echo '> <label for="Analytics" class="css-label">Analytics</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="LeanStartup" name="LeanStartup" value="1"';
if(interested($userid, "LeanStartup")==1){echo ' checked';}
echo '> <label for="LeanStartup" class="css-label">Lean Startup</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Launching" name="Launching" value="1"';
if(interested($userid, "Launching")==1){echo ' checked';}
echo '> <label for="Launching" class="css-label">Launching</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="SocialMediaCommunity" name="SocialMediaCommunity" value="1"'; 
if(interested($userid, "SocialMediaCommunity")==1){echo ' checked';}
echo '><label for="SocialMediaCommunity" class="css-label">Social Media & Community</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Administration" name="Administration" value="1"';
if(interested($userid, "Administration")==1){echo ' checked';}
echo '> <label for="Administration" class="css-label">Administration</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="CustomerService" name="CustomerService" value="1"';
if(interested($userid,"CustomerService")==1){echo ' checked';}
echo '> <label for="CustomerService" class="css-label">Customer Service</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="AcceleratorsAndIncubators" name="AcceleratorsAndIncubators" value="1"';
if(interested($userid,"AcceleratorsAndIncubators")==1){echo ' checked';}
echo '><label for="AcceleratorsAndIncubators" class="css-label">Accelerators & Incubators</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="E-commerce" name="E-commerce" value="1"';
if(interested($userid, "E-commerce")==1){echo ' checked';}
echo'> <label for="E-commerce" class="css-label">E-commerce</label><br>';

echo'
<input type="checkbox" class="css-checkbox" id="Events" name="Events" value="1"';
if(interested($userid, "Events")==1){echo ' checked';}
echo '> <label for="Events" class="css-label">Events</label>';
echo '</div>';



echo '<div class="checklist-business" id="checklist-frontend-section">';
echo '<input type="checkbox" class="css-checkbox" id="UserInterface" name="UserInterface" value="1"';
if(interested($userid, "UserInterface")==1){echo ' checked';}
echo'> <label for="UserInterface" class="css-label">User Interface</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="UserExperience" name="UserExperience" value="1"';
if(interested($userid, "UserExperience")==1){echo ' checked';}
echo'><label for="UserExperience" class="css-label">User Experience</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="MockupsAndWireframing" name="MockupsAndWireframing" value="1"';
if(interested($userid, "MockupsAndWireframing")==1){echo ' checked';}
echo '> <label for="MockupsAndWireframing" class="css-label">Mockups and Wireframing</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="HTML" name="HTML" value="1"';
if(interested($userid, "HTML")==1){echo ' checked';}
echo '> <label for="HTML" class="css-label">HTML</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="CSS" name="CSS" value="1"';
if(interested($userid, "CSS")==1){echo ' checked';}
echo '> <label for="CSS" class="css-label">CSS</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="JavaScript" name="JavaScript" value="1"';
if(interested($userid, "JavaScript")==1){echo ' checked';}
echo '><label for="JavaScript" class="css-label">JavaScript</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Themes" name="Themes" value="1"';
if(interested($userid, "Themes")==1){echo ' checked';}
echo '> <label for="Themes" class="css-label">Themes</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Mobile" name="Mobile" value="1"';
if(interested($userid, "Mobile")==1){echo ' checked';}
echo'> <label for="Mobile" class="css-label">Mobile</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="FrontEndiOS" name="FrontEndiOS" value="1"';
if(interested($userid, "FrontEndiOS")==1){echo ' checked';}
echo '> <label for="FrontEndiOS" class="css-label">iOS</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="FrontEndAndroid" name="FrontEndAndroid" value="1"';
if(interested($userid, "FrontEndAndroid")==1){echo ' checked';}
echo '> <label for="FrontEndAndroid" class="css-label">Android</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Bootstrap" name="Bootstrap" value="1"';
if(interested($userid, "Bootstrap")==1){echo ' checked';}
echo '> <label for="Bootstrap" class="css-label">Bootstrap</label> <br>';

echo'<input type="checkbox" class="css-checkbox" id="XML" name="XML" value="1"';
if(interested($userid, "XML")==1){echo ' checked';}
echo '><label for="XML" class="css-label">XML</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="JQuery" name="JQuery" value="1"';
if(interested($userid, "JQuery")==1){echo ' checked';}
echo'> <label for="JQuery" class="css-label">jQuery</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Angular" name="Angular" value="1"';
if(interested($userid,"Angular")==1){echo ' checked';}
echo '> <label for="Angular" class="css-label">Angular</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Canvas" name="Canvas" value="1"';
if(interested($userid, "Canvas")==1){echo ' checked';}
echo '> <label for="Canvas" class="css-label">Canvas</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="SVG"name="SVG" value="1"';
if(interested($userid, "SVG")==1){echo ' checked';}
echo '> <label for="SVG" class="css-label">SVG (Scalable Vector Graphics)</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="JSON" name="JSON" value="1"';
if(interested($userid, "JSON")==1){echo ' checked';}
echo '> <label for="JSON" class="css-label">JSON</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Ajax" name="Ajax" value="1"';
if(interested($userid, "AJAX")==1){echo ' checked';}
echo '> <label for="Ajax" class="css-label">Ajax</label>';
echo '</div>';



echo '<div class="checklist-business" id="checklist-backend-section">';
echo '<input type="checkbox" class="css-checkbox" id="Security" name="Security" value="1"';
if(interested($userid,"Security")==1){echo ' checked';}
echo '> <label for="Security" class="css-label">Security</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="DataManagement" name="DataManagement" value="1"';
if(interested($userid, "DataManagement")==1){echo ' checked';}
echo '> <label for="DataManagement" class="css-label">Data Management</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Hosting" name="Hosting" value="1"';
if(interested($userid, "Hosting")==1){echo ' checked';}
echo '> <label for="Hosting" class="css-label">Hosting</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="PHP" name="PHP" value="1"';
if(interested($userid,"PHP")==1){echo ' checked';}
echo'> <label for="PHP" class="css-label">PHP</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Python" name="Python" value="1"';
if(interested($userid,"Python")==1){echo ' checked';}
echo '> <label for="Python" class="css-label">Python</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="ASPNET" name="ASPNET" value="1"';
if(interested($userid, "ASPNET")==1){echo ' checked';}
echo '> <label for="ASPNET" class="css-label">ASP.NET</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="VBScript" name="VBScript" value="1"';
if(interested($userid, "VBScript")==1){echo ' checked';}
echo '> <label for="VBScript" class="css-label">Visual Basic Script</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="SQL" name="SQL" value="1"';
if(interested($userid, "SQL")==1){echo ' checked';}
echo '> <label for="SQL" class="css-label">SQL</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="C" name="C" value="1"';
if(interested($userid, "C")==1){echo ' checked';}
echo '> <label for="C" class="css-label">C</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="C++" name="C++" value="1"';
if(interested($userid, "C++")==1){echo ' checked';}
echo '> <label for="C++" class="css-label">C++</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Shell" name="Shell" value="1"';
if(interested($userid, "Shell")==1){echo ' checked';}
echo'> <label for="Shell" class="css-label">Shell</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Java" name="Java" value="1"';
if(interested($userid, "Java")==1){echo ' checked';}
echo '> <label for="Java" class="css-label">Java</label><br>';

echo'<input type="checkbox" class="css-checkbox" id="Ruby" name="Ruby" value="1"';
if(interested($userid, "Ruby")==1){echo ' checked';}
echo '> <label for="Ruby" class="css-label">Ruby</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Objective-C" name="Objective-C" value="1"';
if(interested($userid, "Objective-C")==1){echo ' checked';}
echo '> <label for="Objective-C" class="css-label">Objective-C</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Swift" name="Swift" value="1"';
if(interested($userid, "Swift")==1){echo ' checked';}
echo '> <label for="Swift" class="css-label">Swift</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="C#" name="C#" value="1"';
if(interested($userid, "C#")==1){echo ' checked';}
echo '> <label for="C#" class="css-label">C#</label><br>';

echo '<input type="checkbox" class="css-checkbox" id="Debugging" name="Debugging" value="1"';
if(interested($userid, "Debugging")==1){echo ' checked';}
echo '> <label for="Debugging" class="css-label">Debugging</label>';
echo '</div>';

echo '<input ';

if (isset($_COOKIE["junto"])){echo ' type="submit" ' ;}
else {echo ' onclick="showsignin()" ';}




echo 'name="Save and Render" class="btn btn-danger btn-sm" style="position:absolute;bottom:-20px;width:100%;" value="Render!">';
echo '</form>';
echo '</div>';


	// A commented code snippet that gets the name of the user
	   /*
	   $value = $_COOKIE['junto'];
	   $result= $conn->query("SELECT * FROM USERS WHERE USERID=$value");
	   $result = mysqli_fetch_assoc($result);
	   $result = $result["NAME"];
	   */


// Set the slider and its content 
    if(!isset($_COOKIE['junto']))
    {
    echo '
    <a href="#" onclick="showsignin()"  data-toggle="modal">
    <div class="slider-cover">
    <h2>log in to use the panel</h2>
    </div>
    </a>';

    echo'
    <div class="slider">
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;"><img src="pictures/glasses.png" height="70" width="70" alt="feed">
    </div>
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
    Feed
    </div>
    </div>';

    // Submit button
    echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;"><img src="pictures/pencil.png" height="70" width="70" alt="submit">
    </div>  
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
    Submit<br> Resource
    </div>
    </div>';

    // My Library button
    echo '
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;margin-top:25px"><img src="pictures/book.png" height="70" width="70" alt="library">
    </div>
    <div style="position:relative;margin-top:-10px;text-align:center;">
    Saved Cards
    </div>
    </div>';

    // My Streams
    echo '
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/check.png" height="70" width="70" alt="streams">
    </div>
    <div style="position:relative;margin-top:0px;text-align:center">
    My streams
    </div>
    </div>';
    } 

    else{
    // Set the slider for the logged in user
    // Feed button
    echo'
    <div class="slider">
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
    <a href="." >
    <div style="position:relative;margin-left:40px;"><img src="pictures/glasses-red.png" height="70" width="70">
    </div>
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center;color:red;">
    Feed
    </div>
    </a>
    </div>
    ';

    // Submit button
    echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
    <a href="#" onclick="showsubmission()" data-toggle="modal">
    <div style="position:relative;margin-left:40px;"><img src="pictures/pencil.png" height="70" width="70">
    </div>  
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
    Submit<br> Resource
    </div>
    </a>
    </div>';

    // My Library button
    echo '
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
    <a href="library.php">
    <div style="position:relative;margin-left:40px;margin-top:25px"><img src="pictures/book.png" height="70" width="70">
    </div>
    <div style="position:relative;margin-top:-10px;text-align:center;">
    Saved Cards
    </div>
    </a>
    </div>';
/*
    // My Streams
    echo '
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
    <a href="check.php">
    <div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/check.png" height="70" width="70">
    </div>
    <div style="position:relative;margin-top:0px;text-align:center">
    My streams
    </div>
    </a>
    </div>';
*/
      // (Potential) Account Setting icon
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
      </div>';
      */
    }// else clause

echo '</div>';// closing the slider


// ******* This areas is totally useless and I may have to remove it
//echo '<div class="submit" >';
//echo '</div>';

// ******* This is a tab to choose from trending/newest for the feed
/*
echo '<div class="tab">';
echo '</div>';
*/


echo '<div class="feed-column" id="feed">';
// This is when Javascript and PHP merge to provide the feed content



echo 
'<script type="text/javascript">
// So that the page is shown from the beginning on every load.
$(window).on("beforeunload", function() {
    $(window).scrollTop(0);
});


// LastCard is not changed based on whether or not a cat or a subcat is clicked
var LastCard = ';
$query = "select max(RESOURCEID) as RESOURCEID from RESOURCES";
$result = $conn->query($query);
$bigest = mysqli_fetch_assoc($result);
echo ($bigest['RESOURCEID']+1).';';
echo'
var Ended = 0;
var Frame = 0;
var Load = 0;
            $(window).scroll(function(){
                    if  ($(document).height() - ($(window).height() + $(window).scrollTop()) < 400 ){
                          // run our call for pagination    
	    		 // Here if no category or subcategories are chosen then just call loader(LastCard,NULL);
           // else call loader(LastCard,Cat|Subcat)';
     if (!isset($_GET['cat']) && !isset($_GET['subcat'])) echo'
           loader(LastCard,"NULL");
			     numloader(LastCard,"NULL");
		                                    }
            });
	    loader(LastCard,"NULL");
	    numloader(LastCard,"NULL");';
     elseif (isset($_GET['cat'])){echo'
           loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo '");
           numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo'");
                                        }
            });
      loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo '");
      numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo'");';}
      elseif (isset($_GET['subcat'])){echo'
           loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo '");
           numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo'");
                                        }
            });
      loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo '");
      numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo'");';}
echo '</script>';
// Printing the Category and Subcategory tags
if (isset($_GET['cat'])) {ShowCatSubcat(mysqli_real_escape_string($conn,$_GET['cat']));}
else if (isset($_GET['subcat'])) {ShowCatSubcat(mysqli_real_escape_string($conn,$_GET['subcat']));}

echo'</div>';

// This is the html content that will be used by bootstrap to load the page 




echo '<footer>';
//echo'<div class="footer-line">';
//echo'</div>';



echo '</footer>';


echo '</body>';   
$conn->close();
echo '</html>';
?>

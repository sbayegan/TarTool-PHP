<?php
// Copyright 2015, Saeid Bayeganeh, All rights reserved
// Include the headers you need
include('UniversalHeader.php');
include('datalogin.php');
include('printer.php');

// Introduce HTML
echo "<!DOCTYPE html>";
echo "<html>";

// HEADER ----------------------------------------------------------------------------------------------------------------
echo "<head>";

// Set the title of the page
echo "<title>";
echo $UniversalName;
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
echo '<body style="background-color:white;">';
echo 
'<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, \'script\', \'facebook-jssdk\'));</script>';

// The transparent background
echo '<div class="transparent" id="transparent" onclick="closeall()"></div>';
echo '<div class="signup-square" id="transparent-signup">';
echo '<a href="#" onclick="closeall()"><img style="position:absolute;right:20px;" src=pictures/cross-red.png width="18" height="18"></a>';
echo '
<div style="border:0px dashed grey;width:500px;margin-top:-5px;">
<p style="font-size:130%;"> Sign Up</p>
</div>
</form>
      <form action="registeration.php" method="post" id="form" autocomplete="off">
       <div class="form-group">
       <label for="full_name">Name</label>
       <input type="text" name="full_name" placeholder="your name" id="full_name" class="form-control"/>
       </div>
       <div class="form-group">
       <label for="email">Email</label>
       <input type="text" name="email" placeholder="your email address" id="email" onkeyup="valid(this.value)" class="form-control"/>
       <span id="email-status"></span>
       </div>
       <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="at least four characters" onkeyup="available(this.value)" class="form-control"/>
      <span id="user-status"> </span> 
      </div>
       <div class="form-group">
      <label for="password">Password</label>
      <input type="password" length="25" name="password" id="password" placeholder="at least 8 characters" onkeyup="passcheck(this.value)" class="form-control" />
      <span id="pass-status"> </span> 
      </div>
      <div class="form-group">
      <label for="password1">Retype Password</label>
       <input type="password" length="25" name="retype password" id="password1" onkeyup="passmatch()" class="form-control" />
       <span id="pass1-status"> </span> 
      </div>
        <div class="form-group">
        <label for="dropdown">What do you do for a living?</label>
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
<a href="#" onclick="closeall()"><img style="position:absolute;right:20px;top:20px;" src=pictures/cross-red.png width="18" height="18"></a>
<h3 style="color:#6C7A89;">
Submit a Card
</h3>
<hr>
<form  class="form-asd" role="form" action="submit.php" method="get" autocomplete="off">
   <div class="form-group">
   <label for="title" >Title</label>
   <input type="text" name="title" id="title"  size="30" class="form-control" onkeyup="submissionsample()"/>
   <span id="title-status"></span> 
   <br>
   <label for="description">Description</label><br>
   <textarea rows="4" cols="30" name="description" id="description" class="form-control" onkeyup="submissionsample()"></textarea>
   <span id="description-status"></span>
   <br>
   <label for="url">URL</label>
   <input type="text" name="url" id="url" size="45" onchange="submissionsample()" class="form-control"/>
   <span id="url-status"> </span> 
   <br>
      <div id="submission-thumbnail">
  <label for="imageurl">Thumbnail URL <a style="color:red;" href="#" onclick="submissionthumbnail()"> Upload </a> </label>
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
       <label for="cat"> Category </label> 
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
    <img id="samplecard-image" src="http://www.white-lioness.com/img/logo/white-lioness-technologies-white-notext.png" width="100" height="100" style="margin-top:0px;float:right;margin-right:10px"> 
  </div>
  <a href="#">
    <b><div class="title" id="samplecard-title"></div></b>
    <div class="description" id="samplecard-description"></div>
  </a>
  <div class="score">

      <img src="pictures/facebook.png" width="30" height="30" style="float:right;margin-right:30px;margin-top:15px">

      <img src="pictures/twitter.png" width="30" height="30" style="position:absolute;left:360px;margin-top:17px">

      <img src="pictures/linkedin.png" width="30" height="30" style="position:absolute;left:300px;margin-top:16px">

  </div>
  <div class="numbers">
    <div style="position:absolute;left:85px;width:60px;text-align:center;border:0px dashed red;font-size:110%" id="samplecard-linkedin">0</div>
    <div style="position:absolute;left:145px;width:60px;text-align:center;border:0px dashed red;font-size:110%" id="samplecard-twitter">N/A</div>
    <div style="position:absolute;left:205px;width:60px;text-align:center;border:0px dashed red;font-size:110%" id="samplecard-facebook">0</div>
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
     $email = $result["EMAIL"];}


echo '<div class="profile-square" id="transparent-profile">';
echo '<a href="#" onclick="closeall()"><img style="position:absolute;right:20px;" src=pictures/cross-red.png width="18" height="18"></a>';
echo '<p style="margin-top:-4px;padding-bottom:5px;font-size:140%;">Account Settings</p>';
echo '<br>';
echo '<p>Name: <b>'.$name.'</b></p>';
echo '<p>E-mail: '.$email.'</p>';
echo '<p>User ID: '.$id.'</p>';
echo '<p>Password: <a>change password</a>';
echo '</div>';

echo '<div class="signin-square" id="transparent-signin">';
     //echo '<a href="#" onclick="closeall()"><img style="position:absolute;right:20px;" src=pictures/cross-red.png width="18" height="18"></a>';
     //echo '<p style="margin-top:-5px;padding-bottom:5px;font-size:140%;"> Log In</p>';
     //echo '<form action="login.php" role="form" method="post" >';
     //echo '<div class="form-group">';

     //echo '<hr style="margin-top:-5px;">';
     //echo '<label for="user">Username </label>';
     //echo '<input style="margin-left:10px;" type="text" name="user" id="loginusername" size="11" placeholder=" Username">';
          //echo '</div>';
     //echo '<input style="float:right;" type="password"  name="pass" id="login-password"  size="11" placeholder=" Password"/>';
     //echo '<br><input type="submit" value="Log In">';

     //echo '<a href="" onclick="login()"><p style="position:absolute;margin-top:10px;right:30px;font-size:120%;color:blue;">Sign In</p></a>';

     //echo '<p style="margin-top:15px;font-size:85%;"><a href="forgotpassword.html">Forgot your password?</a></p>';

      echo '
    <a href="#" onclick="closeall()"><img style="position:absolute;right:20px;" src=pictures/cross-red.png width="18" height="18"></a>
    <p style="margin-top:-5px;padding-bottom:5px;font-size:140%;"> Log In</p>
    <hr style="margin-top:-5px;">

      <form  id="login-form" action="login.php" method="post">
    <div class="form-group">

      <label for="user">Username </label>
      <input  class="form-control" type="text"      name="user" id="loginusername"   placeholder=" Username">
    </div>
    <div class="form-group">
      <label for="pass">Password </label>
      <input  class="form-control" type="password"  name="pass"  id="login-password" placeholder=" Password">
      <span id="condition" style="display:inline-block;margin:5px;color:red;"></span>
      <br>
      <input type="submit" id="submit" class="btn btn-default" value="Log In" > 
      <p style="margin-top:15px;font-size:85%;"><a href="forgotpassword.html">Forgot your password?</a></p>
      
      </div>
  </form>';
  
     //echo '</form>';
echo '</div>';

echo '<div class="stick-to-top">';
	// LOGO
	echo '<span class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

	// POWER BUTTON - Check the cookie and set the color and the link of the power button accordingly
	   if(isset($_COOKIE['junto'])){
	   echo '<span style="position:absolute;float:left;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
	   echo '<span style="position:absolute;float:left;right:120px;top:20px;"> <a href="#" onclick="showprofile()"><img src="pictures/profile.png" height="50" width="50"></a></span>';
     }
	   else{



	   echo '<div class="login-square">';
     //echo '<p style="position:fixed;margin-top:12px;font-size:120%;margin-left:30px;"><a href="#" onclick="showsignin()">Sign Up</a></p>';
     //echo '<p style="position:fixed;margin-top:12px;margin-left:80px;font-size:120%;">Log in</p>';
     //echo '<p style="position:fixed;margin-top:46px;margin-left:136px;font-size:80%;"><a href="forgotpassword.html">Forgot your password?</a></p>';
     echo '<a style="margin-right:20px;font-size:110%;" href="#" onclick="showsignin()"  role="button">Log In</a>';
     echo '<a href="#" onclick="showsignup()" class="btn btn-default" role="button">Sign Up</a>';

     echo '</div>';



	   }

	// A commented code snippet that gets the name of the user
	   /*
	   $value = $_COOKIE['junto'];
	   $result= $conn->query("SELECT * FROM USERS WHERE USERID=$value");
	   $result = mysqli_fetch_assoc($result);
	   $result = $result["NAME"];
	   */
echo '</div>';//stick-to-top

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
    <div style="position:relative;margin-left:40px;"><img src="pictures/glasses.png" height="70" width="70">
    </div>
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
    Feed
    </div>
    </div>';

    // Submit button
    echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;"><img src="pictures/pencil.png" height="70" width="70">
    </div>  
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
    Submit<br> Resource
    </div>
    </div>';

    // My Library button
    echo '
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;margin-top:25px"><img src="pictures/book.png" height="70" width="70">
    </div>
    <div style="position:relative;margin-top:-10px;text-align:center;">
    My Library
    </div>
    </div>';

    // My Streams
    echo '
    <div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;border:0px dashed black;">
    <div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/check.png" height="70" width="70">
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
    <a href="home.php" >
    <div style="position:relative;margin-left:40px;"><img src="pictures/glasses.png" height="70" width="70">
    </div>
    <div style="position:relative;margin-top:0px;margin-left:0px;text-align:center">
    Feed
    </div>
    </a>
    </div>';

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
    My Library
    </div>
    </a>
    </div>';

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



echo '</body>';
echo '<footer>';
//echo'<div class="footer-line">';
//echo'</div>';



echo '</footer>';



$conn->close();
echo '</html>';
?>

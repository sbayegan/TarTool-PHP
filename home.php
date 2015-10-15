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
echo '<script src="JS/code.js"></script>';

// Include the headers associated wth bootstrap
echo 
'<link rel="stylesheet" type="text/css" href="style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';

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



echo '<div class="stick-to-top">';
	// LOGO
	echo '<span class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

	// POWER BUTTON - Check the cookie and set the color and the link of the power button accordingly
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
    <a href="#sign"  data-toggle="modal">
    <div class="slider-cover">
    <h1>login to use the panel</h1>
    </div>
    </a>

    ';

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
    <a href="#submit" data-toggle="modal">
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
echo '<div class="submit" >';
echo '</div>';

// ******* This is a tab to choose from trending/newest for the feed
/*
echo '<div class="tab">';
echo '</div>';
*/


echo '<div class="feed-column" id="feed">';
// This is when Javascript and PHP merge to provide the feed content

// This piece of Javascript code will envoke your function when you reach the end of your page.
// The loader function will work only if the the user is logged in, if a cookie is not detected then 
// the loader will not respond and the feed will remain empty.

echo 
'<script type="text/javascript">

$(window).on("beforeunload", function() {
    $(window).scrollTop(0);
});

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
                    if  ($(document).height() - ($(window).height() + $(window).scrollTop()) == -400 ){
                          // run our call for pagination
        		  //document.getElementById("test").innerHTML="Things are now changed";        
	    		  loader(LastCard);
			  numloader(LastCard);
		}
            });
	    loader(LastCard);
	    numloader(LastCard); 
</script>';


echo'</div>';
echo '<div>';
echo 'test';
echo '</div>';
// This is the html content that will be used by bootstrap to load the page 
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
   <label for="title" >Title:</label>

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
    <option value="Website">Website/Tool</option>
    <option value="Video/Audio">Video</option>
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
</div>';

echo '<div id="feedback" class="modal fade">
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

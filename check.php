<?php
if(isset($_COOKIE['junto'])){
$userid = $_COOKIE['junto'];
function interested($user, $subject){
include('datalogin.php');

$query = 'select * from INTERESTS where USERID='.$user.' and INTEREST="'.$subject.'"';
//echo '>'.$query;
$result=$conn->query($query);
if($result->num_rows > 0){return 1;}
else{return 0;}

}


include('datalogin.php');
include('printer.php');
echo "<!DOCTYPE html>";
echo "<html>";



echo "<head>";

echo "<title>";
echo "Junto Home";
echo "</title>";
echo '<script src="JS/code.js"></script>';
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
';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo "<body style='background-color:white;'>";
echo '<div class="stick-to-top">';

echo '<div class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a>';
echo ' </div>';


//echo '<span style="position:absolute;right:150px;top:10px;"><a href="check.php"> <img src="http://junto.link/pictures/check.png" height="65" width="65"></a></span>';
//echo '<span style="position:absolute;right:150px;top:10px;"><a href="profile.php"> <img src="http://junto.link/pictures/user.png" height="65" width="65"></a></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
echo '</div>';

echo'
<div class="slider">';
echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
<a href="home.php" >
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
echo '</div>';

echo '<div class="checktop">';
echo 'Preferences';
echo '</div>';
echo '<div class="checklist">';

echo '<form action="checklist.php" method="post">';
echo '<div class="checklist-left-title">';
echo '<h4>Business Development</h4>';
echo '</div>';
echo '<div class="checklist-center-title">';
echo '<h4>Front-End Development</h4>';
echo '</div>';
echo '<div class="checklist-right-title">';
echo '<h4>Back-End Development</h4>';
echo '</div>';


echo '<div class="checklist-left">';
echo '<input type="checkbox" name="SEO" value="1"';
if(interested($userid,"SEO")==1){echo ' checked';};
echo '> SEO';

echo'<br><input type="checkbox" name="Sales" value="1"';
if(interested($userid,"Sales")==1){echo ' checked';};
echo'> Sales <br>';


echo '<input type="checkbox" name="Naming" value="1"';
if(interested($userid,"Naming")==1){echo ' checked';}
echo'> Naming <br>';

echo'<input type="checkbox" name="CopyWriting" value="1"';
if(interested($userid,"CopyWriting")==1){echo ' checked';}
echo'> Copywriting<br>';

echo'<input type="checkbox" name="MarketingAndResearch" value="1"';
if(interested($userid,"MarketingAndResearch")==1){echo ' checked';}
echo '> Marketing & Research<br>';

echo'<input type="checkbox" name="UserFeedback" value="1"';
if(interested($userid,"UserFeedback")==1){echo ' checked';}
echo '> User Feedback<br>';

echo '<input type="checkbox" name="ProjectManagement" value="1"';
if(interested($userid,"ProjectManagement")){echo ' checked';}
echo '> Project Management<br>';

echo'<input type="checkbox" name="InventoryManagement" value="1"';
if(interested($userid,"InventoryManagement")){echo ' checked';}
echo '> Inventory Management<br>';

echo'<input type="checkbox" name="Outsourcing" value="1"';
if(interested($userid, "Outsourcing")==1){echo ' checked';}
echo '> Outsourcing<br>';

echo'<input type="checkbox" name="Funding" value="1"';
if(interested($userid, "Funding")){echo ' checked';}
echo '> Funding<br>';

echo'<input type="checkbox" name="Productivity" value="1"';
if(interested($userid, "Productivity")==1){ echo ' checked';}
echo '> Productivity<br>';

echo'<input type="checkbox" name="Analytics" value="1"';
if(interested($userid, "Analytics")==1){echo ' checked';}
echo '> Analytics<br>';

echo'<input type="checkbox" name="LeanStartup" value="1"';
if(interested($userid, "LeanStartup")==1){echo ' checked';}
echo '> Lean Startup<br>';

echo'<input type="checkbox" name="Launching" value="1"';
if(interested($userid, "Launching")==1){echo ' checked';}
echo '> Launching<br>';

echo'<input type="checkbox" name="SocialMediaCommunity" value="1"'; 
if(interested($userid, "SocialMediaCommunity")==1){echo ' checked';}
echo '> Social Media & Community<br>';

echo'<input type="checkbox" name="Administration" value="1"';
if(interested($userid, "Administration")==1){echo ' checked';}
echo '> Administration<br>';

echo'<input type="checkbox" name="CustomerService" value="1"';
if(interested($userid,"CustomerService")==1){echo ' checked';}
echo '> Customer Service<br>';

echo'<input type="checkbox" name="AcceleratorsAndIncubators" value="1"';
if(interested($userid,"AcceleratorsAndIncubators")==1){echo ' checked';}
echo '> Accelerators & Incubators<br>';

echo'<input type="checkbox" name="E-commerce" value="1"';
if(interested($userid, "E-commerce")==1){echo ' checked';}
echo'> E-commerce<br>';

echo'
<input type="checkbox" name="Events" value="1"';
if(interested($userid, "Events")==1){echo ' checked';}
echo '> Events';
echo '</div>';

echo '<div class="checklist-center">';
echo '<input type="checkbox" name="UserInterface" value="1"';
if(interested($userid, "UserInterface")==1){echo ' checked';}
echo'> User Interface<br>';

echo'<input type="checkbox" name="UserExperience" value="1"';
if(interested($userid, "UserExperience")==1){echo ' checked';}
echo'> User Experience<br>';

echo'<input type="checkbox" name="MockupsAndWireframing" value="1"';
if(interested($userid, "MockupsAndWireframing")==1){echo ' checked';}
echo '> Mockups and Wireframing<br>';

echo'<input type="checkbox" name="HTML" value="1"';
if(interested($userid, "HTML")==1){echo ' checked';}
echo '> HTML<br>';

echo '<input type="checkbox" name="CSS" value="1"';
if(interested($userid, "CSS")==1){echo ' checked';}
echo '> CSS<br>';

echo '<input type="checkbox" name="JavaScript" value="1"';
if(interested($userid, "JavaScript")==1){echo ' checked';}
echo '> JavaScript<br>';

echo '<input type="checkbox" name="Themes" value="1"';
if(interested($userid, "Themes")==1){echo ' checked';}
echo '> Themes<br>';

echo'<input type="checkbox" name="Mobile" value="1"';
if(interested($userid, "Mobile")==1){echo ' checked';}
echo'> Mobile<br>';

echo'<input type="checkbox" name="FrontEndiOS" value="1"';
if(interested($userid, "FrontEndiOS")==1){echo ' checked';}
echo '> iOS<br>';

echo'<input type="checkbox" name="FrontEndAndroid" value="1"';
if(interested($userid, "FrontEndAndroid")==1){echo ' checked';}
echo '> Android<br>';

echo'<input type="checkbox" name="Bootstrap" value="1"';
if(interested($userid, "Bootstrap")==1){echo ' checked';}
echo '> Bootstrap <br>';

echo'<input type="checkbox" name="XML" value="1"';
if(interested($userid, "XML")==1){echo ' checked';}
echo '> XML<br>';

echo'<input type="checkbox" name="JQuery" value="1"';
if(interested($userid, "JQuery")==1){echo ' checked';}
echo'> jQuery<br>';

echo '<input type="checkbox" name="Angular" value="1"';
if(interested($userid,"Angular")==1){echo ' checked';}
echo '> Angular<br>';

echo'<input type="checkbox" name="Canvas" value="1"';
if(interested($userid, "Canvas")==1){echo ' checked';}
echo '> Canvas<br>';

echo '<input type="checkbox" name="SVG" value="1"';
if(interested($userid, "SVG")==1){echo ' checked';}
echo '> SVG (Scalable Vector Graphics)<br>';

echo '<input type="checkbox" name="JSON" value="1"';
if(interested($userid, "JSON")==1){echo ' checked';}
echo '> JSON<br>';

echo'<input type="checkbox" name="Ajax" value="1"';
if(interested($userid, "AJAX")==1){echo ' checked';}
echo '> Ajax';
echo '</div>';

echo '<div class="checklist-right">';

echo '<input type="checkbox" name="Security" value="1"';
if(interested($userid,"Security")==1){echo ' checked';}
echo '> Security<br>';

echo '<input type="checkbox" name="DataManagement" value="1"';
if(interested($userid, "DataManagement")==1){echo ' checked';}
echo '> Data Management(Database Design)<br>';

echo'<input type="checkbox" name="Hosting" value="1"';
if(interested($userid, "Hosting")==1){echo ' checked';}
echo '> Hosting<br>';

echo'<input type="checkbox" name="PHP" value="1"';
if(interested($userid,"PHP")==1){echo ' checked';}
echo'> PHP<br>';

echo '<input type="checkbox" name="Python" value="1"';
if(interested($userid,"Python")==1){echo ' checked';}
echo '> Python<br>';

echo'<input type="checkbox" name="ASPNET" value="1"';
if(interested($userid, "ASPNET")==1){echo ' checked';}
echo '> ASP.NET<br>';

echo '<input type="checkbox" name="VBScript" value="1"';
if(interested($userid, "VBScript")==1){echo ' checked';}
echo '> Visual Basic Script<br>';

echo'<input type="checkbox" name="SQL" value="1"';
if(interested($userid, "SQL")==1){echo ' checked';}
echo '> SQL<br>';

echo'<input type="checkbox" name="C" value="1"';
if(interested($userid, "C")==1){echo ' checked';}
echo '> C<br>';

echo'<input type="checkbox" name="C++" value="1"';
if(interested($userid, "C++")==1){echo ' checked';}
echo '> C++<br>';

echo'<input type="checkbox" name="Shell" value="1"';
if(interested($userid, "Shell")==1){echo ' checked';}
echo'> Shell<br>';

echo '<input type="checkbox" name="Java" value="1"';
if(interested($userid, "Java")==1){echo ' checked';}
echo '> Java<br>';

echo'<input type="checkbox" name="Ruby" value="1"';
if(interested($userid, "Ruby")==1){echo ' checked';}
echo '> Ruby<br>';

echo '<input type="checkbox" name="Objective-C" value="1"';
if(interested($userid, "Objective-C")==1){echo ' checked';}
echo '> Objective-C<br>';

echo '<input type="checkbox" name="Swift" value="1"';
if(interested($userid, "Swift")==1){echo ' checked';}
echo '> Swift<br>';

echo '<input type="checkbox" name="C#" value="1"';
if(interested($userid, "C#")==1){echo ' checked';}
echo '> C#<br>';

echo '<input type="checkbox" class="css-checkbox" id="Debugging" name="Debugging" value="1"';
if(interested($userid, "Debugging")==1){echo ' checked';}
echo '> <label for="Debugging" class="css-label">Debugging</label>';

echo '</div>';
//echo '<hr>';
echo '<div class="account-title">';
echo 'Account Settings';
echo '</div>';

echo '<div class="check-button">';
echo '<hr>';
echo '<a href="home.php" class="btn btn-default btn-sm" style="margin-right:4%;width:48%;">Cancel</a>';
echo '<input type="submit" name="Save and Render" class="btn btn-danger btn-sm" style="width:48%;" value="Submit">';

echo '</div>';

	echo '<div style="position:absolute;bottom:80px;left:0%;right:0%;border:0px dashed red;">';echo '<hr>';
		echo '<div class="form-inline">
			  <div class="form-group" style="margin-left:4%;">
			    <label for="exampleInputName2">Name</label>
			    <input type="text" class="form-control" id="exampleInputName2" value="';

$query ="Select NAME from USERS WHERE USERID=".$userid;
$name = $conn->query($query);
$name = mysqli_fetch_assoc($name);
$name = $name['NAME'];
echo $name;


					echo '">
			  </div>
			  <div class="form-group" style="position:absolute;left:37%;">
			    <label for="exampleInputEmail2">Email</label>
			    <input type="email" class="form-control" id="exampleInputEmail2" value="';

$query ="Select EMAIL from USERS WHERE USERID=".$userid;
$email = $conn->query($query);
$email = mysqli_fetch_assoc($email);
$email = $email['EMAIL'];
echo $email;



					echo '">
			  </div>
			  <span href="#password" data-toggle="modal" class="btn btn-warning btn-sm" style="position:absolute;right:10%;width:20%;">Change Password</span>
			</div>';
	echo '</div>';

echo '</form>';
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
                
<form  class="form-asd" role="form" action="submit.php" method="get" autocomplete="off" >
   
   <div class="form-group">
   <label for="title">Title:</label>
   <input type="text" name="title" id="title"  size="45" class="form-control"/>
   <span id="title-status"></span> 
   </div>
   <div class="form-group">
   <label for="description">Description:</label><br>
   <textarea rows="4" cols="50" name="description" id="description" class="form-control"></textarea>
   <span id="description-status"></span>
   </div>
  
   <div class="form-group">
   <label for="url">URL:</label>
   <input type="text" name="url" id="url" size="45" onchange="activate(this.value)" class="form-control"/>
   <span id="url-status"> </span> 
   </div>
  
   <div class="form-group">
   <label for="type">Medium: </label> 
   <select name="type" class="form-control">
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
          <label > Sub-category: </label>  
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
<div id="password" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" style="text-align:center;">Change Password</h4>
            </div>
            <div class="modal-body">
                <form  class="form-group" role="form" action="updatepassword.php" method="get">
                	<div class="form-group">
                		<label for="password1">Old Password:</label>
                			<input type="Password" name="password1" id="password1"  class="form-control" onkeyup="check-passcheck(this.value)"/>
                		<span id="title-status"></span> 
				<br>
				<label for="password2">New Password:</label>
                			<input type="Password" name="password2" id="password2"   class="form-control" disabled/>
                		<span id="title-status"></span> 
				<label for="password3">Re-type New Password:</label>
                			<input type="Password" name="password3" id="password3"   class="form-control" disabled/>
                		<span id="title-status"></span> 


                	</div>
                		<p class="text-warning"><small></small></p>
            	<div class="modal-footer">
                <input type="submit" value="update" class="btn btn-danger" id="submit_bt" disabled > 
            	</div>

            </div>
                 </form>
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
echo '</footer>';
$conn->close();
echo '</html>';







}
else{
//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:150px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
//echo '<span style="position:absolute;right:50px;top:20px;"> <a href="authentication.php"><img src="http://junto.link/pictures/power.png" height="45" width="45"></a></span>';
header ('Location: http://junto.link/authentication.php');
}

 
/*
echo '

<div class="dropdown" style="position:relative;float:left;padding-left:2em;padding-right:1em" >
    
<button  type="button" id="" data-toggle="dropdown">';
$value = $_COOKIE['junto'];
$result= $conn->query("SELECT * FROM USERS WHERE USERID=$value");
$result = mysqli_fetch_assoc($result);
$result = $result["NAME"];

//echo 'Hello, '.$result;
*/





?>

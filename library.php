<?php
include('UniversalHeader.php');
include('datalogin.php');
include('printer.php');
if(!isset($_COOKIE['junto'])){
header('Location: http://wwww.tartool.com');
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
';
echo '
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
';
echo '<script src="JS/code.js"></script>';
echo "</head>";
// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo '<body style="background-color:white;">';
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <a href="index.php"><img src="/logo/junto_logo_solo.png" alt="logo" height="70" width="60"/> </a> </span>';

  echo '<a href="index.php"> <div class="top-left-name">tarTool</div></a>';
  echo '<a href="index.php"> <div class="top-left-beta">BETA</div>   </a>';

echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
echo '<span style="position:absolute;float:left;right:120px;top:20px;"> <a href="#" onclick="showprofile()"><img src="pictures/profile.png" height="50" width="50" alt="account"></a></span>';
echo '</div>';


echo '<div class="slider">';
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
<a href="#" onclick="showsubmission()" data-toggle="modal">
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
<div style="position:relative;margin-left:40px;margin-top:25px"><img src="pictures/book-red.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:-10px;text-align:center;color:red;">
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

echo '</div>';











echo '<div class="transparent" id="transparent" onclick="closeall()"></div>';
  // A commented code snippet that gets the name of the user
if(isset($_COOKIE['junto'])){   
     $value = $_COOKIE['junto'];
     $result= $conn->query("SELECT * FROM USERS WHERE USERID=".$value);
     $result = mysqli_fetch_assoc($result);
     $name = $result["NAME"];
     $id = $result["USERNAME"];
     $email = $result["EMAIL"];}


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
echo '</div>';

echo '</div>';

echo '<div class="submit-square" id="transparent-square">';
echo '
<a href="#" onclick="closeall()"><img class="closing-cross" src=pictures/cross-red.png width="18" height="18" alt="closing cross"></a>
<h3 style="color:#6C7A89;">
Submit a Card
</h3>
<hr>
<form  class="form-asd"  action="submit.php" method="get" autocomplete="off">
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











echo '</body>';
echo '<footer>';
echo '</footer>';
$conn->close();
echo '</html>';
?>

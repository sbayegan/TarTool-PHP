<?php
include('UniversalHeader.php');
if(!isset($_COOKIE['junto'])){header ('Location: http://wwww.tartool.com');}
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
echo $UniversalName;
echo "</title>";
echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
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
';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo "<body style='background-color:white;'>";
echo '<div class="stick-to-top">';


	echo '<span class="top-left"> <a href="index.php"><img src="/logo/junto_logo_solo.png" alt="logo" height="70" width="60"/> </a> </span>';
  echo '<div class="top-left-name">tarTool</div>';



echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="pictures/power-red.png" height="45" width="45"></a></span>';
echo '</div>';

echo'
<div class="slider">';
echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:100px;z-index:9999;border:0px dashed black;">
<a href="index.php" >
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
<div style="position:relative;margin-left:40px;margin-right:auto;"><img src="pictures/check-red.png" height="70" width="70">
</div>
<div style="position:relative;margin-top:0px;text-align:center;color:red;">
My streams
</div>
</a>
</div>
';

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

echo '<div class="checklist-center">';
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

echo '<div class="checklist-right">';

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

echo '<div class="check-button">';
echo '<hr>';
echo '<a href="index.php" class="btn btn-default btn-sm" style="margin-right:4%;width:48%;">Cancel</a>';
echo '<input type="submit" name="Save and Render" class="btn btn-danger btn-sm" style="width:48%;" value="Submit">';

echo '</div>';

echo '</form>';
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
echo '<div class="transparent" id="transparent" onclick="closeall()"></div>';


echo '<footer>';
echo '</footer>';
echo '</body>';

$conn->close();
echo '</html>';





?>

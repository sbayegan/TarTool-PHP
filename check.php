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
echo '<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
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
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="http://junto.link/pictures/power-red.png" height="45" width="45"></a></span>';
echo '</div>';

echo'<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:30px;width:150px;height:150px;z-index:9999;border:0px dashed black;">
<a href="#submit" data-toggle="modal">
<div style="position:relative;margin-left:20px;"><img src="http://junto.link/pictures/pencil.png" height="100" width="100">
</div>
<div style="position:relative;margin-top:10px;margin-left:20px">
Submit Resource
</div>
</a>
</div>';
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:150px;border:0px dashed black;">
<a href="library.php">
<div style="position:relative;margin-left:20px;"><img src="http://junto.link/pictures/book.png" height="100" width="100">
</div>
<div style="position:relative;margin-top:-10px;margin-left:38px;">
My library
</div>
</a>
</div>
';
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;width:150px;height:150px;border:0px dashed black;">
<a href="check.php">
<div style="position:relative;margin-left:20px;margin-right:auto;"><img src="http://junto.link/pictures/check.png" height="100" width="100">
</div>
<div style="position:relative;margin-top:10px;left:32px">
My streams
</div>
</a>
</div>
';
echo '
<div style="position:relative;margin-left:auto;margin-right:auto;margin-top:10px;margin-bottom:80px;width:150px;height:150px;border:0px dashed black;">
<a href="account.php">
<div style="display:block;position:relative;margin-left:20px;margin-right:auto;"><img src="http://junto.link/pictures/user.png" height="100" width="100">
</div>
<div style="position:relative;margin-top:10px;left:15px">
<b>Account settings</b>
</div>
</a>
</div>
';

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
if(interested($userid, "Analyrics")==1){echo ' checked';}
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
if(interested($userid, "DaraManagement")==1){echo ' checked';}
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

echo'<input type="checkbox" name="ASP.NET" value="1"';
if(interested($userid, "ASP.NET")==1){echo ' checked';}
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

echo '<input type="checkbox" name="Debugging" value="1"';
if(interested($userid, "Debugging")==1){echo ' checked';}
echo '> Debugging Tools';

echo '</div>';

echo '<div class="check-button">';
echo '<input type="submit" name="Save and Render" value="submit">';
echo '</div>';





echo '</form>';
echo '</div>';







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

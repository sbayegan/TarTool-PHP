<?php
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
echo '<body style="background-color:#E0CEC1;">';
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

if(isset($_COOKIE['junto'])){

echo '<span style="position:absolute;right:250px;top:10px;"><a href="check.php"> <img src="http://junto.link/pictures/check.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:150px;top:10px;"><a href="profile.php"> <img src="http://junto.link/pictures/user.png" height="65" width="65"></a></span>';
//echo '<span style="position:absolute;right:350px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="logout.php"><img src="http://junto.link/pictures/power-red.png" height="45" width="45"></a></span>';
}
else{
//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:150px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="authentication.php"><img src="http://junto.link/pictures/power.png" height="45" width="45"></a></span>';
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

echo '</div>';

echo '<div class="navigator">';
echo '
<a href="http://junto.link/feed.php?cat=BD"><b>Business Development</b></a><br>
<a href="http://junto.link/feed.php?subcat=LeanStartup">Lean Startup</a><br>
<a href="http://junto.link/feed.php?subcat=MatketingAndResearch">Marketing & Research</a><br>
<a href="http://junto.link/feed.php?subcat=Naming">Naming</a><br>
<a href="http://junto.link/feed.php?subcat=CopyWriting">Copywriting</a><br>
<a href="http://junto.link/feed.php?subcat=Analytics">Analytics</a><br>
<a href="http://junto.link/feed.php?subcat=Launching">Launching</a><br>
<a href="http://junto.link/feed.php?subcat=UserFeedback">User Feedback</a><br>
<a href="http://junto.link/feed.php?subcat=SEO">SEO</a><br>
<a href="http://junto.link/feed.php?subcat=SocialMediaCommunity">Social Media & Community</a><br>
<a href="http://junto.link/feed.php?subcat=ProjectManagement">Project Management</a><br>
<a href="http://junto.link/feed.php?subcat=CustomerService">Customer Service</a><br>
<a href="http://junto.link/feed.php?subcat=InventoryManagement">Inventory Management</a><br>
<a href="http://junto.link/feed.php?subcat=Sales">Sales</a><br>
<a href="http://junto.link/feed.php?subcat=Funding">Funding </a><br>
<a href="http://junto.link/feed.php?subcat=Administration">Administration</a><br>
<a href="http://junto.link/feed.php?subcat=Productivity">Productivity</a><br>
<a href="http://junto.link/feed.php?subcat=Outsourcing">Outsourcing</a><br>
<a href="http://junto.link/feed.php?subcat=E-commerce">E-commerce</a><br>
<a href="http://junto.link/feed.php?subcat=AcceleratorsAndIncubators">Accelerators & Incubators </a><br>
<a href="http://junto.link/feed.php?subcat=Events">Events</a><br>
<br>
<a href="http://junto.link/feed.php?cat=FE"><b>Front-End Development</b></a><br>
<a href="http://junto.link/feed.php?subcat=UserInterface">User Interface</a><br>
<a href="http://junto.link/feed.php?subcat=UserExperience">User Experience</a><br>
<a href="http://junto.link/feed.php?subcat=MockupsAndWireframing">Mockups & Wireframing</a><br>
<a href="http://junto.link/feed.php?subcat=HTML">HTML</a><br>
<a href="http://junto.link/feed.php?subcat=CSS">CSS</a><br>
<a href="http://junto.link/feed.php?subcat=JavaScript">JavaScript</a><br>
<a href="http://junto.link/feed.php?subcat=Themes">Themes</a><br>
<a href="http://junto.link/feed.php?subcat=Mobile">Mobile</a><br>
<a href="http://junto.link/feed.php?subcat=FrontEndiOS">iOS</a><br>
<a href="http://junto.link/feed.php?subcat=FrontEndAndroid">Android</a><br>
<a href="http://junto.link/feed.php?subcat=Bootstrap">Bootstrap</a><br>
<a href="http://junto.link/feed.php?subcat=XML">XML</a><br>
<a href="http://junto.link/feed.php?subcat=JQuery">JQuery</a><br>
<a href="http://junto.link/feed.php?subcat=Angular">Angular</a><br>
<a href="http://junto.link/feed.php?subcat=Canvas">Canvas</a><br>
<a href="http://junto.link/feed.php?subcat=SVG">SVG</a><br>
<a href="http://junto.link/feed.php?subcat=JSON">JSON</a><br>
<a href="http://junto.link/feed.php?subcat=Ajax">Ajax</a><br>
<br>
<a href="http://junto.link/feed.php?cat=BE"><b>Back-End Development</b></a><br>




     ';
echo '</div>';

echo '<div class="submit">';
echo '</div>';


echo '<div class="feedback">';
echo '</div>';

echo '<div class="tab">';
echo '</div>';

echo '<div class="feed-column">';

card(10);
card(9);
card(8);
card(7);
card(6);

echo'</div>';
echo '</body>';
echo '<footer>';
//echo'<div class="footer-line">';
//echo'</div>';



echo '</footer>';



$conn->close();
echo '</html>';
?>

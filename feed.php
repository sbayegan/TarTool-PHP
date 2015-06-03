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
  </script>';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo '<body style="background-color:#FFD1B2;">';
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
<div id="accordion">
<h3>
<a href="http://junto.link/feed.php?cat=BD"><b style="color:red;">Business Development</b></a><br>
</h3>
<div>
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
</div>
<h3>
<a href="http://junto.link/feed.php?cat=FE"><b style="color:red;">Front-End Development</b></a>
</h3>
<div>
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
</div>

<h3>
<a href="http://junto.link/feed.php?cat=BE"><b style="color:red;">Back-End Development</b></a><br>
</h3>
<div>
<a href="http://junto.link/feed.php?subcat=Security">Security</a><br>
<a href="http://junto.link/feed.php?subcat=DataManagement">Data Management</a><br>
<a href="http://junto.link/feed.php?subcat=Hosting">Hosting</a><br>
<a href="http://junto.link/feed.php?subcat=PHP">PHP</a><br>
<a href="http://junto.link/feed.php?subcat=Python">Python</a><br>
<a href="http://junto.link/feed.php?subcat=ASP.NET">ASP.NET</a><br>
<a href="http://junto.link/feed.php?subcat=VBScript">Visual Basic Script</a><br>
<a href="http://junto.link/feed.php?subcat=SQL">SQL</a><br>
<a href="http://junto.link/feed.php?subcat=C">C</a><br>
<a href="http://junto.link/feed.php?subcat=C++">C++</a><br>
<a href="http://junto.link/feed.php?subcat=Shell">Shell</a><br>
<a href="http://junto.link/feed.php?subcat=Java">Java</a><br>
<a href="http://junto.link/feed.php?subcat=Objective-C">Objective-C</a><br>
<a href="http://junto.link/feed.php?subcat=Swift">Swift</a><br>
<a href="http://junto.link/feed.php?subcat=C#">C#</a><br>
<a href="http://junto.link/feed.php?subcat=Debugging"></a>Debugging Tools<br>
</div>

</div>

     ';
echo '</div>';

echo '<div class="submit">';
echo '</div>';


echo '<div class="feedback">';
echo '</div>';

//echo '<div class="tab">';
//echo '</div>';

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

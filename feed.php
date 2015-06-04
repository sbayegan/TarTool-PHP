<?php
include('datalogin.php');
include('printer.php');
echo "<!DOCTYPE html>";
echo "<html>";



echo "<head>";

echo "<title>";
echo "Junto Home";
echo "</title>";
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
echo '<body style="background-color:white;">';
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
/*
echo '
<div id="accordion">
<h3>
<a href="http://junto.link/feed.php?cat=BD"><b style="">Business Development</b></a><br>
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
<a href="http://junto.link/feed.php?cat=FE"><b style="">Front-End Development</b></a>
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
<a href="http://junto.link/feed.php?cat=BE" style="font-size:100%;margin-top:30px;">Back-End Development</a><br>
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
<a href="http://junto.link/feed.php?subcat=Debugging">Debugging Tools</a><br>
</div>

</div>';
*/
echo '
<nav>
    <ul class="nav">

		<li><a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false"><b style="font-size:120%">Business Development</b></a>
			<ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1" style="padding:15px;">
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
			</ul>
		</li>
		<li><a href="#" id="btn-2" data-toggle="collapse" data-target="#submenu2" aria-expanded="false"><b style="font-size:120%">Front-End Development</b></a>
			<ul class="nav collapse" id="submenu2" role="menu" aria-labelledby="btn-2" style="padding:15px;">
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
			</ul>
		</li>
		</li>
		<li><a href="#" id="btn-3" data-toggle="collapse" data-target="#submenu3" aria-expanded="false"><b style="font-size:120%">Back-End Development</b></a>
			<ul class="nav collapse" id="submenu3" role="menu" aria-labelledby="btn-3" style="padding:15px;">
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
<a href="http://junto.link/feed.php?subcat=Debugging">Debugging Tools</a><br>
			</ul>
		</li>

	</ul>
</nav>

     ';
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
                
                <script>
var lastused = 2;
var currentcat = "BD"
function activate(str){
if(str.length > 5){document.getElementById("submit_btn").disabled = false;}
else {document.getElementById("submit_btn").disabled = true;}
//document.getElementById("submit_btn").disabled = false;
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
	\'<option value="ASP.NET">ASP.NET</option>\'+
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
var FE = \' Sub-category \' +
	\'<select name="subcat\' + lastused + \'" form="form" id=lastused>\'+
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
var BE = \' Sub-category \' +
	\'<select name="subcat\'+ lastused +\'" form="form" id=lastused>\'+
	\'<option value="">Choose One</option>\'+
        \'<option value="Security">Security</option>\'+
        \'<option value="DataManagement">Data Management</option>\'+
        \'<option value="Hosting">Hosting</option>\'+
        \'<option value="PHP">PHP</option>\'+
        \'<option value="Python">Python</option>\'+
	\'<option value="ASP.NET">ASP.NET</option>\'+
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
var BD = \' Sub-category \'  +
 	\'<select name="subcat\'+ lastused + \'" form="form" id=lastused>\'+
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
                 <form action="submit.php" method="get" id="form" autocomplete="off">
  <div>
   <label for="title">Title :</label>
   <input type="text" name="title" id="title" size="45"/>
   <span id="title-status"></span> 
  </div>

  <div>
   <label for="description">Description  :</label><br>
   <textarea rows="4" cols="50" name="description" id="description"></textarea>
   <span id="description-status"></span>
  </div>
 
 Medium 
  <select name="type" form="form">
    <option value="Video/Audio">Video</option>
    <option value="Website">Website/Tool</option>
    <option value="Influencer">Twitter influencer</option>
    <option value="Blog">Blog</option>
    <option value="Book">Book</option>
  </select>

 <br>
 <br>
  <div>
   <label for="url">URL :</label>
   <input type="text" name="url" id="url" size="45" onchange="activate(this.value)"/>
   <span id="url-status"> </span> 
  </div>
 <br>
     <div id="adder">
      <div>
      Category 
        <select name="cat" form="form" onchange="update(this.value)">
          <option value="BD">Business development</option>
          <option value="FE">Front-end development/Design</option>
          <option value="BE">Back-end development</option>
        </select>
     <br>
      Sub-category 
       <select name="subcat1" form="form" id="D1"> 
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

<button type="button" id="adderbutton" onclick="add()">add another category</button>
<br>
<br>
<br>
<div><input name="submit" type="submit" value="submit" id="submit_btn" disabled /></div>

</form>
                
                
                <p class="text-warning"><small></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
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
                <p>A feedback form will be put here!</p>
                <p class="text-warning"><small></small></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
            </div>

        </div>
    </div>
</div>

';




echo '<div class="submit" >';

echo '<a href="#submit" class="btn btn-lg btn-default" data-toggle="modal" style="display:block;left:auto;right:auto;">Submit a Card</a>';


echo '</div>'; 


echo '<div class="feedback">';
echo '<a href="#feedback" class="btn btn-lg btn-default" data-toggle="modal" style="display:block;">Leave Feedback</a>';
echo '</div>';

//echo '<div class="tab">';
//echo '</div>';

echo '<div class="feed-column">';

echo '


';




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

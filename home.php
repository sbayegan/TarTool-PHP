<?php
include('datalogin.php');
echo "<!DOCTYPE html>";
echo "<html>";
/* At the beginning we should detect and evaluate input varialbles in order to see which type of intormation should be generated
HOME 		-> No arguments passed
STREAMS 	-> 'feed' an empty argument
COMMUNITY	-> 'community' an empty argument
CONTRIBUTE	-> 'contribute' an empty argument
FEEDBACK	-> 'feedback' an empty argument
SIGNIN|SIGNUP	-> 'sign' an empty argument
LOGOUT		-> 'logout' an empty argument
NAVIGATION	-> 'navigate' 'category' 'subcategory'








Here is the overview of the actions that the script will take to generate content
1- Check and see if a coockie exist, if:
	The coockie exist we will then extract the name of the user and save it in the variable $name and the used id in the variable
	$id. 
	We will 

{$name} {$id}:which is set to zero by default

2- HEADER: Generate the usual heather and try to display the name of the user in the header if and only if it is set(coockie was detected)
3- BODY:
	* LANDING PAGE (Default landing page): Show a picture that is supposed to be inserted in the middle of the page(vertically) below the 
	  the HEADER.
	<The content of the BODY in this case is always the same regardless of the state of authentication of the user>
	* STREAM (display a curated feed to the user): Display a list of newly submitted resources from various formats and categories and sort
	  them by their submittion date. Most of the votes(ratings) associated with each resource are allocated at this stage of their lifespan on the
	  website
	<If the user is not signed-in, then we will generate a feed based on the following assuption 'The viewer is interested in the new contents from all categories'>
	* COMMUNITY: A very sample blog that introduces the group members along with the team's objectives and missions
	* CONTRIBUTE: Regardless of user's authentication status. A form is shown to the user to submit their desired resource. However, if the user is signed in
	  the id of the user that submitted the resource will be recorded for further analysis in the futtre (e.g which user submmitted the most resources).
	  on the other hand, an anonymous user will be required to provide us an e-mail address in order to accept their contribution. That e-mail address will
	  also get recorded.
	  Then a thank you message will be shown and the user will be redirected to the home page 
	* FEEDBACK: A form will be shown according to Barney and Kristy in order to interact with the users. If
			USER IS SIGNED ON: We will just show the form, let them fill it in and the submit
			NO USER IS DETECTED: The same form will be shown and the submitter's email will be mandatory
	* LOG OUT - SIGNIN/SIGNUP: 
			- If the user is not signed in, they will be redirected to a page that will allow them to sign-in or sign up if they are not logge in.
			- If the user is signed in then clicking the bottun wil log them out of their account and remove any coockies that were set by Junto
	  The user will then be redirected to the home page at the end of each aforementioned cases 

4- FOOTER: A simple and static footer that will be shown in the bottum of  every single page in the website
*/
// HEAD ------------------------------------------------------------------------------------------------------------------------


echo "<head>";

echo "<title>";
echo "</title>";
echo '<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo "<body>";
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <a href="home.php?r"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
echo '<span style="position:absolute;right:150px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <img src="http://junto.link/pictures/power.png" height="45" width="45"></span>';
//echo '<div class="top-right"><div class="menu"><a href="home.php?feed"></a></div>';

if(isset($_COOKIE['junto'])){
//echo '<div class="menu"><a href="home.php?library">.</a></div><div class="menu"><a href="home.php?interests">.</a></div>';
}

//echo '<div class="menu"><a href="home.php?community">.</a></div>';
//setcookie("junto","example", time()-2222,"/");
if(!isset($_COOKIE['junto'])){
//echo '<div class="menu">login |signup</span> </p>  </div>';
}

else{ 
/*
echo '

<div class="dropdown" style="position:relative;float:left;padding-left:2em;padding-right:1em" >
    
<button  type="button" id="" data-toggle="dropdown">';
$value = $_COOKIE['junto'];
$result= $conn->query("SELECT * FROM USERS WHERE USERID=$value");
$result = mysqli_fetch_assoc($result);
$result = $result["NAME"];

//echo 'Hello, '.$result;

echo
    '<span class="caret"></span></button>
    <ul class="dropdown-menu" role="menu" >
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Account Setting</a></li>
      <li role="presentation" class="divider"></li>
      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Log Out</a></li>
    </ul>
  </div>
*/
echo '</div>'; 

 }

echo '</div>';
// HEADER----------------------------------------------------------------------------

// BODY

echo '<span class="slider"></span>';
echo '<span class="top3">';
echo "This Week's Top 3";
echo '</span>';


echo'<div class="middle-bottom-box">';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';


echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'<div class="box">';
echo '<div class="sticker"></div>';
echo '<div class="profile-picture"></div>';
echo '<div class="box-stats"></div>';
echo '<div class="description"></div>';
echo '</div>';

echo'</div>';
echo '</body>';
echo '<footer>';
echo'<div class="footer-line">';
echo'</div>';



echo '</footer>';



$conn->close();
echo '</html>';
?>

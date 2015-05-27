<?php
include('datalogin.php');
include('printer.php');
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
echo "<body>";
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <a href="home.php"><img src="/pictures/logo.png" alt="logo" height="85" width="185"/> </a> </span>';

if(isset($_COOKIE['junto'])){

//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
echo '<span style="position:absolute;right:150px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
echo '<span style="position:absolute;right:50px;top:20px;"> <a href="authentication.php"><img src="http://junto.link/pictures/power-red.png" height="45" width="45"></a></span>';
}
else{
//echo '<span style="position:absolute;right:350px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
//echo '<span style="position:absolute;right:250px;top:10px;"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></span>';
echo '<span style="position:absolute;right:150px;top:10px;"><a href="feed.php"> <img src="http://junto.link/pictures/glasses.png" height="65" width="65"></a></span>';
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

 

echo '</div>';
// HEADER----------------------------------------------------------------------------

// BODY

echo '<div class="slider">
<div style="width:600px;height:60px;position:relative;margin-right:auto;margin-left:auto;top:10px;padding:10px;border:0px dashed white">
<p style="font-family:\'Open Sans\',sans-serif;font-size:180%;text-align:center">';
$temp = $conn->query("SELECT COUNT(*) as total FROM USERS");
$tem = mysqli_fetch_assoc($temp);
echo '<span style="color:red">'.$tem['total'].'</span>'; 
echo ' enthusiasts playing with ';
$temp = $conn->query("SELECT COUNT(*) as total FROM RESOURCES");
$temp = mysqli_fetch_assoc($temp);
echo '<span style="color:red">'.$temp['total'].'</span>';
echo ' resource cards
</p>
</div>
<div style="position:relative;width:370px;height:105px;margin-left:auto;margin-right:auto;top:20px;border:0px dashed white">
<img src="http://junto.link/pictures/check.png" height="100" width="100" style="position:absolute;left:0px;top:0px">
<img src="http://junto.link/pictures/reader.png" height="100" width="100" style="position:absolute;left:100px;top:0px">
<img src="http://junto.link/pictures/basic.png" height="70" width="70" style="position:absolute;left:230px;top:30px">
<img src="http://junto.link/pictures/pin.png" height="80" width="80" style="position:absolute;left:300px;top:20px">
</div>
<div style="position:relative;margin-left:auto;margin-right:auto;width:370px;height:20px;top:25px;border:0px dashed white">
<span style="margin-left:30px">Select</span> <span style="margin-left:60px">Discover</span><span style="margin-left:50px">Approve</span><span style="margin-left:40px">Pin</span>
</div>
</div>
<div style="position:relative;width:100%;height:50px;background-color:white;top:80px;color:black;text-align:center;text-align:center;font-size:180%;
text-family:Arial">
<p style="position:relative;top:30px">Trending Cards</p>
</div>


';


echo'<div class="feed-column">';


card(6);

card(6);

card(6);


echo'</div>';
echo '</body>';
echo '<footer>';
echo'<div class="footer-line">';
echo'</div>';



echo '</footer>';



$conn->close();
echo '</html>';
?>

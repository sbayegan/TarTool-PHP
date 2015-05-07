<?php
include('datalogin.php');
echo "<!DOCTYPE html>";
echo "<html>";
/* At the beginning we should detect and evaluate input varialbles in order to see which type of intormation should be generated
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
echo '<link rel="stylesheet" type="text/css" href="style.css">';
echo "</head>";

// BODY -----------------------------------------------------------------------------------------------------------------------
// HEADER----------------------------------------------------------------------------
echo "<body>";
echo '<div class="stick-to-top">';

echo '<span class="top-left"> <img src="/pictures/logo.png" alt="logo" height="50" width="109"/>  </span>';
echo '<span class="top-right">
<p> 
<span class="menu">Streams</span>
<span class="menu">Community</span>
<span class="menu">Contribute</span>
<span class="menu">Feedback</span>
<span class="menu">login / signup</span> </p>  </span>';

echo '</div>';
// HEADER----------------------------------------------------------------------------

// BODY

echo '<img class="slider" src="/pictures/slider.png">';
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


echo'<div class="box"></div>';

echo'<div class="box"></div>';
echo'<div class="box"></div>';

echo'<div class="box"></div>';
echo'<div class="box"></div>';

echo'<div class="box"></div>';
echo'<div class="box"></div>';
echo'<div class="box"></div>';
echo'</div>';

echo '</body>';
echo '<footer>';


echo'<div class="footer-line">';

echo'</div>';





echo '</footer>';
echo '</html>';
echo "<html><br></html>";

$conn->close();
?>

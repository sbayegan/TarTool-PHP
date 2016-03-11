<?php
include('../UniversalHeader.php');
include('../datalogin.php');
if(!isset($_COOKIE['junto'])){
//header('Location: http://wwww.tartool.com');
}

echo "<!DOCTYPE html>";
echo "<html>";
echo "<head>";
echo "<title>";
echo $UniversalName;
echo "</title>";
echo '<link rel="shortcut icon" href="../pictures/icon.ico">';
echo '
<link rel="stylesheet" type="text/css" href="../style.css">
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

  echo '<span class="top-left"><img src="/logo/junto_logo_solo.png" alt="logo" height="50" width="40"/> </span>';
  echo '<h2 style="font-family:Thin;font-size:190%;location:fixed;color:black;margin-top:17px;margin-left:200px;color:grey;">Get Inspired</h2>';
  echo ' <div class="top-left-name">tarTool</div>';
  echo ' <div class="top-left-beta">BETA</div>';
  echo '<a href="."><div class="logo-link"></div></a>';

echo '<span style="position:absolute;right:30px;top:5px;"> <a href="logout.php"><img src="../pictures/power-red.png" height="45" width="45"></a></span>';
echo '<span style="position:absolute;float:left;right:100px;top:5px;"> <a href="#" onclick="showprofile()"><img src="../pictures/profile.png" height="50" width="50" alt="account"></a></span>';
echo '</div>';


echo '<div class="user-info">';

echo '<div class="user-photo">';
echo '<img style="border-radius:5px;margin-top:25px;" src="https://scontent-yyz1-1.xx.fbcdn.net/hphotos-prn2/v/t1.0-9/1240124_10151707616079681_824214893_n.jpg?oh=3ad3529f939fbd713d1fd33fddee9f06&oe=57971FF4" width="250" height="auto">';
echo '</div>';

echo '<div class="user-name">';
echo 'Saeid Bayeganeh';
echo '</div>';

echo '<div class="user-occupation">';
echo 'Founder of tarTool, Computer science graduate, Toronto!';
echo '</div>';

echo '<div class="user-blogging">';
echo '';
echo '</div>';

echo '</div>';//<div class="user-info">

echo '</body>';
echo '<footer>';
echo '</footer>';
$conn->close();
echo '</html>';
?>

<?php
include('../datalogin.php');
include('../PHP/printer.php');
echo'
<!DOCTYPE html>
<html>
<head>
<title>tarTool</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="mobileStyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

';
echo '<script src="../JS/code.js"></script>';
echo '</head>';

echo '<body><div data-role="page" id="pageone">';

echo  '<div data-role="panel" id="myPanel"> 
    <h2>Panel Header</h2>
    <p>You can close the panel by clicking outside the panel, pressing the Esc key or by swiping.</p>
  </div>';

echo  '<div data-role="header">
     		<a href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Dashboard</a>
  		</div>';

echo  '<div data-role="main" class="ui-content">';

card(22);
card(7);
card(22);
echo  	 '</div>';

echo  '<div data-role="footer">
    <h1>Page Footer</h1>
  </div> ';

echo '</div> </body>';
echo '</html>';




























?>
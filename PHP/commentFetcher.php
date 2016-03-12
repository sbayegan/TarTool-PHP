<?php

include('../datalogin.php');
include('printer.php');

$id;
if(isset($_GET['id'])){$id = mysqli_real_escape_string($conn,$_GET['id']);}
else {echo -1;return;}


//card($id);


$comments = $conn->query("SELECT * FROM COMMENTS WHERE RESOURCEID=".$id." ORDER BY DATE");
$title = $conn->query("SELECT * FROM RESOURCES WHERE RESOURCEID=".$id);
$title = mysqli_fetch_assoc($title);
$title = $title['TITLE'];
echo '<div style="position:absolute;top:20px;font-size:140%;">';
echo $title;
echo '</div>';
// create a while loop
echo '<div id="commentAppend" style="position:absolute;top:70px;height:340px;overflow:scroll;">';
if ($comments->num_rows == 0){echo '<div style="color:red;"> No comment has been submitted for this card yet! Go ahead and tell us what you think about this card :-)</div>';}
while($outComment = mysqli_fetch_assoc($comments)){
echo '<div class="singular-comment">';

$author = $outComment['USERID'];

if(isset($_COOKIE['junto']) && $_COOKIE['junto']==$author){echo '<img style="position:absolute;display:block;right:5px;top:2px;cursor:pointer;" alt="delete" src="pictures/cross-red.png" width="15" height="15" onclick="deleteComment(';$outComment['COMMENTID'];echo')">';}
$username = $conn->query("SELECT * FROM USERS WHERE USERID=".$author);
$username = mysqli_fetch_assoc($username);
$username = $username['USERNAME'];
echo '<b>'.$username.': </b>';
echo $outComment['CONTENT'];
echo '</div>';
}
echo '</div>';


// here print a text box so the user can post stuff














?>
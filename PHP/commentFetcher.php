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
echo '<div style="position:absolute;top:20px;left:20px;font-size:160%;">';
echo $title;
echo '</div>';
// create a while loop
echo '<div id="commentAppend" style="position:absolute;top:70px;bottom:110px;overflow:scroll;">';
//if ($comments->num_rows == 0){echo '<div style="color:red;"> No comment has been submitted for this card yet! Go ahead and tell us what you think about this card :-)</div>';}
while($outComment = mysqli_fetch_assoc($comments)){
echo '<div class="singular-comment" id="single-comment-';echo $outComment['COMMENTID'];echo '">';

$author = $outComment['USERID'];

if(isset($_COOKIE['junto']) && $_COOKIE['junto']==$author){echo '<span style="position:absolute;display:block;right:5px;bottom:-2px;cursor:pointer;color:red;"  onclick="deleteComment(';echo $outComment['COMMENTID'];echo ",";echo $id;echo')">Delete</span>';}
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
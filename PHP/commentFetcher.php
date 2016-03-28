<?php

include('../datalogin.php');
include('printer.php');

$id;
if(isset($_GET['id'])){$id = mysqli_real_escape_string($conn,$_GET['id']);}
else {echo -1;return;}


//card($id);


$comments = $conn->query("SELECT * FROM COMMENTS WHERE RESOURCEID=".$id." ORDER BY DATE");
$row = $conn->query("SELECT * FROM RESOURCES WHERE RESOURCEID=".$id);
$row = mysqli_fetch_assoc($row);
$title = $row['TITLE'];
echo '<div class="comment-title" >';
if($row['MEDIUM']!='Broadcast'){echo $title;}
else{
	$name = $conn->query("SELECT * FROM USERS WHERE USERID=".$row['SUBMITTER']);
	$name = mysqli_fetch_assoc($name);
	echo $name['NAME'];
}
echo '</div>';
// create a while loop
echo '<div  class="comment-container" id="commentAppend" >';
//if ($comments->num_rows == 0){echo '<div style="color:red;"> No comment has been submitted for this card yet! Go ahead and tell us what you think about this card :-)</div>';}
while($outComment = mysqli_fetch_assoc($comments)){
echo '<div class="singular-comment" id="single-comment-';echo $outComment['COMMENTID'];echo '">';

$author = $outComment['USERID'];

if(isset($_COOKIE['junto']) && $_COOKIE['junto']==$author){echo '<span style="position:absolute;display:block;right:5px;bottom:-2px;cursor:pointer;color:red;font-size:2vh;"  onclick="deleteComment(';echo $outComment['COMMENTID'];echo ",";echo $id;echo')">Delete</span>';}
$username = $conn->query("SELECT * FROM USERS WHERE USERID=".$author);
$username = mysqli_fetch_assoc($username);
$username = $username['USERNAME'];
echo '<a href="/techie/'.$username.'">'.'<b>'.$username.'</a>: </b>';
echo $outComment['CONTENT'];
echo '</div>';
}
echo '</div>';


// here print a text box so the user can post stuff














?>
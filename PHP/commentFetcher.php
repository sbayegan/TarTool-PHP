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
echo '<div style="position:absolute;top:30px;font-size:140%;">';
echo $title;
echo '</div>';
// create a while loop
echo '<div id="commentAppend" style="position:absolute;top:100px;height:400px;overflow:scroll;">';
if ($comments->num_rows == 0){echo 'No comment has been submitted for this card yet!';}
while($outComment = mysqli_fetch_assoc($comments)){
echo '<div class="singular-comment">';
$author = $outComment['USERID'];
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
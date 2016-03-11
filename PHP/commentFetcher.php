<?php

include('../datalogin.php');
include('printer.php');

$id;
if(isset($_GET['id'])){$id = mysqli_real_escape_string($conn,$_GET['id']);}
else {echo -1;return;}


//card($id);


$comments = $conn->query("SELECT * FROM COMMENTS WHERE RESOURCEID=".$id);
// create a while loop
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

// here print a text box so the user can post stuff
if(isset($_COOKIE['junto'])){

echo '
<textarea style="width:100%;margin-top:20px;" name="comment" form="commentform">You comment</textarea>
<form action="uploadComment.php" method="post" id="commentform" >
<input type="hidden" name="resource" value="';echo $id;echo '">
<div class="form-group" >
<input style="width:100%;" class="btn btn-default btn-sm" type="submit" value="Submit">
</div>
</form>

';



}














?>
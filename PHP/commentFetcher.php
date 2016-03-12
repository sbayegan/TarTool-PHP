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
echo '<div style="font-size:140%;margin-bottom:10px;">';
echo $title;
echo '</div>';
// create a while loop
echo '<div id="commentAppend">';
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
if(isset($_COOKIE['junto'])){

echo '
<textarea style="width:100%;margin-top:20px;" name="comment" form="commentform" id="comment"></textarea>
<form action="uploadComment.php" method="post" id="commentform" >
<input type="hidden" id="resourceCommenting" name="resource" value="';echo $id;echo '">
<div class="form-group" >
<input type="button" style="width:100%;" class="btn btn-default btn-sm" onclick="commentUpload()" value="Submit">
</div>
</form>
';



}














?>
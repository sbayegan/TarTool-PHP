<?php
include('../datalogin.php');


if(isset($_POST['comment']) && isset($_POST['resource']) && isset($_COOKIE['junto']) && !empty($_POST['resource'])){
$comment = mysqli_real_escape_string($conn,$_POST['comment']);
$resource = mysqli_real_escape_string($conn,$_POST['resource']);
$user = $_COOKIE['junto'];
$query = "SELECT COMMENTS FROM LAST WHERE ONE=1";		// Get the available
$result = $conn->query($query);
$temp = mysqli_fetch_assoc($result);
$commentid = $temp["COMMENTS"];

$next = $commentid + 1;
$query = "UPDATE LAST SET COMMENTS='$next' WHERE ONE=1";
$conn->query($query);

$query = "INSERT INTO COMMENTS VALUES($commentid,$user,$resource,NOW(),'$comment')";

$conn->query($query);

echo '<div class="singular-comment">';
$username = $conn->query("SELECT * FROM USERS WHERE USERID=".$user);
$username = mysqli_fetch_assoc($username);
$username = $username['USERNAME'];

echo '<b>'.$username.': </b>';
echo $comment;
echo '</div>';
}

else{
	echo -1;
}


?>

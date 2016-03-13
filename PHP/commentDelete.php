<?php
include('../datalogin.php');


if(isset($_POST['commentid']) && isset($_COOKIE['junto'])){

$commentid = mysqli_real_escape_string($conn,$_POST['commentid']);
$user = $_COOKIE['junto'];
$valid = $conn->query("SELECT * FROM COMMENTS WHERE COMMENTID=".$commentid." AND USERID=".$user);
if($valid->num_rows == 1){
$conn->query("DELETE FROM COMMMENTS WHERE COMMENTID=".$commentid);
echo 1;
} 
else{
	echo -1;
}
?>

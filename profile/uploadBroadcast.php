<?php
include('../datalogin.php');

if(isset($_POST['broadcast']) && !empty($_POST['broadcast']) && isset($_COOKIE['junto'])){
$broadcast = mysqli_real_escape_string($conn,$_POST['broadcast']);
$id = $_COOKIE['junto'];
$RESOURCEID = $conn->query("SELECT * FROM LAST WHERE ONE=1");
$RESOURCEID = mysqli_fetch_assoc($RESOURCEID);
$RESOURCEID = $RESOURCEID['RESOURCE'];
$conn->query("UPDATE LAST SET RESOURCE=".($RESOURCEID + 1)." WHERE ONE=1");


$query = "INSERT INTO RESOURCES VALUES($RESOURCEID,NULL,'$broadcast','Broadcast',NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NOW(),$id)";
$conn->query($query);
echo 1;
}
else{
	echo 0;
}


?>
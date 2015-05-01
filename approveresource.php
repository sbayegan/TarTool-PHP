<?php
include('datalogin.php');
$hash=mysqli_real_escape_string($conn,$_GET['hash']);
$id=mysqli_real_escape_string($conn,$_GET['id']);
$order=mysqli_real_escape_string($conn,$_GET['status']);

if($order == "active"){

$query = "UPDATE RESOURCES SET CONFIRMED=1 WHERE RESOURCEID=$id AND HASH=$hash";
$conn->query($query);
echo "activated";
}
else{
$query = "UPDATE RESOURCES SET CONFIRMED=0 WHERE RESOURCEID=$id AND HASH=$hash";
$conn->query($query);
echo "De-activated";
}







echo "<html><br></html>";
echo "HI";
$conn->close();
?>

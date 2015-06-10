<?php

if(!isset($_COOKIE['junto'])){
echo '0';
}
else{
if(isset($_POST['id'])){

include('datalogin.php');
$rid = mysqli_real_escape_string($conn , $_POST['id']) ;
$query = "DELETE FROM VOTES WHERE USERID=".$_COOKIE['junto']." and RESOURCEID=".$rid;
$conn->query($query);
$query = "INSERT INTO VOTES (USERID,RESOURCEID,DATE)  VALUES(" . $_COOKIE['junto'] . "," . $rid. ", NOW())" ;
$conn->query($query);
$conn->close();

echo '1';

}
}



?>

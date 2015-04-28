<?php
include('datalogin.php');

$name = $_POST['full_name'];
$email = $_POST['email'];
$username = $_POST['username'];
$pass = $_POST['password'];
$type = $_POST['type'];


echo $name;
echo "<html><br></html>";
echo $email;
echo "<html><br></html>";
echo $username;
echo "<html><br></html>";
echo $password;
echo "<html><br></html>";
echo $type;
echo "<html><br></html>";

print_r(hash_algos());
phpinfo();


echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";

$hashedpassword = password_hash($pass,PASSWORD_DEFAULT);
$hash = rand(0,1000000000);
$userid = 1;
$query = "INSERT INTO USERS VALUES (1,'$username','$hashedpassword','$name','$email',NOW(),'$type',0,'$hash')";
echo $query;
//if(crypt("jgkkj",$hashedpassword)){echo "!!!!they matched!!!!";}








$conn->close();
?>

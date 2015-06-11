<?php
/*
This script is used by the website administrator to approve the resources that were submitted by the users.
Once a resource is submitted, they will be stored in the database and wait fot an administrator's approval.
The approval works in the followin way.
1 - A random long integer will be save in the database along with the resource, called 'HASH' in the table
2 - A flag will be set to 0 which means not approved, called 'CONFIRMED' in the database.
3 - An email is sent to the administrator with a link that contains the address of this script along with the 
ID of the resource and its corresponding HASH.

That link will then execute this script and change the flag of the resource, the resource will then become available
to the public
*/
include('datalogin.php'); // Establish a connection to the database
$hash=mysqli_real_escape_string($conn,$_GET['hash']); // Escape and store the hash value
$id=mysqli_real_escape_string($conn,$_GET['id']); // Escape and store the id of the resource
$order=mysqli_real_escape_string($conn,$_GET['status']); // Get the status (there are two, one to active and another to undo)

if($order == "active"){ // If the activation link was pushed
$query = "UPDATE RESOURCES SET CONFIRMED=1 WHERE RESOURCEID=$id AND HASH=$hash"; // Flip the flag
$conn->query($query); // Execue the query
echo "activated"; // Report the result
}
else{ // If the undo button was pushed
$query = "UPDATE RESOURCES SET CONFIRMED=0 WHERE RESOURCEID=$id AND HASH=$hash"; // Make the query
$conn->query($query); // Execute it
echo "De-activated"; // Report the result
}







echo "<html><br></html>";
echo "HI";
$conn->close();
?>

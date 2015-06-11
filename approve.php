<?php
/*
This script is called by the javascript function on the home page called approve(id).
approve(id) takes the id of a resource (which is unique) and will pass it to this script.
This script will then take that RESOURCEID and then figure out the USERID of the user from
the cookie. Once we have the RESOURCEID and the USERID then we will place a tuple in the database
indicating that this user had approved that particular resource. I am trying to figure out the user ID
from the cookie to prevent any hacks since these submitions could be simulated by scripts. So if somebody
wants to execute this code they should have a cookie on their browser. And if they succeed to submit anything
to this script, they may in fact abuse their own account on our database.
*/

  if(!isset($_COOKIE['junto'])){echo '0';} // If a cookie is not detected, 0 is returned to the caller to indicate
                                           // this event ans then the caller will redirect the user to home page to login.
                                           // This mihgt happen when cookie expires while the user is navigating the website.

  else{                                    // If a cookie is detected
        if(isset($_POST['id'])){           // Check and make sure a resource ID is passed to us.
            include('datalogin.php');      // Establish a connection to the database
            $rid = mysqli_real_escape_string($conn , $_POST['id']) ; // Get the resource ID and ***escape it*** for security porpuses
            $query = "DELETE FROM VOTES WHERE USERID=".$_COOKIE['junto']." and RESOURCEID=".$rid; // Retrieve the user ID from the cookie and run a delete statement to prevent duplicates
            $conn->query($query);//Execute the query
            $query = "INSERT INTO VOTES (USERID,RESOURCEID,DATE)  VALUES(" . $_COOKIE['junto'] . "," . $rid. ", NOW())" ; // Add the row along with the date and time
            $conn->query($query);//Execute the query
            $conn->close();//Close the connection
            echo '1';// return 1 to the caller
                              }//if(isset($_POST['id']))
      }//else
?> 

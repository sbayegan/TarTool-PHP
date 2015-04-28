<?php

function valid_pass($candidate) {
    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $candidate))
        return FALSE;
    return TRUE;
}

if(isset($_POST['pass'])) //If a username has been submitted
{
$pass = $_POST['pass'];  

    if(valid_pass($pass))
   {
   echo '1';
   }
   else{
   echo '0';
   }
}



?>


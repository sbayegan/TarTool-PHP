<?php

/*
 * PHP PCRE - How to validate complex passwords using regular expressions
 */

if(isset($_POST['pass'])) //If a username has been submitted
{
$pass = $_POST['pass'];  

    if(strlen(trim($pass)) > 8)
   {
   echo "1";
   }
   else
   echo "0";
   
}


/*
    Explaining $\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$
    $ = beginning of string
    \S* = any set of characters
    (?=\S{8,}) = of at least length 8
    (?=\S*[a-z]) = containing at least one lowercase letter
    (?=\S*[A-Z]) = and at least one uppercase letter
    (?=\S*[\d]) = and at least one number
    (?=\S*[\W]) = and at least a special character (non-word characters)
    $ = end of the string

 */
?>


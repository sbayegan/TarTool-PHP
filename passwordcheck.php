<?php

/*
 * PHP PCRE - How to validate complex passwords using regular expressions
 */

if(isset($_POST['pass'])) //If a username has been submitted
{

function valid_pass($pwd) {
    if (preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $password))
{
    return true;
}
else return false;
}  

    
$pass = $_POST['pass'];   
if(valid_pass($pass)){echo '1';}
else echo '0';
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


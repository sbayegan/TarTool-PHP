<?php

/*
 * PHP PCRE - How to validate complex passwords using regular expressions
 */

function valid_pass($candidate) {
    if (!preg_match_all('$\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$', $candidate))
        return FALSE;
    return TRUE;
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

$password = 'mypassword01';
if(valid_pass($password))
    echo "$password is a valid password<br />";
else echo "$password is NOT a valid password<br />";

$password = 'myP@ssword01';
if(valid_pass($password))
    echo "$password is a valid password<br />";
else echo "$password is NOT a valid password<br />";
?>


<?php

function score($i){

include('datalogin.php');
$result = $conn->query('SELECT * FROM RESOURCES WHERE RESOURCEID='.$i);
$resource = mysqli_fetch_assoc($result);
$url = $resource['URL'];


$counter = "https://count.donreach.com/?url=".$url;
$response = file_get_contents($counter);

$decode = json_decode($response,true);
$linkedin = $decode["shares"]["linkedin"];
$facebook = $decode["shares"]["facebook"];
$twitter =  $decode["shares"]["twitter"];
$google =   $decode["shares"]["google"];


}



score(10);


?>

<?php

function score($i){

include('datalogin.php');
$result = $conn->query('SELECT * FROM RESOURCES WHERE RESOURCEID='.$i);
$resource = mysqli_fetch_assoc($result);
$url = $resource['URL'];
$temp = $conn->query('SELECT count(*) as likes from FAVOURITES WHERE RESOURCEID='.$i);
$temp = mysqli_fetch_assoc($temp);
$score = $temp['likes'];

$counter = "https://count.donreach.com/?url=".$url;
$response = file_get_contents($counter);

$decode = json_decode($response,true);
$linkedin = $decode["shares"]["linkedin"];
$facebook = $decode["shares"]["facebook"];
$twitter =  $decode["shares"]["twitter"];
$total = $facebook+$twitter+$linkedin+$score;
//$google =   $decode["shares"]["google"];
$query = 'UPDATE RESOURCES SET TWITTER='.$twitter.',FACEBOOK='.$facebook.',LINKEDIN='.$linkedin.',LIKES='.$score.',TOTALSCORE='.$total.' where RESOURCEID='.$i;
//echo $query;
$conn->query($query);

$conn->close();
}
function updateall(){
include('datalogin.php');
$result = $conn->query('SELECT RESOURCEID FROM RESOURCES');
while($temp = mysqli_fetch_assoc($result)){
score($temp['RESOURCEID']);
}
$conn->close();}

updateall();
echo 'resource updated: SUCCESS';
?>

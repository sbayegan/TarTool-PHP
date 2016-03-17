<?php

function score($i){

//echo '---';

include('datalogin.php');
$result = $conn->query('SELECT * FROM RESOURCES WHERE RESOURCEID='.$i);
$resource = mysqli_fetch_assoc($result);
$url = $resource['URL'];
$temp = $conn->query('SELECT count(*) as likes from FAVOURITES WHERE RESOURCEID='.$i);
$temp = mysqli_fetch_assoc($temp);
$score = $temp['likes'];

$counter = "http://free.sharedcount.com/url?apikey=cdf41646515ec58a3822dde01b7bb862b80cd8d8&url=".$url;
$response = file_get_contents($counter);
$decode = json_decode($response,true);
$linkedin = $decode["LinkedIn"];
$facebook = $decode["Facebook"]["share_count"];
$twitter =  $decode["Twitter"];
$google;
if(isset($decode["GooglePlusOne"])){$google=$decode["GooglePlusOne"];}else{$google=0;}
$total = $facebook+$twitter+$linkedin+$score;

$query = 'UPDATE RESOURCES SET '.' GOOGLEPLUS='.$google.',FACEBOOK='.$facebook.',LINKEDIN='.$linkedin.',LIKES='.$score.',TOTALSCORE='.$total.' WHERE RESOURCEID='.$i;
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
//score(10);
updateall();
echo 'resource updated: SUCCESS';
?>

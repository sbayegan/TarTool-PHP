<?php


function card($i){
include ('datalogin.php');
$result = $conn->query("SELECT * FROM RESOURCES WHERE RESOURCEID=".$i);
$tags = $conn->query("SELECT * FROM CATEGORIES WHERE RESOURCEID=".$i);
$firsttag = mysqli_fetch_assoc($tags);

echo '<div class="box">';



    echo '<div class="sticker">'; 
    if ($firsttag['CAT'] == 'BD') {echo 'Business Development';}
    if ($firsttag['CAT'] == 'FE') {echo 'Front-End Development';}
    if ($firsttag['CAT'] == 'BE') {echo 'Back-End Development';}
    echo '</div>';
    echo '<div class="subcats">';
    echo $firsttag['SUB'];
     while($firsttag = mysqli_fetch_assoc($tags)){echo ', '.$firsttag['SUB'];}
    echo '</div>';
    echo '<div class="profile-picture">';
    echo ' <img src="';
    $result = mysqli_fetch_assoc($result);
    echo $result['PROFILEPICTURE'];
    echo '" width="100" height="100" style="margin-top:0px;float:right"> 
          </div>';
    echo '<a href="'.$result['URL'].'" target="_blank">'.'<div class="description">';
    echo '<b>'.$result['TITLE'].'</b><br><br>';
    echo $result['DESCRIPTION'];
    echo'</div></a>';
    echo '<div class="score">';
    echo '<img src="http://junto.link/pictures/facebook.png" width="45" height="45" style="float:right;margin-right:5px">';
    echo '<img src="http://junto.link/pictures/twitter.png" width="45" height="45" style="float:right;margin-right:20px">';
    echo '<img src="http://junto.link/pictures/linkedin.png" width="45" height="45" style="float:right;margin-right:25px">';
    echo '</div>';
    echo '<div class="box-stats">';
    echo '<img src="http://junto.link/pictures/basic.png" width="60" height="65" style="float:left;margin-left:10px">';
    echo '<img src="http://junto.link/pictures/pin.png" width="60" height="55" style="float:right;margin-right:10px;margin-top:7px">';
    echo '</div>';


echo '</div>';
}


?>

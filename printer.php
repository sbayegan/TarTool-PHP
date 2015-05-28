<?php


function card($i){
include ('datalogin.php');
$result = $conn->query("SELECT * FROM RESOURCES WHERE RESOURCEID=".$i);
$tags = $conn->query("SELECT * FROM CATEGORIES WHERE RESOURCEID=".$i);
$result = mysqli_fetch_assoc($result);
$medium = $result['MEDIUM'];
$firsttag = mysqli_fetch_assoc($tags);

echo '<div class="box" style="background-color:#FCFCFC;">';



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
   
    echo $result['PROFILEPICTURE'];
    echo '" width="100" height="100" style="margin-top:0px;float:right"> 
          </div>';
    echo '<a href="'.$result['URL'].'" target="_blank">';
    echo '<div class="title"><b>';
    echo $result['TITLE'];
    echo '</b></div>';
    echo '<div class="description">';
    //echo '<b>'.$result['TITLE'].'</b><br><br>';
    echo $result['DESCRIPTION'];
    echo'</div></a>';
    echo '<div class="score">';
    echo '<img src="http://junto.link/pictures/facebook.png" width="45" height="45" style="float:right;margin-right:5px">';
    echo '<img src="http://junto.link/pictures/twitter.png" width="45" height="45" style="float:right;margin-right:20px">';
    echo '<img src="http://junto.link/pictures/linkedin.png" width="45" height="45" style="float:right;margin-right:25px">';
    echo '</div>';
    echo '<div class="box-stats" style="background-color:';
     if($medium == 'video')     {echo '#CCFF33;';}
     if($medium == 'website')   {echo '#CC00FF;';}
     if($medium == 'blog')      {echo '#FF9933;';}
     if($medium == 'book')      {echo '#FF6699;';}
     if($medium == 'influencer'){echo '#00ACED;';}
     else{echo 'red';}

    echo'">';
    echo '<img src="http://junto.link/pictures/basic.png" width="60" height="65" style="float:left;margin-left:10px">';
    echo '<img src="http://junto.link/pictures/pin.png" width="60" height="55" style="float:right;margin-right:10px;margin-top:7px">';
    echo '</div>';


echo '</div>';
}


?>

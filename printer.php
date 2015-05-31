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
    echo '" width="100" height="100" style="margin-top:0px;float:right;margin-right:10px"> 
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
    echo '<img src="http://junto.link/pictures/facebook.png" width="30" height="30" style="float:right;margin-right:37px;margin-top:15px">';
    echo '<img src="http://junto.link/pictures/twitter.png" width="30" height="30" style="float:right;margin-right:20px;margin-top:17px">';
    echo '<img src="http://junto.link/pictures/linkedin.png" width="30" height="30" style="float:right;margin-right:25px;margin-top:16px">';
    echo '<img src="http://junto.link/pictures/basic.png" width="30" height="30" style="float:right;margin-right:22px;margin-top:19px">';
    //echo '<div style="position:absolute;left:4px;font-size:250%;margin-top:15px">'.'Score: '.$result['TOTALSCORE'].'</div>';

    echo '</div>';    

    echo '<div class="numbers">';
    //echo '<div style="position:absolute;left:4px;font-size:120%">'.'Score: <b>'.$result['TOTALSCORE'].'</b></div>';
    echo '<div style="position:absolute;left:264px;font-size:110%">'.$result['LIKES'].'</div>';
    echo '<div style="position:absolute;left:307px;font-size:110%">'.$result['LINKEDIN'].'</div>';
    echo '<div style="position:absolute;left:365px;font-size:110%">'.$result['TWITTER'].'</div>';
    echo '<div style="position:absolute;margin-left:424px;font-size:110%">'.$result['FACEBOOK'].'</div>';
    
    
   


     echo '</div>';



echo '<div class="box-stats" style="background-color:';
     if($medium == 'Video/Audio')     {echo '#B3FFBD;';}
     if($medium == 'Website')   {echo '#FFDAA3;';}
     if($medium == 'Blog')      {echo '#FF9933;';}
     if($medium == 'Book')      {echo '#FFACE3;';}
     if($medium == 'Influencer'){echo '#A3D1FF;';}
     else{echo 'red';}

    echo'">';
    echo '<div style="position:absolute;right:50px;font-size:150%;margin-top:4px;color:#636363">'.'Social score: '.$result['TOTALSCORE'].'</div>';
    echo '<div style="position:absolute;left:10px;font-size:150%;margin-top:4px;color:#636363;">'.''.$result['MEDIUM'].'</div>';
//echo '<img src="http://junto.link/pictures/basic.png" width="60" height="65" style="float:left;margin-left:10px">';
    //echo '<img src="http://junto.link/pictures/pin.png" width="40" height="40" style="float:right;margin-right:10px;margin-top:2px">';
    echo '</div>';


echo '</div>';
}


?>

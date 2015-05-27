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
    echo '<div class="box-stats"></div>';
    echo '<div class="description"></div>';


echo '</div>';
}



function familyName($fname) {
     echo "$fname Refsnes.<br>";
}

?>

<?php
include('../datalogin.php');


if(isset($_FILES["image"]) && isset($_COOKIE['junto'])) {
  echo 'File detected';
  $target_dir = "pics/";
  $target_file = $target_dir . $_COOKIE['junto'];
  $imageFileType = pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION);
  $target_file = $target_file. '.' . $imageFileType;
  $uploadOk = 1;

  if ($_FILES["image"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;}
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "JPG" && $imageFileType != "PNG" && $imageFileType != "JPEG"
    && $imageFileType != "GIF") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;}
  if ($uploadOk == 0) {
    //echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
          if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            

          	 $user = $conn->query("SELECT * FROM USERS WHERE USERID=".$_COOKIE['junto']);
          	 $user = mysqli_fetch_assoc($user);
          	 if($target_file != $user['PROFILEPICTURE']){unlink($user['PROFILEPICTURE']);}
             list($width, $height) = getimagesize($target_file);
             $conn->query("UPDATE USERS SET PROFILEPICTURE='".$target_file."' , PWIDTH=".$width." , PHEIGHT=".$height." WHERE USERID=".$user['USERID']);
             
              //echo 1; 
          }
          else {
              echo -1;
                }
          }
}

?>
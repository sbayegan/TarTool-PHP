<?php
include('../datalogin.php');
include('printer.php');

$cat = mysqli_real_escape_string($conn,$_GET['cat']);
$feedquantity = 20;

if(isset($_GET['cat']) and $cat!="NULL"){
$last = mysqli_real_escape_string($conn,$_GET['last']);
$query="select * from RESOURCES where CONFIRMED=1 order by ADDED desc";
$result = $conn->query($query);
$final;
$counter = $feedquantity;
while($card = mysqli_fetch_assoc($result)){
	if($card['RESOURCEID'] < $last && $card['MEDIUM']!='Broadcast'){
		$cats = $conn->query('select * from CATEGORIES where RESOURCEID='.$card['RESOURCEID']);
		while($temp = mysqli_fetch_assoc($cats)){
		if($counter == 0){break;}
			$matched = 0;
			if($cat == $temp['CAT'] || $cat == $temp['SUB']){$matched=1;}
			if($matched == 1){
				$final = $card['RESOURCEID'];
				$counter = $counter - 1;
				break;}
		}//while
	}// if statement
		else{
		$final = $card['RESOURCEID'];
		$counter = $counter - 1;
	}
	if($counter == 0){
		break;}// if statement
		}
if($counter == $feedquantity ){
	echo 0;
				  }//if
}

elseif(isset($_COOKIE['junto'])){
$userid = $_COOKIE['junto'];
$last = mysqli_real_escape_string($conn,$_GET['last']);
$query="select * from RESOURCES where CONFIRMED=1 order by ADDED desc";
$result = $conn->query($query);
$final;
$counter = $feedquantity;

while($card = mysqli_fetch_assoc($result)){
	if($card['RESOURCEID'] < $last){
		$cats = $conn->query('select * from CATEGORIES where RESOURCEID='.$card['RESOURCEID']);
		while($temp = mysqli_fetch_assoc($cats)){
			$match = $conn->query('select * from INTERESTS where USERID='.$_COOKIE['junto'].' and INTEREST="'.$temp['SUB'].'"');
			if($match->num_rows > 0){
				$final = $card['RESOURCEID'];
				$counter = $counter - 1;
				break;}
		}//while
	}// if statement
	if($counter == 0){	
		echo $final;
		break;
	}// if statement
	}//while
// This is if no cards have been shown
if($counter == $feedquantity ){echo 0;
			}//if
elseif($counter > 0){
echo $final;
		}//elseif
}

else{
$last = mysqli_real_escape_string($conn,$_GET['last']);
$query="select * from RESOURCES where CONFIRMED=1 order by ADDED desc";
$result = $conn->query($query);
$final;
$counter = $feedquantity;
while($card = mysqli_fetch_assoc($result)){
	if($counter == 0){break;}
	if($card['RESOURCEID'] < $last){
				$final = $card['RESOURCEID'];
				$counter = $counter - 1;}
	}// if statement
if($counter == 0){echo $final;}
elseif($counter == $feedquantity ){echo 0;}
elseif($counter > 0){echo $final;
}
}


?>

<?php
include('datalogin.php');
include('printer.php');
if(isset($_COOKIE['junto'])){
$userid = $_COOKIE['junto'];
$last = mysqli_real_escape_string($conn,$_GET['last']);
$query="select * from RESOURCES where CONFIRMED=1 order by ADDED desc";
$result = $conn->query($query);
$final;
$counter = 3;
//echo $query;

while($card = mysqli_fetch_assoc($result)){
//echo 'select * from CATEGORIES where RESOURCEID='.$card['RESOURCEID'].'----';
//echo $card['RESOURCEID'];

	if($card['RESOURCEID'] < $last){

		$cats = $conn->query('select * from CATEGORIES where RESOURCEID='.$card['RESOURCEID']);
		while($temp = mysqli_fetch_assoc($cats)){
		if($counter == 0){break;}
		//echo 'select * from INTERESTS where USERID='.$_COOKIE['junto'].' and INTEREST='.$temp['SUB'].'----';
			$match = $conn->query('select * from INTERESTS where USERID='.$_COOKIE['junto'].' and INTEREST="'.$temp['SUB'].'"');
	
			if($match->num_rows > 0){
				card($card['RESOURCEID']);
				$final = $card['RESOURCEID'];
				$counter = $counter - 1;
				break;}
		}//while
	}// if statement

	if($counter == 0){
		break;
	}// if statement
}

if($counter == 3 ){
echo 0;
}

}







?>

<?php
include('datalogin.php');
include('printer.php');
if(isset($_COOKIE['junto'])){
$userid = $_COOKIE['junto'];
$last = mysqli_real_escape_string($conn,$_GET['last']);
$query="select * from RESOURCES where CONFIRMED=1 order by ADDED";
$result = $conn->query($query);
$final;
$counter = 3;

while($card = mysqli_fetch_assoc($result)){
//echo 'select * from CATEGORIES where RESOURCEID='.$card['RESOURCEID'].'----';

	if($card['RESOURCEID'] < $last){
		$cats = $conn->query('select * from CATEGORIES where RESOURCEID='.$card['RESOURCEID']);
		while($temp = mysqli_fetch_assoc($cats)){
		//echo 'select * from INTERESTS where USERID='.$_COOKIE['junto'].' and INTEREST='.$temp['SUB'].'----';
			$match = $conn->query('select * from INTERESTS where USERID='.$_COOKIE['junto'].' and INTEREST="'.$temp['SUB'].'"');
			if($match->num_rows > 0){
				//card($card['RESOURCEID']);
				$final = $card['RESOURCEID'];
				//echo $final;
				$counter = $counter - 1;
				break;}
		}//while
	}// if statement
	if($counter == 0){
		/*
		echo'
		<script type="text/javascript">
		var LastCard=';	
		//$date = new DateTime();
		//echo time();
		echo $final;
		echo ';</script>';*/	
		echo $final;
		break;
	}// if statement
}

if($counter == 3 ){
echo 0;
}
elseif($counter > 0){
echo $final;
}
}







?>

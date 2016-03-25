<?php
include('../datalogin.php');
include('../PHP/printer.php');
echo'
<!DOCTYPE html>
<html>
<head>
<title>tarTool</title>

<link rel="stylesheet" type="text/css" href="mobileStyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

';
echo '<link rel="shortcut icon" href="/pictures/icon.ico">';
echo '<script src="../JS/code.js"></script>';
echo '</head>';

echo '<body> ';
echo '<script>';
echo '
function flipview(){
	$(".saving-icon").animate({left: "78vw"});
	$(".facebook-icon").animate({right: "78vw"});
	$(".linkedin-icon").animate({right: "66vw"});
	$(".panel-menu").animate({left: "65vw"});
	$(".panel-flip").animate({right: "70vw"});

	$("#panel-flip").attr("onclick", "resetview()");
	return;
}

function resetview(){
	$(".saving-icon").animate({left: "2vw"});
	$(".facebook-icon").animate({right: "2vw"});
	$(".linkedin-icon").animate({right: "14vw"});
	$(".panel-menu").animate({left: "14vw"});
	$(".panel-flip").animate({right: "16vw"});

	$("#panel-flip").attr("onclick", "flipview()");
	return;
}
';


echo '</script>';

	echo '<div class="feed-column" id="feed">';

	echo 
		'<script type="text/javascript">
		// So that the page is shown from the beginning on every load.
		$(window).on("beforeunload", function() {
    	$(window).scrollTop(0);
		});


		// LastCard is not changed based on whether or not a cat or a subcat is clicked
		var LastCard = ';
		$query = "select max(RESOURCEID) as RESOURCEID from RESOURCES";
		$result = $conn->query($query);
		$bigest = mysqli_fetch_assoc($result);
		echo ($bigest['RESOURCEID']+1).';';
		echo'
		var Ended = 0;
		var Frame = 0;
		var Load = 0;
            $(window).scroll(function(){
                    if  ($(document).height() - ($(window).height() + $(window).scrollTop()) < 400 ){
                          // run our call for pagination    
	    		 // Here if no category or subcategories are chosen then just call loader(LastCard,NULL);
           // else call loader(LastCard,Cat|Subcat)';
     	if (!isset($_GET['cat']) && !isset($_GET['subcat'])) echo'
           loader(LastCard,"NULL");
			     numloader(LastCard,"NULL");
		                                    }
            });
	    loader(LastCard,"NULL");
	    numloader(LastCard,"NULL");';
     	elseif (isset($_GET['cat'])){echo'
           loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo '");
           numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo'");
                                        }
            });
      	loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo '");
      	numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['cat']);echo'");';}
      	elseif (isset($_GET['subcat'])){echo'
           loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo '");
           numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo'");
                                        }
            });
      	loader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo '");
      	numloader(LastCard,"';echo mysqli_real_escape_string($conn,$_GET['subcat']);echo'");';}
		echo '</script>';
		// Printing the Category and Subcategory tags
		if (isset($_GET['cat'])) {ShowCatSubcat(mysqli_real_escape_string($conn,$_GET['cat']));}
		else if (isset($_GET['subcat'])) {ShowCatSubcat(mysqli_real_escape_string($conn,$_GET['subcat']));}

//card(22);
//card(7);
//card(22);
	echo '</div>';// feed-column
//echo  	 '</div>';//Main

echo  '<div class="flat-panel">
<div class="middle-logo"><img src="/logo/junto_logo_solo.png" alt="logo" height="90%" width="auto"> </div>
<div class="panel-flip" id="panel-flip" onclick="flipview()"><img src="/pictures/flip.png" alt="logo" height="90%" width="auto"></div>
<div class="panel-menu" >menu</div>
  </div> ';

echo '</body>';
echo '</html>';




























?>
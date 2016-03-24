<?php
include('../datalogin.php');
include('../PHP/printer.php');
echo'
<!DOCTYPE html>
<html>
<head>
<title>tarTool</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>';
echo '<link rel="stylesheet" type="text/css" href="mobileStyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">

';
echo '<script src="../JS/code.js"></script>';
echo '</head>';

echo '<body><div data-role="page" id="pageone">';

echo  '<div data-role="panel" id="myPanel"> 
    <h2>Panel Header</h2>
    <p>You can close the panel by clicking outside the panel, pressing the Esc key or by swiping.</p>
  </div>';

echo  '<div data-role="header">

  		</div>';

echo  '<div data-role="main" class="ui-content">';
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
echo  	 '</div>';//Main

echo  '<div data-role="footer">
		<a href="#myPanel" class="ui-btn ui-btn-inline ui-corner-all ui-shadow">Dashboard</a>
  </div> ';

echo '</div> </body>';
echo '</html>';




























?>
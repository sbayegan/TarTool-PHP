<?php
if(isset($_COOKIE['junto'])){
$userid = $_COOKIE['junto'];

function add($user,$interest){
include ('datalogin.php');
$query = 'INSERT into INTERESTS VALUES ('.$user.',"'.$interest.'")';
$conn->query($query);
$conn->close();}

function remove($user,$interest){
include ('datalogin.php');
$query = 'DELETE FROM INTERESTS WHERE USERID='.$user.' and INTEREST="'.$interest.'"';
echo $query;
$conn->query($query);
$conn->close();
}

if(isset($_POST['SEO'])){remove($userid,'SEO');add($userid,'SEO');}else{remove($userid,'SEO');}
if(isset($_POST['Sales'])){remove($userid,'Sales');add($userid,'Sales');}else{remove($userid,'Sales');}
if(isset($_POST['Naming'])){remove($userid,'Naming');add($userid,'Naming');}else{remove($userid,'Naming');}
if(isset($_POST['CopyWriting'])){remove($userid,'CopyWriting');add($userid,'CopyWriting');}else{remove($userid,'CopyWriting');}
if(isset($_POST['MarketingAndResearch'])){remove($userid,'MarketingAndResearch');add($userid,'MarketingAndResearch');}else{remove($userid,'MarketingAndResearch');}
if(isset($_POST['UserFeedback'])){remove($userid,'UserFeedback');add($userid,'UserFeedback');}else{remove($userid,'UserFeedback');}
if(isset($_POST['ProjectManagement'])){remove($userid,'ProjectManagement');add($userid,'ProjectManagement');}else{remove($userid,'ProjectManagement');}
if(isset($_POST['InventoryManagement'])){remove($userid,'InventoryManagement');add($userid,'InventoryManagement');}else{remove($userid,'InventoryManagement');}
if(isset($_POST['Outsourcing'])){remove($userid,'Outsourcing');add($userid,'Outsourcing');}else{remove($userid,'Outsourcing');}
if(isset($_POST['Funding'])){remove($userid,'Funding');add($userid,'Funding');}else{remove($userid,'Funding');}
if(isset($_POST['Productivity'])){remove($userid,'Productivity');add($userid,'Productivity');}else{remove($userid,'Productivity');}
if(isset($_POST['Analytics'])){remove($userid,'Analytics');add($userid,'Analytics');}else{remove($userid,'Analytics');}
if(isset($_POST['LeanStartup'])){remove($userid,'LeanStartup');add($userid,'LeanStartup');}else{remove($userid,'LeanStartup');}
if(isset($_POST['Launching'])){remove($userid,'Launching');add($userid,'Launching');}else{remove($userid,'Launching');}
if(isset($_POST['SocialMediaCommunity'])){remove($userid,'SocialMediaCommunity');add($userid,'SocialMediaCommunity');}else{remove($userid,'SocialMediaCommunity');}
if(isset($_POST['Administration'])){remove($userid,'Administration');add($userid,'Administration');}else{remove($userid,'Administration');}
if(isset($_POST['CustomerService'])){remove($userid,'CustomerService');add($userid,'CustomerService');}else{remove($userid,'CustomerService');}
if(isset($_POST['AcceleratorsAndIncubators'])){remove($userid,'AcceleratorsAndIncubators');add($userid,'AcceleratorsAndIncubators');}else{remove($userid,'AcceleratorsAndIncubators');}
if(isset($_POST['E-commerce'])){remove($userid,'E-commerce');add($userid,'E-commerce');}else{remove($userid,'E-commerce');}
if(isset($_POST['Events'])){remove($userid,'Events');add($userid,'Events');}else{remove($userid,'Events');}

if(isset($_POST['UserInterface'])){remove($userid,'UserInterface');add($userid,'UserInterface');}else{remove($userid,'UserInterface');}
if(isset($_POST['UserExperience'])){remove($userid,'UserExperience');add($userid,'UserExperience');}else{remove($userid,'UserExperience');}
if(isset($_POST['MockupsAndWireframing'])){remove($userid,'MockupsAndWireframing');add($userid,'MockupsAndWireframing');}else{remove($userid,'MockupsAndWireframing');}
if(isset($_POST['HTML'])){remove($userid,'HTML');add($userid,'HTML');}else{remove($userid,'HTML');}
if(isset($_POST['CSS'])){remove($userid,'CSS');add($userid,'CSS');}else{remove($userid,'CSS');}
if(isset($_POST['JavaScript'])){remove($userid,'JavaScript');add($userid,'JavaScript');}else{remove($userid,'JavaScript');}
if(isset($_POST['Themes'])){remove($userid,'Themes');add($userid,'Themes');}else{remove($userid,'Themes');}
if(isset($_POST['Mobile'])){remove($userid,'Mobile');add($userid,'Mobile');}else{remove($userid,'Mobile');}
if(isset($_POST['FrontEndiOS'])){remove($userid,'FrontEndiOS');add($userid,'FrontEndiOS');}else{remove($userid,'FrontEndiOS');}
if(isset($_POST['FrontEndAndroid'])){remove($userid,'FrontEndAndroid');add($userid,'FrontEndAndroid');}else{remove($userid,'FrontEndAndroid');}
if(isset($_POST['Bootstrap'])){remove($userid,'Bootstrap');add($userid,'Bootstrap');}else{remove($userid,'Bootstrap');}
if(isset($_POST['XML'])){remove($userid,'XML');add($userid,'XML');}else{remove($userid,'XML');}
if(isset($_POST['JQuery'])){remove($userid,'JQuery');add($userid,'JQuery');}else{remove($userid,'JQuery');}
if(isset($_POST['Angular'])){remove($userid,'Angular');add($userid,'Angular');}else{remove($userid,'Angular');}
if(isset($_POST['Canvas'])){remove($userid,'Canvas');add($userid,'Canvas');}else{remove($userid,'Canvas');}
if(isset($_POST['SVG'])){remove($userid,'SVG');add($userid,'SVG');}else{remove($userid,'SVG');}
if(isset($_POST['JSON'])){remove($userid,'JSON');add($userid,'JSON');}else{remove($userid,'JSON');}
if(isset($_POST['Ajax'])){remove($userid,'Ajax');add($userid,'Ajax');}else{remove($userid,'Ajax');}

if(isset($_POST['Security'])){remove($userid,'Security');add($userid,'Security');}else{remove($userid,'Security');}
if(isset($_POST['DataManagement'])){remove($userid,'DataManagement');add($userid,'DataManagement');}else{remove($userid,'DataManagement');}
if(isset($_POST['Hosting'])){remove($userid,'Hosting');add($userid,'Hosting');}else{remove($userid,'Hosting');}
if(isset($_POST['PHP'])){remove($userid,'PHP');add($userid,'PHP');}else{remove($userid,'PHP');}
if(isset($_POST['Python'])){remove($userid,'Python');add($userid,'Python');}else{remove($userid,'Python');}
if(isset($_POST['ASP.NET'])){remove($userid,'ASP.NET');add($userid,'ASP.NET');}else{remove($userid,'ASP.NET');}
if(isset($_POST['VBScript'])){remove($userid,'VBScript');add($userid,'VBScript');}else{remove($userid,'VBScript');}
if(isset($_POST['SQL'])){remove($userid,'SQL');add($userid,'SQL');}else{remove($userid,'SQL');}
if(isset($_POST['C'])){remove($userid,'C');add($userid,'C');}else{remove($userid,'C');}
if(isset($_POST['C++'])){remove($userid,'C++');add($userid,'C++');}else{remove($userid,'C++');}
if(isset($_POST['Shell'])){remove($userid,'Shell');add($userid,'Shell');}else{remove($userid,'Shell');}
if(isset($_POST['Java'])){remove($userid,'Java');add($userid,'Java');}else{remove($userid,'Java');}
if(isset($_POST['Ruby'])){remove($userid,'Ruby');add($userid,'Ruby');}else{remove($userid,'Ruby');}
if(isset($_POST['Objective-C'])){remove($userid,'Objective-C');add($userid,'Objective-C');}else{remove($userid,'Objective-C');}
if(isset($_POST['Swift'])){remove($userid,'Swift');add($userid,'Swift');}else{remove($userid,'Swift');}
if(isset($_POST['C#'])){remove($userid,'C#');add($userid,'C#');}else{remove($userid,'C#');}
if(isset($_POST['Debugging'])){remove($userid,'Debugging');add($userid,'Debugging');}else{remove($userid,'Debugging');}

header ('Location: http://junto.link/home.php');

}
else{
header ('Location: http://junto.link/authentication.php');
}












?>

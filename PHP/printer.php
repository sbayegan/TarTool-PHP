<?php


function ShowCatSubcat($input){
if($input == "BD"){echo"<div class='category'> Business </div>";return;}
if($input == "FE"){echo"<div class='category' style='background-color:blue;'> Front-End </div>";return;}
if($input == "BE"){echo"<div class='category' style='background-color:#32cd32;'> Back-End </div>";return;}

if($input == 'LeanStartup')              {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Lean Startup </div>";return;}
if($input == 'MarketingAndResearch')     {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Marketing & Research </div>";return;}
if($input == 'Naming')                   {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Naming </div>";return;}
if($input == 'CopyWriting')              {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Copywriting </div>";return;}
if($input == 'UserFeedback')             {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> User Feedback </div>";return;}
if($input == 'Analytics')                {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Analytics </div>";return;}
if($input == 'SocialMediaCommunity')     {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Social Media & Community </div>";return;}
if($input == 'Launching')                {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Launching </div>";return;}
if($input == 'SEO')                      {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> SEO </div>";return;}
if($input == 'ProjectManagement')        {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Project Management </div>";return;}
if($input == 'CustomerService')          {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Customer Service </div>";return;}
if($input == 'InventoryManagement')      {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Inventory Management </div>";return;}
if($input == 'Sales')                    {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Sales </div>";return;}
if($input == 'Funding')                  {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Funding </div>";return;}
if($input == 'Administration')           {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Administration </div>";return;}
if($input == 'Productivity')             {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Productivity </div>";return;}
if($input == 'Outsourcing')              {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Outsourcing </div>";return;}
if($input == 'E-commerce')               {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> E-commerce </div>";return;}
if($input == 'Events')                   {echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Events </div>";return;}
if($input == 'AcceleratorsAndIncubators'){echo"<a href='business'><div class='category'> Business </div></a>";echo "<div class='subcategory'> Accelerators & Incubators </div>";return;}

if($input == 'UserInterface')           {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> User Interface </div>";return;}
if($input == 'UserExperience')          {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> User Experience </div>";return;}
if($input == 'MockupsAndWireframing')   {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Mockups & Wireframing </div>";return;}
if($input == 'HTML')                    {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> HTML </div>";return;}
if($input == 'CSS')                     {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> CSS </div>";return;}
if($input == 'JavaScript')              {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> JavaScript </div>";return;}
if($input == 'Themes')                  {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Themes </div>";return;}
if($input == 'Mobile')                  {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Mobile </div>";return;}
if($input == 'FrontEndiOS')             {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> iOS </div>";return;}
if($input == 'FrontEndAndroid')         {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Android </div>";return;}
if($input == 'Bootstrap')               {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Bootstrap </div>";return;}
if($input == 'XML')                     {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> XML </div>";return;}
if($input == 'JQuery')                  {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> jQuery </div>";return;}
if($input == 'Angular')                 {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Angular </div>";return;}
if($input == 'Canvas')                  {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Canvas </div>";return;}
if($input == 'SVG')                     {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Scalable Vector Graphics </div>";return;}
if($input == 'JSON')                    {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> JSON </div>";return;}
if($input == 'Ajax')                    {echo"<a href='frontend'><div class='category' style='background-color:blue;'> Front-End </div></a>";echo "<div class='subcategory'> Ajax </div>";return;}

if($input == 'Security')                {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Security </div>";return;}
if($input == 'DataManagement')          {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Data Management </div>";return;}
if($input == 'Hosting')                 {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Hosting </div>";return;}
if($input == 'PHP')                     {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> PHP </div>";return;}
if($input == 'Python')                  {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Python </div>";return;}
if($input == 'ASP.NET')                 {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> ASP.NET </div>";return;}
if($input == 'VBScript')                {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> VBScript </div>";return;}
if($input == 'SQL')                     {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> SQL </div>";return;}
if($input == 'C')                       {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> C </div>";return;}
if($input == 'C++')                     {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> C++ </div>";return;}
if($input == 'Shell')                   {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Shell </div>";return;}
if($input == 'Java')                    {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Java </div>";return;}
if($input == 'Ruby')                    {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Ruby </div>";return;}
if($input == 'Objective-C')             {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Objective-C </div>";return;}
if($input == 'Swift')                   {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Swift </div>";return;}
if($input == 'C#')                      {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> C# </div>";return;}
if($input == 'Debugging')               {echo"<a href='backend'><div class='category' style='background-color:#32cd32;'> Back-End </div></a>";echo "<div class='subcategory'> Debugging </div>";return;}

}

// This function is used to print labels on each card
function linky($input){
if($input == 'LeanStartup'){echo 				'<a href="LeanStartup"><span style="display:inline-block;" class="label label-default">Lean Startup</span></a>';}
if($input == 'MarketingAndResearch'){echo   	'<a href="MarketingAndResearch"><span style="display:inline-block;" class="label label-default">Marketing & Research</span></a>';}
if($input == 'Naming'){echo 					'<a href="Naming"><span style="display:inline-block;" class="label label-default">Naming</span></a>';}
if($input == 'CopyWriting'){echo 				'<a href="CopyWriting"><span style="display:inline-block;" class="label label-default">Copywriting</span></a>';}
if($input == 'UserFeedback'){echo 				'<a href="UserFeedback"><span style="display:inline-block;" class="label label-default">User Feedback</span></a>';}
if($input == 'Analytics'){echo 					'<a href="Analytics"><span style="display:inline-block;" class="label label-default">Analytics</span></a>';}
if($input == 'SocialMediaCommunity'){echo   	'<a href="SocialMediaCommunity"><span style="display:inline-block;" class="label label-default">Social Media & Community</span></a>';}
if($input == 'Launching'){echo 					'<a href="Launching"><span style="display:inline-block;" class="label label-default">Launching</span></a>';}
if($input == 'SEO'){echo 						'<a href="SEO"><span style="display:inline-block;" class="label label-default">SEO</span></a>';}
if($input == 'ProjectManagement'){echo 			'<a href="ProjectManagement"><span style="display:inline-block;" class="label label-default">Project Management</span></a>';}
if($input == 'CustomerService'){echo 			'<a href="CustomerService"><span style="display:inline-block;" class="label label-default">Customer Service</span></a>';}
if($input == 'InventoryManagement'){echo 		'<a href="InventoryManagement"><span style="display:inline-block;" class="label label-default">Inventory Management</span></a>';}
if($input == 'Sales'){echo 						'<a href="Sales"><span style="display:inline-block;" class="label label-default">Sales</span></a>';}
if($input == 'Funding'){echo 					'<a href="Funding"><span style="display:inline-block;" class="label label-default">Funding</span></a>';}
if($input == 'Administration'){echo 			'<a href="Administration"><span style="display:inline-block;" class="label label-default">Administration</span></a>';}
if($input == 'Productivity'){echo  				'<a href="Productivity"><span style="display:inline-block;" class="label label-default">Productivity</span></a>';}
if($input == 'Outsourcing'){echo 				'<a href="Outsourcing"><span style="display:inline-block;" class="label label-default">Outsourcing</span></a>';}
if($input == 'E-commerce'){echo 				'<a href="E-commerce"><span style="display:inline-block;" class="label label-default">E-commerce</span></a>';}
if($input == 'Events'){echo 					'<a href="Events"><span style="display:inline-block;" class="label label-default">Events</span></a>';}
if($input == 'AcceleratorsAndIncubators'){echo  '<a href="AcceleratorsAndIncubators"><span style="display:inline-block;" class="label label-default">Accelerators & Incubators</span></a>';}

if($input == 'UserInterface'){echo 				'<a href="UserInterface"><span style="display:inline-block;" class="label label-default">User Interface</span></a>';}
if($input == 'UserExperience'){echo 			'<a href="UserExperience"><span style="display:inline-block;" class="label label-default">User Experience </span></a>';}
if($input == 'MockupsAndWireframing'){echo 		'<a href="MockupsAndWireframing"><span style="display:inline-block;" class="label label-default">Mockups & Wireframing</span></a>';}
if($input == 'HTML'){echo 						'<a href="HTML"><span style="display:inline-block;" class="label label-default">HTML</span></a>';}
if($input == 'CSS'){echo 						'<a href="CSS"><span style="display:inline-block;" class="label label-default">CSS</span></a>';}
if($input == 'JavaScript'){echo 				'<a href="JavaScript"><span style="display:inline-block;" class="label label-default">JavaScript</span></a>';}
if($input == 'Themes'){echo 					'<a href="Themes"><span style="display:inline-block;" class="label label-default">Themes</span></a>';}
if($input == 'Mobile'){echo 					'<a href="Mobile"><span style="display:inline-block;" class="label label-default">Mobile</span></a>';}
if($input == 'FrontEndiOS'){echo 				'<a href="FrontEndiOS"><span style="display:inline-block;" class="label label-default">iOS</span></a>';}
if($input == 'FrontEndAndroid'){echo 			'<a href="FrontEndAndroid"><span style="display:inline-block;" class="label label-default">Android</span></a>';}
if($input == 'Bootstrap'){echo 					'<a href="Bootstrap"><span style="display:inline-block;" class="label label-default">Bootstrap</span></a>';}
if($input == 'XML'){echo 						'<a href="XML"><span style="display:inline-block;" class="label label-default">XML</span></a>';}
if($input == 'JQuery'){echo 					'<a href="JQuery"><span style="display:inline-block;" class="label label-default">jQuery</span></a>';}
if($input == 'Angular'){echo 					'<a href="Angular"><span style="display:inline-block;" class="label label-default">Angular</span></a>';}
if($input == 'Canvas'){echo 					'<a href="Canvas"><span style="display:inline-block;" class="label label-default">Canvas</span></a>';}
if($input == 'SVG'){echo 						'<a href="SVG"><span style="display:inline-block;" class="label label-default">Scalable Vector Graphics</span></a>';}
if($input == 'JSON'){echo 						'<a href="JSON"><span style="display:inline-block;" class="label label-default">JSON</span></a>';}
if($input == 'Ajax'){echo 						'<a href="Ajax"><span style="display:inline-block;" class="label label-default">Ajax</span></a>';}

if($input == 'Security'){echo 					'<a href="Security"><span style="display:inline-block;" class="label label-default">Security</span></a>';}
if($input == 'DataManagement'){echo 			'<a href="DataManagement"><span style="display:inline-block;" class="label label-default">Data Management</span></a>';}
if($input == 'Hosting'){echo 					'<a href="Hosting"><span style="display:inline-block;" class="label label-default">Hosting</span></a>';}
if($input == 'PHP'){echo 						'<a href="PHP"><span style="display:inline-block;" class="label label-default">PHP</span></a>';}
if($input == 'Python'){echo 					'<a href="Python"><span style="display:inline-block;" class="label label-default">Python</span></a>';}
if($input == 'ASP.NET'){echo 					'<a href="ASP.NET"><span style="display:inline-block;" class="label label-default">ASP.NET</span></a>';}
if($input == 'VBScript'){echo 					'<a href="VBScript"><span style="display:inline-block;" class="label label-default">Visual Basic Script</span></a>';}
if($input == 'SQL'){echo 						'<a href="SQL"><span style="display:inline-block;" class="label label-default">SQL</span></a>';}
if($input == 'C'){echo 							'<a href="C"><span style="display:inline-block;" class="label label-default">C</span></a>';}
if($input == 'C++'){echo 						'<a href="C++"><span style="display:inline-block;" class="label label-default">C++</span></a>';}
if($input == 'Shell'){echo 						'<a href="Shell"><span style="display:inline-block;" class="label label-default">Shell</span></a>';}
if($input == 'Java'){echo 						'<a href="Java"><span style="display:inline-block;" class="label label-default">Java</span></a>';}
if($input == 'Ruby'){echo 						'<a href="Ruby"><span style="display:inline-block;" class="label label-default">Ruby</span></a>';}
if($input == 'Objective-C'){echo 				'<a href="Objective-C"><span style="display:inline-block;" class="label label-default">Objective-C</span></a>';}
if($input == 'Swift'){echo 						'<a href="Swift"><span style="display:inline-block;" class="label label-default">Swift</span></a>';}
if($input == 'C#'){echo 						'<a href="C#"><span style="display:inline-block;" class="label label-default">C#</span></a>';}
if($input == 'Debugging'){echo 					'<a href="Debugging"><span style="display:inline-block;" class="label label-default">Debugging Tools</span></a>';}

}


function card($i){
include('../datalogin.php');
$result = $conn->query("SELECT * FROM RESOURCES WHERE RESOURCEID=".$i);
$tags = $conn->query("SELECT * FROM CATEGORIES WHERE RESOURCEID=".$i);
$result = mysqli_fetch_assoc($result);
$medium = $result['MEDIUM'];
$firsttag = mysqli_fetch_assoc($tags);

echo '<div class="box" style="background-color:#FCFCFC;">';

    echo '<a href="';
    
    if ($firsttag['CAT'] == 'BD') {echo 'business';}
    if ($firsttag['CAT'] == 'FE') {echo 'frontend';}
    if ($firsttag['CAT'] == 'BE') {echo 'backend';}
    echo '">';
    echo '<div class="sticker"'; 
    if ($firsttag['CAT'] == 'BD') {echo '>Business';}
    if ($firsttag['CAT'] == 'FE') {echo 'style="background-color:blue;" >Front-End';}
    if ($firsttag['CAT'] == 'BE') {echo 'style="background-color:#32cd32;" >Back-End';}
    echo '</div>';
    echo '</a>';
    echo '<div class="subcats">';
    
    linky($firsttag['SUB']);
    //echo '<a href="google.com">'.$firsttag['SUB'].'</a>';
     while($firsttag = mysqli_fetch_assoc($tags)){echo ' ';linky($firsttag['SUB']);}
    echo '</div>';
    echo '<div class="profile-picture">';
    echo ' <img src="';
   
    echo $result['PROFILEPICTURE'];
    echo '" width="100" height="100" style="margin-top:0px;float:right;margin-right:10px" alt="logo"> 
          </div>';
    echo '<a href="'.$result['URL'].'" target="_blank">';
    echo '<div class="title"><b>';
    echo $result['TITLE'];
    echo '</b></div>';
    echo '<div class="description">';
    //echo '<b>'.$result['TITLE'].'</b><br><br>';
	if($result['MEDIUM']=='Video/Audio'){
            $url = $result['URL'];
            parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
            $videoid = $my_array_of_vars['v'];


		echo '<iframe width="469" height="240" src="https://www.youtube.com/embed/'.$videoid.'" frameborder="0" allowfullscreen></iframe>';
		
		}
	else{echo $result['DESCRIPTION'];}
    echo'</div></a>';
    echo '<div class="score">';
    echo '<a href="https://www.facebook.com/sharer/sharer.php?u='.$result['URL'].'" target="_blank">';
    echo '<img src="/pictures/facebook.png" width="30" height="30" class="facebook-icon">';
    echo '</a>';
    echo '<a href="https://twitter.com/share?url='.$result['URL'].'" target="_blank">';
    echo '<img src="/pictures/twitter.png" width="30" height="30" class="twitter-icon">';
    echo '</a>';
    echo '<a href="http://linkedin.com/shareArticle?mini=true&url='.$result['URL'].'" target="_blank">';
    echo '<img src="/pictures/linkedin.png" width="30" height="30" class="linkedin-icon">';
    echo '</a>';
//    echo '<img src="http://junto.link/pictures/google.png" width="30" height="30" style="position:absolute;left:235px;margin-top:17px">';
    
    echo '<div style="" id="approve-';
    echo $i;
    echo '">';
    if(!isset($_COOKIE['junto'])){
        //echo '<span href="#sign" data-toggle="modal">';
    }
    else{
    $query = "SELECT * FROM VOTES WHERE RESOURCEID=".$i." AND USERID=".$_COOKIE['junto'];
    //echo $query;
    $appd = $conn->query($query);
      if($appd->num_rows == 0){
    ////echo '<span onclick="approve('.$i.')">';
    ////echo '<img src="pictures/basic.png"  width="55" height="55" style="position: absolute;left:70px;margin-top:19px">';
				}
      else{
    ////echo '<span>';
          }
    }

   
    ////echo '</span>';
    echo '</div>';
    echo '<div style="" id="save-';
    echo $i;
    echo '">';

    if(!isset($_COOKIE['junto'])){
    echo '<span href="#" onclick="showsignin()" data-toggle="modal">';
    echo '<img src="/pictures/save.png"  width="55" height="55" class="saving-icon">';

}
    else{
    $query = "SELECT * FROM FAVOURITES WHERE RESOURCEID=".$i." AND USERID=".$_COOKIE['junto'];
    $favorited = $conn->query($query);
      if($favorited->num_rows == 0){
                   echo '<span onclick="favorite('.$i.')">';
                   echo '<img src="/pictures/save.png"  width="55" height="55" class="saving-icon">';
  				}
       else{
                   echo '<span onclick="unfavorite('.$i.')">';
                   echo '<img src="/pictures/cross-red.png"  width="55" height="55" class="saving-icon">';
           }

    }
  
    

    echo '</span>';
    echo '</div>';
    //echo '<div style="position:absolute;left:4px;font-size:250%;margin-top:15px">'.'Score: '.$result['TOTALSCORE'].'</div>';

    echo '</div>';    

    echo '<div class="numbers">';

    echo '<div class="linkedin-score">'.$result['LINKEDIN'].'</div>';
    echo '<div class="twitter-score">'.$result['TWITTER'].'</div>';
    echo '<div class="facebook-score">'.$result['FACEBOOK'].'</div>';  
    
   


     echo '</div>';



echo '<div class="box-stats" style="background-color:';
     if($medium == 'Video/Audio'){echo 'red;';}
     if($medium == 'Website')    {echo '#f1c40f;';}
     if($medium == 'Blog')       {echo '#2ecc71;';}
     if($medium == 'Book')       {echo '#9b59b6;';}
     if($medium == 'Influencer') {echo '#3498db;';}


    echo')">';
    //echo '<div style="border:0px dashed red;width:200px;position:absolute;right:20px;font-size:130%;text-align:center;margin-top:3px;color:white">'.'social score: <div class="badge" style="font-size:100%">'.$result['TOTALSCORE'].'</div></div>';
    echo '<div style="position:absolute;left:10px;font-size:130%;padding-top:3px;color:white;">'.''.$result['MEDIUM'].'</div>';
//echo '<img src="http://junto.link/pictures/basic.png" width="60" height="65" style="float:left;margin-left:10px">';
    //echo '<img src="http://junto.link/pictures/pin.png" width="40" height="40" style="float:right;margin-right:10px;margin-top:2px">';
    echo '</div>';
    echo '<div class="comments" onclick="showcomments(';echo $i ;echo ')">';
    	$comments = $conn->query("SELECT COUNT(*) AS TOTAL FROM COMMENTS WHERE RESOURCEID=".$i);
    	$comments = mysqli_fetch_assoc($comments);
    	echo '<span id="comment-counter-';echo $i;echo '">';
    	echo $comments['TOTAL'];
    	echo '</span>';
    echo ' comments</div>';


echo '</div>';
}


function minicard($i){
include ('datalogin.php');
$result = $conn->query("SELECT * FROM RESOURCES WHERE RESOURCEID=".$i);
$tags = $conn->query("SELECT * FROM CATEGORIES WHERE RESOURCEID=".$i);
$result = mysqli_fetch_assoc($result);
$medium = $result['MEDIUM'];
$firsttag = mysqli_fetch_assoc($tags);

echo'<div class="minicard" id="mini-';echo $i;echo '">';

echo '<div class="minicard-profile">';
//	echo '<span onclick="removemini(';echo$i;echo ')">';
		echo ' <img src="';   
		echo $result['PROFILEPICTURE'];
		echo '" width="180" height="180" > ';
//	echo '</span>';
echo '</div>';

echo '<div class="minicard-delete">';
	echo '<span onclick="removemini(';echo$i;echo ', \'';echo $firsttag['CAT'];echo'\' , \'';echo $result['MEDIUM'];echo '\')">';

	echo '<img src="pictures/cross-red.png" height="18" width="18">';
	echo '</span>';
echo '</div>';
echo '<a href="'.$result[URL].'" target="_blank">';

echo '<div class="minicard-title">';
    echo '<b>';
    echo $result['TITLE']; 
    echo '</b>';
echo '</div>';

echo '<div class="minicard-sticker">';
    if ($firsttag['CAT'] == 'BD') {echo 'Business';}
    if ($firsttag['CAT'] == 'FE') {echo 'Front-End';}
    if ($firsttag['CAT'] == 'BE') {echo 'Back-End';}

echo '</div>';

echo '<div class="minicard-tags">';
    linky($firsttag['SUB']);
    
    while($firsttag = mysqli_fetch_assoc($tags)){echo ' ';linky($firsttag['SUB']);}

echo '</div>';
echo '</div>';
echo '</a>';
}


?>

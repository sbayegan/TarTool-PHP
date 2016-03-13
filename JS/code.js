// GLOBAL VARIABLES
// VARIABLES USED FOR SIGNUP
var username = 0;
var email = 0;
var pass = 0;
var repass = 0;
// VARIABLES USED FOR ACCOUNT SETTING UPDATE
var currentpass = 0;
var newpass = 0 ;
var matched = 0 ;

$(document).ready(function(){
    $("#account-settings").submit(function(event) {
event.preventDefault();
     return   currentpassword();
    });});

$(document).ready(function(){
    $("#change-password").hide();
    $("#account-delete").hide();
});

function showsideone(){
$("#subcat-box").animate({width:'toggle'},350);
$("#cat-box").animate({width:'toggle'},350);
$("#subcat-status").animate({width:'toggle'},350);
$("#side-tab2").animate({width:'toggle'},350);
$("#side-tab").fadeOut();
$('.feed-column').animate({"margin-left":"-320px"},1000);
}



function showsidetwo(){
$("#subcat-box").animate({width:'toggle'},350);
$("#cat-box").animate({width:'toggle'},350);
$("#subcat-status").animate({width:'toggle'},350);
$("#side-tab2").animate({width:'toggle'},350);
$("#side-tab").fadeIn();
$('.feed-column').animate({"margin-left":"-200px"},1000);
}


function panelbusiness(){
    $("#checklist-frontend-section").fadeOut();
    $("#checklist-backend-section").fadeOut();
    $("#checklist-business-section").fadeIn();
    document.getElementById("subcat-status").style.backgroundColor= "red";
}

function panelfrontend(){
    $("#checklist-backend-section").fadeOut();
    $("#checklist-business-section").fadeOut();
    $("#checklist-frontend-section").fadeIn();
    document.getElementById("subcat-status").style.backgroundColor= "blue";
}

function panelbackend(){
    $("#checklist-frontend-section").fadeOut();
    $("#checklist-business-section").fadeOut();
    $("#checklist-backend-section").fadeIn();
    document.getElementById("subcat-status").style.backgroundColor= "#32cd32";
}


function rolllogin(){
$(document).ready(function(){
    $("#welcome-transparent").slideUp();
});
return showsignin();
}

function rollregister(){
$(document).ready(function(){
    $("#welcome-transparent").slideUp();
});
return showsignup();
}


function rollup(){
$(document).ready(function(){
    $("#welcome-transparent").slideUp();
});
}

function changeview(){
$("#mediumView").animate({width:'toggle'},300);
$("#categoryView").animate({width:'toggle'},300);
}


function showcomments(id){
$("#transparent").fadeIn();
$("#transparent-comments").fadeIn();
commentingResource = id;
document.getElementById("transparent-comments-ajax").innerHTML = "";
var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // This is an error 
                if(xmlhttp.responseText == -1){
                }
                else {
                    document.getElementById("transparent-comments-ajax").innerHTML = xmlhttp.responseText;
                }

                                    }
                            }         
        xmlhttp.open("GET", "PHP/commentFetcher.php?id="+id , true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();
}



function setvisitor(){
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                                    }
                            }         
        xmlhttp.open("POST", "PHP/account/setvisitor.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send();



}
// This function takes the id of a minicard and its medium and category and deletes
// the card from the users favorites and updates the count numbers in the library
//

function removemini(id,cat,medium){

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                var name = "mini-";
                name += id;
                var jname = "#"+name+","+"#"+name;
                $(jname).fadeOut();

// The category status is decreased
                if (cat == "BE"){
                    var temp = document.getElementById("back-count").innerHTML;
                    temp--;
                    document.getElementById("back-count").innerHTML = temp;
                }
                if (cat == "FE"){
                    var temp = document.getElementById("front-count").innerHTML;
                    temp--;
                    document.getElementById("front-count").innerHTML = temp;
                }
                if (cat == "BD"){
                    var temp = document.getElementById("business-count").innerHTML;
                    temp--;
                    document.getElementById("business-count").innerHTML = temp;
                }
// The medium status is updated
                if(medium == "Website"){
                    var temp = document.getElementById("website-count").innerHTML;
                    temp--;
                    document.getElementById("website-count").innerHTML = temp;
                }
                if(medium == "Video/Audio"){
                    var temp = document.getElementById("media-count").innerHTML;
                    temp--;
                    document.getElementById("media-count").innerHTML = temp;
                }
                if(medium == "Book"){
                    var temp = document.getElementById("books-count").innerHTML;
                    temp--;
                    document.getElementById("books-count").innerHTML = temp;
                }
                if(medium == "Influencer"){
                    var temp = document.getElementById("influencer-count").innerHTML;
                    temp--;
                    document.getElementById("influencer-count").innerHTML = temp;
                }

                                            }
                                    }
                        }
         
        xmlhttp.open("POST", "PHP/account/unfavorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+id);

            }



function deleteaccount(){
var one = document.getElementById("update-username").value;
var two = document.getElementById("deleteaccount-password").value;



        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                   window.location.replace("logout.php"); 
                }
                if(xmlhttp.responseText == 0){
                    document.getElementById("changepassword-condition-delete").innerHTML = "Wrong Password";
                }



        }
    }
        document.getElementById("changepassword-condition-delete").innerHTML = "Processing";
        xmlhttp.open("POST", "PHP/account/update.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&delpass="+two);

}



function currentpassword(){
var one = document.getElementById("update-username").value;
var two = document.getElementById("changepassword-password").value;
var three = document.getElementById("changepassword-password1").value;
var four = document.getElementById("changepassword-password2").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){//Success
                      if(four == three && three.length > 4){
                            //Update the password
                            var mlhttp = new XMLHttpRequest();
                            mlhttp.onreadystatechange = function() {
                            if (mlhttp.readyState == 4 && mlhttp.status == 200) {
                                //document.getElementById("change-password").innerHTML = "Just above conditions";
                                if(mlhttp.responseText == 1){
                                   document.getElementById("change-password").innerHTML = "Your password was updated successfully";
                                }
                                if(mlhttp.responseText == 0){
                                   document.getElementById("change-password").innerHTML = "Oops! Something went wrong, please refresh the page and try again";
                                }
                            }}
                            document.getElementById("change-password").innerHTML = "We are working";
                            mlhttp.open("POST", "PHP/account/update.php", true);
                            mlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
                            mlhttp.send("user="+one+"&pass="+two+"&newpass="+four);
                      }
                      else
                      {
                if(three.length <= 4){
                    document.getElementById("changepassword-condition1").innerHTML = "The password is too short!";
                }
                else{
                    document.getElementById("changepassword-condition2").innerHTML = "The passwords do not match!";      
                      }
                      }
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("changepassword-condition").innerHTML = "Wrog password!";
                }
            }
        }
        document.getElementById("changepassword-condition").innerHTML = "";
        document.getElementById("changepassword-condition1").innerHTML = "";
        document.getElementById("changepassword-condition2").innerHTML = "";
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);

}


var loadFile = function(event) {
    var output = document.getElementById('samplecard-image');
    output.src = URL.createObjectURL(event.target.files[0]);
  };

function del(){
$("#change-password").fadeOut();
$("#account-delete").fadeIn();
}


function submissionsample(){
// This function is triggered by onclickup() event. It takes the form input
// and puts them in the sample card for the user to review.
// A unique id (html) has been assigned to each of the form fields therefore we can
// get the content using GetElementById() and then put them in the card (which also has
// uniques ids)    

var title       = document.getElementById("title").value;
var description = document.getElementById("description").value;
var url         = document.getElementById("url").value;
if(document.getElementById("imageurl")){var imageurl    = document.getElementById("imageurl").value;}
else var imageurl = null;


// Update the title
document.getElementById("samplecard-title").innerHTML= title;
// Update the description
document.getElementById("samplecard-description").innerHTML= description;
// Deal with the URL.
        if(url.length !=0){
        //facebook
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText.length < 10)document.getElementById("samplecard-facebook").innerHTML = xmlhttp.responseText;
                                                                    }
                                                }
        xmlhttp.open("GET", "PHP/socialscores/facebook.php?URL=" + url, true);
        xmlhttp.send();
        //linkedin
        var xmlhttplink = new XMLHttpRequest();
        xmlhttplink.onreadystatechange = function() {
            if (xmlhttplink.readyState == 4 && xmlhttplink.status == 200) {
                if(xmlhttplink.responseText.length < 10){document.getElementById("samplecard-linkedin").innerHTML = xmlhttplink.responseText;}
                                                                    }
                                                }
        xmlhttplink.open("GET", "PHP/socialscores/linkedin.php?URL=" + url, true);
        xmlhttplink.send();
                            }//if(url.length !=0)
// Deal with the thumbnail URL
if(imageurl!=null){if(imageurl.length>0)document.getElementById("samplecard-image").src = imageurl;}
// Deal with the medium
var medium      = document.querySelector('input[name="type"]:checked').value;
if (medium=='Website'){      document.getElementById("samplecard-boxstats").style.backgroundColor="#f1c40f";document.getElementById("samplecard-medium").innerHTML="Website"}
if (medium=='Video/Audio'){  document.getElementById("samplecard-boxstats").style.backgroundColor="#e74c3c";document.getElementById("samplecard-medium").innerHTML="Video | Audio"}
if (medium=="Influencer"){   document.getElementById("samplecard-boxstats").style.backgroundColor="#3498db";document.getElementById("samplecard-medium").innerHTML="Influencer"}
if (medium=="Blog"){         document.getElementById("samplecard-boxstats").style.backgroundColor="#2ecc71";document.getElementById("samplecard-medium").innerHTML="Blog"}
if (medium=="Book"){         document.getElementById("samplecard-boxstats").style.backgroundColor="#9b59b6";document.getElementById("samplecard-medium").innerHTML="Book"}
}



function submissionthumbnail(){
    var element = document.getElementById("imageurl");
    if(element != null){
        document.getElementById("submission-thumbnail").innerHTML= "<label>Upload Thumbnail "
        +"<a style='color:red;' href='#' onclick='submissionthumbnail()'> (Submit URL) </a></label><br>"
        +"<label for='fileToUpload'><span class='file-input btn btn-block btn-primary btn-file'>"
        +"<input type='file' accept='image/*' name='fileToUpload' id='fileToUpload' style='display:none;' onchange='loadFile(event)'>Browse</label><br>"
        +"</span>";
    }
    else{ 
          document.getElementById("submission-thumbnail").innerHTML="<label for='imageurl'>"
          +"Thumbnail URL <a style='color:red;' href='#' onclick='submissionthumbnail()'> (Upload Thumbnail) </a> </label>"
          +"<input type='text' name='imageurl' id='imageurl' size='45' onchange='submissionsample()' class='form-control'/>"
          +"</span>"
          +"<br>";
          document.getElementById("imageurl").value = document.getElementById("samplecard-image").src;
    }
}



function submissionupdatelabels(number,text){    

    var element = document.getElementById("samplelabel"+number);
    if(element != null){element.parentNode.removeChild(element);}

var node = document.createElement("DIV");
node.innerHTML = text;
node.setAttribute("id", "samplelabel"+number);
node.setAttribute("class","label label-default");
node.setAttribute("style","margin:2px;display:inline-block;");
if(text != 'Choose One')document.getElementById("samplecard-subcategory").appendChild(node); 
}

function showsubmission(){
$("#transparent-box").fadeIn();
$("#transparent-square").fadeIn();
$("#transparent").fadeIn();
//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-box").style.display = 'block';
//document.getElementById("transparent-square").style.display = 'block';  
}

function showchangepassword(){
$("#change-password").fadeIn();
$("#account-delete").fadeOut();

}
function closechangepassword(){
$("#change-password").fadeOut();
}

function showsignup(){
$("#transparent").fadeIn();
$("#transparent-signup").fadeIn();
//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-signup").style.display = 'block';
}

function showsignin(){
$("#transparent").fadeIn();
$("#transparent-signin").fadeIn();
//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-signin").style.display = 'block';
}

function showprofile(){
$("#transparent").fadeIn();
$("#transparent-profile").fadeIn();

//document.getElementById("transparent").style.display = 'block';
//document.getElementById("transparent-profile").style.display = 'block';
}

function closeall(){
$("#transparent").fadeOut();
$("#transparent-signup").fadeOut();
$("#transparent-signin").fadeOut();
$("#transparent-profile").fadeOut();
$("#transparent-box").fadeOut();
$("#transparent-square").fadeOut();
$("#change-password").fadeOut();
$("#transparent-comments").fadeOut();
//document.getElementById("transparent").style.display = 'none';
//document.getElementById("transparent-signup").style.display = 'none';
//document.getElementById("transparent-signin").style.display = 'none';
//document.getElementById("transparent-profile").style.display = 'none';
//document.getElementById("transparent-box").style.display = 'none';
//document.getElementById("transparent-square").style.display = 'none';
}


function numloader(last,string){
if(Ended == 0){	
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            LastCard = xmlhttp.responseText;}
                                            }
        xmlhttp.open("GET", "PHP/numloader.php?last=" + last +"&cat="+string, true);
        xmlhttp.send();}
}


function loader(last,string){
  var loader;
// First check to see if ended was set to 1, if so then do nothing
    if(Ended == 1){return;}
    else{
// Else connect to a file called loader.php, get the results
// then create another child for feed and then put the results there
        Frame++;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 0){
                // Set Ended to 1 and then show a flag showing that there
                // are no more cards to be displayed
                Ended = 1;
                var node = document.createElement("DIV");
		        node.setAttribute("id", "Frame"+Frame);
		        document.getElementById("feed").appendChild(node);
                document.getElementById("Frame"+Frame).innerHTML = "<div class='end-of-feed'> No more cards!</div>";
		          if(Load==1){loader.parentNode.removeChild(loader);Load=0;}	


                }
            else{// Append the content to the feed
		        var node = document.createElement("DIV");
		        node.setAttribute("id", "Frame"+Frame);
		        document.getElementById("feed").appendChild(node);
		        document.getElementById("Frame"+Frame).innerHTML = xmlhttp.responseText;
		        if(Load == 1){loader.parentNode.removeChild(loader);Load=0;}
                }
            }// if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
        }// xmlhttp.onreadystatechange

        if(Load == 0){
	        Load = 1;
            loader = document.createElement("DIV");
            loader.setAttribute('id', 'loader');
            loader.innerHTML = "<img style='padding-bottom:100px;margin-left:240px;'  src='/logo/loading.gif' title='Loading, please wait..'>";
            document.getElementById("feed").appendChild(loader);
}
        xmlhttp.open("GET", "/PHP/loader.php?last=" + last+"&cat="+string, true);
        xmlhttp.send();
            }//else
}


function favorite(cardid) {
   var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
	              id = "save-";
	              id += cardid;
	              //document.getElementById("XXX").innerHTML = id;
	              output = "<span onclick=\'unfavorite(";
	              output += cardid;
                      output += ")\'  > <img src=\'pictures/cross-red.png\'  width=\'55\' height=\'55\' style=\'float:left;margin-left:0px;margin-top:15px\'></span>"
                      document.getElementById(id).innerHTML= output;
                    }
     }
   }         

        document.getElementById("save-"+cardid).innerHTML="<img src='pictures/ajax_loader.gif' width='55' height='55' style='float:left;margin-top:15px;'>";
	xmlhttp.open("POST", "PHP/account/favorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+cardid);
}

function approve(cardid) {
   var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
	              id = "approve-";
	              id += cardid;
                      document.getElementById(id).innerHTML= "";
                    }
     }
   }    
 
	document.getElementById("approve-"+cardid).innerHTML="<img src='pictures/ajax_loader.gif' width='55' height='55' style='position:absolute;left:65px;margin-top:15px;'>";    
        xmlhttp.open("POST", "approve.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+cardid);
}
function unfavorite(cardid) {
  var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
    			id = "save-";
			id += cardid;
    			//document.getElementById("XXX").innerHTML = id;
        		output = "<span onclick=\'favorite(";
        		output += cardid ;
        		output += ")\'    > <img src=\'pictures/save.png\'  width=\'55\' height=\'55\' class='saving-icon'></span>";
        		document.getElementById(id).innerHTML= output;
                			}
     								}
   					        }         
	document.getElementById("save-"+cardid).innerHTML="<img src='pictures/ajax_loader.gif' width='55' height='55' class='saving-icon'>";
        xmlhttp.open("POST", "PHP/account/unfavorite.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("id="+cardid);
                }
                
var lastused = 2;
var currentcat = "BD"
function activate(str){
if(str.length > 5){document.getElementById("submit_bt").disabled = false;}
else {document.getElementById("submit_bt").disabled = true;}
}
function update(str){
    var element = document.getElementById("samplelabel1");
    if(element != null){element.parentNode.removeChild(element);}
    var element = document.getElementById("samplelabel2");
    if(element != null){element.parentNode.removeChild(element);}
    var element = document.getElementById("samplelabel3");
    if(element != null){element.parentNode.removeChild(element);}
    var element = document.getElementById("samplelabel4");
    if(element != null){element.parentNode.removeChild(element);}
    var element = document.getElementById("samplelabel5");
    if(element != null){element.parentNode.removeChild(element);}

lastused = 2;
document.getElementById("adderbutton").disabled = false;
if (document.getElementById("D5")){var element = document.getElementById("D5");element.parentNode.removeChild(element);}
if (document.getElementById("D4")){var element = document.getElementById("D4");element.parentNode.removeChild(element);}
if (document.getElementById("D3")){var element = document.getElementById("D3");element.parentNode.removeChild(element);}
if (document.getElementById("D2")){var element = document.getElementById("D2");element.parentNode.removeChild(element);}
currentcat = str;
if(str == "FE"){
    document.getElementById("samplecard-category").innerHTML="Front-End Development";
    document.getElementById("D1").innerHTML = 
	'<option value="">Choose One</option>'+
        '<option value="UserInterface">User Interface</option>'+
        '<option value="UserExperience">User Experience</option>'+
        '<option value="MockupsAndWireframing">Mockups & Wireframing</option>'+
        '<option value="HTML">HTML</option>'+
        '<option value="CSS">CSS</option>'+
        '<option value="JavaScript">JavaScript</option>'+
        '<option value="Themes">Themes</option>'+
        '<option value="Mobile">Mobile</option>'+
        '<option value="FrontEndiOS">iOS</option>'+
        '<option value="FrontEndAndroid">Android</option>'+
        '<option value="Bootstrap">Bootstrap</option>'+
        '<option value="XML">XML</option>'+
	'<option value="JQuery">jQuery</option>'+
	'<option value="Angular">Angular</option>'+
	'<option value="Canvas">Canvas</option>'+
	'<option value="SVG">Scalable Vector Graphics</option>'+
	'<option value="JSON">JSON</option>'+
        '<option value="Ajax">Ajax</option>';
}
if(str == "BE"){
    document.getElementById("samplecard-category").innerHTML="Back-End Development";
    document.getElementById("D1").innerHTML = 
	'<option value="">Choose One</option>'+
        '<option value="Security">Security</option>'+
        '<option value="DataManagement">Data Management</option>'+
        '<option value="Hosting">Hosting</option>'+
        '<option value="PHP">PHP</option>'+
        '<option value="Python">Python</option>'+
	'<option value="ASPNET">ASP.NET</option>'+
	'<option value="VBScript">Visual Basic Script</option>'+
	'<option value="SQL">SQL</option>'+
	'<option value="C">C</option>'+
	'<option value="C++">C++</option>'+
	'<option value="Shell">Shell</option>'+
	'<option value="Java">Java</option>'+
	'<option value="Ruby">Ruby</option>'+
	'<option value="Objective-C">Objective-C</option>'+
	'<option value="Swift">Swift</option>'+
        '<option value="C#">C#</option>'+
        '<option value="Debugging Tools">Debugging</option>';
}
if(str == "BD"){
    document.getElementById("samplecard-category").innerHTML="Business Development";
    document.getElementById("D1").innerHTML = 
	'<option value="">Choose One</option>'+
	'<option value="LeanStartup">Lean Startup</option>'+
        '<option value="MarketingAndResearch">Marketing & Research</option>'+
        '<option value="Naming">Naming</option>'+
        '<option value="CopyWriting">Copywriting</option>'+
        '<option value="Analytics">Analytics</option> '+
        '<option value="Launching">Launching</option>'+
	'<option value="UserFeedback">User Feedback</option>'+        
        '<option value="SEO">SEO</option>'+
        '<option value="SocialMediaCommunity">Social Media & Community</option>'+
        '<option value="ProjectManagement">Project Management</option>'+
        '<option value="CustomerService">Customer Service</option>'+
        '<option value="InventoryManagement">Inventory Management</option>'+
        '<option value="Sales">Sales</option>'+
	'<option value="Funding">Funding</option>'+
	'<option value="Administration">Administration</option>'+
	'<option value="Productivity">Productivity</option>'+
        '<option value="Outsourcing">Outsourcing</option>'+
        '<option value="E-commerce">E-commerce</option>'+
	'<option value="AcceleratorsAndIncubators">Accelerators & Incubators</option>'+
	'<option value="Events">Events</option>';
}
}

function add() {
var FE = 
	'<select name="subcat' + lastused + '"  class="form-control" id=lastused onchange="submissionupdatelabels('+lastused+',this.options[this.selectedIndex].innerHTML)">'+
	    '<option value="">Choose One</option>'+
        '<option value="UserInterface">User Interface</option>'+
        '<option value="UserExperience">User Experience</option>'+
        '<option value="MockupsAndWireframing">Mockups & Wireframing</option>'+
        '<option value="HTML">HTML</option>'+
        '<option value="CSS">CSS</option>'+
        '<option value="JavaScript">JavaScript</option>'+
        '<option value="Themes">Themes</option>'+
        '<option value="Mobile">Mobile</option>'+
        '<option value="FrontEndiOS">iOS</option>'+
        '<option value="FrontEndAndroid">Android</option>'+
        '<option value="Bootstrap">Bootstrap</option>'+
        '<option value="XML">XML</option>'+
	   '<option value="JQuery">jQuery</option>'+
	   '<option value="Angular">Angular</option>'+
	   '<option value="Canvas">Canvas</option>'+
	   '<option value="SVG">Scalable Vector Graphics</option>'+
	   '<option value="JSON">JSON</option>'+
        '<option value="Ajax">Ajax</option>'+
	'</select>';
var BE = 
	'<select name="subcat'+ lastused +'"  class="form-control" id=lastused onchange="submissionupdatelabels('+lastused+',this.options[this.selectedIndex].innerHTML)">'+
	'<option value="">Choose One</option>'+
        '<option value="Security">Security</option>'+
        '<option value="DataManagement">Data Management</option>'+
        '<option value="Hosting">Hosting</option>'+
        '<option value="PHP">PHP</option>'+
        '<option value="Python">Python</option>'+
	'<option value="ASPNET">ASP.NET</option>'+
	'<option value="VBScript">Visual Basic Script</option>'+
	'<option value="SQL">SQL</option>'+
	'<option value="C">C</option>'+
	'<option value="C++">C++</option>'+
	'<option value="Shell">Shell</option>'+
	'<option value="Java">Java</option>'+
	'<option value="Ruby">Ruby</option>'+
	'<option value="Objective-C">Objective-C</option>'+
	'<option value="Swift">Swift</option>'+
        '<option value="C#">C#</option>'+
        '<option value="Debugging Tools">Debugging</option>'+
	'</select>';
var BD = 
 	'<select name="subcat'+ lastused + '"  class="form-control" id=lastused onchange="submissionupdatelabels('+lastused+',this.options[this.selectedIndex].innerHTML)">'+
 	'<option value="">Choose One</option>'+
        '<option value="LeanStartup">Lean Startup</option>'+
        '<option value="MarketingAndResearch">Marketing & Research</option>'+
        '<option value="Naming">Naming</option>'+
        '<option value="CopyWriting">Copywriting</option>'+
        '<option value="Analytics">Analytics</option> '+
        '<option value="Launching">Launching</option>'+
	'<option value="UserFeedback">User Feedback</option>'+        
        '<option value="SEO">SEO</option>'+
        '<option value="SocialMediaCommunity">Social Media & Community</option>'+
        '<option value="ProjectManagement">Project Management</option>'+
        '<option value="CustomerService">Customer Service</option>'+
        '<option value="InventoryManagement">Inventory Management</option>'+
        '<option value="Sales">Sales</option>'+
	'<option value="Funding">Funding</option>'+
	'<option value="Administration">Administration</option>'+
	'<option value="Productivity">Productivity</option>'+
        '<option value="Outsourcing">Outsourcing</option>'+
        '<option value="E-commerce">E-commerce</option>'+
	'<option value="AcceleratorsAndIncubators">Accelerators & Incubators</option>'+
	'<option value="Events">Events</option>'+
        '</select>' ;
var node = document.createElement("DIV");
node.setAttribute("id", "D"+lastused);
document.getElementById("adder").appendChild(node);              
if(currentcat == "BE"){document.getElementById("D"+lastused).innerHTML = BE;}
if(currentcat == "BD"){document.getElementById("D"+lastused).innerHTML = BD;}
if(currentcat == "FE"){document.getElementById("D"+lastused).innerHTML = FE;}
lastused = lastused + 1;
if (lastused == 6){
document.getElementById("adderbutton").disabled = true;
}
}






function available(str) {
    if (str.length < 4) { 
        document.getElementById("user-status").innerHTML = "too short";
        username = 0;
        {document.getElementById("submit_btn").disabled = true;}
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  document.getElementById("user-status").innerHTML = "okay";
                  username = 1;
                  if(username ==1 && email ==1 && pass == 1 && repass ==1)
                  {document.getElementById("submit_btn").disabled = false;}
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("user-status").innerHTML = "taken";
                  username = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
            }
        }
        xmlhttp.open("GET", "usernamecheck.php?username=" + str, true);
        xmlhttp.send();
    }
}

function userlogin(str) {
    if (str.length < 4) { 
        //document.getElementById("welcome-message").innerHTML = "too short";
        {//document.getElementById("login-password").disabled = true;
    }
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                   //document.getElementById("welcome-message").innerHTML = "Doesnt exist";
                  {//document.getElementById("login-password").disabled = true;
              }
                }
                if(xmlhttp.responseText == 0){
                  //document.getElementById("welcome-message").innerHTML = "Okay";
                  {document.getElementById("login-password").disabled = false;}
                }
            }
        }
        xmlhttp.open("GET", "usernamecheck.php?username=" + str, true);
        xmlhttp.send();
    }
}

function valid(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  document.getElementById("email-status").innerHTML = "well formed :-)";
                  email = 1;
                  if(username ==1 && email ==1 && pass == 1 && repass ==1)
                  {document.getElementById("submit_btn").disabled = false;}
                }
                 if(xmlhttp.responseText == 0){
                  document.getElementById("email-status").innerHTML = "ill-formed email address";
                  email = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
		if(xmlhttp.responseText == 2){
                  document.getElementById("email-status").innerHTML = "already registered";
                  email = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
           }
        }
        xmlhttp.open("GET", "emailcheck.php?email=" + str, true);
        xmlhttp.send();
}



function passcheck(str) {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                  document.getElementById("pass-status").innerHTML = "good";
                  pass = 1;
                  if(username ==1 && email ==1 && pass == 1 && repass ==1)
                  {document.getElementById("submit_btn").disabled = false;}
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("pass-status").innerHTML = "too short";
                  pass = 0;
                  {document.getElementById("submit_btn").disabled = true;}
                }
            }
        }
        xmlhttp.open("POST", "PHP/account/passwordcheck.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("pass="+str);
}






function changepasswordstepone(){
var one = document.getElementById("changepassword-user").value;
var two = document.getElementById("changepassword-password").value;

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

         //document.getElementById("condition").innerHTML =  xmlhttp.responseText;

                if(xmlhttp.responseText == 1){
                  document.getElementById("change-password-inner").innerHTML = '<form  id="changepassword-form" action="login.php" method="post">'
                    +'<div class="form-group">'
                    +'<label for="user">This should be the new form </label>'
      +'<input  class="form-control" type="password"  name="user" id="changepassword-password">'
      +'<span id="changepassword-condition" style="display:inline-block;margin:5px;color:red;"></span>'
      //+'<input type="submit" id="submit" style="float:right;margin-top:10px;" class="btn btn-danger btn-sm" value="Next" onclick="changepasswordstepone()">'
      +'</div>'
      +'</form>'
                  ;
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("changepassword-condition").innerHTML = "Wrong password!";
                }
        if(xmlhttp.responseText == -1){
                  //document.getElementById("condition").innerHTML = "Please verify your email";
                 
                }
            }
    
        }
        document.getElementById("changepassword-condition").innerHTML = "";
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);




}


function login() {
var one = document.getElementById("loginusername").value;
var two = document.getElementById("login-password").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

         //document.getElementById("condition").innerHTML =  xmlhttp.responseText;

                if(xmlhttp.responseText == 1){
                  window.location.replace(".");
                  document.getElementById("condition").innerHTML = "good, lets go";
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("condition").innerHTML = "The username and password do not match!";
                }
        if(xmlhttp.responseText == -1){
                  document.getElementById("condition").innerHTML = "Please verify your email";
                 
                }
        if(xmlhttp.responseText == 2){
                  document.getElementById("condition").innerHTML = "Too many attemps, come back in 15 minutes";        
                }
            }
    
        }
        document.getElementById("condition").innerHTML = "";
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);
}

function deleteComment(id,resource){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == -1){ }
                if(xmlhttp.responseText == 1){
                $("#single-comment-"+id).fadeOut();
                var counter = document.getElementById("comment-counter-"+resource).innerHTML;
                counter--;
                document.getElementById("comment-counter-"+resource).innerHTML = counter;



                }
            }   
        }
        xmlhttp.open("POST", "PHP/commentDelete.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("commentid="+id);



}


/////////////////////////////////////
var commentingResource;
function commentUpload(){
var comment = document.getElementById("comment").value;
if(comment.length < 1){return;}
var resource = commentingResource;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == -1){ }
                else{
                    var node = document.createElement("DIV");
                    node.innerHTML = xmlhttp.responseText;
                    document.getElementById("commentAppend").appendChild(node);
                    document.getElementById("commentAppend").scrollTop = document.getElementById("commentAppend").scrollHeight;
                    document.getElementById("comment").value = "";
                    var counter = document.getElementById("comment-counter-"+resource).innerHTML;
                    counter++;
                    document.getElementById("comment-counter-"+resource).innerHTML = counter;
                }
            }   
        }
        xmlhttp.open("POST", "PHP/commentUploader.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("resource="+resource+"&comment="+comment);
}


$(document).ready(function(){
    $("#commentform").submit(function(event) {
    event.preventDefault();
});});


$(document).ready(function(){
    $("#login-form").submit(function(event) {
event.preventDefault();
login();
 });});

function passmatch(){
			if(document.getElementById("password").value == document.getElementById("password1").value){
				document.getElementById("pass1-status").innerHTML = "matched";
				repass = 1;
                  		if(username ==1 && email ==1 && pass == 1 && repass ==1)
        			{document.getElementById("submit_btn").disabled = false;}
							}
			if(document.getElementById("password").value != document.getElementById("password1").value){
				document.getElementById("pass1-status").innerHTML = "not mached";
				repass = 0;
				{document.getElementById("submit_btn").disabled = true;}
							}
			}		
function passmatchrec(){ //for password recovery
            if(document.getElementById("password").value == document.getElementById("password1").value){
                document.getElementById("pass1-status").innerHTML = "matched";
                repass = 1;
                        if(pass == 1 && repass ==1)
                    {document.getElementById("submit_btn").disabled = false;}
                            }
            if(document.getElementById("password").value != document.getElementById("password1").value){
                document.getElementById("pass1-status").innerHTML = "not mached";
                repass = 0;
                {document.getElementById("submit_btn").disabled = true;}
                            }
            }   				


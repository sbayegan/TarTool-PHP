function numloader(last){
if(Ended == 0){	
var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                LastCard = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "numloader.php?last=" + last, true);
        xmlhttp.send();
	
	
}
}


function loader(last){
// First check to see if ended was set to 1, if so then do nothing
if(Ended == 1){return;}

// Else connect the to a file called loader.php, get the results
// then create another child for feed and then put the results there
Frame++;
var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 0){// Set Ended to 1 and then show a flag showing that there
                // are no more cards to be displayed
                Ended = 1;
                var node = document.createElement("DIV");
		node.setAttribute("id", "Frame"+Frame);
		document.getElementById("feed").appendChild(node);
		//document.getElementById("Frame"+Frame).innerHTML = "NO MORE CARDS TO DISPLAY!";
		 
                }
                else{// Append the content to the feed
		var node = document.createElement("DIV");
		node.setAttribute("id", "Frame"+Frame);
		document.getElementById("feed").appendChild(node);
		document.getElementById("Frame"+Frame).innerHTML = xmlhttp.responseText;
                }
            }
        }
        xmlhttp.open("GET", "loader.php?last=" + last, true);
        xmlhttp.send();
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
	xmlhttp.open("POST", "favorite.php", true);
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
        		output += ")\'    > <img src=\'pictures/save.png\'  width=\'55\' height=\'55\' style=\'float:left;margin-left:0px;margin-top:15px\'></span>";
        		document.getElementById(id).innerHTML= output;
                			}
     								}
   					        }         
	document.getElementById("save-"+cardid).innerHTML="<img src='pictures/ajax_loader.gif' width='55' height='55' style='float:left;margin-top:15px;'>";
        xmlhttp.open("POST", "unfavorite.php", true);
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
lastused = 2;
document.getElementById("adderbutton").disabled = false;
if (document.getElementById("D5")){var element = document.getElementById("D5");element.parentNode.removeChild(element);}
if (document.getElementById("D4")){var element = document.getElementById("D4");element.parentNode.removeChild(element);}
if (document.getElementById("D3")){var element = document.getElementById("D3");element.parentNode.removeChild(element);}
if (document.getElementById("D2")){var element = document.getElementById("D2");element.parentNode.removeChild(element);}
currentcat = str;
if(str == "FE"){document.getElementById("D1").innerHTML = 
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
if(str == "BE"){document.getElementById("D1").innerHTML = 
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
if(str == "BD"){document.getElementById("D1").innerHTML = 
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
	'<select name="subcat' + lastused + '"  class="form-control" id=lastused>'+
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
	'<select name="subcat'+ lastused +'"  class="form-control" id=lastused>'+
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
 	'<select name="subcat'+ lastused + '"  class="form-control" id=lastused>'+
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

var username = 0;
var email = 0;
var pass = 0;
var repass = 0;
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
        document.getElementById("welcome-message").innerHTML = "too short";
        {document.getElementById("login-password").disabled = true;}
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
                   document.getElementById("welcome-message").innerHTML = "Doesnt exist";
                  {document.getElementById("login-password").disabled = true;}
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("welcome-message").innerHTML = "Okay";
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
        xmlhttp.open("POST", "passwordcheck.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("pass="+str);
}

/*
function check-passcheck(str) {
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
        xmlhttp.open("POST", "passwordcheck.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("pass="+str);
}


*/





function login(two) {
one = document.getElementById("loginusername").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

		 document.getElementById("condition").innerHTML =  xmlhttp.responseText;

                if(xmlhttp.responseText == 1){
                  window.location.replace("home.php");
                  document.getElementById("condition").innerHTML = "good, lets go";
                }
                if(xmlhttp.responseText == 0){
                  document.getElementById("condition").innerHTML = "Waiting for the correct password";
                }
 		if(xmlhttp.responseText == -1){
                  document.getElementById("condition").innerHTML = "Not activated, Please verify your email address and retype your password";
                 
                }
            }
	
        }
        xmlhttp.open("POST", "login.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.send("user="+one+"&pass="+two);
}

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


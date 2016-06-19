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
        xmlhttp.open("GET", "/PHP/socialscores/facebook.php?URL=" + url, true);
        xmlhttp.send();
        //linkedin
        var xmlhttplink = new XMLHttpRequest();
        xmlhttplink.onreadystatechange = function() {
            if (xmlhttplink.readyState == 4 && xmlhttplink.status == 200) {
                if(xmlhttplink.responseText.length < 10){document.getElementById("samplecard-linkedin").innerHTML = xmlhttplink.responseText;}
                                                                    }
                                                }
        xmlhttplink.open("GET", "/PHP/socialscores/linkedin.php?URL=" + url, true);
        xmlhttplink.send();
        //GooglePlus
        var xmlhttpg = new XMLHttpRequest();
        xmlhttpg.onreadystatechange = function() {
            if (xmlhttpg.readyState == 4 && xmlhttpg.status == 200) {
                if(xmlhttpg.responseText.length < 10){document.getElementById("samplecard-google").innerHTML = xmlhttpg.responseText;}
                                                                    }
                                                }
        xmlhttpg.open("GET", "/PHP/socialscores/google.php?URL=" + url, true);
        xmlhttpg.send();
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


var lastused = 2;
var currentcat = "BD"

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
    document.getElementById("samplecard-category").innerHTML="Front-End";
    document.getElementById("samplecard-category").style.backgroundColor = "blue";
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
    document.getElementById("samplecard-category").innerHTML="Back-End";
    document.getElementById("samplecard-category").style.backgroundColor = "#32cd32";
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
        '<option value="Debugging">Debugging</option>';
}
if(str == "BD"){
    document.getElementById("samplecard-category").innerHTML="Business";
    document.getElementById("samplecard-category").style.backgroundColor = "red";
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


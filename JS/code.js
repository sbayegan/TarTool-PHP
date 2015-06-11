
n favorite(cardid) {
   var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                if(xmlhttp.responseText == 1){
	              id = "save-";
	              id += cardid;
	              //document.getElementById("XXX").innerHTML = id;
	              //	              output = "<span onclick=\'unfavorite(";
	              //	              	              output += cardid;
	              //	              	                                    output += ")\'  > <img src=\'http://junto.link/pictures/cross-red.png\'  width=\'55\' height=\'55\' style=\'float:left;margin-left:0px;margin-top:15px\'></span>"
	              //	              	                                                          document.getElementById(id).innerHTML= output;
	              //	              	                                                                              }
	              //	              	                                                                                   }
	              //	              	                                                                                      }         
	              //	              	                                                                                              xmlhttp.open("POST", "favorite.php", true);
	              //	              	                                                                                                      xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	              //	              	                                                                                                              xmlhttp.send("id="+cardid);
	              /:/	              	                                                                                                              }

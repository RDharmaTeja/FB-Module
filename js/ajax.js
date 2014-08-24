//reditect to home 
function Redirect()
{
    window.location=ABSPATH;
}

//login check
function login(){
		var xmlhttp;
		var username=document.getElementById("username").value;
		var password=document.getElementById("password").value;
		document.getElementById("center").innerHTML='<center>Loading..</center><br><center><img src="images/728.GIF"></center>';
	
		if (window.XMLHttpRequest){
		xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"login.php",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
		var post_username="username="+username;
		var post_password="password="+password;
		var post_both=post_username+"&"+post_password;
		xmlhttp.send(post_both);
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				if(xmlhttp.responseText=="true")
				Redirect();
				else
				document.getElementById("center").innerHTML="<div data-alert class='medium-4 medium-centered columns alert-box alert'><center><b>Either username or password is wrong</b></center></div>";
				}		
			}	
	}
	
//signup check	
function signup(){
		var xmlhttp;
		var username=document.getElementById("username").value;
		var password=document.getElementById("password").value;
		document.getElementById("center").innerHTML='<center>Loading..</center><br><center><img src="images/728.GIF"></center>';
		if (window.XMLHttpRequest){
		    xmlhttp=new XMLHttpRequest();
		   }
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"signup.php",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
		var post_username="username="+username;
		var post_password="password="+password;
		var post_both=post_username+"&"+post_password;
		xmlhttp.send(post_both);
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){
				if(xmlhttp.responseText=="true")
				Redirect();
				else
				document.getElementById("center").innerHTML="<div data-alert class='medium-4 medium-centered columns alert-box alert'><center><b>"+xmlhttp.responseText+"</b></center></div>";
				}					
			}	
	}
	
//sending friend request	
function add_friend(friend_id){
		var xmlhttp;
		document.getElementById(friend_id).innerHTML='<center><img src="../images/10.gif"></center>';
        var id=friend_id;
		if (window.XMLHttpRequest){
	    	xmlhttp=new XMLHttpRequest();
     		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"friends/add_friend.php",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xmlhttp.send("friend_id="+id);
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4&&xmlhttp.status==200){
				document.getElementById(friend_id).innerHTML="<button class='button tiny ' disabled><b>Friend Request Sent</b></button>";		
			}
		}
}

//accepting friend request ajax
function accept_request(friendship_id){
			var xmlhttp;
			var request_id=	"request_id_"+friendship_id;
			document.getElementById(request_id).innerHTML='<center><img src="../images/10.gif"></center>';
		if (window.XMLHttpRequest){
		    xmlhttp=new XMLHttpRequest();
		  }
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"friends/accept_request.php",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xmlhttp.send("friendship_id="+friendship_id);
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4&&xmlhttp.status==200){		
	document.getElementById(request_id).innerHTML="<button class='button tiny '><b>You are Friends Now</b></button>";				
			}		
		}	
	}

//deleting friend request ajax
function delete_request(friendship_id){
			var xmlhttp;
			var request_id=	"request_id_"+friendship_id;
			document.getElementById(request_id).innerHTML='<center><img src="../images/10.gif"></center>';
		    if (window.XMLHttpRequest){
		     xmlhttp=new XMLHttpRequest();
		    }
		    else{
			 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"friends/delete_request.php",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xmlhttp.send("friendship_id="+friendship_id);
		xmlhttp.onreadystatechange=function(){
			if(xmlhttp.readyState==4&&xmlhttp.status==200){		
	document.getElementById(request_id).innerHTML="<button class='button tiny alert'><b>Request Deleted</b></button>";				
			}		
		}	
	}
	
//posting update
function post_update(){
			var xmlhttp;
			var post=document.getElementById("post").value;
			document.getElementById("button").innerHTML='<center><img src="images/728.GIF"></center>';
		if (window.XMLHttpRequest){
	    	xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"home/post.php?",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xmlhttp.send("post="+post);
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4&&xmlhttp.status==200){
		   document.getElementById("post").value="";
	       document.getElementById("button").innerHTML="<button class='button tiny' onclick='post_update()'><b>Another Post</b></button>";
		   if(xmlhttp.responseText!="false"){
          document.getElementById("status").innerHTML="<div data-alert class='small-8 medium-centered columns alert-box success'><center><b>Succesfully Posted</b></center></div>";
					}
	       else
	            document.getElementById("status").innerHTML="<div data-alert class='small-8 medium-centered columns alert-box alert'><center><b>Invalid Post. Try Again</b></center></div>";			
			}		
		}
	}	

//load more friends
function load_more_users(last_id){
			var xmlhttp;
			document.getElementById("loading").innerHTML='<center><img src="../images/728.GIF"></center>';
			document.getElementById("load_user_link").innerHTML='';
		if (window.XMLHttpRequest){
		   xmlhttp=new XMLHttpRequest();
		}
		else{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		xmlhttp.open("POST",ABSPATH+"friends/load_more_friends.php",true);
		xmlhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
        xmlhttp.send("last_id="+last_id);
		xmlhttp.onreadystatechange=function(){
		if(xmlhttp.readyState==4&&xmlhttp.status==200){
		document.getElementById("loading").innerHTML="";		
	    document.getElementById("more_users").innerHTML=document.getElementById("more_users").innerHTML+xmlhttp.responseText;
		}			
		}		
	}

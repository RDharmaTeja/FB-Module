<?php

require("connection.php");

// Login user 
class CurrentUser{
	var $username;
	var $userid;
	public function login()
	{
		if (isset($_SESSION['username']))
		return true;			
		}	
}


//sending friend request
function add_friend($sender_user_id,$friend_user_id)
{
	global $con;
	if($sender_user_id==$friend_user_id){
		return false;
		}
	if(check_friendship($sender_user_id,$friend_user_id)||friend_request_status($sender_user_id,$friend_user_id)){
		return true;
		}
   $query="INSERT INTO friends (sender_user_id,friend_user_id,is_confirmed) VALUES ('$sender_user_id','$friend_user_id',0)";		
   $add=mysqli_query($con,$query);	
}


//check friendship ie friend or not
function check_friendship($sender_user_id,$friend_user_id){
    global $con;
	$query="SELECT * FROM friends WHERE sender_user_id='$sender_user_id' and friend_user_id='$friend_user_id' and is_confirmed=1 ";
	$query_2="SELECT * FROM friends WHERE sender_user_id='$friend_user_id' and friend_user_id='$sender_user_id' and is_confirmed=1 ";
	$check=mysqli_query($con,$query);
	$check_2=mysqli_query($con,$query_2);
	if(mysqli_num_rows($check)!=0 || mysqli_num_rows($check_2)!=0 )
	return true;	
}


//check friend request status ie sent or not	
function friend_request_status($sender_user_id,$friend_user_id){
	global $con;
	$query="SELECT * FROM friends WHERE sender_user_id='$sender_user_id' and friend_user_id='$friend_user_id' and is_confirmed=0 ";
	$check=mysqli_query($con,$query);
	if(mysqli_num_rows($check)!=0)
	return true;
}

//accepting friend request	
function accept_friend_request($friendship_id){
    global $con;
    $query="UPDATE friends SET is_confirmed=1 WHERE id='$friendship_id'";
    $accept=mysqli_query($con,$query);
}

//Deleting friend request
function delete_friend_request($friendship_id){
	global $con;
    $query="DELETE FROM friends WHERE id='$friendship_id'";
    $delete=mysqli_query($con,$query);
}


/**showing users who are non friends
 * $userid --> login user
 * $number --> number of users to show
 * $startid --> start row in the table for loading more friends
 */
 	
function show_non_friends($userid,$number,$startid){
	global $con;
	$count=0;
	$non_friends=array();
	$query="SELECT * FROM users WHERE Id>=".$startid;
	$check=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($check)){
		if($count<$number){
		 if($row['Id']!=$userid){
			if(!check_friendship($userid,$row['Id'])){
		    	$non_friends[$count]=$row['username'];	
			    if(!friend_request_status($row['Id'],$userid)){
			      echo "<div class='row'><div class='medium-2 columns'><img src='".ABSPATH."images/download.jpg' width='40'
			          height='50'></div><div class='medium-4 columns'><a href='#'>".$non_friends[$count]."</a></div>
			          <div class='medium-6 columns' id='".$row['Id']."'>";
		
		          if(friend_request_status($userid,$row['Id'])){
		             echo "<button class='button tiny ' disabled><b>Friend Request Sent</b></button>
			              </div></div><br>";		
			       }
		          else	
		             echo "<button class='button tiny ' onclick=add_friend(".$row['Id'].")><b> + Add Friend</b></button>
			              </div></div><br>";
		        }
				$count++;
			}				
		   }
		  }
		  else break;
	 }
		if($count==$number){
		       echo "<div id='loading'></div><div id='more_users'></div><div id='load_user_link'>
		       <center><b><a href='#' onclick='load_more_users(".$row['Id'].")'>Load More</a></b></center></div>";	
			}
}
	

//show current friends
function show_friends($userid){
	global $con;
	$query="SELECT * FROM users";
	$find=mysqli_query($con,$query);
	while($row=mysqli_fetch_array($find)){
		if(check_friendship($userid,$row['Id'])){
			echo "<div class='row'><div class='small-6 columns'><center><img src='".ABSPATH."images/download.jpg' width='30' 
			height='30'></center></div><div class='small-6 columns'><a href='#'>".$row['username']."</a></div></div><br>";
			}
		}		
}	


//Showing friend requests
function show_requests($userid){
	global $con;
	$query="SELECT * FROM friends WHERE friend_user_id='$userid' and is_confirmed=0 ";
	$request=mysqli_query($con,$query);
	while ($row=mysqli_fetch_array($request)){
		$sender_user_id=$row['sender_user_id'];
        $sender_name=user_name($sender_user_id);  
		echo "<div class='row '><div class='medium-2 columns'><img src='".ABSPATH."images/download.jpg' width='40' height='50'>
		      </div><div class='medium-4 columns'><a href='#'>".$sender_name."</a></div><div id='request_id_".$row[id]."'>
		      <div class='medium-3 columns' id=''><button onclick='accept_request(".$row[id].")' class='button tiny'>
		      <b>Accept</b></button></div><div class='medium-3 columns' id=''>
		      <button onclick='delete_request(".$row[id].")' class='tiny button alert'><b>Cancel</b></button></div></div>
			  </div><br>";	
		}
}	

//username with userid	
function user_name($userid){
	global $con;
	$query="SELECT * FROM users WHERE Id='$userid'";
	$result=mysqli_query($con,$query);
	$username=mysqli_fetch_array($result);
	return $username['username'];
}


//posting updates
function post_update($post,$userid,$username){
	global $con;	
    $query="INSERT INTO  updates (user_id ,user_name,post,date) VALUES ('$userid','$username','$post',now());";		
    $add=mysqli_query($con,$query);
    if (mysqli_errno($con)){
      $errors[] = mysqli_error($con);
     }
}


//user updates
function updates($userid,$number){
   global $con;
   $query="SELECT * FROM updates ORDER BY date DESC";
   $find=mysqli_query($con,$query);
   $count=0;
   while($row=mysqli_fetch_array($find)){
	   if(check_friendship($userid,$row['user_id'])&&$count<$number){
		   echo "<div>By &nbsp;&nbsp;<a href='#'><b>".$row['user_name']."</b></a> &nbsp;&nbsp;at &nbsp;&nbsp;<a href='#'>".$row['date']."</a><br><br>
		   <div class='small-12 panel callout'>".$row['post']."</div></div>";
		   $count++;
		   }		   
	   }	
}


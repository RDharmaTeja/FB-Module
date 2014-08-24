<?php
require("includes/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST"){
  $username=strip_tags($_POST['username']);
  $password=strip_tags($_POST['password']);
    if ( !empty($username) and !empty($password) )
    {       
        $user_check="SELECT * FROM users WHERE username='$username'";
        $user_result = mysqli_query($con,$user_check) or error_log(mysql_error());
        if (mysqli_num_rows( $user_result) == 0 )
         {
			  $add_user=mysqli_query($con,"INSERT INTO users (username,password) VALUES ('$username','$password')");
			  $userid_query="SELECT * FROM users WHERE username='$username'";
              $userid_result= mysqli_query($con,$userid_query) or error_log(mysql_error());
              $userRow=mysqli_fetch_object($userid_result);
			  session_start();
			  $_SESSION['username']=$username;
			  $_SESSION['id']=$userRow->Id;
              echo "true";
          }
         else{
			echo "Username already exists, Try another";	
			 }
      }
       else
         echo "Invalid Signup";

}
else
{
       $location=ABSPATH;
       header("location: ".$location);
}
?>

<?php
require("includes/connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$username=strip_tags($_POST['username']);
$password=strip_tags($_POST['password']);
    if ( !empty($username) and !empty($password) ){      
        $query="SELECT * FROM users WHERE username='$username' and password='$password'";
        $result = mysqli_query($con,$query) or error_log(mysql_error());
        if (mysqli_num_rows( $result) == 1 )
         {
			$userRow = mysqli_fetch_object($result);
			session_start();
			$_SESSION['id']=$userRow->Id;
			$_SESSION['username']=$userRow->username;
		    echo "true";	
         }
         else{
			echo "false"; 
			 }
       }

}
else
{
$location=ABSPATH;
header("location: ".$location);
}
?>

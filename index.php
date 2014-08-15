<?php
session_start();
include "includes/Class.php";
$current_user=new CurrentUser;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>
		<?if(isset($_SESSION['username']))
		echo $_SESSION['username']." | Home";
        else echo "Login | SignUp"
		?>
		
	</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.21" />
	<link href="<?echo ABSPATH;?>css/foundation.css" rel='stylesheet'>
	<link href="css/home.css" rel='stylesheet'>
	<script> 
	var ABSPATH='<?echo ABSPATH;?>';
	 </script>
	<script src="js/ajax.js"></script>	
</head>

<body>
	<?php
	if($current_user->login()){
		  $current_user->username=$_SESSION['username'];
		  $current_user->userid=$_SESSION['id'];
           include "home/index.php";
		}
		else
	   include "home_center.php";
	?>
	
</body>

</html>

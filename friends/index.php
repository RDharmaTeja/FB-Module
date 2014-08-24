<?
include "../includes/Class.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?session_start();echo $_SESSION['username']?> | Friends</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.21" />
	<link href="../css/foundation.css" rel='stylesheet'>
	<link href="../css/home.css" rel='stylesheet'>
	<script> 
	var ABSPATH='<?echo ABSPATH;?>';
	 </script>
	<script src="../js/ajax.js"></script>
</head>

<body>
<?
$current_user=new CurrentUser;
if($current_user->login()){
		  $current_user->username=$_SESSION['username'];
		  $current_user->userid=$_SESSION['id'];
        include "header.php";
        include "center.php";
}
else
{
    $location=ABSPATH;
    header("location: ".$location);
}

?>
</body>
</html>

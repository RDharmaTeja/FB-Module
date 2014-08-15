
<?
require("includes/config.php");
$con = mysql_connect(DB_HOST,DB_USER,DB_PASS);
if (!$con) {
  die('Error in Connection : ' . mysql_error());
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Installation
		</title>
		
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.21" />
	<link href="<?echo ABSPATH;?>css/foundation.css" rel='stylesheet'>
	<link href="css/home.css" rel='stylesheet'>
	<script> 
	var ABSPATH='<?echo ABSPATH;?>';
	 </script>
		</head>
		<body>
			<br><br><br>






			<?
			$db_check = mysql_select_db(DB_NAME, $con);
			if ($db_check) {
	echo "<div data-alert='' class='medium-4 medium-centered columns alert-box alert'><center><b>Database '".DB_NAME."' already exists, Give another name</b></center></div>";
	echo "<center><a href='".ABSPATH."' class='button'>Home</a></center>";  		
			}
	else
	{
		$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS);
		
		//creating database
		$sql="CREATE DATABASE ".DB_NAME;
            if (mysqli_query($con,$sql)) {
                echo "<div data-alert='' class='medium-4 medium-centered columns alert-box success'><center><b>Database '".DB_NAME."' Created succesfully</b></center></div>";
               } else {
                   echo "Error creating database: " . mysqli_error($con);
                 }
        
        $con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        
         //creating users        
		$sql2="CREATE TABLE IF NOT EXISTS users (Id int(8) NOT NULL AUTO_INCREMENT,username varchar(12) NOT NULL,password varchar(12) NOT NULL,PRIMARY KEY (`Id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;";
     		if (mysqli_query($con,$sql2)) {
                echo "<div data-alert='' class='medium-4 medium-centered columns alert-box success'><center><b>Succesfully created table users</b></center></div>";
               } else {
                   echo "Error creating users table: " . mysqli_error($con);
                 }
                 
		//creating updates
		$sql3="CREATE TABLE IF NOT EXISTS `updates` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `post` longtext NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;
";
        if (mysqli_query($con,$sql3)) {
                echo "<div data-alert='' class='medium-4 medium-centered columns alert-box success'><center><b>Succesfully created table updates</b></center></div>";
               } else {
                   echo "Error creating table updates: " . mysqli_error($con);
                 }
        
        
        //creating friends
        $sql4="CREATE TABLE IF NOT EXISTS `friends` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `sender_user_id` bigint(20) NOT NULL,
  `friend_user_id` bigint(20) NOT NULL,
  `is_confirmed` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;
";
if (mysqli_query($con,$sql4)) {
                echo "<div data-alert='' class='medium-4 medium-centered columns alert-box success'><center><b>Succesfully created table friends</b></center></div>";
               } else {
                   echo "Error creating table friends " . mysqli_error($con);
                 }         
             echo "<center><a href='".ABSPATH."' class='button'>Home</a></center>";    		
		}
			?>
			
			</body>
		</html>

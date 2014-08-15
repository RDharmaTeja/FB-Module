<?
include "config.php";
$con=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
  if (mysqli_connect_errno()){
  die ("Failed to connect to MySQL: " . mysqli_connect_error());
  }
?>

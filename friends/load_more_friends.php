<?
session_start();
include "../includes/Class.php";
$current_user=new CurrentUser;
if($current_user->login()){
	$show_more=show_non_friends($_SESSION['id'],5,$_POST['last_id']);
	}


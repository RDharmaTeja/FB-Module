<?
session_start();
include "../includes/Class.php";
$current_user=new CurrentUser;
if($current_user->login()){
	$accept=delete_friend_request($_POST['friendship_id']);
	}


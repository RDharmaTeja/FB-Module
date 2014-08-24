<?
session_start();
include "../includes/Class.php";
$current_user=new CurrentUser;
if($current_user->login()){
	$accept=accept_friend_request($_POST['friendship_id']);
}


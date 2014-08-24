<?
session_start();
include "../includes/Class.php";
$current_user=new CurrentUser;
if($current_user->login()){
	$adding=add_friend($_SESSION['id'],$_POST['friend_id']);
}

<?
session_start();
include "../includes/Class.php";
$post=$_POST['post'];
if($post!=""){
   $username=$_SESSION['username'];
   $userid=$_SESSION['id'];
   $post=post_update($post,$userid,$username);
}
else
   echo "false";

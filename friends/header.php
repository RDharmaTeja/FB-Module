
<nav class="top-bar" data-topbar>
   <section class="top-bar-section">
    <ul class="left">
		<li><img src="<?echo ABSPATH;?>images/download.jpg" width="34" height="50"></li>
        <li class="active"><a href="<?echo ABSPATH;?>"><b><?echo $current_user->username;?></b></a></li>	  
	 </ul>
	          
    <ul class="right">
		<li class="has-form"><a href='<?echo ABSPATH;?>friends' class='small button secondary'><b>Friends</b></a></li>
	  <li class="has-form"><a href='<?echo ABSPATH;?>logout.php' class='small button'><b>Logout</b></a></li>
    </ul>
   </section>
</nav>

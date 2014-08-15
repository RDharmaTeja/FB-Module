<?php
        require("includes/config.php");
        session_start();
		unset($_SESSION['username']);
		session_destroy();
		$location=ABSPATH;
	    header("location: ".$location);

?>

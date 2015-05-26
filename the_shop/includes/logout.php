<?php
	
	// Log user out
	session_start();
	session_unset();
	session_destroy();
	header("LOCATION: ../index.php");
	exit();

?>
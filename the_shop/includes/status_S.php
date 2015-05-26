<?php 

		// Session checks
session_start();

if(empty($_COOKIE['userID'])){
	header('LOCATION: index.php');
}else{
	$userID = $_COOKIE['userID'];
}



if(isset($_GET['id'])) {

	$transID = $_GET['id'];

	if (isset($transID)) {

		// Database - Set approved to Yes
		include("dbcon.php"); //returns $dbc
		$q = "UPDATE transactions SET status = 'Shipped' WHERE transID = '$transID'";
		$r = mysqli_query($dbc, $q);

		if ($r){
			echo "";
		} else {
			echo "Sorry, something went wrong with updating the status.";
		}

		header("LOCATION: ../v_orders.php");				
	}
	header("LOCATION: ../v_orders.php");	
} else {
	header("LOCATION: ../v_orders.php");
}
?>
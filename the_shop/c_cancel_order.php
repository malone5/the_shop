<?php 

		if(isset($_GET['id'])) {

			$transID = $_GET['id'];

			// Database - Remove user from the database
			include("includes/dbcon.php"); //returns $dbc
			$q = "DELETE FROM transactions WHERE transID = '$transID'";
			$r = mysqli_query($dbc, $q);


				if ($r){
					echo "";
				} else {
					echo "Sorry, something went wrong with the database.";
				}
		} 
		header("LOCATION: my_orders.php?id=canceled");
?>
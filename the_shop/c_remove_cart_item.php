<?php 

		if(isset($_GET['id'])) {

			$cartID = $_GET['id'];
			// Database
			include("includes/dbcon.php"); //returns $dbc
			$q = "DELETE FROM carts WHERE cartID = '$cartID'";
			$r = mysqli_query($dbc, $q);

				if ($r){
					echo "<h2>Product Removed</h2>";
					header('LOCATION: my_cart.php');
				} else {
					echo "Sorry, failed connection to DB";
				}
			}

?>
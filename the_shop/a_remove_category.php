<?php 

		if(isset($_GET['id'])) {

			$category = $_GET['id'];
			// Database
			include("includes/dbcon.php"); //returns $dbc
			$q = "DELETE FROM categories WHERE category = '$category'";
			$r = mysqli_query($dbc, $q);

				if ($r){
					echo "<h2>Product Removed</h2>";
					header('LOCATION: a_manage_category.php');
				} else {
					echo "Sorry, failed connection to DB";
				}
			}

?>
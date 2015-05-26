<!--
	Reject + Delete Product
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>
	<?php 

		// Session checks
    session_start();

    if(empty($_COOKIE['userID'])){
      header('LOCATION: index.php');
    }else{
      $userID = $_COOKIE['userID'];
    }

    // Only vendors allowed
    if($_SESSION['role'] != 'Admin') {
      header('LOCATION: index.php');
    }

  ?>

	<div>
		<?php include("includes/admin_header.html"); ?>
	</div>

	<div class="large-8 large-centered columns">
		<?php 

		if(isset($_GET['id'])) {

			$productID = $_GET['id'];

			// Database - Get the user that has been approved
			include("includes/dbcon.php"); //returns $dbc
			$q = "SELECT item_name FROM product_master WHERE productID = '$productID'";
			$r = mysqli_query($dbc, $q);
			$row = mysqli_fetch_array($r);

			// Database - Remove user from the database
			include("includes/dbcon.php"); //returns $dbc
			$q2 = "DELETE FROM product_master WHERE productID = '$productID'";
			$r2 = mysqli_query($dbc, $q2);


				if ($r and $r2){
					echo "<h4>".$row['item_name']." has been rejected and the product has been removed from the system.</h4>";
				} else {
					echo "Sorry, something went wrong witht he database.";
				}
			}

		if($_SERVER['REQUEST_METHOD'] == 'POST') {	

			header('LOCATION: a_approve_products.php');

		}		


		?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">	
		<form action="", method = "POST">
			<div class="large-3 large-centered columns">
	      <input class="button" type="submit" name="button" value="Confirm" />
	    </div> 
	  </form>
	</div>


	<?php include("includes/footer.html");?>

</body>

</html>

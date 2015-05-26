<!--
	Page description
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
    if($_SESSION['role'] != 'Vendor') {
      header('LOCATION: index.php');
    }

  ?>

	<div>
		<?php include("includes/header.html"); ?>
	</div>

	<div class="large-4 large-centered columns">
		<?php 

		if(isset($_GET['id'])) {

			$productID = $_GET['id'];
			// Database
			include("includes/dbcon.php"); //returns $dbc
			$q = "DELETE FROM product_master WHERE productID = '$productID'";
			$r = mysqli_query($dbc, $q);

				if ($r){
					echo "<h2>Product Removed</h2>";
				} else {
					echo "Sorry, failed connection to DB";
				}
			}

		if($_SERVER['REQUEST_METHOD'] == 'POST') {	

			header('LOCATION: v_update_items.php');

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

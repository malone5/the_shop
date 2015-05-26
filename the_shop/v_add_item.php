<!--
	Vendor - Add Item
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Add Item</title>
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
		<?php include("includes/vendor_header.html"); ?>
	</div>

	<!-- PHP -->
	<div style="color: red">
		<?php 

			// Form Submitted

			if($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Make sure all fields are entered
				$item_name = $_POST['item_name'];
				$category = $_POST['selected_category'];
				$image_url = $_POST['image_url'];
				$description = $_POST['description'];
				$features = $_POST['features'];
				$constraints = $_POST['constraints'];
				$price = $_POST['price'];
				$discount_amt = $_POST['discount_amt'];
				$approved = "No";

				// Database connection
				include("includes/dbcon.php"); // returns $dbc

				// Error array checks
				$error = array();

				if (empty($userID)){
					$error[] = "Something went wrong with your userID";
				}
				if (empty($item_name)){
					$error[] = "Item name was not entered.";
				}
				if (empty($category)){
					$error[] = "category code was not entered.";
				}
				if (empty($image_url)){
					$error[] = "Image URL was not entered.";
				}
				if (empty($description)){
					$error[] = "Description was not entered.";
				}
				if (empty($features)){
					$error[] = "Featues was not entered.";
				}
				if (empty($constraints)){
					$error[] = "Constaints was not entered.";
				}
				if (empty($price)){
					$error[] = "Price was not entered.";
				}

				

				if (empty($error)) {
					// Define Query
					$q = "INSERT INTO product_master 
					( userID, 
						item_name, 
						category, 
						image_url, 
						description, 
						features, 
						constraints, 
						price, 
						discount_amt, 
						approved) VALUES 
						('$userID',
						'$item_name',
						'$category',
						'$image_url',
						'$description',
						'$features',
						'$constraints',
						'$price',
						'$discount_amt',
						'$approved')";

					// Execute Query
					$r = mysqli_query($dbc, $q);
					// Success Check
					if ($r) echo "This item was added to the system.";
					else echo "Something when wrong when adding the item.";
				} else {
					foreach ($error as $msg) {
						echo $msg;
						echo '<br>';
					}
				}
			} // End Post

		?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">

		<div class="large-3 large-centered columns">
			<h1>Add Item</h1>
		</div>
		<!-- Register Fields -->
		<div class="large-8 large-centered columns">
			<form action="", method = "POST">
				<table role="grid">
					<tr>
						<td>Item Name:</td>
						<td><input type="text" name="item_name" maxlength="50"></td>
					</tr>
					<tr>
						<td>category:</td>
						<td>
							<?php include("includes/category_list.php"); // name = "selected_category"?>
						</td></tr>
					<tr>
						<td>Item Image(URL):</td>
						<td><input type="text" name="image_url"></td>
					</tr>
					<tr>
						<td>Description:</td>
						<td><textarea type="text" name="description" style="width:400px; height:100px;"></textarea></td>
					</tr>
					<tr>
						<td>Featues:</td>
						<td><textarea type="text" name="features" style="width:400px; height:50px;"></textarea></td>
					</tr>
					<tr>
						<td>Constraints:</td>
						<td><input type="text" name="constraints"></td>
					</tr>
					<tr>
						<td>Price($):</td>
						<td><input type="text" name="price" style="width:100px;" maxlength="7" value="0.00"></td>
					</tr>
					<tr>
						<td>Discount Ammount ($):</td>
						<td><input type="text" name="discount_amt" value="0.00"></td>
					</tr>
					<tr>
				</table>
				<div class="large-3 large-centered columns">
					<input class="button" type="submit" name = "btnAdd" value="Add Item" />
				</div>	
			</form>
		</div>

	<?php include("includes/footer.html");?>
</body>

</html>
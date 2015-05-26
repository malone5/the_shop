<?php 


	//add order to tansactions
	include("includes/dbcon.php"); //returns $dbc
  $q = "SELECT * FROM carts WHERE userID = '$userID'";
  $r = mysqli_query($dbc, $q);

  if ($r) echo "";
	else echo "Something when wrong getting cart info.";

  $row_nums = mysqli_num_rows($r);
  $field_nums = mysqli_num_fields($r);


  while($row = mysqli_fetch_array($r)) {
  	$userID = $row['userID'];
  	$vendorID = $row['vendorID'];
  	$productID = $row['productID'];
  	$item_name = $row['item_name'];
  	$price = $row['price'];
  	$action = "Ordered";
  	$status = "Processing";

  	include("includes/dbcon.php"); //returns $dbc
	  $q2 = "INSERT INTO transactions  (userID, 
	  																	vendorID, 
	  																	productID, 
	  																	item_name,
	  																	price,
	  																	action,
	  																	status,
	  																	date) VALUES 
                                      ('$userID', 
                                      '$vendorID', 
                                      '$productID', 
                                      '$item_name',
                                      '$price', 
                                      '$action',
                                      '$status',
                                      now())";
	  $r2 = mysqli_query($dbc, $q2);

	  if ($r2) echo "";
		else echo "Something when wrong making the transaction.";


  }

	

 // Delete everything from carts where userid = #userID
  include("includes/dbcon.php");
  $q = "DELETE FROM carts WHERE userID = '$userID'";
	$r = mysqli_query($dbc, $q);

	if ($r) echo "<script type='text/javascript'>alert('Your order was succesful! It is now waiting to be shipped.');</script>";
	else echo "Something when wrong emptying the cart.";


?>
<!--
	Vendor - Edit Items
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Update Items</title>
  <link rel="stylesheet" href="css/foundation.max.css" />
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

<!-- MAIN PAGE CONTENT -->
  <div class="row">

    <h1 class="large-5 large-centered columns">Your Products</h1>
	<div class="large-12 large-centered columns" style="color: red">

		<?php 

      // Display all items associated with the venodrs account.

      // Database
      include("includes/dbcon.php"); //returns $dbc
      $q = "SELECT * FROM product_master WHERE userID = '$userID'";
      $r = mysqli_query($dbc, $q);
      $row_nums = mysqli_num_rows($r);
      $field_nums = mysqli_num_fields($r);

      // Start table
      echo "<table><tr>";

      // Print table headers.
      echo "<td> <b>Product ID</b> </td>";
      echo "<td> <b>Vendor</b> </td>";
      echo "<td> <b>Item Name</b> </td>";
      echo "<td> <b>Category</b> </td>";
      echo "<td> <b>Image</b> </td>";
      echo "<td> <b>Description</b> </td>";
      echo "<td> <b>Features</b> </td>";
      echo "<td> <b>Constraints</b> </td>";
      echo "<td> <b>Price</b> </td>";
      echo "<td> <b>Discount Ammount</b> </td>";
      //echo "<td> <b>Approved?</b> </td>";

      echo "</tr>\n";

      // Print the products
      while($row = mysqli_fetch_array($r)) {

        echo '<tr>';

        echo '<td>'.($row['productID']).'</td>';
        echo '<td>'.($row['userID']).'</td>';
        echo '<td>'.($row['item_name']).'</td>';
        echo '<td>'.($row['category']).'</td>';
        echo '<td>  <a class="th" role="button" aria-label="Thumbnail"  href="'.($row['image_url']).'">
                <img aria-hidden=true style="width: 50px;" src="'.($row['image_url']).'"/>
                </a></td>';
        echo '<td><span data-tooltip aria-haspopup="true" class="has-tip" title="'.($row['description']).'">View Description</span></td>';
        echo '<td><span data-tooltip aria-haspopup="true" class="has-tip" title="'.($row['features']).'">View Features</span></td>';
        echo '<td><span data-tooltip aria-haspopup="true" class="has-tip" title="'.($row['constraints']).'">View Constraints</span></td>';
        echo '<td>$'.($row['price']).'</td>';
        echo '<td>$'.($row['discount_amt']).'</td>';
        //echo '<td>'.($row['approved']).'</td>';
        echo '<td><a href="v_edit_item.php?id='.$row['productID'].'">Edit</a></td>';
        echo '<td><a href="v_remove_item.php?id='.$row['productID'].'">Remove</a></td>';
      }

      // Success Check
      if ($r)
        echo "";
      else
        echo "Something when wrong when adding the item.";

      echo '</tr>';
      echo '</table>';



      


    ?>
	</div>

	

	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
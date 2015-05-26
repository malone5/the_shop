<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - My Orders</title>
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
    if($_SESSION['role'] != 'Customer') {
      header('LOCATION: index.php');
    }

    if(isset($_GET['id'])) {
      if ($_GET['id'] == 'cancelled') {
        echo "<script type='text/javascript'>alert('Order has been succesfully cancelled.');</script>";
      }  
    }

  ?>

	<div>
		<?php include("includes/customer_header.html"); ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">
    <div class="large-3 large-centered columns">
      <h1><u>My Orders</u></h1>
    </div>
    <div class="large-11 large-centered columns">
      <?php
      // Display all transactions associated with the venodrs account.

      // Database
      include("includes/dbcon.php"); //returns $dbc
      $q = "SELECT * FROM transactions WHERE userID = '$userID'";
      $r = mysqli_query($dbc, $q);
      $row_nums = mysqli_num_rows($r);
      $field_nums = mysqli_num_fields($r);

      // Start table
      echo "<table><tr>";

      // Print table headers.
      echo "<td> <b>Transaction ID</b> </td>";
      echo "<td> <b>Vednor</b> </td>";
      echo "<td> <b>Item</b> </td>";
      echo "<td> <b>Sale Price</b> </td>";
      echo "<td> <b>Action</b> </td>";
      echo "<td> <b>Status</b> </td>";
      echo "<td> <b>Date Ordered</b> </td>";
      echo "<td> <b>Cancel Order</b> </td>";


      echo "</tr>\n";

      // Print the products
      while($row = mysqli_fetch_array($r)) {

        echo '<tr>';

        echo '<td>'.($row['transID']).'</td>';
        echo '<td>'.($row['vendorID']).'</td>';
        echo '<td>'.($row['item_name']).'</td>';
        echo '<td>$'.($row['price']).'</td>';
        echo '<td>'.($row['action']).'</td>';
        echo '<td>'.($row['status']).'</td>';
        echo '<td>'.($row['date']).'</td>';
        if (($row['status']) == 'Processing') {
          echo '<td><a class="button alert tiny" href="c_cancel_order.php?id='.$row['transID'].'">Cancel</a></td>';
        }
        //echo '<td><a href="v_edit_item.php?id='.$row['productID'].'">Edit</a></td>';
        //echo '<td><a href="v_remove_item.php?id='.$row['productID'].'">Remove</a></td>';
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
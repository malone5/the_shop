<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Sales Report</title>
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

	<div class="large-12 large-centered columns" style="color: red">

    <?php 


    ?>
  </div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">
    <div class="large-3 large-centered columns">
      <h1><u>My Sales</u></h1>
    </div>
    <div class="large-8 large-centered columns">
      <?php
      // Display all transactions associated with the venodrs account.

      // Database
      include("includes/dbcon.php"); //returns $dbc
      $q = "SELECT * FROM transactions WHERE vendorID = '$userID'";
      $r = mysqli_query($dbc, $q);
      $row_nums = mysqli_num_rows($r);
      $field_nums = mysqli_num_fields($r);

      // Start table
      echo "<table><tr>";

      // Print table headers.
      echo "<td> <b>Transaction ID</b> </td>";
      echo "<td> <b>Customer</b> </td>";
      echo "<td> <b>Vednor</b> </td>";
      echo "<td> <b>Product ID</b> </td>";
      echo "<td> <b>Item</b> </td>";
      echo "<td> <b>Action</b> </td>";
      echo "<td> <b>Date Purchesd</b> </td>";
      echo "<td> <b>Sale Price</b> </td>";

      echo "</tr>\n";

      $total_sales = 0.00;
      // Print the products
      while($row = mysqli_fetch_array($r)) {

        echo '<tr>';

        echo '<td>'.($row['transID']).'</td>';
        echo '<td>'.($row['userID']).'</td>';
        echo '<td>'.($row['vendorID']).'</td>';
        echo '<td>'.($row['productID']).'</td>';
        echo '<td>'.($row['item_name']).'</td>';
        echo '<td>'.($row['action']).'</td>';
        echo '<td>'.($row['date']).'</td>';
        echo '<td>$'.($row['price']).'</td>';

        $total_sales += $row['price'];
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
    <div class="large-3 large-centered columns">
      <h5>Total Sales: $<?php echo $total_sales; ?></h5>
    </div>
	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
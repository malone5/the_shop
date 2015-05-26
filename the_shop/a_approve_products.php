 <!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Approve Products</title>
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

	<div style="color: red">
		<?php ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">
    <div class="large-5 large-centered columns">
      <h3><u>Products Awaiting Approval</u></h3>
    </div>
    <div class="large-12 large-centered columns" style="color: red">

    <?php 

      // Display all items associated with the venodrs account.

      // Database
      include("includes/dbcon.php"); //returns $dbc
      $q = "SELECT * FROM product_master WHERE approved = 'No'";
      $r = mysqli_query($dbc, $q);
      $row_nums = mysqli_num_rows($r);
      $field_nums = mysqli_num_fields($r);

      // Start table
      echo "<table><tr>";

      // Print table headers.
      echo "<td> <b>ID</b> </td>";
      echo "<td> <b>Vendor</b> </td>";
      echo "<td> <b>Item Name</b> </td>";
      echo "<td> <b>Cetagory</b> </td>";
      echo "<td> <b>Image</b> </td>";
      echo "<td> <b>Details</b> </td>";
      echo "<td> <b>Price</b> </td>";
      echo "<td> <b>Discount Ammount</b> </td>";
      echo "<td> </td>";
      echo "<td> *delete product </td>";

      echo "</tr>\n";

      // Print the products
      while($row = mysqli_fetch_array($r)) {

        echo '<tr>';

        echo '<td>'.($row['productID']).'</td>';
        echo '<td>'.($row['userID']).'</td>';
        echo '<td>'.($row['item_name']).'</td>';
        echo '<td>'.($row['category']).'</td>';
        echo '<td>  <a class="th" role="button" aria-label="Thumbnail" href="'.($row['image_url']).'">
              <img aria-hidden=true src="'.($row['image_url']).'"/>
              </a></td>';
        echo '<td><a href="#">View Details</a></td>';
        echo '<td>$'.($row['price']).'</td>';
        echo '<td>$'.($row['discount_amt']).'</td>';
        echo '<td><a href="a_approve_prod.php?id='.$row['productID'].'" class="button tiny success" >Approve</td>';
        echo '<td><a href="a_reject_prod.php?id='.$row['productID'].'" class="button tiny alert" >Reject</td>';
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
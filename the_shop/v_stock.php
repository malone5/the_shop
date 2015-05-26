<!--
  Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Stock Report</title>
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
      <h1><u>My Stock</u></h1>
    </div>
    <div class="large-6 large-centered columns">
      <?php
      // Display all transactions associated with the venodrs account.

      // Database
      include("includes/dbcon.php"); //returns $dbc
      $q = "SELECT * FROM product_master WHERE userID = '$userID'";
      $r = mysqli_query($dbc, $q);
      $row_nums = mysqli_num_rows($r);
      $field_nums = mysqli_num_fields($r);

      // Start table
      echo "<table><tr>";

      // Print table headers.
      echo "<td> <b>Item</b> </td>";
      echo "<td> <b>Category</b> </td>";
      echo "<td> <b>Price</b> </td>";
      echo "<td> <b>Discount</b> </td>";
      echo "<td> <b>Final Price</b> </td>";
      //echo "<td> <b>Approved?</b> </td>";

      echo "</tr>\n";

      // Print the products
      while($row = mysqli_fetch_array($r)) {

        echo '<tr>';

        echo '<td>'.($row['item_name']).'</td>';
        echo '<td>'.($row['category']).'</td>';
        echo '<td>$'.($row['price']).'</td>';
        echo '<td>-$'.($row['discount_amt']).'</td>';
        $final_price = ($row['price']) - ($row['discount_amt']);
        $final_price = sprintf('%0.2f', $final_price);
        echo '<td>$'.$final_price.'</td>';

        //echo '<td>'.($row['approved']).'</td>';
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
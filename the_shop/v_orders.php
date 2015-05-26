<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Manage Orders</title>
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

    // Functions
      function menu($array, $name, $value){
        echo '<select name='.$name.'>';
              
        foreach($array as $ar){
          echo '<option value="'.$ar.'"';
            if($ar==$value) echo 'selected == "selected"';
          echo '>'.$ar.'</option>';
        }
        echo '</select>';
      }

  ?>

	<div>
		<?php include("includes/vendor_header.html"); ?>
	</div>

	<div style="color: red">
		<?php ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">
    <div class="large-5 large-centered columns">
      <h1><u>Pending Orders</u></h1>
    </div>
    <div class="large-12 large-centered columns">
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
        echo "<td> <b>ID</b> </td>";
        echo "<td> <b>Customer</b> </td>";
        echo "<td> <b>Item</b> </td>";
        echo "<td> <b>Sale Price</b> </td>";
        echo "<td> <b>Action</b> </td>"; 
        echo "<td> <b>Date Ordered</b> </td>";
        echo "<td> <b>CurrentStatus</b> </td>";
        echo "<td style:'large-centered'> <b>Set Status</b> </td>";

        echo "</tr>\n";

        // Print the products
        while($row = mysqli_fetch_array($r)) {

          echo '<tr>';

          echo '<td>'.($row['transID']).'</td>';
          echo '<td>'.($row['userID']).'</td>';
          echo '<td width="100px">'.($row['item_name']).'</td>';
          echo '<td>$'.($row['price']).'</td>';
          echo '<td>'.($row['action']).'</td>';
          echo '<td>'.($row['date']).'</td>';
          echo '<td>'.($row['status']).'</td>';
 
          echo '<td>
                    <ul class="button-group round">
                      <li><a href="includes/status_P.php?id='.$row['transID'].'" class="button alert tiny">Processing</a></li>
                      <li><a href="includes/status_S.php?id='.$row['transID'].'" class="button warning tiny">Shipped</a></li>
                      <li><a href="includes/status_A.php?id='.$row['transID'].'" class="button success tiny">Arrived</a></li>
                    </ul>
                </td>';
          

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

	<?php include("includes/footer.html");?>
</body>

</html>
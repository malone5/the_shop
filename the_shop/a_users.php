<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Users Report</title>
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
    <div class="large-4 large-centered columns">
      <h1><u>User Report</u></h1>
    </div>
    <div class="large-11 large-centered columns" style="color: red">

    <?php 

      // Display all items associated with the venodrs account.

      // Database
      include("includes/dbcon.php"); //returns $dbc
      $q = "SELECT * FROM user WHERE role != 'Vendor'";
      $r = mysqli_query($dbc, $q);
      $row_nums = mysqli_num_rows($r);
      $field_nums = mysqli_num_fields($r);

      // Start table
      echo "<table><tr>";

      // Print table headers.
      echo "<td> <b>Username</b> </td>";
      echo "<td> <b>Role</b> </td>";
      echo "<td> <b>First Name</b> </td>";
      echo "<td> <b>Last Name</b> </td>";
      echo "<td> <b>Address</b> </td>";
      echo "<td> <b>City</b> </td>";
      echo "<td> <b>State</b> </td>";
      echo "<td> <b>Email</b> </td>";
      echo "<td> <b>Phone</b> </td>";
      
      //echo "<td> <b>Approved?</b> </td>";

      echo "</tr>\n";

      // Print the products
      while($row = mysqli_fetch_array($r)) {

        echo '<tr>';

        echo '<td>'.($row['userID']).'</td>';
        echo '<td>'.($row['role']).'</td>';
        echo '<td>'.($row['fname']).'</td>';
        echo '<td>'.($row['lname']).'</td>';
        echo '<td>'.($row['address']).'</td>';
        echo '<td>'.($row['city']).'</td>';
        echo '<td>'.($row['state']).'</td>';
        echo '<td>'.($row['email']).'</td>';
        echo '<td>'.($row['phone']).'</td>';
        
        //echo '<td>'.($row['approved']).'</td>';
        //echo '<td><a href="v_edit_item.php?id='.$row['userID'].'">Edit</a></td>';
        //echo '<td><a href="v_remove_item.php?id='.$row['userID'].'">Remove</a></td>';
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
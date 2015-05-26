<!--
	Admin Reports
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Admin Reports</title>
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
    <div class="large-3 large-centered columns">
      <h3><u>Admin Reports</u></h3>
    </div>
    <div class="large-4 large-centered columns">
      <h4><a href="a_users.php">Customer Accounts Report</a></h4>
      <h4><a href="a_vendors.php">Vendor Accounts Report</a></h4>
      <h4><a href="a_sales.php">Sales Report</a></h4>
    </div>
	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
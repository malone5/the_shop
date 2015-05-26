<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Reports</title>
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

	<div style="color: red">
		<?php ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">
    <div class="large-5 large-centered columns">
      <h1><u>Vendor Reports</u></h1>
    </div>
    <div class="large-3 large-centered columns">
      <h4><a href="v_sales.php">Sales Report</a></h4>
      <h4><a href="v_stock.php">Stock Report</a></h4>
    </div>
	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop</title>
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
    if($_SESSION['role'] != '') {
      header('LOCATION: index.php');
    }

  ?>

	<div>
		<?php include("includes/header.html"); ?>
	</div>

	<div style="color: red">
		<?php ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">

		<div class="large-4 large-centered columns">
      <h1><u>Stock Report</u></h1>
    </div>

	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
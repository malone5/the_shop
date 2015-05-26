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
    // Anyone can view this
    session_start();

    
    if(!empty($_COOKIE['userID'])){
      $userID = $_COOKIE['userID'];
    }      
    
    


  ?>

	<div>
		<?php 
      // Decide header/nav based of session role
      if (isset($_SESSION['role'])) {
        if($_SESSION['role'] == 'Admin') {
          include("includes/admin_header.html");

        } elseif ($_SESSION['role'] == 'Vendor') {
          include("includes/vendor_header.html");

        } elseif ($_SESSION['role'] == 'Customer') {
          include("includes/customer_header.html");

        } else{
          include("includes/header.html");
        }
      } else { // The user is not logged in
        include("includes/header.html");
      }    
    
    ?>
	</div>

  <!-- Get All Procuct Details-->
	<div style="color: red">
		<?php 
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['button'] == 'Add To Cart') {
          // CHECK TO SEE IF THEY ARE A CUSTOMER
          if(empty($_COOKIE['userID']) == True || $_SESSION['role'] != 'Customer') {

            echo "<script type='text/javascript'>alert('You must be logged in as a Customer to add products to your cart!');</script>";

          } else { // Add the product the the users cart

            // Database Get Product Info
            if(isset($_GET['id'])) {
              $productID = $_GET['id'];

              include("includes/dbcon.php");
              $q3 = "SELECT * FROM product_master WHERE productID = '$productID'";
              $r3 = mysqli_query($dbc, $q3);

              if ($r3) echo "";
              else echo "Sorry failed connection to DB.";

              if (mysqli_num_rows($r3) == 1) {
                $row3 = mysqli_fetch_array($r3);
                $productID = $_GET['id'];
                $vendorID = $row3['userID'];
                $item_name = $row3['item_name'];
                $image_url = $row3['image_url'];
                $price = $row3['price'];
                $discount_amt = $row3['discount_amt'];
                $final_price = $price - $discount_amt;
                $final_price = sprintf('%0.2f', $final_price);
              }

                         
              // Database Add to Cart
              //date_default_timezone_set('America/New_York');
              include("includes/dbcon.php");
              $q2 = "INSERT INTO carts  (userID, vendorID, productID, item_name, image_url, price, date_added) VALUES 
                                        ('$userID', '$vendorID', '$productID', '$item_name', '$image_url','$final_price',now())";
              $r2 = mysqli_query($dbc, $q2);

              // Report action
              if ($r2){          
                echo "<script type='text/javascript'>alert('Item added to your cart!');</script>";
              } else {
                echo "Something went wrong when adding to cart.";
              }
            }
          }         
        } // END ADD TO CART    
      } // END POST
        

      if(isset($_GET['id'])) {
        $productID = $_GET['id'];
        // Get all info about product
        include("includes/dbcon.php");
        $q = "SELECT * FROM product_master WHERE productID = '$productID'";
        $r = mysqli_query($dbc, $q);

        if ($r) echo "";
        else echo "Sorry failed connection to DB.";

        if (mysqli_num_rows($r) == 1) {
          $row = mysqli_fetch_array($r);
          $item_name = $row['item_name'];
          $category = $row['category'];
          $image_url = $row['image_url'];
          $description = $row['description'];
          $features = $row['features'];
          $constraints = $row['constraints'];
          $price = $row['price'];
          $discount_amt = $row['discount_amt'];
          $final_price = $price - $discount_amt;
          $final_price = sprintf('%0.2f', $final_price);
        } else {
          echo "Error getting class info.";
        }
      }
      

    ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
  <div class="row">
    <h4 class="subheader left"><a href="browse.php"> << Back to browsing </a></h4>
    <h4 class="subheader right"><a href="my_cart.php">Back to shopping cart >></a></h4>
  </div>
	<div class="row">

		<div class="large-4 large-centered columns">
      <form action="", method="POST">
        <ul class="pricing-table" style="margin-top: 5px">
          <li class="title"><?php echo $item_name; ?></li>
          <li class="bullet-item"><a class="th" role="button" aria-label="Thumbnail" href="'.($row['image_url']).'">
                  <img aria-hidden=true src="<?php echo $image_url; ?>"/>
                  </a></li>
          <li class="price">$<?php echo $final_price; ?></li>
          <li class="description"><?php echo $description; ?></li>
          <li class="bullet-item"><u>Features Include</u><br><br><?php echo $features; ?></li>
          <li class="bullet-item"><u>Notes</u><br><br><?php echo $constraints; ?></li>
          <li class="bullet-item">Category:  <?php echo $category; ?></li>
          <li class="cta-button"><input class="button" type="submit" name="button" value="Add To Cart" /></li>
        </ul>
      </form>
    </div>

	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
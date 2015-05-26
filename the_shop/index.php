<html>
<!-- User Welcome -->
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
    session_start();
    ?>

    <!-- HEADER -->
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
       
       
      <!-- PAGE CONTENT -->
      <div class="row">
          
            <div class="large-10 large-centered columns left">
              <h4>"The Shop" E-Commerce Service</h4>
              <p>Welcom to the "The Shop" for all you soccer needs!
               We have everything from footware and jerseys, to training gear and Accessories. <br><br>

               Feel free to browse our cataloge of soccer gear. However, if you are not logged in you do not have a shopping cart.
               If you wish to add any items to your cart for purchase, you will need to <a href="register.php">register</a> a customer account. </p>

               If you are a vendor that wishes to sell products through The Shop, feel free to request a vendor account.
               Upon creation, you vendor account will not active until an administrator approves your account.

               Enjoy your stay at the Shop!
            </div> 

      </div>
     
    
       <!-- FOOTER -->
       <?php include("includes/footer.html"); ?>

       
  </body>



 </html>
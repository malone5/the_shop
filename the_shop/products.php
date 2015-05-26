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

        } elseif ($_SESSION['role'] == 'Vendor') {
          include("includes/customer_header.html");

        } 
      } else { // The user is not logged in
        include("includes/header.html");
      }    

    ?>
    
    <div class="row">
        <div class="large-5 columns">
          
        </div>
    </div>
    
       
      <!-- PAGE CONTENT -->
      <div class="row">
          
            <div class="large-9 large-centered columns left">
              <h4>Browse Products</h4>
              <p>Product stuff here all day</p>
            </div> 

      </div>
     
    
       <!-- FOOTER -->
       <?php include("includes/footer.html"); ?>

       
  </body>



 </html>
<html>
<!-- Browse Products -->
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

    if(!empty($_COOKIE['userID'])){
      $userID = $_COOKIE['userID'];
    }

    ?>

    <!-- HEADER -->
    <?php 

      // Decide header/nav based of session role //
      if (isset($_SESSION['role'])) {
        if($_SESSION['role'] == 'Admin') {
          include("includes/admin_header.html");

        } elseif ($_SESSION['role'] == 'Vendor') {
          include("includes/vendor_header.html");

        } elseif ($_SESSION['role'] == 'Customer') {
          include("includes/customer_header.html");

        } 
      } else { // The user is not logged in
        include("includes/header.html");
      }

    ?>     
    </div>
    <!-- Category selection Functionality -->
    <div style="color: red">

    </div>
    
       
      <!-- PAGE CONTENT -->
      <form action="", method = "POST">
      <div class="row">

        <div class="large-3 large columns" style="margin-top: 15px;">           
            <input type="text" name="search_criteria" >     
        </div>

        <div class="large-2 large columns">
          <input class="button right" style="margin-top: 10px;" type="submit" name="button" value="Search" />
        </div>

        <div class="large-1 large columns" style="margin-top: 10px;">
          <h4 class="subheader">or</h4>
        </div>
          
        <div class="large-3 large columns" style="margin-top: 15px;">           
            <?php include("includes/category_list.php"); //name = selected_category ?>         
        </div>
        
        <div class="large-3 large columns">   
          <input class="button right" style="margin-top: 10px;" type="submit" name="button" value="Browse Category" />
        </div> 

        

        

      </div>
      

   

      <div class="row">
        <div class="large-11 large-centered columns left" style="color: red">

        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
              if($_POST['button'] == 'Browse Category' ) {
                
                include("includes/product_list.php");
              }
              if($_POST['button'] == 'Search' ) {
                include("includes/search_product_list.php");
              }
            }


          ?>
        </div>

      </div>
      </form>
     
    
       <!-- FOOTER -->
       <?php include("includes/footer.html"); ?>

       
  </body>



 </html>
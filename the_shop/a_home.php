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
    
       
     
      <div class="row">
        <div class="large-12 large-centered columns">
          <h2 class="subheader">Welcome <?php echo $userID; ?>! Check and see if any products or vendors need approval!</h2>
        </div>
      </div>
     
    
       <!-- FOOTER HERE -->
       <?php include("includes/footer.html"); ?>

       
  </body>



 </html>
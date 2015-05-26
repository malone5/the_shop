<!--
  Customer - Home
-->

<html>
<!-- User Welcome -->
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Shop - Customer Home</title>
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
      if($_SESSION['role'] != 'Customer') {
        header('LOCATION: index.php');
      }

    ?>

    <div>
      <?php include("includes/customer_header.html"); ?>
    </div>
    
         
      <div class="row">
        <div class="large-12 large-centered columns">
          <h1 class="subheader">Welcome <?php echo $userID; ?>! Let get ready to shop!</h4>
        </div>
      </div>
     
    
       <!-- FOOTER HERE -->
       <?php include("includes/footer.html");?>

       
  </body>



 </html>
<!--
  Customer - Home
-->

<html>
<!-- User Welcome -->
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Shop - My Cart</title>
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

      <div class="large-12 large-centered columns" style="color: red">

        <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
            include("order_email.php");
            include("confirm_order.php");       
          }
        ?>
        
      </div>
    
       
     
      <div class="row"> 
        <div class="large-12 columns" style="margin-top: 25px">

          <div class="row">
            <div class="large-7 large-centered columns left" >
              <h4>My Cart</h4>
              <?php 
                // Display cart items.
                // Database
                include("includes/dbcon.php"); //returns $dbc
                $q = "SELECT * FROM carts WHERE userID = '$userID'";
                $r = mysqli_query($dbc, $q);
                $row_nums = mysqli_num_rows($r);
                $field_nums = mysqli_num_fields($r);

                // Start table
                echo '<table style="centered"><tr>';

                // Print table headers.
                echo "<td> <b>Item</b> </td>";
                echo "<td> <b>Image</b> </td>";
                echo "<td> <b>Price</b> </td>";
                echo "<td> <b>Item Info</b> </td>";
                echo "<td></td>";
                
                            
                //echo "<td> <b>Approved?</b> </td>";

                echo "</tr>\n";

                // Print the products
                $cart_total = 0.00;

                while($row = mysqli_fetch_array($r)) {

                  echo '<tr>';

                  echo '<td>'.($row['item_name']).'</td>';
                  echo '<td>  <a class="th" role="button" aria-label="Thumbnail" href="'.($row['image_url']).'">
                              <img aria-hidden=true src="'.($row['image_url']).'"/>
                              </a></td>';
                  echo '<td>$'.($row['price']).'</td>';
                  echo '<td> <a href="view_item_details.php?id='.($row['cartID']).'">Product Info</a> </td>';
                  echo '<td> <a href="c_remove_cart_item.php?id='.($row['cartID']).'">Remove</a> </td>';

                  $cart_total += $row['price'];


                }

                $cart_total = sprintf('%0.2f', $cart_total); 


                // Success Check
                if ($r)
                  echo "";
                else
                  echo "Something when wrong when adding the item.";
                  echo '</tr>';
                  echo '</table>';

                // Get shipping information
                include("includes/dbcon.php"); //returns $dbc
                $q = "SELECT * FROM user WHERE userID = '$userID'";
                $r = mysqli_query($dbc, $q);
                $row = mysqli_fetch_array($r);

                if(mysqli_num_rows($r) == 1){
                  $fname = $row['fname'];
                  $lname = $row['lname'];
                  $address = $row['address'];
                  $city = $row['city'];
                  $state = $row['state'];
                  $zip = $row['zip'];
                  $email = $row['email'];
                  $phone = $row['phone'];
                  $credit_card = $row['credit_card'];



                }
                

              ?>
            </div>
            <form action"", method="POST">
            <div class="large-5 large-centered columns right">
              <ul class="pricing-table">
                <li class="title">Total Order Price</li>
                <li class="price">$<?php echo $cart_total; ?></li>
                <li class="bullet-item"><u>Shipping Information</u></li>
                <li class="description"><?php echo $fname."\t".$lname; ?></li>
                <li class="description">Address: <?php echo $address."\t".$state.",\t".$zip; ?></li>
                <li class="description">Email: <?php echo $email; ?></li>
                <li class="description">Phone: <?php echo $phone; ?></li>
                <li class="description">Credit Card: <?php echo $credit_card; ?></li>
                <?php 
                  if ($cart_total > 0) {
                    echo '<li class="cta-button">
                          <input class="button success" type="submit" name = "Confirm" value="Confirm Order" />
                          </li>';
                  }

                ?>
              </ul>
            </div>
            </form>
          </div>

        </div>

      </div>

     
    
       <!-- FOOTER HERE -->
       <?php include("includes/footer.html");?>

       
  </body>



 </html>
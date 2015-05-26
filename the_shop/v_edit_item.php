<!--
	Vendor - Edit Item
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Update Items</title>
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
		<?php 

      // // Menu function
      // function menu($array, $name, $value){
      //   echo '<select name='.$name.'>';
              
      //   foreach($array as $ar){
      //     echo '<option value="'.$ar.'"';
      //       if($ar==$value) echo 'selected == "selected"';
      //     echo '>'.$ar.'</option>';
      //   }
      //   echo '</select>';
      // }

      // Alert funciton
      function phpAlert($msg) {
          echo '<script type="text/javascript">alert("' . $msg . '")</script>';
      }


      // When update is pressed
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['button'] == 'Update') {
          // Make sure all fields are entered
          $productID = $_GET['id'];
          $item_name = $_POST['item_name'];
          $category = $_POST['selected_category'];
          $image_url = $_POST['image_url'];
          $description = $_POST['description'];
          $features = $_POST['features'];
          $constraints = $_POST['constraints'];
          $price = $_POST['price'];
          $discount_amt = $_POST['discount_amt'];
          

          // Database connection
          include("includes/dbcon.php"); // returns $dbc

          // Error array checks
          $error = array();

          if (empty($userID)){
            $error[] = "Something went wrong with your userID";
          }
          if (empty($item_name)){
            $error[] = "Item name was not entered.";
          }
          if (empty($category)){
            $error[] = "category code was not entered.";
          }
          if (empty($image_url)){
            $error[] = "Image URL was not entered.";
          }
          if (empty($description)){
            $error[] = "Description was not entered.";
          }
          if (empty($features)){
            $error[] = "Featues was not entered.";
          }
          if (empty($constraints)){
            $error[] = "Constaints was not entered.";
          }
          if (empty($price)){
            $error[] = "Price was not entered.";
          }

          if(empty($error)){

            // Database Update
            include("includes/dbcon.php");
            $q = "UPDATE product_master SET 
                                          item_name = '$item_name',
                                          category = '$category',
                                          image_url = '$image_url',
                                          description = '$description',
                                          features = '$features',
                                          constraints = '$constraints',
                                          price = '$price',
                                          discount_amt = '$discount_amt' WHERE productID = '$productID'";
            $r = mysqli_query($dbc, $q);

            // Report action
            if ($r){          
              header('LOCATION: v_update_items.php');
            } else {
              echo "Something went wrong when updating the item.";
            }
          } else {
            foreach ($error as $msg) {
              // print the error message
              echo $msg;
              echo '<br>';
            }
          }
        } // END UPDATE    
      } else {
        if(isset($_GET['id'])) {
          $productID = $_GET['id'];
          // Get all info about product
          include("includes/dbcon.php");
          $q = "SELECT * FROM product_master WHERE productID = '$productID'";
          $r = mysqli_query($dbc, $q);

          if ($r) echo "Item info retrieved";
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
          } else {
            echo "Error getting class info.";
          }
        }
      } // END POST


    ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
  <div class="row">

    <div class="large-3 large-centered columns">
      <h1>Edit Item</h1>
    </div>
    <!-- Register Fields -->
    <div class="large-7 large-centered columns">
      <form action="", method = "POST">
        <table role="grid">
          <tr>
            <td>Item Name:</td>
            <td><input type="text" name="item_name" value=
              "<?php if(isset($_POST['item_name'])){ echo $_POST['item_name'];} else { echo $item_name;} ?>">
            </td>
          </tr>
          <tr>
            <td>category:</td>
            <td>
            
              <?php  include("includes/category_list.php"); ?> 
             
            </tr>
          <tr>
            <td>Item Image(URL):</td>
            <td><input type="text" name="image_url" value=
              "<?php if(isset($_POST['image_url'])){ echo $_POST['image_url'];} else { echo $image_url;} ?>">
            </td>
          </tr>
          <tr>
            <td>Description:</td>
            <td>
              <textarea type="text" name="description" style="width:400px; height:100px;">
                <?php if(isset($_POST['description'])){ echo $_POST['description'];} else { echo $description;} ?>
              </textarea>
            </td>
          </tr>
          <tr>
            <td>Featues:</td>
            <td>
              <textarea type="text" name="features" style="width:400px; height:100px;">
              <?php if(isset($_POST['features'])){ echo $_POST['features'];} else { echo $features;} ?>
              </textarea>
            </td>
          </tr>
          <tr>
            <td>Constraints:</td>
            <td><input type="text" name="constraints" value=
              "<?php if(isset($_POST['constraints'])){ echo $_POST['constraints'];} else { echo $constraints;} ?>">
            </td>
          </tr>
          <tr>
            <td>Price(eg: 5.99 ):</td>
            <td><input type="text" name="price" value=
              "<?php if(isset($_POST['price'])){ echo $_POST['price'];} else { echo $price;} ?>">
            </td>
          </tr>
          <tr>
            <td>Discount Ammount ($):</td>
            <td><input type="text" name="discount_amt" value=
              "<?php if(isset($_POST['discount_amt'])){ echo $_POST['discount_amt'];} else { echo $discount_amt;} ?>">
            </td>
          </tr>
          <tr>
        </table>
        <div class="large-3 large-centered columns">
          <input class="button" type="submit" name="button" value="Update" />
          <input type="hidden" name="productID" value="<?php echo $productID;?>"/>
        </div>  
      </form>
    </div>

	<?php include("includes/footer.html");?>
</body>

</html>
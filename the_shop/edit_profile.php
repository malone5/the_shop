<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Edit Profile</title>
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
    if(empty($_SESSION['role'])) {
      header('LOCATION: index.php');
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

        } else {
          include("includes/header.html");

        }
      } else { // The user is not logged in
        include("includes/header.html");
      }    
    ?>
	</div>

	<div style="color: red">
		<?php 

      // Functions
      function menu($array, $name, $value){
        echo '<select name='.$name.'>';
              
        foreach($array as $ar){
          echo '<option value="'.$ar.'"';
            if($ar==$value) echo 'selected == "selected"';
          echo '>'.$ar.'</option>';
        }
        echo '</select>';
      }

      // When Update is pressed

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if($_POST['button'] == 'Update Profile') {

          // Make sure all fields are entered
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $address = $_POST['address'];
          $city = $_POST['city'];
          $state = $_POST['state'];
          $zip = $_POST['zip'];
          $email = $_POST['email'];
          $phone = $_POST['phone'];
          $credit_card = $_POST['credit_card'];
          $role = $_SESSION['role'];
          

          // Database connection
          include("includes/dbcon.php"); // returns $dbc

          // Error array checks
          $error = array();

          //if (empty($userID)){ $error[] = "Something went wrong with your userID"; }
          if (empty($fname)){ $error[] = "First name was not entered."; }
          if (empty($lname)){ $error[] = "Last name was not entered."; }
          if (empty($address)){ $error[] = "Address was not entered."; }
          if (empty($city)){ $error[] = "City was not entered."; }
          if (empty($state)){ $error[] = "State was not entered."; }
          if (empty($zip)){ $error[] = "Zip code was not entered."; }
          if (empty($email)){ $error[] = "Email was not entered."; }
          if (empty($phone)){ $error[] = "Phone was not entered."; }
          if (empty($phone)){ $credit_card = "No credit card entered"; };

          if(empty($error)){
            // Database Update
            include("includes/dbcon.php");
            $q = "UPDATE user SET 
                                  fname = '$fname',
                                  lname = '$lname',
                                  address = '$address',
                                  city = '$city',
                                  state = '$state',
                                  zip = '$zip',
                                  email = '$email',
                                  phone = '$phone',
                                  credit_card = '$credit_card',
                                  role = '$role' WHERE userID = '$userID'";
            $r = mysqli_query($dbc, $q);

            // Report action
            if ($r) {          
              echo "Profile Updated";
            } else {
              echo "Something went wrong when updating you profile.";
            }         
          } else { // Something in error array
            foreach ($error as $msg) {
              // print the error message
              echo $msg;
              echo '<br>';
            }
          }
        } // END UPDATE    
      } else {
        if(isset($_SESSION['userID'])) {

          //$userID = $userID;

          // Get profile
          include("includes/dbcon.php");
          $q = "SELECT * FROM user WHERE userID = '$userID'";
          $r = mysqli_query($dbc, $q);

          if ($r) echo "";
          else echo "Sorry failed connection to DB.";

          if (mysqli_num_rows($r) == 1) {
            $row = mysqli_fetch_array($r);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $address = $row['address'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $email = $row['email'];
            $phone = $row['phone'];
            $credit_card = $row['credit_card'];
          } else {
            echo "Error getting class info.";
          }
        }
      } // END POST


    ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">

		<div class="large-5 large-centered columns">
      <h3>Edit Profile: <?php echo $userID ?></h3>
    </div>
    <!-- EDIT FIELDS -->
    <div class="large-5 large-centered columns">
      <form action="", method = "POST">
        <table role="grid">
          <tr>
            <td>Change Password:</td>
            <td><a class="button tiny" href="change_password.php">Change Password:</a></td>
          </tr>
            <td>First Name:</td>
            <td><input type="text" name="fname" value= 
              <?php if(isset($_POST['fname'])){ echo $_POST['fname'];} else { echo $fname;} ?>>
            </td>
          </tr>
          <tr>
            <td>Last Name:</td>
            <td><input type="text" name="lname" value= 
              <?php if(isset($_POST['lname'])){ echo $_POST['lname'];} else { echo $lname;} ?>>
            </td>
          </tr>
          <tr>
            <td>Address:</td>
            <td><input type="text" name="address" value= 
              <?php if(isset($_POST['address'])){ echo $_POST['address'];} else { echo $address;} ?>>
            </td>
          </tr>
          <tr>
            <td>City:</td>
            <td><input type="text" name="city" value= 
              <?php if(isset($_POST['city'])){ echo $_POST['city'];} else { echo $city;} ?>>
            </td>
          </tr>
          <tr>
            <td>State:</td>
            <td>
              <?php 
                $state = array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA',
                  'HI', 'ID', 'IL', 'IN');

                $value = '';
                if (isset($_POST['state']))
                  $value=$_POST['state'];

                menu($state, 'state', $value);
              ?>
            </td>
          </tr>
          <tr>
            <td>Zip:</td>
            <td><input type="text" name="zip" maxlength="5" value= 
              <?php if(isset($_POST['zip'])){ echo $_POST['zip'];} else { echo $zip;} ?>>
            </td>
          </tr>
          <tr>
            <td>Email:</td>
            <td><input type="text" name="email" value= 
              <?php if(isset($_POST['email'])){ echo $_POST['email'];} else { echo $email;} ?>>
            </td>
          </tr>
          <tr>
            <td>Phone(xxx-xxx-xxxx):</td>
            <td><input type="text" name="phone" value= 
              <?php if(isset($_POST['phone'])){ echo $_POST['phone'];} else { echo $phone;} ?>>
            </td>
          </tr>
          <tr>
            <td>Credit Card #:</td>
            <td><input type="text" name="credit_card" value= 
              <?php if(isset($_POST['credit_card'])){ echo $_POST['credit_card'];} else { echo $credit_card;} ?>>
            </td>
          </tr>
          <tr>
        </table>
        <div class="large-3 large-centered columns">
          <input class="button" type="submit" name="button" value="Update Profile" />
          <input type="hidden" name="productID" value="<?php echo $productID;?>"/>
        </div>  
      </form>
    </div>

	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
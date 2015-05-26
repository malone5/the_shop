<!--
	Page description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Change Password</title>
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
        if($_POST['button'] == 'Change Password') {

          // Make sure all fields are entered
          $curr_psword = $_POST['curr_psword'];
          $new_psword1 = $_POST['new_psword1'];
          $new_psword2 = $_POST['new_psword2'];
          

          // Database connection
          include("includes/dbcon.php"); // returns $dbc

          // Error array checks
          $error = array();

          //if (empty($userID)){ $error[] = "Something went wrong with your userID"; }
          if (empty($curr_psword)){ $error[] = "Please enter your current password."; }
          if (empty($new_psword1)){ $error[] = "Please enter a new password"; }
          if (empty($new_psword2)){ $error[] = "Please confirm your new password"; }
          if ($new_psword1 != $new_psword2){ $error[] = "Your confirmation passworm must match the first password."; }

          if(empty($error)){
            // Database Update
            include("includes/dbcon.php");

            $q = "SELECT * FROM user WHERE userID = '$userID'";
            $r = mysqli_query($dbc, $q);

            if ($r) {echo "";} 
            else { echo "Trouble getting password from DB";} 

            if (mysqli_num_rows($r) == 1) {
              $row = mysqli_fetch_array($r);
              $psword = $row['psword'];
            } else {
              echo "Error getting password.";
            }

            if (SHA1($curr_psword) == $psword) {
                                
              $q2 = "UPDATE user SET psword = SHA1('$new_psword1') WHERE userID = '$userID'";
              $r2 = mysqli_query($dbc, $q2);

              // Report action
              if ($r) { echo "Password Changed"; } 
              else { echo "Something went wrong when updating you profile."; }

            } else {
              echo "The current password you entered was incorrect.";
            }

          } else { // Something in error array
            foreach ($error as $msg) {
              // print the error message
              echo $msg;
              echo '<br>';
            }
          }
        } // END UPDATE    
      } // END POST


    ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">

		<div class="large-5 large-centered columns">
      <h3>Edit Password: <?php echo $userID ?></h3>
    </div>
    <!-- EDIT FIELDS -->
    <div class="large-5 large-centered columns">
      <form action="", method = "POST">
        <table role="grid">
          <tr>
            <td>Current Password:</td>
            <td><input type="password" name="curr_psword"></td>
          </tr>
            <td>New Password:</td>
            <td><input type="password" name="new_psword1">
            </td>
          </tr>
          <tr>
            <td>Confirm New Password:</td>
            <td><input type="password" name="new_psword2" value="">
            </td>
          </tr>
        </table>
        <div class="large-3 large-centered columns">
          <input class="button" type="submit" name="button" value="Change Password" />
        </div>  
      </form>
    </div>

	</div>

	<?php include("includes/footer.html");?>
</body>

</html>
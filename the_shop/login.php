<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Login</title>
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
</head>

<body>

  <!-- LOGO -->
  <div class="row">
    <div class="large-4 large-centered columns">
      <h1><img src="img/logo_400x100.png"></h1>
    </div>
  </div>

  <div class="large-4 large-centered columns" style="color: red">

    <?php
      // Session control
      session_start();
      $_SESSION = array();
      session_destroy();

      // Clear cookies
      setcookie('userID');
      setcookie('fname');

      if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Check if the login button was clicked
        if(isset($_POST['login_button'])) {
          $userID = $_POST['userID'];
          $psword = SHA1($_POST['psword']);

          // Error array
          $error = array();

          if (empty($userID)) {
            $error[] = "You forgot to enter a user name.";  
          }
          if (empty($userID)) {
            $error[] = "You forgot to enter a password.";  
          }

          // Check the error array before continuing
          if(empty($error)) {

            // Connect to the DB.
            include("includes/dbcon.php"); // returns $dbc
            // Define Query
            $q = "SELECT * FROM user WHERE userID = '$userID'";
            // Run Query
            $r = mysqli_query($dbc, $q);

            // LOG IN
            include("includes/secure_login.php");

          } else {
            foreach ($error as $msg) {
              echo $msg;
            }
          }
        }
      } // END POST


    ?>

  </div>

  <!-- MAIN PAGE CONTENT -->
  <div class="row"> 

    <div class="large-12 columns">
      <div class="row">
        <div class="large-4 large-centered columns">

          <!-- log-in pane -->
          <form acton="" method="POST">

            <table>
              <tr>
                <td>Username:</td>
                <td><input type="text" name="userID" value =""  ></td>
              </tr>
              <tr>
                <td>Password:</td>
                <td><input type="password" name="psword" value ="" /></td>
              </tr> 
            </table>

            <div class="large-4 large-centered columns">
              <input class="button" type="submit" name="login_button" value="Log in" /> 
            </div>

            <div class="large-10 large-centered columns">
              <a href="register.php">No account? Register here.</a>
            </div>


          </form>

        </div> 
      </div>
    </div>
  </div> 
  <!-- END MAIN -->


  <?php include("includes/footer.html");?>


</body>
</html>
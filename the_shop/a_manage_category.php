<!--
	Manage Category description
-->

<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Shop - Vendors Report</title>
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
    if($_SESSION['role'] != 'Admin') {
      header('LOCATION: index.php');
    }

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

  ?>

	<div>
		<?php include("includes/admin_header.html"); ?>
	</div>

	<div style="color: red">
		<?php 
      if($_SERVER['REQUEST_METHOD'] == 'POST') {


        // Make sure all fields are entered
        $category = $_POST['new_category'];
        echo $category;


        // Database connection
        include("includes/dbcon.php"); // returns $dbc

        // Error array checks
        $error = array();

        if (empty($category)){
          $error[] = "Please enter a cateogry name";
        }

        

        if (empty($error)) {
          // Define Query
          $q = "INSERT INTO categories (category) VALUES ('$category')";

          // Execute Query
          $r = mysqli_query($dbc, $q);
          // Success Check
          if ($r) {
            echo "This category was added to the system."; 
            header('LOCATION: a_manage_category.php') ;
          } else {
            echo "Something when wrong when adding the item.";
          }
        } else {
          foreach ($error as $msg) {
            echo $msg;
            echo '<br>';
          }
        }
      } // End Post
    ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">
    <div class="large-4 large-centered columns">
      <h3 class="subheader">Manage Categories</h3>
    </div>
  </div>

  <hr>

  <div class="row">
    <form action="", method = "POST">
      <div class="large-6 columns right">
        <input class="button small success" type="submit" name = "btnNewCat" value="Add Category" />
      </div> 
      <div class="large-3 columns right">
      <?php echo '<input type="text" name="new_category" maxlength="20">'; ?>
      </div>
    </form>
  </div> 

  <hr>

  <div class="row">
    <div class="large-4 large-centered large columns">
      <h3>Existing Categories</h3>
    </div>
    <div class="large-3 large-centered columns">
      
      <?php 
        // Display all categories.

        // Database
        include("includes/dbcon.php"); //returns $dbc
        $q = "SELECT * FROM categories";
        $r = mysqli_query($dbc, $q);
        $row_nums = mysqli_num_rows($r);
        $field_nums = mysqli_num_fields($r);

        // Start table
        echo "<table><tr>";
        //echo '<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-4">';
        // Print the Categories
        while($row = mysqli_fetch_array($r)) {
          

          echo "</tr>\n";
          echo '<tr>';
          echo '<td>'.($row['category']).'</td>';
          echo '<td><a href="a_remove_category.php?id='.$row['category'].'" class="button tiny alert" >Delete</td>';
          echo '</tr>';
          
          //echo '</li>';

        }
        echo '</table>';
        //echo '<ul>';

        // Success Check
        if ($r)
          echo "";
        else
          echo "Something when wrong when adding the item.";
          

      ?>
    </div>
	</div>
  


	<?php include("includes/footer.html");?>
</body>

</html>
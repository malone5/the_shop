<?php 

		// List Function
		function menu($array, $name, $value){
			echo '<select name='.$name.'>';

			foreach($array as $ar){
				echo '<option value="'.$ar.'"';
				if($ar==$value) echo 'selected == "selected"';
				echo '>'.$ar.'</option>';
			}
			echo '</select>';
		}

    // DB get array of catagories
    // Database
    include("includes/dbcon.php"); //returns $dbc
    $q_cat = "SELECT category FROM categories ORDER BY FIELD(category, 'Other')";
    $r_cat = mysqli_query($dbc, $q_cat);

    // List
    $list = array();
    while($row_cat = mysqli_fetch_array($r_cat)) {
    	array_push($list, $row_cat['category']);
    }

    $value = '';
    if (isset($_POST['selected_category']))
    	$value=$_POST['selected_category'];

    menu($list, 'selected_category', $value);

?>
<?php 

  // This veriable come from catagory_list.php
  $search_criteria = $_POST['search_criteria'];
  $search_criteria = mysql_real_escape_string($search_criteria);

  // Display all items associated with the catagory selected.
  // Database
  include("includes/dbcon.php"); //returns $dbc
  $q = "SELECT * FROM product_master WHERE item_name LIKE '%{$search_criteria}%' AND approved = 'Yes'";
  $r = mysqli_query($dbc, $q);
  $row_nums = mysqli_num_rows($r);
  $field_nums = mysqli_num_fields($r);

  // Start table
  echo "<table><tr>";

  // Print table headers.
  echo "<td> <b>Item</b> </td>";
  echo "<td> <b>Catagory</b> </td>";
  echo "<td> <b>Image</b> </td>";
  echo "<td> <b>Price</b> </td>";
  echo "<td> <b>Discount</b> </td>";
  echo "<td> <b>Total Price</b> </td>";
  echo "<td> <b>View Product Details</b> </td>";
              

  echo "</tr>\n";

  // Print the products
  while($row = mysqli_fetch_array($r)) {
    $price = $row['price'];
    $discount = $row['discount_amt'];
    $final_price = $price - $discount;
    $final_price = sprintf('%0.2f', $final_price);

    echo '<tr>';

    echo '<td>'.($row['item_name']).'</td>';
    echo '<td>'.($row['category']).'</td>';
    echo '<td>  <a class="th" role="button" aria-label="Thumbnail" href="'.($row['image_url']).'">
                <img aria-hidden=true src="'.($row['image_url']).'"/>
                </a></td>';
    echo '<td>$'.($row['price']).'</td>';
    echo '<td>$-'.($row['discount_amt']).'</td>';
    echo '<td>$'.$final_price.'</td>';
    echo '<td> <a href="view_item_details.php?id='.($row['productID']).'">View Details / Add2Cart</a> </td>';

  }

  // Success Check
  if ($r)
    echo "";
  else
    echo "Something when wrong when adding the item.";
    echo '</tr>';
    echo '</table>';

?>
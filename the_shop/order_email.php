<?php 

	function generateRandomPass($length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
		  $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
	}

	$error = array();

	if(empty($userID)) {
		$error[] = "You forgot to enter your username.";
	}

	if(empty($error))  {
		
		include("includes/dbcon.php");
		$q = "SELECT * FROM user WHERE userID = '$userID'";						
		$r = mysqli_query($dbc, $q);	
		
		$row1 = mysqli_fetch_array($r);
		$email = $row1['email'];


		$main_msg = "Thank you for shopping at The Shop! Your order is now being processed.
								 Below are the details of your order. 
								 You may view the status of your order through our website! 
								 Order canceling is only available before shipping.\n\n";
								
		
		$order_list = "";
		

		$q2 = "SELECT * FROM carts WHERE userID = '$userID'";						
		$r2 = mysqli_query($dbc, $q2);	

		while($row2 = mysqli_fetch_array($r2)){

			$item = "Item: ".$row2['item_name']."	Price: $".$row2['price']."";

      $order_list .= $item."\n";
		}

		$main_msg .= $order_list;
		$main_msg = wordwrap($msg,70);
		
		// send email
		mail($email,"Your order from THe Shop is being processed.",$main_msg);

		// alert user
		echo 'An email has been sent to '.$email.' with your order information.';

	}else{
		echo "That user does not exist.";	
	}
?>
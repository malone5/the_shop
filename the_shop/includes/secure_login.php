<?php
if (mysqli_num_rows($r) == 1){ //returns number of rows in a result set
	//array name in sqli is row
	$row = mysqli_fetch_array($r); //fetches query result as an array
	$attempt_count = $row['login_attempts'];
	$last_try = $row['last_try'];

	//timezone set( my clocks were out of sync )
	date_default_timezone_set("America/New_York"); 
	// last try - current time
	$time_diff = abs(strtotime($last_try) - strtotime(date('Y-m-d H:i:s')));
	$block_time = 30; //30 seconds for test purposes

	//if time_diff has exceded the block time, the account is no longer blocked. and the counter is reset
	if ($time_diff > $block_time) {
		$attempt_count = 0;
	}
	
	if ($attempt_count < 3) {
		//if passwords match
		if ($row['psword'] == $psword) {
			echo "This user is valid.";

			if ($row['role'] == 'Vendor' && $row['approved'] == 'No' ) {

        echo "Your Vendor account must be approved before logging in.\n";
      } else { // Start a session

      	//reset the user login attempts to 0
				$q = "UPDATE user SET login_attempts=0, last_login=now() WHERE userID = '$userID'";
				// perform a query against the database
				$r = mysqli_query($dbc, $q);
				if ($r) { 
					echo "Succesful login to the DB"; 
					session_start();
	        $_SESSION['userID'] = $userID;
	        $_SESSION['fname'] = $row['fname'];

	        // Set cookie time
	        setcookie('userID', $userID, time()+3600); //1 hour session

	        // Check the type of user and direct them to the proper page.
	        if($row['role'] == 'Admin') {
	          $_SESSION['role'] = 'Admin';
	          header('LOCATION: a_home.php');
	        } elseif ($row['role'] == 'Vendor') {
	          $_SESSION['role'] = 'Vendor';
	          header('LOCATION: v_home.php');
	        } elseif ($row['role'] == 'Customer') {
	          $_SESSION['role'] = 'Customer';
	          header('LOCATION: c_home.php');
	        } else {
	          header('LOCATION: login.php');
	        }
				} else { 
					echo "Not connected, something went wrong resetting the login attempts."; 
				}
      }	     		
		} else { //if pass is wrong
			//add to count 
			$attempt_count = $attempt_count + 1;

			echo "You entered the wrong password.<br>";
			//add to the users attempt_count
			$q = "UPDATE user SET login_attempts='$attempt_count', last_try=now() WHERE userID='$userID'";

			// exec query
			$r = mysqli_query($dbc, $q);
			if ($r == true && $attempt_count == 3){ echo "You have reached 3 failed login attempt, you account is not temporarily frozen."; }
			elseif ($r) {  echo "Failed attempt. You now have ".(3-$attempt_count)." attempt(s) left."; }
			else { echo "Not connected, something went wrong."; }
		}
	} else { // if count >= 3, freeze the account.
		echo "Too many failed attempts. Time till you can try again: 
		".gmdate("i:s", ($block_time-$time_diff))." minutes (min:sec).";
	}

}else{
	echo "Wrong username";
}
?>
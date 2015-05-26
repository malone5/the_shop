<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>The Shop - Register</title>
	<link rel="stylesheet" href="css/foundation.css" />
	<script src="js/vendor/modernizr.js"></script>
</head>

<body>


	<div>
		<?php include("includes/header.html"); ?>
	</div>

	<div class="large-8 large-centered columns" >
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


			// Register Submit

			if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//make sure all fields are entered
			$userID = $_POST['userID'];
			$psword = $_POST['psword'];
			$psword2 = $_POST['psword2'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$address = $_POST['address'];
			$city = $_POST['city'];
			$state = $_POST['state'];
			$zip = $_POST['zip'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$credit_card = $_POST['credit_card'];
			$role = $_POST['role'];
			$approved = 'No';

			//Password must be the same
			if ($psword == $psword2) {

				include("includes/dbcon.php");			
				//define a query	
				//SHA1('$psword'),	
				$q = "INSERT INTO user (userID, 
																 psword, 
																 fname, 
																 lname,
																 address,
																 city,
																 state,
																 zip,
																 email,
																 phone,
																 credit_card,
																 role,
																 approved) VALUES 
																('$userID',
																 SHA1('$psword'),
																 '$fname', 
																 '$lname',
																 '$address',
																 '$city',
																 '$state',
																 '$zip',
																 '$email',
																 '$phone',
																 '$credit_card',
																 '$role',
																 '$approved')";

				//execute the query
				$r = mysqli_query($dbc, $q);
				if ($r) { 
					echo "Your account has been created.";
					//header("LOCATION: login.php");
			  } else { 
			  	echo "Something is wrong with the system, or the desired username already exists."; 
			  }
			} else {
				echo "Passwords do not match.";
			}			
		}


		 ?>
	</div>

	<!-- MAIN PAGE CONTENT -->
	<div class="row">

		<div class="large-3 large-centered columns">
			<h1>Register</h1>
		</div>
		<!-- Register Fields -->
		<div class="large-5 large-centered columns">
			<form action="", method = "POST">
				<table role="grid">
					<tr>
						<td>Username:</td>
						<td><input type="text" name="userID" value= 
							<?php if (isset($_POST['userID'])) echo $_POST['userID']?>>
						</td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="psword"</td>
					</tr>
					<tr>
						<td>Confirm Password:</td>
						<td><input type="password" name="psword2"</td>
					</tr>
					<tr>
						<td>First Name:</td>
						<td><input type="text" name="fname" value= 
							<?php if (isset($_POST['fname'])) echo $_POST['fname']?>>
						</td>
					</tr>
					<tr>
						<td>Last Name:</td>
						<td><input type="text" name="lname" value= 
							<?php if (isset($_POST['lname'])) echo $_POST['lname']?>>
						</td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><input type="text" name="address" value= 
							<?php if (isset($_POST['address'])) echo $_POST['address']?>>
						</td>
					</tr>
					<tr>
						<td>City:</td>
						<td><input type="text" name="city" value= 
							<?php if (isset($_POST['city'])) echo $_POST['city']?>>
						</td>
					</tr>
					<tr>
						<td>State:</td>
						<td>
							<?php 
								$state = array('AL', 'AK', 'AZ', 'AR', 'CA', 'CO', 'CT', 'DE', 'FL', 'GA',
									'HI', 'ID', 'IL', 'IN', 'IA', 'KS', 'KY', 'LA', 'ME', 'MD', 'MA', 'MS', 'MO', 
									'MT', 'NE', 'NV', 'NH', 'NJ', 'NM', 'NY', 'NC', 'ND', 'OH', 'OK', 'OR', 'PA',
									'RI', 'SC', 'SD', 'TN', 'TX', 'UT', 'VT', 'VA', 'WA', 'WV', 'WI', 'WY');

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
							<?php if (isset($_POST['zip'])) echo $_POST['zip']?>>
						</td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type="text" name="email" value= 
							<?php if (isset($_POST['email'])) echo $_POST['email']?>>
						</td>
					</tr>
					<tr>
						<td>Phone(xxx-xxx-xxxx):</td>
						<td><input type="text" name="phone" maxlength="12" value= 
							<?php if (isset($_POST['phone'])) echo $_POST['phone']?>>
						</td>
					</tr>
					<tr>
            <td>Credit Card #:</td>
            <td><input type="text" name="credit_card" maxlength="16" value= 
              <?php if (isset($_POST['credit_card'])) echo $_POST['credit_card']?>>
            </td>
          </tr>
					<tr>
						<td>Role:</td>
						<td>
							<?php 
								$role = array('Customer', 'Vendor');

								$value = '';
								if (isset($_POST['role']))
									$value=$_POST['role'];

								menu($role, 'role', $value);
							?>
					</tr>
				</table>
				<div class="large-3 large-centered columns">
					<input class="button" type="submit" name = "btnRegister" value="Register" />
				</div>	
			</form>
		</div>

	</div>
	
	<div>
		<?php include("includes/footer.html");?>
	</div>
	
</body>

</html>
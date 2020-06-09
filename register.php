<!--
Register Page
-->

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/sijoCss.css">
	<script>

		function showMessage(message,el)
		{	var myId= el.name;
			document.getElementById(myId).innerHTML=message;
			document.getElementById(myId).style.visibility="visible";
		}

		function hideMessage(el)
		{
			//console.log(el.name)
			document.getElementById(el.name).style.visibility="hidden";
		}

	</script>
</head>
<body>
	<?php
		$userErr=$passErr=$cPassErr=$CustFirstNameErr=$CustLastNameErr=$addErr=$CustCityErr=$CustPostalErr='';
		if (isset($_POST['submit']))
		{
			$inputs=array(
				'username'=>'userErr',
				'password'=>'passErr',
				'cPassword'=>'cPassErr',
				'CustFirstName'=>'CustFirstNameErr',
				'CustLastName' => 'CustLastNameErr',
				'CustAddress' => 'addErr',
				'CustCity' =>'CustCityErr',
				'CustPostal' => 'CustPostalErr'
				);
			$goodToGo = true;
			foreach ($inputs as $name => $err)
			{
				if (empty($_POST[$name]))
				{
					$$err = "*empty";
					$goodToGo =false;
				}
			}
			if (!empty($_POST['CustPostal']))
			{
				$reg = "/^[A-Za-z]\d[A-Za-z] ?\d[A-Za-z]\d$/";
				if(!preg_match($reg,trim($_POST['CustPostal'])))
				{
					$CustPostalErr = 'Postal Code pattern is wrong';
					$goodToGo =false;
				}
			}
			if (!empty($_POST['password'])&&!empty($_POST['cPassword']))
			{
				if ($_POST['password']!=$_POST['cPassword'])
				{
					$cPassErr ='Passwords do not match';
					$goodToGo=false;
				}
			}
		}
		?>
		<?php include "php/header.php"?>

<!-- Username and Passwor Form -->
<section>
	<div class="card" style="background-color: skyblue;">
		<div class="row" style="height: 2rem;"></div>
		<div class="row">
			<div class="col-sm-1"></div>
			<div class="col-sm-9">
    	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST" id="register_form" >
				<fieldset>
					<legend class='text-white'>User Name and Password</legend>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register" >Username:</span>
           						</div>
            						<input type="text" class="form-control" name="Username"  onfocus="showMessage('Maximum Length:15',this)" maxlength="15" value="<?php if(isset($_POST['username'])) echo $_POST['username']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='username' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $userErr; ?></span>

					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class=" label input-group-text span-width-register" >Password:</span>
           						</div>
            						<input type="password" class="form-control" name="Password"  onfocus="showMessage('Maximum Length:15',this)" maxlength="15" >
          					</div>
						</div>
						<div class='col-sm-6' id='password' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $passErr; ?></span>

					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register" >Confirm Password:</span>
           						</div>
            						<input type="password" class="form-control" name="cPassword"  onfocus="showMessage('This should match the password',this)" maxlength="15">
          					</div>
						</div>
						<div class='col-sm-6' id='cPassword' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $cPassErr; ?></span>
				</fieldset>

				<!-- Personal Information Fields -->
				<fieldset>
					<legend class="text-white"> Personal Information </legend>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">First name:</span>
           						</div>
            						<input type="text" class="form-control" placeholder="John" name="CustFirstName" onfocus="showMessage('Please ignore middle name',this)" maxlength="20" value="<?php if(isset($_POST['CustFirstName'])) echo $_POST['CustFirstName']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='CustFirstName' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $CustFirstNameErr; ?></span>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">Last name:</span>
           						</div>
            						<input type="text" class="form-control" placeholder="Doe" name="CustLastName" maxlength="20" value="<?php if(isset($_POST['CustLastName'])) echo $_POST['CustLastName']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='CustLastName' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $CustLastNameErr; ?></span>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">Address:</span>
           						</div>
            						<input type="text" class="form-control" placeholder="3675 32th Avenue SW" name="CustAddress" onfocus="showMessage('Street Address before city',this)" value="<?php if(isset($_POST['CustAddress'])) echo $_POST['CustAddress']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='CustAddress' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $addErr; ?></span>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">City:</span>
           						</div>
            						<input type="text" class="form-control" placeholder="Calgary" name="CustCity" value="<?php if(isset($_POST['CustCity'])) echo $_POST['CustCity']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='CustCity' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $CustCityErr; ?></span>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">Province:</span>
           						</div>

            					<select class='form-control' name="CustProv"  onfocus="showMessage('If your Province is not on the list, please select Else',this)" >
									<option value="ab">Alberta</option>
									<option value="bc">British Columbia</option>
									<option value="mb">Manitoba</option>
									<option value="on">Ontario</option>
									<option value="sk">Saskatchewan</option>
									<option value="qc">Quebec</option>
									<option value="nb">New Brunswick</option>
									<option value="ns">Nova Scotia</option>
									<option value="nl">Newfoundland</option>
									<option value="else">Else</option>
								</select>
							</div>
						</div>
						<div class='col-sm-6' id='CustProv' style='visibility: hidden'></div>
					</div>


					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
											<div class="input-group-prepend">
													<span class="input-group-text span-width-register">Postal Code:</span>
											</div>
												<input type="text" class="form-control" placeholder="Postal Code" name="CustPostal" onfocus="showMessage('Must match the pattern: T2J 3V4',this)" maxlength="7" value="<?php if(isset($_POST['CustPostal'])) echo $_POST['CustPostal']; ?>">
										</div>
						</div>
						<div class='col-sm-6' id='CustPostal' style='visibility: hidden'></div>
					</div>

					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">Home Phone Number:</span>
           						</div>
            						<input type="text" class="form-control" placeholder="Home Phone Number" name="CustHomePhone" onfocus="showMessage('Must match the pattern: 403 403 4444',this)" maxlength="12" value="<?php if(isset($_POST['CustHomePhone'])) echo $_POST['CustHomePhone']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='CustHomePhone' style='visibility: hidden'></div>
					</div>
					<div class='row row-buffer'>
						<div class='col-sm-6'>
							<div class="input-group">
           						<div class="input-group-prepend">
              						<span class="input-group-text span-width-register">Business Phone Number:</span>
           						</div>
            						<input type="text" class="form-control" placeholder="Business Phone Number" name="CustBusPhone" onfocus="showMessage('Must match the pattern: 403 123 1234',this)" maxlength="10" value="<?php if(isset($_POST['CustBusPhone'])) echo $_POST['CustBusPhone']; ?>">
          					</div>
						</div>
						<div class='col-sm-6' id='CustBusPhone' style='visibility: hidden'></div>
					</div>
						<div class='row row-buffer'>
							<div class='col-sm-6'>
								<div class="input-group">
	           						<div class="input-group-prepend">
	              						<span class="input-group-text span-width-register">Email:</span>
	           						</div>
	            						<input type="text" class="form-control" placeholder="Email" name="CustEmail" onfocus="showMessage('Must match the pattern: example@email.com',this)" maxlength="30" value="<?php if(isset($_POST['CustEmail'])) echo $_POST['CustEmail']; ?>">
	          					</div>
							</div>
							<div class='col-sm-6' id='CustEmail' style='visibility: hidden'></div>
					</div>
					<span class='text-danger'><?php echo $CustPostalErr; ?></span>
				</fieldset>


				<!-- submit and reset buttons -->
				<div class='row row-buffer'>
					<div class='col-sm-6' style='text-align:center'>
						<button class='btn btn-success' type="submit" name='submit' value="Submit" > Send </button>
						<button class='btn btn-primary' type="reset" value="Reset" onclick="return confirm('Do you want to reset?')">Reset</button>
					</div>
					<div class='col-sm-6'>

						<?php

						require_once("php/customerRegister.php");

					if(isset($_POST["submit"])){
							customerRegister();
						}
						// }

							// echo "
							// <div class='alert alert-success alert-dismissible fade show'>
			  			// 		<button type='button' class='close' data-dismiss='alert'>&times;</button>
			  			// 			<strong>Success:</strong> Your request has been processed.
			  			// 	</div>";

							// else echo "
							// <div class='alert alert-danger alert-dismissible fade show'>
			  			// 		<button type='button' class='close' data-dismiss='alert'>&times;</button>
			  			// 			<strong>Failed:</strong> Your request cannot be processed.
			  			// 	</div>";


			  			?>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-2"></div>
	</div>
	</div>
</div>
</section>
		<?php include "php/footer.php"?>
	<script type="text/javascript">
			var register_array=document.getElementById("register_form").elements;
				for (i=0;i<register_array.length; i++)
				{	var el=register_array[i];
					if (el.tagName=='INPUT' || el.tagName=='SELECT')
						el.setAttribute('onblur', "hideMessage(this)");
				}
	</script>


	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>

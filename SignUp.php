<?php 
	include 'dbConnect.php';  // include or require
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign-Up Page</title>

	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="SignUp.css">	
	  
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.1.3-dist/jquery-3.1.1.min.js"></script>
</head>

<body>
	<div class="container" style="width:800px; margin-top: 80px; margin-bottom: 80px;">
		<div class="card"><center>
			<h4 class="card-header">STUDENT SIGN UP</h4></center>

			<div class="card-body">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

					<center><img src="JUPEB.png" width="100px"></center><p><p><p>

					<div class="input-group mb-3">
						<div class="input-group-prepend">
		    				<span class="input-group-text">Full Name: </span>
		  				</div>

		  				<input name="fullname" type="text" class="form-control" placeholder="Last Name, First Name" aria-describedby="basic-addon2" maxlength="50" required>
					</div>


					<div class="input-group mb-3">
						<div class="input-group-prepend">
		    				<span class="input-group-text">Email: </span>
		  				</div>

		  				<input name="email" type="text" class="form-control" placeholder="Enter Email" aria-describedby="basic-addon2" maxlength="50" required>
					</div>
					

					<div class="input-group mb-3">
						<div class="input-group-prepend">
		    				<span class="input-group-text">First Choice University: </span>
		  				</div>

		  				<input name="firstchoice" type="text" class="form-control" placeholder="Enter your First Choice University" aria-describedby="basic-addon2" maxlength="50" required>
					</div>


					<div class="input-group mb-3">
						<div class="input-group-prepend">
		    				<span class="input-group-text">Second Choice University: </span>
		  				</div>

		  				<input name="secondchoice" type="text" class="form-control" placeholder="Enter your Second Choice University" aria-describedby="basic-addon2" maxlength="50" required>
					</div>


					<div class="input-group mb-3">
						<div class="input-group-prepend">
		    				<span class="input-group-text">College of Education/Polytechnic: </span>
		  				</div>

		  				<input name="polytechnic" type="text" class="form-control" placeholder="Enter Preferred College of Education/Polytechnic" aria-describedby="basic-addon2" maxlength="50">
					</div>


					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="basic-addon3">Password</span>
		  				</div>
		  			
		  				<input name="password" type="password" class="form-control" id="myInput" aria-describedby="basic-addon3" placeholder="Enter Password." maxlength="50" required>	
					</div>


					<div class="d-flex justify-content-left">  <!-- this div justifies and centers  -->
						<div class="custom-control custom-checkbox">
			                <input type="checkbox" onclick="showPass()" class="custom-control-input" id="cbox1" style="margin-left: 10px;">   <!-- margin left not working -->
			                <label class="custom-control-label" for="cbox1">Show Password</label>
			            </div>
		        	</div>

		        	<p><p>
		        	<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="basic-addon3">Confirm Password</span>
		  				</div>
		  			
		  				<input name="confirmpassword" type="password" class="form-control" aria-describedby="basic-addon3" placeholder="Confirm Password." maxlength="50" required>
					</div>

					  	<p><p>


					<div class="row-4">
					  	<center><button class="btn btn-outline-info btn-primary btn-rounded my-4 waves-effect z-depth-0" type="submit" name="submit">Sign Up</button></center>  
					  	<!-- add (btn-block) to make the button longer -->
					</div>

					  	<p><p><center>Click to go to <a href="login.php">Login Page</a></center></p></p>
				</form>


				<!-- javascript for checkbox to show password  -->
				<script>
					function showPass(){
			  			var x = document.getElementById("myInput");
			  			if (x.type === "password") {  
			  				//typeof(x) is the same as x.type
			    			x.type = "text";
			  			}else{
			   				 x.type = "password";
			  			}
					}
				</script>

				
			</div>
		</div>

		<footer>
			<div class="container">
				<center>Copyright &copy; 2020 JUPEB TEST EXAM</center>
			</div>
		</footer>
	</div>
</body>
</html>

<?php 

if(isset($_POST['submit'])){
	$FullName = $_POST["fullname"];
	$Email = $_POST["email"];
	$FirstChoice = $_POST["firstchoice"];
	$SecondChoice = $_POST["secondchoice"];
	$Polytechnic = $_POST["polytechnic"];
	$Password = $_POST["password"];
	$ConfirmPassword = $_POST["confirmpassword"];


	if(!empty($FullName) && !empty($FirstChoice)){
		if(!empty($SecondChoice) && !empty($Password)){
		
			// connection created in dbConnect.php

			if(mysqli_connect_error()){
				die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
			}else{
				if(!empty($Email)){

					//Check if already in DB, then tell them to login instead.
					$sql = "SELECT full_name, e_mail FROM users WHERE e_mail= '$Email' ";
						
          $query = $conn->query($sql); // = mysqli_query($conn, $sql);

     			if($query->num_rows > 0){		//mysqli_num_row($query) > 0     				
     				echo "<script type='text/javascript'>alert('You already signed up, Please Login'); window.location='login.php';</script>";	
     			}else{
			     	//if not in DB, insert into DB
			     	date_default_timezone_set("Europe/London"); // GMT
     				$date = date("Y:m:d");  //("Y:m:d H:i:s")    current date & time

						$sql2 = "INSERT INTO users (full_name, e_mail, first_choice, second_choice, polytechnic_college, password, confirm_password, date_created) values ('$FullName', '$Email', '$FirstChoice', '$SecondChoice', '$Polytechnic', '$Password', '$ConfirmPassword', '$date')";

						if($conn->query($sql2)){  // mysqli_query($conn, $sql2);
							echo "<script type='text/javascript'>alert('Successfully registered your account'); window.location='login.php';</script>";
						}else{
							echo "Error: ". $sql2 ."<br>". $conn->error;
						}
						$conn->close();
					}
		   	}
			}
		}else{
			echo "<script type='text/javascript'>alert('Either Second Choice University/Password is empty'); window.location='index.html';</script>";
		}
	}else{
		echo "<script type='text/javascript'>alert('Either Full name/First Choice University is empty'); window.location='index.html'; </script>";	
	}  	

}

?>
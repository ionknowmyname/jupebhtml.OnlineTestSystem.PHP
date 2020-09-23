<?php 
	include 'dbConnect.php';  // include or require
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>

	<link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="index.css">
	<link rel="stylesheet" href="login.css">	
	  
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
    <script src="bootstrap-4.1.3-dist/jquery-3.1.1.min.js"></script>
</head>

<body>
	<div class="container" style="width:650px; margin-top: 80px; margin-bottom: 80px;">
		<div class="card"><center>
			<h4 class="card-header">STUDENT LOGIN</h4></center>

			<div class="card-body">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

					<center><img src="JUPEB.png" width="100px"></center><p><p><p>


					<div class="input-group mb-3">
						<div class="input-group-prepend">
		    				<span class="input-group-text">Email: </span>
		  				</div>

		  				<input name="email" type="text" class="form-control" placeholder="Enter Email" aria-describedby="basic-addon2" maxlength="50" required>
					</div>


					<div class="input-group mb-3">
		  				<div class="input-group-prepend">
		    				<span class="input-group-text" id="basic-addon3">Password</span>
		  				</div>
		  			
		  				<input name="password" type="password" class="form-control" id="myInput" aria-describedby="basic-addon3" placeholder="Enter Password." maxlength="50" required>	
					</div>


					<div class="d-flex justify-content-left">  <!-- this div justifies and centers  -->
						<div class="custom-control custom-checkbox">
			                <input type="checkbox" onclick="showPass()" class="custom-control-input" id="cbox1">
			                <label class="custom-control-label" for="cbox1">Show Password</label>
			            </div>
		        	</div>


					  	<p><p><p>


					<div class="row-4">
						<center><button name="submit" type="submit" class="btn btn-primary submit">Login</button></center> 	
					</div>

					  	<p><p><center>Click to go to <a href="SignUp.php">Sign Up Page</a></center></p></p>
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
		$Email = $_POST["email"];
		$Password = $_POST["password"];


		if(!empty($Email) && !empty($Password)){

			// connection created in dbConnect.php

			// OR if($conn->connect_error){}
			if(mysqli_connect_error()){
				// OR die("CONNECTION NOT GRANTED" .$conn->connect_error);
				die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
			}else{
				$sql = "SELECT full_name, e_mail, password FROM users WHERE e_mail='$Email' and password='$Password' ";
				
	      $query = $conn->query($sql); // = mysqli_query($conn, $sql);

	 			if($query->num_rows > 0){  // //mysqli_num_row($query) > 0  
	 				while ($row = $query->fetch_assoc()) {  // ($row = mysqli_fetch_assoc($query))
	 					//echo "Email Login: " .$row['e_mail'];
						$_SESSION['email'] = $Email;    //  $row['staffLogin']; 
	 					header('Location:chooseCourses.php');
	 				}
	 				// $conn->close();
	 			}else{
	 				echo "<script type='text/javascript'>alert('Wrong Email or Password'); window.location='login.php'; </script>";
	 			} 
			}
		}else{
			echo "<script type='text/javascript'>alert('Email or Password is empty. Click on Sign Up to create an account'); window.location='SignUp.php'; </script>";
		}
	}

?>
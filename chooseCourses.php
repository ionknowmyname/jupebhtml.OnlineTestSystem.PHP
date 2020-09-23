<?php 
  session_start();
  if(!isset($_SESSION['email'])){
  	echo "<script type='text/javascript'>window.location='login.php';</script>";
  }  
?>

<?php
  include 'dbConnect.php';
  include 'header.php';
?>



<!-- main content starts -->


	<div class="container" style="width:400px; margin-top: 20px; margin-bottom: 80px;">
		<div class="card"><center>
			<h4 class="card-header">CHOOSE EXAM TO START</h4></center>

			<div class="card-body">
	
	    	<?php 

	    		$sql = "SELECT * FROM `courses`";
	    		$query = mysqli_query($conn, $sql); //  $conn->query($sql);

	    		while ($row = mysqli_fetch_array($query)){ //$query->fetch_assoc()
    				?>
    					<input type="button" id="<?php echo $row["course_id"] ?>" class="btn btn-success form-control" value="<?php echo $row["course_name"] ?>" style="margin-top: 15px; background-color: blue; color: white; font-size: 15px;" onclick="setExamTypeSession(this.value)">;    <!-- this.value -->
    						<!-- onclick="setExamTypeSession('<?php /*echo $row["course_name"] */ ?>')" -->   
						<?php
					}

				?>		
			</div>
		</div>
	</div>


<!--  main content ends -->


<?php  
  include 'footer.php';
?>



<script type="text/javascript">
	//var button1 = document.getElementById('<?php/* echo $row["course_id"] */ ?>'); //document.getElementsByClassName('btn btn-success form-control');
	
	//button1.addEventListener('click', function(){
		//var output = "<?php /* echo $row['course_name']; */ ?>";
		//var output2 = button1.value;
		//var output3 = "<?php /* $row['course_name']; */?>";
		//alert(output2);
		//window.location = "exam.php";

		/*var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = funtion(){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      	alert(xmlhttp.responseText);
        window.location = "exam.php";
      }
    };
    xmlhttp.open("GET", "setExamType_session.php?exam_category="+ output, true);
    xmlhttp.send(null);*/

	//});

	function setExamTypeSession(exam_category){
		alert(exam_category); 

		var xmlhttp = new XMLHttpRequest();


		


		xmlhttp.open("GET", "setExamType_session.php?exam_category="+ exam_category, false);
		xmlhttp.send(null);
		alert(xmlhttp.responseText);

		/*
		var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = funtion(){
      if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
      	alert(xmlhttp.responseText);
        window.location = "exam.php";
      }
    };
    xmlhttp.open("GET", "setExamType_session.php?exam_category="+ exam_category, true);
    xmlhttp.send(null);*/
	}

</script>

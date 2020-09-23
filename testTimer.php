<?php 
	session_start();
  //include 'dbConnect.php';
 

  $conn = mysqli_connect('localhost','root','','jupebhtmldb');

  $duration ="";

  $sql = "SELECT * FROM `table1`";
  $query = $conn->query($sql);

 // echo "<script type='text/javascript'>alert('making sure Im connecting to the DB);</script>";
	

	while ($row = mysqli_fetch_array($query)){ // fetch assoc
		$duration = $row["duration"];
	}

	$_SESSION["duration"] = $duration;
	$_SESSION["start_time"] = date("Y:m:d H:i:s");

	$end_time = date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes', strtotime($_SESSION["start_time"])));

	$_SESSION["end_time"] = $end_time;

?>

<script type="text/javascript">
//	alert('making sure Im connecting totheDB);                                                               
	window.location = "testTimer2.php";
</script>
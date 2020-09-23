<?php
	session_start();
  include 'dbConnect.php';
  $exam_category = $_GET["exam_category"];
  $_SESSION["exam_category"] = $exam_category;

  $sql = "SELECT * FROM courses WHERE course_name = '$exam_category'";
  $query = mysqli_query($conn, $sql);



  while($row = mysqli_fetch_array($query)){
		$_SESSION["exam_time"] = $row["exam_time_minutes"];
	}	


	$date = date("Y-m-d H:i:s");    //current time
	$date2 = $_SESSION["exam_time"];  //exam time from DB

	//$date2 = date("Y-m-d H:i:s", strtotime($_SESSION["exam_time"];)); // exam time from DB converted to date form,
	$date3 = strtotime($date."+$_SESSION['exam_time'] minutes");   //query from browser

	//$date3 = strtotime('+'.$date2.'minutes', $date);  //"+$date2 minutes"
	$date3 = date("Y-m-d H:i:s", $date3);
	$_SESSION["end_time"] = $date3;

	// $_SESSION["end_time"] = date("Y-m-d H:i:s", strtotime($date. "+$date2 minutes"));
	// $date3 = $_SESSION["end_time"]  //time exam ends  


	$_SESSION["exam_start"] = "yes";
?>


<!-- strtotime($date."+$_SESSION['exam_time'] minutes") -->   <!-- line 18 -->
<?php 
  include 'dbConnect.php';
  include 'header.php';
?>


  
      

  <!-- main content starts -->

  <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;"></div>

  </div>

 <!--  main content ends -->



<?php  
  include 'footer.php';
?>











<?php
include 'dbConnect.php';
$fetchqry = "SELECT * FROM `quiz`";
$result=mysqli_query($con,$fetchqry);
$num=mysqli_num_rows($result);
$i=1;
for($i;$i<=$num;$i++){
  @$userselected = $_POST[$i];
  $fetchqry2 = "UPDATE `quiz` SET `userans`='$userselected' WHERE `id`=$i"; 
  mysqli_query($con,$fetchqry2);
} 
$qry3 = "SELECT `ans`, `userans` FROM `quiz`;";
$result3 = mysqli_query($con,$qry3);
while ($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)) {
    if($row3['ans']==$row3['userans']){
	 @$_SESSION['score'] += 1 ;
 }
}
 
 ?> 
 <div class="col-md-offset-2 col-md-8">
<h2>Result:</h2><br><br>
 <span><b>No. of Correct Answer:</b>&nbsp;<?php  echo $no = @$_SESSION['score']; 
											//var_dump($_SESSION['ids']);
 //session_unset(); ?></span><br><br>
 <span><b>Your Score:</b>&nbsp<?php if(isset($no)) echo $no*2; ?></span>
</div>

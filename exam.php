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

  <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

    <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;"></div>

  </div>

 <!--  main content ends -->



<?php  
  include 'footer.php';
?>










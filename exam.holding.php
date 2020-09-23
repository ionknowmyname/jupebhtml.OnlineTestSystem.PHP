<head>
    <title>Technopoints Quiz</title>
    </head>

    <body onload="hidder();">
    <center>
    <div class="time" id="navbar">Time left :<span id="timer"></span></div>
    <button class="button" id="mybut" onclick="myFunction()">START QUIZ</button>
    </center>
    <div id="myDIV" style="padding: 10px 30px;">
    <form action="result.php" method="post" id="form">  				
    <table><?php   $fetchqry = "SELECT * FROM `quiz`";
    				$result=mysqli_query($con,$fetchqry);
    				$num=mysqli_num_rows($result);
    				
    			   while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
    		  ?>
      <tr><td><h3><br><?php echo @$snr +=1;?>&nbsp;-&nbsp;<?php echo @$row['que'];?></h3></td></tr>
      <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;a )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 1'];?>">&nbsp;<?php echo $row['option 1']; ?><br>
      <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;b )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 2'];?>">&nbsp;<?php echo $row['option 2'];?></td></tr>
      <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;c )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 3'];?>">&nbsp;<?php echo $row['option 3']; ?></td></tr>
      <tr><td>&nbsp;&nbsp;&nbsp;&nbsp;d )&nbsp;&nbsp;&nbsp;<input required type="radio" name="<?php echo $snr;?>" value="<?php echo $row['option 4'];?>">&nbsp;<?php echo $row['option 4']; ?><br><br><br></td></tr>
    			    <?php  }
    																	?> 
    		<tr><td align="center"><button class="button3" name="click" >Submit Quiz</button></td></tr>
    	</table>
      </form>
    </div>
    <script>
    function myFunction() {
    	var x = document.getElementById("myDIV");
        var b = document.getElementById("mybut");
        var x = document.getElementById("myDIV");
    	if (x.style.display === "none") { 
    	b.style.visibility = 'hidden';
    	x.style.display = "block";
    	startTimer();
    }
    }
    window.onload = function() {
      document.getElementById('myDIV').style.display = 'none';
    };
    </script>
    <?php			$fetchtime = "SELECT `timer` FROM `quiz` WHERE id=1";
    				$fetched = mysqli_query($con,$fetchtime);
    				$time = mysqli_fetch_array($fetched,MYSQLI_ASSOC);
    				$settime = $time['timer'];		
    						?>
     <script type="text/javascript">

    document.getElementById('timer').innerHTML = '<?php echo $settime; ?>';
      //03 + ":" + 00 ;


    function startTimer() {
      var presentTime = document.getElementById('timer').innerHTML;
      var timeArray = presentTime.split(/[:]+/);
      var m = timeArray[0];
      var s = checkSecond((timeArray[1] - 1));
      if(s==59){m=m-1}
      if(m==0 && s==0){document.getElementById("form").submit();}
      document.getElementById('timer').innerHTML =
        m + ":" + s;
      setTimeout(startTimer, 1000);
    }

    function checkSecond(sec) {
      if (sec < 10 && sec >= 0) {sec = "0" + sec}; // add zero in front of numbers < 10
      if (sec < 0) {sec = "59"};
      return sec;
      if(sec == 0 && m == 0){ alert('stop it')};
    }
    </script>

    <script>
    window.onscroll = function() {myFun()};

    var navbar = document.getElementById("navbar");
    var sticky = navbar.offsetTop -50;

    function myFun() {
      if (window.pageYOffset >= sticky) {
        navbar.classList.add("sticky")
      } else {
        navbar.classList.remove("sticky");
      }
    }
    </script>


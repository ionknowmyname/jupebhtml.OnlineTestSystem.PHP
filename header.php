<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>JUPEB EXAM</title>
  <meta name="description" content="Simple Online Quiz">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="Faithful Olaleru"> 


  <link rel="stylesheet" href="css1/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">  -->  
  <!-- my css bootstrap turns the menu to mobile dropdown menu -->
  <link rel="stylesheet" href="css1/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="all-content-wrapper">
    <div class="header-advance-area">
      <div class="header-top-area">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="header-top-wraper">
                <div class="row">  <!-- inner row class -->
                  <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                    <div class="menu-switcher-pro">
                      <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                        <i class="educate-icon educate-nav"></i>
                      </button>
                    </div>  <!-- closing menu-switcher-pro class -->
                  </div>  <!-- closing col-lg-1 col-md-0 col-sm-1 col-xs-12 class-->

                  <div class="col-md-2">  
                    <!-- xs (phones), sm (tablets), md (desktops), and lg (larger desktops)  -->
                    <div class="header-left-info" style="margin-top: 10px; margin-bottom: 10px;">
                      <img src="JUPEB.png" alt="" style="max-height: 55px; margin-right: 5px" /> 
                      <a href="#" style="color: white; font-size: 18px;">JUPEB TEST</a> 
                    </div>
                  </div>

                  <div class="col-md-5">
                    <div class="header-top-menu tabl-d-n">
                      <ul class="nav navbar-nav mai-top-nav" style="margin-top: 8px;">  
                        <li class="nav-item">
                          <a href="chooseCourses.php" class="nav-link">Choose Courses</a>
                        </li>
                        <li class="nav-item">
                          <a href="exam.php" class="nav-link">Start Exam</a>
                        </li>
                        <li class="nav-item">
                          <a href="result.php" class="nav-link">View Results</a>
                        </li>
                        <li class="nav-item">
                          <a href="logout.php" class="nav-link">Log Out</a>
                        </li>
                      </ul>
                    </div>
                  </div>   <!-- closing col-md-5 -->

                  <div class="col-xs-4">
                    <div class="header-right-info">
                      <ul class="nav mai-top-nav navbar-nav header-right-menu">  <!-- navbar-nav -->
                        <li class="nav-item" style="margin-top: 10px;">
                          <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                            <img src="img/avatar-mini2.jpg" alt="" />
                            <span class="admin-name"><?php echo $_SESSION['email']; ?></span>
                            <i class="fa fa-angle-down edu-icon edu-down-arrow"></i><!-- for V-arrow -->
                          </a>

                          <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                            <li>
                              <a href="logout.php"><span class="edu-icon edu-locked author-log-ic"></span>Log Out</a>
                            </li>
                          </ul>
                        </li>     <!-- closing nav-item class (li tag) -->   
                      </ul>
                    </div>      <!-- closing header-right-info class -->
                  </div>     <!-- closing col-xs-4 class -->
                </div>   <!-- closing inner row class -->
              </div>
            </div>
          </div>     <!-- closing row class -->
        </div>
      </div>
    </div>
  </div>     <!-- closing all-content-wrapper"> -->


  <div class="breadcome-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="breadcome-list">
            <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12 text-right">
                <ul class="breadcome-menu">
                  <li><div id="countdowntimer" style="display: block;"></div></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    setInterval (function(){
      timer();
    }, 1000);


    function timer(){
      var xmlhttp = new XMLHttpRequest();
      
      xmlhttp.open("GET", "load_timer.php", false);
      xmlhttp.send(null);
      document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;

      xmlhttp.open("GET", "load_timer.php", true);
      xmlhttp.send(null);
      
      /*var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = funtion(){
        if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
          if(xmlhttp.responseText == "00:00:01"){
            window.location ="result.php";
          }
          document.getElementById("countdowntimer").innerHTML = xmlhttp.responseText;
        }
      };
      xmlhttp.open("GET", "load_timer.php", true);
      xmlhttp.send(null);*/
    }


  </script>



































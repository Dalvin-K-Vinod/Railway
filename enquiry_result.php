<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>|| IRCTC ||</title>
  <link rel="icon" type="image/png" href="assets/images/favicon.png">
  <!--Main style css-->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/style2.css"> 
  <!--Responsive style css-->
  <link rel="stylesheet" href="assets/css/responsive.css"> 
    
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="assets/js/jquery.min.js"></script>

  <script> 
    jQuery(function(){
      jQuery('#headers').load('header.html');       
      jQuery('#footer').load('footer.html');       
    });
  </script>

</head>

<div id="headers"></div>
<header class="main_header fixed_header">
    <div class="container clearfix">
      <div class="logo_head">
        <a href="index.html"><img src="assets/images/irctc-new-logo.png" alt=""></a>
      </div>
      <div class="navbar-expand-lg nav_btn_toggle">    
        <button class="navbar-toggler open_mobile_menu" type="button" data-target="#topNavMobile">
          <div class="menuName">Menu</div>
          <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
        </button>
      </div>
            
      <nav class="top_nav_links navbar navbar-expand-lg">
              <div class="collapse navbar-collapse" id="topNav">
                  <ul class="navbar-nav">
				  <li class="has-child">
                      <a href="index.htm">Home</a></li>
					<!--<li class="has-child">
                      <li><a href="index.htm"> About Us </a></li>
                    </li>
					<li class="has-child">
                      <a href="http://localhost/railway/user_login.htm">Login</a>
					  <li><a href="http://localhost/railway/new_user_form.html">Register</a></li>-->
                      <li><a href="http://localhost/railway/enquiry.php">More Enquiry </a></li>

                  </ul>
              </div>
      </nav>
      
    </div>
  </header>




<body style=" background-image: url(pnglogin2.jpg);
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;"> 

    <div class="form2">

    <?php

error_reporting(0);

    session_start();

    require "db.php";

    $doj = $_POST["doj"];
    $_SESSION["doj"] = "$doj";
    $sp = $_POST["sp"];
    $_SESSION["sp"] = "$sp";
    $dp = $_POST["dp"];
    $_SESSION["dp"] = "$dp";

    $query = mysqli_query($conn, "SELECT t.trainno,t.tname,c.sp,s1.departure_time,c.dp,s2.arrival_time,t.dd,c.class,c.seatsleft FROM train as t,classseats as c, schedule as s1,schedule as s2 where s1.trainno=t.trainno AND s2.trainno=t.trainno AND s1.sname='" . $sp . "' AND s2.sname='" . $dp . "' AND t.trainno=c.trainno AND c.sp='" . $sp . "' AND c.dp='" . $dp . "' AND c.doj='" . $doj . "' ");

    echo "<br><br><br><br><b><table><thead><td>Train No</td><td>Train_Name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td> Train_Class </td><td> Seats_Left </td></thead>";

    while ($row = mysqli_fetch_array($query)) {
        echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6] . "</td><td>" . $row[7] . "</td><td>" . $row[8] . "</td><td>" ;
    }
    echo "</table>";

    //$rowcount=mysqli_num_rows($query);
    if (mysqli_num_rows($query) == 0) {
        echo "No such train <br> ";
    }
    ?>
    </div><br><center>

    <!--<p class="form3"><b>If you wish to proceed with booking fill in the following details:--></b></p></center>
    <form action="resvn.php" method="post" class="form"><center>
    <h1 class="login-title"><b>BOOK TICKET</h1>
         <input type="text" class="login-input" name="mno" placeholder="Registered Mobile No:" required><br>
        <input type="password" class="login-input" name="password" placeholder="password" required><br>
         <input type="text" class="login-input" name="tno" placeholder="Enter Train No"  required><br>
         <input type="text" class="login-input" name="class" placeholder="Enter Class:" required><br>
         <input type="text" class="login-input" name="nos" placeholder="No. of Seats:" required><br>
        <input type="submit" class="login-button" value="Proceed with Booking"><br>
      </center>
    </form></b>

    <?php

    //echo " <a href=\"http://localhost/railway/enquiry.php\">More Enquiry</a> <br>";

    $conn->close();
    ?>

    
</body>

</html>
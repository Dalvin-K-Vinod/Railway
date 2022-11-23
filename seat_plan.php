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
				  <!--<li class="has-child">
                      <a href="index.htm">Home</a></li>
					<li class="has-child">-->
                      <li><a href="logout.php"> Logout </a></li>
                    </li>
					<!--<li class="has-child">s
                      <a href="http://localhost/railway/user_login.htm">Login</a>
					  <li><a href="http://localhost/railway/new_user_form.html">Register</a></li>
                      <li><a href="http://localhost/railway/enquiry.php">More Enquiry </a></li>-->

                  </ul>
              </div>
      </nav>
      
    </div>
  </header>
<body style=" background-image: url(adminlogin.jpeg);
    height: 100%; 
    background-position: center;
     
    background-size: cover;">

   <br><br><br><br><br><br><br>


   <div class="form2">

<?php

error_reporting(0);

require "db.php";

echo "
<table>
<thead><td>Train_no</td><td>Starting_Point</td><td>Destination_Point</td></thead>
<tr><td>".$_GET["trainno"]."</td><td>".$_GET["sp"]."</td><td>".$_GET["dp"]."</td></tr>
</table>
";

//echo "
//<table>
//<thead><td>Train_Class</td><td>Seats_Left</td><td>Fare_Per_Seat</td></thead>
//";

$cdquery="SELECT classseats.class,classseats.seatsleft,classseats.fare FROM classseats WHERE classseats.trainno='".$_GET["trainno"]."' AND classseats.sp='".$_GET["sp"]."' AND classseats.dp='".$_GET["dp"]."'";
$cdresult=mysqli_query($conn,$cdquery);

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td></tr>
";
}
echo "</table>";

//echo " <br><a href=\"http://localhost/railway/schedule.php?trainno=".$_GET['trainno']."\">Go Back to Schedule!!!</a><br> ";
//echo " <br><a href=\"http://localhost/railway/show_trains.php\">Go Back to Train Menu!!!</a><br> ";
//echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
?>
</div>
<br>
<div class="form"><center>
<span>
    


    <form action="show_trains.php" method="post">
    <input type="submit" class="login-button" value="Go Back to Train Menu"><br><br></form>


    <form action="admin_login.php" method="post">
    <input type="submit" class="login-button" value="Go Back to Admin Menu"><br><br></form>

</span>

</div>

</body>
</html>

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

 <br><br><br><br><br><br><br><br><br><br><br><br>

<div class="form2"><center>

<?php

error_reporting(0);

require "db.php";


$cdquery="SELECT * FROM train WHERE trainno='".$_GET["trainno"]."'";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Train_no</td><td>Train_name</td><td>Starting_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Day</td><td>Distance</td></thead>
";
while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow['trainno']."</td><td>".$cdrow['tname']."</td><td>".$cdrow['sp']."</td><td>".$cdrow['st']."</td><td>".$cdrow['dp']."</td><td>".$cdrow['dt']."</td><td>".$cdrow['dd']."</td><td>".$cdrow['distance']."</td></tr>
";
}
echo "</table>";



$cdquery="SELECT * FROM schedule where trainno='".$_GET["trainno"]."' ORDER BY distance ASC  ";
$cdresult=mysqli_query($conn,$cdquery);
$stations=array();
$arrival=array();
$departure=array();
$distance=array();
$i=0;
while($cdrow=mysqli_fetch_array($cdresult))
{
	$stations[$i]=$cdrow["sname"];
	$arrival[$i]=$cdrow["arrival_time"];
	$departure[$i]=$cdrow["departure_time"];
	$distance[$i]=$cdrow["distance"];
	$i+=1;
}



echo "
<table>
<thead><td>Id</td><td>Staring_Point</td><td>Arrival_Time</td><td>Destination_Point</td><td>Departure_Time</td><td>Distance</td><td></td></thead>
";
$temp=0;
while ($temp<$i-1) 
{
	echo "
<tr><td>".($temp+1)."</td><td>".$stations[$temp]."</td><td>".$departure[$temp]."</td><td>".$stations[$temp+1]."</td><td>".$arrival[$temp+1]."</td><td>".($distance[$temp+1]-$distance[$temp])."</td><td><a href=\"http://localhost/railway/seat_plan.php?trainno=".$_GET["trainno"]."&sp=".$stations[$temp]."&dp=".$stations[$temp+1]."\"><button>Seat Plan</button></a></td></tr>
";
$temp+=1;
}
echo "</table>";

//echo " <br><a href=\"http://localhost/railway/show_trains.php\">Go Back to Train Menu!!!</a><br> ";
//echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
?>

</center>
</div>

<br>
<span><form action="show_trains.php" method="post" class="form"><center>
<input type="submit" class="login-button" value=" Go Back to Train Menu" required><br><br>
</span>
<?php
echo "<br><br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu </a> ";
?>
</body>
</html>

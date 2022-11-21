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
					<li class="has-child"> 
                      <li><a href="logout.php"> Logout </a></li>
                    </li>
					 <li class="has-child">s
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

session_start();

require "db.php";

if(isset($_POST["ns"]))
{
$ns=$_POST["ns"];
$tname=$_POST["tname"];
$_SESSION["tname"] = "$tname";
$sp=$_POST["sp"];
$_SESSION["sp"] = "$sp";
$st=$_POST["st"];
$_SESSION["st"] = "$st";
$dp=$_POST["dp"];
$_SESSION["dp"] = "$dp";
$dt=$_POST["dt"];
$_SESSION["dt"] = "$dt";
$dd=$_POST["dd"];
$_SESSION["dd"] = "$dd";
$ns=$_POST["ns"];
$_SESSION["ns"] = "$ns";
$ds=$_POST["ds"];
$_SESSION["ds"] = "$ds";

echo "<table><thead><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>No_of_stations</td><td>Distance</td></thead>";
echo "<tr><td>".$tname."</td><td>".$sp."</td><td>".$st."</td><td>".$dp."</td><td>".$dt."</td><td>".$dd."</td><td>".$ns."</td><td>".$ds."</td></tr></table>";

echo " <table><thead><td>Station</td><td>Arrival_Time</td><td>Departure_Time</td><td>Distance</td></thead>";
echo " <tr><td>".$sp."</td><td>".$st."</td><td>".$st."</td><td>0</td></tr>";

echo "<form action=\"insert_into_train_4.php\" method=\"post\">";
$temp=1;
while ($temp<=$ns) 
{
 	echo " <tr><td><select id=\"stn".$temp."\" name=\"stn".$temp."\"required> ";

	$cdquery="SELECT sname FROM station";
	$cdresult=mysqli_query($conn,$cdquery);
	        
	echo " <option value = \"\" > </option>";
			
	while ($cdrow=mysqli_fetch_array($cdresult)) 
	{
	 $cdTitle=$cdrow['sname'];
	 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
	}

	echo "
	</select></td>
	<td><input type=\"text\" name=\"st".$temp."\" required></td>
	<td><input type=\"text\" name=\"dt".$temp."\" required></td>
	<td><input type=\"text\" name=\"ds".$temp."\" required></td>	
	</tr>";
 $temp+=1;
}

	echo " <tr><td>".$dp."</td><td>".$dt."</td><td>".$dt."</td><td>".$ds."</td></tr></table>";	
	echo "<input type=\"submit\">";
}


else if($ns==0)
{
echo "
<form action=\"insert_into_train_3.php\" method=\"post\">
<table>
<tr><td>Train Name </td><td> <input type=\"text\" name=\"tname\" required></td></tr>
<tr><td>Starting Point </td><td> <select id=\"sp\" name=\"sp\" required>
";

$cdquery="SELECT sname FROM station";
$cdresult=mysqli_query($conn,$cdquery);

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdTitle=$cdrow['sname'];
 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
            
}

echo "

</select></td></tr>

<tr><td>Starting Time </td><td> <input type=\"time\" name=\"st\" required></td></tr>

<tr><td>Destination Point </td><td> <select id=\"dp\" name=\"dp\" required>

";

$cdquery="SELECT sname FROM station";
$cdresult=mysqli_query($conn,$cdquery);

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
 $cdTitle=$cdrow['sname'];
 echo " <option value = \"$cdTitle\" > $cdTitle </option>";
            
}

echo "
</select></td></tr>

<tr><td>Destination Time </td><td> <input type=\"time\" name=\"dt\" required></td></tr>

<tr><td>Distance </td><td> <input type=\"text\" name=\"ds\" required></td></tr>

<tr><td>No Of Intermediate stations</td><td><input type=\"text\" name=\"ns\" required></td></tr>

<tr><td>Day of Arrival </td><td> <input type=\"text\" name=\"dd\" required></td></tr>
</table>
<input type=\"submit\" class=\"login-button\" value=\"Enter Train Details\"><br><br>
";}

echo "<br> <a href=\"http://localhost/railway/show_trains.php\">Go Back to Admin Menu!!!</a><br><br> ";

?>
<br>
</center>
</div>
</body>
</html>



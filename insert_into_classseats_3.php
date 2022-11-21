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
	<br><br><br><br><br><br>


	<div class="form2"><center><br><br>
<?php

error_reporting(0);
session_start();

require "db.php";

if($_POST["tno"])
{
$trainno=$_POST["tno"];
$_SESSION["trainno"] = "$trainno";
$doj=$_POST["doj"];
$_SESSION["doj"] = "$doj";

$cdquery="SELECT * FROM train where trainno='".$trainno."'";
$cdresult=mysqli_query($conn,$cdquery);			
$cdrow=mysqli_fetch_array($cdresult);

echo "<table><thead><td>Train_no</td><td>Train_name</td><td>Starting_point</td><td>Starting_time</td><td>Destination_point</td><td>Destination_time</td><td>Day_of_arrival</td><td>Distance</td><td>Date_Of_Journey</td></thead>";
echo "<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td><td>".$cdrow[3]."</td><td>".$cdrow[4]."</td><td>".$cdrow[5]."</td><td>".$cdrow[6]."</td><td>".$cdrow[7]."</td><td>".$doj."</td></tr></table>";

$cdquery="SELECT sname FROM schedule where trainno='".$trainno."' ORDER BY distance ASC  ";
$cdresult=mysqli_query($conn,$cdquery);
$stations=array();
$i=0;
while($cdrow=mysqli_fetch_array($cdresult))
{
	$stations[$i]=$cdrow["sname"];
	$i+=1;
}

$_SESSION["ns"] = $i-1;

$_SESSION["stations"]="$stations";

echo " <table><thead><td>Starting Point</td><td>Destination Point</td><td>AC1 seats</td><td>AC1 Fare</td><td>AC2 seats</td><td>AC2 Fare</td><td>AC3 seats</td><td>AC3 Fare</td><td>CC seats</td><td>CC Fare</td><td>EC seats</td><td>EC Fare</td><td>SL seats</td><td>SL Fare</td></thead>";

echo "<form action=\"insert_into_classseats_4.php\" method=\"post\">";
$temp=0;

while ($temp<=$_SESSION["ns"]) 
{
$_SESSION["st".$temp]=$stations[$temp];
$temp+=1;
}

$temp=0;
while ($temp<$_SESSION["ns"]) 
{
 	echo " <tr><td>".$stations[$temp]."</td>
	<td>".$stations[$temp+1]."</td>
	<td><input type=\"text\" name=\"s1".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"f1".$temp."\" placeholder=\"0\" required></td>	
	<td><input type=\"text\" name=\"s2".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"f2".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"s3".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"f3".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"s4".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"f4".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"s5".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"f5".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"s6".$temp."\" placeholder=\"0\" required></td>
	<td><input type=\"text\" name=\"f6".$temp."\" placeholder=\"0\" required></td>
	</tr>";
 $temp+=1;
}

	echo "</table><input type=\"submit\"></form>";


}else
{
echo "
<form action=\"insert_into_classseats_3.php\" method=\"post\">
<table>
<thead><td>Train</td><td>Date Of Journey</td></thead>
<tr><td><select id=\"tno\" name=\"tno\" required>";

$query="SELECT * FROM train";
$result=mysqli_query($conn,$query);

while ($row=mysqli_fetch_array($result)) 
{
 $tno=$row['trainno'];
 $tn=$row['tname']." starting at ".$row['sp'];
 echo " <option value = \"$tno\" > $tn </option> ";
}

echo "</select></td>
<td><input type=\"date\" name=\"doj\" required></td></tr>
</table>
<input type=\"submit\" value=\"Enter Train Details\">
";
}

echo "<br><br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

?>
</center>
	</div>
</body>
</html>



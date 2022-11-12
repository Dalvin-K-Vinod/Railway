<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>|| IRCTC Corporate Portal ||</title>
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

<body style=" background-image: url(USERLOGIN1.png);
    margin-top: 130px;
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >

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
                      <li><a href="index.htm"> About Us </a></li>
                    </li>
					<li class="has-child">
                      <a href="http://localhost/railway/user_login.htm">Login</a>
					  <li><a href="http://localhost/railway/new_user_form.html">Register</a></li>
                      <li><a href="http://localhost/railway/enquiry.php">Ticket Booking </a></li>-->

                  </ul>
              </div>
      </nav>
      
    </div>
  </header>
<b><center>

<?php 

session_start();

require "db.php";

if ($conn->connect_error) 
{
 die("Connection failed: " . $conn->connect_error);
} 

$mobile=$_POST["mno"];
$pwd=$_POST["password"];

$query = mysqli_query($conn,"SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='".$pwd."' ") or die(mysql_error());

$temp1;
$temp2;

if($row = mysqli_fetch_array($query))
{
 echo "<h5><b>Welcome ";
 $temp1=$row['emailid'];
 $temp2=$row['id'];
 echo "$temp1";
 echo "<br><br></b>";

 $query2 = mysqli_query($conn," select * from user,resv where user.id=resv.id AND  user.mobileno=$mobile ") or die(mysql_error());

echo "<table><thead><td>PNR</td><td>Train_no</td><td>Date_Of_Journey</td><td>Total_Fare</td><td>Train_Class</td><td>Seats_Reserved</td><td>Status</td></thead>";

 while($row = mysqli_fetch_array($query2))
 {
  echo "<tr><td>".$row["pnr"]."</td><td>".$row["trainno"]."</td><td>".$row["doj"]."</td><td>".$row["tfare"]."</td><td>".$row["class"]."</td><td>".$row["nos"]."</td><td>".$row["status"]."</td></tr>";
 }

echo "</table>";

 if(mysqli_num_rows($query2) == 0)
 {
  echo "<b>No Reservations Yet !!! <br><br> ";
 }
}

$_SESSION["id"]=$temp2;

//$rowcount=mysqli_num_rows($result);
if(mysqli_num_rows($query) == 0)
{
 echo "Wrong Combination!!! <br><br> ";
 echo " <a href=\"http://localhost/railway/index.htm\">Home Page</a><br>";
 die();
}

?></center>
</b>
<form action="cancel.php" method="post" class="form">
<h1 class="login-title">Ticket Cancellation</h1><center>
Enter PNR for Cancellation: <input type="text" class="login-input" name="cancpnr" placeholder="pnr Number" required><br><br>
<input type="submit" value="Cancel" class="login-button"><br><br>
</form>

<?php

echo " <a href=\"http://localhost/railway/index.htm\">Log out</a><br>";

$conn->close(); 

?>
</center>
</body>
</html>

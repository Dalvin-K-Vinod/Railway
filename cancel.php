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
                      <li><a href="index.htm"> About Us </a></li>
                    </li>
					<li class="has-child">
                      <a href="http://localhost/railway/user_login.htm">Login</a>
					  <li><a href="http://localhost/railway/new_user_form.html">Register</a></li>
                      <li><a href="http://localhost/railway/enquiry.php">More Enquiry </a></li>-->

                  </ul>
              </div>
      </nav>
      
    </div>
  </header>

<body style=" background-image: url(userlogin.png);
margin-top: 268px;
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;" >


<form action="user_login.php" class="form"
<center>
<?php 

error_reporting(0);

session_start();

require "db.php";

$pnr=$_POST["cancpnr"];
$uid=$_SESSION["id"];
//echo "$uid";

$sql=" UPDATE resv SET status ='CANCELLED' WHERE resv.pnr='".$pnr."' AND resv.id='".$uid."' ";

if ($conn->query($sql) === TRUE) 
{
 echo "<b><h5>Cancellation Successful!!!</b>";
} 
else 
{
 echo "<br><br>Error:" . $conn->error;
}

echo " <br><br><a href=\"http://localhost/railway/index.htm\">logout</a></h5><br>";

$conn->close(); 
?>
</center>
</body>
</html>

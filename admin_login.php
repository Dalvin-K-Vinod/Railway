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

<body style=" background-image: url(adminlogin.jpeg);
    margin-top: 168px;
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">

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
					  <li><a href="http://localhost/railway/new_user_form.html">Register</a></li>
                      <li><a href="http://localhost/railway/enquiry.php">Ticket Booking </a></li>

                  </ul>-->
              </div>
      </nav>
      
    </div>
  </header>
<div align="center"><br><br><br>
<?php 
session_start();
if($_POST["uid"]=='admin' AND $_POST["password"]=='admin' )
{
$_SESSION["admin_login"]=True;
}

if($_SESSION["admin_login"]==True)
{
echo " <br><a href=\"http://localhost/railway/insert_into_stations.php\"> Show All Stations </a><br> ";
echo " <br><a href=\"http://localhost/railway/show_trains.php\"> Show All Trains </a><br> ";
echo " <br><a href=\"http://localhost/railway/show_users.php\"> Show All Users </a><br> ";
echo " <br><a href=\"http://localhost/railway/insert_into_train_3.php\"> Enter New Train </a><br> ";
echo " <br><a href=\"http://localhost/railway/insert_into_classseats_3.php\"> Enter Train Schedule </a><br> ";
echo " <br><a href=\"http://localhost/railway/booked.php\"> View all booked tickets </a><br> ";
echo " <br><a href=\"http://localhost/railway/cancelled.php\"> View all cancelled tickets </a><br> ";
echo " <br><a href=\"http://localhost/railway/logout.php\"> Logout </a><br> ";
}
else 
{

echo "
<form action=\"admin_login.php\" method=\"post\"><br><br><br>
User ID: <input type=\"text\" name=\"uid\" required><br><br>
Password: <input type=\"password\" name=\"password\" required><br><br><br><br>
<input type=\"submit\">
</form>
";
}


?>
    <!-- Start Footer -->
    <div id="footer"></div><br>
	<footer>
      <div class="container">
        <div class="row">

          <div class="col-md-9">
            <h3>Quick Links</h3>
            <div class="row">
              <div class="col-md-2">
                <ul class="quicklinks">
                  <li><a href="http://localhost/railway/index.htm">Home</a></li>
                  <li><a href="http://localhost/railway/index.htm">Home</a></li>
                  <!--<li><a href="about.html" target="_blank"> About Us </a></li>
				  <li><a href="http://localhost/railway/user_login.htm" target="_blank"> Login </a></li>
				  <li><a href="http://localhost/railway/new_user_form.html" target="_blank"> Register </a></li>
				  <li><a href="contact.html" target="_blank"> Contact Us </a></li>-->
                  </ul>              
              </div>
              
              <!--<div class="col-md-2">
                <ul class="quicklinks">
                  <li><a href="http://localhost/railway/admin_login.php">Admin Login </a></li>
                  <li><a href="https://www.irctctourism.com/" target="_blank"> Tourism </a></li>
                  <li><a href="https://www.irctc.co.in/nget/train-search" target="_blank"> Train Ticket</a></li>
                  <li><a href="https://www.ecatering.irctc.co.in/" target="_blank"> E Catering </a></li>
				   </ul>              
              </div>-->
              <div class="col-md-2">
			  <img src="assets/images/irctc-new-logo.png">
			  </div>
            </div>
          </div>
        </div>
      </div>
<div class="copyright">© 2021 IRCTC | MINI PROJECT BY Himanshu, Mayank, Yogesh.</div>
</footer>
</div>
</body>
</html>

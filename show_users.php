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

<br><br><br><br>

<div class="form2">

<?php

error_reporting(0);

require "db.php";

$cdquery="SELECT * FROM user";
$cdresult=mysqli_query($conn,$cdquery);
echo "
<table>
<thead><td>Id</td><td>Email_Id</td><td>Password</td><td>Mobile_no</td><td>Date_Of_Birth</td><td></td><td></td></thead>
";

while ($cdrow=mysqli_fetch_array($cdresult)) 
{
	echo "
<tr><td>".$cdrow[0]."</td><td>".$cdrow[1]."</td><td>".$cdrow[2]."</td><td>".$cdrow[3]."</td><td>".$cdrow[4]."</td><td><a href=\"http://localhost/railway/edit_user.php?id=".$cdrow[0]."\"><button>Edit</button></a></td><td><a href=\"http://localhost/railway/delete_user.php?id=".$cdrow[0]."\"><button>Delete</button></a></td></tr>
";
}
echo "</table>";

//echo " <br><a href=\"http://localhost/railway/new_user_form.html\"> Add New User </a><br> ";
//echo " <br><a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";
?>
</div>
<div class="form"><center>
<br>
<span>
    <form action="new_user_form1.html" method="post" >
    <input type="submit" class="login-button" name="sname" value=" Add New User" required><br></form>

    <form action="admin_login.php" method="post" >
    <input type="submit" class="login-button" name="sname" value=" Go Back to Admin Menu" required><br></form>
</span>
</center>
</div>
</body>
</html>

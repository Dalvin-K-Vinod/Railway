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


<div class="form"><center><br><br>

<?php

error_reporting(0);

session_start();


require "db.php";

$stations=$_SESSION["stations"];

$temp=0;
while ($temp<$_SESSION["ns"]) 
{
	if($_POST["s1".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','AC1','".$_POST["s1".$temp]."','".$_POST["f1".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s2".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','AC2','".$_POST["s2".$temp]."','".$_POST["f2".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s3".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','AC3','".$_POST["s3".$temp]."','".$_POST["f3".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s4".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','CC','".$_POST["s4".$temp]."','".$_POST["f4".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s5".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','EC','".$_POST["s5".$temp]."','".$_POST["f5".$temp]."')";
	$flag=($conn->query($sql));
	}
	if($_POST["s6".$temp]>0)
	{$sql = "INSERT INTO classseats (trainno,sp,dp,doj,class,seatsleft,fare) VALUES ('".$_SESSION["trainno"]."','".$_SESSION["st".$temp]."','".$_SESSION["st".($temp+1)]."','".$_SESSION["doj"]."','SL','".$_POST["s6".$temp]."','".$_POST["f6".$temp]."')";
	$flag=($conn->query($sql));
	}

	$temp+=1;
}

if ($flag === TRUE) {
    echo "New seat arrangement added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "<br> <a href=\"http://localhost/railway/admin_login.php\">Go Back to Admin Menu!!!</a> ";

?>

</center>
	</div>
</body>
</html>

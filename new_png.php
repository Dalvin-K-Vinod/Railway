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

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-size: cover;">
    <!--background-repeat: no-repeat;-->


  <?php

  session_start();

  require "db.php";

  $pname = $_POST["pname"];
  $page = $_POST["page"];
  $pgender = $_POST["pgender"];

  $checkin = $_POST["checkin"];
  $checkout = $_POST["checkout"];

  $tno = $_SESSION["tno"];
  $doj = $_SESSION["doj"];
  $sp = $_SESSION["sp"];
  $dp = $_SESSION["dp"];
  $class = $_SESSION["class"];

  $id = $_SESSION["id"];
  //$trainno = $_SESSION["trainno"];
  //$tfare = $_SESSION["tfare"];
  $nos = $_SESSION["nos"];
  //echo "$tno $doj $class";

  //echo "$pname ";
  //echo "$page ";
  //echo "$pgender ";
  //echo "$checkin ";
  //echo "$checkout ";
  //echo "$tno ";
  //echo "$doj ";
  //echo "$sp ";
  //echo "$dp ";
  //echo "$class ";
  //echo "     ";

  //echo "$id ";
  //echo "$trainno ";
  //echo "$tfare ";
  //echo "$nos ";

  

  $tempfare = 0;
  $temp = 0;

  for ($i = 0; $i < $_SESSION["nos"]; $i++) {
    //echo "$fare";


    $query = " SELECT fare FROM classseats WHERE trainno='" . $tno . "' AND class='" . $class . "' AND doj='" . $doj . "' AND sp='" . $checkin[$i] . "' AND dp='" . $checkout[$i] . "'  ";
    $result = mysqli_query($conn, $query) or die(mysql_error());

    $row = mysqli_fetch_array($result);

    $fare = $row[0];
    if ($page[$i] >= 18) {
      $temp++;
      $tempfare += $fare;
    } else if ($page[$i] < 18)
      $tempfare += 0.5 * $fare;
    else if ($page[$i] >= 60)
      $tempfare += 0.5 * $fare;
    
  }
  //echo "   $tempfare";
echo "<br><br><br><br><b><br><br><b>Total fare is Rs." . $tempfare . "/-";
  if ($temp == 0) {
    echo "<br><br>Atleast one adult must accompany!!!";
    echo "<br><br><a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a> <br>";
    die();
  }

  // echo "Total fare is Rs." . $tempfare . "/-";

  //for ($i = 0; $i < $_SESSION["nos"]; $i++) 

  $sql = "INSERT INTO resv(id,trainno,sp,dp,doj,tfare,class,nos) VALUES ('" . $_SESSION["id"] . "','" . $_SESSION["tno"] . "','" . $_SESSION["sp"] . "','" . $_SESSION["dp"] . "','" . $_SESSION["doj"] . "','" . $tempfare . "','" . $_SESSION["class"] . "','" . $_SESSION["nos"] . "' )";

  if ($conn->query($sql) === TRUE) {
    echo "<br><br>Reservation Successful<br>";
  } else {
    echo "<br><br>Error: " . $conn->error;
  }

  $tid = $_SESSION["id"];
  $ttno = $_SESSION["tno"];
  $tdoj = $_SESSION["doj"];

  $query = " Select pnr from resv where id='" . $tid . "' AND trainno='" . $ttno . "' AND doj='" . $tdoj . "' ";
  $result = mysqli_query($conn, $query) or die(mysql_error());

  //echo "HI,here's your ticket details";
  //print_r($result);

  $row = mysqli_fetch_array($result);
  $rpnr = $row['pnr'];
  echo "pnr number is ";
  echo " $rpnr ";

  $tpname = $_POST['pname'];
  //$ntpname = count($_REQUEST['pname']);
  $tpage = $_POST["page"];
  $tpgender = $_POST["pgender"];

  for ($i = 0; $i < $_SESSION["nos"]; $i++) {
    $sql = "INSERT INTO pd(pnr,pname,page,pgender) VALUES  ('" . $rpnr . "','" . $tpname[$i] . "','" . $tpage[$i] . "','" . $tpgender[$i] . "')";

    if ($conn->query($sql) === TRUE) {
      echo "<br><br>Passenger details added!!!";
    } else {
      echo "<br><br>Error: " . $conn->error;
    }

    //echo "Enter Passanger Name: <input type='text' name='pname[]' required> ";
    //echo "Enter Passanger Age: <input type='text' name='page[]' required>";
    //echo "Enter Passanger Gender: <input type='text' name='pgender[]' required> <br> ";
  }

  echo "<br><br><a href=\"http://localhost/railway/enquiry1.php\">new tickets</a> <br>";
  echo "<br><br><a href=\"http://localhost/railway/index.htm\">logout</a> <br>";

  $conn->close();
  ?>

</body>

</html>
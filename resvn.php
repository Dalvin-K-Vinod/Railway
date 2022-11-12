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
				  <li class="has-child">
                      <a href="index.htm">Logout</a></li>
					<!--<li class="has-child">
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
margin-top: 368px;
    height: 100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;">


    <form action="new_png.php" method="post">

        <?php

        session_start();

        require "db.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $mobile = $_POST["mno"];
        $pwd = $_POST["password"];

        $query = mysqli_query($conn, "SELECT * FROM user WHERE user.mobileno=$mobile AND user.password='" . $pwd . "' ") or die(mysql_error());
        if (mysqli_num_rows($query) == 0) {
            echo "No such login !!! <br> ";
            echo " <br><a href=\"http://localhost/railway/enquiry_result.php\">Go Back!!!</a> <br>";
            die();
        }

        $row = mysqli_fetch_array($query);
        $temp = $row['id'];
        //echo $temp;
        //echo $_SESSION["doj"];
        $_SESSION["id"] = "$temp";
        $tno = $_POST["tno"];
        $_SESSION["tno"] = "$tno";
        $class = $_POST["class"];
        $_SESSION["class"] = "$class";
        $nos = $_POST["nos"];
        $_SESSION["nos"] = "$nos";

        echo "<table>";

        for ($i = 0; $i < $nos; $i++) {
            echo "<b><br><tr><td><input type='text' name='pname[]' placeholder=\"Passenger Name\" required></td> ";
            echo "<b><td><input type='text' name='page[]' placeholder=\"Passenger Age\" required></td>";
            echo "<b><td><input type='text' name='pgender[]' placeholder=\"Passenger Gender\" required></td>";
            echo "<td><select id='sp' name='checkin[]' required> <option value = \"\" >Starting Point:</option>";
            $cdquery = "SELECT sname FROM station";
            $cdresult = mysqli_query($conn, $cdquery);
            while ($cdrow = mysqli_fetch_array($cdresult)) {

                echo " <option value = \"$cdrow[sname]\" > $cdrow[sname] </option>";
            }

            echo "</select></td>";
            echo "<td><select id='sp' name='checkout[]' required> <option value = \"\" >Ending Point:</option>";
            $cdquery = "SELECT sname FROM station";
            $cdresult = mysqli_query($conn, $cdquery);
            while ($cdrow = mysqli_fetch_array($cdresult)) {

                echo " <option value = \"$cdrow[sname]\" > $cdrow[sname] </option>";
            }

            echo "</select></td></tr><br>";
        }

        echo "</table>";

        //Enter Train No: <input type="text" name="tno" required><br>
        //Enter Class: <input type="text" name="class" required><br>

        //echo "<a href=\"http://localhost/railway/enquiry.php\">Back to Enquiry</a>";

        $conn->close();

        ?>
        <div align="center">
        <br><br><input type="submit" value="Book"></div>
</body>

</html>
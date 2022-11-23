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

<body style=" background-image: url(pnglogin.jpg);
    height: 100%; 
    background-position: center;
    background-size: cover;">

<form action="payment1.php" class="form"><center>

<input type="number" maxlength = "16" class="login-input" name="mno" placeholder="card no" required><br>

        <input type="password" class="login-input" name="password" placeholder="card holder's name" required><br>

         <input type="text" class="login-input" name="tno" placeholder="Enter cvv"  required><br>

         <input type="date" class="login-input" name="class" placeholder="Enter expiry date" required><br>

         <!--<input type="text" class="login-input" name="nos" placeholder="No. of Seats:" required><br>-->

        <input type="submit" class="login-button" value="Proceed with Booking"><br>
      </center>


<?php

echo "<br>"
?>
</body>

</html>
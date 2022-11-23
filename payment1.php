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

<body style=" background-image: url(pnglogin2.jpg);
    height: 100%; 
    background-position: center;
    background-size: cover;"><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<form action="enquiry1.php" class="form"><center>

<?php
    echo"<b>Booking Successful<br>";
    echo "<br><br><a href=\"http://localhost/railway/index.htm\">logout</a> <br>";
    ?><br>
</center>
<form action="enquiry1.php" class="form">


     <input type="submit" class="login-button" value="new tickets">
</form>
</body>

</html>
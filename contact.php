<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/fa-solid.min.css">
  <link rel="stylesheet" href="css/fontawesome.min.css">
</head>
<body>
  <?php  include "php/header.php"; ?>
  <div class="container">
    <!---section1: dispaly office hours informaion and the form of sending a message in a row------->
    <section>
      <div class="row">
    <!--dispaly office hours information-------------->
        <div class='col-sm-12 col-md-6'>
          <div class='card' style='border:0'>
            <div class='card-body' style="background-color:khaki;">
              <h4 class='card-title text-white'>Office hours</h4>
        <p class='card-text' style='color:grey;'>Please note: The offices are closed Sunday and Stat holidays.
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item" style="color:grey;">Monday&emsp;9:30am-6:00pm</li>
              <li class="list-group-item" style="color:grey;">Tuesday&emsp;9:30am-6:00pm</li>
              <li class="list-group-item" style="color:grey;">Wednsay&emsp;9:30am-6:00pm</li>
              <li class="list-group-item" style="color:grey;">Thursday&emsp;9:30am-6:00pm</li>
              <li class="list-group-item" style="color:grey;">Friday&emsp;&emsp;9:30am-6:00pm</li>
              <li class="list-group-item" style="color:grey;">Saturday&emsp;11:00am-5:00pm</li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </section>
    <!--section2:display agencies and agents information; call the function to get the information from datebase automatically ---->
  <?php
    include "php/PHPfunction.php";
  showAgency();
  ?>
  </div>
  <?php include "php/footer.php"; ?>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/JSfunctions.js"></script>
</body>
</html>

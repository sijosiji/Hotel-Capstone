
<?php
// Start the session
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
            <div class='card-body' style="background-color:skyblue;">
              <h4 class='card-title text-white'>Office hours</h4>
        <p class='card-text' style='color:grey;'>Please note: The offices are closed Sunday and holidays.
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
        <!--display the form of sending a message----->
      <div class='col-sm-12 col-md-6'>
      <div class='card mb-4'>
        <div class='card-body' style="background-color:skyblue;">
              <h4 class='card-title text-white'>Send us a message</h4>
              <!--display the error message of the form validation; use session to transfer the result of the message sending to the contact page-->
        <p style="color: red;" id="error"><?php if(isset($_SESSION['message'])){echo $_SESSION['message'];} unset($_SESSION['message']);?></p>
        <!--transfer the submition information to a different page(action_contact.php) can avoid resubmitting when the page is refreshed-->
              <form name="contactform" action="php/action_contact.php" method="post">
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Name" name="Name">
          </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Email" name="Email">
          </div>
          <div class="form-group">
                  <input type="text" class="form-control" placeholder="Phone" name="Phone">
                </div>
                <div class="form-group">
                  <textarea class="form-control" rows="3" placeholder="Enter message" name="Message"></textarea>
                </div>
                <!--call javascript function to validate the form-->
                <input type="submit" name="submit" value="Send" class="btn btn-success btn-md" onclick="return valContact(this.form)">
                <span style="color: red;">&emsp;* All fields are required.</span>
              </form>
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

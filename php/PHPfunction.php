<?php

//get contact information from database and display it on the contact page
function showAgency()
{
  // connect and check connection with a database
  $con = mysqli_connect("localhost","root","","capstones") or die ("Database Connection failed!<br>");
  // select all the agencies from the database
  $sql = "SELECT * FROM agencies";
  $result = mysqli_query($con,$sql);
  if (mysqli_num_rows($result) > 0)
  {
    // loop to get information of each agency from the database
    while($row = mysqli_fetch_assoc($result))
    {
      $id=$row['AgencyId'];
      $adr=$row['AgncyAddress'];
      $city=$row["AgncyCity"];
      //format the post code to a common style
      $postal=chunk_split($row["AgncyPostal"],3," ");
      $p=$row["AgncyPhone"];
      //format the phone number to a common style. E.g. (403)111-1111
      $phone='('.substr($p,0,3).')'.substr($p,3,3).'-'.substr($p,6,4);
      //output data of each agency
      $str="<section>        
          <div class='row'>
          <div class='col-sm-12 col-md-6'>
            <div class='card bg-white' style='border:0;'>
              <div class='card-body'>
                <h4 class='card-title' style='color:DarkBlue;'>Hotel Booking-".$city."</h4>
                <p class='card-text' style='color:grey;'>";
      $str.=$adr."<br>".$city.", ".$postal."</p>";
      $str.="<p class='card-text' style='color:DarkBlue;font-size:110%'><i class='fas fa-phone'></i>&nbsp;";
      $str.=$phone."</p></div></div></div></section>";
      echo $str;
    }
  }
}


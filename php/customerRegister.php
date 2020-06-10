<!--
Register Page Script
-->

<!-- Script to insert customer information from the register form to the customer table in the SQL database -->

<?php
function customerRegister(){

  if (isset($_POST['submit']))
  {
    $custArray = array();
    foreach($_POST as $key=>$value){
      if($key != "submit"){
      $custArray[$key] = $value;
      }
      else{}
      }
    }

    // Returns the array values as a string
    $returnString = "'".implode("','", $custArray)."'";


    // Returns the array keys as a string
    $keyArray = array_keys($custArray);
    $returnKeys = implode(",", $keyArray);

    // echo $returnString;
    // echo $returnKeys;




//Script to redirect you to the Login Page
$link = mysqli_connect("localhost", "root", "", "capstones") or die("Connection Error: " . mysqli_connect_error());
//echo $returnString;
//echo "next";
//echo $returnKeys;
$sql = "insert into cust ($returnKeys) values ($returnString)";
//$sql = "insert into cust ($returnKeys) values ('solsijo','solsijo','solsijo''SIJO','Jacob','3675 130 Ave','Edmonton','AB','T5A 3S9','9876543219','9876543219','sijosol@yahoo.com')";
$result = mysqli_query($link, $sql) or die("SQL Error");
//print("result=$result<br />");
if ($result)
{
  echo '<script type="text/javascript"> window.open("login.php"); </script>';
}
else
{
  print("Customer Not Registered");
}
mysqli_close($link);
}



 ?>

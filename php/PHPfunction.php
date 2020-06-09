
<?php
//get and send the message to all the agents by using the agency's email system when a customer submit it through the contact page
function sendemail()
{
  //get the value from the input field
  $name=trim($_POST["Name"]);
  $phone=trim($_POST["Phone"]);
  $from=trim($_POST["Email"]);
  //use html to output the message
  $message = '
    <html>
    <head>
      <title>Customer Message</title>
    </head>
    <body>
      <p>Here are the customer message!</p>
      <p>Name: &emsp;'.$name.'</p>
      <p>Phone: &emsp;'.$phone.'</p>
      <p>Email: &emsp;'.$from.'</p>
      <p>Message: '.trim($_POST["Message"]).'</p>
    </body>
    </html>
    ';
  //use PHPMailer class to send an email, and could be set accourding to the email server of the company
  require_once('PHPMailer/PHPMailerAutoload.php');
  $mail=new PHPMailer();
  $mail->isSMTP();
  $mail->SMTPAuth=true;
  $mail->SMTPSecure='ssl';
  $mail->Host='smtp.gmail.com';
  $mail->Port='465';
  $mail->isHtml();
  $mail->Username='lingyanlly2013@gmail.com';
  $mail->Password='Capstone123456';
  $mail->SetFrom($from,$name);
  $mail->Subject='Customer Message';
  $mail->Body=$message;
  $mail->AddAddress('sungcalgary@gmail.com');
  //send email
  $mail->Send();
  //return a boolean value for giving a feedback of the result
  if(!$mail->send()) 
  {
    return false;
  } 
  else 
  {
    return ture;
  }
}


//get agencies and agents information from database and display it on the contact page
function showAgency()
{
  // connect and check connection with a database
  $con = @mysqli_connect("localhost","root","","Capstones") or die ("Database Connection failed!<br>");
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
      echo showAgent($id);
    }
  }
}

//get agents information from database and display it on the contact page
function showAgent($i)
{  //use bootstrap card class to style a group of agents
  echo $str1="<section>
               <div class='card' style='background-color: skyblue;'>
                <div class='card-body'>
                  <h4 class='card-title text-center text-white mb-2'>Our Team of Professionals</h4>
                  <h6 class='card-subtitle text-center mb-3' style='color:DarkBlue;'>Select an agent from this location</h6>
                  <div class='row'>";

  // connect and check connection with a database
  $con = @mysqli_connect("localhost","root","","Capstones") or die ("Database Connection failed!<br>");
  // select all the agent data of the same agency from the database
  $sql = "SELECT * FROM agents WHERE AgencyId=".$i;
  $result = mysqli_query($con,$sql);
      // loop to get information of each agent
      while($row = mysqli_fetch_assoc($result))
      {
       
          $fname=$row['AgtFirstName'];
          $lname=$row['AgtLastName'];
          $phone=$row['AgtBusPhone'];
          $email=$row['AgtEmail'];
          //output data of each agent, and use the card class to style it
          $str2="<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2 mx-auto' style='padding:0;'>
                  <div class='card' style='background-color: skyblue; border:0;'>      
                    <img class='card-img-top rounded-circle mx-auto' src='image/agent.png' alt='Agent Photo' style='width: 7rem;'>
                    <div class='card-body text-center p-0 my-2'>
                      <span class='card-text text-white' style='font-size:120%'>";
          $str2.=$fname."</span>&nbsp;<span class='card-text text-white' style='font-size:120%'>".$lname."</span><p class='card-text mb-1'  style='color:DarkBlue;'>";
          $str2.=$phone."</p><a href='mailto:".$email."?subject=Customer Message' class='card-link'><i class='fas fa-envelope' style='font-size:150%'></i></a></div></div></div>";
          echo $str2;
      }

    echo $str3="</div></div></div></section>";
 }
?>
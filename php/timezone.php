<?php

if (isset($_POST["submit"])){

 // getting current Date Time OOP way
 $currentDateTime = new \DateTime();

 //set timeZone
 $currentDateTime->setTimezone(new \DateTimeZone('America/New_York'));
 $dateTime = $currentDateTime->format('l-j-M-Y H:i:s A');

}

?>

<form action ="" method="post">
<input type="submit" name="submit">
</form>

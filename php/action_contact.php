
<?php
// Start the session
session_start();

/* Sending the submitted form data to the page itself would make a issue.
    After the data submitted, refreshing the contact page could make the data submitted again
     without clicking the submit button. Sending the data to a different page can solve the issue.
      Use session to transfer message to the contact page.
*/
    //when the submit button of the message form on the contact page is set, this sendemail function will be executed.
    include "PHPfunction.php";
    if (isset($_POST["submit"]))
    {
      $result=sendemail();
      if ($result)
      {
        // Set session variables
        $_SESSION['message'] = "Send the message successfully!";
        header('Location: ../contact.php');
      }
      else
      {
        $_SESSION['message'] = "Failed to send the message.";
        header('Location: ../contact.php');
      }
    }
?>

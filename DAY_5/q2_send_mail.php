<html>
    <title>Feedback Form</title>
    <head><b><h3>Feedback Form</h3></b></head>
    <dd><p style = 'color: Blue'>We would love to hear your thoughts, suggestions, concerns or problems with anything so we can improve!</p></dd>
    <form action = 'q2_send_mail.php' method = 'POST'>
        <p>Name:     <dd><input type ='text' name = 'name' required></p></dd>
        <p>Email ID: <dd><input type ='email' name = 'emailid' required></p></dd>
        <p><span> Rate your experience :    5 <input type = 'radio' name = 'rate' value = '5'> 
                                            4 <input type = 'radio' name = 'rate' value = '4'> 
                                            3 <input type = 'radio' name = 'rate' value = '3'> 
                                            2 <input type = 'radio' name = 'rate' value = '2'> 
                                            1 <input type = 'radio' name = 'rate' value = '1'>
            </span></p>
        <p>Describe your feedback: <dd><textarea name = 'feedback' rows = '10' cols = '90'></textarea></p></dd>                
        <p><span><input type ='submit' name = 'sub' value = 'Submit'></span>
        <span><input type ='reset' name = 'res' value = 'Reset'></span></p>
    </form>
</html>

<?php
    error_reporting(E_ALL ^ E_NOTICE);
    // post variables
    $name = $_POST['name'];
    $email = $_POST['emailid'];
    $rating = $_POST['rate'];
    $desc = $_POST['feedback'];
    // emails
    $from = "From: newhost@email.com";
    $touser = "$email";
    $toadmin = "anyemail@.com";
    //subject
    $usersubject = " Thank you for the response. ";
    $adminsubject = " Response from $name ";    
    // message for user and admin
    $messagetouser = " <i>Thank you for letting us know know about this. \n\r Your response has been recorded. </i> ";

    if ($_POST['sub']) {
        if ($rating == 1) {
            $rating = "10%";
        }
        else if ($rating == 2) {
            $rating = "20%";
        }
        else if ($rating == 3) {
            $rating = "30%";
        }
        else if ($rating == 4) {
            $rating = "40%";
        }
        else if ($rating == 5) {
            $rating = "50%";
        }
        $messagetoadmin = nl2br(" \n\r Here is detailed response 
                            \n\r 
                            \n\r || User Details || 
                             \n\r Name    : <b>$name</b>
                                  Email ID: <b>$email </b>
                                  $name is  <b style = 'color: red'>$rating</b> satisfied.
                                  <p><strong>Detailed feedback</strong>
                           ")."\n\r $desc<p/>";
        mail($touser, $usersubject, $messagetouser, $from);
        mail($toadmin, $adminsubject, $messagetoadmin, $from);
    }

?>
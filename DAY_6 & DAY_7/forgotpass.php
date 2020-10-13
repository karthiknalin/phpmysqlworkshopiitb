<?php
    session_start();
?>



<?php
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    $sub = "Password Change Requested.";
    $from = "From: Newhost@email.com";
    $StudUserName = $_POST['fpass'];
    $_SESSION['usrname'] = $StudUserName;
    $femailsql = "SELECT EmailID, Password_ FROM StudentLogin WHERE Username = '$StudUserName'";
    $askemail = mysqli_query($studconn, $femailsql);
    if ($_POST['fsub']) {
        if($askemail) { echo "";}
        else { echo "<br><hr>Error:".mysqli_error($studconn);}
        if(mysqli_num_rows($askemail)){
            if($rows = mysqli_fetch_array($askemail)){
                $mailID = $rows['EmailID'];
                $_SESSION['email'] = $mailID;
                $passreq = $rows['Password_'];
                $msg = "Hello $StudUserName,\n\r<body>You (or someone) have requested for password reset for your account.\n\r
                <strong>Old Password : </strong><b style = 'color: green'>$passreq</b>\n\r Enter this password in password reset page.Hope to see you back soon.\n\r Thank you
                    </body>
            " ;
                mail($mailID, $sub, $msg, $from);
                header("Location: resetpass.php");
            }
        }
        else { echo "<p style = 'color: red'>No such user found.</p> <p style = 'color: red'> Please enter a valid username.</p>";}
    }
     
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Request Password</title> 
        <style>
            body {
                background-color: #d5d8dc;
                margin-left: 40px;
            }
            input[type = submit] {
                height: 2em;
                width: 10em;
            }
            td{
                padding: 8px;
            }
        </style>   
    </head>
    <body>
        <dl>
            <label><strong><i>Follow these steps to create a new password: </strong></label>
            <dd>
                Enter your username and click submit. A mail will be sent to your registered account with a password.            
            </dd>
        </dl>
        <form action = 'forgotpass.php' method = 'POST'>
            <table>
                <tr>
                    <td><label for = 'fpass'>Enter your username: </label></td>
                    <td><input type = 'text' name = 'fpass' required></td>
                </tr>
                <tr>
                    <td></td>
                    <td align = 'right'><input type = 'submit' name = 'fsub' value = 'Reset Password'></td>
                </tr>
        
            </table>
    </body>

    </form>
</html>
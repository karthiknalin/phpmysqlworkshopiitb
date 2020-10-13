<?php
    session_start()

?>



<?php
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    $OPass = $_POST['OldPass'];
    $NPass1 = $_POST['NewPass'];
    $NPass2 = $_POST['ConfirmPass']; 
    $usrval = $_SESSION['usrname'];
    
    if ($_POST['chpass']) {
        $selectquery = "SELECT Password_ FROM StudentLogin WHERE Username = '$usrval'";
        $OldPassword = mysqli_query($studconn, $selectquery);
        // Error checking in connection to database
        if($OldPassword) {echo "";}
        else { echo "<hr><br>Error".mysqli_error($studconn);}
        // Checking number of rows present in the table
        if (mysqli_num_rows($OldPassword) > 0) {
            if ($rows = mysqli_fetch_array($OldPassword)) {
                // storing old password value
                $PrevPass = $rows['Password_'];
                // checking passwords match or not
                if ($OPass == $PrevPass) {
                    if ($NPass1 == $NPass2) {
                        if (strlen($NPass1) >= 6 && strlen($NPass1) < 31) {
                            $NPass1 = md5($NPass1);
                            $updatesql = "UPDATE StudentLogin SET Password_ = '$NPass1' WHERE Username = '$usrval'";
                            $updatepass = mysqli_query($studconn, $updatesql);
                            if ($updatesql) { echo ""; }
                            else { echo "<hr><br> Error: ".mysqli_error($studconn)."<hr><br>";}                            
                            $to = $_SESSION['email'];
                            $sub = "Password Changed Successfully";
                            $msg = "Hello $usrval, \n\r Your password has been changed on ".date("d/m/y h:i")." \n\r Thank you";
                            $from = "From: Newhost@email.com";
                            mail($to,$sub, $msg, $from);
                            header("Location: logout.php");
                        }
                        else {echo "<footer><p style = 'color: red'>Password do not match the required length.<p></footer>";}
                    }
                    else { echo "<footer><p style = 'color: red'>New Passwords do not match. </p></footer>";}
                }
                else { echo "<footer><p style = 'color: red'>Old Password entered is wrong. </p></footer>";}
            }            
        }        
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Change Password</title>
        <style>
            body {
                display: flex;
                background-color: #d5d8dc;
                margin-top: 200px;
                align-items: center;
                justify-content: center;                
            }
            td {
                padding: 8px;
            }
        </style>
    </head>
    <body>
        <form action = 'resetpass.php' method = 'POST'>
            <h1>Change Your Password</h1>
            <table>
                <tr>
                    <td><label for = 'OldPass'>Password*:</label></td>
                    <td><input type = 'password' name = 'OldPass' required></td>
                </tr>
                <tr>
                    <td><label for = 'NewPass'>New Password: </label></td>
                    <td><input type = 'password' name = 'NewPass'required></td>
                </tr>
                <tr>
                    <td><label for = 'ConfirmPass'>Confirm Password: </label></td>
                    <td><input type = 'password' name = 'ConfirmPass' required></td>
                </tr>
                <tr>
                    <td><input type = 'submit' name = 'chpass' value = 'Change Password'></td>
                </tr>
            </table>
            <p>* Enter password sent through mail!</p>
        </form>
    </body>
</html>
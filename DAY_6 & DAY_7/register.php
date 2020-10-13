
<?php
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    $NameofStudent = $_POST['RegisterStudentName'];
    $StudentRNo = $_POST['RegisterRollNo'];
    $StudentUsername = strip_tags(strtolower($_POST['RegisterUserName']));
    $emailofStudent = $_POST['RegisterEmailID'];
    $Pass1 = md5($_POST['RegisterPassword']);
    $Pass2 = md5($_POST['RegCnfPass']);
    // checkin if submit button is set
    if (isset($_POST['DataAddedtoDatabase'])) {
        // queries
        $sqlroll = "SELECT Roll_Number From StudentLogin WHERE Roll_Number = '$StudentRNo'";
        $rolliffound = mysqli_query($studconn, $sqlroll);
        $selsqluser = "SELECT Username FROM StudentLogin WHERE Username = '$StudentUsername'";
        $usriffound = mysqli_query($studconn, $selsqluser);
        $selectemail = "SELECT EmailID FROM StudentLogin WHERE EmailID = '$emailofStudent'";
        $checkemail = mysqli_query($studconn, $selectemail);
        // checking if data is already present or not
        if(mysqli_num_rows($checkemail) == 0) {
            if (mysqli_num_rows($usriffound) == 0){
                if (mysqli_num_rows($rolliffound) == 0){
                    if ($Pass1 == $Pass2) {
                        if(strlen($_POST['RegisterPassword']) >= 6 && strlen($_POST['RegisterPassword']) < 31 ) {
                            $NewRecsql = "INSERT INTO StudentLogin VALUES (NULL, '$NameofStudent', '$StudentRNo','$StudentUsername', '$emailofStudent', '$Pass1')";
                            $insertNewRec = mysqli_query($studconn, $NewRecsql);
                            if ($insertNewRec) { echo ""; }
                            else { echo mysqli_error($studconn); }                
                            header("Location: index.php");
                        }
                        else { echo " <p align = 'center' style = 'color: red'>Password do not match the required length.</p>";}
                    }
                    else { echo " <p align = 'center' style = 'color: red'>Passwords do not match. </p>"; }
                }
                else { echo " <p align = 'center' style = 'color: red'>Roll No $StudentRNo is already registered. </p>"; }
            }
            else { echo " <p align = 'center' style = 'color: red'>Username is already in use.";}
        }
        else { echo " <p align = 'center' style = 'color: red'>Email Id is already used.";}

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
        <style>
            body {
                background-color: #eaeded;
                padding: 8px;
            }
            td {
                padding: 8px;
            }
        </style>
    </head>
    <body>
    <form action = 'register.php' method = 'POST'>
        <table style = 'margin-left: auto; margin-right: auto; margin-top: 30px'>
            <tr align = 'left'>
                <td><h1><strong>Register..</strong></h1><td>
            </tr>
            <tr>
                <td><label for = 'RegisterStudentName'> Name: </label></td>
                <td><input type = 'text' name = 'RegisterStudentName' placeholder = 'Enter your Full Name' required></td>
            </tr>
            <tr>
                <td><label for = 'RegisterRollNo'> Roll No: </label>
                <td><input type = 'text' name = 'RegisterRollNo' required></td>
            </tr>
            <tr>
                <td><label for = 'RegisterEmailID'>Email Id: </label></td>
                <td><input type = 'email' name = 'RegisterEmailID' required></td>
            </tr>
            <tr>
                <td><label for = 'RegisterUserName'> Username: </label></td>
                <td><input type = 'text' name = 'RegisterUserName' placeholder = 'Enter UserName in lowercase' required></td>
            </tr>
            <tr>
                <td><label for = 'RegisterPassword'>Password: </label></td>
                <td><input type = 'password' name = 'RegisterPassword' required></td>                
            </tr>
            <tr>
                <td></td>
                <td>(Password should be greater than 6 & less than 30 characters)</td>
            </tr>
            <tr>
                <td><label for = 'RegCnfPass'>Confirm Password: </label></td>
                <td><input type = 'password' name = 'RegCnfPass' reqired></td>                
            </tr>
            <tr>
                <td></td>
                <td align = 'left'><input type = 'submit' name = 'DataAddedtoDatabase' value = 'Submit'>
        </table>
        </body>

    
    </form>
</html>
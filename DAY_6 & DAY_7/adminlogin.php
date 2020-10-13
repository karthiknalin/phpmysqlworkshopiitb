<?php
    require("connection.php");    
    error_reporting(E_ALL ^ E_NOTICE);
    session_start();   
?>

<!DOCTYPE html>
<html>
    <head>
    <title style = 'color: #34495e'>Admin Login</title>
        <style>
            table {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                align-items: center;
                margin-top: 250px;
                color: #34495e;                 
                background-color: #f0f3f4;              
            }
            td {
                padding: 10px;
            }
            body {
                background-color: #d5dbdb;
            }
        </style>
    </head>
    <body>
        <form action = 'adminlogin.php' method = 'POST'>
            <table>
                <tr>
                    <td><label for = 'admusr'>Username:</label></td>
                    <td><input type = 'text' name = 'admusr' placeholder = 'Enter Admin Username' size = '14' required></td>
                </tr>
                <tr>
                    <td><label for = 'admpass'>Password:</label></td>
                    <td><input type = 'password' name = 'admpass' placeholder = 'Enter Admin Password' size = '14' required></td>
                </tr>
                <tr>
                    <td></td>
                    <td align = 'right'><input type = 'submit' name = 'admlog' value = 'Login'></td>
                </tr>
            </table>

    </body>
</html>

<?php
    $admusr = strip_tags($_POST['admusr']);
    $admpass = md5(strip_tags($_POST['admpass']));
    $dbsql = "SELECT * FROM AdminLogin WHERE Username = '$admusr'";
    $dbrec = mysqli_query($admconn, $dbsql);
    if ($dbrec) { echo ""; }
    else { echo "<hr><br>Error".mysqli_error($admconn);}
    if (isset($_POST['admlog'])) {
        if (mysqli_num_rows($dbrec) > 0) {
            if ($check = mysqli_fetch_array($dbrec)) {
                $adminuser = $check['Username'];
                $adminpass = $check['PassHash'];
                if ($admusr == $adminuser) {
                    if ($admpass == $adminpass) {
                        $_SESSION['ADMUsername'] = $admusr;
                        $_SESSION['ADMPassword'] = $admpass;
                        header("Location: adminpage.php");
                    }
                    else { echo " <p align = 'center' style = 'color: red'><strong>Entererd password is incorrect.</strong></p>";}
                }
                else { echo " <p align = 'center' style = 'color: red'><strong>Entererd username is incorrect.</strong></p>";}
            }        
        }
        else { echo " <p align = 'center' style = 'color: red'><strong>No such record found.</strong></p>";}
    }
?>
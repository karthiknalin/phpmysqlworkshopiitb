<?php session_start(); ?>
<html  style = 'background-color: #aeb6bf'> 
    <title> Student Record </title>
    <form action = 'index.php' method = 'POST'>
        <table style = 'color: #2c3e50; display: flex; justify-content: center; align-items: stretch;background-color: white; border: 5px solid white; margin-left: auto; margin-right: auto; margin-top: 300px;'>
            <tr>
                <td><label for = 'name'>Username :</label></td>
                <td><input type = 'text' name = 'name' required placeholder = 'Enter your username'></td>
            </tr>
            <tr>
                <td><label for = 'password'>Password :</label></td>
                <td><input type = 'password' name = 'password' required placeholder = 'Enter your password'></td>
            </tr>
            <tr>
                <td></td>
                <td style = 'text-align: right'><input type = 'submit' name = 'log' value = 'Login' style = 'color: #2c3e50'></td>                
            </tr>
            <tr>
    </form>
                <form action = 'forgotpass.php' method = 'POST'>
                    <td><input type ='submit' value = 'Forgot Password ?' name = 'forgotpassword' style = 'color:red;'></a></td>
                </form>
            </tr>                        
    <form action = "register.php" method = "POST">
            <tr>
                <td><input type = 'submit' name = 'newuser' value = 'New User' style = 'color: #5499c7'></td>            
    </form>
    <form action = 'adminlogin.php' method = 'POST'>
                <td align = 'right'><input type = 'submit' name = 'admlogin' value = 'Admin Login' style = 'color: #27ae60'></td>
            </tr>
    </form>
    </table>
</html>

<?php        
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    $usrnm = strip_tags($_POST['name']);
    $passwd = md5($_POST['password']);
    // checking login button is set or not
    if ($_POST['log']){
        $selsql = "SELECT Username, Password_ FROM StudentLogin WHERE Username = '$usrnm'";
        $getquery = mysqli_query($studconn, $selsql);
        if ($getquery) { echo "";}
        else { echo "<br><hr> Error: ".mysqli_error($studconn)." <br><hr>"; }
        if (mysqli_num_rows($getquery) > 0) {
            if ($rows = mysqli_fetch_array($getquery)) {
                $getusername = $rows['Username'];
                $getpassword = $rows['Password_'];
                if ($usrnm == $getusername) {
                    if ($passwd == $getpassword) {
                        $_SESSION['studentusername'] = $usrnm;
                        $_SESSION['studentpassword'] = $passwd;
                        header("Location: studentlogin.php");
                    }
                    else { echo " <p align = 'center' style = 'color: red'><strong>Entererd password is incorrect.</strong></p>";}
                }
                // else { echo " <p align = 'center' style = 'color: red'><strong>Username is incorrect.</strong></p>";}
            }
        }
        else { echo " <p align = 'center' style = 'color: red'><strong>No such record found.</strong></p>";}
    }
        
?>
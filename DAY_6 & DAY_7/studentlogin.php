<?php
    session_start();
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    //echo $_POST['username']."<hr>".$_POST['password']."<hr>";
    $Namee = $_SESSION['studentusername'];
    $Passw = $_SESSION['studentpassword'];
    if (isset($_SESSION['studentusername'])){    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Student Page</title>
        <h1 style = 'color: #34495e'><p align = 'center'>Welcome <?php echo $Namee ?>!</p></h1>
        <style>
            form{
                display: flex;
                flex-direction: column;               
                align-items: center;
                justify-content:space-around;
                margin-top: 200px;
                
            }
            i {
                color: blue;
            }
            table {
                align: center;
                background-color: red;
            }
            body {
                background-color: #eaeded;
            }
            label {
                color: #34495e;
            }
            </style>
    </head>
    <body>
        <form action = 'studentlogin.php' method = 'POST'>
            <label for ='disp'> To view your marksheet click the <i>'Display Marksheet'</i> button </label>
            <p><input type = 'submit' name = 'disp' value = 'Display Marksheet'><br></p>
            <label for = 'logout'> For logging out from the session click <i color = ''>'Logout'</i> button</>
            <p align = 'center'><input type = 'submit' name = 'logout' value = 'Log Out'></p>
        </form>
    </body>
</html>
                            
<?php
    }
    else { header("Location: logout.php");}
    if ($_POST['disp']) { header("Location: dispmksht.php"); }
    if ($_POST['logout']) { header("Location: logout.php"); }    
?>
<?php
    session_start();
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    if (isset($_SESSION['ADMUsername']) && isset($_SESSION['ADMPassword'])) {   
        if ($_POST['ins']) {
            header("Location: insertdata.php");                   
        }
        if ($_POST['upd']) {
            header("Location: updatedata.php");
        }    
        if ($_POST['del']) {
            header("Location: delete.php");
        }
        if ($_POST['lout']) {
            header("Location: logout.php");
        }
    }
    else { header("Location: logout.php"); }
?>
<!DOCTYPE html>
<html>
    <head>
        <title style = "color: #34495e">Admin Homepage</title>
        <style>
            table {
                display: flex;
                flex-direction:column;
                justify-content:space-around;
                align-items:center;                
                margin-top: 300px;
            }
            td {
                display: flex;
                flex-direction:column;
                justify-content: space-around;
                align-items:center;
                padding: 10px;                
            }
            input[type = submit] {
                height: 2em;
                width: 20em;
                color: #34495e;
            }
            body {
                background: #aeb6bf;
            }
        </style>
    </head>
    <body>
        <form action = 'adminpage.php' method = 'POST'>
            
            <table>
                <tr>
                    <td><input type = 'submit' name = 'ins' value = 'INSERT'></td>
                    <td><input type = 'submit' name = 'upd' value = 'UPDATE'></td>
                    <td><input type = 'submit' name = 'del' value = 'DELETE'></td>
                    <td><input type = 'submit' name = 'lout' value = 'Logout'></td>
                </tr>
            </table>
        </form>
    </body>
</html>
        
        
                   
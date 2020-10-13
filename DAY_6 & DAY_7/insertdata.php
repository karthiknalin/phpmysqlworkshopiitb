<?php
    session_start();
    require ("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    if (isset($_SESSION['ADMUsername']) && isset($_SESSION['ADMPassword'])) {
        if (isset($_POST['back'])) { header("Location: adminpage.php"); }
        if (isset($_POST['lout'])) { header("Location: logout.php"); }
        if (isset($_POST['EnterData'])) {
            $RollNo = $_POST['rno'];
            $StudName = $_POST['studname'];        
            $PHP = $_POST['MarksinPhp'];
            $MySQL = $_POST['MarksinMysql'];
            $HTML = $_POST['MarksinHtml'];
            $AggMarks = $PHP + $MySQL + $HTML;
            $Perc = round((($AggMarks/300)*100), 2);   

            $sqlcheck = "SELECT Roll_Number FROM StudentRecord WHERE Roll_Number = '$RollNo'";
            $rollfound = mysqli_query($admconn, $sqlcheck);
            if(mysqli_num_rows($rollfound) == 0) {
                $sqlinsert = "INSERT INTO StudentRecord VALUES (NULL,'$StudName', '$RollNo', $PHP, $MySQL, $HTML, $AggMarks, $Perc)";
                $insertquery = mysqli_query($admconn, $sqlinsert);

                if($insertquery) {            
                    header('Location: adminpage.php');
                }
                else {
                    echo "<br><hr> Error:".mysqli_error($admconn)."<br><p style = 'color: red'>Record not entered properly.</p>";  
                }
            }
            else { echo " <p style = 'color: red'><strong>Roll No is already present in the database.</strong></p>";}
        }        
    }
    else { header("Location: logout.php"); }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Insert student data to record</title>
        <style>
            label {
                color: #34495e;
            }
            input[type = submit] {
                color: #34495e;
                height: 2em;
                width: 8em;
            }
            body {
                background-color: #aeb6bf;
            }
            table {
                display:flex;
                flex-direction:column;
                justify-content:space-around;
                align-items:center;
                margin-top: 30px;
            }
            td {                                
                padding: 10px;
            }
            h1 {
                color: #34495e;
                margin-left: 600px;                
                margin-top: 140px;
            }
        </style>
        
    </head>
    <body>
        <form action = 'insertdata.php' method = 'POST'>
        <input type = 'submit' name = 'back' value = 'Back'>
        <input type = 'submit' name = 'lout' value = 'Logout' style = 'margin-left: 1600px'>
            <h1>Enter New Record</h1>
            <table>
                <tr>
                    <td><label for = 'rno'>Roll No: </label></td>
                    <td><input type = 'text' name = 'rno'></td>
                </tr>
                <tr>
                    <td><label for = 'studname'>Name: </label></td>
                    <td><input type = 'text' name = 'studname'></td>
                </tr>                    
                <tr>
                    <td><label for = 'MarksinPhp'>PHP Marks: </label></td>
                    <td><input type = 'number' name = 'MarksinPhp'></td>
                </tr>
                <tr>
                    <td><label for = 'MarksinMysql'>MySQL Marks: </label></td>
                    <td><input type = 'number' name = 'MarksinMysql'></td>
                </tr>
                <tr>
                    <td><label for = 'MarksinHtml'>HTML Marks: </label></td>
                    <td><input type = 'number' name = 'MarksinHtml'></td>
                </tr>                    
                <tr>
                    <td></td>            
                    <td align = 'right'><input type = 'submit' name = 'EnterData' value = 'Submit'></td>
                </tr>                                    
            </table>
        </form>
    </body>
</html>
    
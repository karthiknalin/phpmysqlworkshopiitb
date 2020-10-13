<?php 
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);
    require("connection.php");
    if (isset($_SESSION['ADMUsername']) && isset($_SESSION['ADMPassword'])) {
        if(isset($_POST['sub'])) {
            $rno = $_POST['rollnumber'];
            $vals = $_POST['checkedboxes'];
            foreach ($vals as $newvals){
                if ($newvals == 'Name') {                    
                    $newname = $_POST['newname'];
                    $newnamesql = "UPDATE StudentRecord SET Name_ = '$newname' WHERE Roll_Number = '$rno'";
                    $newnamequery = mysqli_query($admconn, $newnamesql);
                    if(!$newnamequery) { echo "<hr><br>Error: ".mysqli_error($admconn); }
                }
                else if ($newvals == 'rno') {                    
                    $newrollno = $_POST['newrollno'];
                    $newrollsql = "UPDATE StudentRecord SET Roll_Number = '$newrollno' WHERE Roll_Number = '$rno'";
                    $newrollquery = mysqli_query($admconn, $newrollsql);
                    if(!$newrollquery) { echo "<hr><br>Error: ".mysqli_error($admconn); }
                }
                else if ($newvals == 'phpmks') {                    
                    $newphp = $_POST['newphp'];
                    $prevmks = "SELECT MySQL, HTML FROM StudentRecord WHERE Roll_Number = '$rno'";
                    $prevmksquery = mysqli_query($admconn, $prevmks);
                    if ($newval = mysqli_fetch_array($prevmksquery)) {
                        $pmysql = $newval['MySQL'];
                        $phtml = $newval['HTML'];
                    }
                    $AggMarks = $newphp + $pmysql + $phtml;
                    $Perc = round((($AggMarks / 300) * 100), 2);                       
                    $newphpsql = "UPDATE StudentRecord SET PHP = $newphp, TotalMarks = $AggMarks, Aggregate_Percentage = $Perc WHERE Roll_Number = '$rno'";
                    $newphpquery = mysqli_query($admconn, $newphpsql);
                    if(!$newphpquery) { echo "<hr><br>Error: ".mysqli_error($admconn); }
                }
                else if ($newvals == 'mysqlmks') {                    
                    $newmysql = $_POST['newmysql'];
                    $prevmks = "SELECT PHP, HTML FROM StudentRecord WHERE Roll_Number = '$rno'";
                    $prevmksquery = mysqli_query($admconn, $prevmks);
                    if ($newval = mysqli_fetch_array($prevmksquery)) {
                        $pphp = $newval['PHP'];
                        $phtml = $newval['HTML'];
                    }
                    $AggMarks = $newmysql + $pphp + $phtml;
                    $Perc = round((($AggMarks / 300) * 100), 2);                       
                    $newmysqlque = "UPDATE StudentRecord SET MySQL = $newmysql, TotalMarks = $AggMarks, Aggregate_Percentage = $Perc WHERE Roll_Number = '$rno'";
                    $newmysqlquery = mysqli_query($admconn, $newmysqlque);
                    if(!$newmysqlquery) { echo "<hr><br>Error: ".mysqli_error($admconn); }
                }
                else if ($newvals == 'htmlmks') {                    
                    $newhtml = $_POST['newhtml'];
                    $prevmks = "SELECT PHP, MySQL FROM StudentRecord WHERE Roll_Number = '$rno'";
                    $prevmksquery = mysqli_query($admconn, $prevmks);
                    if ($newval = mysqli_fetch_array($prevmksquery)) {
                        $pphp = $newval['PHP'];
                        $pmysql = $newval['MySQL'];
                    }
                    $AggMarks = $pphp + $pmysql + $newhtml;
                    $Perc = round((($AggMarks / 300) * 100), 2);
                    $newhtmlsql = "UPDATE StudentRecord SET HTML = $newhtml, TotalMarks = $AggMarks, Aggregate_Percentage = $Perc WHERE Roll_Number = '$rno'";
                    $newhtmlquery = mysqli_query($admconn, $newhtmlsql);
                    if(!$newhtmlquery) { echo "<hr><br>Error: ".mysqli_error($admconn); }
                }
            }
        }
        if (isset($_POST['back'])) { header("Location: adminpage.php"); }
        if (isset($_POST['lout'])) { header("Location: logout.php"); }
    }
    else { header("Location: logout.php"); }

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Update Record</title>
        <style>
            body {
                background-color: #aeb6bf;
            }
            table {
                color: #34495e;
                display:flex;
                flex-direction: column;
                justify-content: space-around;
                align-items:center;
                padding: 10px;                
            }
            td {
                color: #34495e;
                padding: 10px;
            }
            input[type = submit] {
                color: #34495e;
                height: 2em;
                width: 8em;
            }
            p{
                color: red;
                margin-left: 30px;
            }
        </style>
    </head>
    <body>
        <form action = 'updatedata.php' method = 'POST'>
            <input type = 'submit' name = 'back' value = 'Back'>
            <input type = 'submit' name = 'lout' value = 'Logout' style = 'margin-left: 1600px'>
            <table style = 'margin-top:80px;'>
                <tr>
                    <td><label for = 'roll number'>Enter roll number of student you want to edit: </label></td>
                </tr>
                <tr>
                    <td><input type = 'text' name = 'rollnumber'></td>
                </tr>
            </table>
            <br>
            <table>
                <tr>
                    <td><input type = 'checkbox' name = 'checkedboxes[]' value = 'Name'></td>
                    <td>Name</td>
                    <td><input type = 'text' name = 'newname' placeholder = 'Enter name'></td>
                <tr>
                    <td><input type = 'checkbox' name = 'checkedboxes[]' value = 'rno'></td>
                    <td>Roll Number</td>
                    <td><input type = 'text' name = 'newrollno' placeholder = 'Enter roll no'></td>
                </tr>
                <tr>                   
                    <td><input type = 'checkbox' name = 'checkedboxes[]' value = 'phpmks'></td>
                    <td>PHP</td>
                    <td><input type = 'number' name = 'newphp' placeholder = 'Enter marks in PHP'></td>
                </tr>
                <tr>
                    <td><input type = 'checkbox' name = 'checkedboxes[]' value = 'mysqlmks'></td>
                    <td>MySQL</td>
                    <td><input type = 'number' name = 'newmysql' placeholder = 'Enter marks in MySQL'></td>
                </tr>
                <tr>
                    <td><input type = 'checkbox' name = 'checkedboxes[]' value = 'htmlmks'></td>
                    <td>HTML</td>
                    <td><input type = 'number' name = 'newhtml' placeholder = 'Enter makes in HTML'></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td align = 'right'><input type = 'submit' name = 'sub' value = 'Submit'></td>
                </tr>
            </table>
            <p><sup>*</sup>Important Note: Please do click the checkbox on the left before submitting or else the values won't be updated.</p>
        </form>
    </body>
</html>
<?php   
    session_start();
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    $Namee = $_SESSION['studentusername'];
    $usrifsql = "SELECT Roll_Number FROM StudentLogin WHERE Username = '$Namee'";
    $usrfound = mysqli_query($studconn, $usrifsql);
    
    if (isset($Namee) && isset($_SESSION['studentpassword'])) {
            if (mysqli_num_rows($usrfound) > 0) {
            if ($rows = mysqli_fetch_array($usrfound)) {
                $SRNo = $rows['Roll_Number'];
                $recsql = "SELECT * FROM StudentRecord WHERE Roll_Number = '$SRNo'";
                $recfound = mysqli_query($studconn, $recsql);
                if (mysqli_num_rows($recfound) > 0) {
                    if ($newrow = mysqli_fetch_array($recfound)) {
                        $SNAME = $newrow['Name_'];
                        $PHPMK = $newrow['PHP'];
                        $MySQLMK = $newrow['MySQL'];
                        $HTMLMK = $newrow['HTML'];
                        $TotalMK = $newrow['TotalMarks'];
                        $AggPC = $newrow['Aggregate_Percentage'];
                    }
                }
                else { echo " <p style = 'color: red; margin-bottom: auto;'><strong>No marksheet found!!!</p></strong>"; }
            }        
        }
    }
?>

<?php
    if ($_POST['psub']) {
        $to = $_POST['pemail'];
        $from = "From: Newhost@email.com";
        $sub = "Result";
        $AggPC = 39;
        if ($AggPC > 60) {
            $msg = "Dear Sir/Madam,\n\rYour Son/Daughter studying in our college has secured more than 60% in last semester. \n\rCongratulations! $SNAME has got <i>$AggPC</i>.\n\rThank you. ";
            mail($to, $sub, $msg, $from);
        }
        else if ($AggPC >= 40 && $AggPC < 60) {
            $msg = "Dear Sir/Madam,\n\rYour Son/Daughter studying in our college has secured <i>$AggPC</i> in last semester. \n\rBetter luck next time! \n\rThank you";
            mail($to, $sub, $msg, $from);
        }
        else {
            $msg = "Dear Sir/Madam,\n\rYour Son/Daughter studying in our college has secured only <i>$AggPC</i> in last semester. \n\rHe/She has failed in the exam has to write the improvement exam. \n\rThank you.";
            mail($to, $sub, $msg, $from);
        }
    }
    if ($_POST['home']) {
        header("Location: studentlogin.php");
    }
?>


<!DOCTYPE html>
<html>
<form action = 'dispmksht.php' method = 'POST'>
    <input type = 'submit' name = 'home' value = 'HOME' style = 'margin-top: 30px; margin-left: 30px'>
    <head>
        <title>Marksheet </title>
        <style>
            table {                
                margin-left: 40px;
                border: '2';                
            }
            body {
                display: flex;
                flex-direction: column;
                justify-content: space-around;
                border: solid 2px;
                background-color: #eaeded;
            }
            h1 {
                text-align: center;
                color: #7dcea0;
            }
            p,dd{
                margin-left: 40px;
                color: #34495e;
            }
            th, td {
                padding: 10px;
                color: #34495e;
            }
        </style>
    </head>
    
    <body>
            <h1>ABC College</h1>
            <p><b>Name of the Student:</b> <?php echo $SNAME; ?></p>
            <p><b>Roll No. :</b> <?php echo $SRNo; ?></p>
            <table>
                <tr>
                    <th>Sr No. </th>
                    <th>Subject </th>
                    <th>Marks </th>
                </tr>               
                <tr>
                    <td>1.</td>
                    <td>PHP </td>
                    <td><?php echo $PHPMK; ?></td>
                </tr>
                <tr>
                    <td>2.</td>
                    <td>MySQL </td>
                    <td><?php echo $MySQLMK; ?></td>
                </tr>
                <tr>
                    <td>3.</td>
                    <td>HTML</td>
                    <td><?php echo $HTMLMK; ?></td>
                </tr>                
            </table>
            <dl>
                <dd>
                    <b>Total Marks obtained:</b> <?php echo $TotalMK; ?>
                </dd>
                <dd>
                    <b>Percentage:</b> <?php echo $AggPC; ?>
                </dd><br>
                <dd><i>
                    <?php 
                        if ($AggPC > 60) {
                            echo "<strong><i>Congratulations! You scored $AggPC%.</strong></i>";
                        }
                    ?>
                <dd></i>
    </body><br>   
    <table>
        <tr>
            <td><label for = 'pemail' style = 'color: #34495e'>Enter email: </label></td>
            <td><input type = 'email' name = 'pemail' placeholder = 'Enter your Parents email id'></td>
            <td><input type = 'submit' name = 'psub' value = 'Send'></td>                
        </tr>

</html>
<form action = 'q1_md5.php' method = 'POST'>
    <p>Username : <input type = 'text' name = 'usrname'>
    <p>Password : <span><input type = 'password' name = 'pass'></span>
    <p><input type = 'submit' name = 'sub' value = 'Submit'>
</form>

<?php
    // to avoid all notices
    error_reporting(E_ALL ^ E_NOTICE);

    // variables
    $host = 'localhost';
    $dbname = 'data1';
    $user = 'root';
    $conn = mysqli_connect($host, $user, "", $dbname);    
    $username = $_POST['usrname'];
    $pass = md5($_POST['pass']);
    $insertquery = "INSERT INTO login_details Values('$username', '$pass')";

    if ($_POST['sub']) {
        if ($_POST['sub']) {
            mysqli_query($conn, $insertquery);
            die("<br> <p style = 'color : Green;'> Username and Password submitted successfully. </p>");
        }
        else {
            echo "<br><br> Error: ".mysqli_error($conn);
        }
    }

?>
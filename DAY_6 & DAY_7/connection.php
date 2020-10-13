<?php
    $host = "localhost";
    $user = "root";
    $dbname = "WebApp";
    $admconn = mysqli_connect($host, $user, "", $dbname);
    if ($admconn) {
        echo "";
    }
    else {
        echo "<br><hr> Error: ".mysqli_error($admconn);
    }
    $studconn = mysqli_connect($host, $user, "", $dbname);
    if ($studconn) {
        echo "";
    }
    else {
        echo "<br><hr> Error: ".mysqli_error($studconn);
    }
    
?>
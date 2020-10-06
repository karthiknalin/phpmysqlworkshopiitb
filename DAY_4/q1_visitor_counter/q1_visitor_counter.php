<?php
    require("q1_visitor_counter_sql_connection.php");
    
    // query
    error_reporting(E_ALL ^ E_NOTICE);
    $display = "SELECT * FROM Viewers";
    $res = mysqli_query($conn, $display);
    $rows = mysqli_fetch_array($res);
    $view = $rows['Count_viewer'];

    if(empty($view)) {
        $view = 1;
        $insert_in = "INSERT INTO Viewers(Count_viewer) VALUES($view)";
        $newres = mysqli_query($conn, $insert_in);
    }
    
    $addviewer = $view + 1;
    $update_view = "UPDATE Viewers SET Count_viewer = '$addviewer'";
    $addviewer_count = mysqli_query($conn, $update_view);
    echo "<br>No. of visitors: ".$addviewer;
    mysqli_close($conn);
?>
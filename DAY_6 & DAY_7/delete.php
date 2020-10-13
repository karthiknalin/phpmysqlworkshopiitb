<!DOCTYPE html>
<html>
    <head>
        <title>Delete Record</title>
        <style>
            body {                
                background-color: #aeb6bf;
            }
            input[type = submit] {
                color: #34495e;
                display: flex;
                padding: 10px;
                height: 3em;
                width: 8em;
                justify-content:space-around;
                margin-top: 10px;                
                margin-left: 800px;
            }
            select{
                color: #34495e;
                display: flex;
                padding: 10px;
                height: 3em;
                width: 12em;
                justify-content:space-around;
                margin-top: 10px;
                margin-left: 770px;
            }
            h1 {
                color: #34495e;
                justify-content: space-around;
                margin-top: 100px;
                margin-left:700px;
            }           
        </style>
        <h1>Delete a record</h1>
    </head>
    <body>
        <form action = 'delete.php' method = 'POST'>
<?php
    session_start();
    require("connection.php");
    error_reporting(E_ALL ^ E_NOTICE);
    if (isset($_SESSION['ADMUsername']) && isset($_SESSION['ADMPassword'])) {
        $selectquery_for_update = 'SELECT * FROM StudentRecord ORDER BY ID ASC';
        $selectquery_for_admin = mysqli_query($admconn, $selectquery_for_update);        
        
        if (mysqli_num_rows($selectquery_for_admin) > 0) {
            echo "  <select name = 'deleteval'>";
            while ($rows = mysqli_fetch_array($selectquery_for_admin)) {
                
                $id = $rows['ID'];
                $name = $rows['Name_'];
                $studrollnumber = $rows['Roll_Number'];
                echo "<p><option value = '$id'>$studrollnumber $name</option></p>";
            }
            echo "                    
                        <input type = 'submit' name = 'delete' value = 'Delete'>
                        <input type = 'submit' name = 'back' value = 'Back'>                                        
                    ";                
            if (isset($_POST['delete'])) {
                $n = $_POST['deleteval'];
                $deletesql= "DELETE FROM StudentRecord WHERE ID = $n";
                $deletequery = mysqli_query($admconn, $deletesql);
                if($deletequery){ header("Location: adminpage.php");}
                else {echo "<hr><br> Error:".mysqli_error($admconn);}
            }
            else if (isset($_POST['back'])) { header("Location: adminpage.php"); }
        }
        echo "</select>";
    }
    else { header("Location: Logout.php"); }
?>
        </form>
    </body>
</html>
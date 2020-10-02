
<form action = "q1.php" method = "POST">
    <p>
        Enter your name : <input type = 'text' name = 'yname'><br>
        <dl>
            <br><dt>Enter marks in the following:</dt><br>
            <br><dd>Subject 1: <input type = 'number' name = 's1'></dd><br>
                <dd>Subject 2: <input type = 'number' name = 's2'></dd><br>
                <dd>Subject 3: <input type = 'number' name = 's3'></dd><br>
                <dd>Subject 4: <input type = 'number' name = 's4'></dd><br>
                <dd>Subject 5: <input type = 'number' name = 's5'></dd><br>
                <p><input type = 'submit' name = 'sub' value = 'Submit'></p>
        </dl>
    </p>
</form>

<?php

    error_reporting(E_ALL ^ E_NOTICE);
    // variables
    $host = 'localhost';
    $user = 'root';
    $dbname = 'result';
    $name = $_POST['yname'];
    $marks_1 = $_POST['s1'];
    $marks_2 = $_POST['s2'];
    $marks_3 = $_POST['s3'];
    $marks_4 = $_POST['s4'];
    $marks_5 = $_POST['s5'];
    $conn = mysqli_connect($host, $user, "", $dbname) or die (mysqli_error($conn));

    // Calculation
    $Total_marks = 500;
    $Total_marks_obtained = $marks_1 + $marks_2 + $marks_3 + $marks_4 + $marks_5;
    $Percentage = ((float)($Total_marks_obtained/$Total_marks)*100);

    // queries
    $data = "INSERT INTO class1(StudentName, Sub1, Sub2, Sub3, Sub4, Sub5, Total_obtained, Total_marks, Percent) 
                    VALUES('$name', $marks_1, $marks_2, $marks_3, $marks_4, $marks_5, $Total_marks_obtained, $Total_marks, $Percentage)";
    $displayquery = "SELECT * FROM class1 ORDER BY ID ASC";

    // to  insert values
    if ($_POST['sub']) {
        $query = mysqli_query($conn, $data);
        echo "<strong>Data Submitted </strong> ";
    }
    else
        echo mysqli_error($conn);
    // Display Data
    $disp1 = mysqli_query($conn, $displayquery);
    
    echo "  <form action = 'q1.php' method = 'POST'>
            <select name = 'select'>";

    while ($row = mysqli_fetch_array($disp1)) {
        $id1     = $row['Id'];
        $Sname1  = $row['StudentName'];
       

        echo "<option value = '$id1'>$Sname1</option>";

    }
   
    echo "  </select>
                <span>
                    <input type = 'submit' name = 'disp' value = 'Display'>
                </span>
            </form>
        ";
    $selection = $_POST['select'];
    $dispquery = "SELECT * FROM class1 WHERE ID = $selection";
    if ($_POST['disp']) {
        $disp2 = mysqli_query($conn, $dispquery);
        if (mysqli_num_rows($disp2)) {
            if ($row = mysqli_fetch_array($disp2)) {
                $id2     = $row['Id'];
                $Sname2  = $row['StudentName'];
                $m1     = $row['Sub1'];
                $m2     = $row['Sub2'];
                $m3     = $row['Sub3'];
                $m4     = $row['Sub4'];
                $m5     = $row['Sub5'];
                $TO     = $row['Total_obtained'];
                $TM     = $row['Total_marks'];
                $PC     = $row['Percent']; 
                
                //displaying data
                echo "  
                        <dl>
                            Name: $Sname2 <br><br>
                            <dt>Marks in each Subject</dt><br>
                            <dd>Subject 1: $m1 </dd><br>
                            <dd>Subject 2: $m2 </dd><br>
                            <dd>Subject 3: $m3 </dd><br>
                            <dd>Subject 4: $m4 </dd><br>
                            <dd>Subject 5: $m5 </dd><br>
                            <dd>Total Marks Obtained: $TO</dd><br>
                            <dd>Total Marks: $TM</dd><br>
                            <dd>Percentage: $PC</dd>
                    
                        </dl>
                    ";
                
            }
        }
        else{ 
            echo "<br><br>No data to display";
        }
    }

?>


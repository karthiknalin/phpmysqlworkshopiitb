<html>
    <?php
        require('q1.php');
        $Total_marks_obtained = 55 + 66 + 77 + 88 + 78;
        $Percentage = (($Total_marks_obtained/$Total_marks)*100);
        $rdat = "INSERT INTO class1(StudentName, Sub1, Sub2, Sub3, Sub4, Sub5, Total_obtained, Total_marks, Percent) 
                    VALUES('Rohan', 55, 66, 77, 88, 78, $Total_marks_obtained, $Total_marks, $Percentage)";
        // insert data
        echo "
                <form action = 'q2.php' method = 'POST'><br>
                    <strong>To insert:</strong><br>
                    <ol>
                        Name: Rohan<br>
                        Marks in Subject(s): 55,66,77,88,76.<br>
                        Click Insert<br><br>
                        <span><input type = 'submit' name = 'insert' value = 'Insert'></span>
                    </ol>
                </form>
        ";
        if($_POST['insert']){
            $qdat = mysqli_query($conn, $rdat);
            echo "<strong>Data Inserted Successfully</strong>";
        }   
    ?>
    
    <form action = 'q2.php' method = 'POST'>
        <p><strong>Update The record</strong><br></p>
        <dd><input type = 'Submit' name = 'update' value = 'Update'></dd>
    </form>
    <?php        
        $val = 99;
        if ($_POST['update']){
            // $update_query = mysqli_query($conn, "UPDATE class1 SET Sub5 = $val Where ID = 'Rohan'");
            // $updateTO = "";
            $fetch = mysqli_query($conn, "SELECT * FROM class1 WHERE StudentName = 'Rohan'");
            if (mysqli_num_rows($fetch) > 0) {
                if ($nrow = mysqli_fetch_array($fetch)) {                    
                    $mark1  = $nrow['Sub1'];
                    $mark2  = $nrow['Sub2'];
                    $mark3  = $nrow['Sub3'];
                    $mark4  = $nrow['Sub4']; 
                    
                    // updating data
                    $totobt = ($mark1 + $mark2 + $mark3 + $mark4 + $val);
                    $perc = (($totobt/$Total_marks)*100);
                    $updateall = mysqli_query($conn, "UPDATE class1 SET Sub5 = $val, Total_obtained = $totobt, Percent = $perc WHERE StudentName = 'Rohan'");
                    if($updateall)
                        echo "<br> <strong>Data updated Successfully</strong>";
                    else 
                        echo mysqli_error($conn);
                }
            }
            else
                echo mysqli_error($conn);
        }
        else
            echo mysqli_error($conn);
        
    ?>
</html>

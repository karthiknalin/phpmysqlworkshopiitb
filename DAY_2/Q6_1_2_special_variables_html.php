<html>
	<form action = 'Q6_1_2_special_variables_html.php' method = 'POST'><br>	
		Name of Student: <input  type = 'text' name = "myname"><br><br>
		Enter marks in Each Subject<br>
		Subject 1: <input  type = 'number' name = "num1"><br>
		Subject 2: <input  type = 'number' name = "num2"><br>
		Subject 3: <input  type = 'number' name = "num3"><br>
		Subject 4: <input  type = 'number' name = "num4"><br>
		Subject 5: <input  type = 'number' name = "num5"><br><br>
        <input type = 'submit'    value = 'Submit'>
        <input type = 'reset'    value = 'Reset'>
		<!-- <button type = 'submit' value = 'Submit'>Submit</button>
		<button type = 'reset'  value = 'reset'>Reset</button> -->
		<br><br>

        <?php
        
            error_reporting(E_ALL ^ E_NOTICE);
            $name = $_POST['myname'];
            $num1 = $_POST['num1'];
            $num2 = $_POST['num2'];
            $num3 = $_POST['num3'];
            $num4 = $_POST['num4'];
            $num5 = $_POST['num5'];
            $TMO = ($num1 + $num2 + $num3 + $num4 + $num5);
            $TM = 5 * 100;
            $PC = ($TMO/(5*($TM)))*100;

            echo " Name of the Student: " , $name , "<br>";
            echo " Marks in Each Subject<br>";
            echo " Subject 1: " , $num1 , "<br>";
            echo " Subject 2: " , $num2 , "<br>";
            echo " Subject 3: " , $num3 , "<br>";
            echo " Subject 4: " , $num4 , "<br>";
            echo " Subject 5: " , $num5 , "<br>";
            echo " Total Marks Obtained: " , $TMO , "<br>";
            echo " Total Marks: " , $TM , "<br>";
            echo " Percentage: " , $PC , "<br>";            
        ?>


	</form>
</html>




<?php
	
		error_reporting(E_ALL ^ E_NOTICE);
		$num1 = $_GET['num1'];
		$num2 = $_GET['num2'];
		$num3 = $_GET['num3'];

		if(!$num1 == 0 && !$num2 == 0 && !$num3 == 0){	
			function triangleType($n1, $n2, $n3) {
				if($n1 == $n2 && $n2 == $n3)
					echo " Equilateral Triangle.";
				else if($n1 == $n2 || $n2 == $n3 || $n3 == $n1)
					echo " Isosceles Triangle.";
				else 
					echo " Scalene Triangle.";

			}
			triangleType($num1, $num2, $num3);
		}

?>
<html>
	<form action = 'Q6_1_1_special_variables_html.php' method = 'GET'>
		<input  type = 'number' name = "num1" value = 0>
		<input  type = 'number' name = "num2" value = 0>
		<input  type = 'number' name = "num3" value = 0><br><br>
		<button type = 'submit' value = 'Submit'>Submit</button>
		<button type = 'reset'  value = 'reset'>Reset</button>
	</form>
</html>


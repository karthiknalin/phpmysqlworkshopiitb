

<form action = "q2_string_functions.php" method = 'post'>
    <input type = 'text' name = 'str'>
    <input type = 'submit' name = 'sub' value = 'Submit'>
</form>


<?php
    @$string = $_POST['str'];
    function strOperations($s) {
        // 1.
        $len = strlen($s);
        // 2.
        $arr = explode(" ", $s);
        $newarr = implode(", ", $arr);
        // 3.
        $rev = strrev($s);
        // 4. 
        $tolower = strtolower($s);
        // 5. 
        $toupper = strtoupper($s);
        // 6.
        $substring = "Hello World!";
        $s = substr_replace($s, $substring, 0);


        echo nl2br("
                <dl>
                    Operations on string <br>
                    <dd>Length of the substring: $len </dd>
                    <dd>Array of string:{ $newarr }</dd>
                    <dd>Reverse of String: $rev</dd>
                    <dd>String in lowercase: $tolower</dd>
                    <dd>String in uppercase: $toupper</dd>
                    <dd>Replaced String: $s</dd>
                </dl>
        ");      
    }

    if (@$_POST['sub']) {
        strOperations($string);
    }
    else {
        echo " Enter Text ";
    }
?>
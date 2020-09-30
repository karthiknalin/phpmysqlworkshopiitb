<?php

    $A = array(array(1, 2), array(3, 4));
    $B = array(array(5, 6), array(7, 8));

    for ($i = 0; $i < sizeof($A); $i++) {
        for ($j = 0; $j < sizeof($A); $j++)
            $res[$i][$j] = $A[$i][$j] + $B[$i][$j];
    }
    for ($i = 0; $i < sizeof($A); $i++) {
        for ($j = 0; $j < sizeof($A); $j++){
            echo $res[$i][$j] . " " ;
        }
        echo "<br>";
    }    
?>

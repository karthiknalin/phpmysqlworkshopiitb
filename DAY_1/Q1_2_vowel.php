// Checking vowel or not
<?php
    $char = 'A';
    switch ($char) {
        case 'A' :
        case 'a' :  
        case 'E' :
        case 'e' :
        case 'I' :
        case 'i' :
        case 'O' :
        case 'o' :
        case 'U' :
        case 'u' :  echo $char . " is a vowel.";
                    break;
        default  :  echo $char . " is a consonant";
    }
?>
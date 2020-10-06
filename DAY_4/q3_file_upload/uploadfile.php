<?php
    @$name  = $_FILES["mfile"]['name'];
    @$type  = $_FILES['mfile']['type'];
    @$size  = $_FILES['mfile']['size'];
    @$temp  = $_FILES['mfile']['tmp_name'];
    @$error = $_FILES['mfile']['error'];

    if ($error > 0) {
        die($error."Error.");
    }
    else {
        if (move_uploaded_file($temp, "Uploads/".$name)) {
            
            echo " File Successfully Uploaded! <br>";
            echo nl2br("
                            
                            <dl><p><span><strong> File Details</strong></span>
                                <dd>File Name       : $name </dd>
                                <dd>File Type       : $type </dd>
                                <dd>Size of the file: $size </dd>
                            </dl>
                    ");
        }
    }

?>
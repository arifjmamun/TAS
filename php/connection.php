<?php
    define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASS", "");
    define("DB_NAME", "tasdb");

    $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if (!$con) {
        echo "Server Connecting Problem! Try Again!";
    }
//     else
//     	echo "Connected";
?>
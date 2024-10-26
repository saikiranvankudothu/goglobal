<?php
    $server ="localhost";
    $username = "root";
    $password = "";
    $database="travel";

    $conn = mysqli_connect($server, $username, $password, $database,3307);  //create connection
    if($conn){
        echo "CONNECTION SUCCESS!";
    }else{
        die("ERROR: " . mysqli_connect_error());;
    
    }

?>
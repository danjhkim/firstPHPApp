<?php 
    //connect to db
    //MySQLi
    $conn = mysqli_connect("localhost","dan", "test1234", "ninja_pizza");
    // check connection
    if (!$conn) {
        echo 'Connect error: ' . mysqli_connect_error();
    }
?>
<?php
    $servername = "localhost";
    $username = "user1";
    $password = "1234";
    $dbname = "user1";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

?>
    
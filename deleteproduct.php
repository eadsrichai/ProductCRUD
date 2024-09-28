<?php
    $id_p = $_GET['id_p'];
  
    include_once('db.php');
    $sql = "DELETE FROM product 
            WHERE id_p like '$id_p'";

    if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
        header( "location: index.php" );
        exit(0);
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }



?>
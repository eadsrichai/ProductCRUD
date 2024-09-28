<?php
    $id_p = $_GET['id_p'];
    $name_p = $_GET['name_p'];
    $detail_p = $_GET['detail_p'];
    $price_p = $_GET['price_p'];
    $id_t = $_GET['id_t'];

    include_once('db.php');
    $sql = "INSERT INTO product(id_p,name_p,detail_p,price_p,id_t)
            VALUES('$id_p','$name_p','$detail_p','$price_p',$id_t)";

    if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
        header( "location: index.php" );
        exit(0);
    } else {
    echo "Error updating record: " . mysqli_error($conn);
    }



?>
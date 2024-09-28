<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>ปรับปรุงข้อมูลสินค้า</title>
</head>
<body class="container">


<?php
    include_once("header.php");
    $id = $_GET["id_p"];
    include_once('db.php');  
                
     $sql = "SELECT p.id_p, p.name_p, p.detail_p, p.price_p, t.id_t, t.name_t 
                    FROM product p, typeproduct t
                    WHERE p.id_t = t.id_t
                    AND  p.id_p like $id";

                    $sql1 = "SELECT * FROM typeproduct";
                    $result1 = $conn->query($sql1);

                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                ?>
                    <form action="updateproduct.php" method="GET">
                        <div class="mb-3">
                            <label for="id_p" class="col-form-label">รหัสสินค้า</label>
                            <input type="text" class="form-control" value="<?php echo $row['id_p']; ?>" name="id_p" id="id_p"/>
                        </div>
                        <div class="mb-3">
                            <label for="name_p" class="col-form-label">ชื่อสินค้า</label>
                            <input class="form-control" value="<?php echo $row['name_p']; ?>" name="name_p"></input>
                        </div>

                        <div class="mb-3">
                            <label for="detail_p" class="col-form-label">รายละเอียด</label>
                            <input class="form-control" value="<?php echo $row['detail_p']; ?>" name="detail_p"></input>
                        </div>

                        <div class="mb-3">
                            <label for="price_p" class="col-form-label">ราคา</label>
                            <input class="form-control col-2" value="<?php echo $row['price_p']; ?>" name="price_p"></input>
                        </div>

                        <div class="mb-3">
                            
                            <label for="id_t" class="col-form-label">ชนิดสินค้า</label>
                            <select name="id_t">
                            <?php 
                            
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    if($row['id_t'] == $row1['id_t']){ ?>
                                     <option selected value="<?php echo $row['id_t']; ?>"><?php echo $row['name_t']; ?></option>
                                <?php

                                    }else {
                                    ?>
                                 <option value="<?php echo $row1['id_t']; ?>"><?php echo $row1['name_t']; ?></option>
                                <?php  
                                  } }
                                }
                                ?>
                               
                            </select>
                        </div>
                       <div>
                        <input type="submit" class="btn btn-primary" data-bs-dismiss="modal" value="ปรับปรุงข้อมูล" />
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ออก</button>
                       </div>
                    </form>
                </div>

<?php
                        }}
?>


    
</body>
</html>

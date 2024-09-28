<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบฐานข้อมูลคลังสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="container">

    <?php
    include_once('db.php');

    $sql = "SELECT p.id_p, p.name_p, p.detail_p, p.price_p, t.name_t 
               FROM product p, typeproduct t
               WHERE p.id_t = t.id_t";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        include_once("header.php");

        echo "<table class='table  mt-3'>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>รายละเอียด</th>
        <th>ราคา</th>
        <th>ประเภทสินค้า</th>
        <th></th>
    </tr>";

        while ($row = $result->fetch_assoc()) {
            $id = $row['id_p'];
            echo "<tr>
                <td>" . $row["id_p"] . "</td>
                <td>" . $row["name_p"] . "</td>
                <td>" . $row["detail_p"] . "</td>
                <td>" . $row["price_p"] . "</td>
                <td>" . $row["name_t"] . "</td>
                <td> "
                
               
?>
                <a href='formupdate.php?id_p=<?php echo $id;?>'
                    class='btn btn-primary'>
                    <i class='bi bi-pencil'></i>
                    Update</a>

                <a href='deleteproduct.php?id_p=<?php echo $id;?>'
                class="btn btn-danger">
                        <i class='bi bi-trash'></i>
                        Delete
                </a>
                </td>
                </tr>
                <?php
        }
        echo "</table>";
        echo "<div>
                <button type='button' class='btn btn-primary'
                    data-bs-toggle='modal' data-bs-target='#addproduct'>
                    <i class='bi bi-plus'></i>
                    เพิ่ม
                </button>

            </div>";
    } else {
        echo "0 results";
    }
    // $conn->close();

    ?>

    <div class="modal fade" id='addproduct'>
    <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addproduct">เพิ่มข้อมูลสินค้า</h1>
                    <button type="button" class="btn-close" 
                        data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                <?php
                    $sql1 = "SELECT * FROM typeproduct";
                    $result1 = $conn->query($sql1);
                ?>
                    <form action="addproduct.php" method="GET">
                        <div class="mb-3">
                            <label for="id_p" class="col-form-label">รหัสสินค้า</label>
                            <input type="text" class="form-control" value="" name="id_p" id="id_p"/>
                        </div>
                        <div class="mb-3">
                            <label for="name_p" class="col-form-label">ชื่อสินค้า</label>
                            <input class="form-control" value="" name="name_p"></input>
                        </div>

                        <div class="mb-3">
                            <label for="detail_p" class="col-form-label">รายละเอียด</label>
                            <input class="form-control" value="" name="detail_p"></input>
                        </div>

                        <div class="mb-3">
                            <label for="price_p" class="col-form-label">ราคา</label>
                            <input class="form-control col-2" value="" name="price_p"></input>
                        </div>

                        <div class="mb-3">
                            
                            <label for="id_t" class="col-form-label">ชนิดสินค้า</label>
                            <select name="id_t">
                            <?php 
                            
                            if ($result1->num_rows > 0) {
                                while ($row1 = $result1->fetch_assoc()) {
                                    ?>
                                 <option value="<?php echo $row1['id_t']; ?>"><?php echo $row1['name_t']; ?></option>
                                <?php  
                                  } 
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
                <div class="modal-footer">
                    
                </div>
            </div>
        </div>
    </div>


</body>

</html>
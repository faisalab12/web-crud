<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <?php
        // require_once "../controller/Barang_Controller.php";
        // $data = new showData;

        // $items = $data -> readData();

        // echo "<pre>";
        // echo print_r($items);
        // echo "</pre>";
    ?>

    <div class="container">
        <?php
            if(empty($_GET["page"])){   
                include "tampil-data.php";
            }elseif($_GET["page"] == "tambah"){
                include "form-input.php";
            }elseif($_GET["page"] == "edit"){
                include "form-edit.php";
            }
            
        ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
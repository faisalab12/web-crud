<?php
    require_once "../controller/Barang-Controller.php";

    if (isset ($_GET['id'])){
        $master_barang = new showData();
        
        $id_barang = ($_GET['id']);

        $master_barang -> hapusData($id_barang);
    }
?>
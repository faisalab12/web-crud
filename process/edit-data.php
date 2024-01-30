<?php
    require_once "../controller/Barang-Controller.php";

    if (isset ($_POST['edit'])){
        $master_barang = new showData();
        
        $id_barang = trim($_POST['id_barang']);
        $nm_barang = trim($_POST['nm_barang']);
        $hrg_barang = trim($_POST['hrg_barang']);
        $stok_barang = trim($_POST['stok_barang']);
        $tgl_prod = trim($_POST['tgl_prod']);
        $tgl_expired = trim($_POST['tgl_expired']);

        $master_barang -> editData($id_barang,$nm_barang,$hrg_barang,$stok_barang,$tgl_prod,$tgl_expired);
    }
?>
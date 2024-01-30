<?php
    require_once "../database/database.php";

    class showData {
        public function readData (){
            $db = new dbApps();

            $mysqli = $db -> connect();

            $pages = (isset ($_GET['pages'])) ? (int) $_GET ['pages'] : 1 ;

            $keywordCol = (isset ($_GET['keywordCol'])) ? $_GET ['keywordCol'] : "" ;

            $limit = 2;

            $limitStart = ($pages - 1) * $limit;

            $nomor = $limitStart + 1;

            if($keywordCol){
                $sql = "SELECT * FROM master_barang WHERE nm_barang LIKE '%$keywordCol%' LIMIT " . $limitStart . "," . $limit;

            }else{
                $sql = "SELECT * FROM master_barang LIMIT " . $limitStart . "," . $limit;
            }

            $result = $mysqli -> query ($sql);

            $hasil = array();

            // Perulangan data
            while ($data = $result ->fetch_object()){
                $hasil[] = $data;
            }


            if(count($hasil) == 0){
                header("Location:../view/dashboard.php?alert=1");
                exit();
            }

            $mysqli -> close();

            return $data = [
                "hasil" => $hasil,
                "keywordCol" => $keywordCol,
                "pages" => $pages,
                "limit" => $limit,
                "nomor" => $nomor,
            ];


        }

        function tambahData($id_barang,$nm_barang,$hrg_barang,$stok_barang,$tgl_prod,$tgl_expired){
            $db = new dbApps();

            $mysqli = $db -> connect();

            $id_barang = $mysqli -> real_escape_string ($id_barang);
            $nm_barang = $mysqli -> real_escape_string ($nm_barang);
            $hrg_barang = $mysqli -> real_escape_string ($hrg_barang);
            $stok_barang = $mysqli -> real_escape_string ($stok_barang);
            $tgl_prod = $mysqli -> real_escape_string ($tgl_prod);
            $tgl_expired = $mysqli -> real_escape_string ($tgl_expired);

            $sql = "INSERT INTO master_barang (id_barang,nm_barang,hrg_barang,stok_barang,tgl_prod,tgl_expired) VALUES ('$id_barang','$nm_barang','$hrg_barang','$stok_barang','$tgl_prod','$tgl_expired')";

            $result = $mysqli -> query ($sql);

            if($result){
                header("Location:../view/dashboard.php?alert=2");

            }else{
                header("Location:../view/dashboard.php?alert=1");
            }

            $mysqli -> close();
        }

        function detailData ($id_barang){
            $db = new dbApps();

            $mysqli = $db -> connect();

            $sql = "SELECT * FROM master_barang WHERE id_barang = '$id_barang'";

            $result = $mysqli -> query ($sql);

            $data = $result -> fetch_object();

            $mysqli -> close();

            return $data;
        }

        function editData($id_barang,$nm_barang,$hrg_barang,$stok_barang,$tgl_prod,$tgl_expired){
            $db = new dbApps();

            $mysqli = $db -> connect();

            $id_barang = $mysqli -> real_escape_string ($id_barang);
            $nm_barang = $mysqli -> real_escape_string ($nm_barang);
            $hrg_barang = $mysqli -> real_escape_string ($hrg_barang);
            $stok_barang = $mysqli -> real_escape_string ($stok_barang);
            $tgl_prod = $mysqli -> real_escape_string ($tgl_prod);
            $tgl_expired = $mysqli -> real_escape_string ($tgl_expired);

            $sql = "UPDATE master_barang SET nm_barang = '$nm_barang', 
                                             hrg_barang = '$hrg_barang', 
                                             stok_barang = '$stok_barang', 
                                             tgl_prod = '$tgl_prod',
                                             tgl_expired = '$tgl_expired' 
                    WHERE id_barang = '$id_barang'";


            $result = $mysqli -> query ($sql);

            if($result){
                header("Location:../view/dashboard.php?alert=3");

            }else{
                header("Location:../view/dashboard.php?alert=1");
            }

            $mysqli -> close();
        }

        function hapusData($id_barang){
            $db = new dbApps();

            $mysqli = $db -> connect();

            $sql = "DELETE FROM master_barang WHERE id_barang = '$id_barang'";

            $result = $mysqli -> query ($sql);

            $mysqli -> close();

            if($result){
                header("Location:../view/dashboard.php?alert=4");

            }else{
                header("Location:../view/dashboard.php?alert=1");
            }
        }

    }
?>
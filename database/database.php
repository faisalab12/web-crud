<?php

    class dbApps{
        private $dbHost = "localhost";
        private $dbUser = "root";
        private $dbPassword = "";
        private $dbName = "tokocrud";
        private $mysqli;
        

        public function connect() {
            $mysqli = new mysqli ($this -> dbHost,$this -> dbUser,$this -> dbPassword,$this -> dbName);
            
            if ($mysqli->connect_error) {
                echo " Gagal erkoneksi ke database : (". $mysqli -> connect_error. ")";
                
            }
    
            return $mysqli;
        }


        
    }
    $koneksi = new dbApps;
    $koneksi->connect();


?>
<?php 
    require_once("core/data/PDOData.php");
    class taoLopHPModel{

        public function __construct() {
        
        }
        public function getAll(){
            
            $db = new PDOData();
            $data = $db->doQuery("select * from HOCPHAN;");
            return $data;
            //return "ket qua cua getAll";
        }
    }
?>
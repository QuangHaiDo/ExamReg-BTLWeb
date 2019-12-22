<?php 
    require_once("core/data/PDOData.php");
    class taoKyThiModel{

        public function __construct() {
        
        }
        public function getAllHP(){
            
            $db = new PDOData();
            $data = $db->doQuery("select * from HOCPHAN;");
            return $data;
            //return "ket qua cua getAll";
        }


    }
?>
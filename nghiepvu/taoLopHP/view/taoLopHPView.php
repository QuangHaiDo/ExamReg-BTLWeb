<?php 
    class taoLopHPView{

        private $data; // danh sach sinh vien
        
        public function __construct($data) {
            $this->data = $data;
        }

        public function view(){
           // echo "giao dien tao hoc phan de sinh vien dang ky";
            //echo $this->data;
            return json_encode($this->data);
        }
    }
?>
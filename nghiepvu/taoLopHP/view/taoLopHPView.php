<?php 
    class taoLopHPView{

        private $data; // danh sach sinh vien
        private $toJson;
        
        public function __construct($data) {
            $this->data = $data;
            $this->toJson = json_encode($data);
        }

        
        public function view(){
           // echo "giao dien tao hoc phan de sinh vien dang ky";
            //echo $this->data; 
            echo "<!DOCTYPE html>
            <html>
            <body>
            $this->toJson;
            </body>
            </html>";
        }
    }
?>

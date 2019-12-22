<?php 
    class taoKyThiView{

        private $data; // danh sach cac ky thi
        private $toJson;
        
        public function __construct($data) {
            $this->data = $data;
            $this->toJson = json_encode($data);
        }

        
        public function view(){
            $html .= "<h1> Tao lich thi</h1>";
            $html .= '<div>
            <form id="taocathi-form">

            Chon mon: <select name="mahp" id="mahp">';

            foreach ($this->data as $r) {
                //$val = json_encode($r);
                $html .= '<option value='.$r["MAHP"].'>'.$r["MAHP"]."   ".$r["TENHP"].'</option>';
            }

            
            $html .='</select>';
            $html .='<input type="text" placeholder="ma ky thi" name="makythi" id="makythi">
            <input id="lichthi" type="datetime-local" name="lichthi">
            <input type="text" placeholder="so luong" name="soluong" id="soluong">
            <input type="text" placeholder="phong thi" name="phongthi" id="phongthi">
            <input type="submit" value="Tao lich thi">
          </form>
          
            </div>
            ';
            echo $html;
        }

        
        
    }
?>

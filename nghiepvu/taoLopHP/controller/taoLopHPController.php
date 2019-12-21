<?php 

require_once("nghiepvu/taoLopHP/view/taoLopHPView.php");
require_once("nghiepvu/taoLopHP/model/taoLopHPModel.php");

    class taoLopHPController{
        
        public function __construct() {
        
        }

        function proc(){
            
            $model = new taoLopHPModel();
            $data = $model->getAll();
            $view = new taoLopHPView($data);
            echo ($view->view());
        
            //echo "hbtb";
        }
    }
?>
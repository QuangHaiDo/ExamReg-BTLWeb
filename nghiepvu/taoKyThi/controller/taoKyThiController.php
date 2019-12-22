<?php 

require_once("nghiepvu/taoKyThi/view/taoKyThiView.php");
require_once("nghiepvu/taoKyThi/model/taoKyThiModel.php");

    class taoKyThiController{
        
        public function __construct() {
        
        }

        function proc(){
            $model = new taoKyTHiModel();
            $data = $model->getAllHP();
            $view = new taoKyTHiView($data);
            $view->view();
        }
        function getAllExam(){
            $model = new taoKyTHiModel();
            $data = $model->getAllExam();
            $view = new taoKyTHiView($data);
            $view->view();
            $view->showabc();
        }
    }
?>
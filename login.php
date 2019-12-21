<?php 

/*
    session_start();
    
    // Check if the user is already logged in, if yes then redirect him to welcome page
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if ($_SESSION["vaitro"] == "admin") header("location: admin.php");
        else header("location: student.php");
        exit;
    }
*/

    use core\data\PDOData;
    require_once("core/data/PDOData.php");

    if (isset($_POST)){
        $name = $_POST["name"];
        $pass = $_POST["pass"];
        $ret = array();
        try {
            /* Ket noi CSDL */
            $db = new PDO("mysql:host=localhost:3306;dbname=QLDT;", "root", "123456");
            //$db = new PDOData();
            $stmt = $db->prepare("select * from THONGTINTAIKHOAN where MASV like ? and MK like ? ;");
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $pass);
            $stmt->execute();

            if ($stmt) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $ret[] = $row;
                }
            }
            $db = null;
            
        } catch(PDOException $ex) { echo $ex->getMessage();	}
        
        if (count($ret) > 0){
            $out->status = "thanhcong";
            if ($ret[0]["VAITRO"] == "admin"){
                $out->location = "admin.php";
            } else {
                $out->location = "student.php";
            }

            session_start();      
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["id"] = $name;
            $_SESSION["username"] = $ret[0]["TENSV"];
            $_SESSION["vaitro"] = $ret[0]["VAITRO"];
            echo json_encode($out);
        }
        else {
            $out->status = "no";
            $out->location = "no";
            echo json_encode($out);
        }
    } else echo "not set dola_POST";
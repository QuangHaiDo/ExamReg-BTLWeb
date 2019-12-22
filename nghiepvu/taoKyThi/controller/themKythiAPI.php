<?php 
    require_once("../../../core/data/PDOData.php");

    /* xu ly them vao database o day
    $_POST nay chua thong tin cua ky thi, dinh dang nhu sau
    {"mahp":"INT1234","makythi":"int1234a","lichthi":"2019-12-31T11:11","soluong":"10","phongthi":"101-gd2"}
    STR_TO_DATE('2019-12-31T11:11', '%Y-%m-%dT%h:%i') de lay ngay dang Date()
    tien hanh import vao csdl, dung PDOData.php 'STR_TO_DATE('.$_POST["lichthi"].', "%Y-%m-%dT%h:%i")'
    */
    // doan prepare nay chua chay duoc ??
    $query = "insert into LICHTHI (MACATHI,MAHP,SOLUONG,THOIGIAN,PHONGTHI) VALUES(?,?,?,?,?);";
    $paras =array($_POST["makythi"],$_POST["mahp"],$_POST["soluong"], 'STR_TO_DATE("'.$_POST["lichthi"].'","%Y-%m-%dT%h:%i")',$_POST["phongthi"]);
    $db = new PDOData();
    $count = $db->doPrepareSql($query,$paras);

    /* goi ham nay thi chay duoc
    $count = $db->doSql('insert into LICHTHI (MACATHI,MAHP,SOLUONG,THOIGIAN,PHONGTHI) 
    VALUES("aaaaaa","INT111g1",10,STR_TO_DATE("2019-12-30T11:11","%Y-%m-%dT%h:%i"),"102-gd2");)');
    */
    //echo var_dump($query);
    //echo var_dump($paras);
    echo $count;
?>
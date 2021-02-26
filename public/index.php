<?php

//session_start();
//if (!isset($_SESSION["submit"])) {
//    header("location:dangnhap.php");
//}
//else{
//    header("location:ad.php");
//}
include '../lib/autoload.php';
$a = new lib_model_monhoc();
$a->builQuerryParans([
    "select"=>"*",
    "where"=>"idmh >= 5 and idmh<= 10 ",
])->select();
echo "chay";









//include '../lib/autoload.php';
//$a = new lib_model_diem();
//if (isset($_POST["idsv"])) {
//    $rs = $a->builQuerryParans([
//                "field" => "(idsv,idmh) value(?,?)",
//                "value" => ["1èe", "1ề"]
//            ])->insert();
//}
?>
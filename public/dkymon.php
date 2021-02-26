<?php
	session_start();
	if(!isset($_SESSION["submit"])){
		header("location:dangnhap.php");
	}
	include '../lib/autoload.php';
	$a = new lib_model_diem();                            
	if(isset($_POST["idsv"])){                    
		$rs = $a->builQuerryParans([
			"field" => "(idsv,idmh) value(?,?)",
			"value" => [$_POST["idsv"],$_POST["idmh"]]
		])->insert();
	}
?>
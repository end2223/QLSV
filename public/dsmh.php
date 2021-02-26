<?php
	session_start();
	if (!isset($_SESSION["submit"])) {
		header("location:dangnhap.php");
	}
	include '../lib/autoload.php';
	$a = new lib_model_monhoc();
	$rs="";
	if(!isset($_POST["idmh"])){
		                            
		$rs = $a->builQuerryParans([
			"field" => "(tenmh,sotin,hocky,giaovien) value(?,?,?,?)",
			"value" => [$_POST["tenmh"],$_POST["sotin"],$_POST["hocky"],$_POST["giaovien"]] 
		])->insert();
	}

	elseif(isset($_POST["idmh"])&&isset($_POST["tenmh"])){
		$rs = $a->builQuerryParans([
			"other" => "tenmh= '".$_POST["tenmh"]."', sotin= '".$_POST["sotin"]."', hocky= '".$_POST["hocky"]."', giaovien= '".$_POST["giaovien"]."'", 
			"where" => "idmh = \"".$_POST["idmh"]."\""
		])->update();
	}
	else{
		$rs = $a->builQuerryParans([
			"where" => "idmh = \"".$_POST["idmh"]."\""
		])->delete();
	}

	echo $rs;
?>



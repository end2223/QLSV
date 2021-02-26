<?php
	session_start();
	if (!isset($_SESSION["submit"])) {
		header("location:dangnhap.php");
	}
	include '../lib/autoload.php';
	$a = new lib_model_sinhvien();                            

	if(isset($_POST["insert"])){
		                            
		$rs = $a->builQuerryParans([
			"field" => "(tensv,msv,lop,nganh,ngaysinh,taikhoan,matkhau,chucvu,que,lienlac) value(?,?,?,?,?,?,?,?,?,?)",
			"value" => [$_POST["tensv"],$_POST["msv"],$_POST["lop"],$_POST["nganh"], $_POST["ngaysinh"],$_POST["taikhoan"],$_POST["matkhau"],$_POST["chucvu"],$_POST["que"],$_POST["lienlac"]]
		])->insert();
		echo $rs;
	}
	elseif(isset($_POST["update"])){
		$rs = $a->builQuerryParans([
			"other" => "tensv= '".$_POST["tensv"]."', lop= '".$_POST["lop"]."', nganh= '".$_POST["nganh"]."', ngaysinh= '".$_POST["ngaysinh"]."', taikhoan= '".$_POST["taikhoan"]."', matkhau= '".$_POST["matkhau"]."', chucvu= '".$_POST["chucvu"]."', que= '".$_POST["que"]."', lienlac= '".$_POST["lienlac"]."'", 
			"where" => "msv = \"".$_POST["msv"]."\""
		])->update();
	}
	elseif(isset($_POST["delete"])){
		$rs = $a->builQuerryParans([
			"where" => "msv = \"".$_POST["idsv"]."\""
		])->delete();
		echo $rs."";
	}
	elseif (isset($_POST["xlh"])) {
		$rs = $a->builQuerryParans([
			"select" => "*",
			"other" => "inner join diem on diem.idsv = sinhvien.idsv"
			. " inner join monhoc on diem.idmh = monhoc.idmh"
			. " where diem.idsv >=0 and monhoc.idmh = ".$_POST["idmh"]
		])->select();
		echo json_encode($rs,JSON_UNESCAPED_UNICODE);
	}
	elseif (isset($_POST["checkdiem"])) {
		include '../lib/autoload.php';
		$c = new lib_model_diem();
		$rs = $c->builQuerryParans([
			"other" => "diemchuyencan = ".$_POST["diemchuyencan"]
						.", diemkiemtra = ".$_POST["diemkiemtra"]
						.", diemcuoiky =".$_POST["diemcuoiky"], 
			"where" => "idsv = ".$_POST["idsv"]." and idmh = ".$_POST["idmh"]
		])->update();
		echo json_encode($rs,JSON_UNESCAPED_UNICODE);
	}
	else{
		$rs = $a->builQuerryParans([
			"select" => "*",
			"other" => "inner join diem on diem.idsv = sinhvien.idsv"
			. " inner join monhoc on diem.idmh = monhoc.idmh"
			. " where monhoc.idmh = ".$_POST["idmh"]//." and diem.diemchuyencan is not null"
		])->select();
		echo json_encode($rs,JSON_UNESCAPED_UNICODE);
	}
?>





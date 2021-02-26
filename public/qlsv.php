<?php
session_start();

if(!isset($_SESSION["submit"])){
	header("location:dangnhap.php");
}
?>

<button type="button" class="btn btn-default" onclick="morong()">Mở rộng</button>
<br>
<br>
<!-- <div id="smh" class="row">
	<div class="text-center"><h3>Thông tin số 1</h3></div>
	<div class="col-md-2"><input type="text" class="form-control" value="" id="msv" placeholder="MSV"></div> 
	<div class="col-md-3"><input type="text" class="form-control" value="" id="tensv" placeholder="Tên"></div>
	<div class="col-md-2"><input type="text" class="form-control" value="" id="lop" placeholder="Lớp"></div>
	<div class="col-md-3"><input type="text" class="form-control" value="" id="ngaysinh" placeholder="Ngày sinh"></div>
	<div class="col-md-2"><input type="text" class="form-control" value="" id="nganh" placeholder="Ngành"></div>
	<br>
	<div class="text-center"><h3>Thông tin số 2</h3></div>
	<div class="col-md-3"><input type="text" class="form-control" value="" id="tk" placeholder="Tài khoản"></div> 
	<div class="col-md-2"><input type="password" class="form-control" value="" id="mk" placeholder="Mật khẩu"></div>
	<div class="col-md-2"><input type="text" class="form-control" value="" id="cv" placeholder="Chức vụ"></div>
	<div class="col-md-3"><input type="text" class="form-control" value="" id="que" placeholder="Quê quán"></div>
	<div class="col-md-2"><input type="text" class="form-control" value="" id="lienlac" placeholder="Liên lạc"></div>
</div> -->
<div id="morong"></div>

<table class="table table-hover table-striped table-condensed table-bordered">
	<thead>
		<tr>
			<th>IDSV</th>
			<th>Tên sinh viên</th>
			<th>Mã sinh viên</th>
			<th>Lớp</th>
			<th>Ngành</th>
			<th>Ngày sinh</th>
			<th>Quê quán</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		include '../lib/autoload.php';
		$a = new lib_model_sinhvien();
		$rs = $a->builQuerryParans([
			"select"=>"*"
		])->select();
		for($i=0;$i<=count($rs);$i++){
			if(isset($rs[$i])){
				echo "<tr><th>".$rs[$i]["idsv"]."</th><th>".$rs[$i]["tensv"]."</th>"."<th>".$rs[$i]["msv"]."</th>"."<th>".$rs[$i]["lop"]."</th>"."<th>".$rs[$i]["nganh"]."</th>"."<th>".$rs[$i]["ngaysinh"]."</th>"."<th>".$rs[$i]["que"]."</th>"."</tr>";
			}
		}
		?>
		
	</tbody>
	<tbody id="addcol"></tbody>
	<br>
	
</table>


<script>
	function themsv(){
		var a1=document.getElementById("tensv").value;
		var a2=document.getElementById("msv").value;
		var a3=document.getElementById("lop").value;
		var a4=document.getElementById("ngaysinh").value;
		var a5=document.getElementById("nganh").value;
		var a6=document.getElementById("tk").value;
		var a7=document.getElementById("mk").value;
		var a8=document.getElementById("cv").value;
		var a9=document.getElementById("que").value;
		var a0=document.getElementById("lienlac").value;
		if(a1!=""&&a2!=""&&a4!=""&&a4!=""&&a5!=""&&a6!=""&&a7!=""&&a8!=""&&a9!=""&&a0!=""){
			$.post("dssv.php",{insert:1,tensv:a1,msv:a2,lop:a3,ngaysinh:a4,nganh:a5,taikhoan:a6,matkhau:a7,chucvu:a8,que:a9,lienlac:a0},function(data){
				if(data>=0){
					alert("Thêm sinh viên thành công.");
					var tmp=`<tr>
					<th>${data}</th>
					<th>${a1}</th>
					<th>${a2}</th>
					<th>${a3}</th>
					<th>${a5}</th>
					<th>${a4}</th>
					<th>${a9}</th>
					</tr>
					`;
					$("#addcol").html(tmp);
				}
				
			});
		}else{
			alert("Vui lòng nhập đủ thông tin");
		}	
		
	}
	function suasv(){
		var a1=document.getElementById("tensv").value;
		var a2=document.getElementById("msv").value;
		var a3=document.getElementById("lop").value;
		var a4=document.getElementById("ngaysinh").value;
		var a5=document.getElementById("nganh").value;
		var a6=document.getElementById("tk").value;
		var a7=document.getElementById("mk").value;
		var a8=document.getElementById("cv").value;
		var a9=document.getElementById("que").value;
		var a0=document.getElementById("lienlac").value;
		if(a1!=""&&a2!=""&&a4!=""&&a4!=""&&a5!=""&&a6!=""&&a7!=""&&a8!=""&&a9!=""&&a0!=""){
			$.post("dssv.php",{update:1,tensv:a1,msv:a2,lop:a3,ngaysinh:a4,nganh:a5,taikhoan:a6,matkhau:a7,chucvu:a8,que:a9,lienlac:a0},function(data){
			});
			alert("Cập nhật thông tin thành công");
		}else{
			alert("Hãy điền đầy đủ thông tin, kể cả thông tin không thay đổi");
		}
	}
	function xoasv(){
		var id=document.getElementById("msv").value;
		if(id==""){
			alert("Hãy nhập mã sinh viên để thực hiện xóa bỏ!")
		}else{
			$.post("dssv.php",{delete:1,idsv:id},function(data){
				alert("Xóa sinh viên thành công!")
			});
		}

	}

	function morong(){
		var a = `
		<button type="button" class="btn btn-primary" onclick="themsv()">Thêm mới sinh viên</button>
		<button type="button" class="btn btn-warning" onclick="suasv()">Sửa thông tin sinh viên</button>
		<button type="button" class="btn btn-danger" onclick="xoasv()">Xóa sinh viên</button>
		<div id="smh" class="row">
		<div class="text-center"><h3>Thông tin số 1</h3></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="msv" placeholder="MSV"></div> 
		<div class="col-md-3"><input type="text" class="form-control" value="" id="tensv" placeholder="Tên"></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="lop" placeholder="Lớp"></div>
		<div class="col-md-3"><input type="text" class="form-control" value="" id="ngaysinh" placeholder="Ngày sinh"></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="nganh" placeholder="Ngành"></div>
		<br>
		<div class="text-center"><h3>Thông tin số 2</h3></div>
		<div class="col-md-3"><input type="text" class="form-control" value="" id="tk" placeholder="Tài khoản"></div> 
		<div class="col-md-2"><input type="password" class="form-control" value="" id="mk" placeholder="Mật khẩu"></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="cv" placeholder="Chức vụ"></div>
		<div class="col-md-3"><input type="text" class="form-control" value="" id="que" placeholder="Quê quán"></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="lienlac" placeholder="Liên lạc"></div>
		</div>`;
		$("#morong").html(a);
	}
</script>
<?php
session_start();

if(!isset($_SESSION["submit"])){
	header("location:dangnhap.php");
}
?>

<button type="button" class="btn btn-default" onclick="morong1()">Mở rộng</button>
<br><br>
<div id="morong1">
	
</div>
<div>
	<table class="table table-hover table-striped table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên môn học</th>
				<th>Số tín</th>
				<th>Học kì</th>
				<th>Giáo viên</th>
			</tr>
		</thead>
		<tbody>

			<?php 
			include '../lib/autoload.php';
			$a = new lib_model_monhoc();
			$rs = $a->builQuerryParans([
				"select"=>"*"
			])->select();
			for($i=0;$i<=count($rs);$i++){
				if(isset($rs[$i])){
					echo "<tr>.<th>".$rs[$i]["idmh"]."</th>"."<th>".$rs[$i]["tenmh"]."</th>"."<th>".$rs[$i]["sotin"]."</th>"."<th>".$rs[$i]["hocky"]."</th>"."<th>".$rs[$i]["giaovien"]."</th></tr>";
				}
			}
			?>
		</tbody>
		<tbody id="addcol">

		</tbody>
		<br>

	</table>
</div>
<script>
	function themmh(){
		var a=document.getElementById("tenmh").value;
		var b=document.getElementById("sotin").value;
		var c=document.getElementById("hocky").value;
		var d=document.getElementById("giaovien").value;
		if(a!=""&&b!=""&&c!=""&&d!=""){
			$.post("dsmh.php",{tenmh:a, sotin:b, hocky:c, giaovien:d},function(data){
				alert("Thêm môn thành công!");
				var tmp=`<tr>
				<th>${data}</th>
				<th>${a}</th>
				<th>${b}</th>
				<th>${c}</th>
				<th>${d}</th>
				</tr>
				`;
				$("#addcol").html(tmp);

			});
		}
		else{
			alert("Vui lòng nhập đầy đủ thông tin.");
		}
	}
	function suamh(){
		var id=document.getElementById("idmh").value;
		var a=document.getElementById("tenmh").value;
		var b=document.getElementById("sotin").value;
		var c=document.getElementById("hocky").value;
		var d=document.getElementById("giaovien").value;
		if(id!=""&&a!=""&&b!=""&&c!=""&&d!=""){
			$.post("dsmh.php",{idmh:id, tenmh:a, sotin:b, hocky:c, giaovien:d},function(data){
				
			});
			alert("Sửa môn học thành công!");
		}
		else{
			alert("Vui lòng nhập đầy đủ thông tin, kể cả thông tin không thay đổi.");
		}

		
	}
	function xoamh(){
		var id=document.getElementById("idmh").value;
		if(id==""){
			alert("Hãy thêm id môn học để thực hiện xóa");
		}
		else{
			$.post("dsmh.php",{idmh:id},function(data){
				alert("Xóa môn học thành công.")
			});
		}

	}
	function morong1(){
		var a=`<button type="button" class="btn btn-primary" onclick="themmh()">Thêm mới môn học</button>
		<button type="button" class="btn btn-warning" onclick="suamh()">Chỉnh sửa môn học</button>
		<button type="button" class="btn btn-danger" onclick="xoamh()">Xóa môn học</button>
		<br><br>
		<div id="smh" class="row">
		<div class="col-md-2"><input type="text" class="form-control" value="" id="idmh" placeholder="ID"></div> 
		<div class="col-md-3"><input type="text" class="form-control" value="" id="tenmh" placeholder="Nhập tên môn học"></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="sotin" placeholder="Nhập số tín"></div>
		<div class="col-md-2"><input type="text" class="form-control" value="" id="hocky" placeholder="Nhập học kì"></div>
		<div class="col-md-3"><input type="text" class="form-control" value="" id="giaovien" placeholder="Nhập tên giáo viên"></div>
		</div>`;

		$("#morong1").html(a);
	}
</script>


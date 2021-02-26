<?php
session_start();

if(!isset($_SESSION["submit"])){
	header("location:dangnhap.php");
}
?>
<div>
	<label>Chọn môn học</label>
	<select name="monhoc" id="mh" class="form-control" onchange="slchange()">
		<?php 
		include '../lib/autoload.php';
		$a = new lib_model_monhoc();
		$rs = $a->builQuerryParans([
			"select"=>"*"
		])->select();
		for($i=0;$i<=count($rs);$i++){
			if(isset($rs[$i])){
				echo "<option value=".$rs[$i]["idmh"].">".$rs[$i]["tenmh"]."</option>";
			}
		}
		?>
	</select>
</div>
<br><br>
<div>
	<table id="tbl_1" class="table table-hover table-striped table-bordered table-responsive">
		<thead>
			<tr>
				<th>IDSV</th>
				<th width="200">Tên sinh viên</th>
				<th>IDMH</th>
				<th>Chuyên cần</th>
				<th>Điểm tra</th>
				<th>Điểm thi</th>
				<th>Chức năng</th>

			</tr>
		</thead>
		<tbody id="addcol">
			
		</tbody>
	</table>
</div>
<br><br>
<div>
	<div><strong>Đăng ký lịch học cho sinh viên</strong></div>
	<div class="row">
		<div class="col-md-3">
			<input type="text" class="form-control " id="idsv1" placeholder="Nhập mã ID sinh viên">
		</div>
		<div class="col-md-4">
			<select name="monhoc" class="form-control" id="sldk">
				<?php 
				include '../lib/autoload.php';
				$a = new lib_model_monhoc();
				$rs = $a->builQuerryParans([
					"select"=>"*"
				])->select();
				for($i=0;$i<=count($rs);$i++){
					if(isset($rs[$i])){
						echo "<option value=".$rs[$i]["idmh"].">".$rs[$i]["tenmh"]."</option>";
					}
				}
				?>
			</select>
		</div>
		<div class="col-md-2">
			<button type="button" class="btn btn-info form-control" onclick="dkylich()">Xác nhận</button>
		</div>
	</div>

</div>
<script>
	function slchange(){
		var a=document.getElementById("mh").value;
		$.post("dssv.php",{xlh:1,idmh:a},function(data){
			// console.log(data);
			var data1=JSON.parse(data);
			var col=``;
			var i=1;
			data1.forEach(element =>{
				col+=`
				<tr style="vertical-align: top;">
				<th>${element.idsv}</th>
				<th>${element.tensv}</th>
				<th>${element.idmh}</th>
				<th><input type="text" class="form-control" id="vl${i++}" value=${element.diemchuyencan}></th>
				<th><input type="text" class="form-control" id="vl${i++}" value=${element.diemkiemtra}></th>
				<th><input type="text" class="form-control" id="vl${i++}" value=${element.diemcuoiky}></th>
				<th><button type="button" class="btn btn-success" onclick="capnhat()">Cập nhật</button></th>

				</tr>
				`;
			});
			$("#addcol").html(col);
		});
	}

</script>
<script>
	function capnhat(){
		var table = document.getElementById("tbl_1");
		var rows = table.getElementsByTagName("tr");
		for (i = 0; i < rows.length; i++) {
			var currentRow = table.rows[i];
			// console.log(currentRow);
			var createClickHandler = function(row,index) {
				
				return function() {
					
					var v1="vl"+(index*3-2),v2="vl"+(index*3-1),v3="vl"+(index*3);
					
					var idmh=document.getElementById("mh").value;
					var d1 = document.getElementById(v1).value;
					var d2 = document.getElementById(v2).value;;
					var d3 = document.getElementById(v3).value;;
					var id = row.getElementsByTagName("th")[0].innerHTML;
					console.log(d1+" "+d2+" "+d3);
					// var id = cell.innerHTML;
					$.post("dssv.php",{checkdiem:1,idsv:id,idmh:idmh,diemchuyencan:d1,diemcuoiky:d3,diemkiemtra:d2},function(data){
						console.log(data);
					});
				};
			};
			currentRow.onclick = createClickHandler(currentRow,i);
		}
	}
	function dkylich(){
		$("#addcol").html("");
		var id=document.getElementById("idsv1").value;
		var idmon=document.getElementById("sldk").value;
		$.post("dkymon.php",{idsv:id,idmh:idmon}, function(data){
			alert("Đăng ký thành công");
		});
	}

</script>
<br><br><br>
<br>
<br>
<br>
<br>
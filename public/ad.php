<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
ob_start();
session_start();

if(!isset($_SESSION["submit"])){
	header("location:dangnhap.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="./bootstrap3/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="./csstt.css"> -->
	<style>
		.fixed_1{
			position: fixed;
			z-index: 30;
			width: 280px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-default navbar-fixed-top container" role="navigation">
					<div class="container-fluid">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="#">Title</a>
						</div>

						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-ex1-collapse">
							<ul class="nav navbar-nav">
								<li ><a href="http://localhost/quanlysinhvien/public/trangchu.php">Thông tin</a></li>
								<li><a href="http://localhost/quanlysinhvien/public/dsmonhoc.php">Danh sách môn học</a></li>
								<li><a href="http://localhost/quanlysinhvien/public/xemdiem.php">Xem điểm</a></li>
								<li><a class="active" href="http://localhost/quanlysinhvien/public/ad.php"><?php
								if($_SESSION["submit"][0]["chucvu"]!="sv"){
									echo "Cập nhật";
								}
								?></a></li>
							</ul>
							
						</div><!-- /.navbar-collapse -->
					</div>
				</nav>
			</div>
			<br><br><br><br><br><br>
			
			<div class="row">
				<div class="row text-center text-primary">
					<h1><strong>Giao diện quản lý sinh viên</strong></h1>
				</div>
				<br>
				<div class="row">
					<div class="fixed_1">
						<div class="panel panel-success">
							<div class="panel-heading">
								Thông tin quản trị viên
							</div>
							<div class="panel-body">
								<div class="col-md-5 text-success">Họ và tên: </div>
								<div class="col-md-7">
									<?php
									echo $_SESSION["submit"][0]["tensv"];
									?>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-5 text-success">Chức vụ: </div>
								<div class="col-md-7">
									<?php
									echo $_SESSION["submit"][0]["chucvu"];
									?>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-5 text-success">SDT: </div>
								<div class="col-md-7">
									<?php
									echo $_SESSION["submit"][0]["lienlac"];
									?>
								</div>
								<div class="clearfix"></div>
								<div class="col-md-5 text-success">Quê quán: </div>
								<div class="col-md-7">
									<?php
									echo $_SESSION["submit"][0]["que"];
									?>
								</div>
							</div>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<strong>Chức năng mở rộng</strong>
							</div>
							<div class="panel-body">
								<div class="row">
									<button id="qlsv" onclick="qlsv()" type="button" class="col-md-6 col-md-offset-3 btn btn-primary">Quản lý sinh viên</button>
								</div><br>
								<div class="row">
									<button id="qlmh" onclick="qlmh()" type="button" class="col-md-6 col-md-offset-3 btn btn-info">Quản lý môn học</button>
								</div><br>
								<div class="row">
									<button id="xlh" onclick="xlh()" type="button" class="col-md-6 col-md-offset-3 btn btn-success">Cập nhật điểm</button>
								</div>
							</div>
						</div>

					</div>
					<div class="col-md-3"></div>
					<div class="col-md-9" id="menu">
						

					</div>
				</div>
			</div>
			

		</div>
	</div>

	<script>
		function qlsv(){
			$.post("qlsv.php",function(data){
				// $("menu").
				// console.log(data);
				$("#menu").html(data);
			});
		}

		function qlmh(){
			$.post("qlmh.php",function(data){
				// $("menu").
				// console.log(data);
				$("#menu").html(data);
			});
			
		}
		function xlh(){
			$.post("xlh.php",function(data){
				// $("menu").
				// console.log(data);
				$("#menu").html(data);
			});
		}
	</script>

	<script type="text/javascript" src="./bootstrap3/jquery.js"></script>
	<script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>
</body>
</html>
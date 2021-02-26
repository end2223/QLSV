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
	<link rel="stylesheet" href="./csstt.css">
</head>
<body>
	<div class="container-fluid">
		<div class="container">
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
							<li class="active"><a href="#">Thông tin</a></li>
							<li><a href="http://localhost/quanlysinhvien/public/dsmonhoc.php">Danh sách môn học</a></li>
							<li><a href="http://localhost/quanlysinhvien/public/xemdiem.php">Xem điểm</a></li>
							<li><a href="http://localhost/quanlysinhvien/public/ad.php"><?php
								if($_SESSION["submit"][0]["chucvu"]!="sv"){
									echo "Cập nhật";
								}
							?></a></li>
						</ul>
						
					</div><!-- /.navbar-collapse -->
				</div>
			</nav>
			<br><br><br><br><br><br>
		</div>
		<br><br>	<br>	
		<div class="col-md-8 col-md-offset-2" style="background-color: rgba(225, 240, 255, 0.5); box-shadow: 0px 0px 30px black;">
			<div class="col-md-5">
				<br><br>	
				<center>
					<!-- <img src="./anh/logo.jpg" />	 -->


					<?php
						echo "<img width=\"350px\" height=\"auto\" src=\"".$_SESSION["submit"][0]["jpg"]."\" />";
					?>
					<!-- <br>	 -->
					<div style="line-height:50px;"><strong> Học viện công nghệ bưu chính viễn thông</strong></div>	
				</center>
			</div>
			<br>
			<div class="col-md-7 text-left bgc">
				<h3><strong>Thông tin phiên đăng nhập<strong></h3>
				<br><br>
				<div class="line row">
					<div class="col-md-4 text-right">Họ và tên</div>
					<div class="col-md-5">
						<?php
							echo $_SESSION["submit"][0]["tensv"];
						?>
					</div>
				</div>
				<div class="line row">
					<div class="col-md-4 text-right">Mã sinh viên</div>
					<div class="col-md-5">
						<?php
							echo $_SESSION["submit"][0]["msv"];
						?>
					</div>
				</div>
				<div class="line row">
					<div class="col-md-4 text-right">Lớp</div>
					<div class="col-md-5">
						<?php
							echo $_SESSION["submit"][0]["lop"];
						?>
					</div>
				</div>
				<div class="line row">
					<div class="col-md-4 text-right">Ngành</div>
					<div class="col-md-5">
						<?php
							echo $_SESSION["submit"][0]["nganh"];
						?>
					</div>
				</div>
				<div class="line row">
					<div class="col-md-4 text-right">Ngày sinh</div>
					<div class="col-md-5">
						<?php
							echo $_SESSION["submit"][0]["ngaysinh"];
						?>
					</div>
				</div>
				<div class="line row">
					<div class="col-md-4 text-right">Quê quán</div>
					<div class="col-md-5">
						<?php
							echo $_SESSION["submit"][0]["que"];
						?>
					</div>
				</div>
				<div class="line row">
					<div class="col-md-4 text-right">Học phí</div>
					<div class="col-md-5 text-gray-dark">
						<?php
						if($_SESSION["submit"][0]["chucvu"]=="sv"){
							
							echo $_SESSION["submit"][0]["hocphi"]*480000;
						}
						?>
					</div>
				</div>
				<div class="row text-center">
					<h4 class="mg"><strong style = "color: red" >
					<?php
						if($_SESSION["submit"][0]["chucvu"]!="sv"){
							echo "Nhân viên quản trị hệ thống";
						}
					?>
					</strong></h4>
				</div>

			</div>
			</div>
		</div>
	</div>



	<script type="text/javascript" src="./bootstrap3/jquery.js"></script>
	<script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>
</body>
</html>
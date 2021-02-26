<?php
session_start();
if (!isset($_SESSION["submit"])) {
    header("location:dangnhap.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Danh sách môn học</title>
        <link rel="stylesheet" href="./bootstrap3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./cssdsmh.css">
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
                                <li><a href="http://localhost/quanlysinhvien/public/trangchu.php">Thông tin</a></li>
                                <li> <a href="http://localhost/quanlysinhvien/public/dsmonhoc.php">Danh sách môn học</a></li>
                                <li class="active"><a href="http://localhost/quanlysinhvien/public/xemdiem.php">Xem điểm</a></li>
                                <li><a href="http://localhost/quanlysinhvien/public/ad.php"><?php
                                        if ($_SESSION["submit"][0]["chucvu"] != "sv") {
                                            echo "Cập nhật";
                                        }
                                        ?></a></li>
                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>
                <br><br><br><br><br><br><br>
                <div class = "">
                    <div class="col-md-3">
                       <div class="panel panel-primary">
                           <div class="panel-heading">
                               <h3 class="panel-title">Chọn học kỳ</h3>
                           </div>
                           <div class="panel-body">
                                <form action="" method="Post">
                                    <div class="">
                                        <select class ="form-control" name="TKDiem">
                                            <option name="1">Học kì 1</option>
                                            <option>Học kì 2</option>
                                            <option>Học kì 3</option>
                                            <option>Học kì 4</option>
                                            <option>Học kì 5</option>
                                            <option>Học kì 6</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div class="">
                                        <center><button class="btn btn-primary" type="submit">Duyệt</button></center>
                                    </div>
                                </form>
                           </div>
                       </div>
                    </div>
                    <div class="col-md-9">
                        <center><table class="table-bordered table table-hover table-striped table-responsive table-condensed">
                                <thead>
                                    <tr>
                                        <th>Tên môn học</th>
                                        <th>Điểm chuyên cần</th>
                                        <th>Điểm kiểm tra</th>
                                        <th>Điểm thi</th>
                                        <th>Điểm tổng kết</th>
                                    </tr>
                                    <tr>
                                        <th></th>

                                        <th>10%</th>
                                        <th>20%</th>
                                        <th>70%</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // var_dump($_POST["TKDiem"][10]);
                                    // die();
                                    if (isset($_POST["TKDiem"])) {
                                        include '../lib/autoload.php';
                                        $a = new lib_model_sinhvien();
                                        // var_dump();
                                        $rs = $a->builQuerryParans([
                                                    "select" => "*",
                                                    "other" => "inner join diem on diem.idsv = sinhvien.idsv"
                                                    . " inner join monhoc on diem.idmh = monhoc.idmh"
                                                    . " where sinhvien.idsv = " . $_SESSION["submit"][0]["idsv"]
                                                ])->select();
                                        $check = $_POST["TKDiem"][10];
                                        $sum = 0;
                                        for ($i = 0; $i < count($rs); $i++) {
                                            if ($rs[$i]["hocky"] == $check && $rs[$i]["diemchuyencan"] != null) {
                                                $sum++;
                                                $dtb = $rs[$i]["diemchuyencan"] * 0.1 + $rs[$i]["diemkiemtra"] * 0.2 + $rs[$i]["diemcuoiky"] * 0.7;
                                                if($dtb>=7){
                                                    echo "<tr class=\"success\"><th>" . $rs[$i]["tenmh"] . "<//th>" . "<th>" . $rs[$i]["diemchuyencan"] . "<//th>" . "<th>" . $rs[$i]["diemkiemtra"] . "<//th>" . "<th>" . $rs[$i]["diemcuoiky"] . "<//th>" . "<th>" . round($dtb, 1) . "<//th><//tr>";
                                                }
                                                elseif($dtb<7&&$dtb>=4){
                                                    echo "<tr class=\"warning\"><th>" . $rs[$i]["tenmh"] . "<//th>" . "<th>" . $rs[$i]["diemchuyencan"] . "<//th>" . "<th>" . $rs[$i]["diemkiemtra"] . "<//th>" . "<th>" . $rs[$i]["diemcuoiky"] . "<//th>" . "<th>" . round($dtb, 1) . "<//th><//tr>";
                                                }
                                                else{
                                                    echo "<tr class=\"danger\"><th>" . $rs[$i]["tenmh"] . "<//th>" . "<th>" . $rs[$i]["diemchuyencan"] . "<//th>" . "<th>" . $rs[$i]["diemkiemtra"] . "<//th>" . "<th>" . $rs[$i]["diemcuoiky"] . "<//th>" . "<th>" . round($dtb, 1) . "<//th><//tr>";
                                                }
                                            }
                                        }
                                        if ($sum == 0) {
                                            echo "<tr class=\"success\"><th>Sinh viên chưa có điểm học kỳ ".$check."!<//th><//tr>";
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table></center>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./bootstrap3/jquery.js"></script>
        <script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>
    </body>
    
    
</html>
<!-- 
"other"=>"inner join diem on diem.idsv = sinhvien.idsv"
                                                                            ." inner join monhoc on diem.idmh = monhoc.idmh"
                                                                            ." where sinhvien.idsv = ".$_SESSION["submit"][0]["idsv"] -->
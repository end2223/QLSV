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
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

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
                                <li class="active"><a href="http://localhost/quanlysinhvien/public/dsmonhoc.php">Danh sách môn học</a></li>
                                <li><a href="http://localhost/quanlysinhvien/public/xemdiem.php">Xem điểm</a></li>
                                <li><a href="http://localhost/quanlysinhvien/public/ad.php"><?php
                                        if ($_SESSION["submit"][0]["chucvu"] != "sv") {
                                            echo "Cập nhật";
                                        }
                                        ?></a></li>
                            </ul>

                        </div><!-- /.navbar-collapse -->
                    </div>
                </nav>

                <br><br><br><br>

                <div class="row">
                    <div class="col-md-11 col-md-offset-1">
                        <h1 class = "text-center text-danger"><strong>
                                <?php
                                if (isset($_POST["select"])) {
                                    if ($_POST["select"] == "Tất cả") {
                                        # code...
                                        echo "Danh sách tất cả các môn học";
                                    } elseif ($_POST["select"] == "Môn đã học") {
                                        # code...
                                        echo "Danh sách tất cả các môn đã học";
                                    } elseif ($_POST["select"] == "Môn đang học") {
                                        # code...
                                        echo "Danh sách tất cả các môn đang học";
                                    } elseif ($_POST["select"] == "Môn chưa học") {
                                        # code...
                                        echo "Danh sách tất cả các môn chưa học";
                                    } else {
                                        # code...
                                        echo "Chọn danh sách môn học mà bạn muốn xem.";
                                    }
                                }
                                ?>
                            </strong></h1>
                    </div>
                </div>
                <div class = "row">

                    <div class="col-md-3"><br><br>
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title">Loại danh sách</h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST">
                                    <select class="form-control" name="select">
                                        <option>Tất cả</option>
                                        <option>Môn đã học</option>
                                        <option>Môn đang học</option>
                                        <option>Môn chưa học</option>
                                    </select>
                                    <div class="mg">
                                        <center><button class="btn btn-success" type="submit" name="submit">Hiển thị</button></center>
                                    </div>
                                </form>
                            </div>
                        </div></div>
                    <br><br>
                    <div class="col-md-9 text-center tbl" onclick="addRowHandlers()">
                        <center><table id="tbl_1" class="table table-bordered table-hover table-striped table-responsive table-condensed">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên môn học</th>
                                        <th>Số tín</th>
                                        <th>Giáo viên</th>
                                        <th>Học kỳ</th>
                                        <th>DSSV</th>
                                    </tr>
                                </thead>
                                <tbody>
<?php
if (isset($_POST["select"])) {
    include '../lib/autoload.php';
    $a = new lib_model_sinhvien();
    // var_dump();
    $rs = $a->builQuerryParans([
                "select" => "*",
                "other" => "inner join diem on diem.idsv = sinhvien.idsv"
                . " inner join monhoc on diem.idmh = monhoc.idmh"
                . " where sinhvien.idsv = " . $_SESSION["submit"][0]["idsv"]
            ])->select();


    if ($_POST["select"] == "Tất cả") {
        $a = new lib_model_monhoc();
        // var_dump();
        $rs = $a->builQuerryParans([
                    "select" => "*",
                ])->select();
        for ($i = 0; $i < count($rs); $i++) {

            echo "<tr><th>" . $rs[$i]["idmh"] . "</th>" . "<th>" . $rs[$i]["tenmh"] . "<//th>" . "<th>" . $rs[$i]["sotin"] . "<//th>" . "<th>" . $rs[$i]["giaovien"] . "<//th>" . "<th>" . $rs[$i]["hocky"] . "<//th><th><//th><//tr>";
        }
    }

    //Môn đã học
    if ($_POST["select"] == "Môn đã học") {
        for ($i = 0; $i < count($rs); $i++) {
            if ($rs[$i]["diemkiemtra"] != null) {
                echo "<tr><th>" . $rs[$i]["idmh"] . "</th>" . "<th>" . $rs[$i]["tenmh"] . "</th>" . "<th>" . $rs[$i]["sotin"] . "<//th>" . "<th>" . $rs[$i]["giaovien"] . "<//th>" . "<th>" . $rs[$i]["hocky"] . "<//th><th><button type=\"button\" name=\"dssv\" class=\"btn btn-xs btn_1\">Xem<//button><//th><//tr>";
            }
        }
    }
    //Môn đang học
    if ($_POST["select"] == "Môn đang học") {
        for ($i = 0; $i < count($rs); $i++) {
            if ($rs[$i]["diemkiemtra"] == null) {
                echo "<tr><th>" . $rs[$i]["idmh"] . "</th>" . "<th>" . $rs[$i]["tenmh"] . "<//th>" . "<th>" . $rs[$i]["sotin"] . "<//th>" . "<th>" . $rs[$i]["giaovien"] . "<//th>" . "<th>" . $rs[$i]["hocky"] . "<//th><th><button type=\"button\" name=\"dssv\" class=\"btn btn-xs btn_1\">Xem<//button><//th><//tr>";
            }
        }
    }
    //Môn chưa học
    if ($_POST["select"] == "Môn chưa học") {
        $a = new lib_model_monhoc();
        // var_dump();
        $rs = $a->builQuerryParans([
                    "select" => "*",
                    "other" => "left join diem on diem.idmh = monhoc.idmh where diem.idsv is null"
                ])->select();
        for ($i = 0; $i < count($rs); $i++) {
            echo "<tr><th>" . $rs[$i]["idmh"] . "<//th>" . "<th>" . $rs[$i]["tenmh"] . "<//th>" . "<th>" . $rs[$i]["sotin"] . "<//th>" . "<th>" . $rs[$i]["giaovien"] . "<//th>" . "<th>" . $rs[$i]["hocky"] . "<//th><th><//th><//tr>";
        }
    }
}
?>
                                </tbody>
                            </table></center>
                    </div>
                </div>

                <br><br><br>
                <div id="dssv" class="center">
                    <br><br><br>
                    <h2 class="text-success text-center"><strong>DANH SÁCH SINH VIÊN</strong></h2>
                    <table class="table table-hover table-bordered table-condensed table-striped">
                        <thead clas ="success">
                            <tr>
                                <th>Tên sinh viên</th>
                                <th>Mã sinh viên</th>
                                <th>Lớp</th>
                                <th>Ngành</th>
                                <th>Ngày sinh</th>
                            </tr>
                        </thead>
                        <tbody id="ds">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="./bootstrap3/jquery.js"></script>
        <script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>
        <script>
                        function addRowHandlers() {
                            var table = document.getElementById("tbl_1");
                            var rows = table.getElementsByTagName("tr");
                            for (i = 0; i < rows.length; i++) {
                                var currentRow = table.rows[i];
                                var createClickHandler = function (row) {
                                    return function () {
                                        var cell = row.getElementsByTagName("th")[0];
                                        var id = cell.innerHTML;
                                        // alert("id:" + id);

                                        $.post("dssv.php", {idmh: id}, function (data) {
                                            var a = JSON.parse(data);
                                            // console.log(typeof(a));
                                            var tbldssv = ``;
                                            a.forEach(element => {
                                                // if($_POST["select"] == "Môn đang học"){
                                                tbldssv += `
                                                                                <tr>
                                                                                        <th>${element.tensv}</th>
                                                                                        <th>${element.msv}</th>
                                                                                        <th>${element.lop}</th>
                                                                                        <th>${element.nganh}</th>
                                                                                        <th>${element.ngaysinh}</th>
                                                                                </tr>
                                                                        `
                                                // }
                                            });
                                            $("#ds").html(tbldssv);

                                        });
                                    };
                                };
                                currentRow.onclick = createClickHandler(currentRow);
                            }
                        }
        </script>
    </body>




</html>
<!-- 
"other"=>"inner join diem on diem.idsv = sinhvien.idsv"
                                                                            ." inner join monhoc on diem.idmh = monhoc.idmh"
                                                                            ." where sinhvien.idsv = ".$_SESSION["submit"][0]["idsv"] -->
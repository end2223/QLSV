<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./bootstrap3/css/bootstrap.min.css">
        <link rel="stylesheet" href="./bootstrap3/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="./css.css">
        <title>Đăng nhập</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="container">
                <h1 class="text-center text-success">HỌC VIỆN CÔNG NGHỆ BƯU CHÍNH VIỄN THÔNG</h1>
                <br />
                <br />
                <br />
                <br />
                <br />

                <div id="danhnhap" class="col-md-6 col-md-offset-3">
                    <form action="" method="POST" class="form-horizontal" role="form">
                        <div class="form-group">
                            <legend class="text-center"><strong>Đăng nhập</strong></legend>
                        </div>
                        <br />
                        <br />

                        <div class="form-group">
                            <span class="control-label col-md-3 glyphicon glyphicon-user" for=""></span>
                            <div class="col-md-8">
                                <input class="ip1" type="text" name="user" placeholder="Tài khoản...">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="control-label col-md-3 glyphicon glyphicon-lock" for=""></span>
                            <div class="col-md-8">
                                <input class="ip1" type="password" name="password" placeholder="Mật khẩu...">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-3">
                                <button type="submit" class="btn btn-dn" name="submit">Đăng nhập</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script type="text/javascript" src="./bootstrap3/jquery.js"></script>
        <script type="text/javascript" src="./bootstrap3/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
ob_start();
session_start();
if (isset($_POST["submit"])) {
    include '../lib/autoload.php';
    $a = new lib_model_sinhvien();
    $rs = $a->builQuerryParans([
                "select" => "*",
                "where" => "taikhoan= \"" . $_POST['user'] . "\" and matkhau = \"" . $_POST['password'] . "\""
            ])->select();
     echo $rs[0]["tensv"];
    if ($rs[0]["idsv"] != "") {
        $_SESSION["submit"] = $rs;
        header("location:trangchu.php");
    }
}
?>

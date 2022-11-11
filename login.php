<!DOCTYPE html>
<html>
    <head>
        <title>Đăng nhập vào website</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="login.css" rel="stylesheet" type="text/css"/>
        <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>
    <body>


<?php
session_start();
?>

<?php 
include 'ketnoi/connection.php';
if (isset($_POST["btn_submit"])) {
    // lấy thông tin người dùng
    $username = $_POST["username"];
    $password = $_POST["password"];
    //làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
    //mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
    $username = strip_tags($username);
    $username = addslashes($username);
    $password = strip_tags($password);
    $password = addslashes($password);
    if ($username == "" || $password =="") {
        echo "username hoặc password bạn không được để trống!";
    }else{
        $sql = "select * from taikhoan where username = '$username' and password = '$password' ";
        $query = mysqli_query($conn,$sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo "tên đăng nhập hoặc mật khẩu không đúng !";
        }else{
            //tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
            $_SESSION['username'] = $username;
            // Thực thi hành động sau khi lưu thông tin vào session
            // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
            header('Location: my_website/index.php');
        }
    }
}
?>
        <main>
            <div class="container">
            <div class="login-form">
                <form action="login.php" method="post">
                    <img src="./img/logo-footer.png" alt="" class="logo">
                    <h3 class="hi">   Chào mừng bạn đến với Loship</h3>
                    <div class="input-box">
                        <i ></i>
                        <input type="text" placeholder="Nhập username" name="username">
                    </div>
                    <div class="input-box">
                        <i ></i>
                        <input type="password" placeholder="Nhập mật khẩu" name="password">
                    </div>
                    <div class="flex-login ">
                        <a href="">Quên Mật Khẩu</a>
                        <a href="">Tạo Tài Khoản</a>
                    </div>
                    <div class="btn-box">
                        <button type="submit" name="btn_submit" Value="">
                            Tiếp Tục
                        </button>
                    </div>

                    <div class=" line">
                        <span class="line-text">Hoặc</span>
                    </div>

                    <div class="facebook-gg">
                        <div class="facebook"><img src="icon/facebook.svg" alt=""><a href="">Login Facebook</a></img></div>
                        <div class="gg">
                            <img src="icon/google.svg" alt=""><a href="">Login Google</a></img></div>
                        
                    </div>
                </form>
            </div>
            </div>
        </main>
      
    </body>
</html>
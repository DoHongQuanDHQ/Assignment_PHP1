
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/formlogin.css">
    <link rel="stylesheet" href="../css/danhmucsp.css">
</head>
    <body>
        <?php
            session_start();
            include "../config/connect.php";
            $errorName = $errorUser = $errorEmail = $errorPass = $errorcPass = "";
            if (isset($_POST['submit'])) {
                $hoten = $_POST['hoten'];
                $user = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $cpassword = $_POST['cpassword'];

                if (empty($hoten)) {
                    $errorName = "Trường này không được để trống";
                } else if (strlen($hoten) < 6) {
                    $errorName = "Họ tên phải dài ít nhất 6 ký tự.";
                }

                if (empty($user)) {
                    $errorUser = "Trường này không được để trống";
                } else if (strlen($user) < 4) {
                    $errorUser = "Tên đăng nhập không đúng định dạng.";
                }


                if (empty($password)) {
                    $errorPass = "Trường này không được để trống";
                } else if (strlen($password) < 6) {
                    $errorPass = "Mật khẩu phải dài ít nhất 6 ký tự.";
                }

                if (empty($email)) {
                    $errorEmail = "Trường này không được để trống";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorEmail = "Email không hợp lệ";
                }

                if ($password != $cpassword) {
                    $errorcPass = "Mật khẩu không khớp";
                }

                if (empty($errorName) && empty($errorUser) && empty($errorEmail) && empty($errorPass) && empty($errorcPass)) {
                    $sql = "INSERT INTO `dangki`(`name`, `username`, `password`, `email`) 
                            VALUES ('$hoten','$user','$password','$email')";
                    // Chuẩn bị câu lệnh SQL và thực thi
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    // Kiểm tra và hiển thị thông báo sau khi thực hiện truy vấn
                    if ($stmt) {
                        echo "Đăng ký thành công!";
                    } else {
                        echo "Có lỗi xảy ra khi đăng ký.";
                    }
                    $_SESSION['username'] = $user;

                    // Chuyển hướng người dùng đến trang chủ
                    header("Location: dangnhap.php");
                    exit;
                }
            }
        ?>
    <div class="wrapper">
        <div class="menu">
            <ul>
                <li><a href="../trangchu.php">Trang Chủ</a></li>
                <li><a href="../danhmuc/danhmucsp.php">Danh Mục Sản Phẩm</a></li>
                <li><a href="../sanpham.php">Sản Phẩm</a></li>
                <li><a href="../lienhe.php">Liên Hệ</a></li>
            </ul>
            <div class="search">
                <input type="search" placeholder="Search...">
                <button>Tìm Kiếm</button>
            </div>
        </div>
        <div class="banner">
            <img class="img-anh" src="../img/logo.png" alt="">
        </div>
        <div class="container">
            <main>
                <h1>Đăng Ký</h1>
                <form action="" method="post">
                <label for="">
                    Họ tên:
                    <span id="obl">*</span>
                </label><br>
                <input type="text" name="hoten"  class="login"><br>
                <span style="color: red;"><?php echo isset($errorName) ? "$errorName" : "" ;?> </span><br>
                <label for="">
                    Tên đăng nhập:
                    <span id="obl">*</span>
                </label><br>
                <input type="text" name="username"  class="login"><br>
                <span style="color: red;"><?php echo isset($errorUser) ? "$errorUser" : "" ;?> </span><br>
                <label for="">
                    Email:
                    <span id="obl">*</span>
                </label><br>
                <input type="text" name="email"  class="login"><br>
                <span style="color: red;"><?php echo isset($errorEmail) ? "$errorEmail" : "" ;?> </span><br>
                <label for="">
                    Mật khẩu:
                    <span id="obl">*</span>
                </label><br>
                <input type="password" name="password"  class="login"><br>
                <span style="color: red;"><?php echo isset($errorPass) ? "$errorPass" : "" ;?> </span><br>
                <label for="">
                    Nhập lại mật khẩu:
                    <span id="obl">*</span>
                </label><br>
                <input type="password" name="cpassword"  class="login">
                <span style="color: red;"><?php echo isset($errorcPass) ? "$errorcPass" : "" ;?> </span><br>
                <div class="float-start"><button type="submit" id="btn" name = "submit"> Đăng ký </button></div>
                <div class="float-end" style=" font-size: 14px; margin-top: 30px; font-weight: bold;"><a href="dangnhap.php">Bạn đã có tài khoản?</a></div><br>
                <br><br>
                </form>
            </main>
        </div>
    </div>
    <footer>
            <div class="footer-section">
                <h5>TRỤ SỞ</h5>
                <p>Địa chỉ : Số 123 Đặng Tiến Đông, Đống Đa, Hà Nội</p>
                <p>Điện thoại : 0966868001 - 0466886633</p>
                <p>Email: kd.shophoaqua@gmail.com</p>
                <p>Website: shophoaqua.vn</p>
            </div>
            <div class="footer-section">
                <h3>ĐĂNG KÝ NHẬN EMAIL</h3>
                <p>Cung cấp email của bạn để nhận được thông tin khuyến mãi của chúng tôi</p>
                <input type="email" name="" id="mail" placeholder="Email của bạn...">
                <button id="gui">Gửi</button>
            </div>
            <div class="footer-section">
                <h3>Theo dõi chúng tôi</h3>
                <p>Facebook | Twitter | Instagram</p>
            </div>
        </footer>
</body>
</html>

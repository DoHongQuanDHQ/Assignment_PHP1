
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
    <div class="wrapper">
        <div class="menu">
                    <ul>
                        <li><a href="../trangchu.php">Trang Chủ</a></li>
                        <li><a href="../danhmuc/danhmucsp.php">Danh Sách Sản Phẩm</a></li>
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
            <div class="container-form">
                <main>
                    <form  method="POST">
                        <div class="content-input">
                            <label for="">
                            Email:
                            <span id="obl">*</span>
                            </label><br>
                            <input type="text" name="email" <?php $email ?? "" ?> class="login" placeholder="Laurasnow@gmail.com" id="email" autocomplete="off" name="email"><br>
                            <span style="color: red;"><?php echo isset($errorEmail) ? "$errorEmail" : "" ;?> </span><br>
                            <label for="">
                            Mật khẩu:
                            <span id="obl">*</span>
                            </label><br>
                            <input type="password" name="password"  class="login"  placeholder="*********" id="pass" name="password"><br>
                            <span style="color: red;"><?php echo isset($errorPass) ? "$errorPass" : "" ;?> </span><br>
                            <div class="alert">
                            </div>
                            <label for="showFogort" class="forgot" style="cursor: pointer" >Quên mật khẩu</label>
                            </div>
                            <div class="button-login">
                                <button class="button-lg" id="btn-lg" name="btn-lg">Đăng nhập</button>
                                <p id="errorAll"></p>
                            </div>
                    </form>
                </main>
            </div>
                <?php
                    session_start();
                    include "../config/connect.php";
                    $errorEmail = $errorPass = "";
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['btn-forgotPass'])) {
                            $email = $_POST['email'];
                            $checkEmail = taikhoan_select_one($email);
                            if ($checkEmail) {
                                $password = "Mật khẩu của bạn: " . $checkEmail['password'];
                            } else {
                                $password = "Email không tồn tại trong hệ thống.";
                            }
                        } else {
                            $email = $_POST['email'];
                            $password = $_POST['password'];

                            if (empty($email)) {
                                $errorEmail = "Trường này không được để trống";
                            } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                $errorEmail = "Email không hợp lệ";
                            }

                            if (empty($password)) {
                                $errorPass = "Trường này không được để trống";
                            } else if (strlen($password) < 6) {
                                $errorPass = "Mật khẩu phải dài ít nhất 6 ký tự.";
                            }

                            if (empty($errorEmail) && empty($errorPass)) {
                                $user = array('email' => $email, 'password' => $password);
                                if ($user) {
                                    $_SESSION['username'] = $user['username'];
                                    header("Location: ../trangchu.php");
                                    exit;
                                } else {
                                    echo "Email hoặc mật khẩu không chính xác.";
                                }
                            }
                        }
                    }
                ?>
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

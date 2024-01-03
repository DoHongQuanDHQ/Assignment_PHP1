<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/danhmucsp.css">
    <style>
        form {
            width: 50%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        input, select {
            margin: 10px 0;
            padding: 5px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            }
            input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
        <div class="wrapper">
            <div class="menu">
                <ul>
                    <li><a href="../trangchu.php">Trang Chủ</a></li>
                    <li><a href="danhmucsp.php">Danh Mục Sản Phẩm</a></li>
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
            <?php
                include '../config/connect.php';
                if (isset($_POST['btnsubmit'])) {
                    $tensanpham = $_POST['tensanpham'];
                    $giasanpham = $_POST['giasanpham'];
                    $danhmucsanpham = $_POST['danhmucsanpham'];
                    $anhsanpham = $_FILES['anhsanpham'];
                    $tenanh = $anhsanpham['name'];
                    $sql = "INSERT INTO `sanpham`(`tensanpham`, `giasanpham`, `danhmucsanpham`, `anhsanpham`) 
                            VALUES ('$tensanpham','$giasanpham','$danhmucsanpham','$tenanh')";
                            $conn->exec($sql);
                            move_uploaded_file($anhsanpham['tmp_name'],'./img/'.$tenanh);
                            echo "Thêm sản phẩm thành công <br>";
                    }
                ?>
            <form action="" method="post" enctype="multipart/form-data">
                <h1>Thêm Sản Phẩm</h1>
                <input type="text" name="tensanpham" id="" placeholder="Tên Sản Phẩm">
                <br>
                <input type="number" name="giasanpham" id="" placeholder="Giá Sản Phẩm">
                <br>
                <select name="danhmucsanpham" id="">
                <option value="Hoa Quả">Hoa Quả</option>
                <option value="Đĩa">Đĩa</option>
                <option value="Hộp">Hộp</option>
                <option value="Thùng">Thùng</option>
                </select>
                <br>
                <label for="">Ảnh sản phẩm:</label><br>
                <img src="./img/<?php echo $rows['anhsanpham'];?>"  alt="" width="80" height="80"><br>
                <input type="file" name="anhsanpham" id="">
                <br>
                
                <input type="submit" value="Thêm Sản Phẩm" name="btnsubmit">
            </form>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/danhmucsp.css">
    <style>
  form {
    width: 70%;
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
  img {
    margin: 10px 0;
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
                <div class="header">
                    <button type="button"><a href="../formlogin/dangky.php">Đăng Ký</a></button>
                    <button type="button"><a href="../formlogin/dangnhap.php">Đăng Nhập</a></button>
                </div>
            <div class="menu">
                <ul>
                    <li><a href="../trangchu.php">Trang Chủ</a></li>
                    <li><a href="danhmucsp.php">Danh Sách Sản Phẩm</a></li>
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
            include'../config/connect.php';
            $id = $_GET['id'];
            $sql = "select * from sanpham Where id=$id";
            // Chuẩn bị câu lệnh
            $stmt = $conn ->prepare($sql);
            // Thực thi câu lệnh
            $stmt->execute();
            // Lấy tất cả dữ liệu trả về mảng liên hợp
            $rows = $stmt -> fetch(PDO::FETCH_ASSOC);
            
            if (isset($_POST['btnsubmit'])) {
                $tensanpham = $_POST['tensanpham'];
                $giasanpham = $_POST['giasanpham'];
                $danhmucsanpham = $_POST['danhmucsanpham'];
                $anhsanpham = $_FILES['anhsanpham'];
                $tenanh = $anhsanpham['name'];
                if (empty($tenanh)) {
                    $sql = "UPDATE `sanpham` SET
                                `tensanpham`='$tensanpham',
                                `giasanpham`='$giasanpham',
                                `danhmucsanpham`='$danhmucsanpham' WHERE id=$id";
                } else {
                    $sql = "UPDATE `sanpham` SET
                                `tensanpham`='$tensanpham',
                                `giasanpham`='$giasanpham',
                                `danhmucsanpham`='$danhmucsanpham',
                                `anhsanpham`='$tenanh' WHERE id=$id";
                }
                        $conn->exec($sql);
                        move_uploaded_file($anhsanpham['tmp_name'],'../img/'.$tenanh);
                        echo "Sửa sản phẩm thành công <br>";
                        }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Sửa Sản Phẩm:</h1>
                        <p>Tên Sản Phẩm:</p>
                        <input type="text" name="tensanpham" id="" placeholder="Tên Sản Phẩm" value="<?php echo $rows['tensanpham']; ?>">
                        <br>
                        <p>Giá Sản Phẩm:</p>
                        <input type="number" name="giasanpham" id="" placeholder="Giá Sản Phẩm" value="<?php echo $rows['giasanpham']; ?>">
                        <br>
                        <select name="danhmucsanpham" id="">
                        <option value="Hoa Quả" <?php echo ($rows['danhmucsanpham']=="Hoa Quả") ? "selected" : ""; ?>>Hoa Quả</option>
                        <option value="Đĩa" <?php echo ($rows['danhmucsanpham']=="Đĩa") ? "selected" : ""; ?>>Đĩa</option>
                        <option value="Hộp" <?php echo ($rows['danhmucsanpham']=="Hộp")? "selected" : ""; ?>>Hộp</option>
                        <option value="Thùng" <?php echo ($rows['danhmucsanpham']=="Thùng") ? "selected" : ""; ?>>Thùng</option>
                        </select>
                        <br>
                        <label for="">Ảnh sản phẩm</label><br>
                        <img src="../img/<?php echo $rows['anhsanpham'];?>"  alt="" width="80" height="80"><br>
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
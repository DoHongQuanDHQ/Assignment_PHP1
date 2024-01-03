<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/danhmucsp.css">
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

        <div class="row">
            <div class="row formtitle">
                <h1>DANH SÁCH LOẠI HÀNG HÓA</h1>
            </div>
            <div class="row formcontent">
                <form action="#" method="get">
                    <div class="row mb2 formdsloai">
                        <table border = "1" width="800">
                            <tr align="center">
                                <th>ID</th>
                                <th>Chọn</th>
                                <th>Ảnh</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá Sản Phẩm</th>
                                <th>Danh Mục</th>
                                <th>Hành Động</th>
                            </tr>
                            <?php
                            include "../config/connect.php";
                             $sql = "select * from sanpham";
                             // Chuẩn bị câu lệnh
                            $stmt = $conn ->prepare($sql);
                             // Thực thi câu lệnh
                            $stmt->execute();
                             // Lấy tất cả dữ liệu trả về mảng liên hợp
                            $rows = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                                foreach($rows as $item){
                            ?>
                                <tr align="center">
                                    <td><?php echo $item ['id'];?></td>
                                    <td>
                                        <input type="checkbox" name="" id="">
                                    </td>
                                    <td>
                                    <?php
                                        if($item['anhsanpham'] ==''){
                                            echo '<img src="../img/1.PNG" alt="" width="80" height="80">';
                                        }else{
                                            echo '<img src="../img/'.$item['anhsanpham'].'" alt="" width="60" height="60">';
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $item ['tensanpham'] ?></td>
                                    <td><?php echo $item ['giasanpham'] ?></td>
                                    <td><?php echo $item ['danhmucsanpham'] ?></td>
                                    <td>
                                        <a href="sua.php?id=<?php echo $item['id'];?>">Sửa</a>
                                        <a href="xoa.php?id=<?php echo $item['id'];?>" onclick="return confirm('Bạn có muốn xóa không');">Xóa</a>
                                    </td>
                                </tr>
                            <?php
                                }          
                            ?>
                        </table>
                    </div>
                    <div class="mb2">
                        <a href="themsp.php"><input type="button" value="NHẬP THÊM"></a>
                    </div>
                </form>
            </div>
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
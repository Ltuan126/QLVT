<?php
$host = 'localhost';      // hoặc IP server MySQL
$username = 'root';       // tài khoản MySQL
$password = '';           // mật khẩu MySQL
$database = 'qlvt_02';   // tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($host, $username, $password, $database);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

echo "Kết nối thành công!";
?>

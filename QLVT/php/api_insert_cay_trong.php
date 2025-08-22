<?php
// // Thiết lập header để trả về JSON và xử lý UTF-8
// header("Content-Type: application/json; charset=UTF-8");

// // Kết nối database
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "ten_csdl";  // ⚠ Thay bằng tên CSDL thật

// $conn = new mysqli($servername, $username, $password, $dbname);

// // Kiểm tra kết nối
// if ($conn->connect_error) {
//     die(json_encode(["status" => "error", "message" => "Kết nối thất bại: " . $conn->connect_error]));
// }

include ('config.php'); // Kết nối database từ file config.php

// Lấy dữ liệu từ POST
$MaCay = $_POST['MaCay'] ?? '';
$TenCay = $_POST['TenCay'] ?? '';
$ThoiVu = $_POST['ThoiVu'] ?? '';

// Kiểm tra dữ liệu đầu vào
if ($MaCay && $TenCay && $ThoiVu) {
    $stmt = $conn->prepare("INSERT INTO CayTrong (MaCay, TenCay, ThoiVu) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $MaCay, $TenCay, $ThoiVu);

    if ($stmt->execute()) {
        echo json_encode(["status" => "success", "message" => "Thêm thành công"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Lỗi khi thêm dữ liệu: " . $stmt->error]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Thiếu dữ liệu đầu vào"]);
}

$conn->close();
?>

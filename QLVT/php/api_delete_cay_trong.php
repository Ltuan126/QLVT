<?php
header("Content-Type: application/json; charset=UTF-8");
include('config.php');

// Lấy từ query string
$MaCay = $_GET['MaCay'] ?? '';

if ($MaCay) {
    $stmt = $conn->prepare("DELETE FROM CayTrong WHERE MaCay = ?");
    $stmt->bind_param("s", $MaCay);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["status" => "success", "message" => "Đã xóa cây $MaCay"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Không tìm thấy cây cần xóa"]);
    }

    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Thiếu mã cây cần xóa"]);
}

$conn->close();
?>

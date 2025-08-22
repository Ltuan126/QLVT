<?php
header("Content-Type: application/json; charset=UTF-8");
include('config.php');

$MaND = $_GET['mand'] ?? '';
$data = [];

if ($MaND) {
    $stmt = $conn->prepare("SELECT * FROM ThuaDat WHERE MaND = ?");
    $stmt->bind_param("s", $MaND);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);
    $stmt->close();
} else {
    echo json_encode(["status" => "error", "message" => "Thiếu MaND"]);
}

$conn->close();
?>

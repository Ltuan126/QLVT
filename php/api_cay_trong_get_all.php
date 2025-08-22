<?php
header("Content-Type: application/json; charset=UTF-8");
include('config.php');

$result = $conn->query("SELECT * FROM CayTrong");
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>

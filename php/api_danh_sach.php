<?php
header("Content-Type: application/json; charset=UTF-8");
include('config.php');

$sql = "SELECT nd.MaND, nd.HoTen, td.MaTD, td.DiaChi AS DiaChiThua,
               ct.MaCay, ct.TenCay, ct.ThoiVu
        FROM Trong tr
        JOIN NongDan nd ON tr.MaND = nd.MaND
        JOIN ThuaDat td ON tr.MaTD = td.MaTD
        JOIN CayTrong ct ON tr.MaCay = ct.MaCay";

$result = $conn->query($sql);
$data = [];

while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode($data);
$conn->close();
?>

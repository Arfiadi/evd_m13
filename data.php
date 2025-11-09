<?php
$servername = "localhost"; // Ganti dengan server database Anda
$username = "root"; // Ganti dengan username database Anda
$password = ""; // Ganti dengan password database Anda
$dbname = "datamart"; // Ganti dengan nama database Anda
// Koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);
// Cek koneksi
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT label, nilai FROM data_grafik";
$result = $conn->query($sql);
$data = array();
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$data[] = $row;
}
}
$conn->close();
// Mengeluarkan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
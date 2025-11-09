<?php
header('Content-Type: application/json');
$filename = 'data.csv';
if (!file_exists($filename)) {
echo json_encode([]);
exit;
}
$data = [];
if (($handle = fopen($filename, 'r')) !== false) {
// Membaca header
$header = fgetcsv($handle);

while (($row = fgetcsv($handle)) !== false) {
$data[] = array_combine($header, $row);
}
fclose($handle);
}
echo json_encode($data);
?>
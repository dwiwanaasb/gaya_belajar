<?php
error_reporting(E_ERROR);
session_start();
require 'config/functions.php';
require 'vendor/autoload.php';

if (!isset($_SESSION["login"])) {
    header('location: login.php');
    exit;
}

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$query = mysqli_query($conn, "SELECT * FROM users");

if (mysqli_num_rows($query) > 0) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'NO');
    $sheet->setCellValue('B1', 'USERNAME');
    $sheet->setCellValue('C1', 'PASSWORD');

    $rowCount = 2;
    $no = 1;
    foreach ($query as $data) {
        $sheet->setCellValue('A' . $rowCount, $no);
        $sheet->setCellValue('B' . $rowCount, $data['username']);
        $sheet->setCellValue('C' . $rowCount, $data['password']);
        $sheet->setCellValue('D' . $rowCount, '=2*2' . '+5');
        $rowCount++;
        $no++;
    }

    $fileName = 'file';
    $writer = new Xlsx($spreadsheet);
    $final_filename = $fileName . '.xlsx';
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="' . urlencode($final_filename) . '"');
    $writer->save('php://output');
} else {
    echo "<script>
                alert('Download tidak berhasil, data tidak ada');
                window.history.go(-1);
            </script>";
}

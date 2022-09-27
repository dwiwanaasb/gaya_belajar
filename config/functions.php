<?php
require 'connection.php';

function select($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function delete($id)
{
    global $conn;

    $query = "DELETE FROM data_siswa WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($id)
{
    global $conn;

    $id = $_POST["id"];
    $nik = htmlspecialchars($_POST["nik"]);
    $nama_anak = htmlspecialchars($_POST["nama_anak"]);
    $usia = htmlspecialchars($_POST["usia"]);
    $nama_ortu = htmlspecialchars($_POST["nama_ortu"]);
    $alamat = htmlspecialchars($_POST["alamat"]);

    $query = "UPDATE data_siswa SET
                nik = $nik,
                nama_anak = '$nama_anak',
                usia = $usia,
                nama_ortu = '$nama_ortu',
                alamat = '$alamat'
            WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

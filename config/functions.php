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

function deleteData($id_siswa)
{
    global $conn;

    $query = "DELETE FROM data_siswa WHERE id_siswa = $id_siswa";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function deleteCiri($id_ciri)
{
    global $conn;

    $query = "DELETE FROM ciri WHERE id_ciri = $id_ciri";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

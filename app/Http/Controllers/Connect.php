<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "sisfopkl";
$jenis_absen = $_POST['jenis_absen'];
$tanggal_input = $_POST['tanggal_input'];
$geoloc = $_POST['geoloc'];

// Connect to the database
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if($conn->connect_error) {
    die('Koneksi gagal : '.$conn->connect_error);
} else {
    $stmt = $conn->prepare("insert into rekap_absen(id, jenis_absen, tanggal_input, geoloc) 
        values(1, ?, ?, ?)");
    $stmt->bind_param("sss", $jenis_absen, $tanggal_input, $geoloc);
    $stmt->execute();
    echo "input data sukses";
    $stmt->close();
    $conn->close();
}
    
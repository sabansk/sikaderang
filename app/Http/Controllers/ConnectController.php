<?php
    $id = $_POST['id'];
    $jenis_absen = $_POST['jenis_absen'];
    $tanggal_input = $_POST['tanggal_input'];
    $foto_absensi = $_POST['foto_absensi'];
    $geoloc = $_POST['geoloc'];

    // koneksi.php momen
    $conn = new mysqli('localhost', 'root','','sisfopkl');
    if($conn->connect_error) {
        die('Koneksi gagal : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into rekap_absen(id, jenis_absen, tanggal_input, foto_absensi, geoloc) 
            values(1, ?, ?, ?, ?)");
        $stmt->bind_param("issss", $id, $jenis_absen, $tanggal_input, $foto_absensi, $geoloc);
        $stmt->execute();
        echo "input data sukses";
        $stmt->close();
        $conn->close();
    }
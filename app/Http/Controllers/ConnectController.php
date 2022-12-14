<?php
    $jenis_absen = $_POST['jenis_absen'];
    $tanggal_input = $_POST['tanggal_input'];
    $geoloc = $_POST['geoloc'];

    // koneksi.php momen
    $conn = new mysqli('localhost', 'root','','sisfopkl');
    if($conn->connect_error) {
        die('Koneksi gagal : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("insert into rekap_absen(jenis_absen, tanggal_input, geoloc) 
            values(?, ?, ?)");
        $stmt->bind_param("sss", $jenis_absen, $tanggal_input, $geoloc);
        $stmt->execute();
        echo "input data sukses";
        $stmt->close();
        $conn->close();
    }
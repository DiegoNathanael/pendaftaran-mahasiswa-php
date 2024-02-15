<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $tanggal_tes = $_POST["tanggal_tes"];
    $no_peserta = $_POST["no_peserta"];


    $koneksi = new mysqli("localhost", "root", "", "db_mahasiswa");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $sql = "INSERT INTO peserta_tes (
        nama, 
        email, 
        tanggal_tes,
        no_peserta
        ) 
        
        VALUES (
            '$nama', 
            '$email', 
            '$tanggal_tes',
            '$no_peserta'
        )";

    if ($koneksi->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

}

// ...
if ($koneksi->query($sql) === TRUE) {

    header("Location: nomor_peserta.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}
// ...
$koneksi -> close();

?>
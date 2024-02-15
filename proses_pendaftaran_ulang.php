<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $tanggal_lahir = $_POST["tanggal_lahir"];
    $tempat_tinggal = $_POST["tempat_tinggal"];
    $prodi = $_POST["prodi"];


    $koneksi = new mysqli("localhost", "root", "", "db_mahasiswa");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    $sql = "INSERT INTO pendaftaran_ulang (nama, email, tanggal_lahir, tempat_tinggal, prodi) VALUES ('$nama', '$email', '$tanggal_lahir', '$tempat_tinggal', '$prodi')";

    if ($koneksi->query($sql) === TRUE) {
        header("Location: nomor_induk_mahasiswa.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    $koneksi->close();

}
?>

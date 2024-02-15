<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $koneksi = new mysqli("localhost", "root", "", "db_mahasiswa");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data admin ke database
    $query = "INSERT INTO admin (username, password) VALUES ('$username', '$hashed_password')";

    if ($koneksi->query($query) === TRUE) {
        // Registrasi berhasil, arahkan ke halaman login admin
        header("Location: admin_login.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . $koneksi->error;
    }
}

// Tutup koneksi
$koneksi->close();
?>

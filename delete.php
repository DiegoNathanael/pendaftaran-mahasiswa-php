<?php
// Mulai session
session_start();

// Periksa session admin_id
if (!isset($_SESSION["admin_id"])) {
    // Jika session tidak diatur, arahkan ke halaman login
    header("Location: admin_login.php");
    exit();
}

// Sertakan file koneksi
$koneksi = new mysqli("localhost", "root", "", "db_mahasiswa");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

// Inisialisasi variabel pesan kesalahan
$error = "";

// Periksa apakah parameter ID ada dalam URL
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];

    // Query untuk menghapus data peserta tes berdasarkan ID
    $delete_query = "DELETE FROM peserta_tes WHERE id = $id";

    if ($koneksi->query($delete_query) === TRUE) {
        // Redirect kembali ke halaman admin_dashboard.php setelah menghapus
        header("Location: data_peserta_tes.php");
        exit();
    } else {
        $error = "Gagal menghapus data: " . $koneksi->error;
    }
} else {
    $error = "ID tidak valid.";
}

// Menampilkan pesan kesalahan jika ada
if (!empty($error)) {
    echo "<div class='alert alert-danger'>$error</div>";
}

// Tutup koneksi
$koneksi->close();
?>

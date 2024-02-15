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

// Inisialisasi variabel untuk menyimpan pesan kesalahan
$error = "";

// Proses form ketika disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan melalui form
    $teks_soal = $_POST["teks_soal"];
    $pilihan_a = $_POST["pilihan_a"];
    $pilihan_b = $_POST["pilihan_b"];
    $pilihan_c = $_POST["pilihan_c"];
    $pilihan_d = $_POST["pilihan_d"];
    $jawaban_benar = $_POST["jawaban_benar"];

    // Query untuk menyimpan soal ke dalam database
    $insert_query = "INSERT INTO soal (teks_soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban_benar) 
                     VALUES ('$teks_soal', '$pilihan_a', '$pilihan_b', '$pilihan_c', '$pilihan_d', '$jawaban_benar')";

    if ($koneksi->query($insert_query) === TRUE) {
        // Soal berhasil ditambahkan ke database
        // Redirect ke halaman admin_dashboard.php atau halaman lain yang sesuai
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Gagal menambahkan soal: " . $koneksi->error;
    }
}

// Tutup koneksi
$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Soal</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Tambah Soal</h2>
        <form method="post">
            <div class="form-group">
                <label for="teks_soal">Teks Soal:</label>
                <textarea class="form-control" name="teks_soal" id="teks_soal" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="pilihan_a">Pilihan A:</label>
                <input type="text" class="form-control" name="pilihan_a" id="pilihan_a" required>
            </div>
            <div class="form-group">
                <label for="pilihan_b">Pilihan B:</label>
                <input type="text" class="form-control" name="pilihan_b" id="pilihan_b" required>
            </div>
            <div class="form-group">
                <label for="pilihan_c">Pilihan C:</label>
                <input type="text" class="form-control" name="pilihan_c" id="pilihan_c" required>
            </div>
            <div class="form-group">
                <label for="pilihan_d">Pilihan D:</label>
                <input type="text" class="form-control" name="pilihan_d" id="pilihan_d" required>
            </div>
            <div class="form-group">
                <label for="jawaban_benar">Jawaban Benar:</label>
                <input type="text" class="form-control" name="jawaban_benar" id="jawaban_benar" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Soal</button>
        </form>
        <?php
        // Menampilkan pesan kesalahan jika ada
        if (!empty($error)) {
            echo "<p class='text-danger mt-3'>$error</p>";
        }
        ?>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


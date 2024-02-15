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

    $no_peserta = mt_rand(1, 1000);

    // Query untuk menyimpan nomor peserta ke dalam database
    $insert_query = "INSERT INTO peserta_tes (no_peserta) VALUES ($no_peserta)";
    
    // Tutup koneksi
    $koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nomor Peserta</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Nomor Peserta Anda</h2>
        <form method="post">
            <div class="form-group">
               <?php echo "<h1>$no_peserta</h1>"; ?>
               <input type="text" class="form-control" name="no_peserta" value="<?php echo $no_peserta; ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan ke Database</button>
            <a href="login.php" class="btn btn-secondary">Kembali ke Halaman Login</a>
        </form>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

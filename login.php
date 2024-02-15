<?php
// Sertakan file koneksi
$koneksi = new mysqli("localhost", "root", "", "db_mahasiswa");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

// Cek jika form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    // $no_peserta = $_POST["no_peserta"];

    // Query untuk mencari admin berdasarkan username
    $query = "SELECT * FROM peserta_tes WHERE nama = '$nama'";
    $result = $koneksi->query($query);

    // if ($result->num_rows == 1) {
    //     header("Location: admin_dashboard.php");
    //         exit();
    //     // $row = $result->fetch_assoc();
    //     // if (password_verify($no_peserta, $row["no_peserta"])) {
    //     //     // Autentikasi berhasil, atur session
    //     //     session_start();
    //     //     $_SESSION["admin_id"] = $row["id"];

    //     //     // Arahkan ke dashboard admin
    //     //     header("Location: admin_dashboard.php");
    //     //     exit();
    //     // } else {
    //     //     $error = "Password salah";
    //     // }
    // } else {
    //     $error = "Peserta tidak ditemukan";
    // }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Peserta Tes</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Login Peserta Tes</h2>
        <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <!-- <div class="form-group">
                <label for="no_peserta">No. Peserta:</label>
                <input type="text" class="form-control" id="no_peserta" name="no_peserta" required>
            </div> -->
            <a href="soal_tes.php" class="btn btn-primary">Kerjakan Tes</a>
            <!-- <button type="submit" class="btn btn-primary">Kerjakan Ujian</button> -->
            <a href="registration.php" class="btn btn-secondary">Dapatkan Nomor Peserta</a>
        </form>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

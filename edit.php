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

    // Query untuk mengambil data peserta tes berdasarkan ID
    $query = "SELECT * FROM peserta_tes WHERE id = $id";
    $result = $koneksi->query($query);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Proses pengeditan data jika form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST["nama"];
            $email = $_POST["email"];
            $tanggal_tes = $_POST["tanggal_tes"];
            $no_peserta = $_POST["no_peserta"];

            // Query untuk mengupdate data peserta tes
            $update_query = "UPDATE peserta_tes SET nama = '$nama', email = '$email', tanggal_tes = '$tanggal_tes', no_peserta = '$no_peserta' WHERE id = $id";

            if ($koneksi->query($update_query) === TRUE) {
                // Redirect kembali ke halaman admin_dashboard.php setelah mengedit
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $error = "Gagal mengedit data: " . $koneksi->error;
            }
        }
    } else {
        $error = "Data peserta tes tidak ditemukan.";
    }
} else {
    $error = "ID tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Peserta Tes</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Peserta Tes</h2>
        <?php
        // Tampilkan pesan kesalahan jika ada
        if (!empty($error)) {
            echo "<div class='alert alert-danger'>$error</div>";
        }
        ?>
        <form method="post">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $row["nama"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="tanggal_tes">Tanggal Tes:</label>
                <input type="date" class="form-control" id="tanggal_tes" name="tanggal_tes" value="<?php echo $row["tanggal_tes"]; ?>" required>
            <div class="form-group">
                <label for="no_peserta">No. Peserta:</label>
                <input type="text" class="form-control" id="no_peserta" name="no_peserta" value="<?php echo $row["tanggal_tes"]; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

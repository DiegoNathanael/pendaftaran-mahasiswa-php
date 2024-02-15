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

    $query = "SELECT id, nama, email, tanggal_lahir, tempat_tinggal, prodi FROM pendaftaran_ulang";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Jika ada data, tampilkan dalam tabel
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Peserta Tes</title>
            <!-- Sertakan link ke Bootstrap CSS -->
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        </head>
        <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="admin_dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_peserta_tes.php">Data Peserta Tes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="data_maba.php">Data Mahasiswa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="list_soal.php">Soal</a>
                </li>
            </ul>
        </div>
    </nav>
            <div class="container mt-5">
                <h2>Data Mahasiswa yang Sudah Registrasi Ulang</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Tanggal Lahir</th>
                            <th>Tempat Tinggal</th>
                            <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Loop melalui hasil query dan tampilkan data
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nama"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["tanggal_lahir"] . "</td>";
                            echo "<td>" . $row["tempat_tinggal"] . "</td>";
                            echo "<td>" . $row["prodi"] . "</td>";
                            echo "</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    
            <!-- Sertakan script Bootstrap dan jQuery -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>
        <?php
    } else {
        // Jika tidak ada data, tampilkan pesan
        echo "Tidak ada data peserta tes.";
    }

    $koneksi->close();

// Contoh tampilan dashboard admin
?>

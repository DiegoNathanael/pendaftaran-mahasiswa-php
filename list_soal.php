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

    $query = "SELECT no_soal, teks_soal, pilihan_a, pilihan_b, pilihan_c, pilihan_d, jawaban_benar FROM soal";
    $result = $koneksi->query($query);

    if ($result->num_rows > 0) {
        // Jika ada data, tampilkan dalam tabel
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>List Soal</title>
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
                <h2 class="mb-4">List Soal</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No. Soal</th>
                            <th>Soal</th>
                            <th>Pilihan A</th>
                            <th>Pilihan B</th>
                            <th>Pilihan C</th>
                            <th>Pilihan D</th>
                            <th>Jawaban Benar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Mengambil data soal dari database dan menampilkannya dalam tabel
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $row["no_soal"] . "</td>";
                            echo "<td>" . $row["teks_soal"] . "</td>";
                            echo "<td>" . $row["pilihan_a"] . "</td>";
                            echo "<td>" . $row["pilihan_b"] . "</td>";
                            echo "<td>" . $row["pilihan_c"] . "</td>";
                            echo "<td>" . $row["pilihan_d"] . "</td>";
                            echo "<td>" . $row["jawaban_benar"] . "</td>";
                            echo "</td>";
                            echo "</tr>";
                            echo "<a href='tambah_soal.php' class='btn btn-primary'>Tambah Soal</a>";
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
        echo "Tidak ada soal.";
    }

    $koneksi->close();

// Contoh tampilan dashboard admin
?>
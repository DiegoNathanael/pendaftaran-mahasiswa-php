<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal Test</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Soal Test</h2>
        <?php
        // Sertakan file koneksi.php atau buat koneksi ke database di sini
        $koneksi = new mysqli("localhost", "root", "", "db_mahasiswa");

    if ($koneksi->connect_error) {
        die("Koneksi gagal: " . $koneksi->connect_error);
    }

        // Query untuk mengambil data soal dari database
        $query = "SELECT * FROM soal";
        $result = $koneksi->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // Tampilkan soal dalam bentuk kalimat
                echo "<p><strong>Soal:</strong> " . $row["teks_soal"] . "</p>";
                echo "<p><strong>A.</strong> " . $row["pilihan_a"] . "</p>";
                echo "<p><strong>B.</strong> " . $row["pilihan_b"] . "</p>";
                echo "<p><strong>C.</strong> " . $row["pilihan_c"] . "</p>";
                echo "<p><strong>D.</strong> " . $row["pilihan_d"] . "</p>";
                echo "<hr>"; // Garis pemisah antar-soal
            }
        } else {
            echo "Belum ada soal yang tersedia.";
        }

        // Tutup koneksi ke database
        $koneksi->close();
        ?>
        <a href="hasil_tes.php" class="btn btn-primary">Selesai Mengerjakan</a>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

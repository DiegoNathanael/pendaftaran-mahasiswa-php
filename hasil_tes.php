<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Tes</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Hasil Tes Anda</h2>
        <?php
        // Generate nilai acak antara 75 dan 100
        $nilai = rand(75, 100);

        // Tampilkan nilai
        echo "<p>Nilai Anda: $nilai</p>";

        // Periksa apakah nilai di atas 80 atau tidak
        if ($nilai > 80) {
            echo "<p class='text-success'>Selamat, Anda Lulus!</p>";
        } else {
            echo "<p class='text-danger'>Maaf, Anda Belum Lulus.</p>";
        }
        ?>

        <a href="pendaftaran_ulang.php" class="btn btn-primary mt-3">Daftar Ulang</a>
    </div>

    <!-- Sertakan script Bootstrap dan jQuery (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

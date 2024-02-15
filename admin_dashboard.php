<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Sertakan link ke Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Sertakan CSS kustom jika diperlukan -->
    <style>
        /* Tambahkan CSS kustom di sini */
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="display-4">Hai Admin!</h1>
        <div class="list-group">
            <a href="data_peserta_tes.php" class="list-group-item list-group-item-action">Data Peserta Tes</a>
            <a href="data_maba.php" class="list-group-item list-group-item-action">Data Mahasiswa</a>
            <a href="list_soal.php" class="list-group-item list-group-item-action">Soal</a>
        </div>

        <a href="index.php" class="btn btn-primary mt-5">Kembali ke Beranda</a> 
    </div>

    <!-- Sertakan script Bootstrap dan jQuery (jika diperlukan) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

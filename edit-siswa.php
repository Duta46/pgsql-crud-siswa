<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nim = $_POST['nim'];

    $query = "UPDATE mahasiswa SET name = :name, nim = :nim WHERE id = :id";
    $data = $pdo->prepare($query);
    $data->execute(['name' => $name, 'nim' => $nim, 'id' => $id]);

    header("Location: siswa.php");
    exit;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM mahasiswa WHERE id = :id";
    $data = $pdo->prepare($query);
    $data->execute(['id' => $id]);
    $mahasiswa = $data->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Data Mahasiswa</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($mahasiswa['id']); ?>">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($mahasiswa['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM</label>
                <input type="number" class="form-control" id="nim" name="nim" value="<?php echo htmlspecialchars($mahasiswa['nim']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="siswa.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
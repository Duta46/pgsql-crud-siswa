<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Mahasiswa</h1>
        <a href="add-siswa.php" class="btn btn-primary mb-3">Tambah Data Mahasiswa</a>
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'koneksi.php';

                    // Query untuk membaca data dari tabel mahasiswa
                    $query = "SELECT * FROM mahasiswa";

                    try {
                        $data = $pdo->query($query);

                        if ($data->rowCount() > 0) {
                            while ($row = $data->fetch(PDO::FETCH_ASSOC)) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['nim']) . "</td>";
                                echo "<td>";
                                echo "<a href='edit-siswa.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-warning btn-sm'>Edit</a> ";
                                echo "<a href='delete-siswa.php?id=" . htmlspecialchars($row['id']) . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Delete</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4' class='text-center'>Tidak ada data ditemukan.</td></tr>";
                        }
                    } catch (PDOException $e) {
                        echo "<tr><td colspan='4' class='text-center'>Error: " . $e->getMessage() . "</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                "paging": false,
                "info": false
            });

            // Update ID columns after table redraw
            table.on('draw', function () {
                $('#dataTable tbody tr').each(function (index) {
                    $(this).find('td:first').text(index + 1);
                });
            });
        });
    </script>
</body>
</html>

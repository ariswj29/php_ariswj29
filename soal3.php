<?php
$mysqli = new mysqli("localhost", "root", "root", "testdb");

if ($mysqli->connect_error) {
    die("Koneksi gagal: " . $mysqli->connect_error);
}

$searchNama = isset($_POST['search_nama']) ? $_POST['search_nama'] : '';
$searchAlamat = isset($_POST['search_alamat']) ? $_POST['search_alamat'] : '';
$searchHobi = isset($_POST['search_hobi']) ? $_POST['search_hobi'] : '';

$query = "SELECT person.id, person.nama, person.alamat, GROUP_CONCAT(hobi.hobi SEPARATOR ', ') AS hobi
          FROM person
          LEFT JOIN hobi ON person.id = hobi.person_id
          WHERE person.nama LIKE '%$searchNama%'
          AND person.alamat LIKE '%$searchAlamat%'
          AND (hobi.hobi LIKE '%$searchHobi%' OR hobi.hobi IS NULL)
          GROUP BY person.id";

$result = $mysqli->query($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Person dan Hobi</title>
</head>
<body>
    <h2>Daftar Person dan Hobi</h2>
    
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Alamat</th>
            <th>Hobi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
        <td><?= htmlspecialchars(!empty($row['nama']) ? $row['nama'] : '-') ?></td>
        <td><?= htmlspecialchars(!empty($row['alamat']) ? $row['alamat'] : '-') ?></td>
        <td><?= htmlspecialchars(!empty($row['hobi']) ? $row['hobi'] : '-') ?></td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h3>Pencarian</h3>
    <form method="post" action="">
        <div style="border: 1px solid black; padding: 10px; display: flex; flex-direction: column; width: 300px; gap:1rem">
        <div style="display: flex; gap: 1rem">
        <label>Nama:</label>
        <input type="text" name="search_nama" value="<?= htmlspecialchars($searchNama) ?>">
        </div>
        <div style="display: flex; gap: 1rem">
        <label>Alamat:</label>
        <input type="text" name="search_alamat" value="<?= htmlspecialchars($searchAlamat) ?>">
        </div>
        <button type="submit" style="padding: 8px 4px; width: 70px">Search</button>
        </div>
    </form>
</body>
</html>

<?php
$mysqli->close();
?>

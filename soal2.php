<?php
$step = isset($_POST['step']) ? (int)$_POST['step'] : 1;
$nama = isset($_POST['nama']) ? $_POST['nama'] : '';
$umur = isset($_POST['umur']) ? $_POST['umur'] : '';
$hobi = isset($_POST['hobi']) ? $_POST['hobi'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tahapan</title>
</head>
<body>
    <form method="post" action="soal2.php">
        <div style="border: 1px solid black; padding: 10px; margin: 10px; display: flex; flex-direction: column; width: 300px; gap:3rem">
        <?php if ($step == 1): ?>
            <div> 
                <label>Nama Anda:</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>" required>
                <input type="hidden" name="step" value="2">
            </div>
        
        <?php elseif ($step == 2): ?>
            <div>
                <label>Umur Anda:</label>
                <input type="number" name="umur" value="<?= htmlspecialchars($umur) ?>" required>
                <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
                <input type="hidden" name="step" value="3">
            </div>
        
        <?php elseif ($step == 3): ?>
            <div>
                <label>Hobi Anda:</label>
                <input type="text" name="hobi" value="<?= htmlspecialchars($hobi) ?>" required>
                <input type="hidden" name="nama" value="<?= htmlspecialchars($nama) ?>">
                <input type="hidden" name="umur" value="<?= htmlspecialchars($umur) ?>">
                <input type="hidden" name="step" value="4">
            </div>
        
        <?php elseif ($step == 4): ?>
            <div>
                <p>Nama: <?= htmlspecialchars($nama) ?></p>
                <p>Umur: <?= htmlspecialchars($umur) ?></p>
                <p>Hobi: <?= htmlspecialchars($hobi) ?></p>
            </div>
        
        <?php else: ?>
            <h2>Error</h2>
            <p>Terjadi kesalahan. Mulai dari awal.</p>
            <input type="hidden" name="step" value="1">
        <?php endif; ?>

        <?php if ($step < 4): ?>
            <button type="submit" style="padding: 8px 4px; width: 70px">Submit</button>
        <?php endif; ?>
        </div>
    </form>
</body>
</html>

<?php

$jml = isset($_GET['jml']) ? $_GET['jml'] : null;

if ($jml !== null) {
    echo "<table border=1>\n";
    for ($a = $jml; $a > 0; $a--) {
        $total = 0;
        for ($b = $a; $b > 0; $b--) {
            $total += $b;
        }

        echo "<tr><td colspan=\"$a\">Total: $total</td></tr>\n";

        echo "<tr>\n";
        for ($b = $a; $b > 0; $b--) {
            echo "<td>$b</td>";
        }
        echo "</tr>\n";
    }
    echo "</table>";
} else {
    echo "Parameter 'jml' tidak ditemukan. Silakan tambahkan ?jml=angka di URL.";
}

?>
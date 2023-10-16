<?php
include('config.php');

$query = "SELECT * FROM karyawan";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['NIP'] . "</td>";
        echo "<td>" . $row['Nama'] . "</td>";
        echo "<td>" . $row['Divisi'] . "</td>";
        echo "<td><button class='delete' data-nip='" . $row['NIP'] . "'>Hapus</button></td>";
        echo "</tr>";
    }
} else {
    echo "Tidak ada data karyawan.";
}

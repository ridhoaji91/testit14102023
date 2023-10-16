<!DOCTYPE html>
<html>

<head>
    <title>Laporan Karyawan</title>
</head>

<body>

    <h1>Report Karyawan By Range Umur</h1>
    <table border="1">
        <tr>
            <th>Range Umur</th>
            <th>Total Karyawan</th>
            <th>Total Gaji (dalam rupiah)</th>
        </tr>
        <?php
        
        $conn = new mysqli("localhost", "root", "", "testit14102023");

        $sql = "SELECT
                CASE
                    WHEN Umur BETWEEN 21 AND 30 THEN '21-30 tahun'
                    WHEN Umur BETWEEN 31 AND 40 THEN '31-40 tahun'
                    ELSE 'Lain-Lain'
                END AS Range_Umur,
                COUNT(*) AS Total_Karyawan,
                SUM(CASE
                        WHEN Valuta = 'IDR' THEN Gaji
                        WHEN Valuta = 'USD' THEN Gaji * 10000
                        WHEN Valuta = 'EUR' THEN Gaji * 9000 
                        WHEN Valuta = 'CNY' THEN Gaji * 150 
                        WHEN Valuta = 'JPY' THEN Gaji * 200
                    END) AS Total_Gaji_Rupiah
            FROM Karyawan
            GROUP BY Range_Umur
            ORDER BY Range_Umur";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Range_Umur"] . "</td>";
                echo "<td>" . $row["Total_Karyawan"] . " orang</td>";
                echo "<td>" . number_format($row["Total_Gaji_Rupiah"]) . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();
        ?>
    </table>

    <h1>Report Karyawan Per Mata Uang (Total Gaji di atas Rp. 15.000.000)</h1>
    <table border="1">
        <tr>
            <th>Valuta</th>
            <th>Total Karyawan</th>
            <th>Total Gaji (dalam rupiah)</th>
        </tr>
        <?php
        $conn = new mysqli("localhost", "root", "", "testit14102023");

        $sql = "SELECT
                Valuta,
                COUNT(*) AS Total_Karyawan,
                SUM(CASE
                        WHEN Valuta = 'IDR' THEN Gaji
                        WHEN Valuta = 'USD' THEN Gaji * 10000 
                        WHEN Valuta = 'EUR' THEN Gaji * 9000
                        WHEN Valuta = 'CNY' THEN Gaji * 150 
                        WHEN Valuta = 'JPY' THEN Gaji * 200 
                    END) AS Total_Gaji_Rupiah
            FROM Karyawan
            GROUP BY Valuta
            HAVING Total_Gaji_Rupiah > 15000000";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["Valuta"] . "</td>";
                echo "<td>" . $row["Total_Karyawan"] . " orang</td>";
                echo "<td>" . number_format($row["Total_Gaji_Rupiah"]) . "</td>";
                echo "</tr>";
            }
        }

        $conn->close();
        ?>
    </table>

</body>

</html>
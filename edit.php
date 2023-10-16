<?php
include "config.php";
$Nip = $_GET['Nip'];
$query = mysqli_query($koneksi, "SELECT * FROM Karyawan WHERE Nip='$Nip'") or die(mysqli_error($koneksi));
$result = mysqli_fetch_array($query);

?>
<form method="POST" id="formEdit">
    <table>
        <tr>
            <td>Nama</td>
            <td>
                <input type="hidden" name="Nip" id="Nip" required="" value="<?php echo $result['nip']; ?>" />
                <input type="text" name="Nama" id="Nama" required="" value="<?php echo $result['nama']; ?>" />
            </td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>
                <input type="text" name="Divisi" id="Divisi" required="" value="<?php echo $result['divisi']; ?>" />
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" id="simpan" value="Simpan" />
                <button type="button" id="cancelButton">Batal</button>
            </td>
        </tr>
    </table>
</form>
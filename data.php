<button id="addButton" class="btn btn-primary">Tambah Data</button>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Divisi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include "config.php";
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM karyawan") or die(mysqli_error($koneksi));
        while ($result = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td>
                    <?php echo $no++; ?>
                </td>
                <td>
                    <?php echo $result['nip']; ?>
                </td>
                <td>
                    <?php echo $result['nama']; ?>
                </td>
                <td>
                    <?php echo $result['divisi']; ?>
                </td>
                <td>
                    <button id="EditButton" value="<?php echo $result['nip']; ?>">Edit</button>
                    <button id="DeleteButton" value="<?php echo $result['nip']; ?>">Delete</button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
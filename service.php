<?php
include "config.php";

switch ($_GET['action']) {

    case 'save':

        $Nip = $_POST['Nip'];
        $Nama = $_POST['Nama'];
        $Divisi = $_POST['Divisi'];

        $query = mysqli_query($koneksi, "INSERT INTO karyawan(nip, nama, divisi) VALUES('$Nip', '$Nama', '$Divisi')");
        if ($query) {
            echo "Simpan Data Berhasil";
        } else {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
        break;

    case 'edit':

        $Nip = $_POST['Nip'];
        $Nama = $_POST['Nama'];
        $Divisi = $_POST['Divisi'];

        $query = mysqli_query($koneksi, "UPDATE karyawan SET nama='$Nama', divisi='$Divisi' WHERE nip='$Nip'");
        if ($query) {
            echo "Edit Data Berhasil";
        } else {
            echo "Edit Data Gagal :" . mysqli_error($koneksi);
        }
        break;

    case 'delete':

        $Nip = $_POST['Nip'];
        $query = mysqli_query($koneksi, "DELETE FROM karyawan WHERE nip='$Nip'");
        if ($query) {
            echo "Hapus Data Berhasil";
        } else {
            echo "Hapus Data Gagal :" . mysqli_error($koneksi);
        }
        break;
}

<?php
$koneksi = new mysqli('localhost', 'root', '', 'kennard_xipplg2') or die(mysqli_error($koneksi));

// Menyimpan data
if (isset($_POST['simpan'])) {
    $idPasien = $_POST['idPasien'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $koneksi->query("INSERT INTO pasien (idPasien, nmPasien, jk, alamat) VALUES ('$idPasien', '$nmPasien', '$jk', '$alamat')");

    header('Location: pasien.php');
    exit();
}

// Menghapus data
if (isset($_GET['idPasien'])) {
    $idPasien = $_GET['idPasien'];
    $koneksi->query("DELETE FROM pasien WHERE idPasien = '$idPasien'");
    header("Location: pasien.php");
    exit();
}

// Mengedit data
if (isset($_POST['edit'])) {
    $idPasienLama = $_POST['idPasienLama'];
    $idPasienBaru = $_POST['idPasienBaru'];
    $nmPasien = $_POST['nmPasien'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];

    // Ubah ID pasien lama menjadi ID pasien baru
    $koneksi->query("UPDATE pasien SET idPasien='$idPasienBaru', nmPasien='$nmPasien', jk='$jk', alamat='$alamat' WHERE idPasien='$idPasienLama'");
    header("Location: pasien.php");
    exit();
}

?>
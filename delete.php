<?php
require_once 'admin.php';

// memastikan terdapat parameter NIM yang diterima
if (isset($_GET['nim'])) {
    $nim = $_GET['nim'];

    // Buat objek admin
    $admin = new admin();

    // Panggil fungsi hapusMahasiswa() untuk menghapus data mahasiswa
    $admin->hapusMahasiswa($nim);

    // Redirect kembali ke halaman sebelumnya atau halaman lain yang diinginkan
    header("Location: tampilan.php");
    exit;
} else {
    // Tampilkan error ketika nim tidak ada
    echo "Parameter NIM tidak ditemukan.";
}
?>

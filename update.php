<!DOCTYPE html>
<html>
<head>
    <title>Update Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <h2>Update Mahasiswa</h2>
    
    <?php
    session_start();    // Memulai session
    require_once 'admin.php';    // Menyertakan file admin.php

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $isLoggedIn = true;    // Mengatur variabel isLoggedIn menajdi true jika user adalah admin
    } else {
        $isLoggedIn = false;    // Mengatur variabel isLoggedIn menajdi false jika user tidak login
        header("location:tampilan.php");    // Redirecting kembali ke tampilan.php sebagai user
        exit();    // Exiting script
    }

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['updateMahasiswa'])) {
        $NIM = $_GET['nim'];    // Mendapatkan nilai variabel NIM dari url parameter
        $newNIM = $_POST['newNIM'];    // Mendapatkan nilai variabel newNIM(NIM baru) dari form
        $nama = $_POST['nama'];    // Mendapatkan nilai variabel nama dari form
        $programStudi = $_POST['programStudi'];    // Mendapatkan nilai variabel programStudi dari form
        $email = $_POST['email'];    // Mendapatkan nilai variabel email dari form

        // Membuat instance dari kelas admin
        $admin = new admin();

        // Jika form update kosong semua  maka redirect kembali ke tampilan.php
        if ($newNIM == "" && $nama == "" && $programStudi == "" && $email == "") {
            header("location:tampilan.php");   
            exit();
        }
        // Memanggil fungsi updateMahasiswa dari kelas admin untuk melakukan update
        $admin->updateMahasiswa($NIM, $newNIM, $nama, $programStudi, $email);
    }
    ?>

    <!-- Menampilkan form untuk melakukan update  -->
    <form action="" method="POST">
        <label>New NIM:</label>
        <input type="text" name="newNIM"><br>

        <label>Nama:</label>
        <input type="text" name="nama"><br>

        <label>Program Studi:</label>
        <input type="text" name="programStudi"><br>

        <label>Email:</label>
        <input type="email" name="email"><br>

        <input type="submit" name="updateMahasiswa" value="Update Mahasiswa"><br>
        
        <a href="index.php?nim=" class="cencel">Batal</a>
    </form>
</body>
</html>

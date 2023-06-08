<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <h2>Tambah Mahasiswa</h2>
    
    <?php
    require_once 'admin.php';

    // Memeriksa apakah sudah login, jika belum maka akan kembali ke tampilan guest
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        $isLoggedIn = true;
    } else {
        $isLoggedIn = false;
        header("location:tampilan.php");
        exit;
    }

    // Memeriksa apakah data terkirim melalui metode POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Membaca data yang dikirimkan dari form
        $nim = $_POST['nim'];
        $nama = $_POST['nama'];
        $programStudi = $_POST['programStudi'];
        $email = $_POST['email'];
    
        // Membuat objek admin
        $admin = new admin();
    
        // Memanggil fungsi tambahMahasiswa
        $admin->tambahMahasiswa($nim, $nama, $programStudi, $email);
    }
    ?>

    <form action="" method="POST">
        <label for="nim">NIM:</label>
        <input type="text" id="nim" name="nim" required><br>
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>
        
        <label for="programStudi">Program Studi:</label>
        <input type="text" id="programStudi" name="programStudi" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        
        <input type="submit" value="Tambah Mahasiswa"><br>

        <a href="index.php?nim=" class="cencel">Batal</a>
    </form>
</body>
</html>

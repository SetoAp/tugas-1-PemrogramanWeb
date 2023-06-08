<?php

// memasukkan file yang dibutuhkan dengan menggunakan Including
require_once 'user.php';         
require_once 'mahasiswa.php';

// kelas admin merupakan child kelas user
class admin extends user
{
    private $mahasiswa;    // variabel Private untuk menyimpan objek mahasiswa

    // Constructor method
    public function __construct() 
    {
        parent::__construct(null, null, null);    // memanggil cunstructor parent class
        $this->mahasiswa = new mahasiswa(null, null, null, null);    // membuat object mahasiswa
        session_start();    // Memulai session
    }

    // Fungsi Logout
    public function logout()
    {
        session_destroy();    // Menghapus session dari server
        header("location: tampilan.php");    // Kembali membuka halaman tampilan.php
        exit;
    }

    // fungsi untuk menambahkan objek mahasiswa baru
    public function tambahMahasiswa($NIM, $nama, $programStudi, $email)
    {
        $this->mahasiswa->addMahasiswa($NIM, $nama, $programStudi, $email);    // Memanggil fungsi addMahasiswa dari objek mahasiswa
        header("location: tampilan.php");
        exit; 
    }

    // fungsi untuk menghapus objek mahasiswa berdasarkan NIM
    public function hapusMahasiswa($NIM)
    {
        $this->mahasiswa->hapusMahasiswabyNIM($NIM);    // Memanggil fungsi hapusMahasiswabyNIM dari objek mahasiswa
    }

    // fungsi untuk mengubah atribut(data) pada objek mahasiswa
    public function updateMahasiswa($NIM, $newNIM, $nama, $programStudi, $email)
    {
        $this->mahasiswa->updateMahasiswabyNIM($NIM, $newNIM, $nama, $programStudi, $email);    // Memanggil fungsi updateMahasiswabyNIM dari objek mahasiswa
        header("location: tampilan.php");
        exit;
    }

    // fungsi untuk mendapatkan atribut(data) dari semua mahasiswa
    public function getData()
    {
        $rs = $this->mahasiswa->getSemuaMahasiswa();    // Memanggil fungsi getSemuaMahasiswa dari objek mahasiswa
        return $rs;    // mengembalikan hasil
    }
}

?>

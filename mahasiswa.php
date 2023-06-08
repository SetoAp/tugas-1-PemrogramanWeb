<?php

// Mahasiswa class
class Mahasiswa 
{
    private $NIM;                
    private $nama;               
    private $programStudi;       
    private $email;              
    private $conn;               
    public $hasil = array();

    // Constructor method
    public function __construct($NIM, $nama, $programStudi, $email) 
    {
        $this->conn = new mysqli("localhost", "root", "", "tugas1");   // Membuat koneksi ke database 
        $this->NIM = $NIM;              
        $this->nama = $nama;            
        $this->programStudi = $programStudi;   
        $this->email = $email;          
    }

    // Method to add a new Mahasiswa
    public function addMahasiswa($NIM, $nama, $programStudi, $email)
    {
        $sql = "INSERT INTO mahasiswa (NIM, nama, programStudi, email) VALUES ('$NIM', '$nama', '$programStudi', '$email')";
        $this->conn->query($sql);   // Mengeksekusi SQL query
    }

    // Method to get data of all Mahasiswa
    public function getSemuaMahasiswa()
    {
        $sql = "SELECT * FROM mahasiswa";
        $rs = $this->conn->query($sql);   // Mengeksekusi SQL query
        $rows = array();
        while($row = $rs->fetch_assoc()) {
            $rows[] = $row;
        }
        $this->hasil = $rows;   // Menyimpan hasil ke dalam varabel "hasil"
        return $this->hasil;    // Mengembalikan hasil variabel "hasil"
    }

    // Method to delete a Mahasiswa by NIM
    public function hapusMahasiswaByNIM($NIM)
    { 
        $sql = "DELETE FROM mahasiswa WHERE NIM = '$NIM'";
        $this->conn->query($sql);   // Mengeksekusi SQL query
    }

    // Fungsi untuk update Mahasiswa berdasarkan NIM
    public function updateMahasiswaByNIM($NIM, $newNIM, $nama, $programStudi, $email)
    {
        $sql = "UPDATE mahasiswa SET";

        if ($newNIM !== null && $newNIM !== '') {
            $sql .= " NIM = '$newNIM',";
        }

        if ($nama !== null && $nama !== '') {
            $sql .= " nama = '$nama',";
        }

        if ($programStudi !== null && $programStudi !== '') {
            $sql .= " programStudi = '$programStudi',";
        }

        if ($email !== null && $email !== '') {
            $sql .= " email = '$email',";
        }

        $sql = rtrim($sql, ",");   // Menghapus tanda koma dari Query

        $sql .= " WHERE NIM = '$NIM'";

        $this->conn->query($sql);   // Mengeksekusi SQL query
    }
}
?>
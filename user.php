<?php
session_start();    // Memulai session

// Kelas User
class user 
{
    private $username;    
    private $password;    
    private $emailAddress;
    private $conn;

    // Constructor method
    public function __construct($username, $password, $emailAddress)
    {
        $this->conn = new mysqli("localhost", "root", "", "tugas1");
        $this->username = $username;    
        $this->password = $password;
        $this->emailAddress = $emailAddress;
    }

    // Getter method untuk username
    public function getUsername()
    {
        return $this->username;
    }

    // Setter method untuk username
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // Getter method untuk password
    public function getPassword()
    {
        return $this->password;
    }

    // Setter method untuk password
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter method untuk email address
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    // Setter method untuk email address
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;
    }

    // fungsi untuk melakukan login
    public function login()
    {
        session_start();
        // cek apakah session sudah ada atau belum
        if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
            header("location: tampilan.php");
            exit;
        }

        // menangkap request input user untuk login
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // melakukan query untuk memeriksa keberadaan username dan password yang sesuai di tabel "User"
            $query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
            $result = $this->conn->query($query);

            // memeriksa jumlah baris hasil query
            if ($result && $result->num_rows > 0) {
                $_SESSION['logged_in'] = true;
                header("location: tampilan.php");
                exit;
            } else {
                // menampilkan pesan error jika salah input username atau password
                $error = "Username atau password salah";
            }
        }
    }
}
?>
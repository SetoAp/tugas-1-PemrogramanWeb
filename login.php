<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="form.css">
</head>
<body>
    <h2>Login</h2>
    <?php
    require_once "user.php";

    // Membuat objek User
    $user = new User("", "", "");

    // Menjalankan fungsi login
    $user->login();

    // Menampilkan pesan error jika ada
    if (isset($error)) {
        echo "<p>$error</p>";
    }
    ?>

    <!-- Menampilkan form username dan password  -->
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>

        <input type="submit" value="Login"><br>
    </form>
</body>
</html>

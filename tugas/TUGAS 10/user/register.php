<?php
if (isset($_GET['message'])) {
    echo "<p style='color:red'>" . htmlspecialchars($_GET['message']) . "</p>";
}
?>

<h2>Register</h2>
<form action="proses_register.php" method="post">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <label>Konfirmasi Password:</label><br>
    <input type="password" name="confirm_password" required><br><br>

    <button type="submit">Daftar</button>
    <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
</form>

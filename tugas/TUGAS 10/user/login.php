<?php
if (isset($_GET['message'])) {
    echo "<div style='color: red;'>" . htmlspecialchars($_GET['message']) . "</div>";
}
?>

<form action="proses_login.php" method="post">
    <label>Username</label><br>
    <input type="text" name="username" required><br><br>

    <label>Password</label><br>
    <input type="password" name="password" required><br><br>

    <label>
        <input type="checkbox" name="remember"> Remember Me
    </label><br><br>
    <p>Belum punya akun? <a href="register.php">Daftar sekarang</a></p>

    <button type="submit">Login</button>
</form>

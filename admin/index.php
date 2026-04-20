<?php
session_start();
include "../config/koneksi.php";
if(isset($_POST["login"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = md5($_POST["password"]);
    $query = mysqli_query($conn, "SELECT * FROM admin WHERE username=\"$username\" AND password=\"$password\"");
    if(mysqli_num_rows($query) > 0) {
        $_SESSION["admin"] = $username;
        header("Location: dashboard.php");
    } else {
        $error = "Login gagal! Periksa username dan password.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Login Admin</title><link rel="stylesheet" href="../css/style.css"></head>
<body style="background: linear-gradient(135deg, #0a6b4f, #08563f); min-height: 100vh; display: flex; align-items: center; justify-content: center;">
    <div style="max-width: 400px; margin: 0 auto; background: white; padding: 2rem; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.2);">
        <div style="text-align: center; margin-bottom: 2rem;">
            <div style="width: 70px; height: 70px; background: linear-gradient(135deg, #0a6b4f, #2d8a6b); border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-bottom: 1rem;">
                <i class="fas fa-leaf" style="font-size: 2rem; color: white;"></i>
            </div>
            <h2 style="color: #0a6b4f;">Login Admin</h2>
            <p style="color: #666;">Masukkan kredensial Anda</p>
        </div>
        <?php if(isset($error)) echo "<p style=\"color: #dc3545; text-align: center; background: #f8d7da; padding: 10px; border-radius: 10px;\">$error</p>"; ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 10px;">
            <input type="password" name="password" placeholder="Password" required style="width: 100%; padding: 12px; margin: 10px 0; border: 1px solid #ddd; border-radius: 10px;">
            <button type="submit" name="login" class="btn btn-primary" style="width: 100%; margin-top: 10px;">Login</button>
        </form>
        <div style="text-align: center; margin-top: 1.5rem; font-size: 0.8rem; color: #999;">
            Default: admin / admin123
        </div>
    </div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>
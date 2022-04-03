<?php
    session_start();

    if(!isset($_SESSION['errorRegister'])) $_SESSION['errorRegister'] = "";
    if(!isset($_SESSION['errorLogin'])) $_SESSION['errorLogin'] = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="header-text">Aplikasi Pengelolaan Keuangan</div>
    </header>
    <main>
        <div class="welcome-text">Selamat Datang di Aplikasi Pengelolaan Keuangan</div>
        <div class="button">
            <button class="login-button" id="login-button" onclick = "window.location.href = 'login.php' ">Login</button>
            <button class="register-button" id="register-button" onclick = "window.location.href = 'registerProcess.php' ">Register</button>
        </div>
    </main>
</body>
</html>
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <title>Login</title>
</head>
<body>
    <header>
        <div class="header-text">Login</div>
    </header>
    <main>
        <form action="./loginProcess.php" method="post">
            <div class="form-container">
                <div class="field-container">
                    <div class="username-text">Username</div>
                    <input type="text" name="username" class="username">
                </div>
                <div class="field-container">
                    <div class="password-text">Password</div>
                    <input type="password" name="password" class="password">
                </div>
                <div class="button-container">
                    <input type="submit" name="submit" value="Login">
                    <input type="button" value="Kembali" id="kembali">
                </div>
            </div>
        </form>
    </main>

    <script src="./jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            var msg = <?php echo json_encode($_SESSION['errorLogin']);?>;

            document.getElementById("kembali").onclick = () => {window.location.href="./welcome.php"};

            if(msg != "") alert(msg);
        });
    </script>
</body>
</html>
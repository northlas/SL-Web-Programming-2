<?php
    session_start();

    $firstname      = $_SESSION['firstname'];
    $middlename     = $_SESSION['middlename'];
    $lastname       = $_SESSION['lastname'];
    $birthplace     = $_SESSION['birthplace'];
    $birthdate      = $_SESSION['birthdate'];
    $nik            = $_SESSION['nik'];
    $nationality    = $_SESSION['nationality'];
    $email          = $_SESSION['email'];
    $phonenumber    = $_SESSION['phonenumber'];
    $address        = $_SESSION['address'];
    $mailbox        = $_SESSION['mailbox'];
    $profpic        = $_SESSION['fileinput'];
    $error          = $_SESSION['error'];

    if($_SESSION['session'] > 0) $image = ($profpic['tmp_name']) ? $profpic['name'] : "Silahkan Dipilih";
    else $image = $profpic;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./edit.css">
    <title>Register</title>
</head>
<body>
    <header>
        <div class="header-text">Aplikasi Pengelolaan Keuangan</div>
        <div class="nav-bar">
            <a href="./home.php">Home</a>
            <a href="./profile.php">Profile</a>
            <a href="./editProcess.php"><u>Edit</u></a>
            <a href="./logoutProcess.php">Logout</a>
        </div>
    </header>
    <main>
        <div class="main-text">Profile Pribadi</div>
        <form action="./editProcess.php" method="post" enctype="multipart/form-data">
            <div class="content">
                <div>
                    <div class="text">Nama Depan</div>
                    <input type="text" name="firstname" value="<?php echo $firstname; ?>">
                </div>
                <div>
                    <div class="text">Nama Tengah</div>
                    <input type="text" name="middlename" value="<?php echo $middlename; ?>">
                </div>
                <div>
                    <div class="text">Nama Belakang</div>
                    <input type="text" name="lastname" value="<?php echo $lastname; ?>">
                </div>
                <div>
                    <div class="text">Tempat Lahir</div>
                    <input type="text" name="birthplace" value="<?php echo $birthplace; ?>">
                </div>
                <div>
                    <div class="text">Tanggal Lahir</div>
                    <input type="date" name="birthdate" min="1900-01-01" max="2022-12-31" value="<?php echo $birthdate; ?>">
                </div>
                <div>
                    <div class="text">NIK</div>
                    <input type="number" name="nik" value="<?php echo $nik; ?>">
                </div>
                <div>
                    <div class="text">Warga Negara</div>
                    <input type="text" name="nationality" value="<?php echo $nationality; ?>">
                </div>
                <div>
                    <div class="text">Email</div>
                    <input type="text" name="email" value="<?php echo $email; ?>">
                </div>
                <div>
                    <div class="text">No HP</div>
                    <input type="number" name="phonenumber" value="<?php echo $phonenumber; ?>">
                </div>
                <div class="address">
                    <div class="text">Alamat</div>
                    <textarea name="address"><?php echo htmlspecialchars($address); ?></textarea>
                </div>
                <div>
                    <div class="text">Kode Pos</div>
                    <input type="number" name="mailbox" value="<?php echo $mailbox; ?>">
                </div>
                <div>
                    <div class="text">Foto Profil</div>
                    <label for="fileinput" class="profpic" id="profpic">
                        <?php
                            echo $image;
                        ?>
                    </label>
                    <input type="file" name="fileinput" id="fileinput" accept="image/*">
                </div>
            </div>
            <div class="button">
                    <input type="button" value="Cancel" class="cancel-button" id="cancel-button">
                    <input type="submit" value="Save" class="register-button" name="submit">
            </div>
        </form>
    </main>

    <script src="./jquery-3.6.0.min.js"></script>
    <script type="text/javascript">
        $(document).ready(() => {
            var msg = <?php echo json_encode($error);?>;

            var input = document.getElementById("fileinput");
            var label = document.getElementById("profpic");

            if(msg != "") alert(msg);

            document.getElementById("cancel-button").onclick = () => {window.location.href="./profile.php"};

            input.onchange = () => {
                label.innerHTML = input.files.item(0).name;
            }

            
        }); 
    </script>
</body>
</html>



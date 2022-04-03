<?php
    include('config.php');
    session_start();
    $data = $_SESSION['data'];

    $str_query = "select * from msuser where id='".$data['id']."'";
    $query = mysqli_query($connection, $str_query);
    $data = mysqli_fetch_array($query);

    $_SESSION['data'] = $data;

    $firstname      = $data['first_name'];
    $middlename     = $data['middle_name'];
    $lastname       = $data['last_name'];
    $birthplace     = $data['birth_place'];
    $birthdate      = $data['birth_date'];
    $nik            = $data['nik'];
    $nationality    = $data['nationality'];
    $email          = $data['email'];
    $phonenumber    = $data['phone'];
    $address        = $data['address'];
    $mailbox        = $data['mailbox'];
    $profpic        = $data['profile_picture'];    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./profile.css">
    <title>Register</title>
</head>
<body>
    <header>
        <div class="header-text">Aplikasi Pengelolaan Keuangan</div>
        <div class="nav-bar">
            <a href="./home.php">Home</a>
            <a href="./profile.php"><u>Profile</u></a>
            <a href="./editProcess.php">Edit</a>
            <a href="./logoutProcess.php">Logout</a>
        </div>
    </header>
    <main>
        <div class="main-text">Profile Pribadi</div>
        <div class="content">
            <div>
                <div class="text">Nama Depan</div>
                <div class="value"><?php echo $firstname; ?></div>
            </div>
            <div>
                <div class="text">Nama Tengah</div>
                <div class="value"><?php echo $middlename; ?></div>
            </div>
            <div>
                <div class="text">Nama Belakang</div>
                <div class="value"><?php echo $lastname; ?></div>
            </div>
            <div>
                <div class="text">Tempat Lahir</div>
                <div class="value"><?php echo $birthplace; ?></div>
            </div>
            <div>
                <div class="text">Tanggal Lahir</div>
                <div class="value"><?php echo $birthdate; ?></div>
            </div>
            <div>
                <div class="text">NIK</div>
                <div class="value"><?php echo $nik; ?></div>
            </div>
            <div>
                <div class="text">Warga Negara</div>
                <div class="value"><?php echo $nationality; ?></div>
            </div>
            <div>
                <div class="text">Email</div>
                <div class="value"><?php echo $email; ?></div>
            </div>
            <div>
                <div class="text">No HP</div>
                <div class="value"><?php echo $phonenumber; ?></div>
            </div>
            <div class="address">
                <div class="text">Alamat</div>
                <div class="value"><?php echo $address; ?></div>
            </div>
            <div>
                <div class="text">Kode Pos</div>
                <div class="value"><?php echo $mailbox; ?></div>
            </div>
            <div>
                <div class="text">Foto Profil</div>
                <div class="value"><img src="fileupload/<?php echo $profpic; ?>" width="100%"></div>
            </div>
        </div>
    </main>
</body>
</html>



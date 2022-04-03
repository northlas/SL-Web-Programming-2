<?php
    include("config.php");
    session_start();
    $username       = $password1    = $password2    = $firstname    =
    $middlename     = $lastname     = $birthplace   = $birthdate    =
    $nik            = $nationality  = $email        = $phonenumber  =
    $address        = $mailbox      = $error        = $filetype     = "";

    $profpic        = NULL;

    if(isset($_POST['submit'])){
        $error = "";
        $code = 0;

        $username       = sanitize($_POST['username']);
        $password1      = $_POST['password1'];
        $password2      = $_POST['password2'];
        $firstname      = sanitize($_POST['firstname']);
        $middlename     = sanitize($_POST['middlename']);
        $lastname       = sanitize($_POST['lastname']);
        $birthplace     = sanitize($_POST['birthplace']);
        $birthdate      = $_POST['birthdate'];
        $nik            = sanitize($_POST['nik']);
        $nationality    = sanitize($_POST['nationality']);
        $email          = sanitize($_POST['email']);
        $phonenumber    = $_POST['phonenumber'];
        $address        = sanitize($_POST['address']);
        $mailbox        = sanitize($_POST['mailbox']);      
        $profpic        = $_SESSION['fileinput'];
        $filetype       = $_SESSION['filetype'];

        if($_FILES['fileinput']){
            if($_FILES['fileinput']['tmp_name']){
                $profpic = $_FILES['fileinput'];
                if (is_uploaded_file($profpic['tmp_name'])) {
                    $filetype = mime_content_type($profpic['tmp_name']);
                    $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
                    if (! in_array($filetype, $allowed_file_types)) $code = 1;
                    else{
                        $picname = $profpic['name'];
                        $temp = $profpic['tmp_name'];
                        $destination = "fileupload/";
                        move_uploaded_file($temp, $destination.$picname);
                    }
                }
            }
            elseif($profpic){
                if($profpic['tmp_name']){
                    $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
                    if (! in_array($filetype, $allowed_file_types)) {
                        $code = 1;
                    }
                }
            }
        }

        if($firstname == ""){
            $error = "Nama depan harus diisi";
        }
        elseif(str_word_count($firstname) > 1){
            $error = "Nama depan harus berupa 1 kata";
        }
        elseif($middlename == "") {
            $error = "Name tengah harus diisi";
        }
        elseif($lastname == "") {
            $error = "Nama belakang harus diisi";
        }
        elseif(str_word_count($lastname) > 1){
            $error = "Nama belakang harus berupa 1 kata";
        }
        elseif($birthplace == "") {
            $error = "Tempat lahir harus diisi";
        }
        elseif(!preg_match("/^[a-zA-Z ]+$/", $birthplace)){
            $error = "Tempat lahir harus berupa huruf";
        }
        elseif($birthdate == "") {
            $error = "Tanggal lahir harus diisi";
        }
        elseif($nik == "") {
            $error = "NIK harus diisi";
        }
        elseif(!is_numeric($nik) || strlen($nik) != 16 ){
            $error = "NIK harus berupa 16 digit angka";
        }
        elseif($nationality == "") {
            $error = "Warga negara harus diisi";
        }
        elseif(!preg_match("/^[a-zA-Z ]+$/", $nationality)){
            $error = "Warga negara harus berupa huruf";
        }
        elseif($email == "") {
            $error = "Email harus diisi";
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $error = "Email tidak valid";
        }
        elseif($phonenumber == "") {
            $error = "Nomor HP harus diisi";
        }
        elseif(!preg_match("/^[0][1-9][0-9]{9,11}$/", $phonenumber)){
            $error = "Nomor HP harus diawali angka 0 dan berjumlah 11-13 digit angka";
        }
        elseif($address == "") {
            $error = "Alamat harus diisi";
        }
        elseif(!is_numeric($mailbox) || strlen($mailbox) != 5){
            $error = "Kode pos harus berupa 5 digit angka";
        }
        elseif($profpic == "") {
            $error = "Foto profil harus dipilih";
        }
        elseif($code){
            $error = "Foto profil harus berupa gambar (jpg|jpeg|png)";
        }
        elseif($username == "") {
            $error = "Username harus diisi";
        }
        elseif(!preg_match("/^[a-zA-Z0-9]+$/", $username)){
            $error = "Username harus berupa huruf dan angka";
        }
        elseif($password1 == "") {
            $error = "Password 1 harus diisi";
        }
        elseif($password2 == "") {
            $error = "Password 2 harus diisi";
        }
        elseif($password1 != $password2){
            $error = "Password 2 tidak cocok dengan Password 1";
        }
        
        setSession();
        if($error == ""){
            $_SESSION['registered'] = true;

            $str_query = "insert into msuser values (
                '',
                '".$firstname."',
                '".$middlename."',
                '".$lastname."',
                '".$birthplace."',
                '".$birthdate."',
                '".$nik."',
                '".$nationality."',
                '".$email."',
                '".$phonenumber."',
                '".$address."',
                '".$mailbox."',
                '".$profpic['name']."',
                '".$username."',
                '".$password1."'
                )";
    
            $query = mysqli_query($connection, $str_query);
    
            if($query){
                echo "<script>
                        alert('Register berhasil!');
                        window.location.href = 'index.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('Register gagal');
                        window.location.href = 'register.php';
                    </script>";
            }
        }
        else header("location:register.php");
    }
    else{
        setSession();
        header("location:register.php");
    }

    function setSession(){
        global $username, $password1, $password2, $firstname, $middlename, $lastname, 
        $birthplace, $birthdate, $nik, $nationality, $email, $phonenumber, $address,
        $mailbox, $profpic, $filetype, $error;

        $_SESSION['username']       = $username;
        $_SESSION['password1']      = $password1;
        $_SESSION['password2']      = $password2;
        $_SESSION['firstname']      = $firstname;
        $_SESSION['middlename']     = $middlename;
        $_SESSION['lastname']       = $lastname;
        $_SESSION['birthplace']     = $birthplace;
        $_SESSION['birthdate']      = $birthdate;
        $_SESSION['nik']            = $nik;
        $_SESSION['nationality']    = $nationality;
        $_SESSION['email']          = $email;
        $_SESSION['phonenumber']    = $phonenumber;
        $_SESSION['address']        = $address;
        $_SESSION['mailbox']        = $mailbox;
        $_SESSION['fileinput']      = $profpic;
        $_SESSION['filetype']       = $filetype;
        $_SESSION['error']          = $error;
    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
    include("config.php");
    session_start();
    $data           = $_SESSION['data'];

    if(isset($_POST['submit'])){
        $error = "";
        $code = 0;

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
        $session        = $_SESSION['session'];
        
        if($_FILES['fileinput']){
            if($_FILES['fileinput']['tmp_name']){
                $profpic = $_FILES['fileinput'];
                $session++;
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
            elseif($_SESSION['session'] == 0){
                $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
                if (! in_array($filetype, $allowed_file_types)) {
                    $code = 1;
                }
            }
            elseif($profpic['tmp_name']){
                $allowed_file_types = ['image/png', 'image/jpeg', 'image/jpg'];
                if (! in_array($filetype, $allowed_file_types)) {
                    $code = 1;
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
        
        setSession();
        if($error == ""){
            if($_SESSION['session'] == 0){
                $str_query = "update msuser set
                    first_name = '".$firstname."',
                    middle_name = '".$middlename."',
                    last_name = '".$lastname."',
                    birth_place = '".$birthplace."',
                    birth_date = '".$birthdate."',
                    nik = '".$nik."',
                    nationality = '".$nationality."',
                    email = '".$email."',
                    phone = '".$phonenumber."',
                    address = '".$address."',
                    mailbox = '".$mailbox."',
                    profile_picture = '".$profpic."'
                    where id = '".$data['id']."'";
            }
            else{
                $str_query = "update msuser set
                first_name = '".$firstname."',
                middle_name = '".$middlename."',
                last_name = '".$lastname."',
                birth_place = '".$birthplace."',
                birth_date = '".$birthdate."',
                nik = '".$nik."',
                nationality = '".$nationality."',
                email = '".$email."',
                phone = '".$phonenumber."',
                address = '".$address."',
                mailbox = '".$mailbox."',
                profile_picture = '".$profpic['name']."'
                where id = '".$data['id']."'";
            }
            
    
            $query = mysqli_query($connection, $str_query);
    
            if($query){
                echo "<script>
                        alert('Data berhasil terupdate!');
                        window.location.href = 'profile.php';
                    </script>";
            }
            else{
                echo "<script>
                        alert('Data gagal terupdate');
                        window.location.href = 'edit.php';
                    </script>";
            }
        }
        else header("location:edit.php");
    }
    else{
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
        $filetype       = mime_content_type("./fileupload/" . $profpic);
        $error          = "";
        $session        = 0;

        setSession();
        header("location:edit.php");
    }

    function setSession(){
        global $firstname, $middlename, $lastname, 
        $birthplace, $birthdate, $nik, $nationality, $email, $phonenumber, $address,
        $mailbox, $profpic, $filetype, $error, $session;

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
        $_SESSION['session']        = $session;
    }

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>
<?php
    include("config.php");
    session_start();

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $str_query = "select * from msuser where username='".$username."' and password ='".$password."'";
        $query = mysqli_query($connection, $str_query);
        $data = mysqli_fetch_array($query);

        if($data){
            $_SESSION['errorLogin'] = "";
            
            $_SESSION['data'] = $data;

            $_SESSION['username']       = "";
            $_SESSION['password1']      = "";
            $_SESSION['password2']      = "";
            $_SESSION['firstname']      = "";
            $_SESSION['middlename']     = "";
            $_SESSION['lastname']       = "";
            $_SESSION['birthplace']     = "";
            $_SESSION['birthdate']      = "";
            $_SESSION['nik']            = "";
            $_SESSION['nationality']    = "";
            $_SESSION['email']          = "";
            $_SESSION['phonenumber']    = "";
            $_SESSION['address']        = "";
            $_SESSION['mailbox']        = "";
            $_SESSION['fileinput']      = "";
            $_SESSION['filetype']       = "";
            $_SESSION['error']          = "";

            header("location:home.php");
        }
        else{
            $_SESSION['errorLogin'] = "Username dan password salah";
            header("location:login.php");
        }
    }
?>
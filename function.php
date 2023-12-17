<?php

$connect_db = mysqli_connect("localhost","root","","rb_121140161_uaspemweb");

//login
if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $users = mysqli_query($connect_db, "select * from user where username = '$username' and password = '$password'");
    $hitung = mysqli_num_rows($users);

    if($hitung > 0){
        $ambildatarole = mysqli_fetch_array($users);
        $role = $ambildatarole['role'];

        if($role == 'admin'){
            // kalau admin
            session_start();
            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = 'Admin';
            header('location:admin');
        } else {
            session_start();
            //kalau bukan admin
            $_SESSION['log'] = 'logged';
            $_SESSION['role'] = 'User';
            header('location:user');
        }

        
    }else {
        echo "data gaadaa";
    }
};

?>
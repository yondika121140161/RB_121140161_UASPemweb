<?php
session_start();
require '../function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="shortcut icon" href="./assets/book.png">
    <title>Masuk | Manajemen Buku</title>
</head>

<body>
    <div class="container-login">
        <form method="post" action="">
            <h1>Masuk</h1>
            <div class="container">
                <label for="uname"><b>Nama Pengguna</b></label>
                <input type="text" placeholder="Masukkan Nama Pengguna" name="username" autocomplete="off" required>

                <label for="psw"><b>Masukkan Kata sandi</b></label>
                <input type="password" placeholder="Masukkan Kata Sandi" name="password" required>

                <div><input type="submit" name="submit" value="Masuk"></div>
            </div>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $username = htmlspecialchars($_POST['username']);
                $password = htmlspecialchars($_POST['password']);

                $query = mysqli_query($connect_db, "select * from user where username='$username'");
                $count = mysqli_num_rows($query);

                if($count > 0) {
                    $data = mysqli_fetch_array($query);
                    $role = $data['role'];

                    if($role == 'admin'){
                        $_SESSION['logged_in'] = true;
                        $_SESSION['role'] = 'Admin';

                        header('location: index.php');
                    }else {
                        echo "Password salah!";
                    }
                }else {
                    echo "Akun Tidak dapat diakses!";
                }
            }
        ?>

    </div>
</body>

</html>
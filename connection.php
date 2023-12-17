<?php
    $connect =  mysqli_connect('localhost','root','','rb_121140161_uaspemweb');

    if (mysqli_connect_errno()) {
        echo 'Gagal terhubung ke MYSQL: ' . mysqli_connect_error();
        exit();
    }
?>
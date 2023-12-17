<?php

$db = mysqli_connect('localhost', 'root', '', 'rb_121140161_uaspemweb');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['add'])) {
    // echo "connect";
    $judulbuku = mysqli_real_escape_string($db, $_POST['judulbuku']);
    $deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
    $kategori = mysqli_real_escape_string($db, $_POST['kategori']);
    $tahun = mysqli_real_escape_string($db, $_POST['tahun']);

    $query = "INSERT INTO buku (judulbuku,deskripsi,kategori,tahun) 
  			  VALUES('$judulbuku','$deskripsi','$kategori','$tahun')";
    if (mysqli_query($db, $query)) {
        //
    } else {
        echo "<script>alert('Somthing wrong!!!');</script>";
    }

    require('./index.php');
}

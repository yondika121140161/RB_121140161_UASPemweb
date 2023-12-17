<?php
require '../session.php';
require '../function.php';
$username = "admin";

?>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../assets/book.png">
    <title>Admin | Manajemen Buku</title>
</head>

<body>

    <div class="main-content">
        <nav class="sidebar">
            <div class="sidebar-content">
                <div class="logo">
                    <img src="../assets/books.png" alt="icon" width="32">
                    <a href="#">Sistem Manajemen Buku</a>
                </div>
                <div class="menu-content">
                    <ul class="menu-items">
                        <li>
                            <p><img src="../assets/user.png" alt="user" width="24"><?php echo $username ?></p>
                        </li>
                        <li class="item btn-keluar">
                            <a href="logout.php">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>



        <div class="main">
            <div class="container">
                <h2 class="text-center" style="font-weight: 700; background-color: #ffd700; padding: 16px;">Data Buku</h2>



                <div class="">
                    <table class="">
                        <thead class="table-head">
                            <tr class="table-head" style="background-color: #ffd700;">
                                <th scope="col">ID</th>
                                <th scope="col">Judul Buku</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Tahun Terbit</th>
                                <th scope="col">Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM buku";
                            $result = $connect_db->query($sql);
                            $count = 0;
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $count = $count + 1;
                            ?>
                                    <tr class="table-body">
                                        <th>
                                            <?php echo $count ?>
                                        </th>
                                        <th>
                                            <?php echo $row["judulbuku"] ?>
                                        </th>
                                        <th>
                                            <?php echo $row["deskripsi"] ?>
                                        </th>
                                        <th>
                                            <?php echo $row["kategori"] ?>
                                        </th>
                                        <th>
                                            <?php echo $row["tahun"] ?>
                                        </th>
                                        <th>
                                        <a href="up" Edit</a><a href="read.php?id=<?php echo $row["id_buku"] ?>" class="read">Lihat</a>
                                            <a href="up" Edit</a><a href="edit.php?id=<?php echo $row["id_buku"] ?>" class="edit">Edit</a>
                                                <a href="up" Edit</a><a href="delete.php?id=<?php echo $row["id_buku"] ?>" class="delete">Delete</a>
                                        </th>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
<script src="script.js"></script>

</html>
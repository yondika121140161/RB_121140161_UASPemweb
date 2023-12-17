<?php

require('../function.php');

if (isset($_POST['submit']))
{
$id=$_POST['id'];
$judulbuku = mysqli_real_escape_string($connect_db, $_POST['judulbuku']);
$deskripsi = mysqli_real_escape_string($connect_db, $_POST['deskripsi']);
$kategori = mysqli_real_escape_string($connect_db, $_POST['kategori']);
$tahun = mysqli_real_escape_string($connect_db, $_POST['tahun']);

mysqli_query($connect_db,"UPDATE buku SET judulbuku='$judulbuku', deskripsi='$deskripsi',kategori='$kategori' ,tahun='$tahun' WHERE id_buku='$id'");

header("Location:index.php");
}


if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($connect_db,"SELECT * FROM buku WHERE id_buku=".$_GET['id']);

$row = mysqli_fetch_array($result);

if($row)
{

$id = $row['id_buku'];
$judulbuku = $row['judulbuku'];
$deskripsi = $row['deskripsi'];
$kategori = $row['kategori'];
$tahun=$row['tahun'];
}
else
{
echo "No results!";
}
}
?>

<html>
<head>
<link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="../assets/book.png">
    <title>Admin Read | Manajemen Buku</title>
</head>
<body>


<div class="container-fluid text-center">
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><h1 class="text-primary text-center"><b>Lihat Data</b></h1></td>
</tr>
<tr>
<td width="179"><b>Judul Buku</b></td>
<td><label>
<input disabled  type="text" name="judulbuku" value="<?php echo $judulbuku; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b>Deskripsi</b></td>
<td><label>
<input disabled  type="text" name="deskripsi" value="<?php echo $deskripsi ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b>Kategori</b></td>
<td><label>
<input disabled  type="text" name="kategori" value="<?php echo $kategori;?>" />
</label></td>
</tr>

<tr>
<td width="179"><b>Tahun</b></td>
<td><label>
<input disabled  type="text" name="tahun" value="<?php echo $tahun;?>" />
</label></td>
</tr>

<tr align="center">
<td colspan="2"><label>
<a href="index.php">Kembali</a>
</label></td>
</tr>
</table>
</form>
</div>
</body>
</html>

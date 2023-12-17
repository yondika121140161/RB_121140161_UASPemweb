<?php
$db = mysqli_connect('localhost', 'root', '', 'rb_121140161_uaspemweb');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<?php

if (isset($_GET['id'])) {

    $result = mysqli_query($db, "DELETE FROM buku WHERE id_buku=" . $_GET['id']);
    if ($result == true)
        echo "sucess";
    header("Location:index.php");
}

?>
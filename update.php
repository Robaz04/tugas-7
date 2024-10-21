<?php
session_start();
include "connection.php";
$npm = $_SESSION["npm"];
$level = $_SESSION["level"];
if ($level == "") {
    header("location:index.php");
}

//update data
if (isset($_POST['update'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jk'];
    $tgl = $_POST['tgl_lhr'];
    $email = $_POST['email'];
    $sql = "UPDATE identitas set nama='$nama', alamat='$alamat', jk='$jk', tgl_lhr='$tgl', email='$email' where npm='$npm' ";
    if ($conn->query($sql) === TRUE) {
        header("Location: tampil_data.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

<?php
session_start();
if ($_SESSION["level"] != "2") {
    include "logout.php";
}
include "connection.php";
$level = $_SESSION["level"];
if ($level == "") {
    header('index.php');
}

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = isset($_POST['jk']) ? $_POST['jk'] : null;
    $tgl = $_POST['tgl_lhr'];
    $email = $_POST['email'];

    $sql = "INSERT INTO identitas (npm, nama, alamat, jk, tgl_lhr, email)
    VALUES ('$npm', '$nama', '$alamat', '$jk', '$tgl', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: tampil_data.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();

<?php
session_start();
if ($_SESSION["level"] != "2") {
    include "logout.php";
}
include "connection.php";
//hapus data
$npm = $_GET['id'];
$sql1 = "delete from identitas where npm='$npm'";
$sql2 = "delete from users where npm='$npm'";

if (($conn->query($sql1) === TRUE) &&  ($conn->query($sql2) === TRUE)) {
    // redirect ke halaman tampil data
    header("Location: tampil_data.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();

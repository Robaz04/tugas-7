<?php
session_start();
include "connection.php";
$level = $_SESSION["level"];
if ($_SESSION["level"] != "2") {
    include "logout.php";
}
if ($level == "") {
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program CRUD</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/dd20ffdac4.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="formulir.css">
</head>

<body>
    <div class="container">
        <div class="input">
            <h1>Formulir Data Mahasiswa</h1>
            <form id="mahasiswaForm" action="input.php" method="post">
                <input type="text" name="npm" placeholder="Masukkan NPM Mahasiswa">
                <input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa">
                <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat Mahasiswa"></textarea>
                <label for="jk">Jenis Kelamin: </label>
                <div class="jk">
                    <input type="radio" value="L" name="jk">Laki-Laki
                </div>
                <div class="jk">
                    <input type="radio" value="P" name="jk">Perempuan
                </div>
                <input type="date" name="tgl_lhr" id="tgl_lhr">
                <input type="email" name="email" placeholder="Masukkan Email Mahasiswa">
                <div class="button">
                    <button type="submit" name="submit"><span>Submit</span></button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.getElementById('mahasiswaForm').addEventListener('submit', function(event) {
            const inputs = document.querySelectorAll(
                'input[type="text"], textarea, input[type="date"], input[type="email"]');
            let isValid = true;

            inputs.forEach(input => {
                if (input.value.trim() === '') {
                    input.style.border = '1px solid red';
                    isValid = false;
                } else {
                    input.style.border = '';
                }
            });

            if (!isValid) {
                event.preventDefault();
                alert('Masih terdapat data yang kosong.');
            }
        });

        document.addEventListener("DOMContentLoaded", function() {
            var inputDate = document.getElementById("tgl_lhr");

            // Jika value kosong, tambahkan class placeholder
            if (!inputDate.value) {
                inputDate.classList.add("placeholder");
            }

            inputDate.addEventListener("focus", function() {
                inputDate.classList.remove("placeholder");
            });

            inputDate.addEventListener("blur", function() {
                if (!inputDate.value) {
                    inputDate.classList.add("placeholder");
                }
            });
        });
    </script>
</body>

</html>
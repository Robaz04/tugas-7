<?php
session_start();
include "connection.php";
$level = $_SESSION["level"];
$npm = $_GET['id'];
$_SESSION["npm"] = $npm;
if ($level == "") {
    header("location:edit.php");
} elseif ($level == "1") {
    $sql = "select * from identitas where npm='$npm'";
} elseif ($level == "2") {
    $sql = "select * from identitas";
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
    <?php
    include "connection.php";
    $npm = $_GET['id'];
    $sql = "SELECT * FROM identitas where npm='$npm' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $nama = $row["nama"];
            $alamat = $row["alamat"];
            $jk = $row["jk"];
            $tgl_lhr = $row["tgl_lhr"];
            $email =  $row["email"];
        }
    } else {
        $npm = "";
        $nama = "";
        $alamat = "";
        $jk = "";
    }
    ?>
    <div class="container">
        <div class="input">
            <h1>Edit Data Mahasiswa</h1>
            <form action="update.php" method="post" id="mahasiswaForm">
                <input type="text" name="npm" placeholder="Masukkan NPM Mahasiswa" value="<?php echo $npm; ?>">
                <input type="text" name="nama" placeholder="Masukkan Nama Mahasiswa" value="<?php echo $nama; ?>">
                <textarea name="alamat" id="alamat"
                    placeholder="Masukkan Alamat Mahasiswa"><?php echo $alamat; ?></textarea>
                <label for="jk">Jenis Kelamin: </label>
                <div class="jk">
                    <input type="radio" value="L" name="jk" <?php if ($jk == "L"): ?>checked="checked"
                        <?php endif; ?>>Laki-Laki
                </div>
                <div class="jk">
                    <input type="radio" value="P" name="jk" <?php if ($jk == "P"): ?>checked="checked"
                        <?php endif; ?>>Perempuan
                </div>
                <input type="date" name="tgl_lhr" placeholder="Masukkan Tanggal Lahir Mahasiswa"
                    value="<?php echo $tgl_lhr; ?>">
                <input type="email" name="email" placeholder="Masukkan Email Mahasiswa" value="<?php echo $email; ?>">
                <div class="button">
                    <button type="submit" name="update"><span>Edit</span></button>
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
    </script>
</body>

</html>
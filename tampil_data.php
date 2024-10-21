<?php
session_start();
include "connection.php";
$npm = $_SESSION["npm"];
$level = $_SESSION["level"];

if ($level == "" ) {
    header("location:index.php");
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
    <title>Data Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="idxxx.css">
</head>

<body>
    <?php
    include "connection.php";
    //tampilkan data  
    $result = $conn->query($sql);
    ?>
    <div class="container">
        <div class="wrapper">
            <h1>Data Mahasiswa</h1>
            <table>
                <tr>
                    <th>No</th>
                    <th>NPM</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
                <tr>
                    <?php
                    if ($result->num_rows > 0) {
                        $no = 0;
                        while ($row = $result->fetch_assoc()) {
                            $no++;
                    ?>
                    <td>
                        <?php echo $no; ?>
                    </td>
                    <td>
                        <?php echo $row["npm"]; ?>
                    </td>
                    <td>
                        <?php echo $row["nama"]; ?>
                    </td>
                    <td>
                        <?php echo $row["alamat"]; ?>
                    </td>
                    <td>
                        <?php echo $row["jk"]; ?>
                    </td>
                    <td>
                        <?php echo $row["tgl_lhr"]; ?>
                    </td>
                    <td>
                        <?php echo $row["email"]; ?>
                    </td>
                    <td>
                        <div class="button">
                            <form action="edit.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $row['npm']; ?>">
                                <button type="submit" class="edit-btn">Edit</button>
                            </form>
                            <?php
                                    if ($level == "2") {
                                    ?>
                            <form action="delete.php" method="GET">
                                <input type="hidden" name="id" value="<?php echo $row['npm']; ?>">
                                <button type="submit" class="delete-btn">Delete</button>
                            </form>
                            <?php
                                    }
                                    ?>
                        </div>
                    </td>
                </tr>
                <?php
                        }
                    }
                    $conn->close();
        ?>
                </tr>
            </table>
            <?php
            if ($result->num_rows == 0) {
                echo "<h3 class=\"empty-data\">Data Kosong!</h3>";
                echo "<h4 class=\"empty-data\">Silahkan Kontak Admin Untuk Input Data!</h4>";
            }

            if ($level == "2") {
                echo "<a class=\"empty-btn\" href=\"form.php\">Tambah Data</a>";
            }
            ?>
        </div>
    </div>
    <form action="logout.php" method="post">
        <button class="logout" name="logout">Logout</button>
    </form>
</body>

</html>
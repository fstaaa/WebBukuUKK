<?php 
include('koneksi.php'); 
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Web Buku</title>
    <style>
        * {
            font-family: "Palatino Linotype";
        }
        h1 {
            text-transform: uppercase;
            color: #000000;
        }
        table {
            border: 3px solid #000000;
            border-collapse: collapse;
            border-spacing: 0;
            width: 70%;
            margin: 10px auto 10px auto;
        }
        table thead th {
            background-color: #000000
            border: 3px solid #000000;
            color: #000000;
            padding: 10px;
            text-align: center;
            text-shadow: 1px 1px 1px #fff;
        }
        table tbody td {
            border: 3px solid #000000;
            color: #333;
            text-align: center;
            font-size: 15px;
            padding: 10px;
        }
        a {
            background-color: #94DAFF;
            color: #000000; 
            padding: 10px;
            font-size: 12px;
            text-decoration: none;
        }
        body {
        background-color: #94B3FD;
    }
    </style>
</head>
<body>
    <a href="logout.php" style="float:right">Logout</a>
    <br>
    <center><h1>Data Buku</h1></center>
    <center><a href="tambah_buku.php">+ &nbsp; Tambah Buku</a></center>
    <br>
    <form action="" method="POST">
    </form>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Judul</th>
                <th>Pengarang</th>
                <th>Penerbit</th>
                <th>Gambar</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $query ="SELECT * FROM produk ORDER BY id ASC";
                $result = mysqli_query($koneksi, $query);

                if(!$result) {
                    die("Query error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
                }
                $no = 1;

                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['judul']; ?></td>
                <td><?php echo $row['pengarang']; ?></td>
                <td><?php echo $row['penerbit']; ?></td>
                <td><img style="width: 120px;" src="gambar/<?php echo $row['gambar']; ?>"></td>
                <td>
                    <a href="edit_buku.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="proses_hapus.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin ingin hapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php
                $no++;
            }
            ?>  

        </tbody>
    </table>
<body>
</html>
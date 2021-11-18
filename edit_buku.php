<?php include('koneksi.php'); 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM produk where id = '$id'";
        $result = mysqli_query($koneksi, $query);
        if(!$result) {
            die("Query Error :".mysqli_errno($koneksi). " - ".mysqli_error($koneksi));
        }
        $data = mysqli_fetch_assoc($result);

        if(!count($data)) {
            echo "<script>alert('Data tidak ditemukan pada tabel.');window.location='index.php';</script>";
        }

    } else {
        echo "<script>alert('Masukan ID yang ingin di edit');window.location='index.php';</script>";
    }


?>
<!DOCTYPE html>
<html>
<head>
    <title>Web Buku</title>
    <style type="text/css">
        * {
            font-family: "Trebuchet MS";
        }
        h1 {
            text-transform: uppercase;
            color: salmon;
        }
        .base {
            width: 400px;
            padding: 20px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ededed;
        }
        label {
            margin-top : 10px;
            float: left;
            text-align: left;
            width: 100%;
        }
        input {
            padding: 6px;
            width: 100%;
            box-sizing: border-box;
            background-color: #f8f8f8;
            border: 2px solid #ccc;
            outline-color: salmon;
        }
        button {
            background-color: salmon;
            color: #fff;
            padding: 10px;
            font-size: 12px;
            border: 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <!-- <center><h1>Edit Buku <?php echo $data['judul']; ?></h1></center>
    <form method="POST" action="proses_edit.php" enctype="multipart/form-data">
    <section class="base">
        <div>
            <label>Nama Buku</label>
            <input type="text" name="judul" autofocus="" required="" value="<?php echo $data['judul']; ?>" />
            <input type="hidden" name="id" value="<?php echo $data['judul']; ?>" />
        </div>
        <div>
        <label>Pengarang</label>
            <input type="text" name="pengarang" required="" value="<?php echo $data['pengarang']; ?>" />
        </div>
        <div>
        <label>Penerbit</label>
            <input type="text" name="penerbit" required="" value="<?php echo $data['penerbit']; ?>" />
        </div>
        <div>
            <label>Gambar</label>
            <img src="gambar/<?php echo $data['gambar']; ?>" style="width: 120px;float: left;margin-top: 5px;">
            <input type="file" name="gambar" />
            <i style="float: left;fpnt-size: 11px;color: red;">Abaikan jika tidak merubah cover buku</i>
        </div>
        <div>
            <br>
            <button type="submit">Simpan Perubahan</button>
        </div>
    </section>
</form> -->
<div>
    <center><h1>Edit Buku <?php echo $data['judul']; ?></h1></center>
    <section class="base">    
    <div>
      <div>

        <form enctype="multipart/form-data" action="proses_edit.php" method="post">

          <input name="id" value="<?php echo $data['id']; ?>" hidden />

          <div>
            <label>Judul</label>
            <input type="text" name="judul" value="<?php echo $data['judul']; ?>">
          </div>

          <div>
            <label>Pengarang</label>
            <input type="text" name="pengarang" value="<?php echo $data['pengarang']; ?>" />
          </div>

          <div>
            <label>Penerbit</label>
            <input type="text" name="penerbit" required=""
              value="<?php echo $data['penerbit']; ?>" />
          </div>

          <div>
            <label>Gambar</label>
            <i style="font-size: 11px;color: red">*Abaikan jika tidak ingin merubah gambar</i>
            <input type="file" name="gambar">
          </div>
        <div>
          <button type="submit">Update</button>
          <a href="index.php">Cancel</a>
    </div>
      </div>
    </div>
    </section>
  </div>
</body>
</html>
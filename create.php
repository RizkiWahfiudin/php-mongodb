<?php
   session_start();
   if(isset($_POST['submit'])) {
      require 'config.php';

      $insertOneResult = $collection->insertOne([
          'judul' => $_POST['judul'],
          'penerbit' => $_POST['penerbit'],
          'tahun' => $_POST['tahun']
      ]);


      $_SESSION['success'] = "Data Buku Berhasil Ditambahkan";
      header("Location: index.php");
   }
?>


<!DOCTYPE html>
<html>
<head>
   <title>PHP & MongoDB - CRUD</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>

<div class="container">
   <h1>Buat Data Buku</h1>
   <a href="index.php" class="btn btn-primary">Kembali</a>

   <form method="POST">
      <div class="form-group">
         <strong>Judul</strong>
         <input type="text" name="judul" required="" class="form-control" placeholder="Judul Buku">
      </div>
      <div class="form-group">
         <strong>Penerbit</strong>
         <input type="text" name="penerbit" required="" class="form-control" placeholder="Nama Penerbit">
      </div>
      <div class="form-group">
         <strong>Tahun Terbit</strong>
         <input type="text" name="tahun" required="" class="form-control" placeholder="Tahun Terbit">
      </div>
      <div class="form-group">
         <button type="submit" name="submit" class="btn btn-success">Submit</button>
      </div>
   </form>
</div>

</body>
</html>
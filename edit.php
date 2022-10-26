<?php
   session_start();

   require 'config.php';

   if (isset($_GET['id'])) {
      $hospitals = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($_GET['id'])]);
   }

   if(isset($_POST['submit'])) {
      $collection->updateOne(
          ['_id' => new MongoDB\BSON\ObjectID($_GET['id'])],
          ['$set' => ['nama_rumah_sakit' => $_POST['nama_rumah_sakit'], 'jenis_rumah_sakit' => $_POST['jenis_rumah_sakit'], 'alamat_rumah_sakit' => $_POST['alamat_rumah_sakit']]]
      );
      $_SESSION['success'] = "Data Rumah Sakit Berhasil Diupdate";
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
      <h1>Edit Data Rumah Sakit</h1>
      <a href="index.php" class="btn btn-primary">Kembali</a>

      <form method="POST">
         <div class="form-group">
            <strong>Nama Rumah Sakit</strong>
            <input type="text" name="nama_rumah_sakit" value="<?php echo $hospitals->nama_rumah_sakit; ?>" required="" class="form-control" placeholder="Masukkan Nama Rumah Sakit">
         </div>
         <div class="form-group">
            <strong>Jenis Rumah Sakit</strong>
            <input type="text" name="jenis_rumah_sakit" value="<?php echo $hospitals->jenis_rumah_sakit; ?>" required="" class="form-control" placeholder="Masukkan Jenis Rumah Sakit">
         </div>
         <div class="form-group">
            <strong>Alamat Rumah Sakit</strong>
            <textarea class="form-control" name="alamat_rumah_sakit" placeholder="Masukkan Alamat Rumah Sakit" placeholder="Detail"><?php echo $hospitals->alamat_rumah_sakit; ?></textarea>
         </div>
         <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success">Submit</button>
         </div>
      </form>
   </div>
</body>
</html>
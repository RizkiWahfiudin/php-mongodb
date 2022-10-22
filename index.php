<?php
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Basis Data Lanjut</title>
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
   <div class="container">
      <h1>PHP & MongoDB - CRUD</h1>

      <a href="create.php" class="btn btn-success">Tambah Data Rumah Sakit</a>

      <?php
         if(isset($_SESSION['success'])){
            echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
         }
      ?>

      <table class="table table-borderd">
         <tr>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Alamat</th>
            <th>Action</th>
         </tr>

         <?php
            require 'config.php';
            $hospitals = $collection->find([]);
            foreach($hospitals as $hospital) {
               echo "<tr>";
               echo "<td>".$hospital->nama_rumah_sakit."</td>";
               echo "<td>".$hospital->jenis_rumah_sakit."</td>";
               echo "<td>".$hospital->alamat_rumah_sakit."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$hospital->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$hospital->_id."' class='btn btn-danger'>Delete</a>";
               echo "</td>";
               echo "</tr>";
            };
         ?>
      </table>
   </div>
</body>
</html>

<?php
session_destroy();
?>
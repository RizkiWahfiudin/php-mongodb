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

      <a href="create.php" class="btn btn-success">Tambah Data Buku</a>

      <?php
         if(isset($_SESSION['success'])){
            echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
         }
      ?>

      <table class="table table-borderd">
         <tr>
            <th>Judul</th>
            <th>Penerbit</th>
            <th>Tahun</th>
            <th>Action</th>
         </tr>

         <?php
            require 'config.php';
            $books = $collection->find([]);
            foreach($books as $book) {
               echo "<tr>";
               echo "<td>".$book->judul."</td>";
               echo "<td>".$book->penerbit."</td>";
               echo "<td>".$book->tahun."</td>";
               echo "<td>";
               echo "<a href='edit.php?id=".$book->_id."' class='btn btn-primary'>Edit</a>";
               echo "<a href='delete.php?id=".$book->_id."' class='btn btn-danger'>Delete</a>";
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
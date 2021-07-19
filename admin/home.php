<?php
include "db_connect.php";

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {

?>
     <!doctype html>
     <html lang="en">

     <head>
          <title>Desa Padang Bulan Kotanopan</title>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="../css/admin/bootstrap.min.css">
          <link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css" />
     </head>

     <body class="container">

          <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
               <a class="navbar-brand" href="home.php">Desa Padang Bulan Kotanopan</a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
               </button>

               <div class="collapse navbar-collapse" id="navbarColor01">
                    <ul class="navbar-nav mr-auto">
                         <li class="nav-item active">
                              <a class="nav-link" href="home.php">Home
                                   <span class="sr-only">(current)</span>
                              </a>
                         </li>
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Master Data</a>
                              <div class="dropdown-menu">
                                   <a class="dropdown-item" href="?page=penduduk">Data Penduduk</a>
                                   <a class="dropdown-item" href="?page=domisili">Data Domisili</a>
                                   <a class="dropdown-item" href="?page=kematian">Data SK Kematian</a>
                                   <a class="dropdown-item" href="?page=usaha">Data SK Usaha</a>
                                   <a class="dropdown-item" href="?page=mampu">Data Surat Tidak Mampu</a>
                              </div>
                         </li>
                         <li class="nav-item active">
                              <a class="nav-link" href="?page=admin">Data Admin</a>
                         </li>
                         <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profil</a>
                              <div class="dropdown-menu">
                                   <a class="dropdown-item" href="?page=profil">Ubah Profil</a>
                                   <a class="dropdown-item" href="logout.php">Logout</a>
                              </div>
                         </li>
                    </ul>
               </div>
          </nav>

          <div class="mb-3"></div>


          <?php
          if (isset($_GET['page'])) {
               include $_GET['page'] . ".php";
          } else {
               include "welcome.php";
          }
          ?>

          <div class="mb-3"></div>


          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="../js/jquery-3.3.1.slim.min.js"></script>
          <script src="../js/popper.min.js" crossorigin="anonymous"></script>
          <script src="../js/bootstrap.bundle.min.js"></script>
          <script type="text/javascript" src="../DataTables/datatables.min.js"></script>
          <script>
               $(document).ready(function() {
                    $('#tabel').DataTable();

                    $('.btn-danger').click(function() {
                         return confirm('Apakah Anda yakin ingin menghapus data ini?');
                    });
               });
          </script>
     </body>

     </html>

<?php
} else {
     header("Location: index.php");
     exit();
}
?>
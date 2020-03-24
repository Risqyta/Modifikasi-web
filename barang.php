<?php
session_start();
if(!isset($_SESSION['admin'])) {
   header('location:login.php');
} else {
   $username = $_SESSION['admin'];
}
?>
<?php
include "config/koneksi.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Peminjaman Alat</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/dist/css/global.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  </head>


  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Peminjaman Inventaris Sekolah</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user fa-fw"></i> Petugas <i class="fa fa-caret-down"></i>
              </a>
            <ul class="dropdown-menu dropdown-user">
             <li class="divider"></li>
              <li><a href="logout.php"><i class="fa fa-sign-out"></i> Keluar</a></li>
            </ul>

          </li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
          <li><a href="barang.php"><i class="fa fa-laptop">&nbsp;&nbsp;&nbsp;Data Inventaris</i></a></li>
            <li><a href="pegawai.php"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Data Pegawai</i></a></li>
            <li><a href="petugas.php"><i class="fa fa-user">&nbsp;&nbsp;&nbsp;Data Petugas</i></a></li>
            <li><a href="peminjaman.php"><i class="fa fa-gear">&nbsp;&nbsp;&nbsp;Peminjaman</i></a></li>
            <li><a href="pengembalian.php"><i class="fa fa-book">&nbsp;&nbsp;&nbsp;Pengembalian</i></a></li>
          </ul>

        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h2 class="page-header">Data Inventaris</h2>
          <div class="row">
            <a href="tambahbrg.php" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Tambah</a>
          </div>
          <table class="table table-striped">
    <thead>
      <th scope="col">ID Inventaris</th>
      <th scope="col">Nama Inventaris</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Jumlah</th>
      <th scope="col">Jenis</th>
      <th scope="col">Tanggal Registrasi</th>
      <th scope="col">Aksi</th>
    </thead>

                <?php
                     $query = $mysqli->query("SELECT A.id_inventaris as id_inventaris,	A.nama as nama,	A.deskripsi as deskripsi,	A.jumlah as jumlah,	B.nama_jenis as nama_jenis,	A.tgl_register as tgl_register FROM	inventaris as A left join jenis as B ON A.id_jenis = B.id_jenis");
                     while ($lihat=mysqli_fetch_array($query)){
                      ?>
                      <tbody>
                        <tr>
                          <td><?php echo $lihat['id_inventaris']; ?></td>
                          <td><?php echo $lihat['nama']; ?></td>
                          <td><?php echo $lihat['deskripsi'];?></td>
                          <td><?php echo $lihat['jumlah']; ?></td>
                          <td><?php echo $lihat['nama_jenis']; ?></td>
                          <td><?php echo $lihat['tgl_register']; ?></td>
                          <td> 
                            <a href="editbrg.php?id_inventaris=<?php echo $lihat['id_inventaris']; ?>" class="btn btn-info">&nbsp;&nbsp;Edit</a>
                            <a href="hapusbrg.php?id=<?php echo $lihat['id_inventaris']; ?>" class="btn btn-info">Hapus</a>
                          </td>
                        </tr>
                        <?php

                        } ?>

                      </tbody>

              </table>
        </div>
      </div>
    </div>

    <?php require_once "templates/footer.php" ?>
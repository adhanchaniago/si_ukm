<?php
	// include "kon.php";
	//   $nim = $_GET ['nim'];
 //      $sql = "select * from maba_19 where nim = '$nim'";

	// $hsl = mysqli_query ($kon,$sql);
	// if(!$hsl) die ("Gagal Query...");

	// $data = mysqli_fetch_array($hsl);
	// $nim = $data["nim"];
	// $nama = $data["nama"];
	// $jurusan = $data["jurusan"];
	// $telp = $data["telp"];
  $id_anggota = $_GET ['id_anggota'];
  include "kon.php";
  $sql = "select * from anggota where id_anggota = '$id_anggota'";
  $hsl = mysqli_query($kon,$sql) or die ("Gagal");
  $r = mysqli_fetch_assoc($hsl);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>APLIKASI KMK</title>
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <link href="css/sb-admin.css" rel="stylesheet">
</head>
<body id="page-top">
  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
    <a class="navbar-brand mr-1" href="halaman_admin.php">APLIKASI UKM</a>
    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>
  </nav>
  <div id="wrapper">
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="halaman_admin.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span>
        </a>
      </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Input Data</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Anggota </h6>
          <a class="dropdown-item" href="p_mahasiswa.php">Input Data Diri</a>
        </div>
      </li>
    <!--   <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Diagram</span></a>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link" href="tampil_data.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Tabel</span></a>
      </li> -->
    </ul>
    <div id="content-wrapper">
      <div class="container-fluid">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="halaman_admin.php">Home</a>
          </li>
          <li class="breadcrumb-item active">Edit Data Anggota</li>
        </ol>
       <div class="col-xs-12 col-sm-12 col-md-12">
        <p style="margin-bottom:10px;">
          <strong style="font-size:18pt;"><span class="fa fa-clone"></span> Edit Data Anggota</strong>
        </p>
        <hr>
        <div class="modal-body">
          <div class="panel panel-default">
           <div class="panel-body">
            <form action="simpan_data_anggota.php" method="post">
              <div class="form-group">
                <input type="hidden" name="id_anggota" class="form-control" value = '<?= $id_anggota; ?>'/>
              </div>
              <div class="form-group">
                <label for="nim">NIM</label>
                <input type="text" name="nim" placeholder="nim" class="form-control" value = '<?=$r['nim'];?>' />
              </div>
              <div class="form-group">
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" placeholder="nama" class="form-control" value = '<?=$r['nama'];?>' />
              </div>
              <label>Jurusan</label>
               <select name="jurusan"  class="form-control" >
                <option value ="" >-- Pilih--</option>
                <option  value ="Teknik Informatika"<?php if ($r['jurusan']=='Teknik Informatika'){echo "selected";}?>  >Teknik Informatika</option>
                <option  value ="Sistem Informasi" <?php if ($r['jurusan']=='Sistem Informasi'){echo "selected";}?>  >Sistem Informasi</option>
                <option  value ="Teknik Komputer" <?php if ($r['jurusan']=='Teknik Komputer'){echo "selected";}?>  >Teknik Komputer</option>
                <option  value ="Komputerisasi Akuntansi" <?php if ($r['jurusan']=='Komputerisasi Akuntansi'){echo "selected";}?>  >Komputerisasi Akuntansi</option>
                <option  value ="Manajemen Informatika" <?php if ($r['jurusan']=='Manajemen Informatika'){echo "selected";}?>  >Manajemen Informatika</option>
               </select>
               <br/>
               <div class="form-group">
                <label for="nama">Tahun Masuk</label>
                <input type="text" name="tahun" placeholder="Tahun Masuk" class="form-control" value ='<?=$r['thn_masuk'];?>'/>
              </div>
              <label>Jenis Kelamin</label>
               <select name="jenis_kelamin" class="form-control">
                <option>-- Pilih--</option>
                <option  value ="Laki-laki"<?php if ($r['jenis_kelamin']=='Laki-laki'){echo "selected";}?>  >Laki-Laki</option>
                <option  value ="Perempuan"<?php if ($r['jenis_kelamin']=='Perempuan'){echo "selected";}?>  >Perempuan</option>
               </select>
               <br/>
                <div class="form-group">
                <label for="nama">Alamat</label>
                <input type="text" name="alamat" placeholder="" class="form-control" value ='<?=$r['alamat'];?>'/>
              </div>
               <div class="form-group">
                <label for="nama">Tanggal Lahir</label>
                <input type="date" name="tanggal" placeholder="" class="form-control" value ='<?=$r['tgl_lahir'];?>'/>
              </div>
               <div class="form-group">
                <label for="tlp">Telepon</label>
                <input type="text" name="no_telp" placeholder="telepon" class="form-control" value ='<?=$r['no_telp'];?>'/>
              </div>
              <div class="text-right">
                <button class="btn btn-success" type="submit" name="submit" ><span class="fa fa-save" value = "Edit"></span>Edit</button>
                 <button class="btn btn-danger" type="reset" name="reset"><span class="fa fa-history"></span>Reset</button>
              </div>

            </form>
            </div>
          </div>
          </div>
      
    </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © KMK 2019  </span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar dari aplikasi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Silahkan pilih "Logout" untuk keluar dari aplikasi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

</body>

</html>
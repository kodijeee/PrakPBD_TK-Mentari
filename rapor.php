<?php
include_once('config.php');
session_start();
$nip_peg = $_SESSION['user_name'];
$query = "SELECT * FROM kelas_ajar_vu WHERE nip_peg = '$nip_peg'";
$sql = mysqli_query($connect, $query);

$counter = 1;
// cek apakah yang mengakses halaman ini sudah login
  if (isset($_SESSION['user_logged'])) {
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- partial:partials/header.php -->
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Rapor</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/feather/feather.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/logo-tk.png" />
  
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/navbar.php -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.php"><img src="images/logo-nama-tk.png" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="icon-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
               <span class="d-sm-inline d-none">
                <?php echo $_SESSION['user_name'];
                    echo "&nbsp;";
                ?>
              </span>
              <img src="images/user.png" alt="profile"/>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="logout.php">
                <i class="ti-power-off text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="siswa">
              <i class="icon-file menu-icon"></i>
              <span class="menu-title">Registrasi</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="siswa">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="registrasi-siswa.php">Registrasi Siswa</a></li>
                <li class="nav-item"> <a class="nav-link" href="data-registrasi.php">Data Registrasi</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#pembayaran" aria-expanded="false" aria-controls="pembayaran">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Pembayaran</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pembayaran">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="verifikasi-pembayaran.php">Verifikasi</a></li>
                <li class="nav-item"> <a class="nav-link" href="data-pembayaran.php">Data Pembayaran</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#kelas" aria-expanded="false" aria-controls="kelas">
              <i class="icon-head menu-icon"></i>
              <span class="menu-title">Kelompok Belajar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="kelas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="daftar-kelompok-belajar.php">Daftar Kelompok</a></li>
                <li class="nav-item"> <a class="nav-link" href="kelompok-belajar.php">Kelas Ajar</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tugas" aria-expanded="false" aria-controls="tugas">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Tugas</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tugas">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="tugas.php">Tugas Prakarya</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#nilai" aria-expanded="false" aria-controls="nilai">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Penilaian</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="nilai">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="kriteria-harian.php">Kriteria Harian</a></li>
                <li class="nav-item"> <a class="nav-link" href="kriteria-bulanan.php">Kriteria Bulanan</a></li>
                <li class="nav-item"><a class="nav-link" href="nilai-harian.php">Nilai Harian</a></li>
                <li class="nav-item"> <a class="nav-link" href="nilai-bulanan.php">Nilai Bulanan</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#rapor" aria-expanded="false" aria-controls="rapor">
            <i class="icon-book menu-icon"></i>
              <span class="menu-title">Rapor Siswa</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="rapor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="rapor.php">Data Rapor</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <!-- main content-->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <h2 class="col-lg-12 text-primary mb-4">Rapor</h2>
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body">
                        <?php 
                            $data=$sql->fetch_assoc();
                        ?>
                        <div class="form-group row">
                          <div class="col-md-6">
                            <span class="mb-2 text-xs font-weight-bold"><stong>Kelompok &ensp;&nbsp;&ensp;&nbsp;&ensp;:</stong>
                                <span class="mb-2 text-xs">
                                    <?php echo $data['kelompokbel'];  ?> 
                                </span>
                            </span>
                            <br>
                            <span class="mb-2 text-xs font-weight-bold">Pengajar &ensp;&nbsp;&ensp;&nbsp;&ensp;&nbsp;&nbsp;: 
                                <span class="mb-2 text-xs">
                                    <?php echo $data['nama_peg'];  ?> 
                                </span>
                            </span>
                            <br>
                            <span class="mb-2 text-xs font-weight-bold">Ruang Kelas &ensp;&nbsp;: 
                                <span class="mb-2 text-xs">
                                    <?php echo $data['nama_ruang_kelas']; ?> 
                                </span>
                            </span>
                            <br>
                          </div>
                          <div class="col-md-6"> 
                            <span class="mb-2 text-xs font-weight-bold">Tingkat Kelas&ensp;: 
                                <span class="mb-2 text-xs">
                                    <?php echo $data['tingkatTK']==1?"TK-B":"TK-A";?> 
                                </span>
                            </span>
                            <br>
                            <span class="mb-2 text-xs font-weight-bold">Tahun Ajaran &ensp;: 
                                <span class="mb-2 text-xs">
                                    <?php echo $data['tahun_ajar'];  ?> 
                                </span>
                            </span>
                            <br>
                            <br>
                          </div>
                        </div>
                        <div class="table-responsive">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th class="text-center" width="5%">No</th>
                                <th class="text-center" width="10%">NIS</th>
                                <th class="text-center" width="50%">Nama Siswa</th>
                                <th width="10%">Lihat Rapor</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach($sql as $data):?>
                                <tr>
                                  <td class="text-center"><?php echo $counter++; ?></td>
                                  <td class="text-center"><?php echo $data['noinduk_siswa']?></td>
                                  <td><?php echo $data['nama_siswa']?></td>
                                  <td>
                                  <a href="rapor-siswa.php?id=<?php echo $data['noinduk_siswa']; ?>" class="btn btn-warning">Show</a>
                                  </td>
                                </tr>
                            </tbody>
                            <?php endforeach ?>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 <a href="#"> TK Mentari. </a> All rights reserved.</span>
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <script src="js/dataTables.select.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>

<?php
} else {
    header('location: index.php');
}
?>
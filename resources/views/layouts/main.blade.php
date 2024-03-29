<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="icon" href="/img/grisasip.png">
  <title> {{ $halaman }}  - GrisaSip</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  {{-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="img/GrisaSip.png" alt="AdminLTELogo" height="60" width="60">
  </div> --}}

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/surat-masuk/create" class="nav-link">Input Surat Masuk</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/surat-keluar/create" class="nav-link">Input Surat Keluar</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->
      @auth
        <li class="nav-item dropdown">
          <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Selamat Datang, {{ ucwords(auth()->user()->name) }}</a>
          <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu dropdown-menu-right border-0 shadow">
            <li><a href="/ganti-password" class="dropdown-item"><i class="nav-icon fas fa-key"></i> Ganti Password </a></li>
            <li class="dropdown-divider"></li>
              <li>
                <form action="/logout" method="POST">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="nav-icon fas fa-sign-out-alt"></i> Logout</button>
                </form>
              </li>
          </ul>
        </li>
      @else
        <li class="nav-item d-none d-sm-inline-block">
          <a href="/login" class="nav-link">Login</a>
        </li>      
      @endauth
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="/img/grisasip.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Grisa Arsip</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->foto)
            <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="img-circle elevation-2" alt="User Image">
          @else
            <img src="/img/user.png" class="img-circle elevation-2" alt="User Image">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(auth()->user()->name) }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      {{-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> --}}

      <!-- Sidebar Menu -->
      @auth
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @if(Auth::user()->is_superadmin == 1)
          <li class="nav-item {{ Request::is('data-master*') ? 'menu-open' : ''  }}">
            <a href="#" class="nav-link {{ Request::is('data-master*') ? 'active' : ''  }}">
              <i class="nav-icon fa fa-th-list"></i>
              <p>
                Data Master
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ Request::is('data-master/kode-surat','data-master/kategori-kode','data-master/kode-surat/*/edit','data-master/kategori-kode/*/edit') ? 'menu-open' : ''  }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Surat Keluar
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/data-master/kode-surat/" class="nav-link {{ Request::is('data-master/kode-surat','data-master/kode-surat/*/edit') ? 'active' : '' }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kode Surat</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/data-master/kategori-kode/" class="nav-link {{ Request::is('data-master/kategori-kode','data-master/kategori-kode/*/edit') ? 'active' : ''  }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kategori Kode</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item {{ Request::is('data-master/kode-surat-masuk*') ? 'menu-open' : ''  }}">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Surat Masuk
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/data-master/kode-surat-masuk" class="nav-link {{ Request::is('data-master/kode-surat-masuk','data-master/kode-surat-masuk/*/edit') ? 'active' : ''  }}">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Kode Surat Masuk</p>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
          @endif
          <li class="nav-item {{ Request::is('surat-masuk*','surat-keluar*') ? 'menu-open' : ''  }}">
            <a href="#" class="nav-link {{ Request::is('surat-masuk*','surat-keluar*') ? 'active' : ''  }}">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Surat
                <i class="fas fa-angle-left right"></i>
                <!-- <span class="badge badge-info right">6</span> -->
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/surat-masuk" class="nav-link {{ Request::is('surat-masuk*') ? 'active' : ''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/surat-keluar" class="nav-link {{ Request::is('surat-keluar*') ? 'active' : ''  }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Surat Keluar</p>
                </a>
              </li>
            </ul>
          </li>   
          @if(Auth::user()->is_superadmin == 1)
          <li class="nav-item">
            <a href="/admin" class="nav-link {{ Request::is('admin','admin/*/edit') ? 'active' : '' }}">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Admin
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          @endif          
          <li class="nav-item">
            <a href="logs" class="nav-link {{ Request::is('log','log*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Log
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
        </ul>
      </nav>
      @endauth
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">{{ $tab_title }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">{{ $title }}</a></li>
              <li class="breadcrumb-item active">{{ $tab_title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- isi konten -->
    @yield('container')
    <!-- penutup konten -->
  </div>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2023-<?= date("Y") ?> <a target="_blank" href="https://www.instagram.com/ridhoo_kurniawaan/">TIM IT GRISAWANGI</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.5
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/js/adminlte.js"></script>
<!-- Toastr -->
<script src="/plugins/toastr/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="js/demo.js"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{-- <script src="js/pages/dashboard.js"></script> --}}
<!-- Page specific script -->
<script>
  var page = 1; // Nomor halaman awal
  var isLoading = false; // Menandakan apakah data sedang dimuat

  // Fungsi untuk memeriksa apakah pengguna telah mencapai bagian bawah halaman
  function isBottom() {
      return $(window).scrollTop() + $(window).height() >= $(document).height() - 300; // 300 adalah jarak dari bawah halaman sebelum data tambahan dimuat
  }

  // Fungsi untuk memuat data tambahan
  function loadMoreData() {
      if (!isLoading) {
          isLoading = true; // Set isLoading menjadi true agar data tidak dimuat berulang kali
          $('#loader').show(); // Tampilkan loader

          $.ajax({
              url: '/logs', // Ganti dengan URL endpoint API Anda
              type: 'GET',
              data: {
                  page: page // Kirim nomor halaman yang sedang dimuat
              },
              success: function(response) {
                  $('#timeline').append(response); // Tambahkan data tambahan ke timeline
                  isLoading = false; // Set isLoading kembali menjadi false setelah selesai memuat data
                  $('#loader').hide(); // Sembunyikan loader
                  page++; // Tambahkan nomor halaman untuk memuat data berikutnya
              },
              error: function(xhr, status, error) {
                  console.error(error);
                  isLoading = false; // Set isLoading kembali menjadi false jika terjadi kesalahan saat memuat data
                  $('#loader').hide(); // Sembunyikan loader
              }
          });
      }
  }

  // Memuat data tambahan saat pengguna mencapai bagian bawah halaman
  $(window).scroll(function() {
      if (isBottom()) {
          loadMoreData();
      }
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
      var ctx = document.getElementById('visitors-chart').getContext('2d');
      
      // Periksa apakah variabel $labels, $suratMasuk, dan $suratKeluar didefinisikan
      @if(isset($labels) && isset($suratMasuk) && isset($suratKeluar))
          // Temukan nilai tertinggi dari kedua data surat masuk dan surat keluar
          var maxValue = Math.max(...{!! json_encode(array_merge($suratMasuk, $suratKeluar)) !!});

          // Tambahkan beberapa ruang kosong di atas nilai tertinggi
          var maxY = Math.ceil(maxValue * 1.1); // Menggunakan faktor 1.1 untuk menambah ruang kosong 10%

          var myChart = new Chart(ctx, {
              type: 'line',
              data: {
                  labels: {!! json_encode($labels) !!}, // Label untuk sumbu X (tanggal)
                  datasets: [{
                      label: 'Surat Masuk',
                      data: {!! json_encode($suratMasuk) !!}, // Data jumlah surat masuk dalam 7 hari
                      borderColor: 'blue',
                      borderWidth: 2,
                      fill: false
                  }, {
                      label: 'Surat Keluar',
                      data: {!! json_encode($suratKeluar) !!}, // Data jumlah surat keluar dalam 7 hari
                      borderColor: 'yellow',
                      borderWidth: 2,
                      fill: false
                  }]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true,
                              max: maxY // Atur nilai maksimum untuk sumbu Y (yAxis)
                          }
                      }]
                  }
              }
          });
      @endif
  });
</script>


<script>
  document.addEventListener("DOMContentLoaded", function () {
      var ctx = document.getElementById('sales-chart').getContext('2d');
      
      // Periksa apakah variabel $suratMasukPerBulan dan $suratKeluarPerBulan didefinisikan
      @if(isset($suratMasukPerBulan) || isset($suratKeluarPerBulan))
          // Gabungkan data surat masuk dan surat keluar jika keduanya didefinisikan
          var allData = [];
          @if(isset($suratMasukPerBulan))
              allData.push(...{!! json_encode($suratMasukPerBulan) !!});
          @endif
          @if(isset($suratKeluarPerBulan))
              allData.push(...{!! json_encode($suratKeluarPerBulan) !!});
          @endif

          // Temukan nilai tertinggi dari kedua data surat masuk dan surat keluar
          var maxValue = Math.max(...allData);

          // Tambahkan beberapa ruang kosong di atas nilai tertinggi
          var maxY = Math.ceil(maxValue * 1.1); // Menggunakan faktor 1.1 untuk menambah ruang kosong 10%

          var myChart = new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'],
                  datasets: [
                      @if(isset($suratMasukPerBulan))
                          {
                              label: 'Surat Masuk',
                              data: {!! json_encode($suratMasukPerBulan) !!},
                              backgroundColor: 'rgba(75, 192, 192, 0.2)', // Warna hijau untuk surat masuk
                              borderColor: 'rgba(75, 192, 192, 1)',
                              borderWidth: 1
                          },
                      @endif
                      @if(isset($suratKeluarPerBulan))
                          {
                              label: 'Surat Keluar',
                              data: {!! json_encode($suratKeluarPerBulan) !!},
                              backgroundColor: 'rgba(255, 206, 86, 0.2)', // Warna kuning untuk surat keluar
                              borderColor: 'rgba(255, 206, 86, 1)',
                              borderWidth: 1
                          }
                      @endif
                  ]
              },
              options: {
                  scales: {
                      yAxes: [{
                          ticks: {
                              beginAtZero: true,
                              max: maxY // Atur nilai maksimum untuk sumbu Y (yAxis)
                          }
                      }]
                  }
              }
          });
      @endif
  });
</script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": false,
      "paging": true, 
      "buttons": ["copy", "csv", "excel", "pdf", "print"],
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"], // yg sebelumnya
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
  function previewImage(inputId) {
    const input = document.querySelector(`#${inputId}`);
    const imgPreview = document.querySelector('.img-preview');
    imgPreview.style.display = 'block';
    const oFReader = new FileReader();
    oFReader.readAsDataURL(input.files[0]);
    oFReader.onload = function (oFREvent) {
      imgPreview.src = oFREvent.target.result;
    }
  }
  function previewFile(inputId) {
      const fileInput = document.getElementById(inputId);
      const file = fileInput.files[0];

      // Periksa apakah file yang dipilih adalah PDF
      if (file.type === 'application/pdf') {
          const reader = new FileReader();

          reader.onload = function (e) {
              const preview = document.getElementById('filePreview');
              preview.innerHTML = `<embed src="${e.target.result}" type="application/pdf" width="100%" height="600px">`;
          }

          reader.readAsDataURL(file);
      } else {
          // Jika file bukan PDF, tampilkan pesan kesalahan
          const preview = document.getElementById('filePreview');
          preview.innerHTML = '<p class="text-danger">File harus berupa PDF.</p>';
      }
  }
</script>
@if(Session::has('message'))
<script>
    toastr.options = {
      "progressBar" : true,
      "closeButton" : true
    }
    toastr.success('{{ Session::get('message') }}','Success!',{timeOut:5000});
</script>
@endif
@if ($messages = Session::get('info'))
  <script>
    toastr.options = {
      "progressBar": true,
      "closeButton": true
    }
    toastr.info('{{ $messages }}', 'Information', { timeOut: 5000 });
  </script>
@endif
@if ($errors->any())
  <script>
    toastr.options = {
      "progressBar": true,
      "closeButton": true
    }
    @foreach ($errors->all() as $error)
      toastr.error('{{ $error }}', 'Failed!', { timeOut: 5000 });
    @endforeach
  </script>
@endif
</body>
</html>

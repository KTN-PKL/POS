<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>POS RESTO</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('template') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('template') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('template') }}/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="{{ asset('template') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('template') }}/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ asset('template') }}/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="{{ asset('template') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('template') }}/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('template') }}/assets/css/style.css" rel="stylesheet">
  
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/fontawesome-free/css/all.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Bootstrap4 Duallistbox -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
  <!-- BS Stepper -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/bs-stepper/css/bs-stepper.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <!-- dropzonejs -->
  <link rel="stylesheet" href="{{ asset('template2') }}/plugins/dropzone/min/dropzone.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('template2') }}/dist/css/adminlte.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  

  <!-- =======================================================
  * Template Name: FlexStart - v1.11.1
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  {{-- <style type="text/css">
    .lihat{
        color: #0c4e68
    }
    #warna{
        background-color: #00530a;
    }
</style> --}}
</head>

<body>
  <!-- ======= Header ======= -->
  <header style="background-color: white;height:90px;width:100%" id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
    

      <a href="index.html" style="text-decoration: none" class="logo d-flex align-items-center">
        <span>POS RESTO</span>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          @if (Auth::user()->level == 2)
          <li><a class="nav-link" href="{{url('/dashboard')}}">HOME</a></li>
          @endif
          
          <li class="dropdown"><a style="text-decoration: none" href="#"><span>DATA MASTER</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a style="text-decoration: none" href="{{url('item')}}">Item <i class="fa fa-cubes"></i> </a></li>
              <li><a style="text-decoration: none"  href="{{url('kategori')}}">Kategori <i class="fa fa-tag"></i></a></li>
              <li><a style="text-decoration: none"  href="{{url('customer')}}">Customer<i class="fa fa-users"></i></a></li> 
              @if (Auth::user()->level == 2)
              <li><a style="text-decoration: none"  href="{{url('pengguna')}}">Pengguna<i class="fa fa-user"></i></a></li>
              @endif
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="/stok">STOK</a></li>
          <li><a class="nav-link scrollto" href="/kasir">KASIR</a></li>
          <li class="dropdown"><a style="text-decoration: none"  href="#"><span>ORDER</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a style="text-decoration: none"  href="/order1">All Order <i class="badge badge primary float-right"></i> </a></li>
              <li><a style="text-decoration: none"  href="/order3">Ditempat</a></li>
              <li><a style="text-decoration: none"  href="/order2">Booking</a></li>
              <li><a style="text-decoration: none"  href="/order4">Delivery</a></li>
              <li><a style="text-decoration: none"  href="/order5">Blm Lunas</a></li>
            </ul>
          </li>
          @if (Auth::user()->level == 2)
          <li class="dropdown"><a style="text-decoration: none"  href="#"><span>AKUNTANSI</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a style="text-decoration: none"  href="/akuntansi">Akun</a></li>
              <li><a style="text-decoration: none"  href="/keuangan">Aktivitas Keuangan Lainnya</a></li>
            </ul>
          </li>
          <li class="dropdown"><a style="text-decoration: none"  href="#"><span>LAPORAN</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a  style="text-decoration: none" href="/laporan">Transaksi Penjualan</a></li>
              <li><a  style="text-decoration: none" href="{{url('cashflow')}}">Cash Flow</a></li>
            </ul>
          </li>
          @endif
         
         
          <li  class="dropdown"><a style="text-decoration: none"  href="#"><span id="namacok" >{{auth()->user()->name}}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              @if (Auth::user()->level == 2)
              <li><a style="text-decoration: none"  href="/toko">Pengaturan Toko <i class="fa fa-cog" aria-hidden="true"></i></a></li>
              @endif
              <li><a style="text-decoration: none"  href="{{url('profil')}}">Profil <i class="fa fa-edit"></i></a></li>
              <li><a style="text-decoration: none"  href="{{route('user.logout')}}">Keluar <i class="fa fa-sign-out-alt" aria-label="true"></i> </a></li>
            </ul>
          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  
<body style="background-color: rgb(238, 237, 237)">
<br>
<br>
<br>
@yield('content')
</body>
<footer id="footer" class="footer">
  
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  

 



<script>src="https://code.jquery.com/jquery-3.5.1.js"</script>
<script>src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"</script>
<script>src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"</script>
<!-- jQuery -->
<script src="{{ asset('template2') }}/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template2') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="{{ asset('template2') }}/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('template2') }}/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="{{ asset('template2') }}/plugins/moment/moment.min.js"></script>
<script src="{{ asset('template2') }}/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="{{ asset('template2') }}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('template2') }}/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('template2') }}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- BS-Stepper -->
<script src="{{ asset('template2') }}/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="{{ asset('template2') }}/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template2') }}/dist/js/adminlte.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
@stack('scripts')

 

</body>
</body>

</html>
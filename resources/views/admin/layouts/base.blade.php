<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VehiClick-Administrator</title>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link href="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <style>
    .custom-sidebar {
        background: linear-gradient(to bottom, #000000, #2c2c2c) !important; /* Gradasi hitam */
        color: white !important; /* Biar teks tetap terbaca */
    }
    .custom-sidebar .nav-link {
        color: white !important;
    }
    .custom-sidebar .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1); /* Hover efek */
        color: #ff7e00; /* Oranye terang saat hover */
    }
    .navbar-search .input-group-prepend,
    .btn-primary {
        background: linear-gradient(to bottom, #000000, #2c2c2c) !important; /* Gradasi hitam */
        border: none !important;
        color: white !important;
    }
    .btn-primary:hover {
        background: linear-gradient(to right, #2c2c2c, #000000) !important; /* Balik arah gradasi pas hover */
        color: #ff7e00 !important;
    }
    .form-control {
        background-color: white !important;
        color: black !important;
    }
    /* Scroll-to-top button */
    .scroll-to-top {
        background: linear-gradient(to right, #0d1b2a, #1b263b) !important;
        border: none;
    }
    .scroll-to-top:hover {
        background: linear-gradient(to right, #1b263b, #0d1b2a) !important;
    }
    /* Modal button */
    .modal-footer .btn-primary {
        background: linear-gradient(to right, #0d1b2a, #1b263b) !important;
        border: none;
    }

    .text-black-custom {
    color: #000 !important;
    }


    .navbar {
    background: linear-gradient(to bottom, #ff7e00, #ffb347) !important; /* Gradasi oranye */
    color: white !important;
    }


</style>
</head>
<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav custom-sidebar sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon">
                    <img src="/images/logo.png" alt="Logo" style="width: 40px; height: 40px;">
                </div>
                <div class="sidebar-brand-text mx-3">VehiClick</div>
            </a>
            <!-- Divider -->
            @include('admin.components.sidebar')
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
            @include('admin.components.navbar') 
            <!-- Begin Page Content -->
            <div class="container-fluid">
                    @yield('content')
            </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            @include('admin.components.footer')    
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Keluar" di bawah jika Anda siap untuk mengakhiri sesi Anda saat ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="logout.php">Keluar</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <!-- Page level plugins -->
    <script src="{{ asset('assets/vendor/chart.js/Chart.min.js') }}"></script>
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>
    <!-- DataTables plugins -->
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- DataTables custom scripts -->
    <script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>
</body>
</html>
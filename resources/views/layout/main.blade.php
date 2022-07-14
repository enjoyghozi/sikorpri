
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIKORPRI | @yield('title')</title>
    <link rel = "icon" href = "{{ asset('img/logo-2.png') }}" type = "image/x-icon">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('style/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/948c2a9c8d.js" crossorigin="anonymous"></script>


    <!-- Custom styles for this template -->
    <link href="{{ asset('style/css/sb-admin-2.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

   

    <!-- Custom styles for this page -->
    <link href="{{ asset('style/vendor/datatables/dataTables.bootstrap4.min.css') }} " rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-between" href="/">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/logo-korpri.png')}}" style='height: 50%; width: 50%; object-fit: contain'></img>
                </div>
                    <div class="sidebar-brand-text text-shadow mx-3">SIKORPRI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item @yield('dashboard')">
                <a class="nav-link" href="/">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

                <li class="nav-item @yield('unit')">
                    <a class="nav-link collapsed" href="/unit" data-target="#collapseTwo"><i class="fa fa-list-alt mr-1"></i>
                        <span>Daftar Unit</span>
                    </a>
                </li>

            
                <li class="nav-item @yield('anggota')">
                    <a class="nav-link" href="/anggota"><i class="fa fa-address-card mr-1"></i>
                        <span>Daftar Anggota</span>
                    </a>
                </li>
                @if (auth()->user()->level == "admin")
                <li class="nav-item @yield('admin')">
                    <a class="nav-link" href="/admin"><i class="fa fa-users"></i>
                        <span>Daftar Admin</span>
                    </a>
                </li>
                @endif

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Keuangan
            </div>

            <!-- Nav Item - Pembayaran -->
            <li class="nav-item @yield('pembayaran')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pembayaran"
                    aria-expanded="true" aria-controls="pembayaran">
                    <i class="fa fa-credit-card"></i>
                    <span>Pembayaran</span>
                </a>
                <div id="pembayaran" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilih Pembayaran:</h6>
                        <a class="collapse-item" href="/pembayaran">Iuran Wajib</a>
                        <a class="collapse-item" href="/create-taliasih">Iuran Tali Asih <br> & Uang Duka</a>
                    </div>
                </div>
            </li>

            @if (auth()->user()->level == "admin")
                
            <li class="nav-item @yield('transaksi')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#transaksi"
                    aria-expanded="true" aria-controls="transaksi">
                    <i class="fa fa-credit-card"></i>
                    <span>Transaksi</span>
                </a>
                <div id="transaksi" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pilih transaksi:</h6>
                        <a class="collapse-item" href="/transaksi">Iuran Wajib</a>
                        <a class="collapse-item" href="/taliasih">Iuran Tali Asih <br> & Uang Duka</a>
                    </div>
                </div>
            </li>
            @endif
            @if (auth()->user()->level == "unit")

                <li class="nav-item @yield('riwayat')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#riwayat"
                    aria-expanded="true" aria-controls="riwayat">
                    <i class="fa fa-list-alt"></i>
                    <span>Riwayat</span>
                </a>
                <div id="riwayat" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Riwayat Transaksi:</h6>
                        <a class="collapse-item" href="/riwayat-iuranwajib">Iuran Wajib</a>
                        <a class="collapse-item" href="/riwayat-taliasih">Iuran Tali Asih <br> & Uang Duka</a>
                    </div>
                </div>
            </li>
            @endif

            @if (auth()->user()->level == "admin")
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Heading -->
            <div class="sidebar-heading">
                AddOns
            </div>

            <li class="nav-item @yield('Pensiun / Purna Tugas')">
                <a class="nav-link" href="/purnatugas"><i class="fa fa-address-card mr-1"></i>
                    <span>Pensiun / Purna Tugas</span>
                </a>
            </li>
            @endif
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">
                Utility
            </div>
            <li class="nav-item @yield('pengaturan')">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pengaturan"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-credit-card"></i>
                    <span>Pengaturan</span>
                </a>
                <div id="pengaturan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Pengaturan</h6>
                        <a class="collapse-item" href="/akun">Akun</a>
                        <a class="collapse-item" href="#" data-toggle="modal" data-target="#logoutModal">LogOut</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Title -->
                    <form class="title text-primary ml-5">
                        <h4 style="font-weight: bold;">Sistem Informasi KORPRI</h4>
                    </form>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('style/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/akun">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('container')
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Korpri 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

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
                    <h5 class="modal-title" id="exampleModalLabel">Apakah anda ingin Logout?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" jika anda ingin meninggalkan halaman!</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>





























    <!-- Bootstrap core JavaScript-->
    
    <script src="{{ asset('style/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('style/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('style/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('style/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('style/js/demo/chart-pie-demo.js') }}"></script>


    <!-- Core plugin JavaScript-->
    <script src="{{ asset('style/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{ asset('style/js/sb-admin-2.js')}}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>


</body>

</html>
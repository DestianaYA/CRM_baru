@extends('layouts.app')
<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BLASTMU</title>
    <!-- Custom fontsawesome-->
    <script src="{{ asset('https://kit.fontawesome.com/146baf5ed7.js') }}" crossorigin="anonymous"></script>
    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/css/style.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                <img class="col-lg-10 d-lg-block " src="{{ asset('assets/img/Logo-mono.png') }}" alt="" style="" />
                <div class="logo sidebar-brand-text">BLASTMU</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item inactive">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item inactive">
                <a class="nav-link" href="{{ route('DataUser') }}">
                    <i class="fas fa-fw fa-database"></i>
                    <span>Create User</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-sack-dollar"></i>
                    <span>Komisi</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.komisi.kategori.index') }}">Kategori</a>
                        <a class="collapse-item" href="{{ route('komisi.harga.create') }}">Harga</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item inactive">
                <a class="nav-link" href="{{ route('kontent') }}">
                    <i class="fas fa-fw fa-bell"></i>
                    <span>Kontent</span></a>
            </li>
            <!-- Nav Item - Charts -->
            <!-- Nav Item - Tables -->

            <!-- Divider -->
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <h1 class="h3 mb-0 text-gray-800">USERS</h1>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Counter - Messages -->
                            </a>
                            <!-- Dropdown - Messages -->
                            <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 medium">{{ Auth::user()->name }}
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('images/' . Auth::user()->profile_image) }}" alt="Profile Image">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="dropdown-item">
                                    @csrf
                                    <button type="submit"
                                        style="background: none; border: none; padding: 0; cursor: pointer;">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-black-400"></i>
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="searchButton">
                        <div class="input-group-append">
                            <button class="btn btn-form" type="button" id="searchButton">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                    <!-- Page Heading -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <!-- Page Heading -->
                        <!-- DataTales Example -->
                            <div class="card-header py-3">
                            </div>
                            @section('content')
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">User List</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Phone Number</th>
                                                    <th>Role</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->phone_number }}</td>
                                                        <td>{{ $user->role }}</td>
                                                        <td>{{ $user->address }}</td>
                                                        <td>
                                                            <a href="{{ route('admin.edit', $user->id) }}"
                                                                class="btn btn-info">Detail</a>
                                                            <form action="{{ route('admin.destroy', $user->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure you want to delete this user?');">Delete</button>
                                                            </form>
                                                        </td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endsection
                        <!-- /.container-fluid -->

                    </div>
                    <!-- End of Main Content -->


                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->

            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Bootstrap core JavaScript -->
            <script src="{{ asset('assets/jquery/jquery.min.js') }}"></script>
            <script src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

            <!-- Core plugin JavaScript -->
            <script src="{{ asset('assets/jquery-easing/jquery.easing.min.js') }}"></script>

            <!-- Custom scripts for all pages -->
            <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

            <!-- Page level plugins -->
            <script src="{{ asset('assets/chart.js/Chart.min.js') }}"></script>

            <!-- table list -->
            <script src="{{ asset('assets/js/datatables.js') }}"></script>
            <script src="{{ asset('assets/js/datatables.min.js') }}"></script>

            <!-- Page level custom scripts -->
            <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
            <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>

</body>

</html>
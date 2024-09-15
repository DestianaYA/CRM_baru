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
    <link href="{{ asset( 'assets/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset( 'assets/https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i') }}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset( 'assets/css/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset( 'assets/css/css/style.css') }}" rel="stylesheet">

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
                <a class="nav-link" href="{{ route('agent.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
            <li class="nav-item inactive">
                <a class="nav-link" href="{{ route('agent.pesan') }}">
                    <i class="fas fa-fw fa-message"></i>
                    <span class="badge badge-danger badge-counter">3+</span>
                    <span>Pesan</span></a>
            </li>
            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item inactive">
                <a class="nav-link" href="{{ route('agent.form.create') }}">
                    <i class="fas fa-fw fa-rectangle-list"></i>
                    <span>form</span></a>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Broadcast</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                            <a class="collapse-item" href="{{ route('agent.broadcast.realtime') }}">Realtime</a>
                            <a class="collapse-item" href="{{ route('agent.broadcast.terjadwal') }}">Terjadwal</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money-bill-transfer"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('agent.orders') }}">Order</a>
                        <a class="collapse-item" href="{{ route('agent.topup') }}">TopUp</a>
                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-solid fa-solid fa-handshake"></i>
                    <span>Mitra</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('agent.mitra.index') }}">Client</a>
                        <a class="collapse-item" href="{{ route('agent.mitra.order') }}">Client Order</a>
                    </div>
                </div>
            </li>
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
					<h1 class="h3 mb-0 text-gray-800">BROADCAST REALTIME</h1>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-wallet fa-1x"></i>
                                <!-- Counter - Messages -->
                                <span class="mx-2 d-lg-inline text-gray-800 display-8"> Rp {{ $balanceAmount }}</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header justify-content-center">
                                    Top Up
                                </h6>
                                    <body>
                                        @if(session('success'))
                                            <div style="color: green;">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('topups.store') }}" method="POST">
                                            @csrf
                                            <div>
                                                <p>
                                                </p>
                                                <label for="amount"margin-left="30px" >Jumlah:</label>
                                                <input type="text" id="amount" name="amount" value="{{ old('amount') }}"style="width:250px;">
                                                @error('amount')
                                                    <div style="color: red;">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <p>
                                            </p>
                                            <button type="submit"class="btn btn-topup justify-content-center">Top Up</button>
                                        </form>
                                    </body>
                            <!-- Dropdown - Messages -->
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-3 d-none d-lg-inline text-gray-600 large">{{ Auth::user()->name }}</span>
                                <img class="img-profile rounded-circle"
                                src="{{ asset('images/' . Auth::user()->profile_image) }}" alt="Profile Image">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ '/update' }}">
                                    <i class="fa-brands fa-whatsapp-square fa-sm fa-fw mr-2 text-black-400"></i>
                                    Connect
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-black-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="dropdown-item">
                                    @csrf
                                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
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
                <div class="container-fluid">
                     <body>
                        <div class="container mt-5">
                            <div class="row">
                                <div class="col-md-6 offset-md-3">
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="card">
                                        <div class="card-body">
                                            <form action="{{ route('form.store') }}" method="POST">
                                                @csrf
                                                <script>
                                                    function showOtherInput() {
                                                        var format = document.getElementById('format').value;
                                                        var otherFormatInput = document.getElementById('otherFormatInput');
                                                        if (format === 'other') {
                                                            otherFormatInput.style.display = 'block';
                                                        } else {
                                                            otherFormatInput.style.display = 'none';
                                                        }
                                                    }
                                                </script>
                                                <form action="your_server_endpoint" method="post" enctype="multipart/form-data">
                                                    <div>
                                                        <label for="name">Nama pesan</label><br>
                                                        <input type="text" id="name" name="name" required><br><br>
                                                        
                                                        <div id="message" style="display:none;">
                                                        <label for="message">Message:</label><br>
                                                        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>
                                                        
                                                    </div>
                                                    <label for="fileFormat">Impor Kontak:</label><br>
                                                        <select id="format" name="format" onchange="updateFileUploadAccept()">
                                                            <option value="csv">CSV</option>
                                                            <option value="xls">XLS</option>
                                                            <option value="xlsx">XLSX</option>
                                                            <option value="txt">TXT</option>
                                                            <option value="other">other</option>
                                                        </select><br><br>

                                                        <div id="otherFormatInput" style="display:none;">
                                                            <label for="otherFormat">Other Format:</label><br>
                                                            <textarea name="otherFormat" id="otherFormat" cols="30" rows="10"></textarea>
                                                        </div>

                                                        <label for="fileUpload">Upload File:</label><br>
                                                        <input type="file" id="fileUpload" name="fileUpload" required><br><br>
                                                        <div>
                                                            <label for="time">Jam:</label>
                                                            <input type="time" id="time" name="time"><br><br>
                                                            <label for="date">Tanggal:</label>
                                                            <input type="date" id="date" name="date"><br><br>
                                                        </div>
                                                    <input type="submit" class="btn btn-form"value="Submit">
                                                </form>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </body>
                    <!-- Page Heading -->
                    <!-- Content Row -->
                    <div class="row">

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <!-- Color System -->
                            <!-- Illustrations -->
                        </div>
                    </div>

                </div>
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
    <script src="{{ asset('assets/js/format.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('assets/chart.js/Chart.min.js') }}"></script>
     
    <!-- Page level custom scripts -->
    <script src="{{ asset('assets/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('assets/js/demo/chart-pie-demo.js') }}"></script>


</body>

</html>
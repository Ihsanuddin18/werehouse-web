<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Logistik Masuk &rsaquo; Tambah Logistik Masuk &mdash; Werehouse BPBD | Kabupaten Jember</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/select2/dist/css/select2.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/style.css">
    <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/components.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>


    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                                    class="fas fa-search"></i></a></li>
                    </ul>
                    <div class="search-element">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search"
                            data-width="250">
                        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                    <div id="clock" style="color: white; margin-left: 15px;"></div>
                </form>
                <script>
                    function updateClock() {
                        var now = new Date();

                        var hours = now.getHours();
                        var minutes = now.getMinutes();
                        var seconds = now.getSeconds();
                        var wib = 'WIB';

                        var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
                        var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                        var dayName = days[now.getDay()];
                        var day = now.getDate();
                        var monthName = months[now.getMonth()];
                        var year = now.getFullYear();

                        hours = (hours < 10) ? "0" + hours : hours;
                        minutes = (minutes < 10) ? "0" + minutes : minutes;
                        seconds = (seconds < 10) ? "0" + seconds : seconds;
                        day = (day < 10) ? "0" + day : day;

                        var clockElement = document.getElementById('clock');
                        clockElement.innerHTML = dayName + ", " + day + " " + monthName + " " + year + "<br>" +
                            hours + " : " + minutes + " : " + seconds + "  " + wib;

                        setTimeout(updateClock, 1000);
                    }

                    updateClock();
                </script>
                <ul class="navbar-nav navbar-right">
                    </li>
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logobpbd1.png"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-title">
                                @if(Auth::user()->last_login_at)
                                                                @php
                                                                    $diffInMinutes = Carbon\Carbon::now()->diffInMinutes(Auth::user()->last_login_at);
                                                                    $diffInSeconds = Carbon\Carbon::now()->diffInSeconds(Auth::user()->last_login_at);
                                                                    $hours = floor($diffInMinutes / 60);
                                                                    $remainingMinutes = $diffInMinutes % 60;
                                                                @endphp
                                                                @if($diffInMinutes > 60)
                                                                    Login {{ $hours }} jam {{ $remainingMinutes }} menit yang lalu
                                                                @elseif($diffInMinutes > 1)
                                                                    Login {{ $diffInMinutes }} menit yang lalu
                                                                @elseif($diffInSeconds > 0)
                                                                    Login {{ $diffInSeconds }} detik yang lalu
                                                                @else
                                                                    Baru Login
                                                                @endif
                                @else
                                    Baru Login
                                @endif
                            </div>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item has-icon">
                                <i class="far fa-user"></i> Profil
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item has-icon text-danger" style="cursor: pointer;">
                                    <i class="fas fa-door-open" style="display: block; margin-top: 8px;">
                                    </i>Keluar</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logobpbd1.png"
                            style="width: 143px; height: auto; margin-top: 20px;">
                        <a href="{{ route('home') }}"> Werehouse BPBD </a>
                        <hr
                            style="margin-top: 3px; margin-bottom: 3px; border: none; border-bottom: 0.1px solid #C1C1C1; width: 80%;">
                        <p><br></p>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.html">WB</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li>
                            <a href="{{ route('home') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
                        </li>
                        <li class="menu-header">Master</li>
                        <li class="dropdown">
                            <a href="{{ route('logistics') }}"><i class="fas fa-database"></i> <span>Data
                                    Logistik</span></a>
                        </li>
                        <li class="dropdown">
                            <a href="{{ route('suppliers') }}"><i class="fas fa-table"></i> <span>Data
                                    Supplier</span></a>
                        </li>
                        <li class="menu-header">Aktivitas</li>
                        <li class=active>
                            <a href="{{ route('inlogistics')}}" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                                <span>Logistik Masuk</span></a>
                        </li>
                        <li>
                            <a href="{{ route('outlogistics')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i>
                                <span>Logistik Keluar</span></a>
                        </li>
                        <li class="menu-header">Pengaturan</li>
                        <li>
                            <a href="{{ route('profile.edit')}}" class="nav-link"><i class="fas fa-user"></i>
                                <span>Profil</span></a>
                        </li>
                        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="btn btn-primary btn-lg btn-block btn-icon-split" type="submit">
                                    <i class="fas fa-door-open"></i> Keluar
                                </button>
                            </form>
                        </div>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-header">
                        <h1>Detail Logistik Masuk</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="{{ route('home') }}">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="{{ route('inlogistics') }}">Logistik Masuk</a>
                            </div>
                            <div class="breadcrumb-item">Detail Logistik Masuk</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('inlogistics.store') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="tanggal_masuk">Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tanggal_masuk"
                                            placeholder="*Tanggal Masuk"
                                            value="{{ $inlogistic->tanggal_masuk }}" disabled readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Data Supplier</h4>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="nama_supplier">Nama Supplier</label>
                                        <input type="text" class="form-control" name="nama_supplier" id="nama_supplier"
                                            value="{{ $inlogistic->supplier->nama_supplier }}" readonly disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="kode_supplier">Kode Supplier</label>
                                        <input type="text" class="form-control" name="kode_supplier" id="kode_supplier"
                                            value="{{ $inlogistic->supplier->kode_supplier }}" disabled readonly>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label for="instansi_supplier">Instansi Supplier</label>
                                        <input type="text" class="form-control" name="instansi_supplier"
                                            id="instansi_supplier" 
                                            value="{{ $inlogistic->supplier->instansi_supplier }}" disabled readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email_supplier">Email Supplier</label>
                                        <input type="text" class="form-control" name="email_supplier"
                                            id="email_supplier" 
                                            value="{{ $inlogistic->supplier->email_supplier }}" disabled readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="telepon_supplier">Telepon Supplier</label>
                                        <input type="text" class="form-control" name="telepon_supplier"
                                            id="telepon_supplier" 
                                            value="{{ $inlogistic->supplier->telepon_supplier }}" disabled readonly>
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Data Logistik</h4>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="nama_logistik">Nama Logistik</label>
                                        <input type="text" class="form-control" name="nama_logistik" id="nama_logistik"
                                            value="{{ $inlogistic->logistic->nama_logistik }}" readonly disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="kode_logistik">Kode Logistik</label>
                                        <input type="text" class="form-control" name="kode_logistik" id="kode_logistik"
                                            value="{{ $inlogistic->logistic->kode_logistik }}" readonly disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="satuan_logistik">Satuan Logistik</label>
                                        <input type="text" class="form-control" name="satuan_logistik" id="satuan_logistik"
                                            value="{{ $inlogistic->logistic->satuan_logistik }}" readonly disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jumlah_logistik_masuk">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah_logistik_masuk"
                                            placeholder="*Masukkan Jumlah"
                                            value="{{ $inlogistic->jumlah_logistik_masuk }}" readonly disabled>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="expayer_logistik">Tanggal Kadaluarsa</label>
                                        <input type="date" class="form-control" name="expayer_logistik"
                                            value="{{ $inlogistic->expayer_logistik }}" readonly disabled>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keterangan_masuk">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan_masuk"
                                            placeholder="*Masukkan Keterangan"
                                            value="{{ $inlogistic->keterangan_masuk }}" readonly disabled>
                                    </div>
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label class="form-label">Ditambahkan Pada</label>
                                            <input type="text" name="created_at" class="form-control" placeholder="Created At"
                                            value="{{ $inlogistic->created_at }}" disabled readonly>
                                        </div>
                                        <div class="col mb-3">
                                            <label class="form-label">Diperbarui Pada</label>
                                            <input type="text" name="updated_at" class="form-control" placeholder="Updated At"
                                            value="{{ $inlogistic->updated_at }}" disabled readonly>
                                        </div>
                                        <div class=" col-md-6">
                                        <label for="keterangan_masuk">Dokumentasi</label>
                                        <input type="text" class="form-control" name="keterangan_masuk" readonly disabled>
                                        <img src="{{ asset($inlogistic->dokumentasi_masuk) }}" width='50' height='50' class="img img-responsive"/>
                                    </div>
                                    </div>
                                </div>
                                <script>
                                        document.addEventListener('DOMContentLoaded', function () {
                                            const logisticSelect = document.getElementById('id_logistik');
                                            const kodeLogistikInput = document.getElementById('kode_logistik');
                                            const satuanLogistikInput = document.getElementById('satuan_logistik');
                                            const supplierSelect = document.getElementById('id_supplier');
                                            const kodeSupplierInput = document.getElementById('kode_supplier');
                                            const instansiSupplierInput = document.getElementById('instansi_supplier');
                                            const emailSupplierInput = document.getElementById('email_supplier');
                                            const teleponSupplierInput = document.getElementById('telepon_supplier');
                                            function updateLogisticDetails() {
                                                const selectedOption = logisticSelect.options[logisticSelect.selectedIndex];
                                                const kodeLogistik = selectedOption.getAttribute('data-kode');
                                                const satuanLogistik = selectedOption.getAttribute('data-satuan');
                                                kodeLogistikInput.value = kodeLogistik;
                                                satuanLogistikInput.value = satuanLogistik;
                                            }
                                            function updateSupplierDetails() {
                                                const selectedOption = supplierSelect.options[supplierSelect.selectedIndex];
                                                const kodeSupplier = selectedOption.getAttribute('data-kode');
                                                const instansiSupplier = selectedOption.getAttribute('data-instansi');
                                                const emailSupplier = selectedOption.getAttribute('data-email');
                                                const teleponSupplier = selectedOption.getAttribute('data-telepon');
                                                kodeSupplierInput.value = kodeSupplier;
                                                instansiSupplierInput.value = instansiSupplier;
                                                emailSupplierInput.value = emailSupplier;
                                                teleponSupplierInput.value = teleponSupplier;
                                            }
                                            logisticSelect.addEventListener('change', updateLogisticDetails);
                                            supplierSelect.addEventListener('change', updateSupplierDetails);
                                            logisticSelect.dispatchEvent(new Event('change'));
                                            supplierSelect.dispatchEvent(new Event('change'));
                                        });
                                    </script>
                                <div class="row">
                                    <div class="d-grid">
                                        <a href="{{ route('inlogistics') }}" class="btn btn-primary">
                                            <i class="fas fa-arrow-left me-1"></i> Kembali
                                        </a>
                                    </div>
                                </div>
                            </form> 
                        </div>
                    </div>
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Werehouse BPBD<div class="bullet"></div> Kabupaten Jember
                </div>
                <div class="footer-right">
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('tdashboard') }}/assets/modules/jquery.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/popper.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/tooltip.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/modules/moment.min.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="{{ asset('tdashboard') }}/assets/js/scripts.js"></script>
    <script src="{{ asset('tdashboard') }}/assets/js/custom.js"></script>
</body>

</html>
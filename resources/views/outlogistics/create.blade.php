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
                        <li>
                            <a href="{{ route('inlogistics')}}" class="nav-link"><i class="fas fa-sign-in-alt"></i>
                                <span>Logistik Masuk</span></a>
                        </li>
                        <li class=active>
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
                        <h1>Tambah Logistik Keluar</h1>
                        <div class="section-header-breadcrumb">
                            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                            <div class="breadcrumb-item active"><a href="#">Logistik Keluar</a></div>
                            <div class="breadcrumb-item">Tambah Logistik Keluar</div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form id="logisticForm">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="tanggal_keluar">Tanggal Keluar Logistik</label>
                                        <input type="date" class="form-control" name="tanggal_keluar"
                                            id="tanggal_keluar" placeholder="*Tanggal Keluar">
                                    </div>
                                    <div class="col-md-12">
                                        <h4>Data Penerima</h4>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nama_penerima">Nama Penerima</label>
                                        <input type="text" class="form-control" name="nama_penerima" id="nama_penerima"
                                            placeholder="*Nama Penerima">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="nik_kk_penerima">NIK / KK</label>
                                        <input type="text" class="form-control" name="nik_kk_penerima"
                                            id="nik_kk_penerima" placeholder="*Nik/Kk">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="alamat_penerima">Alamat Penerima</label>
                                        <input type="text" class="form-control" name="alamat_penerima"
                                            id="alamat_penerima" placeholder="*Alamat Penerima">
                                    </div>
                                    <div class="col-md-12">
                                        <h4 style="color: blue;">Data Logistik</h4>
                                    </div>
                                    @if(isset($logistics))
                                        <div class="form-group col-md-12">
                                            <label for="id_logistik">Nama Logistik</label>
                                            <select class="form-control" name="id_logistik" id="id_logistik" required>
                                                <option value="" selected disabled>*Pilih Nama Logistik</option>
                                                @foreach($logistics as $logistic)
                                                    <option value="{{ $logistic->id }}"
                                                        data-kode="{{ $logistic->kode_logistik }}"
                                                        data-satuan="{{ $logistic->satuan_logistik }}">
                                                        {{ $logistic->nama_logistik }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <div class="form-group col-md-3">
                                        <label for="kode_logistik">Kode Logistik</label>
                                        <input type="text" class="form-control" name="kode_logistik" id="kode_logistik"
                                            disabled readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="jumlah_logistik_keluar">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah_logistik_keluar"
                                            id="jumlah_logistik_keluar" placeholder="*Masukkan Jumlah">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="satuan_logistik">Satuan Logistik</label>
                                        <input type="text" class="form-control" name="satuan_logistik"
                                            id="satuan_logistik" disabled readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="keterangan_keluar">Keterangan</label>
                                        <input type="text" class="form-control" name="keterangan_keluar"
                                            id="keterangan_keluar" placeholder="*Masukkan Keterangan">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="dokumentasi_keluar">Dokumentasi Keluar</label>
                                        <input type="file" class="form-control" name="dokumentasi_keluar"
                                            id="dokumentasi_keluar" placeholder="*Masukkan Keterangan">
                                    </div>
                                    <button type="button" id="addLogistic" class="btn btn-primary">Tambahkan ke
                                        Tabel</button>
                                </div>
                            </form>
                            <div class="mt-4">
                                <h3>Detail Logistik Keluar</h3>
                                <table class="table table-striped" id="logisticTable">
                                    <thead class="table-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Logistik</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Nama Penerima</th>
                                            <th>NIK / KK</th>
                                            <th>Alamat Penerima</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Dokumentasi</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Rows will be added dynamically here -->
                                    </tbody>
                                </table>
                                <button type="button" id="saveLogistics" class="btn btn-success"
                                    style="display: none;">Tambah Logistik Keluar</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const logisticSelect = document.getElementById('id_logistik');
                    const kodeLogistikInput = document.getElementById('kode_logistik');
                    const satuanLogistikInput = document.getElementById('satuan_logistik');
                    const addLogisticButton = document.getElementById('addLogistic');
                    const saveLogisticsButton = document.getElementById('saveLogistics');

                    function updateLogisticDetails() {
                        const selectedOption = logisticSelect.options[logisticSelect.selectedIndex];
                        const kodeLogistik = selectedOption.getAttribute('data-kode');
                        const satuanLogistik = selectedOption.getAttribute('data-satuan');

                        console.log('Updating details:', kodeLogistik, satuanLogistik);

                        kodeLogistikInput.value = kodeLogistik;
                        satuanLogistikInput.value = satuanLogistik;
                    }

                    logisticSelect.addEventListener('change', updateLogisticDetails);

                    addLogisticButton.addEventListener('click', function () {
                        console.log('Add Logistic button clicked');

                        const tanggalKeluar = document.getElementById('tanggal_keluar').value;
                        const namaPenerima = document.getElementById('nama_penerima').value;
                        const nikKkPenerima = document.getElementById('nik_kk_penerima').value;
                        const alamatPenerima = document.getElementById('alamat_penerima').value;
                        const logisticText = logisticSelect.options[logisticSelect.selectedIndex].text;
                        const jumlah = document.getElementById('jumlah_logistik_keluar').value;
                        const satuan = satuanLogistikInput.value;
                        const dokumentasi = document.getElementById('dokumentasi_keluar').files[0] ? document.getElementById('dokumentasi_keluar').files[0].name : '';

                        console.log('Form Data:', {
                            tanggalKeluar,
                            namaPenerima,
                            nikKkPenerima,
                            alamatPenerima,
                            logisticText,
                            jumlah,
                            satuan,
                            dokumentasi
                        });

                        if (!tanggalKeluar || !namaPenerima || !nikKkPenerima || !alamatPenerima || !logisticSelect.value || !jumlah) {
                            alert("Mohon lengkapi semua data yang dibutuhkan!");
                            return;
                        }

                        const table = document.getElementById('logisticTable').getElementsByTagName('tbody')[0];
                        const newRow = table.insertRow();
                        const cell1 = newRow.insertCell(0);
                        const cell2 = newRow.insertCell(1);
                        const cell3 = newRow.insertCell(2);
                        const cell4 = newRow.insertCell(3);
                        const cell5 = newRow.insertCell(4);
                        const cell6 = newRow.insertCell(5);
                        const cell7 = newRow.insertCell(6);
                        const cell8 = newRow.insertCell(7);
                        const cell9 = newRow.insertCell(8);
                        const cell10 = newRow.insertCell(9);

                        cell1.innerHTML = table.rows.length;
                        cell2.innerHTML = logisticText + `<input type="hidden" name="id_logistik[]" value="${logisticSelect.value}">`;
                        cell3.innerHTML = jumlah + `<input type="hidden" name="jumlah_logistik_keluar[]" value="${jumlah}">`;
                        cell4.innerHTML = satuan + `<input type="hidden" name="satuan_logistik[]" value="${satuan}">`;
                        cell5.innerHTML = namaPenerima + `<input type="hidden" name="nama_penerima[]" value="${namaPenerima}">`;
                        cell6.innerHTML = nikKkPenerima + `<input type="hidden" name="nik_kk_penerima[]" value="${nikKkPenerima}">`;
                        cell7.innerHTML = alamatPenerima + `<input type="hidden" name="alamat_penerima[]" value="${alamatPenerima}">`;
                        cell8.innerHTML = tanggalKeluar + `<input type="hidden" name="tanggal_keluar[]" value="${tanggalKeluar}">`;
                        cell9.innerHTML = dokumentasi + `<input type="hidden" name="dokumentasi_keluar[]" value="${dokumentasi}">`;
                        cell10.innerHTML = '<button type="button" class="btn btn-danger remove-logistic">Hapus</button>';

                        console.log('Row added to table');

                        document.querySelectorAll('.remove-logistic').forEach(button => {
                            button.addEventListener('click', function () {
                                this.closest('tr').remove();
                                console.log('Row removed from table');
                                // Re-enable the "Tambahkan ke Tabel" button if the table is empty
                                if (table.rows.length === 0) {
                                    saveLogisticsButton.style.display = 'none';
                                }
                            });
                        });

                        // Show the save button after adding the row
                        saveLogisticsButton.style.display = 'block';
                    });

                    saveLogisticsButton.addEventListener('click', function () {
                        console.log('Save Logistics button clicked');
                        const logisticForm = document.getElementById('logisticForm');
                        logisticForm.action = "{{ route('outlogistics.store') }}";
                        logisticForm.method = 'POST';
                        logisticForm.submit();
                    });

                    console.log('Event listeners added');
                });
            </script>

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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Tambah Akun</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/style.css">
  <link rel="stylesheet" href="{{ asset('tdashboard') }}/assets/css/components.css">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
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
            <ul class="navbar-nav navbar-right"> </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
              <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logobpbd1.png" class="rounded-circle mr-1">
              <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
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
              <img alt="image" src="{{ asset('tdashboard') }}/assets/img/avatar/logobpbd1.png" style="width: 143px; height: auto; margin-top: 20px;">
              <a href="{{ route('dashboard') }}"> Werehouse BPBD </a>
              <hr style="margin-top: 3px; margin-bottom: 3px; border: none; border-bottom: 0.1px solid #C1C1C1; width: 80%;">
              <p><br></p>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">WB</a>
          </div>
          <ul class="sidebar-menu">
              <li>
               <a href="{{ route('dashboard') }}"><i class="fas fa-home"></i><span>Dashboard</span></a>
              </li>
            <li class="menu-header">Master</li>
            <li class="dropdown">
              <a href="{{ route('data_logistik') }}"><i class="fas fa-database"></i> <span>Data Logistik</span></a>
            </li>
            <li class="dropdown">
               <a href="{{ route('data_supplier') }}"><i class="fas fa-table"></i> <span>Data Supplier</span></a>
            </li>
            <li class=active class="dropdown">
              <a href="{{ route('tambah_anggota')}}"><i class="far fa-user"></i> <span>Tambah Anggota</span></a>
            </li>
            <li class="menu-header">Aktivitas</li>
              <li>
                <a href="{{ route('logistik_masuk')}}" class="nav-link"><i class="fas fa-sign-in-alt"></i> <span>Logistik Masuk</span></a>
              </li>
              <li>
                <a href="{{ route('logistik_keluar')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logistik Keluar</span></a>
            </li>
              <li>
                <a href="{{ route('lokasi_pengiriman')}}" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Lokasi Pengiriman</span></a>
              </li>
            <li class="menu-header">Pengaturan</li>
              <li>
                <a href="{{ route('profile.edit')}}" class="nav-link"><i class="fas fa-user"></i> <span>Profil</span></a>
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
            <h1>Tambah Anggota</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Tambah Anggota</div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                  <h4>Data Anggota</h4>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive table-invoice">
                    <table class="table table-striped">
                      <tr>
                        <th>ID </th>
                        <th>NAMA</th>
                        <th>EMAIL</th>
                        <th>STATUS</th>
                        <th>AKSI</th>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87239</a></td>
                        <td class="font-weight-600">Kusnadi</td>
                        <td><a href="mailto:hasan.basri@example.com">hasan.basri@example.com</a></td>
                        <td><div class="badge badge-info">Anggota</div></td>
                        <td>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-48574</a></td>
                        <td class="font-weight-600">Hasan Basri</td>
                        <td><a href="mailto:hasan.basri@example.com">hasan.basri@example.com</a></td>
                        <td><div class="badge badge-info">Anggota</div></td>
                        <td>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Logistik ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-76824</a></td>
                        <td class="font-weight-600">Muhamad Nuruzzaki</td>
                        <td><a href="mailto:hasan.basri@example.com">hasan.basri@example.com</a></td>
                        <td><div class="badge badge-info">Anggota</div></td>
                        <td>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Logistik ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-84990</a></td>
                        <td class="font-weight-600">Agung Ardiansyah</td>
                        <td><a href="mailto:hasan.basri@example.com">hasan.basri@example.com</a></td>
                        <td><div class="badge badge-info">Anggota</div></td>
                        <td>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Logistik ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                        </td>
                      </tr>
                      <tr>
                        <td><a href="#">INV-87320</a></td>
                        <td class="font-weight-600">Ardian Rahardiansyah</td>
                        <td><a href="mailto:hasan.basri@example.com">hasan.basri@example.com</a></td>
                        <td><div class="badge badge-info">Anggota</div></td>
                        <td>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Logistik ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                        </td>
                      </tr>
                    </table>
                  </div>
                  <div class="card">
                    <div class="card-body">
                        <div class="pagination-container">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">Halaman</a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Selanjutnya</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                </div>
              </div>
            </div>
            <div class="card">
                  <form class="needs-validation" novalidate="">
                    <div class="card-header">
                      <h4> Form Tambah Anggota</h4>
                    </div>
                    <div class="card-body">
                      <div class="form-group row">
                          <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="nama" name="nama" required>
                              <div class="invalid-feedback">
                                  Kolom wajib diisi !
                              </div>
                              <div class="valid-feedback">
                                  Nama valid !
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                          <label for="email" class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                              <input type="email" class="form-control" id="email" name="email" required>
                              <div class="invalid-feedback">
                                  Kolom wajib diisi !
                              </div>
                              <div class="valid-feedback">
                                  Email valid !
                              </div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="valid-feedback">
                                Password valid !
                            </div>
                            <div class="invalid-feedback">
                                Kolom wajib diisi !
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            <div class="valid-feedback">
                                Konfirmasi password valid !
                            </div>
                            <div class="invalid-feedback">
                                Kolom wajib diisi !
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary">Tambah</button>
                    </div>
                  </form>
                </div>
        </div>
          <div class="section-body">
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
  <div class="modal fade" id="tambahModal" tabindex="-1" role="dialog" aria-labelledby="tambahModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form class="needs-validation" novalidate="">
                <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Edit Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama" required>
                            <div class="invalid-feedback">
                                Kolom wajib diisi !
                            </div>
                            <div class="valid-feedback">
                                Nama valid !
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                              Kolom wajib diisi !
                            </div>
                            <div class="valid-feedback">
                                Email valid !
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="valid-feedback">
                                Password valid !
                            </div>
                            <div class="invalid-feedback">
                              Kolom wajib diisi !
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-0 row">
                        <label for="password_confirmation" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                            <div class="valid-feedback">
                                Konfirmasi password valid !
                            </div>
                            <div class="invalid-feedback">
                               Kolom wajib diisi !
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
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
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &rsaquo; Data Logistik &mdash; Werehouse BPBD | Kabupaten Jember</title>

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
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  
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
            <li class=active class="dropdown">
              <a href="{{ route('data_logistik') }}"><i class="fas fa-database"></i> <span>Data Logistik</span></a>
            </li>
            <li class="dropdown">
               <a href="{{ route('data_supplier') }}"><i class="fas fa-table"></i> <span>Data Supplier</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('tambah_akun_anggota')}}"><i class="far fa-user"></i> <span>Tambah Anggota</span></a>
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
            <h1>Data Logistik</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Data Logistik</div>
            </div>
          </div>
          <div class="button-container">
              <div class="text-left">
                  <button class="btn btn-primary btn-lg" onclick="window.location.href='tambah-data'">
                      <i class="fas fa-plus"></i> Tambah
                  </button>
              </div>
              <div class="text-right">
                  <span class="button-text">Buat dan cetak barcode label Logistik baru?<br> Tekan tombol dibawah ini</br></span>
                  <button class="btn btn-warning btn-lg" onclick="window.location.href='cetak-barcode-label'">
                      <i class="fas fa-barcode"></i> Buat
                  </button>
              </div>
          </div>
          <style>
              .button-container {
                  display: flex;
                  justify-content: space-between;
              }
              .text-left,
              .text-right {
                  flex: 1;
                  text-align: center; 
              }
              .button-text {
                  margin-right: 8px; 
              } 

          </style> <br> 
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Logistik</h4>
                    <div class="card-header-form">
                    </div>
                  </div>
                  
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Kode Logistik</th>
                          <th>Nama Logistik</th>
                          <th>Jenis Satuan</th>
                          <th>Aksi</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>Pcs</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>Pcs</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                        <tr>
                          <td>3</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>Pcs</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>Pcs</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>Pcs</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                      </table>
                    </div>
                    <div class="card">
                   
                  </div>
                  </div>
                </div>
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
                    <h5 class="modal-title" id="tambahModalLabel">Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="kode_logistik" class="col-sm-3 col-form-label">Kode Logistik</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kode_logistik" name="kode_logistik" value="LOG123" required>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_logistik" class="col-sm-3 col-form-label">Nama Logistik</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_logistik" name="nama_logistik" value="Kursi Lipat" required>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label">Jenis Satuan</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <select class="form-control" id="satuan" name="satuan" required>
                                        <option value="">Pilih Satuan</option>
                                        <option value="kg">Kilogram (kg)</option>
                                        <option value="g">Gram (g)</option>
                                        <option value="l">Liter (l)</option>
                                        <option value="pcs">Pieces (pcs)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
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
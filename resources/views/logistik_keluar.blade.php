<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Dashboard &rsaquo; Tambah Logistik Keluar &mdash; Werehouse BPBD | Kabupaten Jember</title>

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
              <a href="{{ route('pengaturan') }}" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Pengaturan
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
            <li class="dropdown">
              <a href="{{ route('tambah_akun_anggota')}}"><i class="far fa-user"></i> <span>Tambah Anggota</span></a>
            </li>
            <li class="menu-header">Aktivitas</li>
              <li>
                <a href="{{ route('logistik_masuk')}}" class="nav-link"><i class="fas fa-sign-in-alt"></i> <span>Logistik Masuk</span></a>
              </li>
              <li class=active>
                <a href="{{ route('logistik_keluar')}}" class="nav-link"><i class="fas fa-sign-out-alt"></i> <span>Logistik Keluar</span></a>
            </li>
              <li>
                <a href="{{ route('lokasi_pengiriman')}}" class="nav-link"><i class="fas fa-map-marker-alt"></i> <span>Lokasi Pengiriman</span></a>
              </li>
            <li class="menu-header">Pengaturan</li>
              <li>
                <a href="{{ route('profile.edit')}}" class="nav-link"><i class="fas fa-user"></i> <span>Profil</span></a>
              </li>
              <li>
                <a href="{{ route('pengaturan') }}" class="nav-link"><i class="fas fa-cog"></i> <span>Pengaturan</span></a>
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
            <h1>Logistik Keluar</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item">Logistik Keluar</div>
            </div>
          </div>
          <div class="text-right">
            <a href="path_to_your_pdf_file.pdf" class="btn btn-danger btn-lg" download>
                <i class="fas fa-file-pdf"></i> Print
            </a>
              <button class="btn btn-primary btn-lg" onclick="window.location.href='tambah-logistik-keluar'">
                  <i class="fas fa-plus"></i> Tambah
              </button>
          </div>
          <style>
              .text-right .btn {
                  margin-right: 8px; 
              }
          </style> <br> 
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Logistik Keluar</h4>
                    <div class="card-header-form">
                      <form>
                      </form>
                    </div>
                  </div>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>No Keluar</th>
                          <th>Nama Logistik</th>
                          <th>Jumlah</th>
                          <th>Nama Admin</th>
                          <th>Nama Penerima</th>
                          <th>NIK / KK</th>
                          <th>Tanggal Keluar</th>
                          <th>Dokumentasi</th>
                          <th>Aksi</th>
                        </tr>
                        <tr>
                          <td>1</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>14 Pcs</td>
                          <td>Werehouse BPBD</td>
                          <td>Rio Fahmi Dewanto</td>
                          <td>35092100348239</td> 
                          <td>2018-01-20</td> 
                          <td>Dokumentasi 1</td> 
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Logistik ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>14 Pcs</td>
                          <td>Werehouse BPBD</td>
                          <td>Rio Fahmi Dewanto</td>
                          <td>35092100348239</td> 
                          <td>2018-01-20</td> 
                          <td>Dokumentasi 2</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>14 Pcs</td>
                          <td>Werehouse BPBD</td>
                          <td>Rio Fahmi Dewanto</td>
                          <td>35092100348239</td> 
                          <td>2018-01-20</td> 
                          <td>Dokumentasi 3</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>14 Pcs</td>
                          <td>Werehouse BPBD</td>
                          <td>Rio Fahmi Dewanto</td>
                          <td>35092100348239</td> 
                          <td>2018-01-20</td> 
                          <td>Dokumentasi 4</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
                          </td>
                        </tr>
                        <tr>
                          <td>5</td>
                          <td>09386437</td>
                          <td>Kursi Lipat</td>
                          <td>14 Pcs</td>
                          <td>Werehouse BPBD</td>
                          <td>Rio Fahmi Dewanto</td>
                          <td>35092100348239</td> 
                          <td>2018-01-20</td> 
                          <td>Dokumentasi 5</td>
                          <td>
                            <a class="btn btn-primary btn-action mr-1" data-toggle="modal" data-target="#tambahModal" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i> Edit </a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete" data-confirm="Apakah anda yakin?|Apakah anda yakin ingin menghapus Data Admin ini?" data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i> Hapus </a>
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
                            <label for="no_terima" class="col-sm-3 col-form-label">No Keluar</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="no_terima" name="no_terima" value="09386437" readonly>
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
                            <input type="text" class="form-control" id="nama_logistik" name="nama_logistik" value="Kursi Lipat" readonly>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="stok" class="col-sm-3 col-form-label">Jumlah Keluar</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="14" required>
                                </div>
                                <div class="col-sm-6">
                                    <select class="form-control" id="satuan" name="satuan" required>
                                        <option value="">Pilih Satuan</option>
                                        <option value="kg">Kilogram (kg)</option>
                                        <option value="g">Gram (g)</option>
                                        <option value="l">Liter (l)</option>
                                        <option value="l">Pieces (pcs)</option>
                                        <option value="pcs">Unit (unit)</option>
                                        <option value="pcs">Botol (botol)</option>
                                        <option value="pcs">Kardus (kardus)</option>
                                        <option value="pcs">Drum (drum)</option>
                                        <option value="pcs">Roll (roll)</option>
                                        <option value="pcs">Lainnya</option>
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
                    <div class="form-group row">
                        <label for="nama_admin" class="col-sm-3 col-form-label">Nama Admin</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="Werehouse BPBD" readonly>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_supplier" class="col-sm-3 col-form-label">Nama Penerima</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="Rio Fahmi Dewanto" readonly>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_supplier" class="col-sm-3 col-form-label">NIK / KK</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="35092100348239" readonly>
                            <div class="invalid-feedback">
                                Kolom wajib diisi!
                            </div>
                            <div class="valid-feedback">
                                Valid!
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_terima" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggal_terima" name="tanggal_terima" required>
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
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Werehouse | BPBD</title>

    <!--====== Favicon Icon ======-->
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/svg"
    />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/ud-styles.css" />
  </head>
  <body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar navbar-expand-lg">
              <a class="navbar-brand" href="/">
                <img src="assets/images/logo/logo.svg" alt="Logo" />
              </a>
              <button class="navbar-toggler">
                <span class="toggler-icon"> </span>
                <span class="toggler-icon"> </span>
                <span class="toggler-icon"> </span>
              </button>

              <div class="navbar-collapse">
                <ul id="nav" class="navbar-nav mx-auto">
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#home">Beranda</a>
                  </li>

                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#about">Profil</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#team">Tim</a>
                  </li>
                  <li class="nav-item">
                    <a class="ud-menu-scroll" href="#contact">Kontak</a>
                  </li>
                  <li class="nav-item nav-item-has-children">
                    <a href="javascript:void(0)"> Halaman </a>
                    <ul class="ud-submenu">
                      <li class="ud-submenu-item">
                        <a href="{{ route('about') }}" class="ud-submenu-link">
                          Halaman Profil
                        </a>
                      </li>
                      <li class="ud-submenu-item">
                      <a href="{{ route('contact') }}" class="ud-submenu-link">
                          Hubungi Kami
                        </a>
                      </li>
                      <li class="ud-submenu-item">
                        <a href="{{ route('login') }}" class="ud-submenu-link">
                          Halaman Login
                        </a>
                      </li>
                    </ul>
                  </li>
                </ul>
              </div>
              <div class="navbar-btn d-none d-sm-inline-block">
                <a href="{{ route('login') }}" class="ud-main-btn ud-login-btn">
                Login
                </a>
              </div>
            </nav>
          </div>
        </div>
      </div>
    </header>
    <!-- ====== Header End ====== -->

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="home">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
              <h1 class="ud-hero-title">
                Selamat Datang Di Website Werehouse <br> Badan Penanggulangan Bencana Daerah <br> Kabupaten Jember 
              </h1>
              <p class="ud-hero-desc">
                Unduh Aplikasi di bawah ini <br> 
              </p>
              <ul class="ud-hero-buttons">
                <li>
                  <a href="https://links.uideck.com/play-bootstrap-download" rel="nofollow noopener" target="_blank" class="ud-main-btn ud-white-btn">
                    Unduh Aplikasi
                  </a>
                </li>
              </ul>
            </div>
            <div
              class="ud-hero-brands-wrapper wow fadeInUp"
              data-wow-delay=".3s"
            >
            </div>
            <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
              <img src="assets/images/hero/hero-image.svg" alt="hero-image" />
              <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-1"
              />
              <img
                src="assets/images/hero/dotted-shape.svg"
                alt="shape"
                class="shape shape-2"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Hero End ====== -->

    <!-- ====== Features Start ====== -->
    <section id="features" class="ud-features">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title">
              <span>Fitur Utama</span>
              <h2>Werehouse BPBD</h2>
              <p>
              Fitur-fitur ini dirancang untuk membantu BPBD Kabupaten Jember dalam mengelola 
              persediaan mereka dengan efisien.
              </p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".1s">
              <div class="ud-feature-icon">
                <i class="lni lni-gift"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Alat Pemindai</h3>
                <p class="ud-feature-desc">
                  Alat pemindai manajemen stok logistik memfasilitasi input cepat
                  data produk yang masuk atau keluar dari gudang.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".15s">
              <div class="ud-feature-icon">
                <i class="lni lni-move"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Alat Cetak Termal </h3>
                <p class="ud-feature-desc">
                  Alat cetak termal manajemen stok logistik adalah kunci 
                  dalam mencetak label barcode pada penerimaan dan pengeluaran logistik.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".2s">
              <div class="ud-feature-icon">
                <i class="lni lni-layout"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Cetak Laporan</h3>
                <p class="ud-feature-desc">
                  Fitur Cetak Laporan untuk membuat laporan yang mencakup berbagai informasi 
                  penting seperti jumlah persediaan, pergerakan barang, dan tingkat stok.
                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-feature wow fadeInUp" data-wow-delay=".25s">
              <div class="ud-feature-icon">
                <i class="lni lni-layers"></i>
              </div>
              <div class="ud-feature-content">
                <h3 class="ud-feature-title">Pemantauan Stok Secara Langsung</h3>
                <p class="ud-feature-desc">
                  Fitur pemantauan stok real-time memberikan informasi langsung 
                  tentang persediaan barang secara akurat dan terkini.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Features End ====== -->

    <!-- ====== About Start ====== -->
    <section id="about" class="ud-about">
      <div class="container">
        <div class="ud-about-wrapper wow fadeInUp" data-wow-delay=".2s">
          <div class="ud-about-content-wrapper">
            <div class="ud-about-content">
              <h2>Werehouse BPBD <br> Kabupaten Jember
              </h2>
              <p>
                Website Manajemen Stok Logistik "Werehouse BPBD Kabupaten Jember"
              </p>
              <a href="{{ route('about') }}" class="ud-main-btn">
                Selengkapnya
              </a>
            </div>
          </div>
          <div class="ud-about-image">
            <img src="assets/images/about/about-image.svg" alt="about-image" />
          </div>
        </div>
      </div>
    </section>
    <!-- ====== About End ====== -->

    <!-- ====== FAQ Start ====== -->
    <section id="faq" class="ud-faq">
      <div class="shape">
        <img src="assets/images/faq/shape.svg" alt="shape" />
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title text-center mx-auto">
              <span>FAQ</span>
              <h2>Pertanyaan? Menjawab</h2>
              <p>
                Pertanyaan dan jawaban terkait manajemen stok logistik 
                <br> Badan Penanggulangan Bencana Daerah Kabupaten Jember
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".1s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseOne"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apa yang dimaksud dengan manajemen stok logistik?</span>
                </button>
                <div id="collapseOne" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                  Manajemen stok logistik merupakan proses perencanaan, 
                  pengorganisasian, pengendalian, dan pengawasan terhadap 
                  persediaan barang-barang yang dibutuhkan dalam kegiatan 
                  logistik, seperti bahan makanan, obat-obatan, dan 
                  perlengkapan lainnya.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".15s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseTwo"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Bagaimana pentingnya manajemen stok logistik bagi BPBD Kabupaten Jember?</span>
                </button>
                <div id="collapseTwo" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                  Manajemen stok logistik sangat penting bagi BPBD Kabupaten Jember 
                  karena membantu memastikan ketersediaan barang-barang
                  penting dalam menanggapi bencana dan situasi darurat.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".2s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseThree"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Bagaimana proses pengelolaan stok logistik dilakukan di BPBD Jember?</span>
                </button>
                <div id="collapseThree" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Proses pengelolaan stok logistik di BPBD Jember meliputi 
                    pemantauan persediaan, pengadaan barang, penyimpanan, 
                    distribusi, dan pembaruan inventaris secara berkala.
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".1s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFour"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apa saja jenis stok logistik yang dikelola oleh BPBD Kabupaten Jember?</span>
                </button>
                <div id="collapseFour" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Jenis stok logistik yang dikelola oleh BPBD Jember meliputi 
                    makanan, air bersih, tenda pengungsian, perlengkapan medis, 
                    dan peralatan komunikasi darurat.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".15s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseFive"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Bagaimana BPBD Kabupaten Jember memastikan ketersediaan stok logistik dalam situasi darurat?</span>
                </button>
                <div id="collapseFive" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    BPBD Jember memastikan ketersediaan stok logistik dalam situasi 
                    darurat dengan melakukan perencanaan yang matang, kerjasama 
                    dengan pihak terkait, dan sistem pemantauan yang efektif.
                  </div>
                </div>
              </div>
            </div>
            <div class="ud-single-faq wow fadeInUp" data-wow-delay=".2s">
              <div class="accordion">
                <button
                  class="ud-faq-btn collapsed"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseSix"
                >
                  <span class="icon flex-shrink-0">
                    <i class="lni lni-chevron-down"></i>
                  </span>
                  <span>Apa saja pencapaian BPBD Kabupaten Jember sejak berdiri hingga saat ini?</span>
                </button>
                <div id="collapseSix" class="accordion-collapse collapse">
                  <div class="ud-faq-body">
                    Pencapaian BPBD Jember termasuk keberhasilan dalam merespons 
                    bencana alam, penyuluhan masyarakat tentang mitigasi bencana, 
                    serta pembentukan relawan dan tim tanggap darurat yang handal.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== FAQ End ====== -->

    <!-- ====== Testimonials Start ====== -->
    <section id="testimonials" class="ud-testimonials">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title mx-auto text-center">
              <span>Testimonial</span>
              <p>
                BPBD Kabupaten Jember percaya bahwa masukan 
                Anda sangat berharga dalam membantu 
                kami meningkatkan pelayanan dan kinerja kami.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div
              class="ud-single-testimonial wow fadeInUp"
              data-wow-delay=".1s"
            >
              <div class="ud-testimonial-ratings">
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
              </div>
              <div class="ud-testimonial-content">
                <p>
                "Saya sangat terkesan dengan kinerja BPBD Kabupaten Jember"
                </p>
              </div>
              <div class="ud-testimonial-info">
                <div class="ud-testimonial-image">
                  <img
                    src="assets/images/testimonials/author-01.png"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4>Nuruddin Ilyas</h4>
                  <p>Warga Jember</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
              class="ud-single-testimonial wow fadeInUp"
              data-wow-delay=".15s"
            >
              <div class="ud-testimonial-ratings">
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
              </div>
              <div class="ud-testimonial-content">
                <p>
                  "Terima kasih atas kerja keras dan dedikasi Anda dalam menjaga keselamatan dan kesejahteraan kami"
                </p>
              </div>
              <div class="ud-testimonial-info">
                <div class="ud-testimonial-image">
                  <img
                    src="assets/images/testimonials/author-02.png"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4>Nanang Bahrudin</h4>
                  <p>Warga Jember</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div
              class="ud-single-testimonial wow fadeInUp"
              data-wow-delay=".2s"
            >
              <div class="ud-testimonial-ratings">
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
                <i class="lni lni-star-filled"></i>
              </div>
              <div class="ud-testimonial-content">
                <p>
                  "BPBD Jember adalah pahlawan tanpa tanda jasa bagi kami"
                </p>
              </div>
              <div class="ud-testimonial-info">
                <div class="ud-testimonial-image">
                  <img
                    src="assets/images/testimonials/author-03.png"
                    alt="author"
                  />
                </div>
                <div class="ud-testimonial-meta">
                  <h4>Syaifudin</h4>
                  <p>Warga Jember</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Testimonials End ====== -->

    <!-- ====== Team Start ====== -->
    <section id="team" class="ud-team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="ud-section-title mx-auto text-center">
              <span>Tim Kami</span>
              <p>
                Kami bekerja sama untuk merancang, mengembangkan, dan 
                meluncurkan website yang memenuhi standar kualitas
                dan mencerminkan komitmen BPBD Kabupaten Jember dalam
                memberikan layanan terbaik kepada masyarakat.
              </p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".1s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="assets/images/team/team-01.png" alt="team" />
                </div>

                <img
                  src="assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Mohammad Ihsanuddin</h5>
                <h6>Web Developer</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://www.instagram.com/isan.nuddin/">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".15s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="assets/images/team/team-02.png" alt="team" />
                </div>

                <img
                  src="assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Muhammad Guntur Wijaya</h5>
                <h6>App Developer</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://www.instagram.com/gunturwijayahh/">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".2s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="assets/images/team/team-03.png" alt="team" />
                </div>

                <img
                  src="assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Fahmi Fahreza</h5>
                <h6>UI/UX Design</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://www.instagram.com/reezzaaaa__/">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-xl-3 col-lg-3 col-sm-6">
            <div class="ud-single-team wow fadeInUp" data-wow-delay=".25s">
              <div class="ud-team-image-wrapper">
                <div class="ud-team-image">
                  <img src="assets/images/team/team-04.png" alt="team" />
                </div>

                <img
                  src="assets/images/team/dotted-shape.svg"
                  alt="shape"
                  class="shape shape-1"
                />
                <img
                  src="assets/images/team/shape-2.svg"
                  alt="shape"
                  class="shape shape-2"
                />
              </div>
              <div class="ud-team-info">
                <h5>Caesar Ali</h5>
                <h6>Quality Assurance Analyst</h6>
              </div>
              <ul class="ud-team-socials">
                <li>
                  <a href="https://www.instagram.com/alicaesar42/">
                    <i class="lni lni-instagram-filled"></i>
                  </a>
                </li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Team End ====== -->

    <!-- ====== Contact Start ====== -->
    <section id="contact" class="ud-contact">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-8 col-lg-7">
            <div class="ud-contact-content-wrapper">
              <div class="ud-contact-title">
                <span> Kontak Kami <br> Tim kami siap membantu Anda <br> Silakan hubungi kami menggunakan informasi kontak pesan</span>
                <h2>
                  Informasi Terkait
                </h2>
              </div>
              <div class="ud-contact-info-wrapper">
                <div class="ud-single-info">
                  <div class="ud-info-icon">
                    <i class="lni lni-map-marker"></i>
                  </div>
                  <div class="ud-info-meta">
                    <h5>Kantor BPBD Kabupaten Jember</h5>
                    <p>Jl. Danau Toba No.16, Lingkungan Panji, Tegalgede, Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68124</p>
                  </div>
                </div>
                <div class="ud-single-info">
                  <div class="ud-info-icon">
                    <i class="lni lni-envelope"></i>
                  </div>
                  <div class="ud-info-meta">
                    <h5>Apa yang bisa kami bantu?</h5>
                    <p>bpbd@jemberkab.go.id</p>
                    <p>Telepon: 081259701797 </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-5">
            <div
              class="ud-contact-form-wrapper wow fadeInUp"
              data-wow-delay=".2s"
            >
              <h3 class="ud-contact-form-title">Kirim Pesan</h3>
              <form class="ud-contact-form">
                <div class="ud-form-group">
                  <label for="fullName">Nama Lengkap </label>
                  <input
                    type="text"
                    name="fullName"
                    placeholder="*nama lengkap"
                  />
                </div>
                <div class="ud-form-group">
                  <label for="email">Email</label>
                  <input
                    type="email"
                    name="email"
                    placeholder="*email@gmail.com"
                  />
                </div>
                <div class="ud-form-group">
                  <label for="phone">Telepon</label>
                  <input
                    type="text"
                    name="phone"
                    placeholder="*(+62) 123-456-789"
                  />
                </div>
                <div class="ud-form-group">
                  <label for="message">Pesan</label>
                  <textarea
                    name="message"
                    rows="1"
                    placeholder="*isi pesan"
                  ></textarea>
                </div>
                <div class="ud-form-group mb-0">
                  <button type="submit" class="ud-main-btn">
                    Kirim 
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ====== Contact End ====== -->

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
      <div class="shape shape-1">
        <img src="assets/images/footer/shape-1.svg" alt="shape" />
      </div>
      <div class="shape shape-2">
        <img src="assets/images/footer/shape-2.svg" alt="shape" />
      </div>
      <div class="shape shape-3">
        <img src="assets/images/footer/shape-3.svg" alt="shape" />
      </div>
      <div class="ud-footer-widgets">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-6">
              <div class="ud-widget">
                <a href="index.html" class="ud-footer-logo">
                  <img src="assets/images/logo/logo.svg" alt="logo" />
                </a>
                <p class="ud-widget-desc">
                Website ini bertujuan untuk meningkatkan efisiensi, transparansi, 
                dan keterlibatan dalam manajemen stok logistik BPBD Kabupaten Jember. 
                </p>
                <ul class="ud-widget-socials">
                  <li>
                    <a href="https://www.facebook.com/bpbd.jember">
                      <i class="lni lni-facebook-filled"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://twitter.com/pusdalops_jbr">
                      <i class="lni lni-twitter-filled"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/bpbd_kab.jember/">
                      <i class="lni lni-instagram-filled"></i>
                    </a>
                  </li>
                </ul>
              </div>
            </div>

            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
              <div class="ud-widget">
                <h5 class="ud-widget-title">Menu Utama</h5>
                <ul class="ud-widget-links">
                  <li>
                  <a href="#home">Beranda</a>
                  </li>
                  <li>
                  <a href="#about">Profil</a>
                  </li>
                  <li>
                    <a href="#team">Tim</a>
                  </li>
                  <li>
                    <a href="#contact">Kontak</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
              <div class="ud-widget">
                <h5 class="ud-widget-title">Fitur Utama</h5>
                <ul class="ud-widget-links">
                  <li>
                    <a href="#home">Alat Pemindai</a>
                  </li>
                  <li>
                    <a href="#home">Alat Cetak Termal</a>
                  </li>
                  <li>
                    <a href="#home">Cetak Laporan</a>
                  </li>
                  <li>
                    <a href="#home">Pemantauan Stok Secara Langsung</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ud-footer-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <ul class="ud-footer-bottom-left">
                <li>
                  <a href="#team">Tim Servis</a>
                </li>
              </ul>
            </div>
            <div class="col-md-4">
              <p class="ud-footer-bottom-right">
                Selamat Datang Di Website Resmi Werehouse BPBD
                <a href="/" rel="nofollow">Werehouse BPBD Kabupaten Jember </a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
      <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script>
      // ==== for menu scroll
      const pageLink = document.querySelectorAll(".ud-menu-scroll");

      pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
          e.preventDefault();
          document.querySelector(elem.getAttribute("href")).scrollIntoView({
            behavior: "smooth",
            offsetTop: 1 - 60,
          });
        });
      });

      // section menu active
      function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
          window.pageYOffset ||
          document.documentElement.scrollTop ||
          document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
          const currLink = sections[i];
          const val = currLink.getAttribute("href");
          const refElement = document.querySelector(val);
          const scrollTopMinus = scrollPos + 73;
          if (
            refElement.offsetTop <= scrollTopMinus &&
            refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
          ) {
            document
              .querySelector(".ud-menu-scroll")
              .classList.remove("active");
            currLink.classList.add("active");
          } else {
            currLink.classList.remove("active");
          }
        }
      }

      window.document.addEventListener("scroll", onScroll);
    </script>
  </body>
</html>

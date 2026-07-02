<!doctype html>
<html lang="{{ request('lang', app()->getLocale() ?? 'id') }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>ITBSS - Dashboard</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .carousel-inner img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 8px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 50%;
    padding: 8px;
    }
    :root{--brand-blue:#0d6efd;--dark:#0b2340;--bg:#f5f7fb}
    html,body{height:100%}
    body{background:var(--bg);font-family:system-ui,-apple-system,"Segoe UI",Roboto,Arial;color:var(--dark);margin:0}

    /* NAVBAR layout: left | center | right */
    .navbar { background:#fff; box-shadow:0 2px 8px rgba(9,30,63,.06); padding:12px 0; }
    .nav-row { display:flex; align-items:center; width:100%; gap:8px; }
    .nav-left, .nav-center, .nav-right { display:flex; align-items:center; }
    .nav-left { flex:0 0 auto; gap:12px; }
    .nav-center { flex:1 1 auto; justify-content:center; }
    .nav-right { flex:0 0 auto; gap:10px; justify-content:flex-end; }

    .navbar-brand img{border-radius:50%}
    .brand-text{font-weight:700;color:var(--dark);margin-left:8px}

    /* Center Home bigger */
    .nav-center .nav-link.home {
      font-size:1.075rem;
      font-weight:700;
      color:var(--dark);
      padding:.45rem 1rem;
    }
    .nav-center .nav-link.home:hover { color:var(--brand-blue); }

    /* Right items */
    .lang-btn { border-radius:18px; padding:.35rem .6rem; border:1px solid rgba(11,35,64,.06); background:transparent; font-weight:600; }
    .user-btn { border-radius:18px; padding:.35rem .6rem; }

    /* Menu siakad styling */
    .siakad-toggle { border-radius:22px; padding:.45rem .8rem; border:1px solid rgba(11,35,64,.06); background:transparent; font-weight:600; }

    /* Hero full-screen */
    .hero { position:relative; width:100%; height:100vh; min-height:640px; overflow:hidden; display:flex; align-items:center; background:#071024; }
    .hero-img{position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center center;z-index:1}
    .hero .overlay{position:absolute;inset:0;z-index:2;background:linear-gradient(to right, rgba(3,10,25,.6) 0%, rgba(3,10,25,.35) 50%, rgba(3,10,25,.12) 100%)}
    .hero-content{position:relative;z-index:3;max-width:1180px;margin:0 auto;width:100%;padding:40px;display:grid;grid-template-columns:1fr 360px;gap:28px;align-items:center}
    .hero-left{color:#fff;max-width:68ch}
    .hero-left h1{margin:0 0 .6rem 0;font-weight:800;line-height:1.02;font-size:clamp(2rem,4.2vw,3.4rem);text-shadow:0 8px 28px rgba(0,0,0,.45)}
    .hero-left p.lead{color:rgba(255,255,255,.95);font-size:clamp(.95rem,1.3vw,1.05rem)}
    .hero-actions{margin-top:18px;display:flex;gap:12px;flex-wrap:wrap}

    /* Agenda */
    .agenda-card{border-radius:12px;background:#fff;box-shadow:0 14px 40px rgba(3,10,25,.16);overflow:hidden}
    .agenda-card .card-body{padding:18px;color:var(--dark)}

    /* photo spots / badges */
    .photo-spot{position:relative;border-radius:8px;overflow:hidden;margin:28px 0;background:#fff}
    .photo-spot img{width:100%;display:block;height:auto;object-fit:contain}
    .badge-logo{position:absolute;top:12px;left:12px;z-index:6;background:rgba(255,255,255,.95);padding:6px 8px;border-radius:8px;display:flex;gap:8px;align-items:center;box-shadow:0 6px 16px rgba(2,6,23,.12)}
    .badge-logo img{height:36px;width:auto;display:block}

    /* Section styling */
    .section-title { font-size:2rem; font-weight:800; color:var(--dark); margin:48px 0 28px 0; }
    .section-subtitle { font-size:1.25rem; font-weight:700; color:var(--dark); margin:32px 0 16px 0; }
    
    /* programs */
    .program-card{border-radius:10px;box-shadow:0 8px 24px rgba(2,6,23,.06);padding:18px;background:#fff;height:100%;display:flex;flex-direction:column;align-items:center;text-align:center}
    .prog-logo{width:56px;height:56px;display:inline-flex;align-items:center;justify-content:center;border-radius:10px;background:linear-gradient(180deg,#eef5ff,#e3efff);margin:0 auto 12px auto}
    .prog-logo img{width:100%;height:100%;object-fit:contain}

    /* about & why section */
    .about-section{background:#f9fbfd;border-radius:12px;padding:28px;margin:32px 0}
    .about-content h5{font-weight:700;color:var(--dark);margin-bottom:16px}
    .about-content p{font-size:.95rem;line-height:1.6;color:#555;margin-bottom:12px}
    .about-content a{color:var(--brand-blue);text-decoration:none;font-weight:600}
    .about-content a:hover{text-decoration:underline}

    /* footer */
    footer{background:#0b1724;color:#fff;padding:36px 0;margin-top:24px}
    footer img.footer-logo{filter:brightness(0) invert(1);-webkit-filter:brightness(0) invert(1);width:200px;height:auto;display:block;margin:0 auto}
    footer p,footer a{color:#fff;opacity:.95;text-align:center;margin-top:12px}

    @media (max-width:992px){
      .hero{height:auto;min-height:520px;padding:28px 0}
      .hero-content{display:block;padding:28px}
      .nav-center{justify-content:center}
      .nav-center .nav-link.home{font-size:1.025rem}
    }
  </style>
</head>
<body>
@php
  // language mapping
  $lang = request('lang', app()->getLocale() ?? 'id');
  $trId = [
    'home'=>'Home',
    'apply'=>'Daftar Sekarang',
    'profile'=>'Lihat Profil',
    'agenda'=>'Agenda Terdekat',
    'why'=>'Mengapa Memilih ITBSS',
    'about'=>'Tentang ITBSS',
    'registration'=>'Pendaftaran',
    'programs'=>'Program Studi',
    'pmb'=>'Penerimaan Mahasiswa Baru'
  ];
  $trEn = [
    'home'=>'Home',
    'apply'=>'Apply Now',
    'profile'=>'View Profile',
    'agenda'=>'Upcoming Events',
    'why'=>'Why Choose ITBSS',
    'about'=>'About ITBSS',
    'registration'=>'Registration',
    'programs'=>'Study Programs',
    'pmb'=>'New Student Admission'
  ];
  $tr = $lang === 'en' ? $trEn : $trId;
  $userName = auth()->check() ? auth()->user()->name : 'Guest';
  $svgPlaceholder = "data:image/svg+xml;utf8,".rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="800"><rect width="100%" height="100%" fill="#e9eef6"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="#9aa7b7" font-family="Arial" font-size="28">Image not available</text></svg>');
@endphp

<nav class="navbar">
  <div class="container">
    <div class="nav-row" style="width:100%">
      <!-- LEFT: logo + brand -->
      <div class="nav-left">
        <a class="d-flex align-items-center" href="{{ route('dashboard') }}" style="text-decoration:none">
          <img src="{{ asset('images/ITB-SS.jpg') }}" width="56" alt="ITBSS" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
          <span class="brand-text d-none d-md-inline">Institut Teknologi & Bisnis Sabda Setia</span>
        </a>
      </div>

      <!-- CENTER: Home (bigger) -->
      <div class="nav-center">
        <a class="nav-link home" href="{{ route('dashboard') }}">{{ $tr['home'] }}</a>
      </div>

      <!-- RIGHT: language, user, menu siakad -->
      <div class="nav-right">
        @php
          $urlId = request()->fullUrlWithQuery(['lang'=>'id']);
          $urlEn = request()->fullUrlWithQuery(['lang'=>'en']);
        @endphp
        <a class="lang-btn" href="{{ $urlId }}" aria-label="ID">ID</a>
        <a class="lang-btn" href="{{ $urlEn }}" aria-label="EN">EN</a>

        {{-- User dropdown --}}
        @auth
          <div class="dropdown">
            <button class="user-btn btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">{{ auth()->user()->name }}</button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form action="{{ route('logout') }}" method="POST">@csrf<button type="submit" class="dropdown-item text-danger">Logout</button></form>
              </li>
            </ul>
          </div>
        @else
          <a class="user-btn btn btn-outline-primary" href="{{ route('login') }}">Login</a>
        @endauth

        {{-- Menu SIAKAD at far right --}}
        <div class="ms-2">
          <div class="dropdown">
            <button class="siakad-toggle btn dropdown-toggle" type="button" id="siakadMenuRight" data-bs-toggle="dropdown" aria-expanded="false">Menu SIAKAD</button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="siakadMenuRight">
              <li>
                @auth
                  <a class="dropdown-item" href="{{ action([App\Http\Controllers\MahasiswaController::class,'index']) }}">Mahasiswa</a>
                @else
                  <a class="dropdown-item" href="{{ route('login', ['redirect'=>url()->current()]) }}">Mahasiswa (Login untuk akses)</a>
                @endauth
              </li>
              <li>
                @auth
                  <a class="dropdown-item" href="{{ action([App\Http\Controllers\DosenController::class,'index']) }}">Dosen</a>
                @else
                  <a class="dropdown-item" href="{{ route('login', ['redirect'=>url()->current()]) }}">Dosen (Login untuk akses)</a>
                @endauth
              </li>
              <li>
                @auth
                  <a class="dropdown-item" href="{{ action([App\Http\Controllers\JurusanController::class,'index']) }}">Jurusan</a>
                @else
                  <a class="dropdown-item" href="{{ route('login', ['redirect'=>url()->current()]) }}">Jurusan (Login untuk akses)</a>
                @endauth
              </li>
              <li>
                @auth
                  <a class="dropdown-item" href="{{ action([App\Http\Controllers\MatakuliahController::class,'index']) }}">Mata Kuliah</a>
                @else
                  <a class="dropdown-item" href="{{ route('login', ['redirect'=>url()->current()]) }}">Mata Kuliah (Login untuk akses)</a>
                @endauth
              </li>
              <li>
                @auth
                  <a class="dropdown-item" href="{{ action([App\Http\Controllers\KelasController::class,'index']) }}">Kelas</a>
                @else
                  <a class="dropdown-item" href="{{ route('login', ['redirect'=>url()->current()]) }}">Kelas (Login untuk akses)</a>
                @endauth
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>

<!-- HERO (full screen) -->
<header class="hero" role="banner" aria-label="Penerimaan">
  <img class="hero-img" src="{{ asset('images/Gedung-ITBSS-scaled.jpg') }}" alt="Hero" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
  <div class="overlay" aria-hidden="true"></div>

  <div class="hero-content">
    <div class="hero-left">
      <span class="badge rounded-pill px-3 py-2 mb-3" style="background:rgba(255,255,255,.08);color:#fff">Penerimaan Mahasiswa Baru 2026/2027 Dibuka</span>
      <h1>Wujudkan Masa Depan Bersama Institut Teknologi & Bisnis Sabda Setia</h1>
      <p class="lead">Institut Teknologi & Bisnis Sabda Setia (ITBSS) berfokus pada pendidikan terapan, kewirausahaan dan pengalaman industri. Kunjungi situs resmi untuk informasi lengkap.</p>

      <div class="hero-actions">
        <a class="btn btn-primary" href="https://itbss.pmbonline.siakad.tech/register" target="_blank" rel="noopener">{{ $tr['apply'] }}</a>
        <a class="btn btn-outline-light" href="https://itbss.ac.id/" target="_blank" rel="noopener">{{ $tr['profile'] }}</a>
      </div>
    </div>

    <div class="hero-right">
      <div class="agenda-card">
        <div class="card-body">
          <h5 class="mb-3">📅 {{ $tr['agenda'] }}</h5>
          <div class="mb-3"><strong>1–5 Agustus 2025</strong><br>Pendaftaran Gelombang 1</div>
          <div class="mb-3"><strong>20 Juli 2025</strong><br>Webinar & Info Session</div>
          <div><strong>15 September 2025</strong><br>Pengumuman Hasil Seleksi</div>
        </div>
      </div>
    </div>
  </div>
</header>

<main class="container" style="max-width:1180px">
  <!-- SECTION 1: PENDAFTARAN (REGISTRATION) -->
  <section class="section">
    <h2 class="section-title">{{ $tr['registration'] }}</h2>
    
    <div class="photo-spot" aria-hidden="false">
      <img src="{{ asset('images/Website-PMB-26-27.jpg') }}" alt="Pendaftaran" loading="lazy" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
    </div>
  </section>

  <!-- SECTION 2: PROGRAM STUDI (STUDY PROGRAMS) -->
  <section class="section">
    <h2 class="section-title">{{ $tr['programs'] }}</h2>
    <p style="color:#666;margin-bottom:28px">Pilih program studi yang sesuai dengan minat dan potensi Anda. ITBSS menawarkan tiga program unggulan yang dirancang untuk mempersiapkan Anda dalam menghadapi tantangan industri modern.</p>

    <div class="row g-3">
      <div class="col-md-4">
        <div class="program-card">
          <div class="prog-logo" aria-hidden="false">
            <img src="{{ asset('images/logo-sti.png') }}" alt="Sistem dan Teknologi Informasi" width="36" height="36" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
          </div>
          <h6 class="text-muted">Program Studi</h6>
          <h5>Sistem dan Teknologi Informasi</h5>
          <p class="small text-muted">Praktik, project, dan peluang kerja industri.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="program-card">
          <div class="prog-logo" aria-hidden="false">
            <img src="{{ asset('images/logo-bd.png') }}" alt="Bisnis Digital" width="36" height="36" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
          </div>
          <h6 class="text-muted">Program Studi</h6>
          <h5>Bisnis Digital</h5>
          <p class="small text-muted">Kurikulum modern dan dukungan startup.</p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="program-card">
          <div class="prog-logo" aria-hidden="false">
            <img src="{{ asset('images/logo-kwu.png') }}" alt="Kewirausahaan" width="36" height="36" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
          </div>
          <h6 class="text-muted">Program Studi</h6>
          <h5>Kewirausahaan</h5>
          <p class="small text-muted">Pendampingan & inkubasi usaha.</p>
        </div>
      </div>
    </div>

    <div class="photo-spot" style="margin-top:36px;">
  <div id="facilityCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('images/Gedung-ITBSS-scaled.jpg') }}" alt="Fasilitas ITBSS 1" loading="lazy" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/photo-1.jpg') }}" alt="Fasilitas ITBSS 2" loading="lazy" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/photo-2.jpg') }}" alt="Fasilitas ITBSS 3" loading="lazy" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('images/photo-3.jpg') }}" alt="Fasilitas ITBSS 4" loading="lazy" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
      </div>
      <!-- Tambah lebih banyak foto kalau perlu -->
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#facilityCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#facilityCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>
</div>
  </section>

  <!-- SECTION 3: WHY CHOOSE & ABOUT US (PMB) -->
  <section class="section">
    <h2 class="section-title">{{ $tr['why'] }}</h2>

    <div class="row g-4">
      <div class="col-lg-6">
        <div class="about-section">
          <div class="about-content">
            <h5>Komitmen ITBSS</h5>
            <p>ITBSS sangat bersemangat menyambut para mahasiswa pilihan yang ingin maju dan berkembang bersama kami. Kami berkomitmen membangun komunitas intelektual muda yang akan membawa dampak positif bagi bangsa dan negara.</p>
            <p>Dengan teknologi terbaik dan fasilitas modern di Pontianak, ITBSS siap mendukung karir dan masa depan Anda dengan kurikulum terapan yang fokus pada kesiapan kerja industri.</p>
          </div>
        </div>
      </div>

      <div class="col-lg-6">
        <div class="about-section">
          <div class="about-content">
            <h5>{{ $tr['about'] }}</h5>
            <p>Institut Teknologi & Bisnis Sabda Setia (ITBSS) membawa pembaharuan dan standar terbaik dalam pendidikan tinggi di Pontianak, Kalimantan Barat. Didirikan tahun 2021, ITBSS berfokus pada pendidikan terapan yang mengintegrasikan teori dan praktik industri.</p>
            <p>Dengan pengalaman puluhan tahun dalam mengelola pendidikan, ITBSS menawarkan akses luas untuk berbagai kesempatan karir dan mendorong inovasi serta kewirausahaan. Sebagai institusi yang membawa standar baru, kami berani berkembang menjadi yang terbaik di bidangnya.</p>
            <p><a href="https://itbss.ac.id/" target="_blank" rel="noopener">→ Kunjungi Website Resmi ITBSS</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- CAMPUS LOCATION -->
  <section class="section">
    <div class="card shadow-sm mt-4" style="border:none;border-top:4px solid var(--brand-blue)">
      <div class="card-body">
        <h4>Lokasi Kampus</h4>
        <p><a href="https://www.google.com/maps/place/Institut+Teknologi+%26+Bisnis+Sabda+Setia/" target="_blank" rel="noopener">Jl. Purnama II, Pontianak Selatan, Kota Pontianak, Kalimantan Barat</a></p>
      </div>
    </div>
  </section>
</main>

<footer>
  <div class="container text-center">
    <img src="{{ asset('images/Logo-ITBSS.png') }}" class="footer-logo" alt="ITBSS White Logo" onerror="this.onerror=null;this.src='{{ $svgPlaceholder }}'">
    <p class="footer-text mt-3">Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
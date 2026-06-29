<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Mengunci halaman pas 1 layar penuh (Anti-Scroll) */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body {
            /* Lapisan langit malam gelap gradasi biru terang ke gelap */
            background: linear-gradient(180deg, #0f3156 0%, #0b223f 40%, #07172b 70%, #040d1a 100%);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            color: white;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            position: relative;
        }

        /* --- BACKGROUND ELEMEN (MURNI CSS & SVG) --- */

        /* Langit Penuh Bintang Kerlap-Kerlip */
        .starfield {
            position: absolute;
            width: 100%;
            height: 60vh;
            top: 0;
            left: 0;
            background-image: 
                radial-gradient(1px 1px at 10% 20%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 20% 40%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 30% 15%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 45% 60%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 55% 30%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 70% 70%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 85% 25%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 90% 50%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1.5px 1.5px at 40% 10%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(1px 1px at 65% 50%, #ffffff, rgba(0,0,0,0)),
                radial-gradient(2px 2px at 75% 15%, #ffffff, rgba(0,0,0,0));
            opacity: 0.7;
            z-index: 1;
        }

        /* Bulan Besar Berpendar */
        .moon {
            position: absolute;
            top: 10%;
            right: 8%;
            width: 130px;
            height: 130px;
            background: radial-gradient(circle, #eef7ff 0%, #d0e7ff 70%);
            border-radius: 50%;
            box-shadow: 0 0 50px rgba(238, 247, 255, 0.4), 0 0 100px rgba(144, 202, 249, 0.2);
            z-index: 1;
        }

        /* Multi Meteor / Bintang Jatuh */
        .meteor-1 {
            position: absolute;
            top: 12%;
            left: 10%;
            width: 150px;
            height: 2px;
            background: linear-gradient(-45deg, rgba(255,255,255,0.7), rgba(255,255,255,0));
            transform: rotate(-25deg);
            filter: drop-shadow(0 0 4px #90caf9);
            z-index: 1;
        }

        .meteor-2 {
            position: absolute;
            top: 25%;
            left: 45%;
            width: 90px;
            height: 1.5px;
            background: linear-gradient(-45deg, rgba(255,255,255,0.5), rgba(255,255,255,0));
            transform: rotate(-25deg);
            filter: drop-shadow(0 0 3px #ffffff);
            opacity: 0.6;
            z-index: 1;
        }

        /* Pegunungan Siluet Berlapis Penuh Terbuka (Full Layar Bawah) */
        .mountain-container {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 48vh;
            z-index: 1;
            pointer-events: none;
        }

        /* --- NAVBAR & LOGO (Tetap Bulat Sesuai Request) --- */
        .navbar {
            background: rgba(11, 34, 63, 0.4) !important;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            z-index: 10;
            padding: 12px 0;
        }

        .logo-wrapper {
            width: 55px;
            height: 55px;
            background: #ffffff; 
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            overflow: hidden;
        }

        .logo-wrapper img {
            width: 85%;
            height: 85%;
            object-fit: contain;
        }

        .brand-text {
            font-weight: 700;
            font-size: 1.3rem;
            letter-spacing: 0.5px;
            color: #ffffff;
            text-shadow: 0 2px 4px rgba(0,0,0,0.3);
        }

        .btn-nav-custom {
            padding: 10px 30px !important;
            font-size: 1.1rem !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }

        /* --- INTERFACE FORM & TEXT --- */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .welcome-section {
            padding-right: 2rem;
        }

        .welcome-title {
            font-size: 3.8rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 1rem;
            text-shadow: 0 4px 15px rgba(0,0,0,0.5);
        }

        .welcome-text {
            color: #e2f0ff;
            font-size: 1.2rem;
            line-height: 1.6;
            opacity: 0.95;
            text-shadow: 0 2px 8px rgba(0,0,0,0.5);
        }

        /* Glassmorphism Card Premium */
        .register-card {
            background: rgba(16, 28, 54, 0.55);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 24px;
            padding: 2.2rem;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.4);
        }

        .form-label {
            font-weight: 500;
            color: #e5efff;
            font-size: 0.85rem;
            margin-left: 12px;
            margin-bottom: 5px;
        }

        /* Input Kapsul */
        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            border-radius: 30px; 
            padding: 9px 20px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: #90caf9;
            color: #ffffff;
            box-shadow: 0 0 0 0.25rem rgba(144, 202, 249, 0.3);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        /* Tombol Sign Up Biru Samudra Gradasi */
        .btn-register {
            background: linear-gradient(90deg, #1e5bb0 0%, #0f3069 100%);
            color: white;
            font-weight: 600;
            border: 1px solid rgba(255,255,255,0.1);
            border-radius: 30px;
            padding: 12px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(15, 48, 105, 0.4);
            letter-spacing: 0.5px;
        }

        .btn-register:hover {
            background: linear-gradient(90deg, #266ecf 0%, #153f85 100%);
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(38, 110, 207, 0.5);
            color: white;
        }

        .login-link {
            color: #90caf9;
            text-decoration: none;
            font-weight: 500;
        }

        .login-link:hover {
            text-decoration: underline;
            color: #e3f2fd;
        }

        /* Footer */
        footer {
            background: rgba(4, 13, 26, 0.95);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            color: #94a3b8;
            padding: 12px 0;
            z-index: 10;
        }

        /* Style khusus untuk memutihkan seluruh logo & teks di Footer */
        .footer-logo-container {
            display: flex;
            align-items: center;
            height: 35px;
        }

        .footer-logo-container img {
            height: 100%;
            width: auto;
            object-fit: contain;
            /* Filter ajaib untuk mengubah porsi gambar + teks berwarna menjadi siluet putih bersih */
            filter: brightness(0) invert(1);
        }
    </style>
</head>
<body>

<div class="starfield"></div>
<div class="moon"></div>
<div class="meteor-1"></div>
<div class="meteor-2"></div>

<div class="mountain-container">
    <svg width="100%" height="100%" viewBox="0 0 1440 320" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
        <path fill="#1a3d68" opacity="0.3" d="M0,200 L120,160 L280,240 L450,130 L620,220 L800,150 L1000,250 L1200,170 L1440,230 L1440,320 L0,320 Z"></path>
        <path fill="#112d52" opacity="0.6" d="M0,240 L180,180 L390,260 L600,170 L820,250 L1050,190 L1280,270 L1440,210 L1440,320 L0,320 Z"></path>
        <path fill="#07162b" d="M0,270 L250,210 L520,290 L780,220 L1020,280 L1250,220 L1440,280 L1440,320 L0,320 Z"></path>
    </svg>
</div>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <div class="d-flex align-items-center gap-3">
            <div class="logo-wrapper">
                <img src="{{ asset('images/ITB-SS.jpg') }}" alt="Logo ITBSS">
            </div>
            <span class="brand-text">INSTITUT TEKNOLOGI & BISNIS SABDA SETIA</span>
        </div>
        <div class="ms-auto">
            <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-nav-custom rounded-pill me-3">Home</a>
            <a href="{{ route('login') }}" class="btn btn-light btn-nav-custom rounded-pill">Login</a>
        </div>
    </div>
</nav>

<div class="main-content container">
    <div class="row align-items-center w-100">
        
        <div class="col-lg-6 welcome-section mb-4 mb-lg-0">
            <h1 class="welcome-title">Welcome to ITBSS</h1>
            <p class="welcome-text">
                Tempat di mana inovasi teknologi bertemu dengan strategi bisnis. Daftarkan dirimu sekarang dan jadilah bagian dari generasi digital berikutnya!
            </p>
        </div>

        <div class="col-lg-5 ms-auto">
            <div class="register-card">
                <div class="text-center mb-3">
                    <h3 class="fw-bold mb-1">Register Akun</h3>
                    <p class="text-white-50 small mb-0">Lengkapi formulir di bawah untuk mendaftar</p>
                </div>

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="mb-2">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Alamat Email</label>
                        <input type="email" name="email" class="form-control" placeholder="johndoe@email.com" required>
                    </div>

                    <div class="mb-2">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn btn-register w-100 mb-2">
                        SIGN UP
                    </button>
                </form>

                <div class="text-center border-top border-white border-opacity-10 pt-2">
                    <p class="mb-0 text-white-50 small">
                        Sudah mempunyai akun? 
                        <a href="{{ route('login') }}" class="login-link">Login disini</a>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="text-center">
    <div class="container d-flex flex-column flex-sm-row justify-content-between align-items-center">
        <div class="footer-logo-container mb-2 mb-sm-0">
            <img src="{{ asset('images/Logo-ITBSS.png') }}" alt="Logo ITBSS White">
        </div>
        <p class="mb-0 small text-white-50">
            Copyright © 2026 Institut Teknologi & Bisnis Sabda Setia. All rights reserved.
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
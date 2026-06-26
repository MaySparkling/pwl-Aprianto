<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background:#f5f5f5;
        }

        .register-card{
            max-width:500px;
            margin:auto;
            border:none;
            border-radius:10px;
        }

        .header-card{
            background:linear-gradient(90deg,#0d6efd,#0b5ed7);
            color:white;
            border-radius:10px 10px 0 0;
        }

        footer{
            background:#212529;
            color:white;
            margin-top:60px;
            padding:30px 0;
        }

        .footer-text{
            color:#d6d6d6;
        }
    </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm">

    <div class="container">

        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/ITB-SS.jpg') }}" width="70">
        </a>

        <div class="ms-auto">

            <a href="{{ route('dashboard') }}" class="btn btn-outline-primary me-2">
                Home
            </a>

            <a href="{{ route('login') }}" class="btn btn-primary">
                Login
            </a>

        </div>

    </div>

</nav>

<div class="container py-5">

    <div class="card register-card shadow">

        <div class="card-header header-card text-center">

            <h3 class="mb-0">Register Akun</h3>

        </div>

        <div class="card-body p-4">

            <form action="{{ route('register') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nama</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>

                    <input type="password"
                           name="password"
                           class="form-control"
                           required>
                </div>

                <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           required>
                </div>

                <button type="submit" class="btn btn-success w-100">
                    Register
                </button>

            </form>

            <hr>

            <p class="text-center mb-0">

                Sudah mempunyai akun?

                <a href="{{ route('login') }}">
                    Login disini
                </a>

            </p>

        </div>

    </div>

</div>

<footer>

    <div class="container text-center">

        <img src="{{ asset('images/logo-white.png') }}"
             width="220">

        <p class="footer-text mt-3">

            Copyright © 2026
            Institut Teknologi & Bisnis Sabda Setia

        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
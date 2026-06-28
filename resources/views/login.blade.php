<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body{
            background:#f5f5f5;
        }

        .login-card{
            margin-top:80px;
            border:none;
            border-radius:12px;
            overflow:hidden;
            box-shadow:0 0 20px rgba(0,0,0,.15);
        }

        .card-header{
            background:linear-gradient(90deg,#0d6efd,#0b5ed7);
            color:white;
            text-align:center;
            padding:20px;
        }

        footer{
            background:#212529;
            color:white;
            margin-top:80px;
            padding:30px 0;
        }

    </style>

</head>

<body>

<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card login-card">

                <div class="card-header">

                    <h2>Login User</h2>

                </div>

                <div class="card-body p-4">

                    <form method="POST" action="{{ route('login') }}">

                        @csrf

                        <div class="mb-3">

                            <label class="form-label">
                                Email
                            </label>

                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="Masukkan Email">

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Masukkan Password">

                        </div>

                        <div class="row">

                            <div class="col-6">

                                <button type="reset"
                                        class="btn btn-secondary w-100">

                                    Reset

                                </button>

                            </div>

                            <div class="col-6">

                                <button type="submit"
                                        class="btn btn-primary w-100">

                                    Login

                                </button>

                            </div>

                        </div>

                    </form>

                    <hr>

                    <div class="text-center">

                        Belum punya akun?

                        <a href="{{ route('register.view') }}">
                            Register
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<footer>

    <div class="container text-center">

        <p class="mb-0">

            Copyright © 2026
            Institut Teknologi & Bisnis Sabda Setia

        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
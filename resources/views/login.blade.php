<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - ITBSS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            background:#edf2f7;
            font-family:Arial, Helvetica, sans-serif;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
        }

        .login-card{
            width:1000px;
            max-width:95%;
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 20px 45px rgba(0,0,0,.15);
        }

        .left-panel{

            background:url("{{ asset('images/login-campus.jpg') }}") center center;
            background-size:cover;
            min-height:620px;
            position:relative;

        }

        .left-panel::before{

            content:"";
            position:absolute;
            inset:0;
            background:linear-gradient(to top,
            rgba(0,0,0,.65),
            rgba(0,0,0,.10));

        }

        .left-content{

            position:absolute;
            left:40px;
            bottom:40px;
            color:white;
            z-index:2;

        }

        .left-content img{

            width:80px;
            margin-bottom:15px;

        }

        .left-content h2{

            font-size:40px;
            font-weight:bold;
            margin-bottom:10px;

        }

        .left-content p{

            font-size:18px;
            margin:0;

        }

        .right-panel{

            display:flex;
            justify-content:center;
            align-items:center;
            padding:60px;

        }

        .form-login{

            width:100%;
            max-width:350px;

        }

        .form-login h2{

            text-align:center;
            font-weight:bold;
            color:#0d6efd;
            margin-bottom:40px;

        }

        .form-label{

            font-weight:600;

        }

        .form-control{

            border:none;
            border-bottom:2px solid #ced4da;
            border-radius:0;
            padding-left:0;

        }

        .form-control:focus{

            box-shadow:none;
            border-color:#0d6efd;

        }

        .btn-login{

            background:#0d6efd;
            color:white;
            border:none;
            border-radius:10px;
            padding:12px;
            font-weight:bold;
            transition:.3s;

        }

        .btn-login:hover{

            background:#0b5ed7;

        }

        .btn-reset{

            border-radius:10px;

        }

        .register{

            text-align:center;
            margin-top:25px;

        }

        .register a{

            text-decoration:none;
            font-weight:bold;

        }

        @media(max-width:768px){

            .left-panel{

                min-height:250px;

            }

            .right-panel{

                padding:35px;

            }

            .left-content{

                left:20px;
                bottom:20px;

            }

            .left-content h2{

                font-size:30px;

            }

        }

        </style>

    </head>

    <body>

    <div class="login-card">

        <div class="row g-0">

        <div class="col-md-6 left-side">

            <div class="overlay">

        <h1>ITBSS</h1>

        <p>
            Institut Teknologi & Bisnis Sabda Setia
            <br>
            Sistem Informasi Akademik
        </p>

    </div>

</div>

<div class="col-md-6 right-panel">

<div class="form-login">

<h2>Login</h2>

<form method="POST" action="{{ route('login') }}">

@csrf

<div class="mb-4">

<label class="form-label">

Email

</label>

<input
type="email"
name="email"
class="form-control"
placeholder="Masukkan Email"
required>

</div>

<div class="mb-4">

<label class="form-label">

Password

</label>

<input
type="password"
name="password"
class="form-control"
placeholder="Masukkan Password"
required>

</div>

<div class="row">

<div class="col-6">

<button
type="reset"
class="btn btn-secondary btn-reset w-100">

Reset

</button>

</div>

<div class="col-6">

<button
type="submit"
class="btn btn-login w-100">

Login

</button>

</div>

</div>

</form>

<div class="register">

Belum punya akun?

<a href="{{ route('register.view') }}">

Register

</a>

</div>

</div>

</div>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
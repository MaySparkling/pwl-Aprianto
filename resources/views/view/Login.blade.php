<!doctype html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <div>
        <form method="post" action="{{ route('login') }}">
            @csrf
        <table class="table table-dark table-striped-column table-hover">
                <tr>
                    <td colspan=6 align="center"><h1><font color="white">
                        Login
                    </font></h1></td>
                </tr>
                <tr>
                    <td><font color="white">Email</font></td>
                <td colspan=5><input type="email" name="email" size="55" value="" placeholder="Email" class="form-control"></td>
                </tr>
                <tr>
                    <td><font color="white">Password</font></td>
                    <td colspan=5><input type="password" name="password" size="55" value="" placeholder="password" class="form-control"></td>
                </tr>
                <tr>
                    <tr>
                    <td colspan="3" align="center"><input type="reset" value="Batal" class="form-control"></td>
                    <td colspan="3" align="center"><input type="submit" value="Login" class="form-control"></td>
                </tr>
                </tr>
            </table>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>
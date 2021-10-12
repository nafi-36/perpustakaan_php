<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login Siswa</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125 rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img {
                font-size: 3.5 rem;
            }
        }
    </style>

</head>
<body class="text-center">
    <div class="container mt-5">
        <div id="login-row" class="row justify-content-center align-items-center">
        <div id="login-column" class="col-md-5">
        <div class="card">
        <main class="form-signin">
            <form action="proses_login.php" method="POST">
                <div class="card-header"><h1>PERPUSTAKAAN</h1></div>
                <br>
                <div class="card-body">
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <br>
                <div class="form-floating">
                    <input type="username" class="form-control" id="floatingInput" 
                    name="username" placeholder="Insert Username" required>
                    <label for="floatingInput">Username</label>
                </div>
                <br>
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" 
                    name="password" placeholder="Password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                <br>
                <button class="w-100 btn btn-lg btn-secondary" type="submit">Sign in</button>
                <p class="mt-4 mb-3 text-muted">&copy; 2021</p>
                </div>
            </form>
        </main>
        </div>
        </div>
        </div>
    </div>
</body>
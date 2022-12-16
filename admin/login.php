<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="css/signin.css" rel="stylesheet">
</head>
<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <form id="loginForm">
            <h1 class="h3 mb-3 fw-normal">Administrator Panel</h1>
            <div class="form-floating">
                <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="name@example.com">
                <label for="loginEmail">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password">
                <label for="loginPassword">Password</label>
            </div>
            <div id="loginAlert" class="text-danger">

            </div>
            <button class="w-100 btn btn-lg btn-primary" id="loginConfirm" type="button">Sign in</button>
            <p class="mt-5 mb-3 text-muted">Aldeia Talisman - 2022</p>
        </form>
    </main>

    <!-- required scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <!-- internal scripts -->
    <script src="js/login_operations.js"></script>
</body>
</html>
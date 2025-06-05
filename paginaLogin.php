<?php
  session_start();
  if(!isset($_SESSION["erroreLogin"])){
    $_SESSION["erroreLogin"] = -1;
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | ICCHESIMANGIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body class="bg-light" id="index">
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5 bg-white rounded-4 shadow p-4 p-md-5">
        <h1 class="text-center mb-4 fw-bold">Accedi</h1>
        <form action="./login.php" method="post">
          <div class="mb-3">
            <label for="username" class="form-label fw-semibold">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label fw-semibold">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <?php
            if ($_SESSION["erroreLogin"] == 1) {
              echo "<div class='alert alert-danger py-2 text-center' role='alert'>Password errata</div>";
            } else if ($_SESSION["erroreLogin"] == 2){
              echo "<div class='alert alert-danger py-2 text-center' role='alert'>Username errato</div>";
            }
            $_SESSION["erroreLogin"] = -1;
          ?>
          <div class="d-grid mb-3">
            <button type="submit" class="btn btn-success fw-bold">Accedi</button>
          </div>
          <p class="text-center mb-0">Non hai un account? <a href="./registrazione.php">Registrati</a></p>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
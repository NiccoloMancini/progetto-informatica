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
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index">
    <h1 class="text-center mb-5 mt-3">Login</h1>
    <div class="mx-auto w-25 rounded-3 p-4 bg-white">
    <form action="./login.php" method="post">
      <label for="lname" class="fw-bold">Username</label>
      <div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" aria-describedby="basic-addon1" name="username">
        </div>
      </div>
      <label for="lname" class="fw-bold">Password</label>
      <div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" aria-describedby="basic-addon1" name="password">
        </div>
      </div>
      <?php
        if ($_SESSION["erroreLogin"] == 1) {
          echo "<p class='fw-bold text-danger'>Password errata</p>";
        }else if ($_SESSION["erroreLogin"] == 2){
          echo "<p class='fw-bold text-danger'>Username errato</p>";
        }
        $_SESSION["erroreLogin"] = -1;
      ?>
      <button type="submit" class="btn btn-success fw-bold">Invia</button>
      <p class="mb-0 mt-3">Non hai un account? <a href="./registrazione.php">Registrati</a></p>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
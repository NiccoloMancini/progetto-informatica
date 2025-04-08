<?php
  session_start();
  if (!isset($_SESSION["erroreRegistrazione"])) {
    $_SESSION["erroreRegistrazione"] = -1;
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
    <h1 class="text-center mb-5 mt-3">REGISTRATI</h1>
    <div class="mx-auto w-25  rounded-3 p-4 bg-white">
    <form action="./scriptregistrazione.php" method="post">
      <label for="lname" class="fw-bold">Nome</label>
      <div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" aria-describedby="basic-addon1" name="nome">
        </div>
      </div>
      <label for="lname" class="fw-bold">Cognome</label>
      <div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" aria-describedby="basic-addon1" name="cognome">
        </div>
      </div>
      <label for="lname" class="fw-bold">e-mail</label>
      <div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" aria-describedby="basic-addon1" name="email1">
        </div>
      </div>
      <label for="lname" class="fw-bold">conferma e-mail</label>
      <div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" aria-describedby="basic-addon1" name="email2">
        </div>
      </div>
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
        if ($_SESSION["erroreRegistrazione"] == 3) {
          echo "<p class='fw-bold text-danger'>Le e-mail non coincidono</p>";
        }else if ($_SESSION["erroreRegistrazione"] == 1){
          echo "<p class='fw-bold text-danger'>e-mail già esistente</p>";
        }else if ($_SESSION["erroreRegistrazione"] == 2){
          echo "<p class='fw-bold text-danger'>username già esistente</p>";
        }
        $_SESSION["erroreRegistrazione"] = -1;
      ?>
      <button type="submit" class="btn btn-success fw-bold">Invia</button>
    </form>
  </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
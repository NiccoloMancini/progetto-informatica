<?php
    session_start();
    if ($_SESSION["erroreLogin"] == -1) {
      header("Location: paginaLogin.php");
    }
    include("connessione.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index">
    <nav class="navbar bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="./images/logo.png" width="50" height="44" class="d-inline-block align-text-top"><span><b>ICCHESIMANGIA</b></span>
        </a>
        <button type="submit" class="btn btn-outline-danger" onclick="ApriFinestra()">Logout</button>
      </div>
    </nav>
    <div id="principal-div" class="mx-auto w-75 rounded-3 p-4 bg-white mt-5">
      <h1 class="mb-2">Impostazioni</h1>
      <hr>
      <h3 class="mt-2">Cambia password</h3>
      <div>
      <form action="./script_cambioPassword.php" method="post">
        <div class="input-group my-3 w-25">
          <input type="password" class="form-control" aria-describedby="basic-addon1" name="nuovaPassword" placeholder="Nuova Password" required>
          </div>
        </div>
        <button type="submit" class="btn btn-success my-3">Invia</button>
      </form>
      <?php
        if(isset($_SESSION["erroreNuovaPassword"])){
          switch ($_SESSION["erroreNuovaPassword"]) {
            case 0:
              echo "<p class='text-danger'>password uguale alla precedente</p>";
              break;
            case 1:
              echo "<p class='text-danger'>errore nella query</p>";
              break;
            case 2:
              echo "<p class='text-success'>password inserita correttamente</p>";
              break;
          }
          unset($_SESSION["erroreNuovaPassword"]);
        }
      ?>
    </div>
    <div id="apriChiudiFinestra" class=" divInTheMiddle d-none bg-white p-5 rounded-3" >
        <button type="button" class="btn btn-danger fw-bold" onclick="ChiudiFinestra()">X</button>
        <p class="fs-1 fw-bold">EFFETTUA LOGOUT?</p>
        <form action="./logout.php">
          <button type="submit" class="btn btn-outline-danger">Logout</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script src="js/script.js"></script>
  </body>
</html>

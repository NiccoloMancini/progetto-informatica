<?php
    session_start();
    if ($_SESSION["erroreLogin"] == -1) {
      header("Location: paginaLogin.php");
      exit();
    }
    include("connessione.php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Impostazioni - ICCHESIMANGIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body id="index" class="bg-light">
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
      <div class="container-fluid">
        <a class="navbar-brand d-flex align-items-center" href="#">
          <img src="./images/logo.png" alt="Logo" width="50" height="44" class="me-2 rounded" />
          <span class="fs-4 fw-bold">ICCHESIMANGIA</span>
        </a>
        <div class="d-flex align-items-center gap-2 ms-auto">
          <a href="./benvenuto.php" class="btn btn-outline-primary d-flex align-items-center gap-1">
            <i class="bi bi-house fs-5"></i>
          </a>
          <a href="./profilo.php" class="btn btn-outline-primary d-flex align-items-center gap-1" title="Profilo">
            <i class="bi bi-person fs-5"></i>
          </a>
          <a href="./cambio_password.php" class="btn btn-outline-primary d-flex align-items-center gap-1" title="Impostazioni">
            <i class="bi bi-gear-wide-connected fs-5"></i>
          </a>
          <button type="button" class="btn btn-outline-danger d-flex align-items-center gap-1" onclick="ApriFinestra()" title="Logout">
            <i class="bi bi-box-arrow-right fs-5"></i> Logout
          </button>
        </div>
      </div>
    </nav>
    <main class="d-flex justify-content-center align-items-center min-vh-100">
      <div class="bg-white rounded-4 shadow p-5 w-100" style="max-width: 420px;">
        <h1 class="mb-4 fw-bold text-center">Impostazioni</h1>
        <hr class="mb-4" />
        <h3 class="mb-4 text-secondary fw-semibold">Cambia password</h3>
        <form action="./script_cambioPassword.php" method="post" class="needs-validation" novalidate>
          <div class="mb-4">
            <label for="nuovaPassword" class="form-label fw-semibold">Nuova Password</label>
            <input type="password" id="nuovaPassword" name="nuovaPassword" class="form-control form-control-lg" placeholder="Inserisci nuova password" required />
            <div class="invalid-feedback">
              Inserisci una password valida.
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 fw-semibold">Modifica Password</button>
        </form>

        <?php
          if (isset($_SESSION["erroreNuovaPassword"])) {
            $classAlert = $_SESSION["erroreNuovaPassword"] === 2 ? "alert alert-success mt-4" : "alert alert-danger mt-4";
            $msgText = "";
            switch ($_SESSION["erroreNuovaPassword"]) {
              case 0:
                $msgText = "La nuova password non può essere uguale a quella precedente.";
                break;
              case 1:
                $msgText = "Errore durante l'aggiornamento della password. Riprova più tardi.";
                break;
              case 2:
                $msgText = "Password modificata correttamente.";
                break;
            }
            echo "<div class='$classAlert' role='alert'>$msgText</div>";
            unset($_SESSION["erroreNuovaPassword"]);
          }
        ?>
      </div>
    </main>
    <div id="apriChiudiFinestra" class="divInTheMiddle d-none bg-white p-5 rounded-3 shadow-lg text-center">
      <button type="button" class="btn-close float-end" onclick="ChiudiFinestra()" aria-label="Chiudi"></button>
      <p class="fs-4 fw-bold">Vuoi effettuare il logout?</p>
      <form action="./logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>

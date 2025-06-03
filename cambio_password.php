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
    <link rel="stylesheet" href="./css/styles.css" />
  </head>
  <body id="index">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
      <div class="container-fluid">
        <!-- Logo e scritta a sinistra -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
          <img src="./images/logo.png" alt="Logo" width="50" height="44" class="me-2 rounded" />
          <span class="fs-4 fw-bold">ICCHESIMANGIA</span>
        </a>
        <!-- Pulsanti a destra -->
        <div class="d-flex align-items-center gap-2 ms-auto">
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

    <!-- CONTENUTO PRINCIPALE -->
    <main class="d-flex justify-content-center py-5">
      <div id="principal-div" class="bg-white rounded-3 p-5 shadow-sm">
        <h1 class="mb-3">Impostazioni</h1>
        <hr />
        <h3 class="mb-4">Cambia password</h3>
        <form action="./script_cambioPassword.php" method="post" class="needs-validation" novalidate>
          <div class="mb-3 w-100">
            <label for="nuovaPassword" class="form-label">Nuova Password</label>
            <input
              type="password"
              id="nuovaPassword"
              name="nuovaPassword"
              class="form-control"
              placeholder="Inserisci nuova password"
              required
              minlength="6"
            />
            <div class="invalid-feedback">
              Inserisci una password valida (minimo 6 caratteri).
            </div>
          </div>
          <button type="submit" class="btn btn-success">Invia</button>
        </form>

        <?php
          if (isset($_SESSION["erroreNuovaPassword"])) {
            $msgClass = $_SESSION["erroreNuovaPassword"] === 2 ? "text-success" : "text-danger";
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
            echo "<p class='$msgClass mt-3 fw-semibold'>$msgText</p>";
            unset($_SESSION["erroreNuovaPassword"]);
          }
        ?>
      </div>
    </main>

    <!-- POPUP LOGOUT -->
    <div
      id="apriChiudiFinestra"
      class="divInTheMiddle d-none bg-white p-5 rounded-3 shadow-lg text-center position-fixed top-50 start-50 translate-middle"
      style="width: 320px; z-index: 1050;"
    >
      <button type="button" class="btn-close btn-close-custom" onclick="ChiudiFinestra()" aria-label="Chiudi"></button>
      <p class="fs-4 fw-bold mb-4">Vuoi effettuare il logout?</p>
      <form action="./logout.php" method="post">
        <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>

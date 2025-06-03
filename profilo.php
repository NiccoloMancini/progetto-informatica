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
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Profilo Utente - ICCHESIMANGIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index" class="bg-light">
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="./images/logo.png" alt="Logo" width="50" height="44" class="me-2 rounded">
        <span class="fs-4 fw-bold">ICCHESIMANGIA</span>
      </a>
      <div class="d-flex align-items-center gap-2 ms-auto">
        <a href="./profilo.php" class="btn btn-outline-primary d-flex align-items-center gap-1">
          <i class="bi bi-person fs-5"></i>
        </a>
        <a href="./cambio_password.php" class="btn btn-outline-primary d-flex align-items-center gap-1">
          <i class="bi bi-gear-wide-connected fs-5"></i>
        </a>
        <button type="button" class="btn btn-outline-danger d-flex align-items-center gap-1" onclick="ApriFinestra()">
          <i class="bi bi-box-arrow-right fs-5"></i> Logout
        </button>
      </div>
    </div>
  </nav>
    <main class="container my-5">
      <div class="card mx-auto w-75 shadow-sm rounded-4">
        <div class="card-header bg-primary text-white">
          <h2 class="mb-0">Informazioni Profilo</h2>
        </div>
        <div class="card-body">
          <?php
            if ($result = $conn->query("SELECT username, nome, cognome, email, data_registrazione FROM utente WHERE username = '" . $_SESSION["usernamelog"] . "'")) {
              $row = $result->fetch_assoc();
              echo '<ul class="list-group">';
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">Username <span class="fw-semibold">' . htmlspecialchars($row["username"]) . '</span></li>';
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">Nome <span class="fw-semibold">' . htmlspecialchars($row["nome"]) . '</span></li>';
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">Cognome <span class="fw-semibold">' . htmlspecialchars($row["cognome"]) . '</span></li>';
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">Email <span class="fw-semibold">' . htmlspecialchars($row["email"]) . '</span></li>';
              echo '<li class="list-group-item d-flex justify-content-between align-items-center">Registrato dal <span class="fw-semibold">' . htmlspecialchars($row["data_registrazione"]) . '</span></li>';
              echo '</ul>';
            }
          ?>
        </div>
      </div>
    </main>

    <div id="apriChiudiFinestra" class="divInTheMiddle d-none bg-white p-5 rounded-3 text-center shadow-lg">
      <button type="button" class="btn btn-danger fw-bold position-absolute top-0 end-0 m-3" onclick="ChiudiFinestra()">×</button>
      <p class="fs-2 fw-bold mt-4">EFFETTUA LOGOUT?</p>
      <form action="./logout.php">
        <button type="submit" class="btn btn-outline-danger">Logout</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
  </body>
</html>

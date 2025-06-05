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
    <title>Registrazione</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  </head>
  <body class="bg-light" id="index">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="card shadow rounded-4 p-4 w-100" style="max-width: 500px;">
        <h2 class="text-center fw-bold mb-4">Registrati</h2>
        <form action="./scriptregistrazione.php" method="post">
          <div class="mb-3">
            <label class="form-label fw-bold">Nome</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person"></i></span>
              <input type="text" class="form-control" name="nome" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Cognome</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-vcard"></i></span>
              <input type="text" class="form-control" name="cognome" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">E-mail</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope-at"></i></span>
              <input type="email" class="form-control" name="email1" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Conferma E-mail</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-envelope-check"></i></span>
              <input type="email" class="form-control" name="email2" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-circle"></i></span>
              <input type="text" class="form-control" name="username" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-bold">Password</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" class="form-control" name="password" required>
            </div>
          </div>
          <?php
            if ($_SESSION["erroreRegistrazione"] == 3) {
              echo "<div class='alert alert-danger text-center fw-semibold'>Le e-mail non coincidono</div>";
            } else if ($_SESSION["erroreRegistrazione"] == 1) {
              echo "<div class='alert alert-danger text-center fw-semibold'>E-mail già esistente</div>";
            } else if ($_SESSION["erroreRegistrazione"] == 2) {
              echo "<div class='alert alert-danger text-center fw-semibold'>Username già esistente</div>";
            }
            $_SESSION["erroreRegistrazione"] = -1;
          ?>
          <div class="d-grid">
            <button type="submit" class="btn btn-success fw-bold">
              <i class="bi bi-person-plus-fill me-1"></i> Registrati
            </button>
          </div>

        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

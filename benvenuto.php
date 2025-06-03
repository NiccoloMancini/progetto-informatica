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
    <title>ICCHESIMANGIA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./css/styles.css">
  </head>
  <body id="index" class="bg-light">
  <nav class="navbar navbar-expand-lg bg-body-tertiary shadow-sm sticky-top">
  <div class="container-fluid">
    <!-- Sinistra: logo + scritta -->
    <a class="navbar-brand d-flex align-items-center" href="#">
      <img src="./images/logo.png" alt="Logo" width="50" height="44" class="me-2 rounded">
      <span class="fs-4 fw-bold">ICCHESIMANGIA</span>
    </a>

    <!-- Destra: pulsanti -->
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

    <div id="principal-div" class="mx-auto w-75 rounded-3 p-4 bg-white mt-5 shadow-sm">
      <?php
        echo "<h1 class='mb-3 text-center'>Benvenuto <span class='text-primary fw-bold'>" . $_SESSION["usernamelog"] . "</span></h1>";
        echo "<h4 class='mb-4 text-muted text-center'>Hai effettuato <span class='badge bg-success'><strong>" . $conn->query("SELECT COUNT(*) as tot FROM recensione AS r JOIN utente AS u ON r.id_utente = u.id_utente WHERE u.username = '" . $_SESSION["usernamelog"] ."'")->fetch_assoc()["tot"] . "</strong></span> recensioni</h4>";
        $result = $conn->query("SELECT ri.nome, ri.indirizzo, re.voto, re.data, re.id_recensione FROM ristorante AS ri JOIN recensione AS re ON ri.id_ristorante = re.id_ristorante JOIN utente AS u ON re.id_utente = u.id_utente WHERE u.username = '" . $_SESSION["usernamelog"] . "'");
      ?>

      <h2 class="mb-3">Le tue recensioni</h2>
      <?php if ($result->num_rows > 0): ?>
        <div class="table-responsive">
          <table class="table text-center table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th>Nome</th>
                <th>Indirizzo</th>
                <th>Voto</th>
                <th>Data</th>
                <th>Elimina</th>
              </tr>
            </thead>
            <tbody>
              <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                  <td><?= $row["nome"] ?></td>
                  <td><?= $row["indirizzo"] ?></td>
                  <td><?= $row["voto"] ?></td>
                  <td><?= $row["data"] ?></td>
                  <td>
                  <form action="./eliminaRecensione.php" method="post" class="d-inline">
                    <button type="submit" class="btn btn-outline-danger btn-sm" value="<?= $row["id_recensione"] ?>" name="id_tabella" title="Elimina recensione">Elimina
                    <i class="fas fa-trash-alt"></i>
                    </button>
                  </form>
                  </td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      <?php else: ?>
        <p class="text-danger">Nessuna recensione effettuata!</p>
      <?php endif; ?>

      <hr class="my-5">

      <div class="row g-4">
        <!-- Specifiche ristorante -->
        <div class="col-md-6">
          <h2>Specifiche ristorante</h2>
          <form action="info_ristorante.php" method="post">
            <div class="mb-3">
              <select class="form-select" name="ristorante" required>
                <?php include("selectRistoranti.php"); ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Invia</button>
          </form>
        </div>

        <!-- Nuova recensione -->
        <div class="col-md-6">
          <h2>Lascia una nuova recensione</h2>
          <form action="./inserisciRecensione.php" method="post">
            <div class="mb-3 stelleValutazione">
              <?php for ($i = 5; $i >= 1; $i--): ?>
                <input id="voto-<?= $i ?>" type="radio" name="voto" value="<?= $i ?>" required/>
                <label for="voto-<?= $i ?>" title="<?= $i ?> stella<?= $i > 1 ? 'e' : '' ?>">
                  <svg viewBox="0 0 576 512" height="1em">
                    <path d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z"/>
                  </svg>
                </label>
              <?php endfor; ?>
            </div>
            <div class="mb-3">
              <select class="form-select" name="ristorante" required>
                <?php include("selectRistoranti.php"); ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success">Invia</button>
            <?php
              if (isset($_SESSION["esitoRecensione"])) {
                echo "<p class='text-info mt-2'>".$_SESSION["esitoRecensione"]."</p>";
                unset($_SESSION["esitoRecensione"]);
              }
            ?>
          </form>
        </div>
      </div>
    </div>

    <!-- Logout modal -->
    <div id="apriChiudiFinestra" class="divInTheMiddle d-none bg-white p-5 rounded-3 shadow-lg text-center">
      <button type="button" class="btn-close float-end" onclick="ChiudiFinestra()" aria-label="Chiudi"></button>
      <p class="fs-4 fw-bold">Vuoi effettuare il logout?</p>
      <form action="./logout.php">
        <button type="submit" class="btn btn-danger">Logout</button>
      </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>
    <script src="js/script.js"></script>
  </body>
</html>
